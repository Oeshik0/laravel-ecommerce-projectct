<?php

namespace App\Livewire\Admin\Catagory;

use Livewire\Component;
use App\Models\Catagory;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $catagory_id;
    public function deleteCatagory($catagory_id)
    {
        $this->catagory_id = $catagory_id;
    }

    public function destroyCatagory()
    {
        $catagory = Catagory::find($this->catagory_id);
        
        // Delete image if exists
        $path = 'uploads/catagory/' . $catagory->image;
        if (File::exists($path)) {
            File::delete($path);
        }
    
        // Delete the category
        $catagory->delete();
    
        // Flash success message
        session()->flash('message', 'Catagory Deleted');
    
        // Dispatch the event to close the modal
        $this->dispatch('closeModal');
    }
    
    public function render()
    {
        $catagories = Catagory::orderBy('id','DESC')->paginate(10);
        return view('livewire.admin.catagory.index',['catagories' =>$catagories]);
    }
}
