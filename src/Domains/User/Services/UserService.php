<?php
/**
 * blog-pf
 * 10/30/24,2:32 pm
 */

namespace Domains\User\Services;

use App\Models\User;
use Domains\User\Entities\UserEntity;
use Domains\User\Repositories\UserRepository;
use Illuminate\Support\Collection;

final readonly class UserService
{
    public function __construct(
        private UserRepository $userRepository
    ) {}

    /**
     * @return Collection<UserEntity>
     */
    public function all(): Collection
    {
        //map over user and turn them into user entities
        return $this->userRepository->all()->map(
            callback: fn(User $user): UserEntity => UserEntity::fromEloquent(
                user: $user
            )
        );
    }

    public function findByEmail(string $email): ?UserEntity
    {
        return UserEntity::fromEloquent(
            $this->userRepository->query()
                ->where('email', $email)
                ->first()
        );
    }
}
