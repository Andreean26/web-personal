@extends('layouts.dashboard')

@section('title', 'Dashboard')
@section('dashboard, active')

@section('content')
<div class="container-fluid py-4">
    <div class="col-md-4">
        <div class="card card-profile card-plain">
          <div class="card-body text-center bg-white shadow border-radius-lg p-3">
            {{-- @foreach ( as )

            @endforeach --}}
            <a href="javascript:;">
              <img class="w-100 border-radius-md" src="./assets/img/kit/pro/anastasia.jpg">
            </a>
            <h5 class="mt-3 mb-1 d-md-block d-none">Natalie Paisley</h5>
            <p class="mb-1 d-md-none d-block text-sm font-weight-bold text-darker">Natalie Paisley</p>
            <p class="mb-0 text-xs font-weight-bolder text-warning text-gradient text-uppercase">Credit Analyst</p>
          </div>
        </div>
      </div>
  </div>
@endsection



