<?php

namespace SoMin\API\Crawler;

use SoMin\API\Crawler\Requests\CrawlerUserData;
use SoMin\API\Crawler\Requests\CrawlerFollowers;
use SoMin\API\Crawler\Requests\CrawlerUser;
use SoMin\API\Crawler\Requests\CrawlerFollowersData;
use SoMin\API\Crawler\Requests\CrawlerSearch;
use SoMin\API\Crawler\Requests\InstagramVenueId;
use SoMin\Common\APIRequester;
use SoMin\Common\RequestIDResponse;

class CrawlerProcessor extends APIRequester
{
    /**
     * Performs Crawler Content API request.
     *
     * @param CrawlerUser $content Retrieval data object.
     *
     * @return RequestIDResponse
     */
    public function user(CrawlerUser $content)
    {
        return $this->post('data/user', $content, RequestIDResponse::class);
    }

    /**
     * Performs Crawler Content Downloading API request.
     *
     * @param CrawlerUserData $contentData Download data object.
     *
     * @return RequestIDResponse
     */
    public function contentDownload(CrawlerUserData $contentData)
    {
        return $this->post('data/content/download', $contentData, RequestIDResponse::class);
    }

    /**
     * Performs Crawler Followers API request.
     *
     * @param CrawlerFollowers $followersData
     *
     * @return RequestIDResponse
     */
    public function followers(CrawlerFollowers $followersData)
    {
        return $this->post('data/followers', $followersData, RequestIDResponse::class);
    }

    /**
     * Performs Crawled Followers Downloading Request
     *
     * @param CrawlerFollowersData $contentData Download data object.
     *
     * @return RequestIDResponse
     */
    public function followersDownload(CrawlerFollowersData $contentData)
    {
        return $this->post('data/followers/download', $contentData, RequestIDResponse::class);
    }

    /**
     * Performs Crawler Timeline API request.
     *
     * @param CrawlerSearch $searchData
     *
     * @return RequestIDResponse
     */
    public function search(CrawlerSearch $searchData)
    {
        return $this->post('data/search', $searchData, RequestIDResponse::class);
    }

    /**
     * Performs Crawler Instagram Venue API request.
     *
     * @param InstagramVenueId $instagramVenueId
     *
     * @return RequestIDResponse
     */
    public function instagramVenue(InstagramVenueId $instagramVenueId)
    {
        return $this->post('data/instagram/venue', $instagramVenueId, RequestIDResponse::class);
    }
}