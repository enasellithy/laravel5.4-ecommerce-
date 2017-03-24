@extends('cpanel.layouts.app')

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
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-warning text-center">
                                            <i class="ti-wallet"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>User</p>
                                            {{$cat->count()}}
                                            <form class="form-horizontal" action="{{route('admincategory.store')}}" method="post">
                                                {{csrf_field()}}
                                             <div class="form-group">
                                                <label for="name" class="col-sm-2 control-label">Name</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" name="name" id="name" placeholder="Name" />
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
                                <div class="footer">
                                    <hr />
                                     <div class="table">
                                        <table class="table table-hover table-condensed table-responsive table-striped">
                                            <thead>
                                              <tr>
                                                <th>Name</th>
                                                <th>Control</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($cat as $c)
                                              <tr>
                                                <td>{{$c->name}}</td>
                                                <td>
                                                    <a href="admincategory/{{$c->id}}/show" class="btn btn-info">Show</a>
                                                    <a href="admincategory/{{$c->id}}/delete" class="btn btn-danger">Delete</a>
                                                </td>
                                              </tr>
                                              @endforeach
                                            </tbody>
                                         </table>
                                          <hr />
                                    <div class="links">
                                        {!! $cat->links() !!}
                                    </div>
                                    </div>
                                    <hr />
                                    <div class="stats">
                                        <a class="btn btn-info btn-lg" href="{{route('admin.index')}}">Back</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
@endsection