<?php
namespace Desafio\V1\Rest\Categorias;

class CategoriasResourceFactory
{
    public function __invoke($services)
    {
        $mapper = $services->get('V1\Rest\Categorias\CategoriasMapper');
        return new CategoriasResource($mapper);
    }
}
