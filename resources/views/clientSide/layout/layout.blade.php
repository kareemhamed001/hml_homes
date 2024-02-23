<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">

    <link rel="stylesheet" href="{{asset('assets/css/fontawesome/all.min.css')}}">
    @vite(['resources/js/ClientSide/main.js','resources/SCSS/custom/ClientSide/styles.scss'])
    @yield('head')
</head>
<body>

<div class="" id="loader" style="display: flex;justify-content: center;align-items: center;position: fixed;top: 0;left: 0;width: 100%;height: 100%;z-index: 10000;background-color: rgba(0,0,0,0.95)">
    <span class="loader"></span>
</div>


<header id="header" class="fixed-header">


    <nav id="upper-header">

        <div class="d-large-none">
            <a href="" class="link d-flex align-items-center logo-container " id="logo">

                <img src="" class="logo dark-logo"  alt="">
                <div class="d-flex flex-column justify-content-start align-items-start d-none">
                    <div class="logo-title">HML Home</div>
                    <div class="logo-description">Real State Broker L.L.C</div>
                </div>
            </a>
        </div>
        <a class=" align-items-center link d-large" href="javascript:void(0)" id="email-container">
            <i class="fa fa-envelope header-icon"></i>
            <span class="mx-2">
                Email us at:
            </span>
            <span id="email-span" class="email"></span>
        </a>

        <div id="upper-header-icons">

            <a class=" align-items-center link d-phone" href="javascript:void(0)" id="email-container">
                <i class="fa fa-envelope header-icon"></i>

                <span id="email-span" class="email">khidmt55@gmail.com</span>
            </a>

            <a href="" class="facebook">

                <i class="header-icon d-phone-none  fa-brands fa-facebook-f"></i>
            </a>
            <a href="" class="instagram">

                <i class="header-icon d-phone-none  fa-brands fa-instagram"></i>
            </a>
            <div class="vl header-icon">
            </div>

            <i class="header-icon  fa fa-phone"></i>
            <a class="link phone-number">+201021638451</a>


        </div>

    </nav>
    <div class="hl"></div>
    <nav class=" d-flex" id="lower-header">

        <div class="d-phone-none">
            <a href="{{route('home')}}" class="link d-flex align-items-center logo-container " id="logo">
                <img src="" class="logo"  alt="">

                <div class="d-flex flex-column justify-content-start align-items-start">
                    <div class=" logo-title">HML Home</div>
                    <div class=" logo-description">Real State Broker L.L.C</div>
                </div>
            </a>
        </div>


        <div class="d-flex align-items-center justify-content-center col ">


            <a id="cover-section-link" class=" header-link active"
               href="@if(request()->route()->getName()=='home')#cover-section @else {{route('home')}}#cover-section @endif">Home</a>
            <a id="services-section-link" class="header-link"
               href="@if(request()->route()->getName()=='home')#services-section @else {{route('home')}}#services-section @endif">Services</a>
            <a id="gallery-section-link" class="header-link"
               href="@if(request()->route()->getName()=='home')#project-section @else {{route('home')}}#project-section @endif">Projects</a>
            <a id="packages-section-link" class="header-link"
               href="@if(request()->route()->getName()=='home')#exclusiveProperties-section @else {{route('home')}}#exclusiveProperties-section @endif">Exclusive
                properties</a>
            <a id="feedbacks-section-link" class="header-link"
               href="@if(request()->route()->getName()=='home')#feedbacks-section @else {{route('home')}}#feedbacks-section @endif">Feedback</a>
            <a id="about-section-link" class="header-link"
               href="@if(request()->route()->getName()=='home')#about-section @else {{route('home')}}#about-section @endif">About
                Us</a>
            <a id="partners-section-link" class="header-link"
               href="@if(request()->route()->getName()=='home')#partners-section @else {{route('home')}}#partners-section @endif">Partners</a>
            <a id="contact-section-link" class="header-link"
               href="@if(request()->route()->getName()=='home')#contact-section @else {{route('home')}}#contact-section @endif">Contact</a>


        </div>

    </nav>
</header>
<div class="" style="min-height: 100vh;max-width: 100vw;overflow: hidden">
    @yield('content')

</div>
<div class="footer container">
    <div class="col-3 footer-col">
        <a href="" class="link d-flex align-items-center logo-container">
            <img src="" class="logo" alt="">
            <div class="d-flex flex-column justify-content-start align-items-start">
                <div class="logo-title">HML Home</div>
                <div class="logo-description">Real State Broker L.L.C</div>
            </div>
        </a>
    </div>
    <div class="col footer-col">
        <div class="footer-col-title">
            Contact Us
        </div>

        <div class="footer-col-list">
            <div class="footer-col-list-item phone-number">
                Call : +123 400 123
            </div>
            <div class="footer-col-list-item address">
                Praesent nulla massa, hendrerit vestibulum gravida in, feugiat auctor felis.
            </div>
            <div class="footer-col-list-item email">
                Email: example@mail.com
            </div>

            <div class="d-flex flex-wrap justify-content-between ">
                <div class="col-6 col-md-4 footer-icon-container">
                    <a href="" class="facebook footer-icon">
                        <i class=" fa-brands fa-facebook-f"></i>
                    </a>
                </div>
                <div class="col-6 col-md-4 footer-icon-container">
                    <a href="" class="instagram footer-icon">

                        <i class=" fa-brands fa-instagram"></i>
                    </a>
                </div>
                <div class="col-6 col-md-4 footer-icon-container">
                    <a href="" class="twitter footer-icon">
                        <i class=" fa-brands fa-twitter"></i>
                    </a>
                </div>
                <div class="col-6 col-md-4 footer-icon-container">
                    <a href="" class="tiktok footer-icon">
                        <i class=" fa-brands fa-tiktok"></i>
                    </a>
                </div>
                <div class="col-6 col-md-4 footer-icon-container">
                    <a href="" class="youtube footer-icon">
                        <i class=" fa-brands fa-youtube"></i>
                    </a>
                </div>
                <div class="col-6 col-md-4 footer-icon-container">
                    <a href="" class="threads footer-icon">
                        <i class="fa-regular fa-at"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="col footer-col">
        <div class="footer-col-title">
            Features
        </div>

        <div class="footer-col-list">
            <div class="footer-col-list-item">
                Home
            </div>
            <div class="footer-col-list-item">
                Become a Host
            </div>
            <div class="footer-col-list-item">
                Pricing
            </div>
            <div class="footer-col-list-item">
                Blog
            </div>

            <div class="footer-col-list-item">
                Contact
            </div>
        </div>
    </div>

    <div class="col footer-col">
        <div class="footer-col-title">
            Company
        </div>

        <div class="footer-col-list">
            <div class="footer-col-list-item">
                About Us
            </div>
            <div class="footer-col-list-item">
                Press
            </div>
            <div class="footer-col-list-item">
                Contact
            </div>
            <div class="footer-col-list-item">
                Careers
            </div>
            <div class="footer-col-list-item">
                Blog
            </div>
        </div>
    </div>
    <div class="col footer-col">
        <div class="footer-col-title">
            Team and policies
        </div>

        <div class="footer-col-list">
            <div class="footer-col-list-item">
                Terms of servies
            </div>
            <div class="footer-col-list-item">
                Privacy Policy
            </div>
            <div class="footer-col-list-item">
                Security
            </div>
        </div>
    </div>

</div>
<div class="scroll-up-btn" id="scroll-up-btn">
    <i class="fa fa-arrow-up"></i>
</div>
<script src="{{asset('assets/js/fontawesome/all.min.js')}}"></script>
</body>
</html>
