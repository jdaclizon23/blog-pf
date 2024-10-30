<?php
/**
 * blog-pf
 * 10/30/24,2:10 pm
 */

namespace Domains\Post\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Infrastructure\Repositories\RepositoryInterface;

class PostRepository implements RepositoryInterface
{
    public function all()
    {
        // TODO: Implement all() method.
    }

    public function find(string $id)
    {
        // TODO: Implement find() method.
    }

    public function create(array $data)
    {
        // TODO: Implement create() method.
    }

    public function update(string $id, array $data)
    {
        // TODO: Implement update() method.
    }

    public function delete(string $id)
    {
        // TODO: Implement delete() method.
    }

    public function query(string $query): Builder
    {
        // TODO: Implement query() method.
    }
}
