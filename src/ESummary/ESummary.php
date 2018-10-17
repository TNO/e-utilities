<?php
declare(strict_types=1);

namespace LarsNieuwenhuizen\EUtilities\ESummary;

use LarsNieuwenhuizen\EUtilities\AbstractBase;
use LarsNieuwenhuizen\EUtilities\Interfaces\EUtility;
use LarsNieuwenhuizen\EUtilities\Interfaces\Query;

final class ESummary extends AbstractBase implements EUtility
{

    /** @const string */
    const VERSION_PREVIOUS = '1.0';

    /** @const string */
    const VERSION_LATEST = '2.0';

    /** @const string */
    const URL_PATH = 'esummary.fcgi';

    /**
     * @var string
     */
    protected $database = 'protein';

    /**
     * @var string
     */
    protected $returnType = 'json';

    /**
     * @var string
     */
    protected $version = self::VERSION_LATEST;

    /**
     * @param Query $query
     * @return string
     */
    public function execute(Query $query): string
    {
        $requestUri = $this->getRequestUri() .
            '?db=' . $this->getDatabase() .
            '&retmode=' . $this->getReturnType() .
            ($this->getApiKey() ? '&api_key=' . $this->getApiKey() : '') .
            '&id=' . $query->getQueryString() .
            '&version=' . $this->getVersion();

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
     * @return ESummary
     */
    public function setDatabase(string $database): ESummary
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
     * @return ESummary
     */
    public function setReturnType(string $returnType): ESummary
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
     * @return ESummary
     */
    public function setVersion(string $version): ESummary
    {
        $this->version = $version;

        return $this;
    }
}
