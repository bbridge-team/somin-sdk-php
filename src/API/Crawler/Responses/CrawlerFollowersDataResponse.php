<?php

namespace SoMin\API\Crawler\Responses;

use SoMin\Common\AbstractResponse;
use SoMin\Entities\Follower;
use SoMin\Utils;

class CrawlerFollowersDataResponse extends AbstractResponse
{
    /** @var array */
    private $followers = [];

    /**
     * @param $data
     * @throws \Exception
     */
    public function setData($data)
    {
        parent::setData($data);

        if ($this->getHttpCode() != 200) {
            return;
        }

        $source = Utils::get($data, 'source');

        if (isset($data['osnUserData'])) {
            foreach ($data['osnUserData'] as $followerData) {
                 $follower = new Follower($followerData);
                 $follower->setSource($source);

                 $this->followers[] = $follower;
            }
        }
    }

    /**
     * @return array
     */
    public function getFollowers()
    {
        return $this->followers;
    }
}