<?php

namespace App\Repositories\Contracts;

/**
 * Interface HomeBlogRepositoryInterface
 * @package App\Repositories\Contracts
 */
interface HomeBlogRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getData();

    /**
     * @return mixed
     */
    public function getHeadArticle();

    /**
     * @return mixed
     */
    public function getLastArticles();

    /**
     * @param $input
     * @return mixed
     */
    public function getPopularArticles();

    /**
     * @param $input
     * @return mixed
     */
    public function getArticles($input);

    /**
     * @param $slug
     * @return mixed
     */
    public function getArticleById($slug);
}