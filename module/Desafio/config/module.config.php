<?php
return [
    'service_manager' => [
        'factories' => [
            \Desafio\V1\Rest\Categorias\CategoriasResource::class => \Desafio\V1\Rest\Categorias\CategoriasResourceFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'desafio.rest.categorias' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/categorias[/:categorias_id]',
                    'defaults' => [
                        'controller' => 'Desafio\\V1\\Rest\\Categorias\\Controller',
                    ],
                ],
            ],
        ],
    ],
    'zf-versioning' => [
        'uri' => [
            0 => 'desafio.rest.categorias',
        ],
    ],
    'zf-rest' => [
        'Desafio\\V1\\Rest\\Categorias\\Controller' => [
            'listener' => \Desafio\V1\Rest\Categorias\CategoriasResource::class,
            'route_name' => 'desafio.rest.categorias',
            'route_identifier_name' => 'categorias_id',
            'collection_name' => 'categorias',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Desafio\V1\Rest\Categorias\CategoriasEntity::class,
            'collection_class' => \Desafio\V1\Rest\Categorias\CategoriasCollection::class,
            'service_name' => 'categorias',
        ],
    ],
    'zf-content-negotiation' => [
        'controllers' => [
            'Desafio\\V1\\Rest\\Categorias\\Controller' => 'HalJson',
        ],
        'accept_whitelist' => [
            'Desafio\\V1\\Rest\\Categorias\\Controller' => [
                0 => 'application/vnd.desafio.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
        ],
        'content_type_whitelist' => [
            'Desafio\\V1\\Rest\\Categorias\\Controller' => [
                0 => 'application/vnd.desafio.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'zf-hal' => [
        'metadata_map' => [
            \Desafio\V1\Rest\Categorias\CategoriasEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'desafio.rest.categorias',
                'route_identifier_name' => 'categorias_id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \Desafio\V1\Rest\Categorias\CategoriasCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'desafio.rest.categorias',
                'route_identifier_name' => 'categorias_id',
                'is_collection' => true,
            ],
        ],
    ],
    'zf-content-validation' => [
        'Desafio\\V1\\Rest\\Categorias\\Controller' => [
            'input_filter' => 'Desafio\\V1\\Rest\\Categorias\\Validator',
        ],
    ],
    'input_filter_specs' => [
        'Desafio\\V1\\Rest\\Categorias\\Validator' => [
            0 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'nome',
                'description' => 'O nome da categoria',
            ],
            1 => [
                'required' => false,
                'validators' => [],
                'filters' => [],
                'name' => 'descricao',
                'continue_if_empty' => true,
                'description' => 'A descrição da categoria',
            ],
        ],
    ],
];
