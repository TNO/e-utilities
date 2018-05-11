<?php

namespace LarsNieuwenhuizen\EUtilities;

use GuzzleHttp\Client;

abstract class AbstractBase
{

    /**
     * @var string
     */
    protected $baseUrl = 'https://eutils.ncbi.nlm.nih.gov/entrez/eutils/';

    /**
     * @var string
     */
    protected $urlPath = '';

    /**
     * @var Client
     */
    protected $httpClient;

    /**
     * AbstractBase constructor.
     */
    public function __construct()
    {
        $this->setHttpClient(new Client());
        $this->setBaseUrl($this->getBaseUrl() . $this->getUrlPath());
    }

    /**
     * @return string
     */
    public function getBaseUrl()
    {
        return $this->baseUrl;
    }

    /**
     * @param string $baseUrl
     * @return AbstractBase
     */
    public function setBaseUrl($baseUrl): AbstractBase
    {
        $this->baseUrl = $baseUrl;

        return $this;
    }

    /**
     * @return string
     */
    public function getUrlPath()
    {
        return $this->urlPath;
    }

    /**
     * @param string $urlPath
     * @return AbstractBase
     */
    public function setUrlPath($urlPath): AbstractBase
    {
        $this->urlPath = $urlPath;

        return $this;
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
     * @return AbstractBase
     */
    public function setHttpClient(Client $httpClient): AbstractBase
    {
        $this->httpClient = $httpClient;

        return $this;
    }
}
