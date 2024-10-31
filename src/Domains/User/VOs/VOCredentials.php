<?php
/**
 * ddd-blog
 * 10/30/24,3:22 pm
 */

namespace Domains\User\VOs;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;

final readonly class VOCredentials
{
    public object $username;
    private null|string $password;

    /**
     * @param  VOEmail $email
     * @param  string  $password
     */
    public function __construct(VOEmail $email, null|string $password)
    {
        $this->username = $email;
        $this->password = trim($password);
    }
}
