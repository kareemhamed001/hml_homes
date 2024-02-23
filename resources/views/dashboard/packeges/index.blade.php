@extends('dashboard.layout.dashboard')
@section('title', 'Packages')
@section('content')

    @section('breadcrumb')
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>

                <li class="breadcrumb-item active">Packages</li>
            </ol>
        </nav>
    @endsection




    <div class="">
        <div class="d-flex px-2">
            <h3 class="heading p-0">Packages</h3>

        </div>

    </div>

    <div id="packagesContainer" class="d-flex flex-wrap m-0">

    </div>
    <div class=" overflow-auto my-1 d-flex justify-content-center w-100" id="pagination">

    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Package</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="addPackageForm">
                        <div class="mb-2">
                            <label class="form-label" for="name">Name</label>
                            <input class="form-control" type="text" name="name" id="name">
                        </div>
                        <div class="mb-2">
                            <label class="form-label" for="description">Description</label>
                            <textarea class="form-control" name="description" id="description"></textarea>
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
                    <button class="btn btn-primary" form="addPackageForm">Add</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade " id="editPackageModal" tabindex="-1" aria-labelledby="editPackageModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Package</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="editPackageForm">

                        <input type="hidden" name="id" id="id">
                        <div class="mb-2">
                            <label class="form-label" for="name">Name</label>
                            <input class="form-control" type="text" name="name" id="name">
                        </div>
                        <div class="mb-2">
                            <label class="form-label" for="description">Description</label>
                            <textarea class="form-control" name="description" id="description"></textarea>
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
                    <button class="btn btn-primary" form="editPackageForm">Update</button>
                </div>
            </div>
        </div>
    </div>
    @section('js')
        @vite('resources/js/Dashboard/Services/Package/main.js')
    @endsection
@endsection
