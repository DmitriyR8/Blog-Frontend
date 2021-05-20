<?php

namespace App\Http\Middleware;

use App\Repositories\Contracts\HomeReviewRepositoryInterface;
use Closure;

class SlugReview
{
    /**
     * @var HomeReviewRepositoryInterface
     */
    private $reviewRepository;

    /**
     * Slug constructor.
     * @param HomeReviewRepositoryInterface $reviewRepository
     */
    public function __construct(HomeReviewRepositoryInterface $reviewRepository)
    {
        $this->reviewRepository = $reviewRepository;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $str = $_SERVER['REQUEST_URI'];
        $slug = substr($str,strrpos($str,"/")+1);
        $review = $this->reviewRepository->getReviewById($slug);

        if ($review['data'] == []) {
            redirect()->action('ErrorController@index')->send();
        }

        return $next($request);
    }
}
