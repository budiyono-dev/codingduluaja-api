<?php

namespace App\Services\Impl;

use App\Constants\TableName;
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
            MasterResourceType::WILAYAH_BPS => 2,
            MasterResourceType::WILAYAH_DAGRI => 3,
            MasterResourceType::USER_API => 4,
            default => 000
        };
        return $this->resourceRepository->getConnectedApp($id)->isEmpty();
    }

    public function getMasterResourceTableName(int $id): string
    {
        return match ($id) {
            1 => TableName::TODOLIST,
            4 => TableName::USER_API,
            default => 000
        };
    }

    public function clearResource(int $userId, int $masterResourceId): void
    {
        if ($masterResourceId === 1) {
            $this->resourceRepository->deleteTodolistByUserId($userId);
        } elseif ($masterResourceId === 4) {
            $this->resourceRepository->deleteUserApiByUserId($userId);
        }
    }
}
