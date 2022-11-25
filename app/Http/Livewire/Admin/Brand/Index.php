<?php

namespace App\Http\Livewire\Admin\Brand;

use App\Models\Brand;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme ='Bootstrap';

    public $name, $slug, $status, $brand_id;

    public function rules()
    {
        return [
            'name' => 'required|string',
            'slug' => 'required|string',
            'status' => 'nullable'
        ];
    }
public function resetInput()
{
    $this->name = NULL;
    $this->slug = NULL;
    $this->status = NULL;
    $this->brand_id = NULL;
}

    public function storeBrand()
    {
        $validateData = $this->validate();
        Brand::create([
            'name' =>$this->name,
            'slug' =>Str::slug($this->slug),
            'status' =>$this->status == true ? '1':'0',
        ]);
        session()->flash('message','Brand Add Successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    public function closeModel()
    {
        $this->resetInput();
    }
    public function openModel()
    {
        $this->resetInput();
    }

    public function editBrand(int $brand_id)
    {
        $this->brand_id = $brand_id;
        $brand = Brand::findOrfail($brand_id);
        $this->name = $brand->name;
        $this->slug = $brand->slug;
        $this->status = $brand->status;
    }

    public function updateBrand()
    {
        $validateData = $this->validate();
        Brand::findOrfail($this->brand_id)->update([
            'name' =>$this->name,
            'slug' =>Str::slug($this->slug),
            'status' =>$this->status == true ? '1':'0',
        ]);
        session()->flash('message','Brand Updated Successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    public function deleteBrand($brand_id)
    {
        $this->brand_id = $brand_id;
    }

    public function destroyBrand()
    {
        Brand::findOrfail($this->brand_id)->delete();
        session()->flash('message','Brand Deleted Successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }


    public function render()
    {
        $brands = Brand::orderBy('id','DESC')->paginate(10);
        return view('livewire.admin.brand.index', ['brands'=>$brands])
                    ->extends('layouts.admin')
                    ->section('content');
    }
}
