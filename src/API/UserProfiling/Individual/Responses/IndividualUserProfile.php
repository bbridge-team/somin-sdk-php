<?php


namespace SoMin\API\UserProfiling\Individual\Responses;


use SoMin\Common\AbstractResponse;

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
    }

    /**
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @return string
     */
    public function getAgeGroup()
    {
        return $this->ageGroup;
    }

    /**
     * @return string
     */
    public function getEducationLevel()
    {
        return $this->educationLevel;
    }

    /**
     * @return string
     */
    public function getRelationshipStatus()
    {
        return $this->relationshipStatus;
    }

    /**
     * @return string
     */
    public function getIncomeLevel()
    {
        return $this->incomeLevel;
    }

    /**
     * @return string
     */
    public function getOccupationIndustry()
    {
        return $this->occupationIndustry;
    }
}