<?php
namespace LaraMod\Admin\Core\Scopes;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class AdminCoreOrderByPosScope implements Scope
{

    public function apply(Builder $builder, Model $model)
    {
        return $builder->orderBy('pos', 'asc');
    }
}