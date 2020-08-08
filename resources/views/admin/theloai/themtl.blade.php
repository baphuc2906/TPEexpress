@extends('layouts.app')

@section('content')
<div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h1 class="page-header">Thể Loại
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
        	<form action="{{ url('admin/theloai/them') }}" method="POST">
        		<input type="hidden" name="_token" value="{{ csrf_token() }}">
        		<div class="form-group">
        			<label for="">Tên thể loại</label>
        			<input type="text" class="form-control" name="Ten" placeholder="Nhập tên thể loại"/>
        		</div>
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