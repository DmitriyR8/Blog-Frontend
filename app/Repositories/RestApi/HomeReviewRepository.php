<?php

namespace App\Repositories\RestApi;

use App\Repositories\Contracts\HomeReviewRepositoryInterface;
use App\Service\JsonFormatter\FormatterInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\StreamInterface;
use RuntimeException;

/**
 * Class HomeReviewRepository
 * @package App\Repositories\RestApi
 */
class HomeReviewRepository implements HomeReviewRepositoryInterface
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
     * HomeReviewRepository constructor.
     * @param Client $client
     * @param FormatterInterface $formatter
     */
    public function __construct(Client $client, FormatterInterface $formatter)
    {
        $this->client = $client;
        $this->formatter = $formatter;
    }

    /**
     * @return mixed|StreamInterface
     * @throws GuzzleException
     */
    public function getReviews()
    {
        return $this->formatter->decode($this->client->request('GET', '/single-reviews/top')->getBody());
    }

    /**
     * @param $input
     * @return mixed
     * @throws GuzzleException
     */
    public function getAllReviews($input)
    {
        $endpoint = "/single-reviews?".http_build_query($input);
        return $this->formatter->decode($this->client->request('GET', $endpoint)->getBody());
    }

    /**
     * @param $slug
     * @return mixed
     * @throws GuzzleException
     */
    public function getReviewById($slug)
    {
        try {
            return $this->formatter->decode($this->client->request('GET', "/single-reviews/{$slug}")->getBody());
        } catch (RuntimeException $e) {
            return redirect()->action('ErrorController@index')->send();
        }
    }
}