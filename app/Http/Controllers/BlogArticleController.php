<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\CommentRepositoryInterface;
use App\Repositories\Contracts\HomeBlogRepositoryInterface;
use App\Repositories\Contracts\HomeReviewRepositoryInterface;
use App\Repositories\Contracts\SidebarBannerRepositoryInterface;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

/**
 * Class BlogArticleController
 * @package App\Http\Controllers
 */
class BlogArticleController extends Controller
{
    const ARTICLE = 'article';

    const PAGE = 1;

    const PER_PAGE = 3;

    /**
     * @var HomeBlogRepositoryInterface
     */
    protected $blogRepository;
    /**
     * @var HomeReviewRepositoryInterface
     */
    protected $reviewRepository;
    /**
     * @var SidebarBannerRepositoryInterface
     */
    protected $bannerRepository;
    /**
     * @var CommentRepositoryInterface
     */
    protected $commentRepository;

    /**
     * BlogArticleController constructor.
     * @param HomeBlogRepositoryInterface $blogRepository
     * @param HomeReviewRepositoryInterface $reviewRepository
     * @param SidebarBannerRepositoryInterface $bannerRepository
     * @param CommentRepositoryInterface $commentRepository
     */
    public function __construct(
        HomeBlogRepositoryInterface $blogRepository,
        HomeReviewRepositoryInterface $reviewRepository,
        SidebarBannerRepositoryInterface $bannerRepository,
        CommentRepositoryInterface $commentRepository
    )
    {
        $this->blogRepository = $blogRepository;
        $this->reviewRepository = $reviewRepository;
        $this->bannerRepository = $bannerRepository;
        $this->commentRepository = $commentRepository;
    }

    /**
     * @param Request $request
     * @return Factory|View
     */
    public function index(Request $request)
    {
        $filter = $request->get('filter');

        $getHead = $this->blogRepository->getHeadArticle();

        $getLast = $this->blogRepository->getLastArticles();

        $getPopular = $this->blogRepository->getPopularArticles();

        $getAll = $this->blogRepository->getArticles(['page' => self::PAGE, 'per_page' => self::PER_PAGE]);

        $getTopArticles = $this->blogRepository->getData();

        $allReviews = $this->reviewRepository->getAllReviews(['filter' => $filter, 'page' => self::PAGE, 'per_page' => self::PER_PAGE]);

        return view('blog-articles.content', compact(['getHead', 'getLast', 'getPopular', 'getTopArticles', 'allReviews', 'getAll']));
    }

    /**
     * @param Request $request
     * @param $slug
     * @return Factory|View
     */
    public function getArticleById(Request $request, $slug)
    {
        $filter = $request->get('filter');

        $getArticlesById = $this->blogRepository->getArticleById($slug);

        foreach ($getArticlesById['data'] as $getArticleById) {

        }

        $allReviews = $this->reviewRepository->getAllReviews(['filter' => $filter, 'page' => self::PAGE, 'per_page' => self::PER_PAGE]);

        $banners = $this->bannerRepository->getSidebarBanners();

        $getComments = $this->commentRepository->getCommentsByRecordId(self::ARTICLE, $getArticlesById['data'][0]['id'], ['page' => self::PAGE, 'per_page' => self::PER_PAGE]);

        return view('blog-articles.article.content', compact(['getArticleById', 'allReviews', 'banners', 'getComments']));
    }

    /**
     * @param Request $request
     * @return JsonResponse|mixed
     * @throws Throwable
     */
    public function getAllArticles(Request $request)
    {
        $input = $request->only(['page', 'per_page']);

        $validator = Validator::make($input, [
            'page' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->messages(),
                'status' => Response::HTTP_BAD_REQUEST
            ]);
        }
        $data = $this->blogRepository->getArticles($input);

        return [
            'currentPage' => $data['data']['current_page'],
            'lastPage' => $data['data']['last_page'],
            'data' => view('blog-articles.article-part', compact('data'))->render()
        ];
    }

    /**
     * @param Request $request
     * @param $id
     * @return JsonResponse|mixed
     * @throws Throwable
     */
    public function getAllCommentsByArticles(Request $request, $id)
    {
        $input = $request->only(['page', 'per_page']);

        $validator = Validator::make($input, [
            'page' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->messages(),
                'status' => Response::HTTP_BAD_REQUEST
            ]);
        }
        $data = $this->commentRepository->getCommentsByRecordId(self::ARTICLE, $id, $input);

        return [
            'currentPage' => $data['data']['current_page'],
            'lastPage' => $data['data']['last_page'],
            'data' => view('blog-articles.article.comment-part', compact('data'))->render()
        ];
    }
}
