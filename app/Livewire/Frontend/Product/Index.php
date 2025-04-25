<?php

namespace App\Livewire\Frontend\Product;

use App\Models\Product;
use Livewire\Component;

class Index extends Component
{
    public $products, $catagory, $brandInputs=[], $priceInput;
    protected $queryString = [
        'brandInputs'=> ['except' => '', 'as' => 'brand'],
        'priceInput'=> ['except' => '', 'as' => 'price'],
];
    public function mount( $catagory) 
    {
        
        $this->catagory = $catagory;
        
    }
    // Filtering
    public function render()
    {
        // dd($this->brandInputs); // Debugging
        $this->products = Product::where('catagory_id', $this->catagory->id)
        ->when($this->brandInputs,function($q){
            $q->whereIn('brand',$this->brandInputs);
        })
         ->when($this->priceInput,function($q){
            $q->when($this->priceInput=='high-to-low',function($q2){
                $q2->orderBy('selling_price','DESC');
            });
            $q->when($this->priceInput=='low-to-high',function($q2){
                $q2->orderBy('selling_price','ASC');
            });
        })


        ->where('status','0')
        ->get();
        return view('livewire.frontend.product.index',[
            'products' =>$this->products,
            'catagory' =>$this->catagory,
        ]);
    }
public function logBrandInputs()
{
    logger($this->brandInputs);
}
public function logpriceInput()
{
    logger($this->priceInput);
}

}
