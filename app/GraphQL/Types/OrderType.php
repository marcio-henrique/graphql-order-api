<?php

namespace App\GraphQL\Types;

use App\Models\Order;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;

/**
 * Class ProductType
 * @package App\GraphQL\Types
 */
class OrderType extends GraphQLType
{
    /**
     * @var string[]
     */
    protected $attributes = [
        'name' => 'Order',
        'description' => 'order',
        'model' => Order::class
    ];

    /**
     * @return array[]
     */
    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
            ],
            'total' => [
                'type' => Type::nonNull(Type::float()),
            ],
            'customer' => [
                'type' => GraphQL::type('Customer'),
            ],
        ];
    }
}
