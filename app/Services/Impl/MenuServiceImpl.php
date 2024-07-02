<?php

namespace App\Services\Impl;

use App\Dto\MenuItemDto;
use App\Dto\MenuParentDto;
use App\Models\MenuParent;
use App\Repository\MenuRepository;
use App\Repository\UserRepository;
use App\Services\MenuService;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;

class MenuServiceImpl implements MenuService
{

    public function __construct(
        protected MenuRepository $menuRepository,
        protected UserRepository $userRepository
    ) {
    }

    public function getEligibleMenu()
    {
        $userId = Auth::user()->id;
        $user = $this->userRepository->findById($userId);
        $role = $user->role;
        $code = $role->code;
        $menus = $this->menuRepository->getEligibleMenuByRoldeCode($code);
        return $this->toCollectionDto($menus);
    }

    public function isUserEligible(Request $req)
    {
        $routename = Route::currentRouteName();
        $listMenu = Session::get('LIST_MENU');

        if(is_null($listMenu) || empty($listMenu)){
            return false;
        }

        foreach ($listMenu as $menus) {
            $items = $menus->menuItem;

            if(is_null($items) || empty($items)){
                continue;
            }

            foreach ($items as $item) {
                if ($routename == $item->page){
                    return true;
                }
            }   
        }

        return false;
    }

    private function toCollectionDto(Collection $menus)
    {
        $allmenu = collect([]);
        if (!empty($menus)) {
            $menuParent = new MenuParentDto();
            $parentName = '';
            foreach ($menus as $menu) {
                $menuItem = new MenuItemDto();
                $menuItem->name = $menu->item_name;
                $menuItem->sequence = $menu->item_sequence;
                $menuItem->page = $menu->item_page;

                if ($parentName !== $menu->parent_name) {
                    if ($parentName !== '') {
                        $allmenu->push($menuParent);
                        $menuParent = new MenuParentDto();
                    }
                    $parentName = $menu->parent_name;

                    $menuParent->name = $menu->parent_name;
                    $menuParent->sequence = $menu->parent_sequence;
                    $menuParent->menuItem->push($menuItem);
                } else {
                    $menuParent->menuItem->push($menuItem);
                }
            }
            $allmenu->push($menuParent);
        }
        return $allmenu;
    }
}
