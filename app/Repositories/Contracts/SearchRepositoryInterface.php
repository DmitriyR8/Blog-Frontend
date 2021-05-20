<?php

namespace App\Repositories\Contracts;

/**
 * Interface SearchRepositoryInterface
 * @package App\Repositories\Contracts
 */
interface SearchRepositoryInterface
{
    /**
     * @param $data
     * @return mixed
     */
    public function getResult($data);
}