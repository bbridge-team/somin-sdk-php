<?php


namespace SoMin\Common;

/**
 * Handle setting and storing config for SoMin API.
 *
 * @author Lepikhin Kirill
 */
class Config
{
    /** @var int How long to wait for a response from the API */
    protected $timeout = 5;
    /** @var int how long to wait while connecting to the API */
    protected $connectionTimeout = 5;
    /** @var int How many times we retry request when API is down */
    protected $maxRetries = 0;
    /** @var int Delay in seconds before we retry the request */
    protected $retriesDelay = 1;

    /** @var string User-Agent header */
    protected $userAgent = 'SoMin API PHP SDK Client';
    /** @var array Store proxy connection details */
    protected $proxy = [];

    /** @var bool Whether to encode the curl requests with gzip or not */
    protected $gzipEncoding = true;

    /** @var string|null Application bearer token */
    protected $bearer = null;

    /**
     * Set the connection and response timeouts.
     *
     * @param int $connectionTimeout
     * @param int $timeout
     * @return $this
     */
    public function setTimeouts($connectionTimeout, $timeout)
    {
        $this->connectionTimeout = (int)$connectionTimeout;
        $this->timeout = (int)$timeout;
        return $this;
    }

    /**
     * Set the number of times to retry on error and how long between each.
     *
     * @param int $maxRetries
     * @param int $retriesDelay
     * @return $this
     */
    public function setRetries($maxRetries, $retriesDelay)
    {
        $this->maxRetries = (int)$maxRetries;
        $this->retriesDelay = (int)$retriesDelay;
        return $this;
    }

    /**
     * @param string $userAgent
     * @return $this
     */
    public function setUserAgent($userAgent)
    {
        $this->userAgent = (string)$userAgent;
        return $this;
    }

    /**
     * @param array $proxy
     * @return $this
     */
    public function setProxy($proxy)
    {
        $this->proxy = $proxy;
        return $this;
    }

    /**
     * Whether to encode the curl requests with gzip or not.
     *
     * @param bool $gzipEncoding
     * @return $this
     */
    public function setGzipEncoding($gzipEncoding)
    {
        $this->gzipEncoding = (bool)$gzipEncoding;
        return $this;
    }

    /**
     * @param null|string $bearer
     * @return Config
     */
    public function setBearer($bearer)
    {
        $this->bearer = $bearer;
        return $this;
    }
}