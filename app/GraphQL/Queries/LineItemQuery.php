<?php

namespace App\GraphQL\Queries;

use App\Models\LineItem;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;

/**
 * Class ProductQuery
 * @package App\GraphQL\Queries
 */
class LineItemQuery extends Query
{
    protected $attributes = [
        'name' => 'lineItem'
    ];

    /**
     * @return Type
     */
    public function type(): Type
    {
        return GraphQL::type('LineItem');
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
        return LineItem::findOrFail($args['id']);
    }
}
