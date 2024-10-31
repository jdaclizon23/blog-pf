<?php
/**
 * ddd-blog
 * 10/30/24,2:58 pm
 */

namespace Domains\User\VOs;

final readonly class VOEmail
{
    public null|string $email;

    /**
     * @param  string|null  $email
     */
    public function __construct(?string $email) {
        if(null === $email){
            $this->email = $email;
        }

        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $this->email = trim($email);
        }
    }
}
