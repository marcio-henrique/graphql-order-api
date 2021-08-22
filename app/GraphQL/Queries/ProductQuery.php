<?php

namespace App\GraphQL\Queries;

use App\Models\Product;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;

/**
 * Class ProductQuery
 * @package App\GraphQL\Queries
 */
class ProductQuery extends Query
{
    protected $attributes = [
        'name' => 'product'
    ];

    /**
     * @return Type
     */
    public function type(): Type
    {
        return GraphQL::type('Product');
    }

    /**
     * @return array|array[]
     */
    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int(),
                'rules' => ['required']
            ],
        ];
    }

    /**
     * @param $root
     * @param $args
     * @return mixed
     */
    public function resolve($root, $args)
    {
        return Product::findOrFail($args['id']);
    }
}
