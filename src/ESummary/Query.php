<?php
declare(strict_types=1);

namespace LarsNieuwenhuizen\EUtilities\ESummary;

use LarsNieuwenhuizen\EUtilities\Interfaces;

class Query implements Interfaces\Query
{

    /**
     * @var array
     */
    protected $uids = [];

    /**
     * @return string
     */
    public function getQueryString(): string
    {
        return implode(',', $this->getUids());
    }

    /**
     * @return array
     */
    public function getUids(): array
    {
        return $this->uids;
    }

    /**
     * @param array $uids
     * @return Query
     */
    public function setUids(array $uids): Query
    {
        $this->uids = $uids;

        return $this;
    }

    /**
     * @param int $uid
     * @return Query
     */
    public function addUid(int $uid): Query
    {
        $uids = $this->getUids();
        $uids[] = $uid;
        $this->setUids($uids);
    }
}