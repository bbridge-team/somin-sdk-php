<?php

namespace SoMin\API\Crawler\Responses;

use SoMin\Common\AbstractResponse;

class CrawlerDataId extends AbstractResponse
{
    /** @var string */
    private $dataId;

    /**
     * @param $data
     */
    public function setData($data)
    {
        if ($this->getHttpCode() != 200) {
            return;
        }

        $this->dataId = $data['value'];
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
}