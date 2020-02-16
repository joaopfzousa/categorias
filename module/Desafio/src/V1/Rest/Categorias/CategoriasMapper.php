<?php
namespace Desafio\V1\Rest\Categorias;

use Zend\Db\TableGateway\TableGateway;

class CategoriasMapper
{
    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        $resulSet = $this->tableGateway->select();
        return $resulSet;
    }

    public function fetchOne($id)
    {
        $id = (int) $id;

        $rowset = $this->tableGateway->select(array('id' => $id));
        
        $row = $rowset->current();

        if( ! $row )
            throw new \Exception("Categoria com o id {$id}, não encontrado!");
        
        return $row;
    }

    public function save( CategoriasEntity $categoria)
    {
        $data = [
            'nome' =>  $categoria->nome,
            'descricao' =>  $categoria->descricao
        ];

        $id = (int) $categoria->id;

        if( $id == 0 )
        {
            $res = $this->tableGateway->insert($data);
            $categoria->id = $this->tableGateway->lastInsertValue;
            return $categoria;
        }else{
            if( $this->fetchOne($id) )
            {
                $this->tableGateway->update($data, array('id' => $id));
                return $categoria;
            }
        }
    }

    public function delete($id)
    {
        return $this->tableGateway->delete(array('id' => (int) $id ));
    }
}