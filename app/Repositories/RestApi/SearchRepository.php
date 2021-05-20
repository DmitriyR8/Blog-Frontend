<?php

namespace App\Repositories\RestApi;

use App\Repositories\Contracts\SearchRepositoryInterface;
use App\Service\JsonFormatter\FormatterInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Class SearchRepository
 * @package App\Repositories\RestApi
 */
class SearchRepository implements SearchRepositoryInterface
{
    /**
     * @var Client
     */
    protected $client;
    /**
     * @var FormatterInterface
     */
    protected $formatter;

    /**
     * HomeRepository constructor.
     * @param Client $client
     * @param FormatterInterface $formatter
     */
    public function __construct(Client $client, FormatterInterface $formatter)
    {
        $this->client = $client;
        $this->formatter = $formatter;
    }

    /**
     * @param $data
     * @return mixed
     * @throws GuzzleException
     */
    public function getResult($data)
    {
        $endpoint = "/search?".http_build_query($data);
        return $this->formatter->decode($this->client->request('GET', $endpoint)->getBody());
    }
}