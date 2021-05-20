<?php

namespace App\Repositories\Contracts;

/**
 * Interface DiscountRepositoryInterface
 * @package App\Repositories\Contracts
 */
interface DiscountRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getTopDiscounts();

    /**
     * @param $input
     * @return mixed
     */
    public function getDiscounts($input);
}