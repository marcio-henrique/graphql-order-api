<?php

namespace App\GraphQL\Queries;

use App\Models\Order;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;

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

    public function resolve($root, $args, $context, ResolveInfo $info, SelectFields $getSelectFields)
    {
        $fields = $getSelectFields;
        $with = $fields->getRelations();

        return Order::with($with)
            ->get();
    }
}
