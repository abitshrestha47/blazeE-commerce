<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Admin Dashboard | By Code Info</title>
    <link rel="stylesheet" href="admin/css/dashboard.css" />
    <!-- Font Awesome Cdn Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    @vite(['resources/js/app.js'])
</head>
<body>
    <header class="header">
        <div class="logo">
            <a href="#">EasyPay</a>
            <div class="search_box">
                <input type="text" placeholder="Search EasyPay">
                <i class="fa-sharp fa-solid fa-magnifying-glass"></i>
            </div>
            <form action="{{route('logout')}}" method='get'>
                <button type="submit">Logout</button>
            </form>
        </div>

        <div class="header-icons">
            <i class="fas fa-bell"></i>
            <div class="account">
                <img src="./pic/img.jpg" alt="">
                <h4>Jhon Viek</h4>
            </div>
        </div>
    </header>
    <div class="container">
        <nav>
            <div class="side_navbar">
                <!-- <span>Main Menu</span> -->
                <a href="#" class="active">Dashboard</a>
                <a href="{{route('category')}}">Categories</a>
                <a href="{{route('brander')}}">Brand</a>
                <a href="{{route('products')}}">Add Products</a>

                <div class="links">
                    <span>Quick Link</span>
                    <a href="#">Paypal</a>
                    <a href="#">EasyPay</a>
                    <a href="#">SadaPay</a>
                </div>
            </div>
        </nav>

        <div class="main-body">
            @yield('contents')
        </div>

        <!-- <div class="sidebar">
      <h4>Account Balance</h4>
      
      <div class="balance">
        <i class="fas fa-dollar icon"></i>
        <div class="info">
          <h5>Dollar</h5>
          <span><i class="fas fa-dollar"></i>25,000.00</span>
        </div>
      </div>
      
      <div class="balance">
        <i class="fa-solid fa-rupee-sign icon"></i>
        <div class="info">
          <h5>PKR</h5>
          <span><i class="fa-solid fa-rupee-sign"></i>300,000.00</span>
        </div>
      </div>

      <div class="balance">
        <i class="fas fa-euro icon"></i>
        <div class="info">
          <h5>Euro</h5>
          <span><i class="fas fa-euro"></i>25,000.00</span>
        </div>
      </div>

      <div class="balance">
        <i class="fa-solid fa-indian-rupee-sign icon"></i>
        <div class="info">
          <h5>INR</h5>
          <span><i class="fa-solid fa-indian-rupee-sign"></i>220,000.00</span>
        </div>
      </div>

      <div class="balance">
        <i class="fa-solid fa-sterling-sign icon"></i>
        <div class="info">
          <h5>Pound</h5>
          <span><i class="fa-solid fa-sterling-sign"></i>30,000.00</span>
        </div>
      </div>

    </div> -->
    </div>
</body>
</html>