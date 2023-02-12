<div class="card">
    <h5 class="card-header">Coffee Manage</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead class="">
            <tr>
                <th>Coffee name</th>
                <th>Coffee description</th>
                <th>Coffee price</th>
                <th>Coffee image</th>
                <th>Coffee bean</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody class="table-border-bottom-0">
            @foreach($coffees as $coffee)
                <tr>
                    <td><strong>{{$coffee->name}}</strong></td>
                    <td class="text-wrap">{{$coffee->description}}</td>
                    <td>{{number_format($coffee->price)}}</td>
                    <td>
                        <div class="coffee-img">
                            <img src="{{$coffee->image}}" alt="">
                        </div>
                    </td>
                    <td>{{$coffee->beans->bean}}</td>
                    <td>
                        <div class="form-check form-switch m-0">
                            <input class="form-check-input coffeeStatus" {{$coffee->status == 1 ? 'checked' : ''}} data-action="{{route('coffee.status', ['id' => $coffee->id])}}" type="checkbox">
                        </div>
                    </td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-vertical-rounded"></i></button>
                            <div class="dropdown-menu" style="">
                                <a class="dropdown-item" href="{{route('coffee.form-edit', ['id' => $coffee->id])}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                <button class="dropdown-item" wire:click="deleteConfirm({{$coffee->id}})" type="button"><i class="bx bx-trash me-1"></i> Delete</button>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@section('customScript')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        window.addEventListener('showDeleteConfirm', function() {
            Swal.fire({
                title: 'Are you sure delete this?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#696cff',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('delete');
                }
            })
        })

        window.addEventListener('deleted', () => {
            Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
            )
        })

        $(document).ready(function() {
            $.ajaxSetup({
                headers:
                    { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            });

            $('.coffeeStatus').on('change', function() {
                let btn = $(this);
                console.log(btn.data('action'));
                $.post(btn.data('action'));
            })
        });
    </script>
@endsection
