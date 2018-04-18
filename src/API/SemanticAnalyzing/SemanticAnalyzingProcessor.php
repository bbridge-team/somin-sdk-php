<?php

namespace SoMin\API\SemanticAnalyzing;

use SoMin\API\SemanticAnalyzing\Requests\TopicsDataRequest;
use SoMin\Common\APIRequester;
use SoMin\Common\RequestIDResponse;

/**
 * Semantic Analyzing API capabilities.
 */
class SemanticAnalyzingProcessor extends APIRequester
{
    /**
     * Performs hot topic detection.
     *
     * @param TopicsDataRequest $request
     *
     * @return RequestIDResponse
     */
    public function hotTopicsDetection(TopicsDataRequest $request)
    {
        return $this->post('topics/latent', $request, RequestIDResponse::class);
    }
}