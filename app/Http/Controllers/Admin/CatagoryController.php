<?php

namespace App\Http\Controllers\Admin;

use Str;
use App\Models\Catagory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\CatagoryFormRequest;


class CatagoryController extends Controller
{
    public function index()
    {
        return view('admin.catagory.index');
    }

    public function create()
    {
        return view('admin.catagory.create');
    }

    public function store(CatagoryFormRequest $request)
    {
        $validatedData = $request->validated();
        
        // Create a new Catagory object
        $catagory = new Catagory;
        
        // Assign values
        $catagory->name = $validatedData['name'];
        $catagory->slug = Str::slug($validatedData['slug']);
        $catagory->description = $validatedData['description'];
        $catagory->meta_title = $validatedData['meta_title'];
        $catagory->meta_keyword = $validatedData['meta_keyword'];
        $catagory->meta_description = $validatedData['meta_description'];
        $catagory->status = $request->has('status') ? 1 : 0; // Corrected field name to match your input
    
        // Handle file upload if exists
        if ($request->hasFile('image')) {
            $file = $request->file('image');
        
            // Generate a unique filename based on current time
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;

            // Define the path
           $path = 'uploads/catagory/';
        
            // Move the file to the desired directory
            $file->move(public_path('uploads/catagory/'), $filename);
        
            // Store the filename in the database
            $catagory->image = $filename;
        }
        
        
    
        // Save data to the database
        $catagory->save();
    
        return redirect('admin/catagory')->with('message', 'Category Added Successfully');
    }

    public function edit(Catagory $catagory)
    {
        return view('admin.catagory.edit',compact('catagory'));
    }

public function update(CatagoryFormRequest $request, $catagory)
{
    $validatedData = $request->validated();
    $catagory = Catagory::findOrFail($catagory);
    $catagory->name = $validatedData['name'];
    $catagory->slug = Str::slug($validatedData['slug']);
    $catagory->description = $validatedData['description'];
    $catagory->meta_title = $validatedData['meta_title'];
    $catagory->meta_keyword = $validatedData['meta_keyword'];
    $catagory->meta_description = $validatedData['meta_description'];
    $catagory->status = $request->has('status') ? 1 : 0;

    if ($request->hasFile('image')) {
        $oldImagePath = public_path('uploads/catagory/' . $catagory->image);
        if (File::exists($oldImagePath)) {
            File::delete($oldImagePath);
        }

        $file = $request->file('image');
        $ext = $file->getClientOriginalExtension();
        $filename = time() . '.' . $ext;

        $path = 'uploads/catagory/';
        $file->move(public_path($path), $filename);

        // ✅ Save ONLY the filename in DB
        $catagory->image = $filename;
    }

    $catagory->update();

    return redirect('admin/catagory')->with('message', 'Category Updated Successfully');
}


    

}
