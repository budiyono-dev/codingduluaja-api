<?php

namespace App\Repository;

interface ResourceRepository
{
    public function getConnectedApp(int $masterResourceId);
}
