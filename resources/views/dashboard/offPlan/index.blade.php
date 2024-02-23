@extends('dashboard.layout.dashboard')
@section('title', 'Off Plan Projects')
@section('content')
    @section('breadcrumb')
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard.web.index')}}">Dashboard</a></li>

                <li class="breadcrumb-item active">Off Plan Projects</li>
            </ol>
        </nav>
    @endsection

    <div class="">
        <div class="d-flex px-2">
            <h3 class="heading p-0">Off Plan Projects</h3>

        </div>

    </div>

    <div class="d-flex flex-wrap m-0 row">

        <div class="d-flex justify-content-center flex-wrap  row" id="offPlansContainer">

        </div>
        <div class=" overflow-auto d-flex justify-content-center w-100" id="offPlansPagination">

        </div>
    </div>


    @section('scripts')
        @vite('resources/js/Dashboard/Services/OffPlan/main.js')
    @endsection
@endsection
