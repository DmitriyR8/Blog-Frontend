<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\CommentRepositoryInterface;
use App\Repositories\Contracts\HomeReviewRepositoryInterface;
use App\Repositories\Contracts\SidebarBannerRepositoryInterface;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

/**
 * Class ReviewController
 * @package App\Http\Controllers
 */
class ReviewController extends Controller
{
    const REVIEW = 'review';

    const PAGE = 1;

    const PER_PAGE = 9;

    /**
     * @var HomeReviewRepositoryInterface
     */
    protected $reviewsRepository;
    /**
     * @var SidebarBannerRepositoryInterface
     */
    protected $bannerRepository;
    /**
     * @var CommentRepositoryInterface
     */
    protected $commentRepository;

    /**
     * ReviewController constructor.
     * @param HomeReviewRepositoryInterface $reviewsRepository
     * @param SidebarBannerRepositoryInterface $bannerRepository
     * @param CommentRepositoryInterface $commentRepository
     */
    public function __construct
    (
        HomeReviewRepositoryInterface $reviewsRepository,
        SidebarBannerRepositoryInterface $bannerRepository,
        CommentRepositoryInterface $commentRepository
    )
    {
        $this->reviewsRepository = $reviewsRepository;
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

        $topReviews = $this->reviewsRepository->getReviews();

        $allReviews = $this->reviewsRepository->getAllReviews(['filter' => $filter, 'page' => self::PAGE, 'per_page' => self::PER_PAGE]);

        return view('all-reviews.content', compact(['topReviews', 'allReviews']));
    }

    /**
     * @param Request $request
     * @param $slug
     * @return Factory|View
     */
    public function getReviewById(Request $request , $slug)
    {
        $filter = $request->get('filter');

        $reviewsById = $this->reviewsRepository->getReviewById($slug);

        foreach ($reviewsById['data'] as $reviewById){

        }

        $getComments = $this->commentRepository->getCommentsByRecordId(self::REVIEW, $reviewsById['data'][0]['id'], ['page' => self::PAGE, 'per_page' => self::PER_PAGE]);

        $allReviews = $this->reviewsRepository->getAllReviews(['filter' => $filter, 'page' => self::PAGE, 'per_page' => self::PER_PAGE]);

        $banners = $this->bannerRepository->getSidebarBanners();

        return view('all-reviews.review.content', compact(['reviewById', 'getComments', 'allReviews', 'banners']));
    }

    /**
     * @param Request $request
     * @return array|JsonResponse
     * @throws Throwable
     */
    public function getReviews(Request $request)
    {
        $input = $request->only(['filter' ,'page', 'per_page']);

        $validator = Validator::make($input, [
            'page' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->messages(),
                'status' => Response::HTTP_BAD_REQUEST
            ]);
        }

        $data = $this->reviewsRepository->getAllReviews($input);

        $data['filter'] = $input['filter'] ? : "all" ;

        return [
            'currentPage' => $data['data']['current_page'],
            'lastPage' => $data['data']['last_page'],
            'filter' => $data['filter'],
            'data' => view('all-reviews.review-part', compact('data'))->render()
        ];
    }

    /**
     * @param Request $request
     * @param $id
     * @return array|JsonResponse
     * @throws Throwable
     */
    public function getAllCommentsByReviews(Request $request, $id)
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

        $data = $this->commentRepository->getCommentsByRecordId(self::REVIEW, $id, $input);

        return [
            'currentPage' => $data['data']['current_page'],
            'lastPage' => $data['data']['last_page'],
            'data' => view('all-reviews.review.comment-part', compact('data'))->render()
        ];
    }
}
