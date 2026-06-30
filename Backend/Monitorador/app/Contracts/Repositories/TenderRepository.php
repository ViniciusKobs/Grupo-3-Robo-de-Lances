<?php

namespace App\Contracts\Repositories;

use app\Domain\Tender\DTOs\Tender as TenderDTO;

interface TenderRepository
{
    public function claimNextForProcessing(string $interval = '5 minutes'): ?TenderDTO;
    public function deactivateById(string $id): void;
}
