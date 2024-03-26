<?php

namespace App\Services\Impl;

use App\Services\ResourceService;
use App\Enums\MasterResource;
use App\Repository\ResourceRepository;

class ResourceServiceImpl implements ResourceService
{
    /**
     * Create a new class instance.
     */
    public function __construct
    (
    	protected ResourceRepository $resourceRepository
    )
    {
        //
    }

    public function isConnectedResource(MasterResource $resource): bool
    {
    	$id = null;
    	switch ($resource) {
    		case MasterResource::TODOLIST:
    			$id = 1;
    			break;
    		default:
    			$id = 000;
    			break;
    	}
    
        return $this->resourceRepository->getConnectedApp($id)->isEmpty();
    }
}
