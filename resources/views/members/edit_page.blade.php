@extends('layouts.layout')
@section('content')
<div id="page-wrapper " class="container">
        <div class="row">
          <div class="col-lg-12">
            <h1 class="page-header">Thông tin cá nhân
            	<small>{{ $member->name }}</small>
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
        	<form action="{{ url("member/profile/edit/")."/"}}{{ $member->id }}" method="POST" enctype="multipart/form-data">
        		<input type="hidden" name="_token" value="{{ csrf_token() }}">
        		<div class="form-group">
                    <label for="">Tên :</label>
                    <input type="text" class="form-control" name="name" placeholder="Nhập Họ và Tên" value="{{ $member->name}}" />
                    <label for="">Tên loại tin :</label>
                    <input type="text" class="form-control" name="email" placeholder="Nhập email" value="{{ $member->email }}" />
                    <label for="">Tên hình ảnh :</label>
                    <img src="{{ asset('upload/avatar/')."/".$member->avatar }}" alt="" style="height:150px; width: 150px; display: block;" >
                    <input type="file" name="avatar" value="{{ $member->avatar }}" /><br>
              		<label for="" class="mt-3" style="margin-top: 20px;">Nghề nghiệp :</label>
              		<input type="text" class="form-control" name="profession" placeholder="Nhập nghề ngiệp" value="{{ $member->profession }}" />
                    <label for="" class="mt-3" style="margin-top: 20px;">Số điện thoại :</label>
                    <input type="text" class="form-control" name="phonenum" placeholder="Nhập số điện thoại" value="{{ $member->phonenum }}" />
        		</div>
        		<button type="submit" class="btn btn-default">
        		 save
        		</button>
        		<button type="reset" class="btn btn-default">
        			reset
        		</button>
        	</form>
        </div>
</div>
@endsection