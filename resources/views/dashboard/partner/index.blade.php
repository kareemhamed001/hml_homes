@extends('dashboard.layout.dashboard')
@section('title', 'Partners')
@section('content')
    <div class="">
        <div class="d-flex px-2">
            <h3 class="heading p-0 ">Partners</h3>

        </div>
    </div>
    <div class="d-flex flex-wrap m-0">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th >Icon</th>
                <th >Name</th>
                <th >Link</th>
                <th >Status</th>
                <th >Action</th>
            </tr>
            </thead>
            <tbody id="partnersContainer">
            </tbody>

        </table>
        <button class="btn text-secondary fs-20"  data-bs-toggle="modal" data-bs-target="#exampleModal">
            <svg width="31" height="39" viewBox="0 0 31 39" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M15.5 8.8453V30.3269" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M23.9375 19.5861H7.0625" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            Add New Partner
        </button>
        <div class=" overflow-auto d-flex justify-content-center w-100" id="partnersPagination">

        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Partner</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="addPartnerForm">
                        <div class="mb-2">
                            <label class="form-label" for="name">Cover Image</label>
                            <input class="form-control" type="file" name="cover_image" id="cover_image"  accept="image/png, image/svg+xml,image/x-icon">
                        </div>
                        <div class="mb-2">
                            <label class="form-label" for="name">Name</label>
                            <input class="form-control" type="text" name="name" id="name">
                        </div>
                        <div class="mb-2">
                            <label class="form-label" for="description">Description</label>
                            <input class="form-control" type="text" name="description" id="description">
                        </div>
                        <div class="mb-2">
                            <label class="form-label" for="link">Link</label>
                            <input class="form-control" type="text" name="link" id="link">
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
                    <button class="btn btn-primary" form="addPartnerForm">Add</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade " id="editPartnerModal" tabindex="-1" aria-labelledby="editPartnerModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Partner</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="editPartnerForm">

                        <input type="hidden" name="id" id="id">
                        <div class="mb-2">
                            <label class="form-label" for="name">Cover Image</label>
                            <input class="form-control" type="file" name="cover_image" id="cover_image"  accept="image/png, image/svg+xml,image/x-icon">
                        </div>
                        <div class="mb-2">
                            <label class="form-label" for="name">Name</label>
                            <input class="form-control" type="text" name="name" id="name">
                        </div>
                        <div class="mb-2">
                            <label class="form-label" for="description">Description</label>
                            <input class="form-control" type="text" name="description" id="description">
                        </div>
                        <div class="mb-2">
                            <label class="form-label" for="link">Link</label>
                            <input class="form-control" type="text" name="link" id="link">
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
                    <button class="btn btn-primary" form="editPartnerForm">Update</button>
                </div>
            </div>
        </div>
    </div>
    @section('js')
        @vite(['resources/js/Dashboard/Services/Partner/main.js'])

    @endsection
@endsection
