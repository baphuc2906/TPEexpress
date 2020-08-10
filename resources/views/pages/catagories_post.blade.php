@extends('layouts.layout')
@section('content')
<div class="blog-area section-padding-0-80">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="blog-posts-area">
                        <!-- Single Featured Post 25-28-->
                        <div class="row">
                            @foreach($data->all() as $tintuc)
                            <div class="col-12 col-lg-6">
                                <div class="single-blog-post featured-post mb-30">
                                    <div class="post-thumb">
                                        <a href="#" class="box-img"><img src="{{ asset('upload/tintuc/')."/".$tintuc['hinh'] }}" alt="" class="img-full"></a>
                                    </div>
                                    <div class="post-data">
                                        <a href="#" class="post-catagory">Finance</a>
                                        <?php $catagory=$loai_tin->where('id','=',$tintuc['id_loai_tin'])->first(); ?>
                                        <a href="{{ url('/')."/".$catagory['ten_khong_dau']."/".$tintuc['tieu_de_khong_dau'] }}" class="post-title" style="min-height: 90px;">
                                            <h6>{{ $tintuc['tieu_de'] }}</h6>
                                        </a>
                                        <div class="post-meta">
                                            <p class="post-author">By <a href="#">Christinne Williams</a></p>
                                            <p class="post-excerp">{{ $tintuc['tom_tat'] }}</p>
                                            <!-- Post Like & Post Comment -->
                                            <div class="d-flex align-items-center">
                                                <a href="#" class="post-like"><img src="{{ asset('asset/img/core-img/like.png') }}" alt=""> <span>392</span></a>
                                                <a href="#" class="post-comment"><img src="{{ asset('asset/img/core-img/chat.png') }}" alt=""> <span>{{ $tintuc->comment->count() }}</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="d-flex text-center" style="align-items: center; justify-content: center;">
                    {{ $data->links() }}
                     </div>
                    {{-- <nav aria-label="Page navigation example">
                        <ul class="pagination mt-50">
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item"><a class="page-link" href="#">5</a></li>
                            <li class="page-item"><a class="page-link" href="#">...</a></li>
                            <li class="page-item"><a class="page-link" href="#">10</a></li>
                        </ul>
                    </nav> --}}
                </div>

                <div class="col-12 col-lg-4">
                    <div class="blog-sidebar-area">
                        <!-- Latest Posts Widget -->
                        <div class="latest-posts-widget mb-50">
                              @include('partials.featured_right')
                        </div>
                             @include('partials.popular_news')
                        <!-- Newsletter Widget -->
                        <div class="newsletter-widget mb-50">
                            <h4>Newsletter</h4>
                            <p>Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                            <form action="#" method="post">
                                <input type="text" name="text" placeholder="Name">
                                <input type="email" name="email" placeholder="Email">
                                <button type="submit" class="btn w-100">Subscribe</button>
                            </form>
                        </div>
                        <!-- Latest Comments Widget -->
                        <div class="latest-comments-widget">
                            <h3>Latest Comments</h3>

                            <!-- Single Comments -->
                            <?php $data=$comment->sortByDesc('created_at')->take(4);  ?>
                            @foreach($data as $value)
                            <?php $user=$member->where('id',$value['id_user'])->first(); ?>
                            <div class="single-comments d-flex">
                                <div class="comments-thumbnail mr-15">
                                    <img src="{{ asset('./upload/avatar').'/'.$user->avatar }}" alt="">
                                </div>
                                <div class="comments-text">
                                    <a href="#">{{ $user->name }} <span>on</span> {{ $value['noi_dung']}}</a>
                                    <p>{{ $value['created_at'] }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection