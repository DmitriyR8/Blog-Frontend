@extends('layouts.errors')

@section('content')
    <div class = "wrapper">
    @include('errors.header')
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
                <div class = 'error'>
                    <picture>
                        <source srcset="{{asset(env('APP_URL').'image/igor-rand-1665701-unsplash-404.webp')}}" type="image/webp">
                        <source srcset="{{asset(env('APP_URL').'image/igor-rand-1665701-unsplash-404.png')}}" type="image/png">
                        <img src = '{{asset(env('APP_URL').'image/igor-rand-1665701-unsplash-404.png')}}'>
                    </picture>
                    <div class = 'error-status'>
                        <span>SORRY...</span>
                        <span class = 'status-code'>404</span>
                        <span>page not found</span>
                        <a href = "/">
                            <button class = 'button raised hoverable'>
                                <div class = 'anim'></div>
                                Go home page
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
       
    </main>
    @include('errors.footer')
    </div>
@endsection