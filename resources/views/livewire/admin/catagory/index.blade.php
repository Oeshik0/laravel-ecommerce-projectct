<div>
<div wire:ignore.self  class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Catagory Delete</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form wire:submit.prevent="destroyCatagory">
           <div class="modal-body">
           <h6>Are You Sure? You Want To Delete This Data!</h6>
           </div>
           <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">YES!</button>
          </div>
          </form>
    </div>
  </div>
</div>

     <div class="row">
            <div class="col-md-12">
                @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
                
                @endif

            </div>
            <div class="card">
                <div class="card-header">
                    <h3>Catagory
                        <a href="{{ url('admin/catagory/create') }}" class="btn btn-primary btn-sm float-end">Add Catagory</a>
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($catagories as $catagory)
                            
                            
                            <tr>
                                <td>{{$catagory->id  }}</td>
                                <td>{{$catagory->name  }}</td>
                                <td>{{$catagory->status=='1' ? 'Hidden' : 'Visible'  }}</td>
                                <td>
                                    <a href="{{ url('admin/catagory/'.$catagory->id.'/edit') }}" class="btn btn-success"=>Edit</a>
                                    <a href="#" wire:click="deleteCatagory({{ $catagory->id }})" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                    <div>

                    {{ $catagories->links() }}

                    </div>
                    
                </div>
            </div>
            </div>

</div>
@push('script')
<script>
    window.addEventListener('closeModal', event => {
        $('#deleteModal').modal('hide');
    });
</script>
@endpush
