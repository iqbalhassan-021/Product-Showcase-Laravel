<div class="categories" id="categories">
    <div class="body-cover">
        <div class="heading disp-flex-col">
            <p class="tagline">
                Categories 
            </p>
            <br>
            <p class="desc">
            "In e-commerce, electronics, fashion, home essentials, beauty products, and health items are among the top-selling categories. These reflect diverse consumer interests, ranging from tech gadgets to self-care products, shaping the landscape of online shopping."
            </p>
            <div class="categories-wrapper disp-flex-row">
                <div class="categories-grid">
                @if($producttype->isEmpty())
                <p class="desc"> <strong>No categories are added yet</strong></p>
            @else
                @foreach($producttype as $type)
                    <div class="categories-card disp-flex-col">
                 
                            <img src="{{$type->categoryImage}}" alt=" {{$type->categoryName}}" class="cat-img">
              
                        <br>
                        <form action="{{url('/cetrgories')}}" method="GET" class="category-form">
                        <input type="text" value=" {{$type->categoryName}}" class="tagline hidden-input category-input" readonly id="categoryname" name="categoryname">
                        <br>
                        <button class="go shop" type="submit">
                            <p class="">
                                See Products
                            </p>
                        </button>      
                        </form>
                    </div>
                @endforeach
            @endif
                </div>
            </div>
        </div>
    </div>
</div>