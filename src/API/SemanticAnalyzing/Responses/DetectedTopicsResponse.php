<?php

namespace SoMin\API\SemanticAnalyzing\Responses;

use SoMin\Common\AbstractResponse;

class DetectedTopicsResponse extends AbstractResponse
{
    /** @var array */
    private $topicsList;

    public function setData($data)
    {
        parent::setData($data);

        if ($this->getHttpCode() != 200) {
            return;
        }

        $this->topicsList = $data['topics_list'];
    }

    /**
     * @return array
     */
    public function getTopicsList()
    {
        return $this->topicsList;
    }
}