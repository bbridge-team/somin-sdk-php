<?php

namespace SoMin\API\NLP\Responses;

use SoMin\Common\AbstractResponse;

/**
 * Structure to be returned as a result of Named Entity Recognition API method.
 */
class NamedEntities extends AbstractResponse
{
    /** @var array */
    private $namedEntities;

    /**
     * @param $data
     */
    public function setData($data)
    {
        parent::setData($data);

        if ($this->getHttpCode() != 200) {
            return;
        }

        $this->namedEntities = $data['results'];
    }

    /**
     * Lists of named entities detected from the given text.
     *
     * @return array
     */
    public function getNamedEntities()
    {
        return $this->namedEntities;
    }
}