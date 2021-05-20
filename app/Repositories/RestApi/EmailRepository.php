<?php

namespace App\Repositories\RestApi;

use App\Repositories\Contracts\EmailRepositoryInterface;
use App\Service\JsonFormatter\FormatterInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Class EmailRepository
 * @package App\Repositories\RestApi
 */
class EmailRepository implements EmailRepositoryInterface
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
    public function createEmail($data)
    {
        return $this->formatter->decode($this->client->request('POST', '/emails/save', [
            'form_params' => [
                'email' => $data['email'],
                'action' => $data['action']
            ]
        ])->getBody());
    }
}