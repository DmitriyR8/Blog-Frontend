@extends('layouts.articles')

@section('content')
    <div class="wrapper">
        @include('blog-articles.header')
        <main>
        <div class = "email-sticky-wrapper">
                <div class = 'email-form'>
                    <div class = 'email-form-wrapper'>
                        <div class = 'email-form-left-block'>
                            <span>Get Access To Our Latest Advice</span> <br>
                            <span>Join 50,000+ People Getting Our Emails</span>
                        </div>
                        <div class = 'email-form-border'></div>
                        <form id = "email-form-submit" name = "email-form-submit" validate>
                            <input type = 'email' id="mailto" pattern="([a-z0-9]+[._-]){0,}?[a-z0-9]+@[a-z0-9]+[.]{1}[a-z]{2,4}$" title = "username@some.ca" placeholder="Enter your actual email here" required>
                            <input type="hidden" id="url" value="{{\Request::fullUrl()}}">
                            <button form = "email-form-submit" type = "submit" class = "button-footer pulse">Get Access</button>
                        </form>
                        <div class = 'cross'></div>
                    </div>
                </div>
            </div>
           <div class = "main-wrapper"> 
            <div class = 'container'>
                <div class = 'content-wrapper'>
                    <div class = 'last-blogs-theme blogs-wrapper'>
                        @foreach($getLast['data'] as $value)
                        <div class = 'blog-theme-last'>
                            <picture>
                                <source srcset="{{env('API_URL').'show-article-image/'.$value['slug']}}" type="image/webp">
                                <source srcset="{{env('API_URL').'show-article-image/'.$value['slug']}}" type="image/png">
                                <img class = 'blog-theme-img' src = '{{env('API_URL').'show-article-image/'.$value['slug']}}' data-object-fit="cover">
                            </picture>
                            <div class = 'blog-theme-last-info'>
                                <p>
                                    <a href = 'blog-articles/{{$value['slug']}}'>{{$value['h1_title']}}</a>
                                </p>
                                <div class = 'view-info'>
                                    <span>{{Carbon\Carbon::parse($value['created_at'])->format('Y-m-d')}}</span>
                                    <span>|</span>
                                    <span><img src = '{{asset(env('APP_URL').'image/continuous-line-eye.svg')}}'> {{$value['views']}}</span>
                                    <span><img src = '{{asset(env('APP_URL').'image/basic-speech-bubble.svg')}}'> {{count($value['comments'])}}</span>
                                    <span>|</span>
                                    <span><a href = 'blog-articles/{{$value['slug']}}' class = 'read-more'><span>Read more <span class = 'arrow-right'></span></span></a></span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                    <div class = 'block-underline'>

                        </div>
                    <div class = 'popular-blogs-theme blogs-wrapper'>
                        @foreach($getPopular['data'] as $value)
                        <div class = 'blog-theme-popular three-blog-theme'>
                            <picture>
                                <source srcset = "{{env('API_URL').'show-article-image/'.$value['slug']}}" type="image/webp">
                                <source srcset = "{{env('API_URL').'show-article-image/'.$value['slug']}}" type="image/png">
                                <img class = 'blog-theme-img' src = '{{env('API_URL').'show-article-image/'.$value['slug']}}' data-object-fit="cover">
                            </picture>
                            <div class = 'three-blog-theme-info'>
                                <p>
                                    <a href = "blog-articles/{{$value['slug']}}">{{$value['h1_title']}}</a>
                                </p>
                                <div class = 'view-info'>
                                    <span>{{Carbon\Carbon::parse($value['created_at'])->format('Y-m-d')}}</span>
                                    <span>|</span>
                                    <span><img src = '{{asset(env('APP_URL').'image/continuous-line-eye.svg')}}'> {{$value['views']}}</span>
                                    <span><img src = '{{asset(env('APP_URL').'image/basic-speech-bubble.svg')}}'> {{count($value['comments'])}}</span>
                                    <span>|</span>
                                    <span><a href = 'blog-articles/{{$value['slug']}}' class = 'read-more'><span>Read more <span class = 'arrow-right'></span></span></a></span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class = 'comment'>
                <div class = 'comment-wrapper'>
                    <div class = 'comment-content'>
                        <p>
                            Mt. Gox based on a bag during many zero knowledge proof. Cardano managed a instant block, or Digitex Futures could be a burned soft fork until lots of FOMO. Ripple stuck lots of instamine behind many fundamental analysis, for although Dogecoin serves the lightning fast block height, ERC20 token standard.
                        </p>
                        <div class = 'inverted-commas'><img src = '{{asset(env('APP_URL').'image/inverted-commas.svg')}}'></div>
                        <div class = 'inverted-commas'><img src = '{{asset(env('APP_URL').'image/inverted-commas.svg')}}'></div>
                    </div>
                    <a href = '#' rel="noreferrer noopener nofollow" target="_blank"><button class = 'button raised hoverable'><div class = 'anim'></div>Visit site</button></a>
                </div>
            </div>
            <div class = 'container'>
                <div class = 'content-wrapper'>
                    <div class = 'all-blogs blogs-wrapper' id="popular">
                        @foreach($getAll['data']['data'] as $value)
                        <div class = 'three-blog-theme'>
                            <picture>
                                <source srcset = "{{env('API_URL').'show-article-image/'.$value['slug']}}" type="image/webp">
                                <source srcset = "{{env('API_URL').'show-article-image/'.$value['slug']}}" type="image/png">
                                <img class = 'blog-theme-img' src = '{{env('API_URL').'show-article-image/'.$value['slug']}}' data-object-fit="cover">
                            </picture>
                            <div class = 'three-blog-theme-info'>
                                <p>
                                    <a href = "blog-articles/{{$value['slug']}}">{{$value['h1_title']}}</a>
                                </p>
                                <div class = 'view-info'>
                                    <span>{{Carbon\Carbon::parse($value['created_at'])->format('Y-m-d')}}</span>
                                    <span>|</span>
                                    <span><img src = '{{asset(env('APP_URL').'image/continuous-line-eye.svg')}}'> {{$value['views']}}</span>
                                    <span><img src = '{{asset(env('APP_URL').'image/basic-speech-bubble.svg')}}'> {{count($value['comments'])}}</span>
                                    <span>|</span>
                                    <span><a href = 'blog-articles/{{$value['slug']}}' class = 'read-more'><span>Read more <span class = 'arrow-right'></span></span></a></span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @if($getAll['data']['total'] > 3)
                    <div class = 'load-another-blogs load-button'>
                        <button class = 'gray-btn' id="load-more"><span id="load-more-button">Read more</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="18.333" height="18.333" viewBox="0 0 18.333 18.333"><defs><style>.a{fill-rule:evenodd;}</style></defs><path class="a" d="M15.352,14.152a8.659,8.659,0,0,0,1.965-5.493h-.881a7.777,7.777,0,1,1-2.312-5.533l-.446.456,1.677.252-.288-1.672L14.74,2.5a8.659,8.659,0,1,0,.611,11.656Z" transform="translate(0.516 0.504)"/></svg>
                        </button>
                    </div>
                    @endif
                </div>
            </div>
            </div>
          
        </main>
        @include('footer')
    </div>
@endsection