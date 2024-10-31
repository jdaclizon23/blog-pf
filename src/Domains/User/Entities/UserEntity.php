<?php
/**
 * blog-pf
 * 10/30/24,3:03 pm
 */

namespace Domains\User\Entities;
use App\Models\User;
use DateTime;
use Domains\User\VOs\VOCredentials;
use Domains\User\VOs\VOEmail;
use Domains\User\VOs\VOName;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Database\Eloquent\JsonEncodingException;
use JsonSerializable;

final readonly class UserEntity implements Arrayable, Jsonable, JsonSerializable
{
    public function __construct(
        public VOName $name,
        public VOCredentials $credentials,
        public null|DateTime $createdAt,
        public null|DateTime $updatedAt,
    ) {}

    public static function fromEloquent(null|User $user): self
    {
        return new UserEntity(
            name       : new VOName(
                             firstName : $user->first_name ?? null,
                             lastName  : $user->last_name ?? null,
                             middleName: $user->middle_name ?? null,
                         ),
            credentials: new VOCredentials(
                             email   : new VOEmail($user->email ?? null),
                             password: $user->password ?? null,
                         ),
            createdAt  : $user->created_at ?? null,
            updatedAt  : $user->updated_at ?? null
        );
    }

    public function toArray(): array
    {
        return [
            "first_name"  => $this->name->firstName,
            "last_name"   => $this->name->lastName,
            "middle_name" => $this->name->middleName,
            "email"       => $this->credentials->username->email,
            "created_at"  => $this->updatedAt,
            "updated_at"  => $this->updatedAt,

        ];
    }

    public function toJson($options = 0): array
    {
        return $this->toArray();
    }

    public function jsonSerialize($options = 0): string|false
    {
        $json = json_encode($this->jsonSerialize(), $options);
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new JsonEncodingException("Unable to encode to json this data");
        }
        return $json;
    }
}
