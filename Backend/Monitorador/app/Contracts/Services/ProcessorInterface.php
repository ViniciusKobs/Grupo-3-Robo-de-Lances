<?php

namespace App\Contracts\Services;

interface ProcessorInterface
{
    // TODO: criar DTO para retorno do processamento
    public function process(string $html): array;
}