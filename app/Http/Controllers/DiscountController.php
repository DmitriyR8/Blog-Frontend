<?php

namespace App\Http\Controllers;


use App\Repositories\Contracts\DiscountRepositoryInterface;
use App\Repositories\Contracts\HomeReviewRepositoryInterface;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

/**
 * Class DiscountController
 * @package App\Http\Controllers
 */
class DiscountController extends Controller
{

    const PAGE = 1;

    const PER_PAGE = 3;

    /**
     * @var DiscountRepositoryInterface
     */
    protected $discountRepository;
    /**
     * @var HomeReviewRepositoryInterface
     */
    protected $reviewRepository;

    /**
     * DiscountController constructor.
     * @param DiscountRepositoryInterface $discountRepository
     * @param HomeReviewRepositoryInterface $reviewRepository
     */
    public function __construct(DiscountRepositoryInterface $discountRepository, HomeReviewRepositoryInterface $reviewRepository)
    {
        $this->discountRepository = $discountRepository;
        $this->reviewRepository = $reviewRepository;
    }

    /**
     * @param Request $request
     * @return Factory|View
     */
    public function index(Request $request)
    {
        $filter = $request->get('filter');

        $getTop = $this->discountRepository->getTopDiscounts();

        $allReviews = $this->reviewRepository->getAllReviews(['filter' => $filter, 'page' => self::PAGE, 'per_page' => self::PER_PAGE]);

        $getDiscounts = $this->discountRepository->getDiscounts(['page' => self::PAGE, 'per_page' => self::PER_PAGE]);

        return view('discounts.content', compact(['getTop', 'allReviews', 'getDiscounts']));
    }

    /**
     * @param Request $request
     * @return JsonResponse|mixed
     * @throws Throwable
     */
    public function getDiscounts(Request $request)
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
        $data = $this->discountRepository->getDiscounts($input);

        return [
            'currentPage' => $data['data']['current_page'],
            'lastPage' => $data['data']['last_page'],
            'data' => view('discounts.discount-part', compact('data'))->render()
        ];
    }
}
