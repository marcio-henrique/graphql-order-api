<?php

namespace App\GraphQL\Queries;

use App\Models\Order;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;

/**
 * Class ProductQuery
 * @package App\GraphQL\Queries
 */
class OrderQuery extends Query
{
    protected $attributes = [
        'name' => 'order'
    ];

    /**
     * @return Type
     */
    public function type(): Type
    {
        return GraphQL::type('Order');
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
        return Order::findOrFail($args['id']);
    }
}
