<!DOCTYPE html>
<html lang="en">
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

    <div class="our-services section">
        <div class="body-cover  disp-flex-col">
        <p class="title">
            Contact Us
        </p>
        <br>
        <p class="desc ">
        Have a question or need assistance? Contact our dedicated customer support 
        team at [Contact Email/Phone Number]. We're here to help you with any inquiries or 
        concerns you may have as you enjoy shopping with us at our e-store.
        </p>
        </div>
    </div>
    <div class="contact-section">
        <div class="body-cover disp-flex-row">
          
            <div class="container disp-flex-col">
            <form class="contact-form" action="new_queries" method="post">
            @csrf <!-- CSRF protection -->
                <label for="fname" class="desc">First Name</label>
                <input class="input-field" type="text" id="fname" name="fname" placeholder="Your name..">

                <label for="lname"  class="desc">Last Name</label>
                <input class="input-field desc" type="text" id="lname" name="lname" placeholder="Your last name..">

                <label for="address" class="desc">Address</label>
                <input class="input-field desc" type="text" id="address" name="address" placeholder="Address">

                <label for="subject" class="desc">Subject</label>
                <textarea class="input-field desc" id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>

                <input class="submit-btn desc" type="submit" value="Submit">
            </form>
            </div>
            <div class="vector-side">
                <img src="{{asset('assets/images/contact-us.jpg')}}" alt="contact-us">
            </div>
        </div>
    </div>
@include('components.footer')
</body>
</html>