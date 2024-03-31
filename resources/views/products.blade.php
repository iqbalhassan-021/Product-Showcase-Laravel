<!DOCTYPE html>
<html>
<head>
    <!--Main CSS-->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/code.js') }}">
    <link rel="shortcut icon" href="{{asset('assets/images/logo.webp')}}" type="image/x-icon">

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
                <div class="grid-f3">
                @if(count($allproducts)<1)
                <p class="desc"><strong>No products available yet.</strong></p>
                    @else
                        @foreach($allproducts as $products)
                            <div class="card">
                                <a href="{{url('product/'.$products->id)}}">
                                    <img class="feature-prod-img" src="{{$products->productImage}}" alt="{{$products->productName}}">
                                </a>
                                <div class="tab disp-flex-row">
                                    <p class="desc align-left" style="color:#bcbcbc !important;">
                                        Price
                                    </p>
                                    <p class="desc align-right" style="color:#bcbcbc !important;">
                                        ${{$products->productPrice}}
                                    </p>
                                </div>
                                <div class="tab">
                                    <a href="{{url('product/'.$products->id)}}" class="no-decoration">
                                        <p class="tagline">
                                            {{$products->productName}}
                                        </p>
                                        <span>{{$products->id}}</span>
                                    </a>
                                </div>

                            </div>
                        @endforeach
                    @endif

                </div>
            </div>
        </div>
    </div>

    @include('components.featured_products')
    @include('components.brands')
    @include('components.footer')

</body>
</html>
