<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Cart;
use Livewire\Component;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class View extends Component
{
    public $category, $product, $prodColorSelectedQuantity, $quantityCount = 1, $productColorId;

    public function addwishlist($productId)
    {
        if(Auth::check())
        {
            if(Wishlist::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists())
            {
                session()->flash('message','Already Add to Wishlist');
                $this->dispatchBrowserEvent('message',[
                    'text' => 'Already Add to Wishlist',
                    'type' => 'warning',
                    'status' => 409
                ]);
                return false;
            }
            else
            {

                Wishlist::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productId,
                ]);

                $this->emit('wishlistAddedUpdated');
                session()->flash('message',' Wishlist added Successfully');
                $this->dispatchBrowserEvent('message',[
                    'text' => 'Wishlist added Successfully',
                    'type' => 'success',
                    'status' => 200
                ]);
            }
        }
        else
        {
            session()->flash('message','Please Login to Continue');
            $this->dispatchBrowserEvent('message',[
                'text' => 'Please Login to Continue',
                'type' => 'danger',
                'status' => 401
            ]);
            return false;
        }
    }

    public function incrementQuantity()
    {
        if($this->quantityCount < 10){
            $this->quantityCount++;
        }
    }
    public function decrementQuantity()
    {
        if($this->quantityCount > 1){
            $this->quantityCount--;
        }
    }

    public function addToCart(int $productId)
    {
        if(Auth::check())
        {
            if($this->product->where('id', $productId)->where('status', '0')->exists())
            {
                    // Check for color qty add to cart //
                if($this->product->productColors()->count() > 1)
                {
                        if($this->prodColorSelectedQuantity != NULL)
                        {
                            if(Cart::where('user_id', auth()->user()->id)
                                ->where('product_id', $productId)
                                ->where('product_color_id', $this->productColorId)
                                ->exists())
                            {
                                $this->emit('CartAddedUpdated');
                                $this->dispatchBrowserEvent('message',[
                                    'text' => 'Product Already Added',
                                    'type' => 'warning',
                                    'status' => 200
                                ]);
                            }
                            else
                            {
                              $productColor = $this->product->productColors()->where('id',$this->productColorId)->first();
                                 if($productColor->quantity > 0)
                                    {
                                        if($productColor->quantity > $this->quantityCount)
                                        {
                                            // insert to cart color
                                            Cart::create([
                                                'user_id' => auth()->user()->id,
                                                'product_id' => $productId,
                                                'product_color_id' => $this->productColorId,
                                                'quantity' => $this->quantityCount,
                                            ]);

                                                $this->emit('CartAddedUpdated');
                                                $this->dispatchBrowserEvent('message',[
                                                    'text' => 'Product Added To Cart',
                                                    'type' => 'success',
                                                    'status' => 200
                                                ]);
                                        }
                                        else
                                        {
                                            $this->dispatchBrowserEvent('message',[
                                                'text' => 'Only' .$productColor->quantity.'Quantity Available',
                                                'type' => 'warning',
                                                'status' => 404
                                            ]);
                                        }

                                    }
                                else
                                {
                                        $this->dispatchBrowserEvent('message',[
                                            'text' => 'Out of Stock',
                                            'type' => 'warning',
                                            'status' => 404
                                        ]);
                                }
                            }
                        }
                        else
                        {
                            $this->dispatchBrowserEvent('message',[
                                'text' => 'Select Your Product Color',
                                'type' => 'info',
                                'status' => 404
                            ]);

                        }
                }
                else
                {
                    if(Cart::where('user_id', auth()->user()->id)->where('product-id', $productId)->exists())
                    {
                        $this->dispatchBrowserEvent('message',[
                            'text' => 'Product Already Added',
                            'type' => 'warning',
                            'status' => 200
                        ]);
                    }
                    else
                    {
                        if($this->product->quantity > 0)
                        {
                            if($this->product->quantity > $this->quantityCount)
                            {
                                // insert to cart
                                Cart::create([
                                    'user_id' => auth()->user()->id,
                                    'product_id' => $productId,
                                    'quantity' => $this->quantityCount,
                                ]);
                                    $this->dispatchBrowserEvent('message',[
                                        'text' => 'Product Added To Cart',
                                        'type' => 'success',
                                        'status' => 200
                                    ]);
                            }
                            else
                            {
                                $this->dispatchBrowserEvent('message',[
                                    'text' => 'Only' .$this->product->quantity.'Quantity Available',
                                    'type' => 'warning',
                                    'status' => 404
                                ]);
                            }
                        }
                        else
                        {
                            $this->dispatchBrowserEvent('message',[
                                'text' => 'Out Of Stock',
                                'type' => 'warning',
                                'status' => 404
                            ]);
                        }
                    }
                }
            }
            else
            {
                $this->dispatchBrowserEvent('message',[
                    'text' => 'Product Does Not Exists',
                    'type' => 'warning',
                    'status' => 404
                ]);
            }
        }
        else
        {
            $this->dispatchBrowserEvent('message',[
                'text' => 'Please Login to Add to Cart',
                'type' => 'danger',
                'status' => 401
            ]);
        }
    }

    public function colorSelected($productColorId)
    {
        $this->productColorId = $productColorId;
        $productColor = $this->product->productColors()->where('id',$productColorId)->first();
        $this->prodColorSelectedQuantity = $productColor->quantity;

        if($this->prodColorSelectedQuantity == 0){
            $this->prodColorSelectedQuantity = 'outOfStock';
        }
    }

    public function mount($category, $product)
    {
        $this->category = $category;
        $this->product = $product;
    }
    public function render()
    {
        return view('livewire.frontend.product.view', [

            'category' =>$this->category,
            'product' =>$this->product
        ]);
    }
}
