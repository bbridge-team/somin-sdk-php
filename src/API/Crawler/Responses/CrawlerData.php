<?php

namespace SoMin\API\Crawler\Responses;

use SoMin\Common\AbstractResponse;
use SoMin\Entities\OSNUserData;

class CrawlerData extends AbstractResponse
{
    /** @var OSNUserData */
    private $userData;

    /**
     * @param $data
     */
    public function setData($data)
    {
        if ($this->getHttpCode() != 200) {
            return;
        }

        $this->userData = new OSNUserData($data['osn_user_data']);
    }

    /**
     * @return OSNUserData
     */
    public function getUserData()
    {
        return $this->userData;
    }
}