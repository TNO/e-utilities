<?php
declare(strict_types=1);

namespace LarsNieuwenhuizen\EUtilities\EInfo;

use LarsNieuwenhuizen\EUtilities\AbstractBase;
use LarsNieuwenhuizen\EUtilities\Interfaces\EUtility;
use LarsNieuwenhuizen\EUtilities\Interfaces\Query;

final class EInfo extends AbstractBase implements EUtility
{

    /** @const string */
    const URL_PATH = 'einfo.fcgi';

    /**
     * @var string
     */
    protected $db = 'pubmed';

    /**
     * @var string
     */
    protected $returnType = 'json';

    /**
     * @var string
     */
    protected $version = '2.0';

    /**
     * @param Query $query
     * @return string
     */
    public function execute(Query $query = null): string
    {
        $result = $this->httpClient->get(
            $this->getRequestUri() .
            '?db=' . $this->getDb() .
            '&retmode=' . $this->getReturnType() .
            '&version=' . $this->getVersion()
        );

        return $result->getBody()->getContents();
    }

    /**
     * @return string
     */
    public function getDb(): string
    {
        return $this->db;
    }

    /**
     * @param string $db
     * @return EInfo
     */
    public function setDb(string $db): EInfo
    {
        $this->db = $db;

        return $this;
    }

    /**
     * @return string
     */
    public function getReturnType(): string
    {
        return $this->returnType;
    }

    /**
     * @param string $returnType
     * @return EInfo
     */
    public function setReturnType(string $returnType): EInfo
    {
        $this->returnType = $returnType;

        return $this;
    }

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return $this->version;
    }

    /**
     * @param string $version
     * @return EInfo
     */
    public function setVersion(string $version): EInfo
    {
        $this->version = $version;

        return $this;
    }
}
