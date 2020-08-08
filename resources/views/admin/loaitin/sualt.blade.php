@extends('layouts.app')

@section('content')
<div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h1 class="page-header">Loại Tin
            	<small>{{ $loaitin->ten }}</small>
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
        	<form action="{{ url("admin/loaitin/sua")."/"}}{{ $loaitin->id }}" method="POST">
        		<input type="hidden" name="_token" value="{{ csrf_token() }}">
        		<div class="form-group">
                    <label for="">Tên thể loại :</label>
                    <select class="form-control text-capitalize" name="TheLoai">
                         
                      @foreach($theloai as $value)
                        <option 
                            @if($loaitin->id_the_loai== $value->id)
                            {{ "selected" }}
                            @endif
                            class="text-capitalize" value="{{ $value->id }}">{{ $value->ten }}</option>
                      @endforeach
                    </select>
        			<label for="">Tên loại tin :</label>
        			<input type="text" class="form-control text-capitalize" name="Ten" placeholder="Nhập tên thể loại" value="{{ $loaitin->ten }}" />
        		</div>
        		<button type="submit" class="btn btn-default">
        			edit
        		</button>
        		<button type="reset" class="btn btn-default">
        			reset
        		</button>
        	</form>
        </div>
</div>
@endsection