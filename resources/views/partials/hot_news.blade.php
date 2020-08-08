<div class="hero-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-8">
                    <!-- Breaking News Widget -->
                    <div class="breaking-news-area d-flex align-items-center">
                        <div class="news-title">
                            <p>Breaking News</p>
                        </div>
                        <div id="breakingNewsTicker" class="ticker">
                            <ul>
                                <?php $data=$tin_tuc->sortByDesc('created_at')->take(3); 
                                ?>
                                @foreach($data->all() as $tintuc)
                                <?php $catagory= $loai_tin->where('id','=', $tintuc->id_loai_tin)->first() ?>
                                <li><a href="{{ url('/').'/'.$catagory['ten_khong_dau'].'/'.$tintuc['tieu_de_khong_dau'] }}">{{ $tintuc['tieu_de'] }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <!-- Breaking News Widget -->
                    <div class="breaking-news-area d-flex align-items-center mt-15">
                        <div class="news-title title2">
                            <p>International</p>
                        </div>
                        <div id="internationalTicker" class="ticker">
                            <ul>
                                <?php $data=$the_loai->where('ten_khong_dau', 'the-gioi')->first();
                                    $data=$data->tintuc->sortByDesc('created_at')->take(3);
                                ?>
                                @foreach($data->all() as $tintuc)
                                 <?php $catagory= $loai_tin->where('id','=', $tintuc->id_loai_tin)->first() ?>
                                <li><a href="{{ url('/').'/'.$catagory['ten_khong_dau'].'/'.$tintuc['tieu_de_khong_dau'] }}">{{ $tintuc['tieu_de'] }}</a></li>
                                @endforeach
                                {{-- <li><a href="{{ url('/').'/'.$catagory['ten_khong_dau'].'/'.$tintuc['tieu_de_khong_dau'] }}">ANH YÊU EM MIN</a></li>
                                <li><a href="{{ url('/').'/'.$catagory['ten_khong_dau'].'/'.$tintuc['tieu_de_khong_dau'] }}">ANH YÊU EM MIN</a></li>
                                <li><a href="{{ url('/').'/'.$catagory['ten_khong_dau'].'/'.$tintuc['tieu_de_khong_dau'] }}">ANH YÊU EM MIN</a></li> --}}
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Hero Add -->
                <div class="col-12 col-lg-4">
                    <div class="hero-add">
                        <a href="#"><img src="{{ asset('asset/img/bg-img/hero-add.gif')}}" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>