@extends('dashboard.layout.dashboard')
@section('title', 'Create Project')
@section('content')

    <section id="cover-section" style="height: 80vh" class="overflow-hidden position-relative">


        <label for="project_cover_image"
               class="d-flex justify-content-center rounded align-items-center flex-column position-absolute shadow-sm d-flex justify-content-center align-items-center bg-white m-3 p-5 text-primary"
               style="top: 50%;left: 50%;transform: translate(-50%,-50%);width: 50%;opacity: 50%;cursor: pointer">
            <div>
                <i class="fa fa-plus  fa-2x m-2"></i>

            </div>

            <div>
                upload Photo
            </div>
        </label>
        <div class="w-100 h-100 border overflow-hidden" id="coverImagesContainer">

            <img id="project_cover_image_preview" class="w-100 h-100" style="object-fit: cover"
            >
        </div>
        {{--    <div class="overlay">--}}
        {{--    </div>--}}

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


            <form action="" id="add-project-form">
                <input type="file" name="project_cover_image" id="project_cover_image" class="d-none">
                <div class="tab-content pt-5" id="tab-content">

                    <div class="tab-pane  project-details-container active" id="simple-tabpanel-0" role="tabpanel"
                         aria-labelledby="simple-tab-0">

                        <div class="row">


                            <div class="my-3 col-lg-4 col-12 col-md-6">
                                <label for="project_name" class="form-label text-primary fw-600">Project Name</label>
                                <input type="text" class="form-control" name="project_name" id="project_name"
                                       placeholder="project name">
                            </div>
                            <div class="my-3 col-lg-4 col-12 col-md-6">
                                <label for="project_summary" class="form-label text-primary fw-600">Project
                                    Summary</label>
                                <input type="text" class="form-control" name="project_summary" id="project_summary"
                                       placeholder="project summary">
                            </div>
                            <div class="my-3 col-lg-4 col-12 col-md-6">
                                <label for="project_type" class="form-label text-primary fw-600">Project
                                    Type</label>
                                <select type="text" class="form-select" name="type" id="project_type">
                                    <option value="compound" selected>Off Plan</option>
                                    <option value="apartment">Exclusive property</option>
                                </select>
                            </div>
                        </div>
                        <div class="my-3 col-12 ">
                            <label class="form-label text-primary fw-600">Project Description</label>
                            <div id="toolbar-container" class="rounded-top bg-light shadow-sm">
                                  <span class="ql-formats">
                                    <select class="ql-font"></select>
                                    <select class="ql-size"></select>
                                  </span>
                                <span class="ql-formats">
                                        <button class="ql-bold"></button>
                                        <button class="ql-italic"></button>
                                        <button class="ql-underline"></button>
                                        <button class="ql-strike"></button>
                                   </span>
                                <span class="ql-formats">
                                        <select class="ql-color"></select>
                                        <select class="ql-background"></select>
                                    </span>
                                <span class="ql-formats">
    <button class="ql-script" value="sub"></button>
    <button class="ql-script" value="super"></button>
  </span>
                                <span class="ql-formats">
    <button class="ql-header" value="1"></button>
    <button class="ql-header" value="2"></button>
  </span>
                                <span class="ql-formats">
    <button class="ql-list" value="ordered"></button>
    <button class="ql-list" value="bullet"></button>
    <button class="ql-indent" value="-1"></button>
    <button class="ql-indent" value="+1"></button>
  </span>
                                <span class="ql-formats">
    <button class="ql-direction" value="rtl"></button>
    <select class="ql-align"></select>
  </span>
                                <span class="ql-formats">
    <button class="ql-link"></button>
  </span>
                                <span class="ql-formats">
                                <button class="ql-clean"></button>
  </span>
                            </div>
                            <div id="editor" class="rounded-bottom bg-white shadow-sm">
                            </div>

                        </div>
                        <div class="project-tab-header">
                            AMENITIES
                        </div>
                        <div class="row ">
                            <button type="button" class="btn btn-primary w-auto" id="add-amenity">Add</button>

                        </div>
                        <div class="project-features-container" id="project-features-container">


                            {{--                            <div class="col-4 service-item" id="add-amenity">--}}
                            {{--                                <div class="card rounded-0 border-0 shadow">--}}
                            {{--                                    <div class="card-body p-2">--}}
                            {{--                                        <div class="card-body h-100 d-flex flex-column justify-content-center align-items-center" style="cursor: pointer;">--}}
                            {{--                                            <svg width="31" height="39" viewBox="0 0 31 39" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
                            {{--                                                <path d="M15.5 8.8453V30.3269" stroke="#A3AED0" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>--}}
                            {{--                                                <path d="M23.9375 19.5861H7.0625" stroke="#A3AED0" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>--}}
                            {{--                                            </svg>--}}

                            {{--                                            <p class="text-muted">Add A New Amenity</p>--}}
                            {{--                                        </div>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}


                        </div>

                    </div>
                    <div class="tab-pane project-details-container" id="simple-tabpanel-1" role="tabpanel"
                         aria-labelledby="simple-tab-1">
                        <div class="project-tab-header">
                            Gallery
                        </div>
                        <div class="row  my-2">
                            <button type="button" class="btn btn-primary w-auto" id="addGalleryImageBtn">Add</button>
                        </div>
                        <div class="row" id="galleryContainer">


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
                                    <th class="table-head-title" scope="col"><label for="price_configuration">Configuration</label>
                                    </th>
                                    <th class="table-head-title" scope="col"><label for="price_area">Area</label></th>
                                    <th class="table-head-title" scope="col"><label for="price">Price</label></th>
                                    <th class="table-head-title" scope="col">Action</th>
                                </tr>
                                <tr class="table-row">
                                    <td class="table-cell"><input type="text" class="form-control"
                                                                  id="price_configuration"></td>
                                    <td class="table-cell"><input type="text" class="form-control" id="price_area"></td>
                                    <td class="table-cell"><input type="text" class="form-control" id="price"></td>
                                    <td class="table-cell">
                                        <button type="button" class="btn btn-primary" id="add_price_btn">Add</button>
                                    </td>
                                </tr>
                                </thead>
                                <tbody id="prices_table_body">

                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="tab-pane project-details-container" id="simple-tabpanel-3" role="tabpanel"
                         aria-labelledby="simple-tab-3">
                        <div class="project-tab-header">
                            Photos
                        </div>
                        <div class="row my-2">
                            <button type="button" class="btn btn-primary w-auto" id="addPhotoImageBtn">Add</button>
                        </div>
                        <div class="row" id="photoContainer">


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
                                            <ul class="timeline w-100" id="timeline">


                                            </ul>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row ">
                            <div class="col-md-6 my-2">
                                <label for="payment_plan_step" class="form-label fw-600 text-primary">Step</label>
                                <input type="text" class="form-control" id="payment_plan_step">
                            </div>
                            <div class="col-md-6 my-2">
                                <label for="payment_plan_name" class="form-label fw-600 text-primary">Name</label>
                                <input type="text" class="form-control" id="payment_plan_name">
                            </div>
                            <div class="my-2">
                                <label for="payment_plan_description"
                                       class="form-label fw-600 text-primary">Description</label>
                                <input type="text" class="form-control" id="payment_plan_description">
                            </div>

                            <div class="my-2">
                                <button class="btn btn-primary" id="add_plan_btn">Add</button>

                            </div>


                        </div>
                    </div>
                    <div class="tab-pane w-100" id="simple-tabpanel-6" role="tabpanel" aria-labelledby="simple-tab-6">
                        <div class="project-tab-header">
                            Location
                        </div>

                        <div class="row position-relative">
                            <label for="project_location_image"
                                   class="d-flex justify-content-center rounded align-items-center flex-column position-absolute shadow-sm d-flex justify-content-center align-items-center bg-white m-3 p-5 text-primary"
                                   style="top: 50%;left: 50%;transform: translate(-50%,-50%);width: 50%;opacity: 50%;cursor: pointer">
                                <div>
                                    <i class="fa fa-plus  fa-2x m-2"></i>

                                </div>

                                <div>
                                    upload Photo
                                </div>
                            </label>
                            <img class="project-location-image" id="project_location_image_preview" style=""/>
                            <input type="file" name="project_location_image" id="project_location_image" class="d-none">
                        </div>

                        <div class="d-flex flex-wrap justify-content-center project-details-container  my-4">
                            <div class="fw-600 fs-25 d-flex align-items-center flex-wrap" style="">
                                <label for="gps_location" class="form-label">Location on GPS :</label>
                                <input type="text" class="form-control" name="gps_location" id="gps_location" placeholder="GPS Location">
                            </div>
                        </div>


                        <div class="row d-flex flex-wrap justify-content-center  project-details-container" id="near_places_container">




                        </div>
                        <div class="row justify-content-center">
                            <div class="my-2 col-md-6 col-12">
                                <label for="time" class="form-label">Time</label>
                                <input type="text" class="form-control"  id="time" placeholder="Time">
                            </div>
                            <div class="my-2 col-md-6 col-12">
                                <label for="distance" class="form-label">Distance</label>
                                <input type="text" class="form-control"  id="distance" placeholder="Distance">
                            </div>

                            <div class="my-2">
                                <label for="place" class="form-label">Place</label>
                                <input type="text" class="form-control"  id="place" placeholder="Place">
                            </div>

                            <div class="my-2">
                                <button class="btn btn-primary" id="add_near_place_btn">Add</button>
                            </div>

                        </div>

                    </div>
                    <div class="tab-pane project-details-container" id="simple-tabpanel-7" role="tabpanel"
                         aria-labelledby="simple-tab-7">
                        <div class="project-tab-header">
                            About Developer
                        </div>

                        <div class="d-flex justify-content-center align-items-center flex-wrap">

                            <div class="col-lg-6 p-2 position-relative">
                                <label for="project_manager_image"
                                       class="d-flex justify-content-center rounded align-items-center flex-column position-absolute shadow-sm d-flex justify-content-center align-items-center bg-white m-3 p-5 text-primary"
                                       style="top: 50%;left: 50%;transform: translate(-55%,-55%);width: 50%;opacity: 50%;cursor: pointer">
                                    <div>
                                        <i class="fa fa-plus  fa-2x m-2"></i>

                                    </div>

                                    <div>
                                        upload Photo
                                    </div>
                                </label>
                                <label class="w-100 h-100" for="project_manager_image">
                                    <img class="project-manager-image h-100 w-100"
                                         id="project_manager_image_preview"/>
                                </label>
                            </div>

                            <input type="file" name="manager_image" id="project_manager_image" class="d-none">
                            <div class="col-lg-6 p-2">

                                <div style="width: 100%">
                                    <div class="">
                                        <label for="manager_name" class="form-label fw-600 text-primary">Developer
                                            Name</label>
                                        <input type="text" class="form-control" name="manager_name" id="manager_name"
                                               placeholder="Developer Name">
                                    </div>

                                    <div class="my-3 col-12 ">
                                        <label class="form-label fw-600 text-primary">Developer Description</label>
                                        <div id="manager-toolbar-container" class="rounded-top bg-light shadow-sm">
                                  <span class="ql-formats">
                                    <select class="ql-font"></select>
                                    <select class="ql-size"></select>
                                  </span>
                                            <span class="ql-formats">
                                        <button class="ql-bold"></button>
                                        <button class="ql-italic"></button>
                                        <button class="ql-underline"></button>
                                        <button class="ql-strike"></button>
                                   </span>
                                            <span class="ql-formats">
                                        <select class="ql-color"></select>
                                        <select class="ql-background"></select>
                                    </span>
                                            <span class="ql-formats">
    <button class="ql-script" value="sub"></button>
    <button class="ql-script" value="super"></button>
  </span>
                                            <span class="ql-formats">
    <button class="ql-header" value="1"></button>
    <button class="ql-header" value="2"></button>
  </span>
                                            <span class="ql-formats">
    <button class="ql-list" value="ordered"></button>
    <button class="ql-list" value="bullet"></button>
    <button class="ql-indent" value="-1"></button>
    <button class="ql-indent" value="+1"></button>
  </span>
                                            <span class="ql-formats">
    <button class="ql-direction" value="rtl"></button>
    <select class="ql-align"></select>
  </span>
                                            <span class="ql-formats">
    <button class="ql-link"></button>
  </span>
                                            <span class="ql-formats">
                                <button class="ql-clean"></button>
  </span>
                                        </div>
                                        <div id="manger-description-editor" class="rounded-bottom bg-white shadow-sm">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="row justify-content-end px-5">
                    <button class="btn btn-primary w-auto">Save</button>
                </div>
            </form>


        </div>


        <!-- Modal -->
        <div class="modal modal-xl fade" id="image-modal" aria-hidden="true" aria-labelledby="image-modal"
             tabindex="-1">
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

    <!-- Create the toolbar container -->

@endsection
@section('scripts')
    @vite('resources/js/Dashboard/Services/OffPlan/create.js')
@endsection
