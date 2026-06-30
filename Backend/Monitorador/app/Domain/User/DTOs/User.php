<?php

namespace app\Domain\User\DTOs;

use app\Contracts\Interfaces\DTOInterface;

class User implements DTOInterface
{
    public function __construct(
        private readonly ?string $id,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'],
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
        ];
    }
}