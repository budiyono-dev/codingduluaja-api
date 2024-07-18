<?php

namespace App\Traits;

use App\Constants\CdaContext;

trait ApiContext
{
    public function getContext(): ?array
    {
        return request()->attributes->get(CdaContext::REQUEST_CTX);
    }

    public function getUserId(): ?string
    {
        return $this->getContext()[CdaContext::USER_ID] ?? null;
    }

    public function getRequestId(): ?string
    {
        return $this->getContext()[CdaContext::REQUEST_ID] ?? null;
    }
}
