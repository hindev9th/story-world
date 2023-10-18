@extends('Home::adminhtml.layouts.app')
@section('content')
    @include('Home::adminhtml.layouts.left-nav')
    @include('Home::adminhtml.layouts.top-nav')
    <div class="content pt-5">
        <div class="d-flex justify-content-between">
            <h3>Edit Story</h3>
            <div class="action d-flex">
                <button class="btn btn-phoenix-primary me-1 mb-1" type="button" onclick="document.getElementById('save-story').click();">Save</button>
                <button class="btn btn-phoenix-danger me-1 mb-1" type="button" data-bs-toggle="modal" data-bs-target="#deleteTag">Delete</button>
                <a href="{{ route('admin.story.index') }}" class="btn btn-phoenix-warning me-1 mb-1" type="button">Cancel</a>
            </div>
        </div>
        <hr class="bg-200 mb-6 mt-4">
        <div>
            <div class="text-center">
                <img src="{{ asset('storage/'.$story->image) }}" alt="image preview" width="200" height="300" id="img-preview" class="rounded">
            </div>
            <form action="{{ route('admin.story.update',['story' => $story->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="mb-3">
                    <label class="form-label" for="image">Image</label>
                    <input class="form-control" name="image" id="image" type="file" accept="image/*" />
                    @error('image')
                    <h6 class="text-danger mt-1">{{$message}}</h6>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') border-danger @enderror" value="{{ $story->name }}" required placeholder="Name story">
                    @error('name')
                    <h6 class="text-danger mt-1">{{$message}}</h6>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="author" class="form-label">Author</label>
                    <input type="text" name="author" id="author" class="form-control @error('author') border-danger @enderror" value="{{ $story->author }}" placeholder="Name author">
                    @error('author')
                    <h6 class="text-danger mt-1">{{$message}}</h6>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <input type="text" name="status" id="status" class="form-control @error('status') border-danger @enderror" value="{{ $story->status }}" placeholder="Status">
                    @error('status')
                    <h6 class="text-danger mt-1">{{$message}}</h6>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="tags" class="form-label">Tags</label>
                    <select class="form-select" id="tags" name="tags[]" multiple="multiple">
                        <option value="">Select tag...</option>
                        @foreach($tags as $tag)
                             <option value="{{ $tag->id }}" @if(in_array($tag->id,$tagIds)) selected @endif>{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 form-check form-switch">
                    <label for="highlights" class="form-check-label">Highlights</label>
                    <input type="checkbox" name="highlights" id="highlights" @if($story->highlights) checked @endif class="form-check-input @error('highlights')  border-danger @enderror" value="1">
                    @error('highlights')
                    <h6 class="text-danger mt-1">{{$message}}</h6>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" class="form-control @error('description') border-danger @enderror" rows="3" placeholder="Description">{{ $story->description }}</textarea>
                    @error('description')
                    <h6 class="text-danger mt-1">{{$message}}</h6>
                    @enderror
                </div>


                <input type="submit" id="save-story" class="d-none">
            </form>
        </div>
    </div>
    <div class="modal fade " id="deleteTag" tabindex="-1" aria-labelledby="deleteTagModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteTagModalLabel">Delete story</h5>
                    <button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <svg class="svg-inline--fa fa-times fa-w-11 fs--1" aria-hidden="true" focusable="false"
                             data-prefix="fas" data-icon="times" role="img" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 352 512" data-fa-i2svg="">
                            <path fill="currentColor"
                                  d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"></path>
                        </svg><!-- <span class="fas fa-times fs--1"></span> Font Awesome fontawesome.com --></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure to delete this story?</p>
                    <form action="{{ route('admin.story.destroy',['story' => $story->id]) }}" id="form-tag" method="post">
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
    <script>
        const image = document.getElementById('image');
        const img = document.getElementById('img-preview');
        let oldImg;

        image.onchange = (e) => {
            URL.revokeObjectURL(oldImg);
            let file = image.files[0];
            let imgView = URL.createObjectURL(file);
            oldImg = imgView;
            img.setAttribute('src',imgView);
        }

        let multipleCancelButton1 = new Choices('#tags', {
            removeItemButton: true,
        });
    </script>
@endsection
