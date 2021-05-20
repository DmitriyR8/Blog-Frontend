<?php

namespace App\Repositories\Contracts;

/**
 * Interface HomeReviewRepositoryInterface
 * @package App\Repositories\Contracts
 */
interface HomeReviewRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getReviews();

    /**
     * @param $input
     * @return mixed
     */
    public function getAllReviews($input);

    /**
     * @param $slug
     * @return mixed
     */
    public function getReviewById($slug);
}