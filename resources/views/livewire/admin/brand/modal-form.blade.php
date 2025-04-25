<div> <!-- Single Root Element Start -->

    <!-- Add Brand Modal -->
    <div wire:ignore.self class="modal fade" id="addBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Add Brands</h1>
            <button type="button" wire:click="closeModal" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form wire:submit.prevent="storeBrand">
            <div class="modal-body">
              <div class="mb-3">
                <label>Select Catagory</label>
                <select wire:model.defer="catagory_id" required class="form-control">
                  <option value="">--Select Catagory--</option>
                  @foreach ($catagories as $cataItem  )
                <option value="{{$cataItem->id}}">{{ $cataItem->name }}</option>
                @endforeach
                </select>
                @error('catagory_id') <small class="text-danger">{{ $message }}</small> @enderror

              </div>
              <div class="mb-3">
                <label>Brand Name</label>
                <input type="text" wire:model.defer="name" class="form-control">
                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
              </div>
              <div class="mb-3">
                <label>Brand Slug</label>
                <input type="text" wire:model.defer="slug" class="form-control">
                @error('slug') <small class="text-danger">{{ $message }}</small> @enderror
              </div>
              <div class="mb-3">
                <label>Status</label> <br/>
                <input type="checkbox" wire:model.defer="status" /> Checked=Hidden, Un-Checked= Visible
                @error('status') <small class="text-danger">{{ $message }}</small> @enderror
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" wire:click="closeModal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="Submit" class="btn btn-primary">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Update Brand Modal -->
    <div wire:ignore.self class="modal fade" id="updateBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Update Brands</h1>
            <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form wire:submit.prevent="updateBrand">
            <div class="modal-body">
              <div class="mb-3">
                <label>Select Catagory</label>
                <select wire:model.defer="catagory_id" required class="form-control">
                  <option value="">--Select Catagory--</option>
                  @foreach ($catagories as $cataItem  )
                <option value="{{$cataItem->id}}">{{ $cataItem->name }}</option>
                @endforeach
                </select>
                @error('catagory_id') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
              <div class="mb-3">
                <label>Brand Name</label>
                <input type="text" wire:model.defer="name" class="form-control">
                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
              </div>
              <div class="mb-3">
                <label>Brand Slug</label>
                <input type="text" wire:model.defer="slug" class="form-control">
                @error('slug') <small class="text-danger">{{ $message }}</small> @enderror
              </div>
              <div class="mb-3">
                <label>Status</label> <br/>
                <input type="checkbox" wire:model.defer="status" style="width: 70px; height: auto;" /> Checked=Hidden, Un-Checked= Visible
                @error('status') <small class="text-danger">{{ $message }}</small> @enderror
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" wire:click="closeModal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="Submit" class="btn btn-primary">Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Delete Brand Modal -->
    <div wire:ignore.self class="modal fade" id="deleteBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Brands</h1>
            <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form wire:submit.prevent="destroyBrand">
            <div class="modal-body">
              <h4>Are You Sure! You Want To Delete This Data?</h4>
            </div>
            <div class="modal-footer">
              <button type="button" wire:click="closeModal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="Submit" class="btn btn-primary">YES</button>
            </div>
          </form>
        </div>
      </div>
    </div>

</div> <!-- Single Root Element End -->
