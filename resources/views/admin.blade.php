<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Page</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>
    /* Optional: Add custom styles here */
    .content {
        padding: 20px;
    }
</style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">Admin Panel</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <button class="nav-link btn btn-link" onclick="showDashboard()">Dashboard</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link btn btn-link" onclick="showEditStore()">Edit Store</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link btn btn-link" onclick="showSlider()">Slider</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link btn btn-link" onclick="showCategories()">Categories</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link btn btn-link" onclick="showProducts()">Products</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link btn btn-link" onclick="showOrders()">New Orders</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link btn btn-link" onclick="showUsers()">Users</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link btn btn-link" onclick="showSubscribers()">Subscribers</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link btn btn-link" onclick="showQueries()">Queries</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link btn btn-link" onclick="showBlogs()">Blogs</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link btn btn-link" onclick="showHome()">Home</button>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container content" id="dashboard">
<h2>Product List</h2>

    @if(count($products) > 0)
    <div class="row">
        @foreach($products as $data)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card">
                <img src="{{$data->productImage}}" class="card-img-top" alt="{{$data->productName}}">
                <div class="card-body">
                    <h5 class="card-title">{{$data->productName}}</h5>
                    <p class="card-text">Price: {{$data->productPrice}}</p>
                    <p class="card-text">ID: {{$data->id}}</p>
                    <p class="card-text">Description: {{$data->productDescription}}</p>
                    <p class="card-text">Category: {{$data->productCategory}}</p>
                    <p class="card-text">Size: {{$data->productsize}}</p>
                    <p class="card-text">Shipping Fees: {{$data->shippingfees}}</p>
                    <a href="{{url('delete/'.$data->id)}}" class="btn btn-danger">Remove</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div class="alert alert-info" role="alert">
        No products found.
    </div>
    @endif
</div>



<div class="container content" id="edit-store" style="display: none;">
    <h2>Edit Store</h2>
    <div class="container content" id="edit-store">
    <h2>Edit Store Details</h2>
    <div class="row">
        <div class="col-md-6">
            <form action="store_details" method="post" class="edit-store-form">
                @csrf <!-- CSRF protection -->
                <div class="form-group">
                    <label for="storeName">Store Name:</label>
                    <input type="text" id="storeName" name="storeName" class="form-control" required value="{{$storedetails->last()->storeName}}">
                </div>
                
                <div class="form-group">
                    <label for="facebookLink">Facebook Link:</label>
                    <input type="text" id="facebookLink" name="facebookLink" class="form-control" required value="{{$storedetails->last()->facebookLink}}">
                </div>
                
                <div class="form-group">
                    <label for="instagramLink">Instagram Link:</label>
                    <input type="text" id="instagramLink" name="instagramLink" class="form-control" required value="{{$storedetails->last()->instagramLink}}">
                </div>
                
                <div class="form-group">
                    <label for="whatsappLink">WhatsApp Link:</label>
                    <input type="text" id="whatsappLink" name="whatsappLink" class="form-control" required value="{{$storedetails->last()->whatsappLink}}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="linkedinLink">Etsy Link:</label>
                    <input type="text" id="linkedinLink" name="linkedinLink" class="form-control" required value="{{$storedetails->last()->linkedinLink}}">
                </div>
                
                <div class="form-group">
                    <label for="storeAddress">Store Address:</label>
                    <textarea id="storeAddress" name="storeAddress" class="form-control" required>{{$storedetails->last()->storeAddress}}</textarea>
                </div>
                
                <div class="form-group">
                    <label for="storePhone">Store Phone Number:</label>
                    <input type="text" id="storePhone" name="storePhone" class="form-control" required value="{{$storedetails->last()->storePhone}}">
                </div>
                
                <div class="form-group">
                    <label for="storeEmail">Store Email:</label>
                    <input type="text" id="storeEmail" name="storeEmail" class="form-control" required value="{{$storedetails->last()->storeEmail}}">
                </div>
                
                <input type="submit" value="Submit" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>

</div>

<div class="container content" id="slider" style="display: none;">
<h2>Add Product to Slider</h2>
    <div class="row">
        <div class="col-md-6">
            <form action="the_slider" method="post" enctype="multipart/form-data">
                @csrf <!-- CSRF protection -->
                <div class="form-group">
                    <label for="slideproductName">Product Name:</label>
                    <input type="text" id="slideproductName" name="slideproductName" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="id">Product Code:</label>
                    <input type="text" id="id" name="id" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label for="slideproductDesc">Product Description:</label>
                    <textarea id="slideproductDesc" name="slideproductDesc" class="form-control" required></textarea>
                </div>
                
                <div class="form-group">
                    <label for="slideproductIMG">Product Image:</label>
                    <input type="file" id="slideproductIMG" name="slideproductIMG" class="form-control-file" accept="image/*" required>
                </div>
                
                <input type="submit" value="Submit" class="btn btn-primary">
            </form>
        </div>
    </div>
    <h2>Slides</h2>

@if(count($slider) > 0)
<div class="row">
    @foreach($slider as $slides)
    <div class="col-md-6 mb-4">
        <div class="card">
            <img src="{{$slides->slideproductIMG}}" class="card-img-top" alt="{{$slides->slideproductName}}">
            <div class="card-body">
                <h5 class="card-title">{{$slides->slideproductName}}</h5>
                <p class="card-text">Product Code: {{$slides->id}}</p>
                <p class="card-text">{{$slides->slideproductDesc}}</p>
            </div>
        </div>
    </div>
    @endforeach
</div>
@else
<div class="alert alert-info" role="alert">
    No slides found.
</div>
@endif
</div>

<div class="container content" id="categories" style="display: none;">
<h2>Add Category</h2>
    <div class="row">
        <div class="col-md-6">
            <form action="the_categories" method="post" enctype="multipart/form-data">
                @csrf <!-- CSRF protection -->
                <div class="form-group">
                    <label for="categoryImage">Category Image:</label>
                    <input type="file" id="categoryImage" name="categoryImage" class="form-control-file" accept="image/png, image/jpeg, image/webp" required>
                </div>
                <div class="form-group">
                    <label for="categoryName">Category Name:</label>
                    <input type="text" id="categoryName" name="categoryName" class="form-control" required>
                </div>
                <input type="submit" value="Add Category" class="btn btn-primary">
            </form>
        </div>
    </div>    
    <h2>Category List</h2>

@if(count($categories) > 0)
<div class="row">
    @foreach($categories as $category)
    <div class="col-md-4 mb-4">
        <div class="card">
            <img src="{{$category->categoryImage}}" class="card-img-top" alt="{{$category->categoryName}}">
            <div class="card-body">
                <h5 class="card-title">{{$category->categoryName}}</h5>
            </div>
        </div>
    </div>
    @endforeach
</div>
@else
<div class="alert alert-info" role="alert">
    No categories found.
</div>
@endif
</div>

<div class="container content" id="products" style="display: none;">
<h1>Add New Product</h1>
    <div class="row">
        <div class="col-md-6">
            <form action="the_products" method="post" enctype="multipart/form-data">
                @csrf <!-- CSRF protection -->
                <div class="form-group">
                    <label for="productImage">Product Image:</label>
                    <input type="file" id="productImage" name="productImage" class="form-control-file" accept="image/png, image/jpeg, image/webp" required>
                </div>
                
                <div class="form-group">
                    <label for="productName">Product Name:</label>
                    <input type="text" id="productName" name="productName" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label for="productPrice">Product Price:</label>
                    <input type="number" id="productPrice" name="productPrice" class="form-control" min="0" required>
                </div>
                
                <div class="form-group">
                    <label for="id">Product ID:</label>
                    <input type="text" id="id" name="id" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label for="productDescription">Product Description:</label>
                    <textarea id="productDescription" name="productDescription" class="form-control" required></textarea>
                </div>
        </div>
        <div class="col-md-6">
                <div class="form-group">
                    <label for="productCategory">Category:</label>
                    <input type="text" id="productCategory" name="productCategory" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label for="productsize">Size:</label>
                    <input type="text" id="productsize" name="productsize" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="shippingfees">Shipping Fees:</label>
                    <input type="text" id="shippingfees" name="shippingfees" class="form-control" required>
                </div>
                
                <input type="submit" value="Add Product" class="btn btn-primary">
            </form>
        </div>
    </div>

    <h2>Product List</h2>

@if(count($products) > 0)
<div class="row">
    @foreach($products as $data)
    <div class="col-lg-4 col-md-6 mb-4">
        <div class="card">
            <img src="{{$data->productImage}}" class="card-img-top" alt="{{$data->productName}}">
            <div class="card-body">
                <h5 class="card-title">{{$data->productName}}</h5>
                <p class="card-text">Price: {{$data->productPrice}}</p>
                <p class="card-text">ID: {{$data->id}}</p>
                <p class="card-text">Description: {{$data->productDescription}}</p>
                <p class="card-text">Category: {{$data->productCategory}}</p>
                <p class="card-text">Size: {{$data->productsize}}</p>
                <p class="card-text">Shipping Fees: {{$data->shippingfees}}</p>
                <a href="{{url('delete/'.$data->id)}}" class="btn btn-danger">Remove</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@else
<div class="alert alert-info" role="alert">
    No products found.
</div>
@endif

</div>

<div class="container content" id="orders" style="display: none;">    <h2>Order List</h2>

@if(count($order) > 0)
<div class="row">
    @foreach ($order as $item)
    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Buyer Name: {{$item->buyername}}</h5>
                <p class="card-text">Address: {{$item->address}}</p>
                <p class="card-text">Phone Number: {{$item->phone}}</p>
                <p class="card-text">Product Name: {{$item->productName}}</p>
                <p class="card-text">Product Code: {{$item->productId}}</p>
                <p class="card-text">Quantity: {{$item->quantity}}</p>
                <p class="card-text">Price: {{$item->productPrice}}</p>

            </div>
        </div>
    </div>
    @endforeach
</div>
@else
<div class="alert alert-info" role="alert">
    No orders found.
</div>
@endif
</div>

<div class="container content" id="users" style="display: none;">  <h2>User List</h2>

@if(count($users) > 0)
<div class="row">
    @foreach ($users as $user)
    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Name: {{$user->name}}</h5>
                <p class="card-text">Username: {{$user->username}}</p>
                <p class="card-text">Phone Number or Email: {{$user->email}}</p>
                <p class="card-text">Address: {{$user->address}}</p>
            </div>
        </div>
    </div>
    @endforeach
</div>
@else
<div class="alert alert-info" role="alert">
    No users found.
</div>
@endif
</div>

<div class="container content" id="subscribers" style="display: none;">   
 <h2>Subscriber List</h2>

@if(count($subs) > 0)
<div class="row">
    @foreach ($subs as $sub)
    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Email: {{$sub->email}}</h5>
            </div>
        </div>
    </div>
    @endforeach
</div>
@else
<div class="alert alert-info" role="alert">
    No subscribers found.
</div>
@endif
</div>

<div class="container content" id="queries" style="display: none;">
<h2>Query List</h2>

@if(count($queries) > 0)
<div class="row">
    @foreach ($queries as $query)
    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Name: {{$query->fname}} {{$query->lname}}</h5>
                <p class="card-text">Address: {{$query->address}}</p>
                <p class="card-text">Query: {{$query->subject}}</p>
            </div>
        </div>
    </div>
    @endforeach
</div>
@else
<div class="alert alert-info" role="alert">
    No queries found.
</div>
@endif
</div>

<div class="container content" id="blogs" style="display: none;">
<h2>Post a Blog</h2>
    <div class="row">
        <div class="col-md-6">
            <form action="post_blog" method="post" enctype="multipart/form-data">
                @csrf <!-- CSRF protection -->
                <div class="form-group">
                    <label for="blogimg">Blog Image:</label>
                    <input type="file" id="blogimg" name="blogimg" class="form-control-file" accept="image/*" required>
                </div>
                <div class="form-group">
                    <label for="blogtitle">Blog Title:</label>
                    <input type="text" id="blogtitle" name="blogtitle" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="blogcontent">Blog Content:</label>
                    <textarea id="blogcontent" name="blogcontent" class="form-control" required></textarea>
                </div>
                <input type="submit" value="Post" class="btn btn-primary">
            </form>
        </div>
    </div>    
    <h2>Blog List</h2>

@if(count($blog) > 0)
<div class="row">
    @foreach ($blog as $blogs)
    <div class="col-md-6 mb-4">
        <div class="card">
            <img src="{{$blogs->blogimg}}" class="card-img-top" alt="{{$blogs->blogtitle}}">
            <div class="card-body">
                <h5 class="card-title">{{$blogs->blogtitle}}</h5>
                <p class="card-text">{{$blogs->blogcontent}}</p>
            </div>
        </div>
    </div>
    @endforeach
</div>
@else
<div class="alert alert-info" role="alert">
    No blogs found.
</div>
@endif
</div>

<div class="container content" id="home" style="display: none;">
    <a href="{{url('/')}}">Go back</a>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    function showDashboard() {
        hideAll();
        document.getElementById('dashboard').style.display = 'block';
    }

    function showEditStore() {
        hideAll();
        document.getElementById('edit-store').style.display = 'block';
    }

    function showSlider() {
        hideAll();
        document.getElementById('slider').style.display = 'block';
    }

    function showCategories() {
        hideAll();
        document.getElementById('categories').style.display = 'block';
    }

    function showProducts() {
        hideAll();
        document.getElementById('products').style.display = 'block';
    }

    function showOrders() {
        hideAll();
        document.getElementById('orders').style.display = 'block';
    }

    function showUsers() {
        hideAll();
        document.getElementById('users').style.display = 'block';
    }

    function showSubscribers() {
        hideAll();
        document.getElementById('subscribers').style.display = 'block';
    }

    function showQueries() {
        hideAll();
        document.getElementById('queries').style.display = 'block';
    }

    function showBlogs() {
        hideAll();
        document.getElementById('blogs').style.display = 'block';
    }

    function showHome() {
        hideAll();
        document.getElementById('home').style.display = 'block';
    }

    function hideAll() {
        document.getElementById('dashboard').style.display = 'none';
        document.getElementById('edit-store').style.display = 'none';
        document.getElementById('slider').style.display = 'none';
        document.getElementById('categories').style.display = 'none';
        document.getElementById('products').style.display = 'none';
        document.getElementById('orders').style.display = 'none';
        document.getElementById('users').style.display = 'none';
        document.getElementById('subscribers').style.display = 'none';
        document.getElementById('queries').style.display = 'none';
        document.getElementById('blogs').style.display = 'none';
        document.getElementById('home').style.display = 'none';
    }

    // Show default section
    showDashboard();
</script>

</body>
</html>
