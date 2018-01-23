<?php

namespace SoMin\API\Crawler\Requests;

use SoMin\Common\AbstractRequest;

/**
 * Structure to be send in Crawler Download request.
 */
class CrawlerDownloadData extends AbstractRequest
{
    /**
     * Data identifier for request.
     *
     * @param string $dataId
     * @return $this
     */
    public function setDataId($dataId)
    {
        $this->data['value'] = $dataId;
        return $this;
    }
}