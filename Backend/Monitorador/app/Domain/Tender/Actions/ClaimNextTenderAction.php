<?php

namespace app\Domain\Tender\Actions;

use app\Contracts\Interfaces\ActionInterface;
use App\Contracts\Repositories\TenderRepository;

class ClaimNextTenderAction implements ActionInterface
{
    public function __construct(
        private readonly TenderRepository $tenderRepository,
        private readonly string $interval = '5 minutes',
    ) {}

    public function execute()
    {
        $tender = $this->tenderRepository->claimNextForProcessing($this->interval);

        if (empty($tender)) return null;

        if (empty($tender->getUsers())) {
            $this->tenderRepository->deactivateById($tender->getId());
            return null;
        }

        return $tender;
    }
}
