<?php

namespace app\Domain\Tender\DTOs;

use app\Contracts\Interfaces\DTOInterface;
use app\Domain\Item\DTOs\Item as ItemDTO;
use app\Domain\User\DTOs\User as UserDTO;

class Tender implements DTOInterface
{
    public function __construct(
        private readonly ?string $id,
        private readonly ?string $url,
        private readonly ?string $platform_id,
        private readonly ?string $last_checked_at,
        private readonly ?bool   $active,
        private readonly ?array  $users = null,
        private readonly ?array  $items = null,
    ) {}

    public static function fromArray(array $data): self
    {
        $users = null;

        if (!empty($data['users'])) {
            $users = array_map(fn ($user) => UserDTO::fromArray($user), $data['users']);
        }

        else if (!empty($data['user_tenders'])) {
            $rawUsers = array_map(fn ($userTender) => $userTender['user'], $data['user_tenders']);
            $users = array_map(fn ($user) => UserDTO::fromArray($user), $rawUsers);
        }

        $items = array_map(fn ($item) => ItemDTO::fromArray($item), $data['items'] ?? []);

        return new self(
            $data['id'],
            $data['url'],
            $data['platform_id'],
            $data['last_checked_at'],
            $data['active'],
            empty($users) ? null : $users,
            empty($items) ? null : $items,
        );
    }

    public function toArray(): array
    {
        return [
            'id'              => $this->id,
            'url'             => $this->url,
            'platform_id'     => $this->platform_id,
            'last_checked_at' => $this->last_checked_at,
            'active'          => $this->active,
            'users'           => array_map(fn ($user) => $user->toArray(), $this->users),
            'items'           => array_map(fn ($item) => $item->toArray(), $this->items),
        ];
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function getUsers(): ?array
    {
        return $this->users;
    }

    public function getItems(): ?array
    {
        return $this->items;
    }
}
