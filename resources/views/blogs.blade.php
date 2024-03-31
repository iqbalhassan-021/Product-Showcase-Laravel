<!DOCTYPE html>
<html lang="en">
<head>
    <!--Main CSS-->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/code.js') }}">
    <link rel="shortcut icon" href="{{asset('assets/images/logo.webp')}}" type="image/x-icon">
    <!--Slick CSS-->
    <link rel="stylesheet" href="{{ asset('assets/slick/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/slick/slick.css') }}">
    <!--Google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title> {{ $store->last()->storeName}}</title>
</head>
<body>
@include('components.header')

<div class="products">
        <div class="body-cover disp-row">

        <div class="show-products disp-flex-row">
            @if($blog->isEmpty())
                <p class="tagline"> 
                    <strong>
                        There is nothing to show
                    </strong>
                </p>
            @else

                <div class="grid-f3">
                    @foreach($blog as $blogs)
                        <div class="blog-card">
                            <a href="{{url('/single/'.$blogs->id)}}" class="no-decoration">
                                <img src="{{$blogs->blogimg}}" alt="{{$blogs->blogtitle}}" class="blog-image">
                            </a>
                            <a href="{{url('/single/'.$blogs->id)}}">
                                <p class="tagline"> 
                                    <strong>
                                        {{$blogs->blogtitle}}
                                    </strong>
                                </p>
                            </a>
                            <p class="desc short-content">
                                {{$blogs->blogcontent}}
                            </p>
                        </div>
                     
                    @endforeach
                </div>

            @endif
        </div>

            </div>
        </div>
</div>
@include('components.footer')
</body>
</html>