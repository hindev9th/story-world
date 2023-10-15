@extends('Home::adminhtml.layouts.app')
@section('content')
    @include('Home::adminhtml.layouts.left-nav')
    @include('Home::adminhtml.layouts.top-nav')
    <div class="content pt-5">
        <div class="d-flex justify-content-between">
            <h3>New Tag</h3>
            <div class="action d-flex">
                <button class="btn btn-phoenix-primary me-1 mb-1" type="button" onclick="document.getElementById('save-tag').click();">Save</button>
                <a href="{{ route('admin.tag.index') }}" class="btn btn-phoenix-warning me-1 mb-1" type="button">Cancel</a>
            </div>
        </div>
        <hr class="bg-200 mb-6 mt-4">
        <div>
            <form action="{{ route('admin.tag.store') }}" method="post">
                @csrf
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control @error('name') border-danger @enderror" required placeholder="Name tag">
                @error('name')
                <h6 class="text-danger mt-1">{{$message}}</h6>
                @enderror
                <input type="submit" id="save-tag" class="d-none">
            </form>
        </div>
    </div>
@endsection
