<?php

namespace App\Concerns;

use App\Http\Repositories\Repository;

trait ProxyAsRepository
{
    public function create(array $attributes)
    {
        return $this->getProxyRepository()->create($attributes);
    }
    
    public function update(array $filters, array $attributes)
    {
        return $this->getProxyRepository()->update($filters, $attributes);
    }

    public function delete(array $filters)
    {
        return $this->getProxyRepository()->delete($filters);
    }

    public function first(array $filters, array $columns = ['*'])
    {
        return $this->getProxyRepository()->first($filters, $columns);
    }

    public function get(array $filters = [], array $columns = ['*'])
    {
        return $this->getProxyRepository()->get($filters, $columns);
    }

    public function paginate(array $filters = [], int $perPage = 15, array $columns = ['*'])
    {
        return $this->getProxyRepository()->paginate($filters, $perPage, $columns);
    }

    abstract protected function getProxyRepository(): Repository;
}
