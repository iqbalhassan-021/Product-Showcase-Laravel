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
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">

    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title> {{ $store->last()->storeName}}</title>
</head>

<body>
@include('components.header')
    <div class="admin-panel disp-row " style="min-height: 50vh;">
        
        <div class="nav-panel">
            <div class="sticky">

                <button class="dash-btn" id="dash-btn" onclick="showdive('editadmin','progress')">
                    <p class="desc">
                        <i class="fa-solid fa-user"></i>
                        <span class="x-dash-btn" id="x-dash-btn">Edit Profile</span>
                    </p>
                </button>
                <button class="dash-btn" id="dash-btn" onclick="showdive('progress','editadmin')">
                    <p class="desc">
                        <i class="fa-brands fa-product-hunt"></i>
                        <span class="x-dash-btn">My Orders</span>
                    </p>
                </button>
                <a href="/">
                <button class="dash-btn" id="dash-btn">
                    <p class="desc">
                        <i class="fa-solid fa-arrow-left"></i>
                        <span class="x-dash-btn" id="x-dash-btn">Home</span>
                    </p>
                </button>
                </a>
            </div>
        </div>
        <div class="setting-panel ">
            <div class="edit-admin" id="editadmin">
                <form action="forgotPassword" method="post" class="edit-form">
                @csrf <!-- CSRF protection -->
                    <label for="username">Username:</label><br>
                    <input type="text" id="username" name="username" class="input-field" required value="{{$user_name}}" readonly><br>
                    <label for="securityquestion">Your last pet was a?</label><br>
                    <input type="text" id="securityquestion" name="securityquestion" class="input-field" required><br>
                    <label for="password">New Password:</label><br>
                    <input type="password" id="password" name="password" class="input-field" required><br>

                    
                    <label for="showpass" class="left desc">
                                <input type="checkbox" name="showpass" id="showpass" class="desc" onclick="showpasswd()">
                                Show password
                            </label>

                    <input type="submit" value="Update Password" class="submit-btn">
                </form>

            </div>
            <div class="progress" id="progress">
                
                <table class="all-user">
                    <thead>
                        <tr>
                        <th>Product Name</th>
                        <th>Product Code</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                           <td>{{$order->productName}}</td>
                           <td>{{$order->productId}}</td>
                           <td>{{$order->quantity}}</td>
                           <td>{{$order->totalPrice}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('components.footer')
<script>
    function showpasswd() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
    function showdive(div1,div2){
        //The div to be displayed
        document.getElementById(div1).style.display = "flex";
        //The div to be hidden
        document.getElementById(div2).style.display = "none";
    }
</script>
</body>

</html>