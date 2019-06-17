<?php

namespace VMN\MemberFindingService;


class MemberFinder
{

    public function find(MemberFindingCondition $condition)
    {
        return $condition->getQuery();
    }
}