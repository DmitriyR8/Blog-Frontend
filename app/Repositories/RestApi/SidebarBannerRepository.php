<?php

namespace App\Repositories\RestApi;

use App\Repositories\Contracts\SidebarBannerRepositoryInterface;
use App\Service\JsonFormatter\FormatterInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Class SidebarBannerRepository
 * @package App\Repositories\RestApi
 */
class SidebarBannerRepository implements SidebarBannerRepositoryInterface
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
     * @return mixed
     * @throws GuzzleException
     */
    public function getSidebarBanners()
    {
        return $this->formatter->decode($this->client->request('GET', '/sidebar-banners')->getBody());
    }
}