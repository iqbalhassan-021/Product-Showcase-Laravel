
<div class="products">
        <div class="body-cover disp-row">

            <div class="show-products disp-flex-row">
                <div class="grid-f3">
                @if(count($allproducts)<1)
                <p><strong>No products available yet.</strong></p>
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
