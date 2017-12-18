<?php


namespace SoMin\API\NLP\Responses;


use SoMin\Common\AbstractResponse;

class Sentiment extends AbstractResponse
{
    /** @var array */
    private $sentiments;

    /**
     * @param $data
     */
    public function setData($data)
    {
        if ($this->getHttpCode() != 200) {
            return;
        }

        $this->sentiments = $data['results'];
    }

    /**
     * @return array
     */
    public function getSentiments()
    {
        return $this->sentiments;
    }
}