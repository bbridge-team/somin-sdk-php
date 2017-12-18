<?php


namespace SoMin\API\NLP\Requests;

use SoMin\Common\AbstractRequest;

/**
 * Structure to be passed as an imput of NLP processing node.
 */
class NLPUserGeneratedContent extends AbstractRequest
{
    /**
     * Sentences to be processed.
     *
     * @param array $sentences
     * @return $this
     */
    public function setSentences(array $sentences)
    {
        $this->data['sentences'] = $sentences;
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
}