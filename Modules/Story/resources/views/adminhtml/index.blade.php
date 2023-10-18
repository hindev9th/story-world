@extends('Home::adminhtml.layouts.app')
@section('content')
    @include('Home::adminhtml.layouts.left-nav')
    @include('Home::adminhtml.layouts.top-nav')
    <div class="content pt-5">
        @if(session()->has('message'))

            <div class="alert alert-soft-success d-flex align-items-center" role="alert"><span class="fas fa-check-circle text-success fs-3 me-3"></span>
                <p class="mb-0 flex-1">{{ session()->get('message') }}</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card shadow-none border border-300 mb-3" id="tableExample1" data-list='{"valueNames":["stt","id","name","author","num-ep","created","updated"],"page":5,"pagination":true}'>
            <div class="card-header p-4 border-bottom border-300 bg-soft">
                <div class="row g-3 justify-content-between align-items-center">
                    <div class="col-12 col-md">
                        <h3 class="text-900 mb-0">Tags</h3>
                    </div>
                    <div class="col-auto">
                        <div class="search-box">
                            <form class="position-relative" data-bs-toggle="search" data-bs-display="static">
                                <input class="form-control form-control-sm search-input search" type="search" placeholder="Search" aria-label="Search">
                                <svg class="svg-inline--fa fa-search fa-w-16 search-box-icon" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path></svg><!-- <span class="fas fa-search search-box-icon"></span> Font Awesome fontawesome.com -->
                            </form>
                        </div>
                    </div>
                    <div class="col col-md-auto">
                        <a href="{{ route('admin.story.create') }}" class="btn btn-phoenix-success btn-sm " type="button"><span class="fa fa-plus"></span><span class="ms-1">New</span></a>
                    </div>
                </div>
            </div>
            <div class="card-body p-0" >
                <div class="p-4 ">
                    <div class="my-4">
                        <div class="table-responsive scrollbar">
                            <table class="table fs--1 mb-0">
                                <thead class="text-900 border-top">
                                <tr>
                                    <th class="sort" data-sort="id">ID</th>
                                    <th class="sort" >Image</th>
                                    <th class="sort" data-sort="name">Name</th>
                                    <th class="sort" data-sort="author">Author</th>
                                    <th class="sort" data-sort="num-ep">Number episode</th>
                                    <th class="sort" data-sort="status">Status</th>
                                    <th class="sort" data-sort="highlights">Highlights</th>
                                    <th class="sort" data-sort="created">Created</th>
                                    <th class="sort" data-sort="updated">Updated</th>
                                    <th class="sort" >Action</th>
                                </tr>
                                </thead>
                                <tbody class="list">
                                @foreach($stories as $story)
                                    <tr>
                                        <td class="id">{{ $story->id }}</td>
                                        <td class="image"><img src="{{ asset('storage/'.$story->image) }}" alt="" width="50" height="80"></td>
                                        <td class="name">{{ $story->name }}</td>
                                        <td class="author">{{ $story->author }}</td>
                                        <td class="num-ep">{{ $story->episodes_count }}</td>
                                        <td class="status">{{ $story->status }}</td>
                                        <td class="highlights">{{ $story->highlights }}</td>
                                        <td class="created">{{ $story->created_at }}</td>
                                        <td class="updated">{{ $story->updated_at }}</td>
                                        <td class="action" style="width: 50px">
                                            <button class="btn btn-link fs--2 text-600 btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal" id="dropdownMenuButton" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                                <svg class="svg-inline--fa fa-ellipsis-h fa-w-16 fs--2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="ellipsis-h" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M328 256c0 39.8-32.2 72-72 72s-72-32.2-72-72 32.2-72 72-72 72 32.2 72 72zm104-72c-39.8 0-72 32.2-72 72s32.2 72 72 72 72-32.2 72-72-32.2-72-72-72zm-352 0c-39.8 0-72 32.2-72 72s32.2 72 72 72 72-32.2 72-72-32.2-72-72-72z"></path></svg>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="{{ route('admin.story.edit',['story' => $story->id]) }}">Edit</a>
                                                {{--                                                <div class="dropdown-divider">--}}
                                                {{--                                                </div>--}}
                                                <a class="dropdown-item text-danger" href="#!" onclick="event.preventDefault();document.getElementById('{{'form-delete-'.$story->id}}').submit();">Remove</a>
                                            </div>
                                        </td>
                                        <form action="{{ route('admin.story.destroy',['story' => $story->id]) }}" id="{{'form-delete-'.$story->id}}" method="post">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row align-items-center mt-3">
                            <div class="pagination d-none">
                                <li class="active">
                                    <button class="page" type="button" data-i="1" data-page="5">1</button>
                                </li>
                                <li>
                                    <button class="page" type="button" data-i="2" data-page="5">2</button>
                                </li>
                                <li>
                                    <button class="page" type="button" data-i="3" data-page="5">3</button>
                                </li>
                            </div>
                            <div class="col">
                                <p class="mb-0 fs--1">
                                    <span class="d-none d-sm-inline-block" data-list-info="">0 to 0 <span
                                            class="text-600"> Items of </span> 0</span>
                                    <span class="d-none d-sm-inline-block">— </span>
                                    <a class="fw-semi-bold" href="#!" data-list-view="*">
                                        View all
                                        <svg class="svg-inline--fa fa-angle-right fa-w-8 ms-1"
                                             data-fa-transform="down-1" aria-hidden="true" focusable="false"
                                             data-prefix="fas" data-icon="angle-right" role="img"
                                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg=""
                                             style="transform-origin: 0.25em 0.5625em;">
                                            <g transform="translate(128 256)">
                                                <g transform="translate(0, 32)  scale(1, 1)  rotate(0 0 0)">
                                                    <path fill="currentColor"
                                                          d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34z"
                                                          transform="translate(-128 -256)"></path>
                                                </g>
                                            </g>
                                        </svg>
                                        <!-- <span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span> Font Awesome fontawesome.com -->
                                    </a><a class="fw-semi-bold d-none" href="#!" data-list-view="less">View Less
                                        <svg class="svg-inline--fa fa-angle-right fa-w-8 ms-1"
                                             data-fa-transform="down-1" aria-hidden="true" focusable="false"
                                             data-prefix="fas" data-icon="angle-right" role="img"
                                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg=""
                                             style="transform-origin: 0.25em 0.5625em;">
                                            <g transform="translate(128 256)">
                                                <g transform="translate(0, 32)  scale(1, 1)  rotate(0 0 0)">
                                                    <path fill="currentColor"
                                                          d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34z"
                                                          transform="translate(-128 -256)"></path>
                                                </g>
                                            </g>
                                        </svg>
                                        <!-- <span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span> Font Awesome fontawesome.com -->
                                    </a>
                                </p>
                            </div>
                            <div class="col-auto d-flex">
                                <button class="btn btn-sm btn-phoenix-primary disabled" type="button"
                                        data-list-pagination="prev" disabled="">
                                    <span>Previous</span>
                                </button>
                                <button class="btn btn-sm btn-phoenix-primary px-4 ms-2" type="button"
                                        data-list-pagination="next">
                                    <span>Next</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
