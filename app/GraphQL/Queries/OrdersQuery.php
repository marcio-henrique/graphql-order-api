<?php

namespace App\GraphQL\Queries;

use App\Models\Order;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;

/**
 * Class ProductsQuery
 * @package App\GraphQL\Queries
 */
class OrdersQuery extends Query
{
    protected $attributes = [
        'name' => 'orders'
    ];

    /**
     * @return Type
     */
    public function type(): Type
    {
        return Type::listOf(GraphQL::type('Order'));
    }

    /**
     * @return mixed
     */
    public function resolve()
    {
        return Order::all();
    }
}
