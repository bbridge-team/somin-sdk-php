<?php

namespace SoMin\Common;

/**
 * The result of the most recent API request.
 */
abstract class AbstractResponse
{
    /** @var int HTTP status code from the most recent request */
    protected $httpCode = 0;
    /** @var array HTTP headers from the most recent request without X headers */
    protected $headers = [];
    /** @var array HTTP headers from the most recent request that start with X */
    private $xHeaders = [];
    /** @var string Text of raised error. */
    private $error;

    /**
     * @param array $headers
     * @return $this
     */
    public function setHeaders(array $headers)
    {
        foreach ($headers as $key => $value) {
            if (substr($key, 0, 1) == 'x') {
                $this->xHeaders[$key] = $value;
            } else {
                $this->headers[$key] = $value;
            }
        }

        return $this;
    }

    /**
     * @param int $httpCode
     * @return $this
     */
    public function setHttpCode($httpCode)
    {
        $this->httpCode = $httpCode;
        return $this;
    }

    /**
     * @param $data
     */
    public function setData($data)
    {
        if ($this->getHttpCode() >= 400 && !empty($data['message'])) {
            $this->error = $data['message'];
        }
    }

    /**
     * @return int
     */
    public function getHttpCode()
    {
        return $this->httpCode;
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @return array
     */
    public function getXHeaders()
    {
        return $this->xHeaders;
    }

    /**
     * Error message if request went wrong. Null if request is successful.
     *
     * @return string|null
     */
    public function getError()
    {
        return $this->error;
    }
}