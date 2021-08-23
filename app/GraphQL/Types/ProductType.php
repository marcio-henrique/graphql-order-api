<?php

namespace App\GraphQL\Types;

use App\Models\Product;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

/**
 * Class ProductType
 * @package App\GraphQL\Types
 */
class ProductType extends GraphQLType
{
    /**
     * @var string[]
     */
    protected $attributes = [
        'name' => 'Product',
        'description' => 'product',
        'model' => Product::class
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
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The name of the product',
            ],
            'cost' => [
                'type' => Type::nonNull(Type::float()),
                'description' => 'The cost of the product',
            ],
        ];
    }
}
