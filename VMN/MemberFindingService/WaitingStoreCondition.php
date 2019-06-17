<?php

namespace VMN\MemberFindingService;


class WaitingStoreCondition implements MemberFindingCondition
{

    public function getQuery()
    {
        return \DB::table('credentials')
//            ->join('herbal_medicine_stores', 'credentials.name' , '=', 'herbal_medicine_stores.accountName')
            ->where('status', '=', 'wait')
            ->get();
        ;
    }
}