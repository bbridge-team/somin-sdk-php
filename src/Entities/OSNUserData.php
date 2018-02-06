<?php


namespace SoMin\Entities;

class OSNUserData
{
    /** @var array */
    private $rawData;

    /** @var Account[] */
    private $accounts;
    /** @var Post[] */
    private $posts;

    /**
     * OSNUserData constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->rawData = $data;

        $this->parseAccounts();
        $this->parsePosts();
    }

    private function parseAccounts()
    {
        if (!isset($this->rawData['accounts'])) {
            return;
        }

        foreach ($this->rawData['accounts'] as $accountType => $accountData) {
            if (is_array($accountData)) {
                $this->accounts[$accountType] = new Account($accountData);
            }
        }
    }

    private function parsePosts()
    {
        if (!isset($this->rawData['posts'])) {
            return;
        }

        foreach ($this->rawData['posts'] as $postData) {
            $this->posts[] = new Post($postData);
        }
    }

    /**
     * @return Account[]
     */
    public function getAccounts()
    {
        return $this->accounts;
    }

    /**
     * @return array
     */
    public function getRawData()
    {
        return $this->rawData;
    }

    /**
     * @return Post[]
     */
    public function getPosts()
    {
        return $this->posts;
    }
}