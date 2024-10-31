<?php

namespace App\Observers;

use App\Events\Test;
use App\Models\User;
use Illuminate\Events\Dispatcher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

readonly class UserObserver
{
    public function __construct(
        private Dispatcher $dispatcher
    ) {}

    public function created(User $user): void
    {
        $auth = Auth::user();
//        $this->dispatcher->dispatch(
//            event: new UserCreated(
//               user     : UserEntity::fromEloquent($user),
//               createdBy: UserEntity::fromEloquent($auth)
//           )
//        );

        $this->dispatcher->dispatch(
            new Test("test 123")
        );
    }
}
