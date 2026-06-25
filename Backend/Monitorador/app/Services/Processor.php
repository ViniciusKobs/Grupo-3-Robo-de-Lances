<?php

namespace App\Services;

use App\Contracts\Services\ProcessorInterface;
use App\Domain\Platforms\Enums\PlatformEnum;
use App\Services\Processors\ComprasRsGovProcessor;

abstract class Processor implements ProcessorInterface
{
    public static function build(PlatformEnum $platform): ProcessorInterface {
        return match ($platform) {
            PlatformEnum::COMPRAS_RS_GOV => new ComprasRsGovProcessor(),
        };
    }

    abstract public function process(string $html): array;
}
