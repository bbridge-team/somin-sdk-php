<?php


namespace SoMin\Common;


class RequestIDResponse extends AbstractResponse
{
    /** @var string */
    private $requestId;

    /** @var string */
    private $error;

    /**
     * @param $data
     */
    public function setData($data)
    {
        if (!empty($data['error'])) {
            $this->error = $data['error'];
        }

        if ($this->getHttpCode() == 202) {
            $this->requestId = $data['request_id'];
        }
    }

    /**
     * @return string
     */
    public function getRequestId()
    {
        return $this->requestId;
    }

    /**
     * @return string
     */
    public function getError()
    {
        return $this->error;
    }
}