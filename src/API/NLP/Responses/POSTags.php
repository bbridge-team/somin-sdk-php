<?php

namespace SoMin\API\NLP\Responses;

use SoMin\Common\AbstractResponse;

/**
 * Structure to be returned as a result of Part Of SpeechDetection API method.
 */
class POSTags extends AbstractResponse
{
    /** @var array */
    private $posList;

    /**
     * @param $data
     */
    public function setData($data)
    {
        parent::setData($data);

        if ($this->getHttpCode() != 200) {
            return;
        }

        $this->posList = $data['results'];
    }

    /**
     * Parts of speech detected form the input text.
     *
     * @return array
     */
    public function getPOSList()
    {
        return $this->posList;
    }
}