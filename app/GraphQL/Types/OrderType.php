<?php

namespace App\GraphQL\Types;

use App\Models\Order;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

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
            'customer_id' => [
                'type' => Type::nonNull(Type::int()),
            ],
        ];
    }


    /**
     * @param $root
     * @param $args
     * @return string
     */
    protected function resolveUpperNameField($root, $args)
    {
        return strtoupper($root->name);
    }
}
