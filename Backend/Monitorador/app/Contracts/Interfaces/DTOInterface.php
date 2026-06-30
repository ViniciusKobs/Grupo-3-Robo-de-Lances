<?php

namespace app\Contracts\Interfaces;

interface DTOInterface
{
    public static function fromArray(array $data): self;
    public function toArray(): array;
}
