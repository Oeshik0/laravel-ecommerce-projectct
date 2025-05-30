<?php

namespace App\Livewire\Frontend\Checkout;

use App\Models\Cart;
use App\Models\Order;
use Livewire\Component;
use App\Models\Orderitem;
use Illuminate\Support\Str;

class CheckoutShow extends Component
{
    public $carts, $totalProductAmount=0;
    public $fullname, $email, $phone, $pincode, $address, $payment_mode=NULL, $payment_id=NULL;

   


   public function validationForAll()
{
    // Only dispatch if validation fails
    if (!$this->validate()) {
        $this->dispatch('validation-error', ['message' => 'Please fill in all required fields.']);
    }
}


public function paidOnlineOrder($value)
{
    $this->validate(); //  Always validate first

    $this->payment_mode = 'Paid by PayPal';
    $this->payment_id = $value; // Set the payment ID from PayPal

    if ($this->placeOrder()) {
        Cart::where('user_id', auth()->user()->id)->delete();
        $this->reset(['carts', 'totalProductAmount']);
        $this->carts = Cart::where('user_id', auth()->user()->id)->get();

        $this->dispatch('order-success');
    } else {
        $this->dispatch('order-fail');
    }
}




    public function rules()
    {
        return [
            'fullname' => 'required|string|max:121',
            'email' => 'required|email|max:121',
            'phone' => 'required|string|max:11|min:10',
            'pincode' => 'required|string|max:6|min:6',
            'address' => 'required|string|max:500',
        ];

    }
    public function placeOrder()  
    {
        $this->validate();
        $order = Order::create([
        'user_id' => auth()->user()->id,
        'tracking_no' => 'skyred-'.Str::random(10),
        'fullname' => $this->fullname,
        'email'=> $this->email,
        'phone'=> $this->phone,
        'pincode'=> $this->pincode,
        'address'=> $this->address,
        'status_message' => 'in progress',
        'payment_mode' =>$this->payment_mode,
        'payment_id' => $this->payment_id
        ]);

        foreach($this->carts as $cartItem){
        $orderItems = Orderitem::create([
        'order_id' => $order->id,
        'product_id' => $cartItem->product_id,
        'product_color_id' =>$cartItem->product_color_id ,
        'quantity' => $cartItem->quantity,
        'price' =>$cartItem->product->selling_price
            ]);
               $this->totalProductAmount += $cartItem->product->selling_price * $cartItem->quantity;
            }
            return $order;

        
    }


 public function codOrder()  
{
    $this->payment_mode = 'Cash On Delivery';

    if ($this->placeOrder()) {
        Cart::where('user_id', auth()->user()->id)->delete();
        $this->reset(['carts', 'totalProductAmount']);
        $this->carts = Cart::where('user_id', auth()->user()->id)->get();

        // Only dispatch event, no redirect here
        $this->dispatch('order-success');
    } else {
        $this->dispatch('order-fail');
    }
}







     public function totalProductAmount() 
        {
            $this->totalProductAmount = 0; 
            $this->carts = Cart::where('user_id',auth()->user()->id)->get();
            foreach($this->carts as $cartItem){
               $this->totalProductAmount += $cartItem->product->selling_price * $cartItem->quantity;
            }
            return $this->totalProductAmount;
        }
    public function render()
    {
        $this->fullname = auth()->user()->name; //geting login user name & email in frontend
        $this->email = auth()->user()->email;
        $this->totalProductAmount = $this->totalProductAmount();
       
        return view('livewire.frontend.checkout.checkout-show',[
            'totalProductAmount' => $this->totalProductAmount
        ]);
    }
}
