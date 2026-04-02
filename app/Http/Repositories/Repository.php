<?php

namespace App\Http\Repositories;

use Illuminate\Database\Eloquent\Model;

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
        return $this->newQuery()->where($filters)->update($attributes);
    }

    public function delete(array $filters)
    {
        return $this->newQuery()->where($filters)->delete();
    }

    public function first(array $filters, array $columns = ['*'])
    {
        return $this->newQuery()->where($filters)->first($columns);
    }

    public function get(array $filters = [], array $columns = ['*'])
    {
        return $this->newQuery()->where($filters)->get($columns);
    }

    public function updateOrCreate(array $filters, array $attributes, array $options = [])
    {
        return $this->model::updateOrCreate($filters, $attributes, $options);
    }
}