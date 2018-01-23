<?php

namespace SoMin\API\Crawler;

use SoMin\API\Crawler\Requests\CrawlerDownloadData;
use SoMin\API\Crawler\Requests\CrawlerRetrievalData;
use SoMin\Common\APIRequester;
use SoMin\Common\RequestIDResponse;

class CrawlerProcessor extends APIRequester
{
    /**
     * Performs Crawler Retrieval API request.
     *
     * @param CrawlerRetrievalData $retrievalData Retrieval data object.
     *
     * @return RequestIDResponse
     */
    public function retrieval(CrawlerRetrievalData $retrievalData)
    {
        return $this->post('data/retrieve', $retrievalData, RequestIDResponse::class);
    }

    /**
     * Performs Crawler Download API request.
     *
     * @param CrawlerDownloadData $downloadData Download data object.
     *
     * @return RequestIDResponse
     */
    public function download(CrawlerDownloadData $downloadData)
    {
        return $this->post('data/download', $downloadData, RequestIDResponse::class);
    }
}