@extends('Home::adminhtml.layouts.app')
@section('content')
    <div class="container">
        <div class="row flex-center min-vh-100 py-5">
            <div class="col-sm-10 col-md-8 col-lg-5 col-xxl-4">
                <div class="text-center mb-6">
                    <h4>Come back soon!</h4>
                    <p class="text-700">Thanks for using Falcon. You are now successfully signed out.</p>
                </div>
                <a class="btn btn-primary w-100" href="{{ route('admin.login') }}">
                    <span class="fas fa-angle-left me-2"></span>
                    Go to sign in page
                </a>
            </div>
        </div>
    </div>
@endsection
