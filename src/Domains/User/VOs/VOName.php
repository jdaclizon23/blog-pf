<?php
/**
 * ddd-blog
 * 10/30/24,3:01 pm
 */

namespace Domains\User\VOs;

final readonly class VOName
{
    /**
     * @param  string|null  $firstName
     * @param  string|null  $lastName
     * @param  string|null  $middleName
     */
    public function __construct(
        public null|string $firstName,
        public null|string $lastName,
        public null|string $middleName)
    {}
}
