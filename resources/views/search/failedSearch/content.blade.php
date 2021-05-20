@extends('layouts.search-no-results')

@section('content')
    <div class="wrapper">
        @include('search.header')
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
                <div class = 'container'>
                    <div class = 'main-wrapper'>
                        <h2>Oooops..... no result click new search</h2>
                        <aside>
                            <div class = 'banner'>
                                @foreach($banners['data'] as $value)
                                    <div class = 'rate-banner'>
                                        <div class = 'header-banner'>
                                            <picture>
                                                <source srcset="{{env('API_URL').'show-logo-image/'.$value['slug']}}" type="image/webp">
                                                <source srcset="{{env('API_URL').'show-logo-image/'.$value['slug']}}" type="image/png">
                                                <a href="{{$value['link']}}"><img src = '{{env('API_URL').'show-logo-image/'.$value['slug']}}'></a>
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
                                                <a href = "single-reviews/{{$value['slug']}}">Read more</a>
                                            </div>
                                            <p>
                                                <input type="hidden" id="id" value="{{$value['slug']}}">
                                                <a href = "single-reviews/{{$value['slug']}}">{!! $value['short_desc'] !!}</a>
                                            </p>
                                            <a href = '{{$value['link']}}'><button class = 'button raised hoverable'><div class = 'anim'></div>Visit site</button></a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </aside>
                    </div>
                </div>
                
        </main>
        @include('footer')
    </div>
@endsection