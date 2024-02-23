@extends('dashboard.layout.dashboard')
@section('title', 'Edit Project')
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

            <img id="project_cover_image_preview" src="{{$project->cover_image}}" class="w-100 h-100"
                 style="object-fit: cover"
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


            <form action="" data-project-id="{{$project->id}}" id="edit-project-form">
                <input type="file" name="project_cover_image" id="project_cover_image" class="d-none">
                <div class="tab-content pt-5" id="tab-content">

                    <div class="tab-pane  project-details-container active" id="simple-tabpanel-0" role="tabpanel"
                         aria-labelledby="simple-tab-0">

                        <div class="row">


                            <div class="my-3 col-lg-4 col-12 col-md-6">
                                <label for="project_name" class="form-label text-primary fw-600">Project Name</label>
                                <input type="text" class="form-control" name="project_name" id="project_name"
                                       placeholder="project name" value="{{$project->name}}">
                            </div>
                            <div class="my-3 col-lg-4 col-12 col-md-6">
                                <label for="project_summary" class="form-label text-primary fw-600">Project
                                    Summary</label>
                                <input type="text" class="form-control" name="project_summary" id="project_summary"
                                       placeholder="project summary" value="{{$project->summary}}">
                            </div>
                            <div class="my-3 col-lg-4 col-12 col-md-6">
                                <label for="project_type" class="form-label text-primary fw-600">Project
                                    Type</label>
                                <select type="text" class="form-select" name="type" id="project_type">
                                    <option value="compound" @if($project->type=='compound')selected @endif>Off Plan
                                    </option>
                                    <option value="apartment" @if($project->type=='apartment')selected @endif>Exclusive
                                        property
                                    </option>
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
                                {!! $project->description !!}
                            </div>

                        </div>
                        <div class="project-tab-header">
                            AMENITIES
                        </div>
                        <div class="row ">
                            <button type="button" class="btn btn-primary w-auto" id="add-amenity">Add</button>

                        </div>
                        <div class="project-features-container" id="project-features-container">


                            @foreach($project->features as $amenity)
                                <div class="col-4 service-item" id="feature{{$amenity->id}}"
                                     data-count="{{$amenity->id}}">
                                    <div class="card rounded-0 border-0 shadow">
                                        <div onclick="document.getElementById('feature{{$amenity->id}}').remove()"
                                             class="position-absolute delete-btn shadow-sm bg-danger d-flex justify-content-center align-items-center "
                                             style="width: 30px;height: 30px;border-radius: 50%;cursor: pointer;top: -15px;right: -15px">
                                            <i class="fa fa-x text-white"></i>
                                        </div>
                                        <div class="card-body p-2 border-0">
                                            <label class="service-image-container border-0"
                                                   for="features[{{$amenity->id}}][image]">

                                                <img class="img-fluid service-image border-0" src="{{$amenity->image??''}}"
                                                     alt="">
                                            </label>
                                            <input class="d-none feature-img-input " type="file"
                                                   name="features[{{$amenity->id}}][image]"
                                                   id="features[{{$amenity->id}}][image]"
                                                   accept="image/png, image/svg+xml,image/x-icon">
                                            <div class="my-1">
                                                <label class="form-label fw-600 text-primary"
                                                       for="features[{{$amenity->id}}][title]">Title</label>
                                                <input type="text" class="form-control"
                                                       name="features[{{$amenity->id}}][title]"
                                                       id="features[{{$amenity->id}}]['title']"
                                                       placeholder="title" value="{{$amenity->name}}">
                                                <input type="hidden" name="features[{{$amenity->id}}][id]"
                                                       value="{{$amenity->id}}">
                                            </div>
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
                        <div class="row  my-2">
                            <button type="button" class="btn btn-primary w-auto" id="addGalleryImageBtn">Add</button>
                        </div>
                        <div class="row" id="galleryContainer">

                            @foreach($project->outSideImages as $image)
                                <div class="col-sm-6 col-12 project-img-container position-relative"
                                     id="galleryImage-{{$image->id}}" data-count="{{$image->id}}">
                                    <div onclick="document.getElementById('galleryImage-{{$image->id}}').remove()"
                                         class="position-absolute delete-btn shadow-sm bg-danger d-flex justify-content-center align-items-center "
                                         style="width: 30px;height: 30px;border-radius: 50%;cursor: pointer;top: 0;right: 0">
                                        <i class="fa fa-x text-white"></i>
                                    </div>

                                    <label for="images[{{$image->id}}]"
                                           class="d-flex justify-content-center rounded align-items-center flex-column position-absolute shadow-sm d-flex justify-content-center align-items-center bg-white m-3 p-5 text-primary"
                                           style="top: 50%;left: 50%;transform: translate(-50%,-50%);width: 50%;opacity: 50%;cursor: pointer">
                                        <div>
                                            <i class="fa fa-plus  fa-2x m-2"></i>

                                        </div>

                                        <div>
                                            upload Photo
                                        </div>
                                    </label>
                                    <div class="service-image-container border-0">
                                        <img class="img-fluid project-img border-0" src="{{$image->image}}"
                                             alt="" id="galleryImagePreview-{{$image->id}}">
                                    </div>
                                    <input class="d-none gallery-img-input" type="file"
                                           name="images[{{$image->id}}][image]" id="images[{{$image->id}}]"
                                           accept="image/*">
                                    <input type="hidden" name="images[{{$image->id}}][id]" value="{{$image->id}}">
                                    <input type="hidden" name="images[{{$image->id}}][type]" value="outside">
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

                                @foreach($project->prices as $price)
                                    <tr id="price-{{$price->id}}" data-count="{{$price->id}}">
                                        <td>
                                            <input type="text" class="form-control"
                                                   name="prices[{{$price->id}}][configuration]"
                                                   placeholder="configuration" value="{{$price->configuration}}">
                                            <input type="hidden" class="form-control" name="prices[{{$price->id}}][id]"
                                                   value="{{$price->id}}">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="prices[{{$price->id}}][area]"
                                                   placeholder="area" value="{{$price->area}}">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="prices[{{$price->id}}][price]"
                                                   placeholder="price" value="{{$price->price}}">
                                        </td>

                                        <td>
                                            <button class="btn btn-danger" type="button"
                                                    onclick="document.getElementById('price-{{$price->id}}').remove()">
                                                Remove
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach


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
                            @foreach($project->inSideImages as $photo)
                                <div class="col-sm-6 col-12 project-img-container position-relative"
                                     id="photoImage-{{$photo->id}}" data-count="{{$photo->id}}">
                                    <div onclick="document.getElementById('photoImage-{{$photo->id}}').remove()"
                                         class="position-absolute delete-btn shadow-sm bg-danger d-flex justify-content-center align-items-center "
                                         style="width: 30px;height: 30px;border-radius: 50%;cursor: pointer;top: 0;right: 0">
                                        <i class="fa fa-x text-white"></i>
                                    </div>

                                    <label for="photo[{{$photo->id}}]"
                                           class="d-flex justify-content-center rounded align-items-center flex-column position-absolute shadow-sm d-flex justify-content-center align-items-center bg-white m-3 p-5 text-primary"
                                           style="top: 50%;left: 50%;transform: translate(-50%,-50%);width: 50%;opacity: 50%;cursor: pointer">
                                        <div>
                                            <i class="fa fa-plus  fa-2x m-2"></i>

                                        </div>

                                        <div>
                                            upload Photo
                                        </div>
                                    </label>
                                    <div class="service-image-container border-0">
                                        <img class="img-fluid project-img border-0" src="{{$photo->image}}"
                                             alt="" id="photoImagePreview-{{$photo->id}}">
                                    </div>
                                    <input class="d-none photo-img-input" type="file"
                                           name="photos[{{$photo->id}}][image]" id="photo[{{$photo->id}}]"
                                           accept="image/*">
                                    <input type="hidden" name="photos[{{$photo->id}}][type]" value="inside">
                                    <input type="hidden" name="photos[{{$photo->id}}][id]" value="{{$photo->id}}">
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
                                            <ul class="timeline w-100" id="timeline">

                                                @foreach($project->paymentPlans as $plan)
                                                    <li class="event" data-year="{{$plan->step}}" id="plan-{{$plan->id}}" data-count="{{$plan->id}}">
                                                        <div onclick="document.getElementById('plan-{{$plan->id}}').remove()"
                                                             class="position-absolute delete-btn shadow-sm bg-danger d-flex justify-content-center align-items-center "
                                                             style="width: 30px;height: 30px;border-radius: 50%;cursor: pointer;top: -10px;right: -20px">
                                                            <i class="fa fa-x text-white"></i>
                                                        </div>
                                                        <div class="my-1">
                                                            <label class="form-label fw-600 text-primary" for="plans[{{$plan->id}}][step]">step</label>
                                                            <input class="form-control" type="text" name="plans[{{$plan->id}}][step]" value="{{$plan->step}}" id="plans[{{$plan->id}}][step]" onchange="document.getElementById('plan-{{$plan->id}}').dataset.year=event.target.value">
                                                        </div>
                                                        <div class="my-1">
                                                            <label class="form-label fw-600 text-primary" for="plans[{{$plan->id}}][name]">name</label>
                                                            <input class="form-control" type="text" name="plans[{{$plan->id}}][name]" value="{{$plan->name}}">
                                                        </div>
                                                        <div class="my-1">
                                                            <label class="form-label fw-600 text-primary" for="plans[{{$plan->id}}][description]">description</label>
                                                            <input class="form-control" type="text" name="plans[{{$plan->id}}][description]" value="{{$plan->description}}">
                                                            <input type="hidden" name="plans[{{$plan->id}}][id]" value="{{$plan->id}}">
                                                        </div>
                                                    </li>
                                                @endforeach
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
                            <img class="project-location-image" id="project_location_image_preview"
                                 src="{{$project->location_image}}" style=""/>
                            <input type="file" name="project_location_image" id="project_location_image" class="d-none">
                        </div>

                        <div class="d-flex flex-wrap justify-content-center project-details-container  my-4">
                            <div class="fw-600 fs-25 d-flex align-items-center flex-wrap" style="">
                                <label for="gps_location" class="form-label">Location on GPS :</label>
                                <input type="text" class="form-control" name="gps_location" id="gps_location"
                                       placeholder="GPS Location" value="{{$project->gps_location}}">
                            </div>
                        </div>


                        <div class="row d-flex flex-wrap justify-content-center  project-details-container"
                             id="near_places_container">
                            <div class="project-tab-header">
                                Near Places
                            </div>
                            @foreach($project->nearPlaces as $place)
                                <div class="col-lg-4 col-12 position-relative" data-count="{{$place->id}}" id="nearPlace-{{$place->id}}">
                                    <div
                                        class="position-absolute top-0 end-0 delete-btn shadow-sm bg-danger d-flex justify-content-center align-items-center "
                                        style="width: 30px;height: 30px;border-radius: 50%;cursor: pointer"
                                        onclick="document.getElementById('nearPlace-{{$place->id}}').remove()">
                                        <i class="fa fa-x text-white"></i>
                                    </div>
                                    <div class="d-flex align-items-center project-near-place-item">
                                        <div class="project-near-place-image-container">

                                        </div>
                                        <div class="project-near-place-name">


                                            <div class="my-2">
                                                <label class="form-label fw-600 text-primary"
                                                       for="near_places[{{$place->id}}][distance]">distance</label>
                                                <input type="text" class="form-control"
                                                       name="near_places[{{$place->id}}][distance]"
                                                       value="{{$place->distance}}"
                                                       id="near_places[{{$place->id}}][distance]"
                                                       placeholder="distance in km ex:10">


                                            </div>
                                            <div class="my-2">
                                                <label class="form-label fw-600 text-primary"
                                                       for="near_places[{{$place->id}}][time]">time</label>

                                                <input type="text" class="form-control"
                                                       name="near_places[{{$place->id}}][time]" value="{{$place->time}}"
                                                       id="near_places[{{$place->id}}][time]"
                                                       placeholder="time in minutes ex:30">

                                            </div>
                                            <div class="my-2">
                                                <label class="form-label fw-600 text-primary"
                                                       for="near_places[{{$place->id}}][place]">place</label>

                                                <input type="text" class="form-control"
                                                       name="near_places[{{$place->id}}][place]"
                                                       value="{{$place->name}}" id="near_places[{{$place->id}}][place]"
                                                       placeholder="place name">

                                                <input type="hidden" name="near_places[{{$place->id}}][id]"
                                                       value="{{$place->id}}">
                                            </div>

                                        </div>

                                    </div>

                                </div>
                            @endforeach


                        </div>
                        <div class="row justify-content-center">
                            <div class="my-2 col-md-6 col-12">
                                <label for="time" class="form-label">Time</label>
                                <input type="text" class="form-control" id="time" placeholder="Time">
                            </div>
                            <div class="my-2 col-md-6 col-12">
                                <label for="distance" class="form-label">Distance</label>
                                <input type="text" class="form-control" id="distance" placeholder="Distance">
                            </div>

                            <div class="my-2">
                                <label for="place" class="form-label">Place</label>
                                <input type="text" class="form-control" id="place" placeholder="Place">
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
                                         id="project_manager_image_preview" src="{{$project->manager_image}}"/>
                                </label>
                            </div>

                            <input type="file" name="manager_image" id="project_manager_image" class="d-none">
                            <div class="col-lg-6 p-2">

                                <div style="width: 100%">
                                    <div class="">
                                        <label for="manager_name" class="form-label fw-600 text-primary">Developer
                                            Name</label>
                                        <input type="text" class="form-control" name="manager_name" id="manager_name"
                                               placeholder="Developer Name" value="{{$project->manager}}">
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
                                            {!! $project->manager_description !!}
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
    @vite('resources/js/Dashboard/Services/OffPlan/edit.js')
@endsection
