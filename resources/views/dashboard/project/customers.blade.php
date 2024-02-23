@extends('dashboard.layout.dashboard')
@section('title', 'Customer')
@section('content')
    <div class="">
        <div class="d-flex px-2">
            <h3 class="heading p-0 ">Customers</h3>

        </div>
    </div>
    <div class="d-flex flex-wrap m-0">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th >Name</th>
                <th >Phone</th>
                <th >Email</th>
            </tr>
            </thead>
            <tbody id="customersContainer" data-project-id="{{$project->id}}">
            </tbody>

        </table>
        <div class=" overflow-auto d-flex justify-content-center w-100" id="customersPagination">

        </div>
    </div>

    @section('js')
        @vite(['resources/js/Dashboard/Services/OffPlan/Customer/main.js'])

    @endsection
@endsection
