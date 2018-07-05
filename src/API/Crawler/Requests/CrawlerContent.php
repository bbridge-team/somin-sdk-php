<?php

namespace SoMin\API\Crawler\Requests;

use SoMin\Common\AbstractRequest;

/**
 * Structure to be send in Crawler Retrieval request.
 */
class CrawlerContent extends AbstractRequest
{
    /**
     * CrawlerRetrievalData constructor.
     */
    public function __construct()
    {
        $this->setRetrieveTill(0);
    }

    /**
     * User id in social network.
     *
     * @param string $userId
     * @return $this
     */
    public function setUserId($userId)
    {
        $this->data['id'] = $userId;
        return $this;
    }

    /**
     * User string identifier.
     *
     * @param $userName
     * @return $this
     */
    public function setUserName($userName)
    {
        $this->data['username'] = $userName;

        return $this;
    }

    /**
     * Number of records in the return page when paginating.
     *
     * @param int $pageSize
     * @return $this
     */
    public function setPageSize($pageSize)
    {
        $this->params['page-size'] = $pageSize;
        return $this;
    }

    /**
     * Data source identifier.
     *
     * @param string $dataSource
     * @return $this
     */
    public function setDataSource($dataSource)
    {
        $this->data['data_source'] = $dataSource;
        return $this;
    }

    /**
     * Crawl posts data.
     *
     * @return $this
     */
    public function withPosts()
    {
        $this->data['posts'] = true;

        return $this;
    }

    /**
     * Crawl profile data.
     *
     * @return $this
     */
    public function withProfile()
    {
        $this->data['profile'] = true;

        return $this;
    }

    /**
     * Count of retrieval data.
     *
     * @param int $numToRetrieve
     * @return $this
     */
    public function setNumToRetrieve($numToRetrieve)
    {
        $this->params['num-retrieve'] = $numToRetrieve;
        return $this;
    }

    /**
     * Add social network to recursive crawling.
     *
     * @param $dataSource
     * @return $this
     */
    public function addRecursive($dataSource)
    {
        $this->data['recursive'][] = $dataSource;

        return $this;
    }

    /**
     * Retrieve data until current identifier
     *
     * @param string $id
     * @return $this
     */
    public function setRetrieveTill($id)
    {
        $this->params['retrieve-till'] = $id;
        return $this;
    }
}