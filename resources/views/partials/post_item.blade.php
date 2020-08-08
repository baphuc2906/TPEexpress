
{{-- {{ dd($data) }} --}}
<div class="post-thumb">
    <a  class="box-img" href="{{ url('/')."/".$catagory['ten_khong_dau']."/".$tintuc['tieu_de_khong_dau'] }}"><img src="{{ asset('upload/tintuc/')."/".$tintuc['hinh'] }}" alt="" class="img-full"  ></a>
</div>
<div class="post-data" style="padding-top: 10px;">
    <a href="{{ url('/')."/".$catagory['ten_khong_dau']."/".$tintuc['tieu_de_khong_dau'] }}" class="post-title" style="min-height: 62px;">
        <h6>{{ $tintuc['tieu_de'] }}</h6>
    </a>
    <div class="post-meta" >
        <div class="post-date"><a href="#">{{ $tintuc['created_at'] }}</a></div>
        <div class="post-meta d-flex align-items-center" style="padding-top: 10px;">
        <a href="#" class="post-like"><img src="{{ asset('asset/img/core-img/like.png') }}" alt=""  > <span>392</span></a>
        <a href="#" class="post-comment"><img src="{{ asset('asset/img/core-img/chat.png') }}" alt=""  > <span>10</span></a>
    </div>
    </div>
</div>