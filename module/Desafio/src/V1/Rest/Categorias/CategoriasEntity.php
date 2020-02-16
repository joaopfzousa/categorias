<?php
namespace Desafio\V1\Rest\Categorias;

class CategoriasEntity
{
    public $id;

    public $categoria;

    public $descricao;

    public function getArrayCopy()
    {
        return array(
            'id' => $this->id, 
            'nome' => $this->nome,
            'descricao' => $this->descricao
        );
    }

    public function exchangeArray(array $array)
    {
        $this->id = $array['id'];
        $this->nome = $array['nome'];
        $this->descricao = $array['descricao'];
    }
}
