@extends('layouts.layout')

@section('content')
    <div class="featured-post-area">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-8">
                    <div class="row">
                        <?php $data=$tin_tuc->where('noi_bat',1)->sortByDesc('created_at')->take(3); 
                             $tin1=$data->shift();   
                        ?>
                        @if(count($data)>0)
                        {{-- {{ dd($data) }} --}}
                        <div class="col-12 col-lg-7">
                            <div class="single-blog-post featured-post">
                                <div class="post-thumb">
                                    <?php $catagory= $loai_tin->where('id','=' ,$tin1['id_loai_tin'])->first();  ?>
                                   {{--  {{ dd($catagory) }} --}}
                                    <a   href="{{ url('/')."/".$catagory['ten_khong_dau']."/".$tin1['tieu_de_khong_dau'] }}"><img src="{{ asset('upload/tintuc/')."/".$tin1['hinh'] }}" alt=""  ></a>
                                </div>
                                <div class="post-data">
                                    <a href="#" class="post-catagory">Finance</a>
                                    <a href="{{ url('/')."/".$catagory['ten_khong_dau']."/".$tin1['tieu_de_khong_dau'] }}" class="post-title">
                                        <h6>{{ $tin1["tieu_de"]}}</h6>
                                    </a>
                                    <div class="post-meta">
                                        <p class="post-author">By <a href="#">Christinne Williams</a></p>
                                        <p class="post-excerp">{{ $tin1['tom_tat'] }}</p>
                                        <!-- Post Like & Post Comment -->
                                        <div class="d-flex align-items-center">
                                            <a href="#" class="post-like"><img src="{{ asset('asset/img/core-img/like.png') }}" alt=""  > <span>392</span></a>
                                            <a href="#" class="post-comment"><img src="{{ asset('asset/img/core-img/chat.png') }}" alt=""  > <span>10</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-5">
                            @foreach($data->all() as $tintuc)
                            <?php $catagory= $loai_tin->where('id','=' ,$tintuc['id_loai_tin'])->first();  ?>
                             <div class="single-blog-post featured-post-2">
                                <div class="post-thumb">
                                    <a   href="{{ url('/')."/".$catagory['ten_khong_dau']."/".$tintuc['tieu_de_khong_dau'] }}"><img src="{{asset('upload/tintuc/')."/".$tintuc['hinh'] }}" alt=""  ></a>
                                </div>
                                <div class="post-data">
                                    <a href="#" class="post-catagory">Finance</a>
                                    <div class="post-meta">
                                        <a href="{{ url('/')."/".$catagory['ten_khong_dau']."/".$tintuc['tieu_de_khong_dau'] }}" class="post-title">
                                            <h6>{{ $tintuc['tieu_de'] }}</h6>
                                        </a>
                                         <p class="post-author">By <a href="#">Christinne Williams</a></p>
                                        <!-- Post Like & Post Comment -->
                                        <div class="d-flex align-items-center">
                                            <a href="#" class="post-like"><img src="{{ asset('asset/img/core-img/like.png') }}" alt=""  > <span>392</span></a>
                                            <a href="#" class="post-comment"><img src="{{ asset('asset/img/core-img/chat.png') }}" alt=""  > <span>10</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                @include('partials.featured_right')
                </div>
            </div>                
        </div>
    </div>
    <!-- ##### Featured Post Area End ##### -->
    <!-- ##### Popular News Area Start ##### 12-15 -->
    <div class="popular-news-area section-padding-80-50">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-9">
                        <!-- Single Post -->
                    @foreach($the_loai as $value)
                    <?php $data=$value->tintuc->sortByDesc('created_at')->take(3)?>
                    @if($value->ten_khong_dau=="kinh-doanh" || $value->ten_khong_dau=="phap-luat")
                    <div class="section-heading">
                        <h6 class="text-capitalize">{{ $value->ten }}</h6>
                    </div>
                    <div class="row">
                        <!-- Single Post -->
                        @foreach($data->all() as $tintuc)
                        <?php $catagory= $loai_tin->where('id','=' ,$tintuc['id_loai_tin'])->first();  ?>
                        <div class="col-12 col-lg-4">
                            <div class="single-blog-post">
                                <div class="post-thumb">
                                    <a  class="box-img" href="{{ url('/')."/".$catagory['ten_khong_dau']."/".$tintuc['tieu_de_khong_dau'] }}"><img src="{{ asset('upload/tintuc/')."/".$tintuc['hinh'] }}" alt="" class="img-full"  ></a>
                                </div>
                                <div class="post-data" style="padding-top: 10px;">
                                    <a href="{{ url('/').'/'.$catagory['ten_khong_dau'].'/'.$tintuc['tieu_de_khong_dau'] }}" class="post-title" style="min-height: 62px;">
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
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                    @endforeach
                </div>
                <div class="col-12 col-lg-3">
                    <div class="section-heading">
                        <h6>Info</h6>
                    </div>
                    <!-- Popular News Widget -->
                    @include('partials.popular_news')
                    <!-- Newsletter Widget -->
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Popular News Area End ##### -->

    <!-- ##### Video Post Area Start ##### -->
    @include('partials.video_post')
    <!-- ##### Video Post Area End ##### -->

    <!-- ##### Editorial Post Area Start ##### -->
    <div class="editors-pick-post-area section-padding-80-50">
        <div class="container">
            <div class="row">
                <!-- Editors Pick -->
                <div class="col-12 col-md-7 col-lg-9">
                    @foreach($the_loai as $value)
                    <?php $data=$value->tintuc->sortByDesc('created_at')->take(3)?>
                    @if($value->ten_khong_dau=="doi-song" || $value->ten_khong_dau=="nghe-thuat" || $value->ten_khong_dau=="the-thao")
                    <div class="section-heading">
                        <h6 class="text-capitalize">{{ $value->ten }}</h6>
                    </div>
                    <div class="row">
                        <!-- Single Post -->
                        @foreach($data->all() as $tintuc)
                        <?php $catagory= $loai_tin->where('id','=' ,$tintuc['id_loai_tin'])->first();  ?>
                        <div class="col-12 col-lg-4">
                            <div class="single-blog-post">
                                @include('partials.post_item', ['tintuc'=>$tintuc , 'catagory'=>$catagory ]);
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                    @endforeach
                </div>

                <!-- World News -->
                <div class="col-12 col-md-5 col-lg-3">
                    <div class="section-heading">
                        <h6>World News</h6>
                    </div>

                    <!-- Single Post 7->11 -->
                    @foreach($the_loai as $value)
                    @if($value->ten_khong_dau== "the-gioi")
                    <?php 
                          $data=$value->tintuc->sortByDesc('created_at')->take(7);
                    ?>
                    @foreach($data->all() as $tintuc)
                    <?php $catagory= $loai_tin->where('id','=' ,$tintuc['id_loai_tin'])->first();  ?>
                    <div class="single-blog-post style-2">
                        <div class="post-thumb">
                            <a  href="{{ url('/')."/".$catagory['ten_khong_dau']."/".$tintuc['tieu_de_khong_dau'] }}"><img src="{{ asset('upload/tintuc/')."/".$tintuc['hinh'] }}" alt="" ></a>
                        </div>
                        <div class="post-data">
                            <a href="{{ url('/')."/".$catagory['ten_khong_dau']."/".$tintuc['tieu_de_khong_dau'] }}" class="post-title">
                                <h6>{{ $tintuc['tieu_de'] }}</h6>
                            </a>
                            <div class="post-meta">
                                <div class="post-date"><a href="">{{ $tintuc['created_at'] }}</a></div>
                                
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                    @endforeach
                    <!-- Single Post -->
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Editorial Post Area End ##### -->

    <!-- ##### Footer Add Area Start ##### -->
    <div class="footer-add-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="footer-add">
                        <a href="#"><img src="{{ asset('asset/img/bg-img/footer-add.gif')}}" alt=""  ></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection    