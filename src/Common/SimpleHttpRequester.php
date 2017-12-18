<?php


namespace SoMin\Common;


use SoMin\Common\Interfaces\HttpRequesterInterface;

class SimpleHttpRequester extends Config implements HttpRequesterInterface
{
    private function curlOptions()
    {
        $options = [
            CURLOPT_CONNECTTIMEOUT  => $this->connectionTimeout,
            CURLOPT_HEADER          => true,
            CURLOPT_RETURNTRANSFER  => true,
            CURLOPT_SSL_VERIFYHOST  => 2,
            CURLOPT_SSL_VERIFYPEER  => true,
            CURLOPT_TIMEOUT         => $this->timeout,
            CURLOPT_USERAGENT       => $this->userAgent
        ];

        if ($this->gzipEncoding) {
            $options[CURLOPT_ENCODING] = 'gzip';
        }

        if (!empty($this->proxy)) {
            $options[CURLOPT_PROXY] = $this->proxy['CURLOPT_PROXY'];
            $options[CURLOPT_PROXYUSERPWD] = $this->proxy['CURLOPT_PROXYUSERPWD'];
            $options[CURLOPT_PROXYPORT] = $this->proxy['CURLOPT_PROXYPORT'];
            $options[CURLOPT_PROXYAUTH] = CURLAUTH_BASIC;
            $options[CURLOPT_PROXYTYPE] = CURLPROXY_HTTP;
        }

        return $options;
    }

    protected function buildHeaders()
    {
        $headers = [
            'Accept: application/json',
            'Content-Type: application/json'
        ];

        if ($this->bearer) {
            $headers[] = 'Authorization: ' . $this->bearer;
        }

        return $headers;
    }

    /**
     * @param $url
     * @param $method
     * @param AbstractRequest $request
     * @param AbstractResponse $response
     * @throws RequestException
     * @return AbstractResponse
     */
    public function request($url, $method, AbstractRequest $request, AbstractResponse $response)
    {
        $options = $this->curlOptions();
        $options[CURLOPT_URL] = $url . $request->buildQueryData();
        $options[CURLOPT_HTTPHEADER] = $this->buildHeaders();

        if ($method == 'POST') {
            $options[CURLOPT_POST] = true;
            $options[CURLOPT_POSTFIELDS] = $request->buildPostData();
        }

        $curlHandle = curl_init();
        curl_setopt_array($curlHandle, $options);
        $curlResponse = curl_exec($curlHandle);

        if (curl_errno($curlHandle) > 0) {
            throw new RequestException(curl_error($curlHandle), curl_errno($curlHandle));
        }

        $parts = explode("\r\n\r\n", $curlResponse);
        $responseBody = array_pop($parts);
        $responseHeader = array_pop($parts);

        $response
            ->setHttpCode(curl_getinfo($curlHandle, CURLINFO_HTTP_CODE))
            ->setHeaders($this->parseHeaders($responseHeader))
            ->setData(json_decode($responseBody, true));

        curl_close($curlHandle);

        return $response;
    }

    /**
     * Get the header info to store.
     *
     * @param string $header
     *
     * @return array
     */
    private function parseHeaders($header)
    {
        $headers = [];
        foreach (explode("\r\n", $header) as $line) {
            if (strpos($line, ':') !== false) {
                list ($key, $value) = explode(': ', $line);
                $key = str_replace('-', '_', strtolower($key));
                $headers[$key] = trim($value);
            }
        }
        return $headers;
    }
}