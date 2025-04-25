<?php

namespace App\Livewire\Frontend\Product;

use App\Models\Cart;
use App\Models\Product;
use Livewire\Component;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class View extends Component
{
    public $catagory,$product,$prodColorSelectedQuantiy, $quantityCount=1, $productColorId;

    public function addToWishlist($productId) 
    {
        if(Auth::check())
        {
            if(Wishlist::where('user_id',auth()->user()->id)->where('product_id',$productId)->exists())
            {
                session()->flash('message','Already Added To Wishlist');
            return false;
            }else{

                Wishlist::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productId
                ]);
                session()->flash('message','Wishlist Added Successfully');
                $this->dispatch('wishlistAddedUpdated');
            }
        }else{
            session()->flash('message','Please Login To Continue');
            return false;
        }
    }
    public function colorSelected($productColorId) 
    {
        $this->productColorId = $productColorId;
       $productColor= $this->product->productColors()->where('id',$productColorId)->first();
       $this->prodColorSelectedQuantiy = $productColor->quantity;
       if($this->prodColorSelectedQuantiy == 0){
        $this->prodColorSelectedQuantiy= 'outofstock';
       }
    }

    public function decrementQuantity()
    {
        if( $this->quantityCount >1){

            $this->quantityCount--;
        }
        
    }
    public function incrementQuantity()
    {
        if( $this->quantityCount <10){

            $this->quantityCount++;
        }
    }

   public function addToCart(int $productId)
{
    if (!Auth::check()) {
        session()->flash('message', 'Please login to continue');
        return false;
    }

    $product = Product::where('id', $productId)->where('status', '0')->first();

    if (!$product) {
        session()->flash('message', 'Product does not exist');
        return false;
    }

    if ($product->productColors()->count() > 0) {
        if ($this->productColorId == NULL) {
            session()->flash('message', 'Select your product color');
            return false;
        }

        $productColor = $product->productColors()->where('id', $this->productColorId)->first();

        if (!$productColor) {
            session()->flash('message', 'Selected color is not available');
            return false;
        }

        if ($productColor->quantity >= $this->quantityCount) {

            // 🔁 Check if already in cart
            $existingCart = Cart::where('user_id', auth()->id())
                ->where('product_id', $productId)
                ->where('product_color_id', $this->productColorId)
                ->first();

            if ($existingCart) {
            session()->flash('message', 'This product is already in your cart');
            return false;

            } else {
                Cart::create([
                    'user_id' => auth()->id(),
                    'product_id' => $productId,
                    'product_color_id' => $this->productColorId,
                    'quantity' => $this->quantityCount
                ]);
            }
            $this->dispatch('cartAddedUpdated');

            session()->flash('message', 'Product added to cart');
            return true;
        } else {
            session()->flash('message', 'Only ' . $productColor->quantity . ' quantity available');
            return false;
        }

    } else {
        if ($product->quantity >= $this->quantityCount) {

            // 🔁 Check if already in cart
            $existingCart = Cart::where('user_id', auth()->id())
                ->where('product_id', $productId)
                ->whereNull('product_color_id')
                ->first();

            if ($existingCart) {
                $existingCart->quantity += $this->quantityCount;
                $existingCart->save();
            } else {
                Cart::create([
                    'user_id' => auth()->id(),
                    'product_id' => $productId,
                    'quantity' => $this->quantityCount
                ]);
            }
            $this->dispatch('CartAddedUpdated');

            session()->flash('message', 'Product added to cart');
            return true;
        } else {
            session()->flash('message', 'Only ' . $product->quantity . ' quantity available');
            return false;
        }
    }
}

    public function mount($catagory,$product)
    {
        $this->catagory = $catagory;
    }
    public function render()
    {
        return view('livewire.frontend.product.view',[
            'catagory' => $this->catagory,
            'product' => $this->product,
        ]);
    }
}
