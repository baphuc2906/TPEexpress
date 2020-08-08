@extends('layouts.app')

@section('content')
<div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h1 class="page-header">Bài Viết
            	<small>{{ $tintuc->tieu_de }}</small>
          	</h1>
          </div>
        </div>
        <div class="col-lg-7">
        	@if(count($errors)>0)
        	<div class="alert alert-danger">
        		@foreach($errors->all() as $err)
					{{ $err }} <br>
        		@endforeach
        	</div>
        	@endif
        	@if(session('thongbao'))
        		<div class="alert alert-success">
        			{{ session('thongbao') }}
        		</div>
        	@endif
        	<form action="{{ url("admin/tintuc/sua")."/"}}{{ $tintuc->id }}" method="POST" enctype="multipart/form-data">
        		<input type="hidden" name="_token" value="{{ csrf_token() }}">
        		<div class="form-group">
                    <label for="">Tên thể loại :</label>
                    <select class="form-control text-capitalize" name="TheLoai" id="TheLoai">
                         <option class="text-capitalize" value=""></option>
                      @foreach($theloai as $value)
                       {{--  <option class="text-capitalize" value="{{ $value->id }}">{{ $value->ten }}</option> --}}
                        <option 
                            @if($tintuc->loaitin->id_the_loai== $value->id)
                            {{ "selected" }}
                            @endif
                            class="text-capitalize" value="{{ $value->id }}">{{ $value->ten }}</option>
                      @endforeach
                    </select>
                    <label for="">Tên loại tin :</label>
                    <select class="form-control text-capitalize" name="LoaiTin" id="LoaiTin">
                         <option class="text-capitalize" value=""></option>
                      @foreach($loaitin as $value)
                       {{--  <option class="text-capitalize" value="{{ $value->id }}">{{ $value->ten }}</option> --}}
                        <option 
                            @if($tintuc->id_loai_tin== $value->id)
                            {{ "selected" }}
                            @endif
                            class="text-capitalize" value="{{ $value->id }}">{{ $value->ten }}</option>
                      @endforeach
                    </select>
                     <label for="">Tên hình ảnh :</label>
                     <img src="{{ asset('upload/tintuc/')."/".$tintuc->hinh }}" alt="" style="height:150px; width: 150px; display: block;" >
                     <input type="file" name="myimg" value="{{ $tintuc->hinh }}" />
                     <label for="" style="padding-top: 20px;">Tính chất tin:</label>
                    <div class="radio">
                    <label class="radio-inline"><input type="radio" name="optradio" value="1"
                      @if($tintuc->noi_bat==1)
                      {{ "checked" }}
                      @endif                                                  
                      >Tin nổi bật</label>
                    <label class="radio-inline"><input type="radio" name="optradio" value="0" 
                      @if($tintuc->noi_bat==0)
                      {{ "checked" }}
                      @endif
                      >Tin thường</label>
                      
                    </div>
              			<label for="" class="mt-3" style="margin-top: 20px;">Tiêu đề tin tức:</label>
              			<input type="text" class="form-control" name="tieu_de" placeholder="Nhập tiêu đề" value="{{ $tintuc->tieu_de }}" />
                    <label for="" class="mt-3" style="margin-top: 20px;">Tóm Tắt Nội Dung:</label>
                    <textarea type="text" class="form-control" name="TomTat" placeholder="Nhập tóm tắt" rows="4" value="{{ $tintuc->tom_tat }}">{{ $tintuc->tom_tat }}</textarea>
        		</div>
                <textarea name="editor1" type="text" value="{{ $tintuc->noi_dung }}">{{ $tintuc->noi_dung }}</textarea>
                    <script>
                                CKEDITOR.replace( 'editor1' );
                    </script>
        		<button type="submit" class="btn btn-default">
        		 save
        		</button>
        		<button type="reset" class="btn btn-default">
        			reset
        		</button>
        	</form>
        </div>
        <div class="row" >
          <div class="col-lg-12" style="margin-top: 35px;">
            <div class="table-responsive">
              <table class="table table-bordered table-hover table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Tên Người Dùng</th>
                    <th>Nội Dung</th>
                    <th>Thời Gian CMT</th>
                    <th class="button_edit text-center">Xoá</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach( $tintuc->comment as $value)
                  <tr>
                     <td class="text-capitalize">{{ $value->id }}</td>
                    <td class="text-capitalize">{{ $member->find($value->id_user)->name}}</td>
                    <td class="text-capitalize">{{ $value->noi_dung }}</td>
                    <td class="text-capitalize">{{ $value->created_at }}</td>
                    <td class="text-center"><a href="{{ url("admin/tintuc/xoa/cmt/")."/"}}{{ $value->id }}"><button class="button btn-danger text-center">Xoá</button></a></td>
                  </tr>
                  @endforeach
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
</div>
@endsection
@section('script')
 <script> $(document).ready(function(){
               // alert(' Đã chạy được');
               $("#TheLoai").change(function(){
                 var idTheLoai = $(this).val();
                 $.get("{{ url("admin/ajax/loaitin/")."/" }}"+idTheLoai, function(data){
                        console.log('Data send');
                     $("#LoaiTin").html(data);

                  });
               });
            });
 </script>
@endsection