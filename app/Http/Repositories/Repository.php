<?php

namespace App\Http\Repositories;

use App\Http\Repositories\Filters\Filter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use ReflectionClass;

class Repository 
{
    protected Model $model;

    public function newQuery()
    {
        return $this->model::query();
    }

    public function create(array $attributes)
    {
        return $this->newQuery()->create($attributes);
    }

    public function update(array $filters, array $attributes)
    {
        $query = $this->newQuery();
        return $this->applyWithFilter($query, $filters)->update($attributes);
    }

    public function delete(array $filters)
    {
        $query = $this->newQuery();
        return $this->applyWithFilter($query, $filters)->delete();
    }

    public function first(array $filters, array $columns = ['*'])
    {
        $query = $this->newQuery();
        return $this->applyWithFilter($query, $filters)->first($columns);
    }

    public function get(array $filters = [], array $columns = ['*'])
    {
        $query = $this->newQuery();
        return $this->applyWithFilter($query, $filters)->get($columns);
    }

    public function paginate(array $filters = [], int $perPage = 15, array $columns = ['*'])
    {
        $query = $this->newQuery();
        return $this->applyWithFilter($query, $filters)->paginate($perPage, $columns);
    }

    public function applyWithFilter(Builder $query, array $withFilter)
    {
        $namespace = new ReflectionClass($this)->getNamespaceName();

        foreach ($withFilter as $filter => $value) {
            $filterClass = $namespace . '\\Filters\\' . $filter;

            if (class_exists($filterClass)) {
                $filterInstance = app($filterClass);
                if ($filterInstance instanceof Filter) {
                    // 執行實作的Filter Query
                    $query = $filterInstance->apply($query, $value);
                } else {
                    throw new \Exception("Filter class must implement the Filter interface.");
                }
            } else {
                throw new \Exception("Filter class not found.");
            }
        }

        return $query;
    }
}