<?php

namespace App\GraphQL\Queries;

use App\Models\Customer;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;

/**
 * Class ProductsQuery
 * @package App\GraphQL\Queries
 */
class CustomersQuery extends Query
{
    protected $attributes = [
        'first_name' => 'customers'
    ];

    /**
     * @return Type
     */
    public function type(): Type
    {
        return Type::listOf(GraphQL::type('Customer'));
    }

    /**
     * @return mixed
     */
    public function resolve()
    {
        return Customer::all();
    }
}
