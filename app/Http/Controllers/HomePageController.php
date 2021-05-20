<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\HomeBlogRepositoryInterface;
use App\Repositories\Contracts\HomeReviewRepositoryInterface;
use App\Repositories\Contracts\SidebarBannerRepositoryInterface;
use Illuminate\Http\Request;

/**
 * Class HomePageController
 * @package App\Http\Controllers
 */
class HomePageController extends Controller
{
    const PAGE = 1;

    const PER_PAGE = 3;

    /**
     * @var HomeBlogRepositoryInterface
     */
    protected $homeBlogRepository;
    /**
     * @var HomeReviewRepositoryInterface
     */
    protected $homeReviewRepository;
    /**
     * @var SidebarBannerRepositoryInterface
     */
    protected $bannerRepository;

    /**
     * HomePageController constructor.
     * @param HomeBlogRepositoryInterface $homeBlogRepository
     * @param HomeReviewRepositoryInterface $homeReviewRepository
     * @param SidebarBannerRepositoryInterface $bannerRepository
     */
    public function __construct
    (
        HomeBlogRepositoryInterface $homeBlogRepository,
        HomeReviewRepositoryInterface $homeReviewRepository,
        SidebarBannerRepositoryInterface $bannerRepository
    )
    {
        $this->homeBlogRepository = $homeBlogRepository;
        $this->homeReviewRepository = $homeReviewRepository;
        $this->bannerRepository = $bannerRepository;
    }

    /**
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {
        $filter = $request->get('filter');

        $homeBlog = $this->homeBlogRepository->getData();

        $homeReview = $this->homeReviewRepository->getReviews();

        $homeBanners = $this->bannerRepository->getSidebarBanners();

        $allReviews = $this->homeReviewRepository->getAllReviews(['filter' => $filter,'page' => self::PAGE, 'per_page' => self::PER_PAGE]);

        return view('home-page.content', compact(['homeBlog', 'homeReview', 'homeBanners', 'allReviews']));
    }
}
