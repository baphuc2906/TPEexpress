       {{-- 19->24 --}}

    <!-- Single Featured Post -->
    @foreach($the_loai as $value)
    {{-- Trong mỗi vòng lặp foreach sẽ lấy 1 giá trị đưa vào biến data --}}
    <?php $data=$value->tintuc->sortByDesc('created_at')->take(1); 
      ?>
    {{-- Sử dụng vòng lặp $data->all() để lấy tất cả dữ liệu trong data --}}
    @foreach($data->all() as $tintuc)
    <?php $catagory=$loai_tin->where('id','=',$tintuc['id_loai_tin'])->first() ?>
    <div class="single-blog-post small-featured-post d-flex">
        <div class="post-thumb">
            <a href="{{ url('/')."/".$catagory['ten_khong_dau']."/".$tintuc['tieu_de_khong_dau'] }}"><img src="{{ asset('upload/tintuc')."/".$tintuc['hinh'] }}" alt=""></a>
        </div>
        <div class="post-data">
            <a href="#" class="post-catagory">Finance</a>
            <div class="post-meta">
                <a href="{{ url('/')."/".$catagory['ten_khong_dau']."/".$tintuc['tieu_de_khong_dau'] }}" class="post-title">
                    <h6>{{ $tintuc['tieu_de'] }}</h6>
                </a>
                <p class="post-date"><span>7:00 AM</span> | <span>April 14</span></p>
            </div>
        </div>
    </div>
    @endforeach
    @endforeach
