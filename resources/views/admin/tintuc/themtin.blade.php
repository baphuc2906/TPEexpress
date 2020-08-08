@extends('layouts.app')

@section('content')
<div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h1 class="page-header">Bài Viết
            	<small>thêm</small>
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
        	<form action="{{ url('admin/tintuc/them') }}" method="POST" enctype="multipart/form-data">
        		<input type="hidden" name="_token" value="{{ csrf_token() }}">
        		<div class="form-group">
                    {{-- Tên thể loại: --}}
                    <label for="" style="padding-top: 20px;">Tên thể loại :</label>
                    <select class="form-control text-capitalize" name="TheLoai" id="TheLoai">
                         <option class="text-capitalize" value=""></option>
                      @foreach($theloai as $value)
                        <option class="text-capitalize" value="{{ $value->id }}">{{ $value->ten }}</option>
                      @endforeach
                    </select>
                    {{-- Tên loại tin --}}
                    <label for="" style="padding-top: 20px;">Tên loại tin :</label>
                    <select class="form-control text-capitalize" name="LoaiTin" id="LoaiTin">
                         <option class="text-capitalize" value=""></option>
                      @foreach($loaitin as $value)
                        <option class="text-capitalize" value="{{ $value->id }}">{{ $value->ten }}</option>
                      @endforeach
                    </select>
                    {{-- Hình ảnh --}}
                    <label for="" style="padding-top: 20px;">Tên hình ảnh :</label>
                    <input type="file" name="myimg" />
                    {{-- Secltion tin nổi bật --}}
                    <label for="" style="padding-top: 20px;">Tính chất tin:</label>
                    <div class="radio">
                    <label class="radio-inline"><input type="radio" name="optradio" value="1"
                      {{-- @if($tintuc->noi_bat==1)
                      {{ "checked" }}
                      @endif   --}}                                                
                      >Tin nổi bật</label>
                    <label class="radio-inline"><input type="radio" name="optradio" value="0" 
                      {{-- @if($tintuc->noi_bat==0)
                      {{ "checked" }}
                      @endif --}}
                      >Tin thường</label>
                    </div>
                    {{-- Nhập tiêu đề tin tức --}}
              			<label for="" class="mt-3" style="margin-top: 20px;">Tiêu đề tin tức:</label>
              			<input type="text" class="form-control" name="tieu_de" placeholder="Nhập tiêu đề"/>
                    <label for="" class="mt-3" style="margin-top: 20px;">Tóm Tắt Nội Dung:</label>
                    <textarea type="text" class="form-control" name="TomTat" placeholder="Nhập tóm tắt" rows="4" value=""></textarea>
        		</div>
                    <textarea name="editor1" placeholder="Nhập nội dung" style="padding-bottom: 20px;"></textarea>
                    <script>
                                CKEDITOR.replace( 'editor1' );
                    </script>
        		<button type="submit" class="btn btn-default">
        			add
        		</button>
        		<button type="reset" class="btn btn-default">
        			reset
        		</button>
        	</form>
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