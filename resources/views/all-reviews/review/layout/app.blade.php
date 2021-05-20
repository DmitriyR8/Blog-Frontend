<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="{{ preg_replace('/<[^>]*>/', '', $reviewById['description'] )}}">
    <title>{{$reviewById['title']}}</title>
    <link rel="canonical" href="{{URL::full()}}">
    <link rel = "stylesheet" href = "{{asset('css/index.css')}}">
    <link rel = "stylesheet" href = "{{asset('css/burger.css')}}">
    <link rel = "stylesheet" href = "{{asset('css/footer.css')}}">
    <link rel = "stylesheet" href = "{{asset('css/banner.css')}}">
    <link rel = "stylesheet" href = "{{asset('css/single-review.css')}}">
    <link rel = "stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <script src = 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
    <script src = 'https://cdnjs.cloudflare.com/ajax/libs/stickybits/3.6.7/stickybits.min.js'></script>
    <script src = 'https://cdnjs.cloudflare.com/ajax/libs/stickyfill/2.1.0/stickyfill.min.js'></script>
</head>
<body>
    @yield('content')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
    <script>
        $(function () {
            $("#rateYo").rateYo({
                ratedFill: "#E74C3C",
                starWidth: "25px",
                halfStar: true,
                rating: '0.5',
                normalFill: 'transparent',
                onChange: function (rating) {
                    $("#rateYo").val(rating);
                }
            });
        });
    </script>
    <script>
        stickybits('.email-form', {verticalPosition: 'bottom'});
        
        var elements = document.querySelector('aside');
        Stickyfill.add(elements);
    </script>
    <script src = "{{asset('js/main.js')}}"></script>
    <script src = "{{asset('js/email-validate.js')}}"></script>
    <script src = "{{asset('js/comment-form.js')}}"></script>
    <script src = "{{asset('js/LoadMoreReviewComments.js')}}"></script>
    <script src = "{{asset('js/objectFitPolyfill.js')}}"></script>
</body>
</html>
