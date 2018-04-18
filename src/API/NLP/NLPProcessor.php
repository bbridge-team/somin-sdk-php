<?php

namespace SoMin\API\NLP;

use SoMin\API\NLP\Requests\NLPUserGeneratedContent;
use SoMin\Common\APIRequester;
use SoMin\Common\RequestIDResponse;

/**
 * NLP Processing API capabilities.
 */
class NLPProcessor extends APIRequester
{
    /**
     * Performs Part of Speech Detection.
     *
     * @param NLPUserGeneratedContent $request User generated text data.
     * @return RequestIDResponse
     */
    public function detectPartsOfSpeech(NLPUserGeneratedContent $request)
    {
        return $this->post('nlp/pos', $request, RequestIDResponse::class);
    }

    /**
     * Performs Sentiment Analysis.
     *
     * @param NLPUserGeneratedContent $request User generated text data.
     * @return RequestIDResponse
     */
    public function detectSentiment(NLPUserGeneratedContent $request)
    {
        return $this->post('nlp/sentiment', $request, RequestIDResponse::class);
    }

    /**
     * Performs Named Entity Recognition.
     *
     * @param NLPUserGeneratedContent $request User generated text data.
     * @return RequestIDResponse
     */
    public function recognizeNamedEntities(NLPUserGeneratedContent $request)
    {
        return $this->post('nlp/ner', $request, RequestIDResponse::class);
    }
}