<?php
declare(strict_types=1);

namespace LarsNieuwenhuizen\EUtilities\Esearch;

use LarsNieuwenhuizen\EUtilities\AbstractBase;
use LarsNieuwenhuizen\EUtilities\Interfaces;

class ESearch extends AbstractBase implements Interfaces\EUtility
{

    /**
     * @var string
     */
    protected $urlPath = 'esearch.fcgi';

    /**
     * @var string
     */
    protected $database = 'pubmed';

    /**
     * @var string
     */
    protected $returnMode = 'json';

    /**
     * @param Interfaces\Query $query
     * @return string
     */
    public function execute(Interfaces\Query $query): string
    {
        $requestUri = $this->getBaseUrl() .
            '?db=' . $this->getDatabase() .
            '&retmode=' . $this->getReturnMode() .
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
    public function getReturnMode(): string
    {
        return $this->returnMode;
    }

    /**
     * @param string $returnMode
     * @return ESearch
     */
    public function setReturnMode(string $returnMode): ESearch
    {
        $this->returnMode = $returnMode;

        return $this;
    }
}
