@extends('layouts.dashboard')

@section('title', 'Category')

@section('content')

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="d-flex flex-row justify-content-between">
                            <div>
                                <h5 class="mb-0">Add category</h5>
                            </div>
                            <button type="button" class="btn bg-gradient-primary mb-3" data-bs-toggle="modal"
                                data-bs-target="#modal-form">ADD (+)</button>
                            <div class="modal fade" id="modal-form" tabindex="-1" role="dialog"
                                aria-labelledby="modal-form" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body p-0">
                                            <div class="card card-plain">
                                                <div class="card-header pb-0 text-left">
                                                    <h3 class="font-weight-bolder text-primary text-gradient">Add New
                                                        category</h3>
                                                </div>
                                                <div class="card-body">
                                                    <form role="form text-left" method="POST"
                                                        action="{{ route('category.create') }}"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <label>Name of Category</label>
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control"
                                                                placeholder="Name of Category" aria-label="Title"
                                                                aria-describedby="email-addon" name="name">
                                                        </div>
                                                        <div class="text-center">
                                                            <button type="submit"
                                                                class="btn btn-round bg-gradient-primary btn-lg w-100 mt-4 mb-0">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Name</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Action</th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($category['category'] as $item)
                                        <tr>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0 ">{{ $item['name']}}</p>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

    @endsection
