<?php

namespace App\Repository;

interface MenuRepository
{
    function getEligibleMenuByRoldeCode(string $roleCode);
}
