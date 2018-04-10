<?php


namespace SoMin\API\UserProfiling\Individual\Responses;


class PredictedData
{
    /** @var string */
    private $winner;

    /** @var array */
    private $result;

    /**
     * PredictedData constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        foreach ($data['results'] as $result) {
            $this->result[$result['label']] = $result['confidence'];
        }

        $this->winner = $data['winner'];
    }

    /**
     * @return string
     */
    public function getWinner()
    {
        return $this->winner;
    }

    /**
     * @return array
     */
    public function getResult()
    {
        return $this->result;
    }
}