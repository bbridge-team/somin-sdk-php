<?php

namespace SoMin\API\Crawler\Requests;

use SoMin\Common\AbstractRequest;

/**
 * Structure to be send in Crawler Download request.
 */
class CrawlerContentData extends AbstractRequest
{
    /**
     * CrawlerContentData constructor.
     */
    public function __construct()
    {
        $this->data['value'] = null;
    }

    /**
     * Page identifier for request.
     *
     * @param string $pageId
     * @return $this
     */
    public function setPageId($pageId)
    {
        $this->data['value'] = $pageId;
        return $this;
    }

    /**
     * Gets page id.
     *
     * @return null|string
     */
    public function getPageId()
    {
        return $this->data['value'];
    }
}