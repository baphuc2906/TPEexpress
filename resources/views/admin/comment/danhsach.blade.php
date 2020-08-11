@extends('layouts.app')
@section('content')
<div id="page-wrapper">
	<div class="row">
        <div class="col-lg-12">
          	<div class="panel panel-default">
              <div class="panel-heading"><i class="fa fa-bar-chart-o fa-fw"></i>
                Comment
                <div class="pull-right">
                  <div class="btn-group">
                    <button class="btn btn-default btn-xs dropdown-toggle" type="button" data-toggle="dropdown">Actions<span class="caret"></span></button>
                    <ul class="dropdown-menu pull-right" role="menu">
                      <li><a href="#">Action</a></li>
                      <li><a href="#">Another action</a></li>
                      <li><a href="#">Something else here</a></li>
                      <li class="divider"></li>
                      <li><a href="#">Separated link</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              @if(session('thongbao'))
              <div class="alert alert-success">
                {{ session('thongbao') }}
              </div>
              @endif
              <!-- /.panel-heading-->
              <div class="panel-body">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="table-responsive">
                      <table class="table table-bordered table-hover table-striped">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>User Name</th>
                            <th>Content</th>
                            <th>Post</th>
                            <th>Cmt Date</th>
                           	<th class="button_edit text-center">Xoá</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach( $comment as $value)
                          <tr>
                            <td class="text-capitalize">{{ $value->id }}</td>
                            <td class="text-capitalize">{{ $member->where('id', $value->id_user)->first()->name }} </td>
                            <td class="text-capitalize">{{ $value->noi_dung }} </td>
                            <td class="text-capitalize">{{ $value->tintuc->tieu_de }} </td>
                            <td class="text-capitalize">{{ $value->created_at }} </td>
                            <td class="text-center"><a href="{{ url("admin/loaitin/xoa/")."/"}}{{ $value->id }}"><button class="button btn-danger text-center">Xoá</button></a></td>
                          </tr>
                          @endforeach
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection