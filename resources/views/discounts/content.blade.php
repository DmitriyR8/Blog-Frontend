@extends('layouts.discounts')

@section('content')
    <div class="wrapper">
        @include('discounts.header')
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
                    <div class = 'underline main-underline'>
                        <div class = 'underline-text'><span>All coupon      </span><span>|</span><span>{{$getDiscounts['data']['total']}} offers</span></div>
                    </div>
                    <div class = 'coupons main-coupons' id="coupon">
                        <div class = 'left-arrow'></div>
                        @foreach($getDiscounts['data']['data'] as $value)
                            <div class = 'coupon'>
                                <div class = 'coupon-logo'>
                                    <p>{{$value['percent']}}%</p>
                                    <a href = "{{$value['url']}}" rel="noreferrer noopener nofollow" target = '_blank'>
                                        <picture>
                                            <source srcset = "{{env('API_URL').'show-discount-image/'.$value['id']}}" type="image/webp">
                                            <source srcset = "{{env('API_URL').'show-discount-image/'.$value['id']}}" type="image/png">
                                            <img class = 'header-coupon-img' src = '{{env('API_URL').'show-discount-image/'.$value['id']}}'>
                                        </picture>
                                    </a>
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
                    @if($getDiscounts['data']['total'] > 3)
                    <div class = 'load-another-coupon load-button'>
                        <button class = 'gray-btn' id="load-more"><span id="load-more-button">View all</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="18.333" height="18.333" viewBox="0 0 18.333 18.333"><defs><style>.a{fill-rule:evenodd;}</style></defs><path class="a" d="M15.352,14.152a8.659,8.659,0,0,0,1.965-5.493h-.881a7.777,7.777,0,1,1-2.312-5.533l-.446.456,1.677.252-.288-1.672L14.74,2.5a8.659,8.659,0,1,0,.611,11.656Z" transform="translate(0.516 0.504)"/></svg>
                        </button>
                    </div>
                    @endif
                </div>
            </div>
            <div class = 'about-coupons'>
                <div class = 'container'>
                    <div class = 'about-coupons-wrapper'>
                        <div class = 'about-coupon'>
                            <h3>How to use the coupons</h3>
                            <p>Dash chose lots of trustless, yet NEO was the delegated proof-of-stake! It is many automated delegated proof-of-stake, therefore, Bitcoin Cash allowed few fork! Ethereum limited!</p>
                        </div>
                        <div class = 'about-coupon'>
                            <h3>Other coupons tips</h3>
                            <p>Dash chose lots of trustless, yet NEO was the delegated proof-of-stake! It is many automated delegated proof-of-stake, therefore, Bitcoin Cash allowed few fork! Ethereum limited!</p>
                        </div>
                        <div class = 'about-coupon'>
                            <h3>About our coupons</h3>
                            <p>Dash chose lots of trustless, yet NEO was the delegated proof-of-stake! It is many automated delegated proof-of-stake, therefore, Bitcoin Cash allowed few fork! Ethereum limited!</p>
                        </div>
                    </div>
                </div>
            </div>
           
        </main>
        @include('footer')
    </div>
@endsection