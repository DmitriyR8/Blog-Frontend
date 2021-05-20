<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel = "stylesheet" href = "{{asset('css/burger.css')}}">
    <link rel = "stylesheet" href = "{{asset('css/footer.css')}}">
    <link rel = "stylesheet" href = "{{asset('css/banner.css')}}">
    <link rel = "stylesheet" href = "{{asset('css/index.css')}}">
    <link rel = "stylesheet" href = "{{asset('css/about.css')}}">
    <script src = 'https://cdnjs.cloudflare.com/ajax/libs/stickyfill/2.1.0/stickyfill.min.js'></script>
    <script src = 'https://cdnjs.cloudflare.com/ajax/libs/stickybits/3.6.7/stickybits.min.js'></script>
</head>
<body>
    @yield('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src = "{{asset('js/main.js')}}"></script>
    <script>
        stickybits('.email-form', {verticalPosition: 'bottom'});
        var elements = document.querySelector('aside');
        Stickyfill.add(elements);
    </script>
    <script src = "{{asset('js/email-validate.js')}}"></script>
    <script src = "{{asset('js/objectFitPolyfill.js')}}"></script>
</body>
</html>