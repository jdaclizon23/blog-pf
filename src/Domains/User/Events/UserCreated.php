<?php
/**
 * ddd-blog
 * 10/30/24,3:32 pm
 */

namespace Domains\User\Events;

use Domains\User\Entities\UserEntity;
use Illuminate\Broadcasting\PrivateChannel;
use Infrastructure\Events\DomainEvent;

final class UserCreated extends DomainEvent
{
    private null|UserEntity $user;
    private null|UserEntity $createdBy;

    public function __construct(
         null|UserEntity $user,
         null|UserEntity $createdBy,
    ) {
        $this->user = $user;
        $this->createdBy = $createdBy;
    }

    public function broadcastOn(): array
    {
        return [
          new PrivateChannel('user.created'),
        ];
    }
}
