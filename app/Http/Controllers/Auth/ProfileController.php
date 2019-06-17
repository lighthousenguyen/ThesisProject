<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use VMN\Auth\Member;
use VMN\Auth\ProfileFinder;


class ProfileController extends Controller
{

    protected $memberFinder;

    protected $credentialName;

    public function __construct(ProfileFinder $finder)
    {
        $this->memberFinder = $finder;
    }


    public function showMemberProfile($account)
    {
        $credential = $this->memberFinder->getMemberCredential($account);
        if ( ! $credential){
            return 'Người dùng không tồn tại hoặc đang bị khóa';
        }
        elseif($credential->role != 'store')
        {
            $member = $this->memberFinder->getMemberProfile($account);
            $view = 'profile';
        }
        else
        {
            $member = $this->memberFinder->getStoreInfo($account);
            $view = 'storeInfo';
            $prescription = $this->memberFinder->getPrescription($account);
        }
        $member->avatar = $credential->avatar ? $credential->avatar : 'assets/img/team/01.jpg';
        $plantsPosted = $this->memberFinder->getMemberMedicinalPlantsArticle($account);
        $remediesPosted = $this->memberFinder->getMemberRemediesArticle($account);
        $message = $this->memberFinder->getMemberMessage($account);
        $result = view($view)
            ->with('info', $member)
            ->with('plantsPosted', $plantsPosted)
            ->with('remediesPosted', $remediesPosted)
            ->with('message', $message)
            ->with('isMe', $account == Session::get('credential')['attributes']['name'])
            ;
        if($credential->role == 'store'){
            $result->with('prescription', $prescription);
        }
        return $result;
    }

    public function updateProfile(Member $member)
    {
        $member->save();
        return response()->json([
            'message' => 'Đã lưu thay đổi'
        ]);
    }
}