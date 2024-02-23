@extends('dashboard.layout.dashboard')
@section('title', 'Contacts')
@section('content')
    <div class="">
        <div class="d-flex px-2">
            <h3 class="heading p-0 ">Contacts</h3>

        </div>
    </div>
    <div class="d-flex flex-wrap m-0">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th >Name</th>
                <th >Phone</th>
                <th >Email</th>
                <th >Message</th>
                <th >Action</th>
            </tr>
            </thead>
            <tbody id="contactsContainer">
            </tbody>

        </table>
        <div class=" overflow-auto d-flex justify-content-center w-100" id="contactsPagination">

        </div>
    </div>

    @section('js')
        @vite(['resources/js/Dashboard/Services/Contact/main.js'])

    @endsection
@endsection
