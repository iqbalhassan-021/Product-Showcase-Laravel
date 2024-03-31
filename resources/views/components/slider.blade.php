
<div class="slider" id="slider">
    <div class="body-cover">
        <div class="slide-warpper disp-flex-row hero-slider">
        @if(empty($featuredProducts))
    <p class="tagline">No slides added yet</p>
@else
    @foreach($featuredProducts as $featuredProduct)
        <div class="slide-container disp-flex-row">
            <div class="the-content disp-flex-col">
                <div class="slide-text">
                    <p class="title">
                        <strong>{{$featuredProduct->productName}}</strong>
                    </p>
                    <p class="tagline">{{$featuredProduct->id}}</p>
                    <p class="desc">{{$featuredProduct->productDescription}}</p>
                    <a href="{{url('/product/'.$featuredProduct->id)}}" class="no-decoration link">Learn more</a>
                </div> 
            </div>
            <div class="slider-image disp-flex-row">
                <img src="{{$featuredProduct->productImage}}" alt="{{$featuredProduct->productName}}">
            </div>
        </div>
    @endforeach
@endif
        </div>
    </div>
</div>