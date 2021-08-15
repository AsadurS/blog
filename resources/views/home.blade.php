@extends('layouts.app')

{{-- @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2" style="background-color:#010101; margin:0; padding:
            0; width:100%; margin-top:-22px; min-height: 100vh">
                <h3 style="color: #fff; background: gray;" class="text-center py-4 mb-5">Dashboard</h3>
                <ul class="sidebar">
                    <li style="list-style-type:none;"><a style="color:#fff; font-size:22px;" href="{{ route('category.manage') }}">Category</a></li>
                    <li style="list-style-type:none;"><a style="color:#fff; font-size:22px;" href="{{ route('post.manage') }}">Post</a></li>
                </ul>
            </div>
            <div class="col-md-10">
                @yield('mainContent')
            </div>
        </div>
    </div>
@endsection

