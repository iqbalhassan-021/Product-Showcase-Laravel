<div class="featured-prodcuts">
    <div class="body-cover">
        <div class="featured-wrapper disp-flex-col">
            <p class="tagline">
                Featured Product
            </p>
            <p class="desc">
            In e-commerce, the term "Featured Product" typically refers to an item that is highlighted or prominently displayed on the store's website or landing page. 
            This product is often chosen by the store owner or manager to showcase a particular item that they want to promote or draw attention to.
            </p>
            <div class="featured-prods grid">
            @if(empty($featuredProducts))
            <p class="tagline">No featured products available yet.</p>
                @else
                    @foreach($featuredProducts  as $products)
                        <div class="card">
                            <a href="{{url('/product/'.$products->id)}}">
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
                                <a href="{{url('/product/'.$products->id)}}" class="no-decoration">
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
            <a href="{{url('/products')}}">
            <button class="button" style="width:310px;margin-top:20px;">
                Load More
            </button>    
        </a>
        </div>
    </div>
</div>

