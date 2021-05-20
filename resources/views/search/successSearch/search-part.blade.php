@foreach($data['data']['data'] as $value)
    <div class = 'result'>
        @if(isset($value['quality']) && isset($value['price']) && isset($value['customer_support']))
            <a href = 'single-reviews/{{$value['slug']}}'><h2>{{$value['h1_title']}}</h2></a>
            <p class = 'link-on-site'><a href = 'single-reviews/{{$value['slug']}}'>All Reviews/Review/{{$value['slug']}}</a></p>
        @else
            <a href = 'blog-articles/{{$value['slug']}}'><h2>{{$value['h1_title']}}</h2></a>
            <p class = 'link-on-site'><a href = 'blog-articles/{{$value['slug']}}'>Blog/Article/{{$value['slug']}}</a></p>
        @endif
        <p class = 'result-description'>{{$value['short_desc']}}</p>
    </div>
@endforeach