<?php

namespace App\Services\Impl;

use App\Services\ResourceService;
use App\Enums\MasterResourceType;
use App\Repository\ResourceRepository;

class ResourceServiceImpl implements ResourceService
{
    public function __construct(
        protected ResourceRepository $resourceRepository
    ) {
        //
    }

    public function isConnectedResource(MasterResourceType $resource): bool
    {
        $id = match ($resource) {
            MasterResourceType::TODOLIST => 1,
            MasterResourceType::MAHASISWA => 2,
            MasterResourceType::WILAYAH_BPS => 3,
            MasterResourceType::WILAYAH_DAGRI => 4,
            MasterResourceType::USER_API => 5,
            default => 000
        };
        return $this->resourceRepository->getConnectedApp($id)->isEmpty();
    }
}
