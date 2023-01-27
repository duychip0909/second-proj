@extends('layouts.admin.master')
@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Form add coffee</h5> <small class="text-muted float-end">Default label</small>
        </div>
        <div class="card-body">
            <form method="post" action="{{route('coffee.update', ['id' => $coffee->id])}}" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">Coffee name</label>
                    <div class="col-sm-10">
                        <input type="text" value="{{$coffee->name}}" class="form-control" name="name" id="basic-default-name" placeholder="...">
                        @error('name')
                        <p class="text-danger m-0">*{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-company">Coffee description</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{$coffee->description}}" name="description" id="basic-default-company" placeholder="...">
                        @error('description')
                        <p class="text-danger m-0">*{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-company">Coffee price</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{$coffee->price}}" name="price" id="basic-default-company" placeholder="...">
                        @error('price')
                        <p class="text-danger m-0">*{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-phone">Image</label>
                    <div class="col-sm-10">
                        <input type="file" value="C:\Users\Admin\Documents\test.txt" accept="image/*" id="img-input" name="image" class="form-control phone-mask" placeholder="..." aria-label="658 799 8941" aria-describedby="basic-default-phone">
                        @error('image')
                        <p class="text-danger m-0">*{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="img-preview rounded my-2 mx-auto border">
                    <img src="{{$coffee->image}}" id="img-preview" class="block mx-auto d-block" alt="">
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-message">Bean</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <label class="input-group-text" for="inputGroupSelect01">Bean Options</label>
                            <select class="form-select" name="bean_id" id="inputGroupSelect01">
                                @foreach($beans as $bean)
                                    <option value="{{$bean->id}}">{{$bean->bean}}</option>
                                @endforeach
                            </select>
                            @error('bean_id')
                            <p class="text-danger m-0">*{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                </div>
                <div class="row justify-content-end">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('customScript')
    <script>
        const input = document.getElementById('img-input');
        const image = document.getElementById('img-preview');
        input.addEventListener('change', (e) => {
            if (e.target.files.length) {
                const src = URL.createObjectURL(e.target.files[0]);
                image.src = src;
            }
        });
    </script>
@endsection
