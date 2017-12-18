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
    public abstract function setData($data);

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
}