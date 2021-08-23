<?php

namespace App\GraphQL\Queries;

use App\Models\LineItem;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;

/**
 * Class ProductsQuery
 * @package App\GraphQL\Queries
 */
class LineItemsQuery extends Query
{
    protected $attributes = [
        'name' => 'lineItems'
    ];

    /**
     * @return Type
     */
    public function type(): Type
    {
        return Type::listOf(GraphQL::type('LineItem'));
    }

    /**
     * @return mixed
     */
    public function resolve()
    {
        return LineItem::all();
    }
}
