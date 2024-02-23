@extends('dashboard.layout.dashboard')
@section('title', 'Services')
@section('content')

    @section('breadcrumb')
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>

                <li class="breadcrumb-item active">Services</li>
            </ol>
        </nav>
    @endsection




    <div class="">
        <div class="d-flex px-2">
            <h3 class="heading p-0">Services</h3>

        </div>
        <div class="my-2">
            {{--                <select name="" id="perPage">--}}
            {{--                    <option value="5">5</option>--}}
            {{--                    <option value="10">10</option>--}}
            {{--                    <option value="20">20</option>--}}
            {{--                    <option value="40">40</option>--}}
            {{--                    <option value="80">80</option>--}}
            {{--                </select>--}}


        </div>

    </div>

    <div id="servicesContainer" class="d-flex flex-wrap m-0">

    </div>
    <div class=" overflow-auto my-1 d-flex justify-content-center w-100" id="pagination">

    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Service</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="addServiceForm">
                        <div class="mb-2">
                            <label class="form-label" for="name">Cover Image</label>
                            <input class="form-control" type="file" name="cover_image" id="cover_image">
                        </div>
                        <div class="mb-2">
                            <label class="form-label" for="title">Title</label>
                            <input class="form-control" type="text" name="title" id="title">
                        </div>
                        <div class="mb-2">
                            <label class="form-label" for="status">Status</label>
                            <select class="form-select" type="text" name="status" id="status">
                                <option value="active">active</option>
                                <option value="inactive">inactive</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" form="addServiceForm">Add</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade " id="editServiceModal" tabindex="-1" aria-labelledby="editServiceModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Service</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="editServiceForm">

                        <input type="hidden" name="id" id="id">
                        <div class="mb-2">
                            <label class="form-label" for="title">Title</label>
                            <input class="form-control" type="text" name="title" id="title">
                        </div>
                        <div class="mb-2">
                            <label class="form-label" for="status">Status</label>
                            <select class="form-select" type="text" name="status" id="status">
                                <option value="active">active</option>
                                <option value="inactive">inactive</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" form="editServiceForm">Update</button>
                </div>
            </div>
        </div>
    </div>
    @section('js')
        @vite('resources/js/Dashboard/Services/Service/main.js')

    @endsection
@endsection
