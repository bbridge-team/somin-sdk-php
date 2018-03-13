<?php

namespace SoMin\API\Crawler\Requests;

use SoMin\Common\AbstractRequest;

/**
 * Structure to be send in Crawler Retrieval request.
 */
class CrawlerRetrievalData extends AbstractRequest
{
    /**
     * CrawlerRetrievalData constructor.
     */
    public function __construct()
    {
        $this->setRetrieveTill(0);
    }


    /**
     * User identifier (id, screename, email etc.)
     *
     * @param string $userId
     * @return $this
     */
    public function setUserId($userId)
    {
        $this->data['user_name'] = $userId;
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