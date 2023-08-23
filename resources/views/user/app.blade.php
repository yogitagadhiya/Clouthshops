<!DOCTYPE html>
<html lang="en">

  <head>

    <title>{{$meta_title ?? ''}}</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{$meta_description ?? ''}}">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">




    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{asset('theme/user/css/bootstrap.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('theme/user/css/font-awesome.css')}}">

    <link rel="stylesheet" href="{{asset('theme/user/css/templatemo-hexashop.css')}}">

    <link rel="stylesheet" href="{{asset('theme/user/css/owl-carousel.css')}}">

    <link rel="stylesheet" href="{{asset('theme/user/css/lightbox.css')}}">
 

    <script src="{{asset('theme/user/js/jquery-2.1.0.min.js')}}"></script>
    

    </head>
    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="/">Home</a></li>
                            <li class="submenu">
                                <a href="javascript:;">categories</a>
                                <ul>
                                  @foreach($categories as $c)
                                    <li>
                                        <a href="{{url('category/'.$c->categories_slug)}}">{{$c->categories_name}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>      
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

@yield('content')


<!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="first-item">
                        <div class="logo">
                            <img src="{{asset('theme/user/images/white-logo.png')}}" alt="hexashop ecommerce templatemo">
                        </div>
                        <ul>
                            <li><a href="#">16501 Collins Ave, Sunny Isles Beach, FL 33160, United States</a></li>
                            <li><a href="#">hexashop@company.com</a></li>
                            <li><a href="#">010-020-0340</a></li>
                        </ul>
                    <div class="footerSocialMedia" style="display: flex;align-items: center;">
                 
                  </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <h4>Shopping &amp; Categories</h4>
                    <ul>
                        <li><a href="#">Men’s Shopping</a></li>
                        <li><a href="#">Women’s Shopping</a></li>
                        <li><a href="#">Kid's Shopping</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><a href="/">Homepage</a></li>
                        <li><a href="about-us">About Us</a></li>
                        <li><a href="services">services</a></li>
                        <li><a href="contact">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h4>Help &amp; Information</h4>
                    <ul>
                        <li><a href="#">Help</a></li>
                        <li><a href="#">FAQ's</a></li>
                        <li><a href="#">Shipping</a></li>
                        <li><a href="#">Tracking ID</a></li>
                    </ul>
                </div>
                <div class="col-lg-12">
                    <div class="under-footer">
                        <p>Copyright © 2022 HexaShop Co., Ltd. All Rights Reserved. 
                        
                        <br>Design: <a href="https://templatemo.com" target="_parent" title="free css templates">TemplateMo</a></p>
                        <!-- <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-behance"></i></a></li>
                        </ul> -->
                    </div>
                </div>
            </div>
        </div>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 

    <!-- Bootstrap -->
    <script src="{{asset('theme/user/js/popper.js')}}"></script>
    <script src="{{asset('theme/user/js/bootstrap.min.js')}}"></script>

    <!-- Plugins -->
    <script src="{{asset('theme/user/js/owl-carousel.js')}}"></script>
    <script src="{{asset('theme/user/js/accordions.js')}}"></script>
    <script src="{{asset('theme/user/js/datepicker.js')}}"></script>
    <script src="{{asset('theme/user/js/scrollreveal.min.js')}}"></script>
    <script src="{{asset('theme/user/js/waypoints.min.js')}}"></script>
    <script src="{{asset('theme/user/js/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('theme/user/js/imgfix.min.js')}}"></script> 
    <script src="{{asset('theme/user/js/slick.js')}}"></script> 
    <script src="{{asset('theme/user/js/lightbox.js')}}"></script> 
    <script src="{{asset('theme/user/js/isotope.js')}}"></script> 
    
    <!-- Global Init -->
    <script src="{{asset('theme/user/js/custom.js')}}"></script>
    <script src="{{asset('theme/printThis.js')}}"></script>

    <script>

        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
              $("."+selectedClass).fadeIn();
              $("#portfolio").fadeTo(50, 1);
            }, 500);
                
            });
        });

    </script>

  </body>
</html>