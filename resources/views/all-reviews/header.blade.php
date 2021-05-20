<header>
    <div class = 'header-menu'>
        <div class = 'container'>
            <div class = 'navbar-wrapper'>
                <a href = '/' class = 'header-logo'>LOGO</a>
                <div class = 'header-bottom-left-search'>
                    <input type = 'text' id="string" placeholder = 'Search here'>
                    <input type = 'button' id="click">
                </div>
                <div class = 'navigation'>
                    <div class = 'burger-wrapper'>
                        <form class = 'burder-search'>
                            <input type = 'text' id="string-burger" placeholder="Search here">
                            <button id="click-burger">
                                <svg xmlns="http://www.w3.org/2000/svg" width="21.292" height="21.292" viewBox="0 0 21.292 21.292"><defs></defs><path class="a" d="M21.292,19.608l-6.286-6.286a8.37,8.37,0,1,0-1.684,1.684l6.286,6.286ZM.794,8.338a7.544,7.544,0,1,1,7.544,7.544A7.552,7.552,0,0,1,.794,8.338ZM14.121,14.33q.106-.1.208-.208c.058-.06.121-.115.177-.177l5.663,5.663-.562.562-5.662-5.663C14.007,14.451,14.061,14.388,14.121,14.33Z"/></svg>
                            </button>
                        </form>
                        <div class="menu-toggle">
                            <input type="checkbox" id="checkbox-burger">
                            <div class="burger">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                            <div class="burger-menu" id="menu">
                                <div></div>
                                <ul>
                                    <li>
                                        <a href="single-reviews" class = 'active-page'>All reviews</a>
                                    </li>
                                    <li>
                                        <a href="discounts">Get discount</a>
                                    </li>
                                    <li>
                                        <a href="blog-articles">Blog</a>
                                    </li>
                                    <li>
                                        <a href="about-us">About</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <nav role = 'navigation'>
                        <ul class = 'menu'>
                            <li><a href="single-reviews" class = 'active-page'>All reviews</a></li>
                            <li><a href="discounts">Get discount</a></li>
                            <li><a href="blog-articles">Blog</a></li>
                            <li><a href="about-us">About</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class = 'header-bottom'>
        <div class = 'container'>
            <div class = 'header-bottom-wrapper'>
                <h1>TOP REVIEWS</h1>
                <div class = 'underline header-underline'><span>Best reviews</span></div>
                <div class = 'reviews-wrapper'>
                    <div class = 'left-arrow'></div>
                    @foreach($topReviews['data'] as $key => $value)
                    <div class = 'single-review'>
                        <div class = 'opacity-for-image'></div>
                        <picture>
                            <source srcset = "{{env('API_URL').'show-review-image/'.$value['slug']}}" type="image/webp">
                            <source srcset = "{{env('API_URL').'show-review-image/'.$value['slug']}}" type="image/png">
                            <img src = "{{env('API_URL').'show-review-image/'.$value['slug']}}">
                        </picture>
                        <div class = 'single-review-info'>
                            <p class = 'logo-name-review'><a href = "single-reviews/{{$value['slug']}}">{{$value['logo']}}</a></p>
                            <div class = 'header-single-review-info'>
                                <div class = 'stars-rate'>
                                    @if($value['overall_rating'])
                                        @for($i = 0.5; $i <= $value['overall_rating']; $i++)
                                            @if($i == $value['overall_rating'] && is_float($i))
                                                <span><img src="{{asset(env('APP_URL').'image/half star.svg')}}"></span>
                                            @else
                                                <span><img src="{{asset(env('APP_URL').'image/star (1).svg')}}"></span>
                                            @endif
                                        @endfor
                                            @if($value['overall_rating'] < 0.5)
                                                <span><img src="{{asset(env('APP_URL').'image/star.svg')}}"></span>
                                            @endif
                                        @for($i = ceil($value['overall_rating']); $i < 5; $i++)
                                            <span><img src="{{asset(env('APP_URL').'image/star.svg')}}"></span>
                                        @endfor
                                    @endif
                                </div>
                                <span>Rating {{$value['overall_rating']}}</span>
                            </div>
                            <p>
                                <a href = "single-reviews/{{$value['slug']}}" class = 'single-review-info-text'>{{$value['short_desc']}}</a>
                            </p>
                            <span class = 'date-review'>{{Carbon\Carbon::parse($value['created_at'])->format('Y-m-d')}}</span>
                            <a href = 'single-reviews/{{$value['slug']}}'><button class = 'button raised hoverable'><div class = 'anim'></div>Read review</button></a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</header>