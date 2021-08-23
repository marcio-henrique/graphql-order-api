<?php

namespace App\GraphQL\Types;

use App\Models\Customer;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

/**
 * Class ProductType
 * @package App\GraphQL\Types
 */
class CustomerType extends GraphQLType
{
    /**
     * @var string[]
     */
    protected $attributes = [
        'name' => 'Customer',
        'description' => 'customer',
        'model' => Customer::class
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
            'first_name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The first name of the customer',
            ],
            'last_name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The last name of the customer',
            ],
            'street' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The street of the customer',
            ],
            'city' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The city of the customer',
            ],
            'state' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The state of the customer',
            ],
            'zip' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The zip of the customer',
            ],
            'country' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The country of the customer',
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
