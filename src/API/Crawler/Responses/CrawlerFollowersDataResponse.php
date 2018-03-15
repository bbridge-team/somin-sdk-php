<?php

namespace SoMin\API\Crawler\Responses;

use SoMin\API\Crawler\Requests\DataSourceEnum;
use SoMin\Common\AbstractResponse;
use SoMin\Entities\TwitterFollower;
use SoMin\Entities\InstagramFollower;

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
        if ($this->getHttpCode() != 200) {
            return;
        }

        $followerClass = null;
        switch($data['source']) {
            case DataSourceEnum::TWITTER:
                $followerClass = TwitterFollower::class;
                break;
            case DataSourceEnum::INSTAGRAM:
                $followerClass = InstagramFollower::class;
                break;
            default:
                throw new \Exception("Unsupported follower type '$data[source]'.");
        }

        if (isset($data['followers'])) {
            foreach ($data['followers'] as $follower) {
                $this->followers[] = new $followerClass($follower);
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