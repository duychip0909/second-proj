@extends('layouts.admin.master')
@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">{{$form_options['title']}}</h5> <small class="text-muted float-end">Default label</small>
        </div>
        <div class="card-body">
            <form action="{{$form_options['action']}}", method="{{$form_options['method']}}">
                @csrf
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{isset($record) ? $record->category : ''}}" name="category" id="basic-default-name" placeholder="Coffee">
                    </div>
                    <div class="row justify-content-end mt-5">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
