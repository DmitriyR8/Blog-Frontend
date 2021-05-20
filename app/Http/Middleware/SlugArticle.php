<?php

namespace App\Http\Middleware;

use App\Repositories\Contracts\HomeBlogRepositoryInterface;
use Closure;

class SlugArticle
{
    /**
     * @var HomeBlogRepositoryInterface
     */
    private $blogRepository;

    /**
     * SlugArticle constructor.
     * @param HomeBlogRepositoryInterface $blogRepository
     */
    public function __construct(HomeBlogRepositoryInterface $blogRepository)
    {
        $this->blogRepository = $blogRepository;
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
        $article = $this->blogRepository->getArticleById($slug);

        if ($article['data'] == []) {
            redirect()->action('ErrorController@index')->send();
        }

        return $next($request);
    }
}
