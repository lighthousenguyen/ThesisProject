<?php

namespace VMN\Auth;


class MemberFactory
{
    public function factoryMember($memberRaw)
    {
        $member = new Member();
        $member->setAttribute('accountName', $memberRaw['name']);
        $member->setAttribute('firstName', isset($memberRaw['firstName']) ? $memberRaw['firstName'] : '');
        $member->setAttribute('lastName', isset($memberRaw['lastName']) ? $memberRaw['lastName'] : '');
        $member->setAttribute('DoB', isset($memberRaw['DoB']) ? $memberRaw['DoB'] : '');
        $member->setAttribute('email', $memberRaw['email']);
        $member->setAttribute('gender', isset($memberRaw['gender']) ? $memberRaw['gender'] : '');
        return $member;
    }

    public function factoryStore($storeRaw)
    {
        $store = new HerbalMedicineStore();
        $store->setAttribute('accountName', $storeRaw['name']);
        $store->setAttribute('storename', $storeRaw['storename']);
        $store->setAttribute('address', $storeRaw['address']);
        $store->setAttribute('phonenumber', $storeRaw['phonenumber']);
        $store->setAttribute('email', $storeRaw['email']);
        $store->setAttribute('representative', $storeRaw['representative']);
        return $store;
    }
}
