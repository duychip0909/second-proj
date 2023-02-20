@extends('layouts.admin.master')
@section('content')
    <div class="card">
        <h5 class="card-header">Story Category Table</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Category Name</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                @foreach($records as $record)
                    <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$record->id}}</strong></td>
                        <td>{{$record->category}}</td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{route('story-category.edit', ['id' => $record->id])}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                    <a class="dropdown-item" href="{{route('story-category.delete', ['id' => $record->id])}}"><i class="bx bx-trash me-1"></i> Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
