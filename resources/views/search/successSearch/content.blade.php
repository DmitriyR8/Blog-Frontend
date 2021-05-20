@extends('layouts.search')

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
                    <span>Result <span id = 'count-link'>{{$result['data']['total']}}</span> link</span>
                    <div id="all">
                        <div class = 'results'>
                            <div class = 'scrollable-pointer'><div></div></div>
                            @foreach($result['data']['data'] as $value)
                                <div class = 'result'>
                                    @if(isset($value['quality']) && isset($value['price']) && isset($value['customer_support']))
                                        <a href = 'single-reviews/{{$value['slug']}}'><h2>{{$value['h1_title']}}</h2></a>
                                        <p class = 'link-on-site'><a href = 'single-reviews/{{$value['slug']}}'>All Reviews/Review/{{$value['slug']}}</a></p>
                                    @else
                                        <a href = 'blog-articles/{{$value['slug']}}'><h2>{{$value['h1_title']}}</h2></a>
                                        <p class = 'link-on-site'><a href = 'blog-articles/{{$value['slug']}}'>Blog/Article/{{$value['slug']}}</a></p>
                                    @endif
                                        <p class = 'result-description'>{{$value['short_desc']}}</p>
                                        <input type="hidden" id="query" value="{{$result['query']['query']}}">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class = 'read-more-btn load-button'>
                        @if($result['data']['total'] > 6)
                            <button class = 'gray-btn' id="load-more">
                                <span id="load-more-button">View all</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="18.333" height="18.333" viewBox="0 0 18.333 18.333"><defs><style>.a{fill-rule:evenodd;}</style></defs><path class="a" d="M15.352,14.152a8.659,8.659,0,0,0,1.965-5.493h-.881a7.777,7.777,0,1,1-2.312-5.533l-.446.456,1.677.252-.288-1.672L14.74,2.5a8.659,8.659,0,1,0,.611,11.656Z" transform="translate(0.516 0.504)"></path></svg>
                            </button>
                        @endif
                    </div>
                </div>
            </div>
           
        </main>
        @include('footer')
    </div>
@endsection