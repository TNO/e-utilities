<?php
declare(strict_types=1);

namespace LarsNieuwenhuizen\EUtilities\ESearch;

use LarsNieuwenhuizen\EUtilities\AbstractBase;
use LarsNieuwenhuizen\EUtilities\Interfaces\EUtility;
use LarsNieuwenhuizen\EUtilities\Interfaces\Query;

final class ESearch extends AbstractBase implements EUtility
{

    /**
     * @var string
     */
    const URL_PATH = 'esearch.fcgi';

    /**
     * @var string
     */
    protected $database = 'pubmed';

    /**
     * @var string
     */
    protected $returnType = 'json';

    /**
     * @var int
     */
    protected $returnMaximum = 20;

    /**
     * @var int
     */
    protected $returnStart =  0;

    /**
     * @param Query $query
     * @return string
     */
    public function execute(Query $query): string
    {
        $requestUri = $this->getRequestUri() .
            '?db=' . $this->getDatabase() .
            '&retmode=' . $this->getReturnType() .
            '&retmax=' . $this->getReturnMaximum() .
            '&retstart=' . $this->getReturnStart() .
            ($this->getApiKey() ? '&api_key=' . $this->getApiKey() : '') .
            '&term=' . $query->getQueryString();

        $result = $this->getHttpClient()->get($requestUri)
            ->getBody()
            ->getContents();

        return $result;
    }

    /**
     * @return string
     */
    public function getDatabase(): string
    {
        return $this->database;
    }

    /**
     * @param string $database
     * @return ESearch
     */
    public function setDatabase(string $database): ESearch
    {
        $this->database = $database;

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
     * @return ESearch
     */
    public function setReturnType(string $returnType): ESearch
    {
        $this->returnType = $returnType;

        return $this;
    }

    /**
     * @return int
     */
    public function getReturnMaximum(): int
    {
        return $this->returnMaximum;
    }

    /**
     * @param int $returnMaximum
     * @return ESearch
     */
    public function setReturnMaximum(int $returnMaximum): ESearch
    {
        $this->returnMaximum = $returnMaximum;

        return $this;
    }

    /**
     * @return int
     */
    public function getReturnStart(): int
    {
        return $this->returnStart;
    }

    /**
     * @param int $returnStart
     * @return ESearch
     */
    public function setReturnStart(int $returnStart): ESearch
    {
        $this->returnStart = $returnStart;

        return $this;
    }
}
