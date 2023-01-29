<div class="card">
    <div class="d-flex align-items-center justify-content-between p-4">
        <h5 class="card-header p-0">Coffee Beans Manage</h5>
        <button type="button" class="btn btn-icon btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#bean-add">
            <i class="bx bx-plus"></i>
        </button>
    </div>
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
<div class="modal fade" id="bean-add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Coffee bean add form</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('coffee-beans.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Bean name</label>
                        <input type="text" class="form-control" name="bean" id="basic-default-fullname" placeholder="...">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-company">Bean image</label>
                        <input type="file" accept="image/*" class="form-control" name="image" id="basic-default-company" placeholder="ACME Inc.">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-email">Bean description</label>
                        <div class="input-group input-group-merge">
                            <input type="text" id="basic-default-email" name="description" class="form-control" placeholder="..." aria-label="john.doe" aria-describedby="basic-default-email2">
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
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
