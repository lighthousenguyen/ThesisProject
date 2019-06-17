<?php

namespace VMN\MemberFindingService;


interface MemberFindingCondition
{
    public function getQuery();
}