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
    <!--Fancybox pop-up-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />

    <title>{{$product->productName}}</title>
</head>
<body>
@include('components.header')
    <div class="the-product">
        <div class="body-cover ">
            <div class="product-container disp-row">
            <div class="product-visual ">
                <div class="container">
                    <img src="{{$product->productImage}}" alt="{{$product->productName}}">
                </div>
            </div>
            <div class="product-details">
            <div class="details-tab">
                <p class="desc">
                <strong>Product Name : </strong> {{$product->productName}}
                </p>
                <p class="desc" id="productprice">
                 <strong>Product Price : </strong>${{$product->productPrice}}
                </p>
                <p class="desc">
                <strong>Product ID : </strong>{{$product->id}}
                </p>
                <p class="desc">
                    <strong>
                        Description
                    </strong>
                </p>
                <p class="desc">
                {{$product->productDescription}}
                </p>
                <p class="desc">
                    <strong>
                        Category
                    </strong>
                </p>
                <p class="desc">
                {{$product->productCategory}}
                </p>
                <p class="desc">
                    <strong>
                        Shipping Fee
                    </strong>
                </p>
                <p class="desc" >
                    $
                    <span class="desc" id="shippingfee">
                    @if(empty($product->shippingfees))
                    2
                @else
                    {{$product->shippingfees}}
                @endif
                    </span>
                
            </p>
                <div class="size-quality">
                    <div class="size-container">
                        <p class="desc">
                           Available Size : 
                           
                        </p>
                            <p class="desc">
                            {{$product->productsize}}
                            </p>
                    </div>
                    <div class="quality">
                        <p class="desc">Quantity : </p>
                        <button class="button" onclick="decrementCounter()">-</button>
                        <p class="desc" style="margin-left: 10px;" id="quantity-display">1</p>
                        <button class="button" onclick="incrementCounter()">+</button>
                       
                    </div>
                </div>
                <div class="">
                <p class="desc"><strong>Total: </strong>$<span id="total"></span></p>
                </div>
                <div class="buy-cart disp-flex-row">
                    @if($user_name)
                    <button class="button button-big" data-fancybox data-src="#orderPopup" >
                            <p class="desc" style="color: white;">Buy</p>
                        </button> 
                    @else
                    <a href="{{url('/auth')}}">
                    <button class="button button-big" >
                        <p class="desc" style="color: white;">Login to buy the product</p> 
                        </button> 
                        </a> 
                    @endif
                </div>
            </div>
            </div>
        </div>
    </div>
    </div>

@include('components.related_posts')
@include('components.footer')
<div id="orderPopup" style="display: none;">
    <div class="popup-content">
        <!-- Order Form -->
        <form action="{{ url('place_order') }}"  id="orderForm" method="post">
        @csrf
            <!-- Product Name -->
            <label for="productName">Product Name:</label>
            <input type="text" id="productName" name="productName" value="{{$product->productName}}" readonly class="input-field">

            <!-- Product ID -->
            <label for="productId">Product ID:</label>
            <input type="text" id="productId" name="productId" value="{{$product->id}}" readonly class="input-field">

            <!-- Product Description -->
            <label for="productDescription">Product Description:</label>
            <textarea type="text" id="productDescription" name="productDescription" readonly class="desc" rows="10" style="width: 100%; padding: 10px;">{{$product->productDescription}}</textarea>

            <!-- Product Price -->
            <label for="productPrice">Product Price:</label>
            <input type="text" id="productPrice" name="productPrice" value="${{$product->productPrice}}" readonly class="input-field">

            <!-- Product Size -->
            <label for="productSize">Product Size:</label>
            <input type="text" id="productSize" name="productSize" value="{{$product->productsize}}" readonly class="input-field">

            <!-- Quantity -->
            <label for="quantity">Quantity:</label>
            <input type="text" id="quantity" name="quantity" value="1" class="input-field" readonly>

            <!-- Total -->
            <label for="totalPrice">Total:</label>
            <input type="text" id="totalPrice" name="totalPrice" value="" class="input-field" readonly>
           
            <label for="username">Username:</label>
            <input type="text" name="username" placeholder="Buyer Name" required class="input-field" value="{{$user_name}}" readonly><br>

            <!-- Buyer Name -->
            <label for="buyername">Buyer Name:</label>
            <input type="text" name="buyername" placeholder="Buyer name" required class="input-field" ><br>

            <!-- Phone Number Input -->
            <label for="phone">Phone Number:</label>
            <input type="text" name="phone" placeholder="Enter Phone Number or any contact details" required class="input-field"><br>

            <label for="address">Address:</label>
            <textarea name="address" id="address" class="desc" rows="5" style="width: 100%; padding: 10px;" placeholder="Address" required></textarea>

            <div class="payment-method disp-flex-row">
               <p class="desc">Cash on Delivery avaiable  </p><i class="fa-solid fa-truck "></i>
            </div><br>
            <span class="desc">
                      
            </span> <br>
            <!-- Submit Button -->
            <button type="submit" class="button button-big" style="margin-top: 20px;" id="confirmOrderButton">Confirm Order</button>
        </form>
    </div>
</div>
<!-- FancyBox Popup Content -->
<div id="orderSuccessPopup" style="display: none;">
    <img src="{{asset('assets/images/Successful-purchase-pana.png')}}" alt="Order Success Image" style="width: 70%;">
    <p class="desc">Order Confirmed Successfully!!!</p>
    <p class="desc">we will send you a tracking ID soon</p>
</div>
<div id="cartpopup" style="display: none;">
    <img src="{{asset('assets/images/Add-to-Cart-amico.png')}}" alt="Order Success Image" style="width: 70%;">
    <p class="desc">Added to cart Successfully</p>

</div>
<!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>

<script>
$(document).ready(function() {
    $('#addcart').click(function() {
        // Show the popup
        $('#cartpopup').fadeIn();

        // Hide the popup after 3 seconds
        setTimeout(function() {
            $('#cartpopup').fadeOut();
        }, 5000);
    });
});
</script>
<script>
let count = 1;
let price = parseFloat(document.getElementById('productprice').textContent.replace('Product Price : $', '')); // Extract the product price
let totallprice = document.getElementById('total');
let fees = parseFloat(document.getElementById('shippingfee').innerHTML);

function updateTotal() {
    let total = count * price + fees;
    totallprice.textContent = total.toFixed(2);
    document.getElementById('totalPrice').value = total;
}

function incrementCounter() {
    count++;
    document.getElementById('quantity-display').textContent = count;
    document.getElementById('quantity').value = count;
    updateTotal();
}

function decrementCounter() {
    if (count > 1) {
        count--;
    } else {
        count = 1; // If count is 1 or less, set it to 1
    }
    document.getElementById('quantity-display').textContent = count;
    document.getElementById('quantity').value = count;
    updateTotal();
}

// Initial call to update total
updateTotal();


$(document).ready(function() {
    // Initialize fancybox
    $("[data-fancybox]").fancybox({
        autoFocus: false
    });

    //  Handle form submission
    $('#orderForm').submit(function(event) {
        event.preventDefault();

        // Submit the form
        var form = $(this);
        $.ajax({
            url: form.attr('action'),
            type: form.attr('method'),
            data: form.serialize(),
            success: function(response) {
                // Show a success message (if applicable)
                // Optionally, you can also redirect the user to a success page
                console.log("Order placed successfully");

                // Delay the closing of FancyBox
                setTimeout(function() {
                    $.fancybox.close();
                }, 3000); // 3000 milliseconds = 3 seconds
            },
            error: function(xhr, status, error) {
                // Show an error message (if applicable)
                console.error("Failed to place order");
            }
        });
    });
});


</script>
<script>
    $(document).ready(function() {
    $('#confirmOrderButton').click(function() {
        // Show the fancy-box popup
        $('#orderSuccessPopup').fadeIn();

        // Hide the popup after 3 seconds (3000 milliseconds)
        setTimeout(function() {
            $('#orderSuccessPopup').fadeOut();
        }, 5000);
    });
});

</script>

</body>
</html>