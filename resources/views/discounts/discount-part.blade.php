@foreach($data['data']['data'] as $value)
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