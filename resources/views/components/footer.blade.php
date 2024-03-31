<div class="footer">
    <div class="body-cover">
        <div class="the-footer ">
            <div class="tab disp-flex-row footer-section">
            <div class="tab ">
                <div class="footer-card">
                    <h2 class="tagline" style="color: white;">
                    {{ $store->last()->storeName}}
                    </h2>
                    <hr style="width:100%;text-align:left;margin-left:0">
                    <ul>
                        <li>
                            <p class="desc">
                                <a href="#" class="no-decoration">
                                    <i class="fa fa-map-marker"></i>
                                    {{ $store->last()->storeAddress}}
                                </a>
                            </p>
                        </li>
                        <li>
                            <p class="desc">
                                <a href="tel:.'{{ $store->last()->storePhone}}'" class="no-decoration">
                                    <i class="fa fa-phone"></i>
                                    {{ $store->last()->storePhone}}
                                </a>
                            </p>
                        </li>
                        <li>
                            <p class="desc">
                                <a href="mailto:'.{{ $store->last()->storeEmail}}'" class="no-decoration">
                                    <i class="fa fa-envelope"></i>
                                    {{ $store->last()->storeEmail}}
                                </a>
                            </p>
                        </li>
                    </ul>
                </div>
            </div>
   
            <div class="tab ">
                <div class="footer-card">
                    <h2 class="tagline" style="color: white;">
                        Products
                    </h2>
                    <hr style="width:100%;text-align:left;margin-left:0">
                    <ul>
                    @if(count($producttype)<1)
    <p class="desc" style="color: white;">No product types available</p>
@else
    <ul>
        @foreach($producttype as $type)
            <li>
                <p class="desc">
                    <a href="{{url('/products')}}" class="no-decoration">{{$type->categoryName}}</a>
                </p>
            </li>
        @endforeach
    </ul>
@endif

                    </ul>
                </div>
     
            </div>
            <div class="tab ">
                <div class="footer-card">
                    <h2 class="tagline" style="color: white;">
                       Pages
                    </h2>
                    <hr style="width:100%;text-align:left;margin-left:0;color:silver;">
                    <ul>
                        <li>
                            <p class="desc">
                                <a href="{{url('/')}}" class="no-decoration">
                                    Home
                                </a>
                            </p>
                        </li>
                        <li>
                            <p class="desc">
                                <a href="{{url('/about')}}" class="no-decoration">
                                    About
                                </a>
                            </p>
                        </li>
                        <li>
                            <p class="desc">
                                <a href="{{url('/contact')}}" class="no-decoration">
                                    Contact
                                </a>
                            </p>
                        </li>
                        <li>
                            <p class="desc">
                                <a href="{{url('/products')}}" class="no-decoration">
                                    Shop
                                </a>
                            </p>
                        </li>
                        <li>
                            <p class="desc">
                                <a href="{{url('/blogs')}}" class="no-decoration">
                                    Blogs
                                </a>
                            </p>
                        </li>
                    </ul>
                </div>
     
            </div>
            
        </div>


        
        <div class="tab disp-row social-section">
            <div class="tab disp-row icons">
                <div class="social-icons">
                    <a href="{{ $store->last()->facebookLink}}" class="icon disp-flex-row">
                    <i class="fa-brands fa-facebook-f"></i>
                    </a>
                </div>
                <div class="social-icons">
                    <a href="{{ $store->last()->linkedinLink}}" class="icon disp-flex-row">
                    <i class="fa-brands fa-etsy"></i>
                    </a>
                </div>
                <div class="social-icons">
                    <a href="{{ $store->last()->instagramLink}}" class="icon disp-flex-row">
                    <i class="fa-brands fa-instagram"></i>
                    </a>
                </div>
                <div class="social-icons">
                <a href="https://wa.me/{{ $store->last()->whatsappLink }}" class="icon disp-flex-row">

                    <i class="fa-brands fa-whatsapp"></i>
                    </a>
                </div>

            </div>
            <div class="tab sub-tab block-right">
                <div class="sub-holder">
                <form action="new_subscriber" class="search-form disp-row sub" method="post">
                @csrf
                <input type="email" placeholder="email.." name="email" class="search-box subbox" id="email">
                <button type="submit">
                    Subsrcribe
                    <i class="fa fa-check">
                    </i></button>
            </form>
                </div>
            </div>
        </div>
        <div class="tab">
            <p class="desc copyright">
                Copyright © 2024  {{ $store->last()->storeName}} | Developed by <a href="https://hassansbio.netlify.app/" class="link no-decoration"><u>E N T E R T A I N E R</u></a>
            </p>
        </div>
    </div>
    </div>
</div>