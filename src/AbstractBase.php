<?php
declare(strict_types=1);

namespace LarsNieuwenhuizen\EUtilities;

use GuzzleHttp\Client;
use LarsNieuwenhuizen\EUtilities\Interfaces\EUtility;

abstract class AbstractBase implements EUtility
{

    /**
     * @const string
     */
    const BASE_URL = 'https://eutils.ncbi.nlm.nih.gov/entrez/eutils/';

    /**
     * @const string
     */
    const URL_PATH = '';

    /**
     * @var string
     */
    protected $requestUri;

    /**
     * @var string
     */
    protected $urlPath = '';

    /**
     * @var Client
     */
    protected $httpClient;

    /**
     * @var string
     */
    protected $apiKey;

    /**
     * AbstractBase constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        if ($this::URL_PATH === '') {
            throw new \Exception('URL path for utility not set');
        }

        $this->setHttpClient(new Client());
        $this->setRequestUri(self::BASE_URL . self::URL_PATH);
        $this->setApiKey(getenv('NCBI_API_KEY') ?: '');
    }

    /**
     * @return Client
     */
    public function getHttpClient(): Client
    {
        return $this->httpClient;
    }

    /**
     * @param Client $httpClient
     * @return EUtility
     */
    public function setHttpClient(Client $httpClient): EUtility
    {
        $this->httpClient = $httpClient;

        return $this;
    }

    /**
     * @return string
     */
    public function getApiKey(): string
    {
        return $this->apiKey;
    }

    /**
     * @param string $apiKey
     * @return EUtility
     */
    public function setApiKey(string $apiKey): EUtility
    {
        $this->apiKey = $apiKey;

        return $this;
    }

    /**
     * @return string
     */
    public function getRequestUri(): string
    {
        return $this->requestUri;
    }

    /**
     * @param string $requestUri
     * @return EUtility
     */
    public function setRequestUri(string $requestUri): EUtility
    {
        $this->requestUri = $requestUri;

        return $this;
    }
}
