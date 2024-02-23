@extends('clientSide.layout.layout')
@section('title', 'Exclusive Properties')
@section('head')
    @vite(['resources/js/ClientSide/Services/ExclusiveProperty/list.js'])

@endsection
@section('content')

    <div class="row position-relative" style="height: 15rem">
        <div
            class="exclusiveProperties-page-cover-typo position-absolute top-50 start-50 translate-middle w-auto text-center text-white"
            style="z-index: 101">
            <div class="exclusiveProperties-page-cover-title fs-45">
                Exclusive Properties
            </div>
            <div class="exclusiveProperties-page-cover-description fs-16">

                <a class="text-decoration-none text-white" href="/">
                    Home
                </a>
                /
                <span class="fw-bold">
                    Exclusive Properties
                </span>

            </div>
        </div>
        <img class="w-100 h-100" style="object-fit: cover" src="{{asset('assets/30.png')}}" alt="">
        <div class="overlay"></div>
    </div>



    <div class="container pt-5">
{{--        <div class="mx-3 my-2 d-flex flex-wrap justify-content-between pt-5">--}}

{{--            <div>--}}
{{--                <label class="form-label" for=""> Sort By:</label>--}}

{{--                <select class="" id="sort-by">--}}
{{--                    <option value="price">Price</option>--}}
{{--                    <option value="name">Name</option>--}}
{{--                </select>--}}
{{--            </div>--}}


{{--            <div>--}}
{{--                <label class="form-label mx-2 fw-bold" for=""> All Properties</label>--}}
{{--                <select class="" id="sort-by">--}}
{{--                    <option value="price">For Buy</option>--}}
{{--                    <option value="price">For Sale</option>--}}
{{--                    <option value="price">For Rent</option>--}}

{{--                </select>--}}

{{--            </div>--}}
{{--        </div>--}}
        <div class="d-flex flex-row flex-wrap justify-content-center align-items-center" id="exclusiveProperties-container">

        </div>
        <div class="d-flex justify-content-center" id="pagination-container">

        </div>
    </div>

@endsection
