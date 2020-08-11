  @extends('layouts.app')
  @section('content') 
      <!-- Navigation-->
      <div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
          </div>
          <!-- /.col-lg-12-->
        </div>
        <!-- /.row-->
        <div class="row">
          <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-3"><i class="fa fa-comments fa-5x"></i></div>
                  <div class="col-xs-9 text-right">
                    <div class="huge">{{ count($num_comment) }}</div>
                    <div>New Comments!</div>
                  </div>
                </div>
              </div><a href="{{ route('commentlist') }}">
                <div class="panel-footer"><span class="pull-left">View Details</span><span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                  <div class="clearfix"></div>
                </div></a>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-3"><i class="fa fa-tasks fa-5x"></i></div>
                  <div class="col-xs-9 text-right">
                    <div class="huge">{{ count($num_theloai) }}</div>
                    <div>Thể Loại</div>
                  </div>
                </div>
              </div><a href="{{ route('categorylist') }}">
                <div class="panel-footer"><span class="pull-left">View Details</span><span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                  <div class="clearfix"></div>
                </div></a>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="panel panel-yellow">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-3"><i class="fa fa-shopping-cart fa-5x"></i></div>
                  <div class="col-xs-9 text-right">
                    <div class="huge">{{ count($num_loaitin) }}</div>
                    <div>Loại Tin</div>
                  </div>
                </div>
              </div><a href="{{ route('typelist') }}">
                <div class="panel-footer"><span class="pull-left">View Details</span><span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                  <div class="clearfix"></div>
                </div></a>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-3"><i class="fa fa-support fa-5x"></i></div>
                  <div class="col-xs-9 text-right">
                    <div class="huge">{{ count($num_post) }}</div>
                    <div>Tin Tức</div>
                  </div>
                </div>
              </div><a href="{{ route('postlist') }}">
                <div class="panel-footer"><span class="pull-left">View Details</span><span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                  <div class="clearfix"></div>
                </div></a>
            </div>
          </div>
        </div>
        <!-- /.row-->
        <div class="row">
          <div class="col-lg-12">
            <!-- /.panel-->
            <div class="panel panel-default">
              <div class="panel-heading"><i class="fa fa-bar-chart-o fa-fw"></i>
                Thể Loại
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
              <!-- /.panel-heading-->
              <div class="panel-body">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="table-responsive">
                      <table class="table table-bordered table-hover table-striped">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Tên</th>
                           
                           {{--  <th class="button_edit text-center">Sửa</th>
                            <th class="button_edit text-center">Xoá</th> --}}
                          </tr>
                        </thead>
                        <tbody>
                          @foreach( $num_theloai as $value)
                          <tr>
                            <td class="text-capitalize">{{ $value->id }}</td>
                            <td class="text-capitalize">{{ $value->ten }}</td>
                            {{-- <td class="text-center"><button class="button btn-primary ">Sửa</button></td>
                            <td class="text-center"><button class="button btn-danger text-center">Xoá</button></td> --}}
                          </tr>
                          @endforeach
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="panel panel-default">
              <div class="panel-heading"><i class="fa fa-bar-chart-o fa-fw"></i>
                Loại Tin
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
              <!-- /.panel-heading-->
              <div class="panel-body">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="table-responsive">
                      <table class="table table-bordered table-hover table-striped">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>ID Thể Loại</th>
                            <th>Tên</th>
                            <th>Ngày Viết</th>
                           
                          </tr>
                        </thead>
                        <tbody>
                          @foreach( $num_loaitin as $value)
                          <tr>
                            <td class="text-capitalize">{{ $value->id }}</td>
                            <td class="text-capitalize">{{ $value->theloai->ten }}</td>
                            <td class="text-capitalize">{{ $value->ten }}</td>
                            <td>{{ $value->created_at }}</td>
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
        <!-- /.row-->
      </div>
      <!-- /#page-wrapper-->
  @endsection
