<?php

namespace VMN\Auth;


use VMN\Contracts\Auth\Credential;

class AdminProcessor
{
    public function proceedRegister(Credential $credential, $status)
    {
        $credential->setStatus($status);
        $credential->save();
    }

    public function changeStatus(Credential $credential)
    {
        if ($credential->getStatus() == 'active')
        {
            $credential->setStatus('inactive');
            $msg = 'Đã khóa tài khoản';
        }
        elseif($credential->getStatus('inactive'))
        {
            $credential->setStatus('active');
            $msg = 'Đã mở khóa tài khoản';
        }
        $credential->save();
        return $msg;
    }

    public function changeRole(Credential $credential, $role)
    {
        $credential->setRole($role);
        $credential->save();
    }
}