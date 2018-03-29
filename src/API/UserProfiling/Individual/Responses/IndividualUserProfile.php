<?php


namespace SoMin\API\UserProfiling\Individual\Responses;

use SoMin\Common\AbstractResponse;

/**
 * Structure to be returned as a result of individual User Profiling API method.
 */
class IndividualUserProfile extends AbstractResponse
{
    /** @var array */
    private $gender;
    /** @var array */
    private $ageGroup;
    /** @var array */
    private $educationLevel;
    /** @var array */
    private $relationshipStatus;
    /** @var array */
    private $incomeLevel;
    /** @var array */
    private $occupationIndustry;

    /** @var array */
    private $mbti = [];

    /**
     * @param $data
     */
    public function setData($data)
    {
        if ($this->getHttpCode() != 200) {
            return;
        }
        if (empty($data['profiling'])) {
            return;
        }

        $profiling = $data['profiling'];
        if (!empty($profiling['gender'])) {
            $this->gender = $profiling['gender'];
        }

        if (!empty($profiling['age_group'])) {
            $this->ageGroup = $profiling['age_group'];
        }

        if (!empty($profiling['education_level'])) {
            $this->educationLevel = $profiling['education_level'];
        }

        if (!empty($profiling['relationship'])) {
            $this->relationshipStatus = $profiling['relationship'];
        }

        if (!empty($profiling['income'])) {
            $this->incomeLevel = $profiling['income'];
        }

        if (!empty($profiling['occupation'])) {
            $this->occupationIndustry = $profiling['occupation'];
        }

        if (!empty($profiling['jp'])) {
            $this->mbti['jp'] = $profiling['jp'];
        }
        if (!empty($profiling['ei'])) {
            $this->mbti['ei'] = $profiling['ei'];
        }
        if (!empty($profiling['tf'])) {
            $this->mbti['tf'] = $profiling['tf'];
        }
        if (!empty($profiling['si'])) {
            $this->mbti['si'] = $profiling['si'];
        }
    }

    /**
     * Detected gender.
     *
     * @return array|null
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Detected age group.
     *
     * @return array|null
     */
    public function getAgeGroup()
    {
        return $this->ageGroup;
    }

    /**
     * Detected Education Level.
     *
     * @return array|null
     */
    public function getEducationLevel()
    {
        return $this->educationLevel;
    }

    /**
     * Detected Relationship Status.
     *
     * @return array|null
     */
    public function getRelationshipStatus()
    {
        return $this->relationshipStatus;
    }

    /**
     * Detected Income Level.
     *
     * @return array|null
     */
    public function getIncomeLevel()
    {
        return $this->incomeLevel;
    }

    /**
     * Detected Occupation Industry.
     *
     * @return array|null
     */
    public function getOccupationIndustry()
    {
        return $this->occupationIndustry;
    }

    /**
     * @return array|null
     */
    public function getMbti()
    {
        return $this->mbti;
    }
}