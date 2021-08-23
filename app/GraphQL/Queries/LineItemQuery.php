<?php

namespace App\GraphQL\Queries;

use App\Models\LineItem;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;

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
    public function resolve($root, $args, $context, ResolveInfo $info, SelectFields $getSelectFields)
    {
        $fields = $getSelectFields;
        $with = $fields->getRelations();

        return LineItem::with($with)
            ->where('id', $args['id'])
            ->first();
    }
}
