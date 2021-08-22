<?php

namespace App\GraphQL\Queries;

use App\Models\Kind;
use App\Models\Product;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;

/**
 * Class ProductsQuery
 * @package App\GraphQL\Queries
 */
class ProductsQuery extends Query
{
    protected $attributes = [
        'name' => 'products'
    ];

    /**
     * @return Type
     */
    public function type(): Type
    {
        return Type::listOf(GraphQL::type('Product'));
    }

    /**
     * @return mixed
     */
    public function resolve()
    {
        return Product::all();
    }
}
