<!-- Modal -->
<div wire:ignore.self class="modal fade" id="addbrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Brands</h1>
                <button type="button" class="btn-close" wire:click="closeModel" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="storeBrand">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Select Category</label>
                        <select wire:model.defer="category_id" class="form-control">
                            <option value="">----Select Category----</option>
                            @foreach ($categories as $cateItem)
                            <option value="{{$cateItem->id}}">{{$cateItem->name}}</option>
                            @endforeach
                        </select>
                        @error('category_id') <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Brands name</label>
                        <input type="text" wire:model.defer="name" class="form-control">
                        @error('name') <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Brands Slug</label>
                        <input type="text" wire:model.defer="slug" class="form-control">
                        @error('slug') <small class="text-danger">{{$message}}</small> @enderror

                    </div>
                    <div class="mb-3">
                        <label>Status</label> <br/>
                        <input type="checkbox" wire:model.defer="status"/> Checked=Hidden, Un-Check=Visible
                        @error('status') <small class="text-danger">{{$message}}</small> @enderror

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click="closeModel" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Brand Update Modal -->
<div wire:ignore.self class="modal fade" id="updatebrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Brands</h1>
                <button type="button" class="btn-close" wire:click="closeModel" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div wire:loading class="p-2">
                <div class="spinner-border text-info" role="status">
                    <span class="visually-hidden">Loading...</span>
                  </div> Loading...
            </div>
            <div wire:loading.remove>
                <form wire:submit.prevent="updateBrand">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Select Category</label>
                            <select wire:model.defer="category_id" class="form-control">
                                <option value="">----Select Category----</option>
                                @foreach ($categories as $cateItem)
                                <option value="{{$cateItem->id}}">{{$cateItem->name}}</option>
                                @endforeach
                            </select>
                            @error('category_id') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <div class="mb-3">
                            <label>Brands name</label>
                            <input type="text" wire:model.defer="name" class="form-control">
                            @error('name') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <div class="mb-3">
                            <label>Brands Slug</label>
                            <input type="text" wire:model.defer="slug" class="form-control">
                            @error('slug') <small class="text-danger">{{$message}}</small> @enderror

                        </div>
                        <div class="mb-3">
                            <label>Status</label> <br/>
                            <input type="checkbox" wire:model.defer="status" style="width:70px; height=70px;"/> Checked=Hidden, Un-Check=Visible
                            @error('status') <small class="text-danger">{{$message}}</small> @enderror

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" wire:click="closeModel" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Brand delete Modal -->
<div wire:ignore.self class="modal fade" id="deletebrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Brand</h1>
                <button type="button" wire:click="closeModel" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="destroyBrand">
                <div class="modal-body">
                    <h6>Are you sure want to delete this data ?</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click="closeModel" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit"  class="btn btn-danger">Yes. Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
