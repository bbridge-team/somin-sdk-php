<?php

namespace SoMin\API\Crawler\Responses;

use SoMin\Common\AbstractResponse;

class CrawlerDataId extends AbstractResponse
{
    /** @var string */
    private $dataId;

    /** @var int */
    private $crawledAt;

    /**
     * @param $data
     */
    public function setData($data)
    {
        if ($this->getHttpCode() != 200) {
            return;
        }

        $this->dataId = $data['data_id'];
        $this->crawledAt = $data['crawled_at'];
    }

    /**
     * Data identifier.
     *
     * @return string
     */
    public function getDataId()
    {
        return $this->dataId;
    }

    /**
     * Crawled date.
     *
     * @return int
     */
    public function getCrawledAt()
    {
        return $this->crawledAt;
    }
}