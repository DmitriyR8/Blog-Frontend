<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\HomeReviewRepositoryInterface;
use App\Repositories\Contracts\SidebarBannerRepositoryInterface;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class AboutController
 * @package App\Http\Controllers
 */
class AboutController extends Controller
{
    const PAGE = 1;

    const PER_PAGE = 3;

    /**
     * @var HomeReviewRepositoryInterface
     */
    protected $reviewRepository;
    /**
     * @var SidebarBannerRepositoryInterface
     */
    protected $bannerRepository;

    /**
     * AboutController constructor.
     * @param HomeReviewRepositoryInterface $reviewRepository
     * @param SidebarBannerRepositoryInterface $bannerRepository
     */
    public function __construct(HomeReviewRepositoryInterface $reviewRepository, SidebarBannerRepositoryInterface $bannerRepository)
    {
        $this->reviewRepository = $reviewRepository;
        $this->bannerRepository = $bannerRepository;
    }

    /**
     * @param Request $request
     * @return Factory|View
     */
    public function index(Request $request)
    {
        $filter = $request->get('filter');

        $allReviews = $this->reviewRepository->getAllReviews(['filter' => $filter, 'page' => self::PAGE, 'per_page' => self::PER_PAGE]);

        $banners = $this->bannerRepository->getSidebarBanners();

        return view('about.content', compact(['allReviews', 'banners']));
    }
}
