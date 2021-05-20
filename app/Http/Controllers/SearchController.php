<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\HomeReviewRepositoryInterface;
use App\Repositories\Contracts\SearchRepositoryInterface;
use App\Repositories\Contracts\SidebarBannerRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

/**
 * Class SearchController
 * @package App\Http\Controllers
 */
class SearchController extends Controller
{
    const PAGE = 1;

    const PER_PAGE = 6;

    /**
     * @var SearchRepositoryInterface
     */
    protected $searchRepository;
    /**
     * @var HomeReviewRepositoryInterface
     */
    protected $reviewRepository;
    /**
     * @var SidebarBannerRepositoryInterface
     */
    protected $bannerRepository;

    /**
     * SearchController constructor.
     * @param SearchRepositoryInterface $searchRepository
     * @param HomeReviewRepositoryInterface $reviewRepository
     * @param SidebarBannerRepositoryInterface $bannerRepository
     */
    public function __construct(
        SearchRepositoryInterface $searchRepository,
        HomeReviewRepositoryInterface $reviewRepository,
        SidebarBannerRepositoryInterface $bannerRepository
    )
    {
        $this->searchRepository = $searchRepository;
        $this->reviewRepository = $reviewRepository;
        $this->bannerRepository = $bannerRepository;
    }

    /**
     * @param Request $request
     * @return JsonResponse|mixed
     */
    public function search(Request $request)
    {
        $input = $request->only(['query', 'page']);

        $filter = $request->get('filter');

        $validator = Validator::make($input, [
            'query' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->messages(),
                'status' => Response::HTTP_BAD_REQUEST
            ]);
        }

        $result = $this->searchRepository->getResult(['query' => $input['query'], 'page' => self::PAGE, 'per_page' => self::PER_PAGE]);

        $allReviews = $this->reviewRepository->getAllReviews(['filter' => $filter, 'page' => self::PAGE, 'per_page' => self::PER_PAGE]);

        $banners = $this->bannerRepository->getSidebarBanners();


        if ($result['data']['data'] == []) {
            return view('search.failedSearch.content', compact(['result', 'allReviews', 'banners']));
        } else {
            return view('search.successSearch.content', compact(['result', 'allReviews']));
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse|mixed
     * @throws Throwable
     */
    public function getSearchResult(Request $request)
    {
        $input = $request->only(['page', 'per_page', 'query']);

        $validator = Validator::make($input, [
            'page' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->messages(),
                'status' => Response::HTTP_BAD_REQUEST
            ]);
        }

        $data = $this->searchRepository->getResult($input);

        return [
            'currentPage' => $data['data']['current_page'],
            'lastPage' => $data['data']['last_page'],
            'data' => view('search.successSearch.search-part', compact('data'))->render()
        ];
    }
}
