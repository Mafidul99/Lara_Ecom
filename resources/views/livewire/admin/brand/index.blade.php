<div>
    @include('livewire.admin.brand.modal-form')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>
                        Brands List
                        <a href="#" class="btn btn-primary float-end btn-sm" data-bs-toggle="modal" data-bs-target="#addbrandModal">Add Brand</a>
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($brands as $brand)
                                <tr>
                                    <td>{{ $brand->id }}</td>
                                    <td>{{ $brand->name }}</td>
                                    <td>{{ $brand->slug }}</td>
                                    <td>{{ $brand->status == '1' ? 'hidden':'visible' }}</td>
                                    <td>
                                        <a href="#" wire:click="editBrand({{$brand->id}})"
                                            data-bs-toggle="modal" data-bs-target="#updatebrandModal"
                                            class="btn btn-success btn-sm">Edit</a>
                                        <a href="#" wire:click="deleteBrand({{$brand->id}})"
                                            data-bs-toggle="modal" data-bs-target="#deletebrandModal"
                                            class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5">No Brands Found</td>
                                </tr>
                                @endforelse
                        </tbody>
                    </table>

                    <div>
                        {{ $brands->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
<script>
    window.addEventListener('close-modal', event => {
        $('#addbrandModal').modal('hide');
        $('#updatebrandModal').modal('hide');
        $('#deletebrandModal').modal('hide');
    });
</script>
@endpush
