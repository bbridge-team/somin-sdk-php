<?php


namespace SoMin\API\UserProfiling\Individual\Responses;

use SoMin\Common\AbstractResponse;

/**
 * Structure to be returned as a result of individual User Profiling API method.
 */
class IndividualUserProfile extends AbstractResponse
{
    /** @var string */
    private $gender;
    /** @var string */
    private $ageGroup;
    /** @var string */
    private $educationLevel;
    /** @var string */
    private $relationshipStatus;
    /** @var string */
    private $incomeLevel;
    /** @var string */
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
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Detected age group.
     *
     * @return string
     */
    public function getAgeGroup()
    {
        return $this->ageGroup;
    }

    /**
     * Detected Education Level.
     *
     * @return string
     */
    public function getEducationLevel()
    {
        return $this->educationLevel;
    }

    /**
     * Detected Relationship Status.
     *
     * @return string
     */
    public function getRelationshipStatus()
    {
        return $this->relationshipStatus;
    }

    /**
     * Detected Income Level.
     *
     * @return string
     */
    public function getIncomeLevel()
    {
        return $this->incomeLevel;
    }

    /**
     * Detected Occupation Industry.
     *
     * @return string
     */
    public function getOccupationIndustry()
    {
        return $this->occupationIndustry;
    }

    /**
     * @return array
     */
    public function getMbti()
    {
        return $this->mbti;
    }
}