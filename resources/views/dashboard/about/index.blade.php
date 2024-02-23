@extends('dashboard.layout.dashboard')
@section('title', 'About Us')
@section('content')
    <div class="">
        <div class="d-flex px-2">
            <h3 class="heading p-0 ">Website</h3>
        </div>
    </div>
    <form id="about_us_form">


        <div class="container">
            <div class="row bg-white p-4 rounded-3 shadow-sm">
                <div class="d-flex flex-wrap justify-content-center align-items-center">
                    <div class="col-md-4">
                        <div class="col-md-12 position-relative mt-2" style="min-height: 300px">
                            <label for="website_logo" class="form-label fw-600 text-primary">Light Logo</label>
                            <label for="website_logo"
                                   class="d-flex justify-content-center rounded align-items-center flex-column position-absolute shadow-sm d-flex justify-content-center align-items-center bg-white  p-2 text-primary"
                                   style="top: 50%;left: 50%;transform: translate(-50%,-50%);width: 50%;opacity: 50%;cursor: pointer">
                                <div>
                                    <i class="fa fa-plus  fa-2x m-2"></i>

                                </div>

                                <div>
                                    upload Photo
                                </div>
                            </label>
                            <img class="w-100 h-100 " alt="" id="logo_preview">
                            <input type="file" name="website_logo" id="website_logo" class="d-none"
                                   accept="image/png, image/svg+xml,image/x-icon">
                        </div>
                        <div class="col-md-12 position-relative mt-2" style="min-height: 300px">
                            <label for="website_logo_dark" class="form-label fw-600 text-primary">Dark Logo</label>
                            <label for="website_logo_dark"
                                   class="d-flex justify-content-center rounded align-items-center flex-column position-absolute shadow-sm d-flex justify-content-center align-items-center bg-white  p-2 text-primary"
                                   style="top: 50%;left: 50%;transform: translate(-50%,-50%);width: 50%;opacity: 50%;cursor: pointer">
                                <div>
                                    <i class="fa fa-plus  fa-2x m-2"></i>

                                </div>

                                <div>
                                    upload Photo
                                </div>
                            </label>
                            <img class="w-100 h-100 " alt="" id="dark_logo_preview">
                            <input type="file" name="website_logo_dark" id="website_logo_dark" class="d-none"
                                   accept="image/png, image/svg+xml,image/x-icon">
                        </div>
                    </div>

                    <div class="ms-4 col d-flex flex-column flex-wrap">
                        <div>
                            <label for="website_name" class="form-label fw-600 text-primary mt-3">Name</label>
                            <input type="text" name="website_name" id="website_name" class="form-control"
                                   placeholder="Name">
                        </div>
                        <div>
                            <label for="website_description" class="form-label fw-600 text-primary mt-3">SEO
                                Description</label>
                            <textarea type="text" name="website_description" id="website_description"
                                      class="form-control" placeholder="Description"></textarea>
                        </div>

                    </div>
                </div>
            </div>


        </div>

        <div class="">
            <div class="d-flex px-2">
                <h3 class="heading p-0 ">About Us</h3>
            </div>
        </div>
        <div class="container">


            <div class="row bg-white p-4 rounded-3 shadow-sm">

                <div class=" d-flex flex-column flex-wrap">
                    <div>
                        <label for="address" class="form-label fw-600 text-primary mt-3">Address</label>
                        <input type="text" name="address" id="address"
                               class="form-control" placeholder="address">
                    </div>
                    <div>
                        <label for="business_hours" class="form-label fw-600 text-primary mt-3">Business Hours</label>
                        <input type="text" name="business_hours" id="business_hours"
                               class="form-control" placeholder="Business Hours">
                    </div>
                    <div>
                        <label for="about_us" class="form-label fw-600 text-primary mt-3">About Us</label>
                        <textarea type="text" name="about_us" id="about_us"
                                  class="form-control" placeholder="About Us"></textarea>
                    </div>


                </div>

            </div>


        </div>

        <div class="">
            <div class="d-flex px-2">
                <h3 class="heading p-0 ">Communication</h3>
            </div>
        </div>
        <div class="container">


            <div class="row bg-white p-4 rounded-3 shadow-sm">

                <div class="row ">
                    <div class="col-6 ">
                        <label for="phone" class="form-label fw-600 text-primary mt-3">Phone</label>
                        <input type="text" name="phone" id="phone"
                               class="form-control" placeholder="Phone">
                    </div>
                    <div class="col-6">
                        <label for="email" class="form-label fw-600 text-primary mt-3">Email</label>
                        <input type="text" name="email" id="email"
                               class="form-control" placeholder="email">
                    </div>

                </div>

            </div>


        </div>

        <div class="">
            <div class="d-flex px-2">
                <h3 class="heading p-0 ">Social Media</h3>
            </div>
        </div>
        <div class="container">


            <div class="row bg-white p-4 rounded-3 shadow-sm">

                <div class="row ">
                    <div class="col-6 ">
                        <label for="facebook" class="form-label fw-600 text-primary mt-3">Facebook</label>
                        <input type="text" name="facebook" id="facebook"
                               class="form-control" placeholder="facebook">
                    </div>
                    <div class="col-6 ">
                        <label for="twitter" class="form-label fw-600 text-primary mt-3">twitter</label>
                        <input type="text" name="twitter" id="twitter"
                               class="form-control" placeholder="twitter">
                    </div>
                    <div class="col-6 ">
                        <label for="instagram" class="form-label fw-600 text-primary mt-3">instagram</label>
                        <input type="text" name="instagram" id="instagram"
                               class="form-control" placeholder="instagram">
                    </div>
                    <div class="col-6 ">
                        <label for="youtube" class="form-label fw-600 text-primary mt-3">youtube</label>
                        <input type="text" name="youtube" id="youtube"
                               class="form-control" placeholder="youtube">
                    </div>
                    <div class="col-6 ">
                        <label for="tiktok" class="form-label fw-600 text-primary mt-3">tiktok</label>
                        <input type="text" name="tiktok" id="tiktok"
                               class="form-control" placeholder="tiktok">
                    </div>
                    <div class="col-6 ">
                        <label for="threads" class="form-label fw-600 text-primary mt-3">threads</label>
                        <input type="text" name="threads" id="threads"
                               class="form-control" placeholder="threads">
                    </div>


                </div>

                <div class="my-4">

                    <button class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('js')

    @vite(['resources/js/Dashboard/Services/Setting/main.js'])
@endsection
