@extends('all-reviews.review.layout.app')

@section('content')
    <div class="wrapper">
        <div class = "header_main-wrapper">
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
            
        @include('all-reviews.review.header')
        
        <main>
            <div class = 'content-wrapper'>
                <div class = 'container'>
                    <div class = 'main-wrapper'>
                        <article class = 'content'>
                            <p>{!! $reviewById['main_text'] !!}</p>
                        </article>
                    </div>
                    <aside>
                        <div class = 'banner'>
                            <h3>TOP RAITING</h3>
                            @foreach($banners['data'] as $value)
                            <div class = 'rate-banner'>
                                <div class = 'header-banner'>
                                    <picture>
                                        <source srcset="{{env('API_URL').'show-logo-image/'.$value['slug']}}" type="image/webp">
                                        <source srcset="{{env('API_URL').'show-logo-image/'.$value['slug']}}" type="image/png">
                                        <a href="{{$value['link']}}" rel="noreferrer noopener nofollow" target="_blank"><img src = '{{env('API_URL').'show-logo-image/'.$value['slug']}}'></a>
                                    </picture>
                                </div>
                                <div class = 'bottom-banner'>
                                    <div class = 'rate'>
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
                                        <a href = "{{$value['slug']}}">Read more</a>
                                    </div>
                                    <p>
                                        <input type="hidden" id="review-id" value="{{$reviewById['id']}}">
                                        <a href = "{{$value['slug']}}">{!! $value['short_desc'] !!}</a>
                                    </p>
                                    <a href = '{{$value['link']}}' rel="noreferrer noopener nofollow" target="_blank"><button class = 'button raised hoverable'><div class = 'anim'></div>Visit site</button></a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </aside>
                    <div class = 'main-wrapper'>
                        <article class = 'content'>
                        </article>
                    </div>
                </div>
            </div>
            <div class = 'peopole-reviews'>
                <div class = 'container' id="review-comments">
                    <div class = 'underline peopole-reviews-underline'><span>Reviews</span></div>
                    @foreach($getComments['data']['data'] as $value)
                    <div class = 'single-people-review'>
                        <div class = 'header-single-people-review'>
                            <p>{{$value['title']}}</p>
                            <div class = 'stars-rate'>
                                @if($value['rating'])
                                    @for($i = 0.5; $i <= $value['rating']; $i++)
                                        @if($i == $value['rating'] && is_float($i))
                                            <span><img src="{{asset(env('APP_URL').'image/half star.svg')}}"></span>
                                        @else
                                            <span><img src="{{asset(env('APP_URL').'image/star (1).svg')}}"></span>
                                        @endif
                                    @endfor
                                    @for($i = ceil($value['rating']); $i < 5; $i++)
                                        <span><img src="{{asset(env('APP_URL').'image/star.svg')}}"></span>
                                    @endfor
                                @endif
                            </div>
                        </div>
                        <div class = 'posted-info'>
                            @foreach($value['user'] as $user)
                                <span>{{$user['name']}}</span>
                            @endforeach
                            <span>|</span>
                            <span>{{Carbon\Carbon::parse($value['created_at'])->format('Y-m-d')}}</span>
                        </div>
                        {!! $value['comment_body'] !!}
                    </div>
                    @endforeach
                </div>
            </div>
                    @if($getComments['data']['total'] > 3)
                    <div class = 'load-button load-another-people-reviews'>
                        <button class = 'gray-btn' id="load-more-review"><span id="load-more-review-button">Read more reviews</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="18.333" height="18.333" viewBox="0 0 18.333 18.333"><defs><style>.a{fill-rule:evenodd;}</style></defs><path class="a" d="M15.352,14.152a8.659,8.659,0,0,0,1.965-5.493h-.881a7.777,7.777,0,1,1-2.312-5.533l-.446.456,1.677.252-.288-1.672L14.74,2.5a8.659,8.659,0,1,0,.611,11.656Z" transform="translate(0.516 0.504)"></path></svg>
                        </button>
                    </div>
                    @endif
            @include('all-reviews.review.comment-form')
        </main>
        </div>
        @include('all-reviews.review.footer')
    </div>
@endsection