<?php

namespace App\Repository\Impl;

use App\Constants\TableName;
use App\Repository\MenuRepository;
use Illuminate\Support\Facades\DB;

class MenuRepositoryImpl implements MenuRepository
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getEligibleMenuByRoldeCode(string $roleCode)
    {
        return DB::table(TableName::USER_MENU_ACCESS.' as uma')
            ->join(TableName::MENU_ACCESS.' as ma', 'uma.menu_access_id', '=', 'ma.id')
            ->join(TableName::MENU_ACCESS_DETAIL.' as mad', 'ma.id', '=', 'mad.menu_access_id')
            ->join(TableName::MENU_ITEM.' as item', 'item.id', '=', 'mad.menu_item_id')
            ->join(TableName::MENU_PARENT.' as parent', 'parent.id', '=', 'item.menu_parent_id')
            ->where('uma.role_code', $roleCode)
            ->where('mad.enabled', true)
            ->select(
                'parent.id as parent_id',
                'parent.sequence as parent_sequence',
                'parent.name as parent_name',
                'item.menu_parent_id as item_parent_id',
                'item.name as item_name',
                'item.sequence as item_sequence',
                'item.page as item_page'
            )
            ->get();
    }
}
