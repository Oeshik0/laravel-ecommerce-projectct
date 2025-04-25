<?php

namespace App\Livewire\Admin\Brand;

use Str;
use App\Models\Brand;
use App\Models\Catagory;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme='bootstrap';
    public $name, $slug, $status,$brand_id, $catagory_id;
    public function rules()
    {
        return[
            'name'=> 'required|string',
            'slug'=>'required|string',
            'catagory_id'=>'required|integer',
            'status'=>'nullable'
        ];
    }

    public function resetInput()
    {
        $this->name = NULL;
        $this->slug = NULL;
        $this->status = NULL;
        $this->brand_id = NULL;
        $this->catagory_id = NULL;
    }
    public function storeBrand()
    {
        $validatedData = $this->validate();
        Brand::create([
            'name'=> $this->name,
            'slug'=>Str::slug ($this->slug),
            'status'=> $this->status==true ? '1':'0',
            'catagory_id'=>$this->catagory_id
        ]);
        session()->flash('message','Brand Added Successfully');
        $this->dispatch('closeModal');
        $this->resetInput();

    }
    public function closeModal()
    {
        $this->resetInput();
    }
    public function openModal()
    {
        $this->resetInput();
    }

    public function editBrand(int $brand_id)
    {
        $this->brand_id= $brand_id;
        $brand = Brand::findOrFail($brand_id);
        $this->name = $brand->name;
        $this->slug = $brand->slug;
        $this->status = $brand->status;
        $this->catagory_id = $brand->catagory_id;

    }
    public function updateBrand()
    {
        $validatedData = $this->validate();
        Brand::findOrFail($this->brand_id)->update([
            'name'=> $this->name,
            'slug'=>Str::slug ($this->slug),
            'status'=> $this->status==true ? '1':'0',
            'catagory_id'=>$this->catagory_id
        ]);
        session()->flash('message','Brand Updated Successfully');
        $this->dispatch('closeModal');
        $this->resetInput();

    }

    public function deleteBrand($brand_id)  
    {
        $this->brand_id = $brand_id; //Storing id
        
    }

   public function destroyBrand()
   {
        Brand::findOrFail($this->brand_id)->delete();
        session()->flash('message','Brand Deleted Successfully');
        $this->dispatch('closeModal');
        $this->resetInput();
   }

    public function render()
    {
        $catagories = Catagory::where('status','0')->get();
        $brands = Brand::orderBy('id','DESC')->paginate(10);
        return view('livewire.admin.brand.index',['brands'=>$brands, 'catagories' =>$catagories])
        ->extends('layouts.admin')
        ->section('content');
    }
}
