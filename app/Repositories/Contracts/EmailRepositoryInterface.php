<?php

namespace App\Repositories\Contracts;

/**
 * Interface EmailRepositoryInterface
 * @package App\Repositories\Contracts
 */
interface EmailRepositoryInterface
{
    /**
     * @param $data
     * @return mixed
     */
    public function createEmail($data);
}