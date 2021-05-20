<?php

namespace App\Service;

use App\Repositories\Contracts\CommentRepositoryInterface;
use App\Repositories\Contracts\DiscountRepositoryInterface;
use App\Repositories\Contracts\EmailRepositoryInterface;
use App\Repositories\Contracts\HomeBlogRepositoryInterface;
use App\Repositories\Contracts\HomeReviewRepositoryInterface;
use App\Repositories\Contracts\SearchRepositoryInterface;
use App\Repositories\Contracts\SidebarBannerRepositoryInterface;
use App\Repositories\RestApi\CommentRepository;
use App\Repositories\RestApi\DiscountRepository;
use App\Repositories\RestApi\EmailRepository;
use App\Repositories\RestApi\HomeBlogRepository;
use App\Repositories\RestApi\HomeReviewRepository;;
use App\Repositories\RestApi\SearchRepository;
use App\Repositories\RestApi\SidebarBannerRepository;
use App\Service\JsonFormatter\FormatterInterface;
use App\Service\JsonFormatter\JsonFormatter;
use Illuminate\Support\ServiceProvider;

/**
 * Class RepoServiceProvider
 * @package App\Service
 */
class RepoServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(HomeBlogRepositoryInterface::class, HomeBlogRepository::class);
        $this->app->bind(HomeReviewRepositoryInterface::class, HomeReviewRepository::class);
        $this->app->bind(SidebarBannerRepositoryInterface::class, SidebarBannerRepository::class);
        $this->app->bind(FormatterInterface::class, JsonFormatter::class);
        $this->app->bind(CommentRepositoryInterface::class, CommentRepository::class);
        $this->app->bind(DiscountRepositoryInterface::class, DiscountRepository::class);
        $this->app->bind(EmailRepositoryInterface::class, EmailRepository::class);
        $this->app->bind(SearchRepositoryInterface::class, SearchRepository::class);
    }
}