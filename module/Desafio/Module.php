<?php
namespace Desafio;

use Desafio\V1\Rest\Categorias\CategoriasEntity;
use Desafio\V1\Rest\Categorias\CategoriasMapper;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use ZF\Apigility\Provider\ApigilityProviderInterface;

class Module implements ApigilityProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'DesafioCategoriasTableGateway' => function($sm) {
                    $dbAdapter = $sm->get('DB\Categorias');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new CategoriasEntity());
                    return new TableGateway('categorias', $dbAdapter, null, $resultSetPrototype);
                    }, 
                'V1\Rest\Categorias\CategoriasMapper' => function($sm){
                    $tableGateway = $sm->get('DesafioCategoriasTableGateway');
                    return new CategoriasMapper($tableGateway);
                }
            )
        );
    }
    public function getAutoloaderConfig()
    {
        return [
            'ZF\Apigility\Autoloader' => [
                'namespaces' => [
                    __NAMESPACE__ => __DIR__ . '/src',
                ],
            ],
        ];
    }
}
