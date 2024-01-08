<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title-block')</title>
</head>

<body>
@if($errors->any())
    <div class="alert alert-danger" id="error-message">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    <script>
        setTimeout(function() {
            var errorMessage = document.getElementById('error-message');
            errorMessage.style.transition = 'opacity 1s ease-out';
            errorMessage.style.opacity = 0;
            // Удаляем элемент после завершения анимации
            setTimeout(function() {
                errorMessage.style.display = 'none';
            }, 1000);
        }, 5000);
    </script>
@endif
@include('inc.header')
@yield('content')
</body>
</html>
