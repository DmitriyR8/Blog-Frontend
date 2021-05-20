<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\HomeReviewRepositoryInterface;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class ErrorController
 * @package App\Http\Controllers
 */
class ErrorController extends Controller
{
    const PAGE = 1;

    const PER_PAGE = 3;

    /**
     * @var HomeReviewRepositoryInterface
     */
    protected $reviewRepository;

    /**
     * ErrorController constructor.
     * @param HomeReviewRepositoryInterface $reviewRepository
     */
    public function __construct(HomeReviewRepositoryInterface $reviewRepository)
    {
        $this->reviewRepository = $reviewRepository;
    }

    /**
     * @param Request $request
     * @return Factory|View
     */
    public function index(Request $request)
    {
        $filter = $request->get('filter');

        $allReviews = $this->reviewRepository->getAllReviews(['filter' => $filter, 'page' => self::PAGE, 'per_page' => self::PER_PAGE]);

        return view('errors.content', compact(['allReviews']));
    }
}
