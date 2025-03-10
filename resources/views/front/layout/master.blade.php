<!DOCTYPE html>
<html lang="en">

<head>
    <base href="{{asset('/')}}">
    <meta charset="UTF-8">
    <meta name="description" content="codelean Template">
    <meta name="keywords" content="codelean, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | Balo</title>


    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="front/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="front/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="front/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/style.css" type="text/css">
</head>

<body>
    <!-- Start coding here -->
    <div class="preloder">
        <div class="loader">
        </div>
    </div>
    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="header-top">
            <div class="container">
                <div class="ht-left">
                    <div class="mail-service">
                        <i class="fa fa-envelope"></i>
                        pqhuy2508@gmail.com
                    </div>
                    <div class="phone-service">
                        <i class="fa fa-phone">
                            + 0352640446
                        </i>
                    </div>
                </div>
                <div class="ht-right">

                    @if(Auth::check() )
                    <a href="./account/logout" class="login-panel">
                        <i class="fa fa-user"></i>
                        {{Auth::user()->name }} - Đăng Xuất
                    </a>
                    @else
                    <a href="./account/login" class="login-panel"> <i class="fa fa-user"></i>
                        Đăng Nhập
                    </a>
                    @endif
                    <!-- <div class="lan-selector">
                        <select class="language_drop" name="countries" id="countries" style="width:380px">
                            <a href="/language/vn">
                                <option class="d-flex" value="yu" data-image="/front/img/united-kingdom.png" data-imagecss="flag yu" data-title="Vietnam">
                                    Vietnam
                            </a>
                            </option>
                            <a href="/language/en">
                                <option class="d-flex" value="yt" data-image="/front/img/united-kingdom.png" data-imagecss="flag yt" data-title="English">
                                    English
                            </a>
                            </option>

                        </select>
                    </div> -->
                    <div class="flex mt-3">
                        <a class="mx-1" href="/language/vn"> <img style="width: 30px;" class="" src="/front/img/vietnam.png" alt=""></a>
                        <a class="mx-1" href="/language/en"> <img style="width: 30px;" class="" src="/front/img/united-kingdom.png" alt=""></a>
                    </div>
                </div>
                <div class="top-social">
                    <a href="#"><i class="ti ti-facebook"></i></a>
                    <a href="#"><i class="ti ti-twitter-alt"></i></a>
                    <a href="#"><i class="ti ti-linkedin"></i></a>
                    <a href="#"><i class="ti ti-pinterest"></i></a>
                </div>
            </div>
        </div>
        </div>
        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="index.html">
                                <!-- <img src="/front/img/japan_shogun.png" height="25" alt=""> -->
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">

                        <form action="shop">
                            <div class="advanced-search">
                                <button type="button" class="category-btn">Sản Phẩm</button>
                                <div class="input-group">
                                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Gõ từ khóa">
                                    <button type="button"><i class="icon_search"></i></button>
                                </div>
                            </div>
                        </form>

                    </div>
                    <div class="col-lg-3 col-md-3 text-right">
                        <ul class="nav-right">
                            <li class="heart-icon">
                                <a href="#">
                                    <i class="icon_heart_alt"></i>
                                    <span>1</span>
                                </a>
                            </li>
                            <li class="cart-icon">
                                <a href="./cart">
                                    <i class="icon_bag_alt"> </i>
                                    <span class="cart-count">{{ Cart::count() }}</span>
                                </a>
                                <div class="cart-hover">
                                    <div class="select-items">
                                        <table>
                                            <tbody>

                                                @foreach(Cart::content() as $cart)
                                                <tr data-rowId="{{ $cart->rowId }}">
                                                    <td class="si-pic"><img style="height:70px;" src="front/img/products/{{ $cart->options->images[0]->path}}" alt=""></td>
                                                    <td class="si-text">
                                                        <div class="product-selected">
                                                            <p>{{ $cart->price }} x {{ $cart->qty }}đ</p>
                                                            <h6>{{ $cart->name }}</h6>
                                                        </div>
                                                    </td>
                                                    <td class="si-close">
                                                        <i onclick="removeCart('{{ $cart->rowId }}')" class="icon_close"></i>
                                                    </td>
                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="select-total">
                                        <span>Tổng:</span>
                                        <h5>{{ Cart::total()}}đ</h5>
                                    </div>
                                    <div class="select-button">
                                        <a href="./cart" class="primary-btn view-card">Giỏ Hàng</a>
                                        <a href="./checkout" class="primary-btn checkout-btn">Check Đơn</a>
                                    </div>
                                </div>
                            </li>
                            <li class="cart-price ">{{ Cart::total()}}đ</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-item">
            <div class="container">
                <div class="nav-depart">
                    <div class="depart-btn">
                        <i class="ti-menu"></i>
                        @if($lang == 'vn')
                        <span>Dành Cho</span>
                        <ul class="depart-hover">
                            <li class="active"><a href="#"> Phụ Nữ </a></li>
                            <li><a href="#"> Con Trai </a></li>

                            <li><a href="#">Trẻ Em</a></li>
                            <li><a href="#"> Thương Hiệu Khác</a></li>
                            <li><a href="#"> Phụ Kiện </a></li>
                        </ul>
                        @else
                        <span>For</span>
                        <ul class="depart-hover">
                            <li class="active"><a href="#"> Woman </a></li>
                            <li><a href="#"> Boy </a></li>

                            <li><a href="#">Kid</a></li>
                            <li><a href="#"> Other Brand</a></li>
                            <li><a href="#"> Accsessories </a></li>
                        </ul>
                        @endif
                    </div>
                </div>
                <nav class="nav-menu mobile-menu">
                    @if($lang == 'en')
                    <ul>
                        <li class="{{ (request()->segment(1) == '') ? 'active' : '' }}"><a href="./">Home</a></li>
                        <li class="{{ (request()->segment(1) == '/shop') ? 'active' : '' }}"><a href="./shop">Shop</a>
                        </li>
                        <!-- <li><a href="">Dành Cho :</a>
                                <ul class="dropdown">
                                    <li><a href="#">Con Gái</a></li>
                                    <li><a href="#">Con Trai</a></li>
                                    <li><a href="#">Trẻ Em</a></li>
                                </ul>
                        </li> -->
                        <li><a href="./contact.html">Contact</a></li>
                        <li><a href="/blog">Blog</a></li>
                        <li><a href="">Link</a>
                            <ul class="dropdown">
                                <li><a href="./account/my-order/">Orders </a></li>
                                <li><a href="./cart">Cart</a></li>
                                <li><a href="./checkout">Check Out</a></li>
                                <!-- <li><a href="./faq">FAQ</a></li> -->
                                <li><a href="./account/register">Registration</a></li>
                                <li><a href="./account/login">Login</a></li>
                            </ul>
                        </li>
                    </ul>

                    @else
                    <ul>
                        <li class="{{ (request()->segment(1) == '') ? 'active' : '' }}"><a href="./">Trang Chủ</a></li>
                        <li class="{{ (request()->segment(1) == '/shop') ? 'active' : '' }}"><a href="./shop">Cửa
                                Hàng</a></li>
                        <!-- <li><a href="">Dành Cho :</a>
                                <ul class="dropdown">
                                    <li><a href="#">Con Gái</a></li>
                                    <li><a href="#">Con Trai</a></li>
                                    <li><a href="#">Trẻ Em</a></li>
                                </ul>
                        </li> -->
                        <li><a href="#">Liên Hệ</a></li>
                        <li><a href="/blog">Blog</a></li>
                        <li><a href="">Liên Kết</a>
                            <ul class="dropdown">
                                <li><a href="./account/my-order/">Đơn Hàng </a></li>
                                <li><a href="./cart">Giỏ Hàng</a></li>
                                <li><a href="./checkout">Check Đơn</a></li>
                                <!-- <li><a href="./faq">FAQ</a></li> -->
                                <li><a href="./account/register">Đăng Ký</a></li>
                                <li><a href="./account/login">Đăng Nhập</a></li>
                            </ul>
                        </li>
                    </ul>
                    @endif
                </nav>
                <div class="" id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Phần thân ở đây nè  -->
    @yield('body')
    <!-- Partner Logo Section Begin -->
    <div class="partner-logo">
        <div class="container">
            <div class="logo-carousel owl-carousel">
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="/front/img/logo-carousel/japan_shogun.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="/front/img/logo-carousel/logo-2.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="front/img/logo-carousel/logo-3.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="/front/img/logo-carousel/logo-4.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="/front/img/logo-carousel/logo-5.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="_zalo" style="position: FIXED; Z-INDEX: 99999; BOTTOM: 88px; right: 17px;">
        <a href="https://zalo.me/0928860668" target="_blank" alt="chat zalo">
            <img style="border:0;" src="/front/img/stick_zalo.png" alt="zalo" title="zalo" style="width: 75px;">
        </a>
    </div>
    <!-- Partner Logo Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-left">
                        <div class="footer-logo">
                            <a href="index.html">
                                <img src="front/img/footer-logo.png" height="25" alt="">
                            </a>
                        </div>

                        <ul>
                            <li>Thành phố Hà Nội</li>
                            <li>Phone: 0352 640 446</li>
                            <li> Email: pqhuy2508@gmail.com</li>
                        </ul>
                        <div class="footer-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1">
                    <div class="footer-widget">
                        <h5>Thông Tin</h5>
                        <ul>
                            <li><a href="">Về chúng tôi</a></li>
                            <li><a href="">Kiểm Tra</a></li>
                            <li><a href="">Liên Hệ</a></li>
                            <li><a href="">Dịch Vụ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-widget">
                        <h5>Tài khoản của tôi</h5>
                        <ul>
                            <li><a href="">My Account</a></li>
                            <li><a href="">Liên Hệ</a></li>
                            <li><a href="">Giỏ Hàng</a></li>
                            <li><a href="">Sản Phẩm</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <h5>Tham gia mua sắm bây giờ..</h5>
                    <p>Cập nhật Email để nhận những khuyến mãi đặc biệt từ cửa hàng </p>
                    <form action="#" class="subscribe-form">
                        <input type="text" placeholder="Enter Your Email">
                        <button type="button">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="copyright-reserved">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-text">
                            Copyright@ <script>
                                document.write(new Date().getFullYear());
                            </script>View này code bởi ... <i class="fa fa-heart-o"></i>
                        </div>
                        <div class="payment-pic">
                            <img src="/front/img/payment-method.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Js Plugins -->
    <script src="front/js/jquery-3.3.1.min.js"></script>
    <script src="front/js/bootstrap.min.js"></script>
    <script src="front/js/jquery-ui.min.js"></script>
    <script src="front/js/jquery.countdown.min.js"></script>
    <script src="front/js/jquery.nice-select.min.js"></script>
    <script src="front/js/jquery.zoom.min.js"></script>
    <script src="front/js/jquery.dd.min.js"></script>
    <script src="front/js/jquery.slicknav.js"></script>
    <script src="front/js/owl.carousel.min.js"></script>
    <script src="front/js/owlcarousel2-filter.min.js"></script>
    <script src="front/js/main.js"></script>
</body>

</html>