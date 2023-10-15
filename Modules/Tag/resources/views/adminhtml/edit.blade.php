@extends('Home::adminhtml.layouts.app')
@section('content')
    @include('Home::adminhtml.layouts.left-nav')
    @include('Home::adminhtml.layouts.top-nav')
    <div class="content pt-5">
        <div class="d-flex justify-content-between">
            <h3>Edit Tag</h3>
            <div class="action d-flex">
                <button class="btn btn-phoenix-primary me-1 mb-1" type="button" onclick="document.getElementById('save-tag').click();">Save</button>
                <button class="btn btn-phoenix-danger me-1 mb-1" type="button" data-bs-toggle="modal" data-bs-target="#deleteTag">Delete</button>
                <a href="{{ route('admin.tag.index') }}" class="btn btn-phoenix-warning me-1 mb-1" type="button">Cancel</a>
            </div>
        </div>
        <hr class="bg-200 mb-6 mt-4">
        <div>
            <form action="{{ route('admin.tag.update',['tag' => $tag->name]) }}" method="post">
                @method('PATCH')
                @csrf
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control @error('name') border-danger @enderror" required placeholder="Name tag" value="{{ $tag->name }}">
                @error('name')
                    <h6 class="text-danger mt-1">{{$message}}</h6>
                @enderror
                <input type="submit" id="save-tag" class="d-none">
            </form>
        </div>
    </div>
    <div class="modal fade " id="deleteTag" tabindex="-1" aria-labelledby="deleteTagModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteTagModalLabel">Delete tag</h5>
                    <button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <svg class="svg-inline--fa fa-times fa-w-11 fs--1" aria-hidden="true" focusable="false"
                             data-prefix="fas" data-icon="times" role="img" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 352 512" data-fa-i2svg="">
                            <path fill="currentColor"
                                  d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"></path>
                        </svg><!-- <span class="fas fa-times fs--1"></span> Font Awesome fontawesome.com --></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure to delete this tag?</p>
                    <form action="{{ route('admin.tag.destroy',['tag' => $tag->name]) }}" id="form-tag" method="post">
                        @method('DELETE')
                        @csrf
                        <button id="btn-action-form" class="d-none"></button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" onclick="document.getElementById('btn-action-form').click();">Yes</button>
                    <button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
@endsection
