@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>Edit Sliders
                        <a href="{{url('admin/sliders')}}" class="btn btn-danger text-white  btn-sm float-end">BACK</a>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{url('admin/sliders/'.$slider->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        @method('PUT')

                        <div class="mb-3">
                            <label class="pb-2">Title</label>
                            <input type="text" value="{{$slider->title}}" name="title" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label class="pb-2">Description</label>
                            <textarea name="description" class="form-control" rows="3">{{$slider->description}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="pb-2">Image</label>
                            <input type="file" name="image" class="form-control" /> <br/>
                            <img src="{{asset("$slider->image")}}" style="width:50px; height:50px;" />
                        </div>
                        <div class="mb-3">
                            <label class="pb-2"> Status</label> <br/>
                            <input type="checkbox" name="status" {{$slider->status == '1' ? 'checked':''}} style="width: 30px; height:30px;" /> Checed=Hidden, Unchecked=Visible
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
