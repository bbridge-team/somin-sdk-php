<?php


namespace SoMin\Common;


abstract class AbstractRequest
{
    protected $data = [];
    protected $params = [];

    public function buildQueryData()
    {
        if (empty($this->params)) {
            return '';
        }

        // Urlencode both keys and values
        $keys = array_map('rawurlencode', array_keys($this->params));
        $values = array_map('rawurlencode', array_values($this->params));
        $params = array_combine($keys, $values);

        $pairs = [];
        foreach ($params as $parameter => $value) {
            $pairs[] = $parameter . '=' . $value;
        }

        return '?' . implode('&', $pairs);
    }

    public function buildPostData()
    {
        return json_encode($this->data);
    }
}