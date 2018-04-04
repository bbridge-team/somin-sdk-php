<?php

namespace SoMin\Test;

use SoMin\API\Crawler\CrawlerProcessor;
use SoMin\API\Crawler\Requests\CrawlerContentData;
use SoMin\API\Crawler\Requests\CrawlerFollowers;
use SoMin\API\Crawler\Requests\CrawlerContent;
use SoMin\API\Crawler\Requests\CrawlerFollowersData;
use SoMin\API\Crawler\Requests\DataSourceEnum;
use SoMin\API\Crawler\Responses\CrawlerContentDataResponse;
use SoMin\API\Crawler\Responses\CrawlerContentDataIdResponse;
use SoMin\API\Crawler\Responses\CrawlerFollowerPagesResponse;
use SoMin\API\Crawler\Responses\CrawlerFollowersDataResponse;

class CrawlerTest extends AbstractTest
{
    public function testCanRequestCrawlerRetrieveAndDownloadAndGetCorrectResults()
    {
        $this->authorize();

        $crawlerProcessor = new CrawlerProcessor($this->requester);
        $retrieveRequest = (new CrawlerContent())
            ->setDataSource(DataSourceEnum::TWITTERMULTISOURCE)
            ->setPageSize(5)
            ->setNumToRetrieve(100)
            ->setUserId('realdonaldtrump');

        $dataIdResponse = $crawlerProcessor->content($retrieveRequest);
        $this->assertRequestIDResponse($dataIdResponse);

        /** @var CrawlerContentDataIdResponse $response */
        $response = $this->receiveResponse($dataIdResponse->getRequestId(), CrawlerContentDataIdResponse::class);
        $this->assertNotNull($response);
        $this->assertInstanceOf(CrawlerContentDataIdResponse::class, $response);
        $this->assertEquals(200, $response->getHttpCode());
        $this->assertNotEmpty($response->getPageIds());
        $this->assertNotEmpty($response->getCrawledAt());

        $downloadRequest = (new CrawlerContentData())
            ->setPageId($response->getPageIds()[0]);

        $dataResponse = $crawlerProcessor->contentDownload($downloadRequest);
        $this->assertRequestIDResponse($dataResponse);

        /** @var CrawlerContentDataResponse $response */
        $response = $this->receiveResponse($dataResponse->getRequestId(), CrawlerContentDataResponse::class);
        $this->assertNotNull($response);
        $this->assertInstanceOf(CrawlerContentDataResponse::class, $response);
        $this->assertEquals(200, $response->getHttpCode());
        $this->assertNotNull($response->getUserData());
    }

    public function testCanRequestCrawlerFollowersAndGetCorrectResults()
    {
        $this->authorize();

        $crawlerProcessor = new CrawlerProcessor($this->requester);
        $followersRequest = (new CrawlerFollowers())
            ->setNumToRetrieve(15)
            ->setPageSize(5)
            ->setUserName('realdonaldtrump')
            ->setDataSource(DataSourceEnum::TWITTER);

        $dataIdResponse = $crawlerProcessor->followers($followersRequest);
        $this->assertRequestIDResponse($dataIdResponse);

        /** @var CrawlerFollowerPagesResponse $response */
        $response = $this->receiveResponse($dataIdResponse->getRequestId(), CrawlerFollowerPagesResponse::class);
        $this->assertNotNull($response);
        $this->assertInstanceOf(CrawlerFollowerPagesResponse::class, $response);
        $this->assertEquals(200, $response->getHttpCode());
        $this->assertNotEmpty($response->getPageIds());
        $this->assertNotEmpty($response->getCrawledAt());

        $downloadRequest = (new CrawlerFollowersData())
            ->setPageId($response->getPageIds()[0]);

        $dataResponse = $crawlerProcessor->followersDownload($downloadRequest);
        $this->assertRequestIDResponse($dataResponse);

        /** @var CrawlerFollowersDataResponse $response */
        $response = $this->receiveResponse($dataResponse->getRequestId(), CrawlerFollowersDataResponse::class);
        $this->assertNotNull($response);
        $this->assertInstanceOf(CrawlerFollowersDataResponse::class, $response);
        $this->assertEquals(200, $response->getHttpCode());
        $this->assertNotNull($response->getFollowers());
    }
}