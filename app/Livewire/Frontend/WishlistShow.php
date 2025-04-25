<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use App\Models\Wishlist;

class WishlistShow extends Component
{

   public function removeWishlistItem(int $wishlistId)
{
    $wishlist = Wishlist::where('user_id', auth()->id())->where('id', $wishlistId)->first();

    if ($wishlist) {
        $wishlist->delete();
        session()->flash('message', 'Wishlist item removed successfully.');
        $this->dispatch('wishlistAddedUpdated');
    } else {
        session()->flash('message', 'Item not found or already removed.');
    }
}

    public function render()
    {
        $wishlist = Wishlist::where('user_id',auth()->user()->id)->get();
        return view('livewire.frontend.wishlist-show',[
            'wishlist' => $wishlist
        ]);
        
    }
}
