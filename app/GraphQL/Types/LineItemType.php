<?php

namespace App\GraphQL\Types;

use App\Models\LineItem;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

/**
 * Class ProductType
 * @package App\GraphQL\Types
 */
class LineItemType extends GraphQLType
{
    /**
     * @var string[]
     */
    protected $attributes = [
        'name' => 'LineItem',
        'description' => 'lineItem',
        'model' => LineItem::class
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
            'quantity' => [
                'type' => Type::nonNull(Type::float()),
            ],
            'product_id' => [
                'type' => Type::nonNull(Type::int()),
            ],
            'order_id' => [
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
