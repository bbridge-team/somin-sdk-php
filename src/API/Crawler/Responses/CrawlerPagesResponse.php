<?php

namespace SoMin\API\Crawler\Responses;

use SoMin\Common\AbstractResponse;

class CrawlerPagesResponse extends AbstractResponse
{
    /** @var string[] */
    private $pageIds;

    /** @var int */
    private $crawledAt;

    /**
     * @param $data
     */
    public function setData($data)
    {
        parent::setData($data);

        if ($this->getHttpCode() != 200) {
            return;
        }

        $this->pageIds = $data['data_ids'];
        $this->crawledAt = $data['crawled_at'];
    }

    /**
     * Page identifiers.
     *
     * @return string[]
     */
    public function getPageIds()
    {
        return $this->pageIds;
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