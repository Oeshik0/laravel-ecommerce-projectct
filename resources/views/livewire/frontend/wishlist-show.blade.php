<div>
     <div class="py-3 py-md-5 bg-light">
        <div class="container">
            {{-- Flash Message --}}
            @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                    {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
    
            <div class="row">
                <div class="col-md-12">
                    <div class="shopping-cart">

                        <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Products</h4>

                                </div>
                                <div class="col-md-2">
                                    <h4>Price</h4>
                                </div>
                               
                                <div class="col-md-4">
                                    <h4>Remove</h4>
                                </div>
                            </div>
                        </div>
                        @forelse($wishlist as $wishlistItem) 
                        @if ($wishlistItem->product)
                        <div class="cart-item">
                            <div class="row">
                                <div class="col-md-6 my-auto">
                                    <a href="{{url('collections/'.$wishlistItem->product->catagory->slug.'/'.$wishlistItem->product->slug)}}">
                                        <label class="product-name">
                                            <img src="{{$wishlistItem->product->productImages[0]->image}}" 
                                            style="width: 50px; height: 50px" alt="{{$wishlistItem->product->name}}" />

                                            {{$wishlistItem->product->name}}
                                        </label>
                                    </a>
                                </div>
                                <div class="col-md-2 my-auto">
                                    <label class="price">Tk {{$wishlistItem->product->selling_price}} </label>
                                </div>
                                
                                <div class="col-md-4 col-12 my-auto">
                                    <div class="remove">
                                        <button type="button" wire:click="removeWishlistItem({{$wishlistItem->id}})" class="btn btn-danger btn-sm">
                                            <span wire:loading.remove wire:target="removeWishlistItem({{$wishlistItem->id}})">

                                                <i class="fa fa-trash"></i> Remove
                                            </span>
                                            <span wire:loading wire:target="removeWishlistItem({{$wishlistItem->id}})">
                                                <i class="fa fa-trash"></i>Removing</span>

                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        @endif 
                     @empty
                        <h4>No Wishlist Added</h4>
                        @endforelse
                </div>
            </div>

        </div>
    </div>

</div>
</div>
