<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Product;
use Livewire\Component;

class Index extends Component
{
    public $products, $category, $brandinputs = [], $priceinput;

    protected $queryString =[
        'brandinputs' => ['except'=>'','as'=>'brand'],
        'priceinput' => ['except'=>'','as'=>'price'],
    ];

    public function mount($category)
    {

        $this->category = $category;
    }
    public function render()
    {
        $this->products = Product::where('category_id',$this->category->id)
                        ->when($this->brandinputs, function($q){
                            $q->whereIn('brand',$this->brandinputs);
                        })
                        ->when($this->priceinput, function($q){

                            $q->when($this->priceinput == 'high-to-low', function($q2){
                                $q2->orderBy('selling_price','DESC');
                            })
                            ->when($this->priceinput == 'low-to-high', function($q2){
                                $q2->orderBy('selling_price','ASC');
                            });
                        })
                        ->where('status','0')
                        ->get();
        return view('livewire.frontend.product.index', [
            'products' => $this->products,
            'category' => $this->category
        ]);
    }
}
