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
                                            <i class="ti-user"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>User</p>
                                            {{$user->count()}}
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
                                                @foreach($user as $u)
                                              <tr>
                                                <td>{{$u->name}}</td>
                                                <td>
                                                    <a href="adminuser/{{$u->id}}/show" class="btn btn-info">Show</a>
                                                    <a href="adminuser/{{$u->id}}/delete" class="btn btn-danger">Delete</a>
                                                </td>
                                              </tr>
                                              @endforeach
                                            </tbody>
                                         </table>
                                          <hr />
                                    <div class="links">
                                        {!! $users->links() !!}
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