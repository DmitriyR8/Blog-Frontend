<footer>
    <div class = 'footer-wrapper'>
        <div class = 'container'>
            <div class = 'grid-table'>
                <div>LOGO</div>
                <div>Site</div>
                <div class = 'footer-reviews'>Reviews</div>
                <div>Political</div>
                <div class = 'logo-column'>
                    <p>Welcome to our web-site! What do we do? We help people to do their studies by collecting customer reviews on custom writing services and providing with academic tips how to make their education process as smooth as possible!</p>
                    <p>2019 Logo, Inc. All rights reserved</p>
                </div>
                <div>
                    <ul>
                        <li><a href = 'single-reviews'>All reviews</a></li>
                        <li><a href = 'blog-articles'>Blog</a></li>
                        <li><a href = 'discounts'>Get discount</a></li>
                        <li><a href = 'about-us'>About us</a></li>
                    </ul>
                </div>
                @if(isset($allReviews))
                <div>
                    <ul>
                        @foreach($allReviews['data']['data'] as $key => $review)
                            @if($key == 8)
                                @break
                            @endif
                            @if($key && $key % 4 == 0)
                    </ul>
                </div>
                <div>
                    <ul>
                        @endif
                        <li><a href = 'single-reviews/{{$review['slug']}}'>{{$review['h1_title']}}</a></li>
                        @endforeach
                    </ul>
                </div>
                @else
                    <div></div>
                    <div></div>
                @endif
                <div>
                    <p><a href = '#'>Legal</a></p>
                </div>
            </div>
        </div>
        
    </div>
</footer>