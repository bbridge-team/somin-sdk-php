<?php

namespace SoMin\API\Crawler\Requests;

use SoMin\Common\AbstractRequest;

/**
 * Structure to be send in Crawler Download request.
 */
class CrawlerContentData extends AbstractRequest
{
    /**
     * Page identifier for request.
     *
     * @param string $pageId
     * @return $this
     */
    public function addPageId($pageId)
    {
        $this->data['values'][] = $pageId;
        return $this;
    }
}