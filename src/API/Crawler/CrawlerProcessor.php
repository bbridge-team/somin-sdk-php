<?php

namespace SoMin\API\Crawler;

use SoMin\API\Crawler\Requests\CrawlerContentData;
use SoMin\API\Crawler\Requests\CrawlerFollowers;
use SoMin\API\Crawler\Requests\CrawlerContent;
use SoMin\API\Crawler\Requests\CrawlerFollowersData;
use SoMin\API\Crawler\Requests\CrawlerTimeline;
use SoMin\Common\APIRequester;
use SoMin\Common\RequestIDResponse;

class CrawlerProcessor extends APIRequester
{
    /**
     * Performs Crawler Content API request.
     *
     * @param CrawlerContent $content Retrieval data object.
     *
     * @return RequestIDResponse
     */
    public function user(CrawlerContent $content)
    {
        return $this->post('data/user', $content, RequestIDResponse::class);
    }

    /**
     * Performs Crawler Content Downloading API request.
     *
     * @param CrawlerContentData $contentData Download data object.
     *
     * @return RequestIDResponse
     */
    public function contentDownload(CrawlerContentData $contentData)
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
     * @param CrawlerTimeline $timelineData
     *
     * @return RequestIDResponse
     */
    public function timeline(CrawlerTimeline $timelineData)
    {
        return $this->post('data/timeline', $timelineData, RequestIDResponse::class);
    }
}