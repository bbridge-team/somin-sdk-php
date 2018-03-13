<?php

namespace SoMin\API\Crawler\Responses;

use SoMin\Common\AbstractResponse;
use SoMin\Entities\InstagramFollower;
use SoMin\Entities\TwitterFollower;

class CrawlerFollowers extends AbstractResponse
{
    /** @var array */
    private $followers = [];

    /**
     * @param $data
     */
    public function setData($data)
    {
        if ($this->getHttpCode() != 200) {
            return;
        }

        if (isset($data['followers'])) {
            foreach ($data['followers'] as $follower) {
                $this->followers[] = new TwitterFollower($follower);
            }
        }

        if (isset($data['follower_ids'])) {
            foreach ($data['follower_ids'] as $follower) {
                $this->followers[] = new InstagramFollower($follower);
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