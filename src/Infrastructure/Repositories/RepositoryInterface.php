<?php

declare(strict_types=1);

/**
 * blog-pf
 * 10/30/24,1:53 pm
 */

namespace Infrastructure\Repositories;


use Illuminate\Database\DatabaseManager;
use Illuminate\Database\Eloquent\Builder;

/**
 * @property-read DatabaseManager $database
 * @property-read Builder $query
 */
interface RepositoryInterface
{
    public function all();

    public function findById(string $id): null|object;

    public function create(object $entity):void;

    public function update(string $id,object $entity):void;

    public function delete(string $id);

    public function query(): Builder;
}
