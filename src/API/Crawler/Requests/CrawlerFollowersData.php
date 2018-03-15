<?php

namespace SoMin\API\Crawler\Requests;

use SoMin\Common\AbstractRequest;

/**
 * Structure to be send in Crawler Download request.
 */
class CrawlerFollowersData extends AbstractRequest
{
    /**
     * Data identifier for request.
     *
     * @param string $dataId
     * @return $this
     */
    public function addDataId($dataId)
    {
        $this->data['values'][] = $dataId;
        return $this;
    }
}