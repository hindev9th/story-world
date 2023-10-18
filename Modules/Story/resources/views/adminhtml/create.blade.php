@extends('Home::adminhtml.layouts.app')
@section('content')
    @include('Home::adminhtml.layouts.left-nav')
    @include('Home::adminhtml.layouts.top-nav')
    <div class="content pt-5">
        <div class="d-flex justify-content-between">
            <h3>New Story</h3>
            <div class="action d-flex">
                <button class="btn btn-phoenix-primary me-1 mb-1" type="button" onclick="document.getElementById('save-story').click();">Save</button>
                <a href="{{ route('admin.story.index') }}" class="btn btn-phoenix-warning me-1 mb-1" type="button">Cancel</a>
            </div>
        </div>
        <hr class="bg-200 mb-6 mt-4">
        <div>
            <div class="text-center">
                <img src="" alt="image preview" width="200" height="300" id="img-preview" class="rounded">
            </div>
            <form action="{{ route('admin.story.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="image">Image</label>
                    <input class="form-control" name="image" id="image" type="file" accept="image/*" required/>
                    @error('image')
                        <h6 class="text-danger mt-1">{{$message}}</h6>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') border-danger @enderror" value="{{ old('name') }}" required placeholder="Name story">
                    @error('name')
                        <h6 class="text-danger mt-1">{{$message}}</h6>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="author" class="form-label">Author</label>
                    <input type="text" name="author" id="author" class="form-control @error('author') border-danger @enderror" value="{{ old('author') }}" placeholder="Name author">
                    @error('author')
                        <h6 class="text-danger mt-1">{{$message}}</h6>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <input type="text" name="status" id="status" class="form-control @error('status') border-danger @enderror" value="{{ old('status') }}" placeholder="Status">
                    @error('status')
                    <h6 class="text-danger mt-1">{{$message}}</h6>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="tags" class="form-label">Tags</label>
                    <select class="form-select" id="tags" name="tags[]" multiple="multiple">
                        <option value="">Select tag...</option>
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 form-check form-switch">
                    <label for="highlights" class="form-check-label">Highlights</label>
                    <input type="checkbox" name="highlights" id="highlights" class="form-check-input @error('highlights')  border-danger @enderror" value="1">
                    @error('highlights')
                    <h6 class="text-danger mt-1">{{$message}}</h6>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" class="form-control @error('description') border-danger @enderror" rows="3" placeholder="Description">{{ old('description') }}</textarea>
                    @error('description')
                    <h6 class="text-danger mt-1">{{$message}}</h6>
                    @enderror
                </div>


                <input type="submit" id="save-story" class="d-none">
            </form>
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
