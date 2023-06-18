@extends('layouts.dashboard')

@section('title', 'Portofolio')
@section('portofolio', 'active')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <div class="d-flex flex-row justify-content-between">
                <div>
                    <h5 class="mb-0">Add Portofolio</h5>
                </div>
                <button type="button" class="btn bg-gradient-primary mb-3" data-bs-toggle="modal"
                    data-bs-target="#modal-form">Add New</button>
                <div class="modal fade" id="modal-form" tabindex="-1" role="dialog"
                    aria-labelledby="modal-form" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                        <div class="modal-content">
                            <div class="modal-body p-0">
                                <div class="card card-plain">
                                    <div class="card-header pb-0 text-left">
                                        <h3 class="font-weight-bolder text-primary text-gradient">Add New
                                            Portofolio</h3>
                                    </div>
                                    <div class="card-body">
                                        <form role="form text-left" method="POST"
                                            action="{{route('portofolio.create')}}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <label>Title</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="Title"
                                                    aria-label="Title" aria-describedby="email-addon"
                                                    name="title">
                                            </div>
                                            <label>Description</label>
                                            <div class="input-group mb-3">
                                                <textarea class="form-control" placeholder="Description" aria-label="Description" aria-describedby="password-addon"
                                                    name="description"></textarea>
                                            </div>
                                            <label>Upload Image</label>
                                            <div class="input-group mb-3">
                                                <input type="file" class="form-control"
                                                    placeholder="Upload Image" aria-label="Upload Image"
                                                    aria-describedby="password-addon" name="image">
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Category</label>
                                                <select class="form-control" id="exampleFormControlSelect1">
                                                        @foreach ($category as $item)
                                                        <option>
                                                            {{ $item['name']}}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit"
                                                    class="btn btn-round bg-gradient-primary btn-lg w-100 mt-4 mb-0">Submit</button>
                                            </div>
                                            </p>
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
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Title</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Description</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">category</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Image</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                    <th class="text-secondary opacity-7"></th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($portofolio as $item)
                    <tr>
                        <td class="text-center">
                            <p class="text-xs font-weight-bold mb-0 ">{{ $item['title']}}</p>
                        </td>
                        <td class="text-center">
                            <p class="text-xs font-weight-bold mb-0">{{ $item['description'] }}</p>
                        </td>
                        <td class="text-center">
                            <p class="text-xs font-weight-bold mb-0">{{ $item['category_id'] }}</p>
                        </td>
                        <td class="text-center">
                            <img src="{{ asset('images/' . $item['image']) }}" alt="image" class="img-fluid rounded shadow" style="width: 100px">
                        </td>

                        <td class="text-center">
                            <button type="button" class="btn bg-gradient-info" data-bs-toggle="modal"
                                data-bs-target="#modal-form-edit-{{ $item['id'] }}">Edit

                            </button>
                            <div class="modal fade" id="modal-form-edit-{{ $item['id'] }}"
                                tabindex="-1" role="dialog" aria-labelledby="modal-form"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-md"
                                    role="document">
                                    <div class="modal-content">
                                        <div class="modal-body p-0">
                                            <div class="card card-plain">
                                                <div class="card-header pb-0 text-left">
                                                    <h3
                                                        class="text-left font-weight-bolder text-info text-gradient">
                                                        Edit Portofolio</h3>
                                                </div>
                                                <div class="card-body">
                                                    <form role="form text-left" method="POST"
                                                        action="{{ route('portofolio.edit', $item['id']) }}"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <label>Title</label>
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control"
                                                                placeholder="Title" aria-label="Title"
                                                                aria-describedby="email-addon"
                                                                name="title"
                                                                value="{{ $item['title'] }}">
                                                        </div>
                                                        <label>Description</label>
                                                        <div class="input-group mb-3">
                                                            <textarea class="form-control" placeholder="Description" aria-label="Description" aria-describedby="password-addon"
                                                                name="description" value="{{ $item['description'] }}"></textarea>
                                                        </div>
                                                        <label>Upload Image</label>
                                                        <div class="input-group mb-3">
                                                            <input type="file" class="form-control"
                                                                placeholder="Upload Image"
                                                                aria-label="Upload Image"
                                                                aria-describedby="password-addon"
                                                                name="image"
                                                                value="{{ $item['image'] }}">
                                                        </div>
                                                        <div class="text-center">
                                                            <button type="submit"
                                                                class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0">Submit Edit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <span>
                                <button type="button" class="btn bg-gradient-danger mb-3"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modal-form-delete-{{ $item['id'] }}">Delete</button>
                                <div class="modal fade" id="modal-form-delete-{{ $item['id'] }}"
                                    tabindex="-1" role="dialog"
                                    aria-labelledby="modal-notification" aria-hidden="true">
                                    <div class="modal-dialog modal-danger modal-dialog-centered modal-"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title"
                                                    id="modal-form-delete-{{ $item['id'] }}">delete
                                                    {{ $item['title'] }}</h6>
                                                <button type="button" class="btn-close text-dark"
                                                    data-bs-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="py-3 text-center">
                                                    <i class="ni ni-bell-55 ni-3x"></i>
                                                    <h4 class="text-gradient text-danger mt-4">You
                                                        should Delete this!</h4>
                                                </div>
                                            </div>
                                            <form action="{{ route('portofolio.delete', $item['id']) }}"
                                                method="GET">
                                                @csrf
                                                <div class="modal-footer">
                                                    <button type="submit"
                                                        class="btn bg-gradient-warning">Ok,
                                                        Got it</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </span>
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
