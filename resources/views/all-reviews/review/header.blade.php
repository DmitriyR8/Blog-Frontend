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
                                        <a href="../single-reviews" class = 'active-page'>All reviews</a>
                                    </li>
                                    <li>
                                        <a href="../discounts">Get discount</a>
                                    </li>
                                    <li>
                                        <a href="../blog-articles">Blog</a>
                                    </li>
                                    <li>
                                        <a href="../about-us">About</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <nav role = 'navigation'>
                        <ul class = 'menu'>
                            <li><a href="../single-reviews" class = 'active-page'>All reviews</a></li>
                            <li><a href="../discounts">Get discount</a></li>
                            <li><a href="../blog-articles">Blog</a></li>
                            <li><a href="../about-us">About</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class = 'header-bottom'>
        <div class = "about-site" style = "background: linear-gradient(rgba(51,51,51,0.5), rgba(51,51,51,0.5)), url({{env('API_URL').'show-review-image/'.$reviewById['slug']}}) no-repeat; background-size: 100% 100%;">
            <div class = "about-site-header">
                <svg xmlns="http://www.w3.org/2000/svg" width="45.694" height="33.737" viewBox="0 0 45.694 33.737"><g transform="translate(0 -25.905)"><path class="a" d="M0,41.367H11.083c-.189,8.077-2.48,8.994-5.358,9.256l-1.11.138v8.882l1.279-.069c3.757-.211,7.911-.889,10.683-4.31,2.429-3,3.5-7.9,3.5-15.421V25.905H0Z"></path><path class="a" d="M111,25.905V41.367h10.935c-.189,8.077-2.406,8.994-5.284,9.256l-1.036.138v8.882l1.205-.069c3.757-.211,7.949-.889,10.72-4.31,2.429-3,3.537-7.9,3.537-15.421V25.905Z" transform="translate(-85.383)"></path></g></svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="45.694" height="33.737" viewBox="0 0 45.694 33.737"><g transform="translate(0 -25.905)"><path class="a" d="M0,41.367H11.083c-.189,8.077-2.48,8.994-5.358,9.256l-1.11.138v8.882l1.279-.069c3.757-.211,7.911-.889,10.683-4.31,2.429-3,3.5-7.9,3.5-15.421V25.905H0Z"></path><path class="a" d="M111,25.905V41.367h10.935c-.189,8.077-2.406,8.994-5.284,9.256l-1.036.138v8.882l1.205-.069c3.757-.211,7.949-.889,10.72-4.31,2.429-3,3.537-7.9,3.537-15.421V25.905Z" transform="translate(-85.383)"></path></g></svg>
                <h1>
                    {{$reviewById['h1_title']}}
                </h1>
            </div>
            <div class = 'about-site-bottom'>
                <div class = 'about-site-bottom-header'>
                    <div class = 'about-site-bottom-left'>
                        <div class = 'stars-rate'>
                            @if($reviewById['overall_rating'])
                                @for($i = 0.5; $i <= $reviewById['overall_rating']; $i++)
                                    @if($i == $reviewById['overall_rating'] && is_float($i))
                                        <span><img src="{{asset(env('APP_URL').'image/half star.svg')}}"></span>
                                    @else
                                        <span><img src="{{asset(env('APP_URL').'image/star (1).svg')}}"></span>
                                    @endif
                                @endfor
                                    @if($reviewById['overall_rating'] < 0.5)
                                        <span><img src="{{asset(env('APP_URL').'image/star.svg')}}"></span>
                                    @endif
                                @for($i = ceil($reviewById['overall_rating']); $i < 5; $i++)
                                    <span><img src="{{asset(env('APP_URL').'image/star.svg')}}"></span>
                                @endfor
                            @endif
                        </div>
                        <div class = 'ratings-scale'>
                            <span>Quality</span>
                            <div class = 'rating-scale' style = 'background: linear-gradient(to right, #BB261A, #BB261A {{$reviewById['quality']}}%,lightgray {{$reviewById['quality']}}%);'></div>
                            <span>Price</span>
                            <div class = 'rating-scale' style = 'background: linear-gradient(to right, #BB261A, #BB261A {{$reviewById['price']}}%,lightgray {{$reviewById['price']}}%);'></div>
                            <span>Customer Support</span>
                            <div class = 'rating-scale' style = 'background: linear-gradient(to right, #BB261A, #BB261A {{$reviewById['customer_support']}}%,lightgray {{$reviewById['customer_support']}}%);'></div>
                        </div>
                    </div>
                    <div class = 'about-site-bottom-right'>
                        <span>{{$reviewById['overall_rating']}}</span>
                        <div class = 'stars-rate'>
                            @if($reviewById['overall_rating'])
                                @for($i = 0.5; $i <= $reviewById['overall_rating']; $i++)
                                    @if($i == $reviewById['overall_rating'] && is_float($i))
                                        <span><img src="{{asset(env('APP_URL').'image/half star.svg')}}"></span>
                                    @else
                                        <span><img src="{{asset(env('APP_URL').'image/star (1).svg')}}"></span>
                                    @endif
                                @endfor
                                    @if($reviewById['overall_rating'] < 0.5)
                                        <span><img src="{{asset(env('APP_URL').'image/star.svg')}}"></span>
                                    @endif
                                @for($i = ceil($reviewById['overall_rating']); $i < 5; $i++)
                                    <span><img src="{{asset(env('APP_URL').'image/star.svg')}}"></span>
                                @endfor
                            @endif
                        </div>
                        <a href = '{{$reviewById['link']}}' rel="noreferrer noopener nofollow" target="_blank" class="button raised hoverable">
                            <div class="anim"></div><span>Visit site</span>
                        </a>
                    </div>
                </div>
                <div class = 'view-info'>
                    <span>{{Carbon\Carbon::parse($reviewById['created_at'])->format('Y-m-d')}}</span>
                    <span>|</span>
                    <span>{{$reviewById['author']}}</span>
                    <span>|</span>
                    <span><img src = '{{asset('image/basic-speech-bubble.svg')}}'> {{count($reviewById['comments'])}}</span>
                </div>
            </div>
        </div>
    </div>
</header>