<?php

namespace App\Repositories\RestApi;

use App\Repositories\Contracts\HomeBlogRepositoryInterface;
use App\Service\JsonFormatter\FormatterInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\StreamInterface;
use RuntimeException;

/**
 * Class HomeBlogRepository
 * @package App\Repositories\RestApi
 */
class HomeBlogRepository implements HomeBlogRepositoryInterface
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
     * @return mixed|StreamInterface
     * @throws GuzzleException
     */
    public function getData()
    {
        return $this->formatter->decode($this->client->request('GET')->getBody());
    }

    /**
     * @return mixed
     * @throws GuzzleException
     */
    public function getHeadArticle()
    {
        return $this->formatter->decode($this->client->request('GET', '/blog-article')->getBody());
    }

    /**
     * @return mixed
     * @throws GuzzleException
     */
    public function getLastArticles()
    {
        return $this->formatter->decode($this->client->request('GET', '/blog-articles/latest')->getBody());

    }

    /**
     * @return mixed
     * @throws GuzzleException
     */
    public function getPopularArticles()
    {
        return $this->formatter->decode($this->client->request('GET', '/blog-articles/popular')->getBody());
    }

    /**
     * @param $input
     * @return mixed
     * @throws GuzzleException
     */
    public function getArticles($input)
    {
        $endpoint = '/blog-articles/all?'.http_build_query($input);
        return $this->formatter->decode($this->client->request('GET', $endpoint)->getBody());
    }

    /**
     * @param $slug
     * @return mixed
     * @throws GuzzleException
     */
    public function getArticleById($slug)
    {
        try {
            return $this->formatter->decode($this->client->request('GET', "/blog-articles/{$slug}")->getBody());
        } catch (RuntimeException $e) {
            return redirect()->action('ErrorController@index')->send();
        }
    }
}