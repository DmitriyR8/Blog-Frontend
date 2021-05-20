<?php

namespace App\Repositories\Contracts;

/**
 * Interface CommentRepositoryInterface
 * @package App\Repositories\Contracts
 */
interface CommentRepositoryInterface
{
    /**
     * @param $type
     * @param $id
     * @param $input
     * @return mixed
     */
    public function getCommentsByRecordId($type, $id, $input);

    /**
     * @param $data
     * @return mixed
     */
    public function createComment($data);
}