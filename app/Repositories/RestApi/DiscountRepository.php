<?php

namespace App\Repositories\RestApi;

use App\Repositories\Contracts\DiscountRepositoryInterface;
use App\Service\JsonFormatter\FormatterInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Class DiscountRepository
 * @package App\Repositories\RestApi
 */
class DiscountRepository implements DiscountRepositoryInterface
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
     * @return mixed
     * @throws GuzzleException
     */
    public function getTopDiscounts()
    {
        return $this->formatter->decode($this->client->request('GET', '/discounts/top')->getBody());
    }

    /**
     * @param $input
     * @return mixed
     * @throws GuzzleException
     */
    public function getDiscounts($input)
    {
        $endpoint = "/discounts?".http_build_query($input);
        return $this->formatter->decode($this->client->request('GET', $endpoint)->getBody());
    }
}