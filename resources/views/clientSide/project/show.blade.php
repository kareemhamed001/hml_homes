@extends('clientSide.layout.layout')
@section('title', 'Project')
@section('head')
    @vite('resources/js/ClientSide/Services/Project/register.js')
@endsection
@section('content')

    <section id="cover-section" style="height: 80vh" class="overflow-hidden position-relative">


        <div class="w-100 h-100 border overflow-hidden" id="coverImagesContainer">

            <img class="w-100 h-100" style="object-fit: cover" src="{{$project->cover_image}}" alt="">
        </div>
        {{--    <div class="overlay">--}}
        {{--    </div>--}}


        <div class="contact-container" id="contact-form-container">
            <h1 style="text-align: center">
                <span class="contact-form-title-black">
                    Are you
                </span>
                <span class="contact-form-title-yellow">
                    interest
                </span>
                <span class="contact-form-title-black">
                    about that ?
                </span>

            </h1>

            <form action="" class="registration-form" data-project-id="{{$project->id}}">

                <input type="text" name="name" class="contact-input" placeholder="Enter Your Name">
                <input type="email" name="email" class="contact-input" placeholder="Enter Your Email">
                <input type="text" name="phone" class="contact-input" placeholder="Enter Your Phone">


                <div class=" d-flex justify-content-center">
                    <button class=" contact-btn">Register Now</button>
                </div>
            </form>
        </div>
    </section>

    <section class="mt-5">
        <div class="" id="">
            <ul class="nav nav-tabs d-flex justify-content-center w-100 " role="tablist">
                <div class="tab-container">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="simple-tab-0" data-bs-toggle="tab" href="#simple-tabpanel-0"
                           role="tab" aria-controls="simple-tabpanel-0" aria-selected="true">About</a>
                    </li>
                </div>
                <div class="tab-container">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="simple-tab-1" data-bs-toggle="tab" href="#simple-tabpanel-1" role="tab"
                           aria-controls="simple-tabpanel-1" aria-selected="false">Gallery</a>
                    </li>
                </div>

                <div class="tab-container">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="simple-tab-2" data-bs-toggle="tab" href="#simple-tabpanel-2" role="tab"
                           aria-controls="simple-tabpanel-2" aria-selected="false">Prices</a>
                    </li>
                </div>

                <div class="tab-container">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="simple-tab-3" data-bs-toggle="tab" href="#simple-tabpanel-3" role="tab"
                           aria-controls="simple-tabpanel-3" aria-selected="false">Photos</a>
                    </li>
                </div>

                <div class="tab-container">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="simple-tab-5" data-bs-toggle="tab" href="#simple-tabpanel-5" role="tab"
                           aria-controls="simple-tabpanel-5" aria-selected="false">Payment plans</a>
                    </li>
                </div>

                <div class="tab-container">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="simple-tab-6" data-bs-toggle="tab" href="#simple-tabpanel-6" role="tab"
                           aria-controls="simple-tabpanel-6" aria-selected="false">Location</a>
                    </li>
                </div>

                <div class="tab-container">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="simple-tab-7" data-bs-toggle="tab" href="#simple-tabpanel-7" role="tab"
                           aria-controls="simple-tabpanel-7" aria-selected="false">About Developer</a>
                    </li>
                </div>
            </ul>


            <div class="tab-content pt-5" id="tab-content">
                <div class="tab-pane  project-details-container active" id="simple-tabpanel-0" role="tabpanel"
                     aria-labelledby="simple-tab-0">

                    <div class="project-tab-header">
                        About The Project
                    </div>
                    <div class="ql-editor">
                        {!! $project->description !!}
                    </div>
                    <div class="project-tab-header">
                        AMENITIES
                    </div>
                    <div class="project-features-container">
                        @foreach($project->features as $feature)
                            <div class="col-4 service-item">
                                <div class="card h-100 mb-3 rounded-0 border-0 shadow">
                                    <div class="card-body h-100">
                                        <div class="service-image-container">
                                            <img class="service-image"
                                                 src="{{$feature->image}}"
                                                 alt="">
                                        </div>
                                        <p class=" service-title">{{$feature->name}}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>

                </div>
                <div class="tab-pane project-details-container" id="simple-tabpanel-1" role="tabpanel"
                     aria-labelledby="simple-tab-1">
                    <div class="project-tab-header">
                        Gallery
                    </div>
                    <div class="row">
                        @foreach($project->outSideImages as $image)
                            <div class="col-sm-6 col-12 project-img-container">
                                <img class="project-img" style=""
                                     src="{{$image->image}}" alt="">
                            </div>

                        @endforeach

                    </div>
                </div>
                <div class="tab-pane project-details-container" id="simple-tabpanel-2" role="tabpanel"
                     aria-labelledby="simple-tab-2">
                    <div class="project-tab-header">
                        Unit Price
                    </div>

                    <div class="table-responsive">
                        <table class="table border-top">
                            <thead>
                            <tr>
                                <th class="table-head-title" scope="col">Configuration</th>
                                <th class="table-head-title" scope="col">Area</th>
                                <th class="table-head-title" scope="col">Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($project->prices as $unit)
                                <tr class="table-row">
                                    <td class="table-cell">{{$unit->configuration}}</td>
                                    <td class="table-cell">{{$unit->area}}</td>
                                    <td class="table-cell">{{$unit->price}}</td>
                                </tr>
                            @empty
                                <tr class="table-row">
                                    <td class="table-cell">No Units</td>
                                    <td class="table-cell">No Units</td>
                                    <td class="table-cell">No Units</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="tab-pane project-details-container" id="simple-tabpanel-3" role="tabpanel"
                     aria-labelledby="simple-tab-3">
                    <div class="project-tab-header">
                        Photos
                    </div>
                    <div class="row">
                        @foreach($project->inSideImages as $image)
                            <div class="col-sm-6 col-12 project-img-container">
                                <img class="project-img" style=""
                                     src="{{$image->image}}" alt="">
                            </div>


                        @endforeach

                    </div>
                </div>
                <div class="tab-pane project-details-container" id="simple-tabpanel-5" role="tabpanel"
                     aria-labelledby="simple-tab-5">
                    <div class="project-tab-header">
                        Payment plan
                    </div>


                    <div class="row ">
                        <div class="col-12  w-100">
                            <div class="card border-0 w-100">
                                <div class="card-body w-100">
                                    <div id="content w-100">
                                        <ul class="timeline w-100">
                                            @forelse($project->paymentPlans as $plan)
                                                <li class="event" data-year="{{$plan->step}}">
                                                    <h3>{{$plan->name}}</h3>
                                                    <p>{{$plan->description}}</p>
                                                </li>

                                            @empty
                                                <li class="event" data-year="No Payment Plans sdfsdfsdd asdas ">
                                                    <h3>No Payment Plans</h3>
                                                    <p>No Payment Plans</p>
                                                </li>
                                            @endforelse
                                            {{--                                                <li class="event" data-year="First Year">--}}
                                            {{--                                                    <h3>First Payment</h3>--}}
                                            {{--                                                    <p>First Payment will be 10% from unit price </p>--}}
                                            {{--                                                </li>--}}

                                            {{--                                                <li class="event" data-year="second Year">--}}
                                            {{--                                                    <h3>Registration</h3>--}}
                                            {{--                                                    <p>Get here on time, it's first come first serve. Be late, get turned away.</p>--}}
                                            {{--                                                </li>--}}


                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="tab-pane w-100" id="simple-tabpanel-6" role="tabpanel" aria-labelledby="simple-tab-6">
                    <div class="project-tab-header">
                        Location
                    </div>
                    @if($project->location_image)
                        <div class="row">
                            <img class="project-location-image" style="" src="{{$project->location_image}}"/>
                        </div>
                    @endif
                    <div class="d-flex flex-wrap justify-content-center project-details-container  my-4">
                        <div class="project-gps-location" style="">Location on GPS :{{$project->gps_location}}</div>
                    </div>


                    <div
                        class="d-flex flex-wrap justify-content-center justify-content-lg-between project-details-container">
                        @foreach($project->nearPlaces as $place)
                            <div class="col-lg-3 col-12">
                                <div class="d-flex align-items-center project-near-place-item">
                                    <div class="project-near-place-image-container">
                                        <img class=""
                                             src="{{asset('assets/icons/location.png')}}"/>
                                    </div>
                                    <div class="project-near-place-name">
                                        @if($place->time && !$place->distance)
                                            {{$place->time}} mins from
                                        @elseif($place->distance && !$place->time)
                                            {{$place->distance}} km from
                                        @elseif($place->distance && $place->time)
                                            {{$place->distance}} km / {{$place->time}} mins from
                                        @endif

                                        {{$place->name}}
                                    </div>

                                </div>
                            </div>
                        @endforeach
                        {{--                        <div class="col-md-3">--}}
                        {{--                            <div class="d-flex justify-content-center align-items-center project-near-place-item">--}}
                        {{--                                <div class="project-near-place-image-container">--}}
                        {{--                                    <img class="project-near-place-image"--}}
                        {{--                                         src="https://via.placeholder.com/50x50"/>--}}
                        {{--                                </div>--}}
                        {{--                                <div class="project-near-place-name">--}}
                        {{--                                    2 Min from metreo station--}}
                        {{--                                </div>--}}

                        {{--                            </div>--}}
                        {{--                        </div>--}}


                    </div>


                </div>
                <div class="tab-pane project-details-container" id="simple-tabpanel-7" role="tabpanel"
                     aria-labelledby="simple-tab-7">
                    <div class="project-tab-header">
                        About Developer
                    </div>

                    <div class="d-flex justify-content-center align-items-center flex-wrap">
                        <div class="col-lg-6 p-2">

                            <img class="project-manager-image"
                                 src="{{$project->manager_image}}"/>
                        </div>
                        <div class="col-lg-6 p-2">

                            <div style="width: 100%">
                                <span class="project-manager-name">{{$project->manager}}<br/> </span>

                                <span class="ql-editor">
                                    {!!$project->manager_description!!}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <div class="row justify-content-center pt-5">
            <button class="register-btn w-auto" data-bs-toggle="modal" data-bs-target="#exampleModal">Register now
            </button>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Register</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" class="registration-form" data-project-id="{{$project->id}}">
                            <input type="text" name="name" class="contact-input" placeholder="Enter Your Name">
                            <input type="email" name="email" class="contact-input" placeholder="Enter Your Email">
                            <input type="text" name="phone" class="contact-input" placeholder="Enter Your Phone">


                            <div class=" d-flex justify-content-center">
                                <button class=" contact-btn">Register Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal modal-xl fade" id="image-modal" aria-hidden="true" aria-labelledby="image-modal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img class="modal-image" src="" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
