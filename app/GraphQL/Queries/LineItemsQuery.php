<?php

namespace App\GraphQL\Queries;

use App\Models\LineItem;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;
use SebastianBergmann\Diff\Line;

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
    public function resolve($root, $args, $context, ResolveInfo $info, SelectFields $getSelectFields)
    {
        $fields = $getSelectFields;
        $with = $fields->getRelations();

        return LineItem::with($with)
            ->get();
    }
}
