<div>
    <div class="py-3 py-md-5">

        <div class="container">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <div class="row">
                <div class="col-md-5 mt-3">
                    <div class="bg-white border">
                        @if ($product->productImages)
                            <img src="{{ asset($product->productImages[0]->image) }}" class="w-100" alt="Img">
                        @else
                            No Image
                        @endif
                    </div>
                </div>
                <div class="col-md-7 mt-3">
                    <div class="product-view">
                        <h4 class="product-name">
                            {{ $product->name }}

                        </h4>
                        <hr>
                        <p class="product-path">
                            Home / {{ $product->catagory->name }} / {{ $product->name }}
                        </p>
                        <div>
                            <span class="selling-price">Tk {{ $product->selling_price }}</span>

                            <span class="original-price">Tk {{ $product->original_price }}</span>
                        </div>
                        <div>
                            @if ($product->productColors->count() > 0)
                                <div class="d-flex flex-wrap gap-2">
                                    @foreach ($product->productColors as $colorItem)
                                        <div class="text-center">
                                            <label
                                                class="colorSelectionLabel d-block px-3 py-2 badge   {{ $colorItem->color->code == 'black' ? 'text-white' : 'text-dark' }}"
                                                style="background-color: {{ $colorItem->color->code }};"
                                                wire:click="colorSelected({{ $colorItem->id }})">
                                                {{ $colorItem->color->name }}
                                            </label>
                                            <div>
                                                {{-- <small class="text-black">({{ $colorItem->quantity }} pcs)</small> --}}
                                                <span class="badge bg-info text-dark">Available:
                                                    {{ $colorItem->quantity }}</span>
                                            </div>
                                             
                                        </div>
                                        
                                    @endforeach
                                </div>
                                <div class="mt-1">
                                    <span class="badge bg-success text-dark">
                                       Total Available Color Quantity: {{ $product->productColors->sum('quantity') }}
                                    </span>
                                </div>


                                <div>
                                    @if ($prodColorSelectedQuantiy === 'outofstock')
                                        <label class="btn-sm py-1 mt-2 text-white bg-danger">Out Of Stock</label>
                                    @elseif($prodColorSelectedQuantiy > 0)
                                        <label class="btn-sm py-1 mt-2 text-white bg-success">In Stock</label>
                                    @endif
                                </div>
                            @else
                                @if ($product->quantity > 0)
                                    <label class="btn-sm py-1 mt-2 text-white bg-success">In Stock</label>
                                @else
                                    <label class="btn-sm py-1 mt-2 text-white bg-danger">Out Of Stock</label>
                                @endif
                            @endif
                        </div>

                        <div class="mt-2">
                            <div class="mt-3">
                                <div class="input-group" style="width: 130px; align-items: center;">
                                    <button class="btn btn-outline-secondary" type="button"
                                        wire:click="decrementQuantity">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                    <input type="text" wire:model="quantityCount" readonly
                                        class="form-control text-center" style="background-color: #f8f9fa;">
                                    <button class="btn btn-outline-secondary" type="button"
                                        wire:click="incrementQuantity">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                               
                            </div>


                            <div class="mt-2">
                                <button type="button" wire:click="addToCart({{ $product->id }})" class="btn btn1">
                                    <i class="fa fa-shopping-cart"></i> Add To Cart</button>

                                <button type="button" wire:click="addToWishlist({{ $product->id }})"
                                    class="btn btn1">
                                    <i class="fa fa-heart"></i> Add To Wishlist </a>
                            </div>
                            <div class="mt-3">
                                <h5 class="mb-0">Small Description</h5>
                                <p>
                                    {!! $product->small_description !!}
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-3">
                        <div class="card">
                            <div class="card-header bg-white">
                                <h4>Description</h4>
                            </div>
                            <div class="card-body">
                                <p>
                                    {!! $product->description !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
