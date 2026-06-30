<?php

namespace app\Domain\Item\DTOs;

use app\Contracts\Interfaces\DTOInterface;

class Item implements DTOInterface
{
    public function __construct(
        private readonly ?string $id,
        private readonly ?string $url,
        private readonly ?string $tender_id,
        private readonly ?string $last_checked_at,
        private readonly ?bool   $active,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['url'],
            $data['tender_id'],
            $data['last_checked_at'],
            $data['active'],
        );
    }

    public function toArray(): array
    {
        return [
            'id'              => $this->id,
            'url'             => $this->url,
            'tender_id'       => $this->tender_id,
            'last_checked_at' => $this->last_checked_at,
            'active'          => $this->active,
        ];
    }
}