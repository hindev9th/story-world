@extends('frontend.layouts.app')

@section('content')
    @include('Home::frontend.layouts.slider')
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    @include('Home::frontend.layouts.product',['title' => 'NEW UPDATE'])
                </div>
                @include('Home::frontend.layouts.slibar')
            </div>
        </div>
    </section>
@endsection
