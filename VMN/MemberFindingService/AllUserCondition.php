<?php

namespace VMN\MemberFindingService;


class AllUserCondition implements MemberFindingCondition
{

    public function getQuery()
    {
        return \DB::table('credentials')
            ->whereNotIn('status', ['wait','denied'])
            ->where('role','<>', 'admin')
            ->get();
        ;
    }
}