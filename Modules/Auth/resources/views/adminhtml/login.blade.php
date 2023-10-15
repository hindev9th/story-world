@extends('Home::adminhtml.layouts.app')
@section('content')
    <div class="container">
        <form action="{{ route('admin.login.login') }}" method="post">

            <div class="row flex-center min-vh-100 py-5">
                <div class="col-sm-10 col-md-8 col-lg-5 col-xl-5 col-xxl-3">
                    <div class="text-center mb-7">
                        <h3>Sign In</h3>
                        <p class="text-700">Get access to your account</p>
                    </div>
                    @csrf
                    <div class="mb-3 text-start">
                        <label class="form-label" for="email">Email address</label>
                        <div class="form-icon-container">
                            <input class="form-control form-icon-input" id="email" name="email" type="email"
                                   placeholder="name@example.com">
                            <span class="fas fa-user text-900 fs--1 form-icon"></span>
                        </div>
                    </div>
                    <div class="mb-3 text-start">
                        <label class="form-label" for="password">Password</label>
                        <div class="form-icon-container">
                            <input class="form-control form-icon-input" name="password" type="password"
                                   placeholder="Password">
                            <span class="fas fa-user text-900 fs--1 form-icon"></span>
                        </div>
                    </div>

                    <button class="btn btn-primary w-100 mb-3">Sign In</button>
                </div>
            </div>
        </form>

    </div>
@endsection


