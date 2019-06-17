<?php

namespace VMN\ArticleFindingService;

use Illuminate\Support\Facades\DB;

class RemediesKeywordCondition implements ArticleFindingCondition
{

    protected $keyword;

    protected $page;

    protected $perPage;

    public function setKeyword($keyword)
    {
        $this->keyword = $keyword;

        return $this;
    }

    public function keyword()
    {
        return $this->keyword;
    }

    public function setPage($page)
    {
        $this->page = $page;

        return $this;
    }

    public function setPerPage($perPage)
    {
        $this->perPage = $perPage;
    }
    public function page()
    {
        return $this->page;
    }

    public function getQuery()
    {
        return DB::table('remedies')
            ->where('title','like','%'.$this->keyword.'%')
            ->paginate(6)
            ->appends('keyword', $this->keyword)
            ;
    }
}