<?php

namespace SoMin\Test;

use SoMin\API\Crawler\CrawlerProcessor;
use SoMin\API\Crawler\Requests\CrawlerUserData;
use SoMin\API\Crawler\Requests\CrawlerFollowers;
use SoMin\API\Crawler\Requests\CrawlerUser;
use SoMin\API\Crawler\Requests\CrawlerFollowersData;
use SoMin\API\Crawler\Requests\CrawlerSearch;
use SoMin\API\Crawler\Requests\DataSourceEnum;
use SoMin\API\Crawler\Requests\InstagramVenueId;
use SoMin\API\Crawler\Responses\CrawlerContentDataResponse;
use SoMin\API\Crawler\Responses\CrawlerPagesResponse;
use SoMin\API\Crawler\Responses\CrawlerFollowersDataResponse;
use SoMin\API\Crawler\Responses\InstagramVenueResponse;

class CrawlerTest extends AbstractTest
{
    public function testCanRequestCrawlerRetrieveAndDownloadAndGetCorrectResults()
    {
        $this->authorize();

        $crawlerProcessor = new CrawlerProcessor($this->requester);
        $retrieveRequest = (new CrawlerUser())
            ->setDataSource(DataSourceEnum::TWITTER)
            ->setPageSize(20)
            ->setNumToRetrieve(100)
            ->setUserName('realdonaldtrump')
            ->addRecursive(DataSourceEnum::INSTAGRAM)
            ->withPosts()
            ->withProfile();

        $dataIdResponse = $crawlerProcessor->user($retrieveRequest);
        $this->assertRequestIDResponse($dataIdResponse);

        /** @var CrawlerPagesResponse $response */
        $response = $this->receiveResponse($dataIdResponse->getRequestId(), CrawlerPagesResponse::class);
        $this->assertNotNull($response);
        $this->assertInstanceOf(CrawlerPagesResponse::class, $response);
        $this->assertEquals(200, $response->getHttpCode());
        $this->assertNotEmpty($response->getPageIds());
        $this->assertNotEmpty($response->getCrawledAt());

        $downloadRequest = (new CrawlerUserData())
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

        /** @var CrawlerPagesResponse $response */
        $response = $this->receiveResponse($dataIdResponse->getRequestId(), CrawlerPagesResponse::class);
        $this->assertNotNull($response);
        $this->assertInstanceOf(CrawlerPagesResponse::class, $response);
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

    public function testCanRequestCrawlerTimelineSearchAndDownloadCorrectResults()
    {
        $this->authorize();

        $crawlerProcessor = new CrawlerProcessor($this->requester);
        $timelineRequest = (new CrawlerSearch())
            ->setNumToRetrieve(25)
            ->setPageSize(5)
            ->setDataSource(DataSourceEnum::TWITTER)
            ->setAnyOfTheseWords(['SpaceX', 'BlueOrigin'])
            ->setHashTags(['space', 'infinity'])
            ->setLocation('Washington DC')
            ->setWithin(50);

        $dataIdResponse = $crawlerProcessor->search($timelineRequest);
        $this->assertRequestIDResponse($dataIdResponse);

        /** @var CrawlerPagesResponse $response */
        $response = $this->receiveResponse($dataIdResponse->getRequestId(), CrawlerPagesResponse::class);
        $this->assertNotNull($response);
        $this->assertInstanceOf(CrawlerPagesResponse::class, $response);
        $this->assertEquals(200, $response->getHttpCode());
        $this->assertNotEmpty($response->getPageIds());
        $this->assertNotEmpty($response->getCrawledAt());

        $downloadRequest = (new CrawlerUserData())
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

    public function testCanRequestInstagramVenueAndDownloadCorrectResult()
    {
        $this->authorize();

        $venueId = 1810148059025199;

        $crawlerProcessor = new CrawlerProcessor($this->requester);
        $instagramVenueRequest = (new InstagramVenueId())
            ->setVenueId($venueId);

        $dataIdResponse = $crawlerProcessor->instagramVenue($instagramVenueRequest);
        $this->assertRequestIDResponse($dataIdResponse);

        /** @var InstagramVenueResponse $response */
        $response = $this->receiveResponse($dataIdResponse->getRequestId(), InstagramVenueResponse::class);
        $this->assertNotNull($response);
        $this->assertInstanceOf(InstagramVenueResponse::class, $response);
        $this->assertEquals(200, $response->getHttpCode());
        $this->assertEquals($venueId, $response->getVenueId());
        $this->assertNotEmpty($response->getName());
        $this->assertNotEmpty($response->getLat());
        $this->assertNotEmpty($response->getLng());
    }
}