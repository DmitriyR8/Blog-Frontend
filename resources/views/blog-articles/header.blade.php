<header>
    <div class = 'header-menu'>
        <div class = 'container'>
            <div class = 'navbar-wrapper'>
                <a href = '/' class = 'header-logo'>LOGO</a>
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
                                        <a href="discounts">Get discount</a>
                                    </li>
                                    <li>
                                        <a href="blog-articles" class = 'active-page'>Blog</a>
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
                            <li><a href="discounts">Get discount</a></li>
                            <li><a href="blog-articles" class = 'active-page'>Blog</a></li>
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
                <div class = 'header-bottom-left'>
                    <div class = 'header-bottom-left-search'>
                        <input type = 'text' id="string" placeholder = 'Search here'>
                        <input type = 'button' id="click">
                    </div>
                    <h1>BLOG</h1>
                    @if($getHead['data'] != null)
                        <div class = 'blog-theme'>
                            <p><a href = '{{$getHead['data']['slug']}}'>{{$getHead['data']['h1_title']}}</a></p>
                            <div class = 'view-info'>
                                <span>{{Carbon\Carbon::parse($getHead['data']['created_at'])->format('Y-m-d')}}</span>
                                <span>|</span>
                                <span><img src = '{{asset(env('APP_URL').'image/continuous-line-eye.svg')}}'>{{$getHead['data']['views']}}</span>
                                <span><img src = '{{asset(env('APP_URL').'image/basic-speech-bubble.svg')}}'> {{count($getHead['data']['comments'])}}</span>
                                <span>|</span>
                                <span><a href = 'blog-articles/{{$getHead['data']['slug']}}' class = 'read-more'><span>Read more <span class = 'arrow-right'></span></span></a></span>
                            </div>
                        </div>
                    @else
                    @endif
                </div>
                <picture>
                    <source srcset="{{env('API_URL').'show-article-image/'.$getHead['data']['slug']}}" type="image/webp">
                    <source srcset="{{env('API_URL').'show-article-image/'.$getHead['data']['slug']}}" type="image/png">
                    <img src="{{env('API_URL').'show-article-image/'.$getHead['data']['slug']}}">
                </picture>
                </div>

            <div class = 'block-underline'>

            </div>
        </div>
    </div>
</header>