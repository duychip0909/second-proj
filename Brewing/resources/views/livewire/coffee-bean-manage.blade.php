<div class="card">
    <h5 class="card-header">Coffee Beans Manage</h5>
    <div class="p-4">
        <div class="row mb-5">
            @foreach($beans as $bean)
                <div class="col-md-6">
                    <div class="card bg-dark border-0 text-white coffee-bean">
                        <img class="card-img" src="{{$bean->image}}" alt="Card image">
                        <div class="card-img-overlay">
                            <h5 class="card-title text-white">{{$bean->bean}}</h5>
                            <p class="card-text">
                                {{$bean->description}}
                            </p>
                            <p class="card-text">Last updated {{$bean->updated_at}}</p>
                        </div>
                        <div class="position-absolute action-group">
                            <button type="button" class="btn btn-icon btn-outline-light mx-2">
                                <i class="bx bx-edit"></i>
                            </button>
                            <button type="button" wire:click="deleteConfirm({{$bean->id}})" class="btn btn-icon btn-outline-danger mx-2">
                                <i class="bx bx-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@section('customScript')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        window.addEventListener('showDeleteConfirmPopup', () => {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('delete');
                }
            })
        });

        window.addEventListener('deleted', () => {
            Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
            )
        });
    </script>
@endsection
