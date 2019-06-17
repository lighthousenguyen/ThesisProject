<?php

namespace VMN\ArticleReportingService;


class Report
{
    protected $reason;

    protected $reporter;

    protected $reported;

    /**
     * @return string
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * @param string $reason
     */
    public function setReason($reason)
    {
        $this->reason = $reason;
    }

    /**
     * @return string
     */
    public function getReporter()
    {
        return $this->reporter;
    }

    /**
     * @param string $reporter
     */
    public function setReporter($reporter)
    {
        $this->reporter = $reporter;
    }

    /**
     * @return string
     */
    public function getReported()
    {
        return $this->reported;
    }

    /**
     * @param string $reported
     */
    public function setReported($reported)
    {
        $this->reported = $reported;
    }
    
    
}