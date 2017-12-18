<?php


namespace SoMin\API\Common\Requests;

use SoMin\Common\AbstractRequest;

class ResponseRequest extends AbstractRequest
{
    /** @var string */
    private $responseClass;

    public function setRequestID($requestId)
    {
        $this->params['id'] = $requestId;
        return $this;
    }

    /**
     * @return string
     */
    public function getResponseClass()
    {
        return $this->responseClass;
    }

    /**
     * @param string $responseClass
     * @return $this
     */
    public function setResponseClass($responseClass)
    {
        $this->responseClass = $responseClass;
        return $this;
    }

}