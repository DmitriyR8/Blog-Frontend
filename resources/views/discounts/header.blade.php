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
                                        <a href="single-reviews">All reviews</a>
                                    </li>
                                    <li>
                                        <a href="discounts" class = 'active-page'>Get discount</a>
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
                            <li><a href="single-reviews">All reviews</a></li>
                            <li><a href="discounts" class = 'active-page'>Get discount</a></li>
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
                <h1>TOP DISCOUNT</h1>
                <div class = 'underline header-underline'><span>Choose site</span></div>
                <div class = 'coupons header-coupons'>
                    <div class = 'left-arrow'></div>
                    @foreach($getTop['data'] as $value)
                    <div class = 'coupon'>
                        <div class = 'coupon-logo'>
                            <a href = "{{$value['url']}}" rel="noreferrer noopener nofollow" target = '_blank'>
                                <picture>
                                    <source srcset = "{{env('API_URL').'show-discount-image/'.$value['id']}}" type="image/webp">
                                    <source srcset = "{{env('API_URL').'show-discount-image/'.$value['id']}}" type="image/png">
                                    <img class = 'header-coupon-img' src = '{{env('API_URL').'show-discount-image/'.$value['id']}}'>
                                </picture>
                            </a>
                            <p>{{$value['percent']}}%</p>
                        </div>
                        <p>{{ preg_replace('/<[^>]*>/', '', $value['description'] )}}</p>
                        <div class = 'coupon-code'>
                            <input type = 'text' value = '{{$value['discount_code']}}' readonly>
                            <img src = '{{asset(env('APP_URL').'image/Path 42.svg')}}'>
                        </div>
                        <a href = "{{$value['url']}}" rel="noreferrer noopener nofollow" target = '_blank'>
                            <button class = 'button raised hoverable'>
                                <div class = 'anim'></div>
                                Visit site and get discount
                            </button>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</header>