<?php

namespace App\Repositories\RestApi;

use App\Repositories\Contracts\CommentRepositoryInterface;
use App\Service\JsonFormatter\FormatterInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Class CommentRepository
 * @package App\Repositories\RestApi
 */
class CommentRepository implements CommentRepositoryInterface
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
     * @param $type
     * @param $id
     * @param $input
     * @return mixed
     * @throws GuzzleException
     */
    public function getCommentsByRecordId($type, $id, $input)
    {
        $endpoint = "/comments/{$type}/{$id}?".http_build_query($input);
        return $this->formatter->decode($this->client->request('GET', $endpoint)->getBody());
    }

    /**
     * @param $data
     * @return mixed
     * @throws GuzzleException
     */
    public function createComment($data)
    {
        return $this->formatter->decode($this->client->request('POST', '/comments/create', [
            'form_params' => [
                'name' => $data['name'],
                'email' => $data['email'],
                'rating' => $data['rating'],
                'title' => $data['title'],
                'comment_body' => $data['comment_body'],
                'type' => $data['type'],
                'commentable_id' => $data['commentable_id'],
                'commentable_type' => $data['commentable_type']
            ]
        ])->getBody());
    }
}