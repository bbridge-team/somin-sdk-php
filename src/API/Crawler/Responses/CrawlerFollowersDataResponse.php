<?php

namespace SoMin\API\Crawler\Responses;

use SoMin\Common\AbstractResponse;
use SoMin\Entities\Follower;

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

        if (isset($data['osn_followers_data'])) {
            foreach ($data['osn_followers_data'] as $followerData) {
                 $follower = new Follower($followerData);
                 $follower->setSource($data['source']);

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