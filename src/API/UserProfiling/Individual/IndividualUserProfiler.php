<?php


namespace SoMin\API\UserProfiling\Individual;

use SoMin\API\UserProfiling\Individual\Requests\UserProfileData;
use SoMin\Common\APIRequester;
use SoMin\Common\RequestIDResponse;

class IndividualUserProfiler extends APIRequester
{
    /**
     * Performs Individual User Profiling Request.
     *
     * @param UserProfileData $profileData User generated content (texts and/or images) and list of which individual attributes to detect.
     * @return RequestIDResponse
     */
    public function predictIndividualUserProfile(UserProfileData $profileData)
    {
        return $this->post('profiling/personal', $profileData, RequestIDResponse::class);
    }
}