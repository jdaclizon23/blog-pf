<?php
/**
 * blog-pf
 * 10/30/24,2:28 pm
 */

declare(strict_types=1);

namespace Infrastructure\Repositories;

use Illuminate\Database\DatabaseManager;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\QueryException;

use Throwable;

abstract readonly class Repository implements RepositoryInterface
{
    public function __construct(
        private DatabaseManager $database,
        private Builder $query,
    ) {}

    public function all(): Collection
    {
        return $this->query->get();
    }

    public function find(string $id)
    {
        return $this->query->findOrFail(
            id : $id
        );
    }

    /**
     * @throws Throwable
     */
    public function create(object $entity): void
    {
        try {
            $this->database->transaction(
                callback: fn() => $this->query->create(
                    attributes: $entity->toArray()
                ),
                attempts: 3
            );
        } catch (Throwable $e) {
            throw new QueryException($entity, $e);
        }
    }

    /**
     * @throws Throwable
     */
    public function update(string $id,object $entity): void
    {
        try {
            $this->database->transaction(
                callback: fn() => $this->query->where(
                    column  : 'id',
                    operator: '=',
                    value   : $id
                )->update(
                    values: $entity->toArray()
                ),
                attempts: 3
            );
        } catch (Throwable $e) {
            throw new QueryException($entity, $e);
        }
    }

    public function delete(string $id): void
    {
        try {
            $this->database->transaction(
                callback: fn()=> $this->query->where(
                    column  : 'id',
                    operator: '=',
                    value: $id
                )->delete(),
                attempts: 3
            );
        }catch (Throwable $e){
            throw new QueryException($id, $e);
        }
    }
}
