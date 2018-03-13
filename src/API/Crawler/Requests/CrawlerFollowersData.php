<?php

namespace SoMin\API\Crawler\Requests;

use SoMin\Common\AbstractRequest;

/**
 * Structure to be send in Crawler Download request.
 */
class CrawlerFollowersData extends AbstractRequest
{
    /**
     * Number of latest posts to retrieve.
     *
     * @param $number
     * @return $this
     */
    public function setNumToRetrieve($number)
    {
        $this->params['num-retrieve'] = $number;
        return $this;
    }

    /**
     * Social network user name (supported by all crawlers)
     * or id (supported by all crawlers except for email)
     *
     * @param $username
     * @return $this
     */
    public function setUserName($username)
    {
        $this->data['user_name'] = $username;
        return $this;
    }

    /**
     * Data source type (twitter, instagram, email, twittermultisource).
     *
     * @param $dataSource
     * @return $this
     */
    public function setDataSource($dataSource)
    {
        $this->data['data_source'] = $dataSource;
        return $this;
    }
}