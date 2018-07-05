<?php

namespace SoMin\API\Crawler\Responses;

use SoMin\Common\AbstractResponse;
use SoMin\Entities\OSNUserData;

class CrawlerContentDataResponse extends AbstractResponse
{
    /** @var OSNUserData */
    private $userData;

    /**
     * @param $data
     */
    public function setData($data)
    {
        parent::setData($data);

        if ($this->getHttpCode() != 200) {
            return;
        }

        $this->userData = new OSNUserData($data['osnUserData']);
    }

    /**
     * @return OSNUserData
     */
    public function getUserData()
    {
        return $this->userData;
    }
}