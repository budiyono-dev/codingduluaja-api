<?php

namespace App\Repository;

interface MenuRepository
{
    public function getEligibleMenuByRoldeCode(string $roleCode);
}
