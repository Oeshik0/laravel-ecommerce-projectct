<?php

namespace App\Livewire\Frontend\Cart;

use App\Models\Cart;
use Livewire\Component;

class CartShow extends Component
{
    public $cart, $totalPrice = 0;
   public function decrementQuantity(int $cartId)
{
    $cartData = Cart::where('id', $cartId)
        ->where('user_id', auth()->user()->id)
        ->first();

    if (!$cartData) {
        session()->flash('message', 'Something went wrong');
        return false;
    }

    if ($cartData->quantity > 1) {
        $cartData->decrement('quantity');
        $this->dispatch('CartAddedUpdated');
        session()->flash('message', 'Quantity updated');
    } else {
        session()->flash('message', 'Minimum quantity is 1');
    }

    return false;
}

   public function incrementQuantity(int $cartId)
{
    $cartData = Cart::where('id', $cartId)
        ->where('user_id', auth()->user()->id)
        ->first();

    if (!$cartData) {
        session()->flash('message', 'Something went wrong');
        return false;
    }

    // If the product has color variants
    if ($cartData->product_color_id !== null) {
        $productColor = $cartData->productColor()->where('id', $cartData->product_color_id)->first();

        if ($productColor && $productColor->quantity > $cartData->quantity) {
            $cartData->increment('quantity');
            $this->dispatch('CartAddedUpdated');
            session()->flash('message', 'Quantity updated');
        } else {
            session()->flash('message', 'No more stock available');
        }

    } else {
        // Product without color
        if ($cartData->product->quantity > $cartData->quantity) {
            $cartData->increment('quantity');
            $this->dispatch('CartAddedUpdated');
            session()->flash('message', 'Quantity updated');
        } else {
            session()->flash('message', 'No more stock available');
        }
    }

    return false;
}

public function removeCartItem(int $cartId)  
{
    $cartRemoveData = Cart::where('user_id',auth()->user()->id)->where('id',$cartId)->first();
    if($cartRemoveData)
    {
        $cartRemoveData->delete();
        $this->dispatch('cartAddedUpdated');
        session()->flash('message', 'Cart Removed');
        return false;
    }
    else
    {
        session()->flash('message', 'Something went wrong');
        return false;
    }
}

    public function render()
    {
        $this->cart = Cart::where('user_id',auth()->user()->id)->get();
        return view('livewire.frontend.cart.cart-show',[
            'cart' =>$this->cart
        ]);
    }
}
