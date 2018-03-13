<?php

namespace SoMin\Test;

use SoMin\API\Crawler\CrawlerProcessor;
use SoMin\API\Crawler\Requests\CrawlerDownloadData;
use SoMin\API\Crawler\Requests\CrawlerFollowersData;
use SoMin\API\Crawler\Requests\CrawlerRetrievalData;
use SoMin\API\Crawler\Requests\DataSourceEnum;
use SoMin\API\Crawler\Responses\CrawlerData;
use SoMin\API\Crawler\Responses\CrawlerDataId;
use SoMin\API\Crawler\Responses\CrawlerFollowers;

class CrawlerTest extends AbstractTest
{
    public function testCanRequestCrawlerRetrieveAndDownloadAndGetCorrectResults()
    {
        $this->authorize();

        $crawlerProcessor = new CrawlerProcessor($this->requester);
        $retrieveRequest = (new CrawlerRetrievalData())
            ->setDataSource(DataSourceEnum::TWITTERMULTISOURCE)
            ->setNumToRetrieve(10)
            ->setUserId('realdonaldtrump');

        $dataIdResponse = $crawlerProcessor->retrieval($retrieveRequest);
        $this->assertRequestIDResponse($dataIdResponse);

        /** @var CrawlerDataId $response */
        $response = $this->receiveResponse($dataIdResponse->getRequestId(), CrawlerDataId::class);
        $this->assertNotNull($response);
        $this->assertInstanceOf(CrawlerDataId::class, $response);
        $this->assertEquals(200, $response->getHttpCode());
        $this->assertNotEmpty($response->getDataId());
        $this->assertNotEmpty($response->getCrawledAt());

        $downloadRequest = (new CrawlerDownloadData())
            ->setDataId($response->getDataId());

        $dataResponse = $crawlerProcessor->download($downloadRequest);
        $this->assertRequestIDResponse($dataResponse);

        /** @var CrawlerData $response */
        $response = $this->receiveResponse($dataResponse->getRequestId(), CrawlerData::class);
        $this->assertNotNull($response);
        $this->assertInstanceOf(CrawlerData::class, $response);
        $this->assertEquals(200, $response->getHttpCode());
        $this->assertNotNull($response->getUserData());
    }

    public function testCanRequestCrawlerFollowersAndGetCorrectResults()
    {
        $this->authorize();

        $crawlerProcessor = new CrawlerProcessor($this->requester);
        $followersRequest = (new CrawlerFollowersData())
            ->setNumToRetrieve(10)
            ->setUserName('realdonaldtrump')
            ->setDataSource(DataSourceEnum::TWITTER);

        $dataResponse = $crawlerProcessor->followers($followersRequest);
        $this->assertRequestIDResponse($dataResponse);

        /** @var CrawlerFollowers $response */
        $response = $this->receiveResponse($dataResponse->getRequestId(), CrawlerFollowers::class);
        $this->assertNotNull($response);
        $this->assertInstanceOf(CrawlerFollowers::class, $response);
        $this->assertEquals(200, $response->getHttpCode());
        $this->assertNotNull($response->getFollowers());
    }
}