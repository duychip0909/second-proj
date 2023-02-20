@extends('layouts.admin.master')
@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">{{$form_options['title']}}</h5> <small class="text-muted float-end">Default label</small>
        </div>
        <div class="card-body">
            <form action="{{$form_options['action']}}" method="{{$form_options['method']}}" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">Thumbnail</label>
                    <div class="col-sm-10">
                        <input type="file" name="filepond" class="my-pond" id="basic-default-name" placeholder="John Doe">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">Title</label>
                    <div class="col-sm-10">
                        <input type="text" name="title" class="form-control" id="basic-default-name" placeholder="John Doe">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-company">Author</label>
                    <div class="col-sm-10">
                        <input type="text" name="author" class="form-control" id="basic-default-company" placeholder="ACME Inc.">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-email">News source</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <input type="text" name="news-source" id="basic-default-email" class="form-control" placeholder="john.doe" aria-label="john.doe" aria-describedby="basic-default-email2">
                        </div>
                        <div class="form-text"> You can use letters, numbers &amp; periods </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-phone">Link news source</label>
                    <div class="col-sm-10">
                        <input type="text" name="link-news-source" id="basic-default-phone" class="form-control phone-mask" placeholder="658 799 8941" aria-label="658 799 8941" aria-describedby="basic-default-phone">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-message">Content</label>
                    <div class="col-sm-10">
                        <textarea id="TinyMCE" name="detail" class="form-control" placeholder="Hi, Do you have a moment to talk...?" aria-label="Hi, Do you have a moment to talk...?" aria-describedby="basic-icon-default-message2"></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-phone">Category</label>
                    <div class="col-sm-10">
                        <select name="category_id" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->category}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row justify-content-end">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('customScript')
    <!-- include FilePond library -->
    <script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>

    <!-- include FilePond plugins -->
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.js"></script>

    <!-- include FilePond jQuery adapter -->
    <script src="https://unpkg.com/jquery-filepond/filepond.jquery.js"></script>
    <script>
        $('.my-pond').filepond({
            allowMultiple: true,
        });
    </script>
    <script>
        tinymce.init({
            selector: '#TinyMCE',
            toolbar1: "undo redo | advlist bold italic underline textcolor backcolor forecolor | outdent indent alignleft aligncenter alignright | image link unlink codesample code | preview",
            language: 'vi_VN',
            menubar: true,
            height: 700,
            plugins: 'advlist link image lists code preview textcolor codesample',
        });
    </script>
@endsection
