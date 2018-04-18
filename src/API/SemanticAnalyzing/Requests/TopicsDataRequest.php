<?php

namespace SoMin\API\SemanticAnalyzing\Requests;

use SoMin\Common\AbstractRequest;

class TopicsDataRequest extends AbstractRequest
{
    /**
     * Sentences to be processed.
     *
     * @param array $documents
     * @return $this
     */
    public function setDocuments(array $documents)
    {
        $this->data['documents'] = $documents;
        return $this;
    }

    /**
     * Topics number to detect.
     *
     * @param $num
     * @return $this
     */
    public function setTopicsNumber($num)
    {
        $this->data['count'] = $num;
        return $this;
    }

    /**
     * Language of the text.
     *
     * @param $lang
     * @return $this
     */
    public function setLang($lang)
    {
        $this->params['lang'] = $lang;
        return $this;
    }

    /**
     * Domain for topics detection.
     *
     * @param $domain
     * @return $this
     */
    public function setDomain($domain)
    {
        $this->params['domain'] = $domain;
        return $this;
    }
}