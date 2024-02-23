@extends('dashboard.layout.dashboard')
@section('title', 'Feedbacks')
@section('content')

    @section('breadcrumb')
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard.web.index')}}">Dashboard</a></li>

                <li class="breadcrumb-item active">Feedbacks</li>
            </ol>
        </nav>
    @endsection



    <div class="">
        <div class="d-flex px-2">
            <h3 class="heading p-0 ">Feedbacks</h3>

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

    <div class="d-flex flex-wrap m-0">
        <table class="table table-bordered" style="table-layout: fixed">
            <thead>
            <tr>
                <th style="width:10%;">Icon</th>
                <th style="width:20%;">User Name</th>
                <th style="width:40%;">Comment</th>
                <th style="width:20%;">Rate</th>
                <th style="width:10%;">Status</th>
                <th style="width:25%;">Action</th>
            </tr>
            </thead>
            <tbody id="feedbacksContainer">
            </tbody>

        </table>
        <button class="btn text-secondary fs-20"  data-bs-toggle="modal" data-bs-target="#exampleModal">
            <svg width="31" height="39" viewBox="0 0 31 39" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M15.5 8.8453V30.3269" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M23.9375 19.5861H7.0625" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            Add New Feedback
        </button>
        <div class=" overflow-auto d-flex justify-content-center w-100" id="feedbacksPagination">

        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Feedback</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="addFeedbackForm">
                        <div class="mb-2">
                            <label class="form-label" for="name">User Image</label>
                            <input class="form-control" type="file" name="user_image" id="cover_image"  accept="image/*">
                        </div>
                        <div class="mb-2">
                            <label class="form-label" for="title">User Name</label>
                            <input class="form-control" type="text" name="user_name" id="title">
                        </div>
                        <div class="mb-2">
                            <label class="form-label" for="comment">Comment</label>
                            <input class="form-control" type="text" name="comment" id="comment">
                        </div>
                        <div class="mb-2">
                            <label class="form-label" for="rate">Rate</label>
                            <select class="form-select" type="text" name="rate" id="rate">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
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
                    <button class="btn btn-primary" form="addFeedbackForm">Add</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade " id="editFeedbackModal" tabindex="-1" aria-labelledby="editFeedbackModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Feedback</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="editFeedbackForm">

                        <input type="hidden" name="id" id="id">
                        <div class="mb-2">
                            <label class="form-label" for="name">User Image</label>
                            <input class="form-control" type="file" name="user_image" id="cover_image"  accept="image/*">
                        </div>
                        <div class="mb-2">
                            <label class="form-label" for="title">User Name</label>
                            <input class="form-control" type="text" name="user_name" id="title">
                        </div>
                        <div class="mb-2">
                            <label class="form-label" for="comment">Comment</label>
                            <input class="form-control" type="text" name="comment" id="comment">
                        </div>
                        <div class="mb-2">
                            <label class="form-label" for="rate">Rate</label>
                            <select class="form-select" type="text" name="rate" id="rate">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
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
                    <button class="btn btn-primary" form="editFeedbackForm">Update</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addCoverModal" tabindex="-1" aria-labelledby="addCoverModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Cover</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="addCoverForm">
                        <div class="mb-2">
                            <label class="form-label" for="image">Image</label>
                            <input class="form-control" type="file" name="image" id="image">
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
                    <button class="btn btn-primary" form="addCoverForm">Add</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade " id="editCoverModal" tabindex="-1" aria-labelledby="editCoverModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Cover</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="editCoverForm">

                        <input type="hidden" name="id" id="id">
                        <div class="mb-2">
                            <label class="form-label" for="image">Image</label>
                            <input class="form-control" type="file" name="image" id="image">
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
                    <button class="btn btn-primary" form="editCoverForm">Update</button>
                </div>
            </div>
        </div>
    </div>
    @section('js')
        @vite(['resources/js/Dashboard/Services/Feedback/main.js'])

    @endsection
@endsection
