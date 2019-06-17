<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Middleware\AdminUserDataMiddleWare;
use VMN\MemberFindingService\WaitingStoreCondition;
use VMN\MemberFindingService\AllUserCondition;
use VMN\MemberFindingService\MemberFinder;
use VMN\MemberFindingService\MemberInformationCondition;

class AdminUsersDataController extends Controller
{

    protected $adminFinder;

    public function __construct(MemberFinder $finder)
    {
        $this->adminFinder = $finder;
        $this->middleware(AdminUserDataMiddleWare::class);
    }
    
    public function adminHome()
    {
        return view('admin/dashboard');
    }

    public function adminGetApprove(WaitingStoreCondition $condition)
    {
        $listStore = $this->adminFinder->find($condition);
        return view('admin/waitingStore')
            ->with('waiting', $listStore)
            ;
    }

    public function adminAllUsers(AllUserCondition $condition)
    {
        $list = $this->adminFinder->find($condition);
        return view('admin/MemberManagement')
            ->with('list', $list)
            ;
    }

    public function adminStoreInfo(MemberInformationCondition $condition)
    {
        $list = $this->adminFinder->find($condition);
        return response()->json([
           json_encode($list)
        ]);
    }

    public function adminUserDetail(MemberInformationCondition $condition)
    {
        $user = $this->adminFinder->find($condition);
        return response()->json([
            json_encode($user)
        ]);
    }

}