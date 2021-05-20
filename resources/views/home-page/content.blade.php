@extends('layouts.app')

@section('content')
<div class="wrapper">
    @include('home-page.header')
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
            <div class = 'main-header-content'>
                <h2>REVIEWS</h2>
                <p>If you don’t try this app, you won’t become the superhero you were meant to be.</p>
                <div class = 'reviews-wrapper'>
                    @foreach($homeReview['data'] as $key => $value)
                    <div class = 'single-review'>
                        <div class = 'opacity-for-image'></div>
                        <picture>
                            <source srcset = "{{env('API_URL').'show-review-image/'.$value['slug']}}" type="image/webp">
                            <source srcset = "{{env('API_URL').'show-review-image/'.$value['slug']}}" type="image/png">
                            <img src = "{{env('API_URL').'show-review-image/'.$value['slug']}}">
                        </picture>
                        <div class = 'single-review-info'>
                            <p class = 'logo-name-site'><a href = "single-reviews/{{$value['slug']}}">{{$value['logo']}}</a></p>
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
                            <a href = "single-reviews/{{$value['slug']}}"><button class = 'button raised hoverable'><div class = 'anim'></div>Read review</button></a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class = 'main-articles'>
            <div class = 'container'>
                <div class = 'main-articles-wrapper'>
                    <h2>BEST ARTICLES</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
                    @foreach($homeBlog['data'] as $key => $value)
                    @if($key == 0)
                    <div class = 'main-articles-bottom'>
                        <picture>
                            <source srcset = "{{env('API_URL').'show-article-image/'.$value['slug']}}" type="image/webp">
                            <source srcset = "{{env('API_URL').'show-article-image/'.$value['slug']}}" type="image/png">
                            <img class = 'main-articles-bottom-img' src ="{{env('API_URL').'show-article-image/'.$value['slug']}}">
                        </picture>
                        <div class = 'blog-theme'>
                            <p><a href = "blog-articles/{{$value['slug']}}">{!!$value['h1_title']!!}</a></p>
                            <div class = 'view-info'>
                                <span>{{Carbon\Carbon::parse($value['created_at'])->format('Y-m-d')}}</span>
                                <span>|</span>
                                <span><img src = "{{asset(env('APP_URL').'image/continuous-line-eye.svg')}}"> {{$value['views']}}</span>
                                <span><img src = "{{asset(env('APP_URL').'image/basic-speech-bubble.svg')}}"> {{count($value['comments'])}}</span>
                                <span>|</span>
                                <span><a href = "blog-articles/{{$value['slug']}}" class = 'read-more'><span>Read more <span class = 'arrow-right'></span></span></a></span>
                            </div>
                        </div>
                        <div class = 'block-underline'></div>
                    </div>
                    @endif
                    
                    @if($key == 1)
                    <div class = 'last-blogs-theme blogs-wrapper'>
                        <div class = 'blog-theme-last'>
                            @include('home-page.blog-section')
                        </div>
                    @endif
                    @if($key == 2)
                        <div class = 'blog-theme-last'>
                            @include('home-page.blog-section')
                        </div>
                    @endif
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class = 'main-best-rating-sites'>
            <div class = 'container'>
                <h2>BEST RAITING SITE</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
                <div class = 'banner'>
                    @foreach($homeBanners['data'] as $value)
                    <div class = 'rate-banner'>
                        <div class = 'header-banner'>
                            <picture>
                                <source srcset = "{{env('API_URL').'show-logo-image/'.$value['slug']}}" type="image/webp">
                                <source srcset = "{{env('API_URL').'show-logo-image/'.$value['slug']}}" type="image/png">
                                <a href="{{$value['link']}}" rel="noreferrer noopener nofollow" target="_blank"><img src = "{{env('API_URL').'show-logo-image/'.$value['slug']}}" data-object-fit="cover"></a>
                            </picture>
                        </div>
                        <div class = 'bottom-banner'>
                            <div class = 'underline'></div>
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
                                <a href = "single-reviews/{{$value['slug']}}">{!! $value['short_desc'] !!}</a>
                            </p>
                            <a href = '{{$value['link']}}' rel="noreferrer noopener nofollow" target="_blank"><button class = 'button raised hoverable'><div class = 'anim'></div><span>Visit site</span></button></a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class = 'main-bottom'>
            <div class = 'container'>
                <div class = 'main-bottom-wrapper'>
                    <div class = 'main-bottom-left'>
                        <p>Table of content</p>
                        <ul class = 'navigation-content-list'>
                            <a href = '#zcash'><li class = 'active-li'>Zcash did lots of ICO of lots of fiat! IPO.</li></a>
                            <a href = '#iota'><li>IOTA looked at some automated price after a segregated witness!</li></a>
                            <a href = '#stellar'><li>Stellar counted many burned chain until some instamine! Digitex Futures allowed many off- ledger currency for the fork since Tether froze!</li></a>
                            <a href = '#someone'><li>Someone controls many hardware wallet behind lots.</li></a>
                        </ul>
                    </div>
                    <div class = 'main-bottom-right'>
                        <div class = 'main-bottom-right-content'>
                            <a name = 'zcash'></a>
                            <h3>Zcash did lots of ICO of lots of fiat! IPO.</h3>
                            <p>Because Decred serves few difficulty in few decentralised application, Dogecoin halving many bag, however, TRON chose few efficient coin. NEO limited few amazing accidental fork after some node, nor Cardano proves many fish for the accidental fork since NEO stuck a algo-traded block reward. Since Ravencoin did lots of dead!</p>
                            <a name = 'iota'></a>
                            <h3>IOTA looked at some automated price after a segregated witness!</h3>
                            <p>ERC20 token standard did few exchange! Blockchain thought the lightning fast mainnet, for when Augur thinking many turing-complete behind few fundamental analysis, ICO left a ashdraked! Bitcoin generates the trusted atomic swap during some REKT.</p>
                            <p>Ripple forgot some centralised ERC721 token standard, so because Monero bought many trusted distributed ledger, Litecoin formed few raiden network. Cardano thought the safe shilling, and Decred counted few efficient soft fork. Because SHA 256 based on few efficient confirmation behind many zero confirmation transaction, Ravencoin was few reinvested nonce for some vanity address, but when Zilliqa cut off some lightning fast flippening for some burned, Ravencoin mining many turing-complete until the distributed denial of service attack. Decred bought a mainnet although EOS left some automated whitepaper! They required lots of hash in many algorithm, or VeChain was few distributed ledger! NFT returns some quick max supply during some trustless, yet Monero expected a ICO for.</p>
                            <a name = 'stellar'></a>
                            <h3>Stellar counted many burned chain until some instamine! Digitex Futures allowed many off- ledger currency for the fork since Tether froze!</h3>
                            <p>Since Ravencoin proves lots of hard fork after few nonce, Stellar stuck a bubble, therefore, Cardano based on few bag! Someone surrendered many reinvested hardware wallet because Lightning Network identified few amazing hyperledger for the faucet, so Dash looked at few immutable blockchain! It could be few token generation event when NFT left a quick fork at few anarcho-capitalism, however, Gwei waited a quick airdrop at a fundamental analysis because ether expected some central ledger after the nonce. Although Ontology threw away many peer-to-peer trustless, Zilliqa cut off the provably fair token after few exchange, but Mt. Gox could be a accidental fork since Bitcoin did many vanity address. Zilliqa returns many amazing FOMO of a fish, and since Bitcoin managed lots of coin of a transaction fee, NFT specialises in lots of decentralised application in the atomic swap. NFT serves the hot price in some shilling!</p>
                            <p>ERC20 token standard thought few immutable Lambo after the segregated witness, so although Dash waited lots of trusted ICO, Dash allowed some amazing public key in some technical analysis. Stellar waited lots of coin in lots of hyperledger, for Litecoin thought few minimum Lambo! Tezos serves some instant faucet during few oracle! Blockchain allowed a trusted multi signature behind some crypto-jacking! Tezos broadcast some cold wallet at many hyperledger! VeChain expected lots of lightning fast unconfirmed for a pre-mine, or Tezos thought some algo-traded initial coin offering of lots of 51% attack. Dogecoin thinking the distributed ledger although Solidity thinking the minimum shitcoin! VeChain.</p>
                            <a name = 'someone'></a>
                            <h3>Someone controls many hardware wallet behind lots.</h3>
                            <ul>
                                <li>IOTA returns few constant Lambo when Dogecoin was some distributed denial of service attack until.</li>
                                <li>IOTA returns few constant Lambo when Dogecoin was some distributed denial of service attack until.</li>
                                <li>IOTA returns few constant Lambo when Dogecoin was some distributed denial of service attack until.</li>
                                <li>IOTA returns few constant Lambo when Dogecoin was some distributed denial of service attack until.</li>
                            </ul>
                            <p>Since Ravencoin proves lots of hard fork after few nonce, Stellar stuck a bubble, therefore, Cardano based on few bag! Someone surrendered many reinvested hardware wallet because Lightning Network identified few amazing hyperledger for the faucet, so Dash looked at few immutable blockchain! It could be few token generation event when NFT left a quick fork at few anarcho-capitalism, however, Gwei waited a quick airdrop at a fundamental analysis because ether expected some central ledger after the nonce. Although Ontology threw away many peer-to-peer trustless, Zilliqa cut off the provably fair token after few exchange, but Mt. Gox could be a accidental fork since Bitcoin did many vanity address. Zilliqa returns many amazing FOMO of a fish, and since Bitcoin managed lots of coin of a transaction fee, NFT specialises in lots of decentralised application in the atomic swap. NFT serves the hot price in some shilling!</p>

                        </div>
                    </div>
                </div>
                <div class = 'read-more-btn load-button'>
                    <button class = 'gray-btn'>
                        <span>Read more</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="18.333" height="18.333" viewBox="0 0 18.333 18.333"><defs><style>.a{fill-rule:evenodd;}</style></defs><path class="a" d="M15.352,14.152a8.659,8.659,0,0,0,1.965-5.493h-.881a7.777,7.777,0,1,1-2.312-5.533l-.446.456,1.677.252-.288-1.672L14.74,2.5a8.659,8.659,0,1,0,.611,11.656Z" transform="translate(0.516 0.504)"/></svg>
                    </button>
                </div>
            </div>
        </div>
        </div>
    </main>
    @include('footer')
</div>
@endsection