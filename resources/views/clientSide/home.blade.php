



@extends('clientSide.layout.layout')
@section('title', 'Home')
@section('head')
    @vite(['resources/js/ClientSide/home/main.js','resources/js/ClientSide/header.js'])
@endsection
@section('content')

    <section id="cover-section" class="position-relative section">



        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner" id="coverImagesContainer">
            </div>
        </div>
        {{--    <div class="overlay">--}}
        {{--    </div>--}}


        <div class="contact-container" id="contact-form-container">
            <h1 class="contact-form-title-black">Find Your</h1>
            <h1 class="contact-form-title-yellow">Dream Home</h1>
            <form action="" id="contactForm">
                <input type="text" name="name" class="contact-input" placeholder="Enter Your Name">
                <input type="email" name="email" class="contact-input" placeholder="Enter Your Email">
                <input type="text" name="phone" class="contact-input" placeholder="Enter Your Phone">
                <div class=" d-flex justify-content-center">
                    <button class=" contact-btn">Register Now</button>
                </div>
            </form>
        </div>
    </section>

    <div class=" main-content">

        <div id="services-section" class="my-3 d-flex flex-wrap flex-column container justify-content-center section">
            <div class="section-typo-container">
                <h3 class="section-title">
                    Services
                </h3>

            </div>

            <div class="row justify-content-center" id="services-container">

            </div>
        </div>

        <div id="project-section" class="my-3 d-flex flex-wrap flex-column container justify-content-center section">
            <div class="section-typo-container">
                <h3 class="section-title">
                    OFF Plan Projects
                </h3>
                <p class="section-description">Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere
                    cubilia curae; Proin sodales ultrices nulla blandit volutpat.</p>
            </div>

            <div class="row justify-content-center" id="project-container">
            </div>
            <div class="d-flex justify-content-center align-items-center mt-4">

                <button class="btn rounded-0 shadow-sm p-1 p-lg-2 bg-light mx-2 link" style="cursor: pointer"
                        id="project-arrow-left">
                    <i class="fas fa-arrow-left link" id="project-left-arrow"></i>
                </button>
                <button class="btn rounded-0 shadow-sm p-1 p-lg-2 bg-light mx-2 link" style="cursor: pointer"
                        id="project-arrow-right">
                    <i class="fas fa-arrow-right link" id="project-right-arrow"></i>
                </button>

            </div>
        </div>

        <div id="exclusiveProperties-section" class="my-3 d-flex flex-wrap flex-column container justify-content-center section">
            <div class="section-typo-container">
                <h3 class="section-title">
                    Exclusive properties
                </h3>
                <p class="section-description">Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere
                    cubilia curae; Proin sodales ultrices nulla blandit volutpat.</p>
            </div>

            <div class="row justify-content-center align-items-center overflow-hidden" id="exclusiveProperties-container">

            </div>
            <div class="row d-flex justify-content-center align-items-center">

                <a class="see-all-btn w-auto text-decoration-none" style="cursor: pointer" id="project-arrow-left" href="{{route('clientSide.exclusiveProperties.index')}}">
                    See all properties
                </a>
            </div>
        </div>

        <div id="dubai-section" class="my-3 d-flex flex-wrap flex-column container justify-content-center  section">
            <div class="section-typo-container">
                <h3 class="section-title">
                    Why we invest in Dubai ?
                </h3>
            </div>

            <div class="">
                <div class="dubai-container">
                    <img class="w-100" src="{{asset('assets/dubai.png')}}" alt="">
                </div>

                <div class="d-flex flex-wrap justify-content-center flex-row my-5 px-5">
                    <div class="col-4 p-lg-4 my-2 px-2">
                        <div class=" d-flex flex-column justify-content-center align-items-center">

                            <img class="mw-100 dubai-service-image" src="{{asset('assets/32.png')}}" alt="">

                            <h5 class="dubai-service-title">
                                Thriving Economy
                            </h5>
                        </div>
                    </div>
                    <div class="col-4 p-lg-4 my-2 px-2">
                        <div class=" d-flex flex-column justify-content-center align-items-center">

                            <img class="mw-100 dubai-service-image" src="{{asset('assets/33.png')}}" alt="">

                            <h5 class="dubai-service-title">
                                 High ROI
                            </h5>
                        </div>
                    </div>
                    <div class="col-4 p-lg-4 my-2 px-2">
                        <div class=" d-flex flex-column justify-content-center align-items-center">

                            <img class="mw-100 dubai-service-image" src="{{asset('assets/34.png')}}" alt="">

                            <h5 class="dubai-service-title">
                                Tax free income
                            </h5>
                        </div>
                    </div>
                    <div class="col-4 p-lg-4 my-2 px-2">
                        <div class=" d-flex flex-column justify-content-center align-items-center">

                            <img class="mw-100 dubai-service-image" src="{{asset('assets/35.png')}}" alt="">

                            <h5 class="dubai-service-title">
                                 Golden Visa
                            </h5>
                        </div>
                    </div>
                    <div class="col-4 p-lg-4 my-2 px-2">
                        <div class=" d-flex flex-column justify-content-center align-items-center">

                            <img class="mw-100 dubai-service-image" src="{{asset('assets/36.png')}}" alt="">

                            <h5 class="dubai-service-title">
                                 World-wide connectivity
                            </h5>
                        </div>
                    </div>
                    <div class="col-4 p-lg-4 my-2 px-2">
                        <div class=" d-flex flex-column justify-content-center align-items-center">

                            <img class="mw-100 dubai-service-image" src="{{asset('assets/37.png')}}" alt="">

                            <h5 class="dubai-service-title">
                                Quality of Life
                            </h5>
                        </div>
                    </div>
                    <div class="col-4 p-lg-4 my-2 px-2">
                        <div class=" d-flex flex-column justify-content-center align-items-center">

                            <img class="mw-100 dubai-service-image" src="{{asset('assets/37.png')}}" alt="">

                            <h5 class="dubai-service-title">
                                Stability
                            </h5>
                        </div>
                    </div>


                </div>
            </div>

        </div>

        <div id="feedbacks-section" class="my-3 d-flex flex-wrap flex-column container justify-content-center section">
            <div class="section-typo-container">
                <h3 class="section-title">
                    Feedbacks About Our Company
                </h3>
                <p class="section-description">Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere
                    cubilia curae; Proin sodales ultrices nulla blandit volutpat.</p>
            </div>

            <div class="row justify-content-center" id="feedbacks-container">
            </div>
            <div class="d-flex justify-content-center align-items-center mt-4">

                <button class="btn rounded-0 shadow-sm p-1 p-lg-2 bg-light mx-2 link" style="cursor: pointer"
                        id="feedback-arrow-left">
                    <i class="fas fa-arrow-left link" id="feedback-left-arrow"></i>
                </button>
                <button class="btn rounded-0 shadow-sm p-1 p-lg-2 bg-light mx-2 link" style="cursor: pointer"
                        id="feedback-arrow-right">
                    <i class="fas fa-arrow-right link" id="feedback-right-arrow"></i>
                </button>

            </div>
        </div>

        <div id="about-section" class="my-5 d-flex flex-wrap flex-column container justify-content-center section">
            <div class="row justify-content-center align-items-center" id="about-container">
                <div class="col-lg-4 about-col ">

                    <div class="card about-img-card-body">
                        <div class="card-body about-img-card-body">
                            <img class="about-image " src="{{asset('assets/31.png')}}"
                                 alt="">
                        </div>
                    </div>

                </div>
                <div class="col-lg-8 col-12 about-col ">
                    <div class="card about-card">
                        <div class="card-body about-card-body">
                            <div class="about-title">
                                Who we are ?
                            </div>
                            <div class="about-description">
                                Welcome to HML Homes, your trusted real estate brokerage firm in the heart of Dubai, UAE. At HML Homes, we pride ourselves on being more than just brokers; we're your partners in finding the perfect property solution tailored to your needs. Whether you're searching for off-plan projects with the best rates and payment plans or seeking exclusive ready-to-move-in properties, we've got you covered.

                                <br>
                                <br>
                               HML Homes Real Estate Brokers was founded with a core mission: to deliver all-encompassing real estate solutions within the dynamic and continually flourishing real estate sector of the UAE. Our aim is to offer fully integrated services in a rapidly expanding market.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="partners-section" class="my-3 d-flex flex-wrap flex-column justify-content-center section ">
            <div class="section-typo-container">
                <h3 class="section-title">
                    Our Partners
                </h3>
                <p class="section-description">Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere
                    cubilia curae; Proin sodales ultrices nulla blandit volutpat.</p>
            </div>

            <div class="row d-flex justify-content-center align-items-center flex-wrap" id="partners-container">
            </div>
            <div class="d-flex justify-content-center align-items-center mt-4">

                <button class="btn rounded-0 shadow-sm p-1 p-lg-2 bg-light mx-2 link" style="cursor: pointer"
                        id="partner-arrow-left">
                    <i class="fas fa-arrow-left link" id="partner-left-arrow"></i>
                </button>
                <button class="btn rounded-0 shadow-sm p-1 p-lg-2 bg-light mx-2 link" style="cursor: pointer"
                        id="partner-arrow-right">
                    <i class="fas fa-arrow-right link" id="partner-right-arrow"></i>
                </button>

            </div>
        </div>

    </div>
    <div id="contact-section" class="section">

        <div class="contact-typo-container">
            <div class="contact-section-title">
                Find Best Place For Living
            </div>
            <div class="contact-section-description">
                Spend vacations in best hotels and resorts find the great place of your
                choice using different searching options.
            </div>
            <a href="#cover-section" class="contact-section-btn">
                Contact Us
            </a>
        </div>
        <div class="contact-image-container h-100 w-100">
            <img class="w-100 h-100" style="object-fit: cover" src="{{asset('assets/28.png')}}" alt="">
        </div>
        <div class="overlay"></div>

    </div>

@endsection
