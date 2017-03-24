@extends('cpanel.layouts.app')
<title>
    Edit {{$product->name}}
</title>
@section('content')
 <div class="content">
     @if(Session::has('success'))
<div class="alert alert-success">
    {{Session::get('success')}}
</div>
@endif
@if(count($errors) > 0)
 <div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
 </div>
@endif
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-sm-12">
         <form class="form-horizontal" 
               action="{{url('adminproduct/'.$product->id.'/update')}}" 
               method="post"
               enctype="multipart/form-data">
    {{csrf_field()}}
 <div class="form-group">
    <label for="name" class="col-sm-2 control-label">Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="name" value="{{$product->name}}" id="name" placeholder="Name" />
    </div>
 </div>
 <div class="form-group">
  <label class="control-label col-sm-2" for="desc">Description</label>
  <div class="col-sm-10">
    <textarea name="desc" class="form-control" rows="5">
         {{$product->desc}}
        
    </textarea>
  </div>
</div>
 <div class="form-group">
    <label for="country" class="col-sm-2 control-label">Country</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="country"  value="{{$product->country}}"  id="country" placeholder="Country" />
    </div>
 </div>
 <div class="form-group">
    <label for="price" class="col-sm-2 control-label">Price</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="price" value="{{$product->price}}" id="price" placeholder="Price" />
    </div>
 </div>
 <div class="form-group">
    <label for="year" class="col-sm-2 control-label">Year</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="year" value="{{$product->year}}" id="year" placeholder="Year" />
    </div>
 </div>
  <div class="form-group">
    <label for="status" class="col-sm-2 control-label">Status</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="status" value="{{$product->status}}" id="status" placeholder="Status" />
    </div>
 </div>
 <div class="form-group">
  <label class="control-label col-sm-2" for="cat_id">Category</label>
  <div class="col-sm-10">
  <select name="cat_id" class="form-control">
    @foreach($cat as $c)
    <option value="{{$c->id}}">{{$c->name}}</option>
    @endforeach
  </select>
</div>
</div>
<div class="form-group">
    <label for="image" class="col-sm-2 control-label">Image</label>
    <div class="col-sm-10">
      <input type="file" class="form-control" name="image"  value="{{$product->image}}" id="image" placeholder="image" />
    </div>
 </div>
    <div class="form-group">
    <div class="col-sm-12">
      <input type="submit" class="btn btn-success" value="Save" />
    </div>
 </div>
 <input type="hidden" value="{{Session::token()}}" name="_token">
</form>
  
        </div>
    </div>
</div>
</div>
@endsection