<?php
/**
 * ddd-blog
 * 10/30/24,4:04 pm
 */

namespace Tests\Feature;

use App\Models\User;
use Domains\User\Repositories\UserRepository;
use Domains\User\Services\UserService;
use Illuminate\Database\DatabaseManager;
use Tests\TestCase;

class TestUserService extends TestCase
{
    public function testIndexUserService()
    {
        $userService = $this->userService();
        $users = $userService->all()->toArray();
        dd($users);
    }

    public function testShowUserService(){
        $userService = $this->userService();
        $users = $userService->findByEmail("garrett58@example.org");
        dd($users->toArray());
    }

    private function userService(): UserService{
       return new UserService(
            new UserRepository(
                database: resolve(DatabaseManager::class),
                query: User::query(),
            )
        );
    }
}
