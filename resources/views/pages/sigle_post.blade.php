@extends('layouts.layout')
@section('content')
<div class="blog-area section-padding-0-80">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="blog-posts-area">
                        <!-- Single Featured Post -->
                        <?php $comment=$comment->where('id_tin_tuc','=',$data['id']); 
                            ?>
                        <div class="single-blog-post featured-post single-post">
                            <div class="post-thumb">
                                <a href="#"><img src="{{ asset('upload/tintuc'."/".$data['hinh']) }}" alt="" style="width:100%; "></a>
                            </div>
                            <div class="post-data">
                                <a href="#" class="post-catagory">Finance</a>
                                <a href="#" class="post-title">
                                    <h6>{{ $data['tieu_de'] }}</h6>
                                </a>
                                <div class="post-meta">
                                    <p class="post-author">By <a href="#">{{ $data['user'] }}</a></p>
                                    <p style="text-align: justify;">{{ $data['tom_tat'] }}</p>
                                    <p style="text-align: justify;">{{ substr(strip_tags($new_str = str_replace("&nbsp;", ' ', $data['noi_dung'])) , 0,100000) }}</p> 
                                   
                                    <div class="newspaper-post-like d-flex align-items-center justify-content-between">
                                        <!-- Tags -->
                                        <div class="newspaper-tags d-flex">
                                            <span>Tags:</span>
                                            <ul class="d-flex">
                                                <li><a href="#">finacial,</a></li>
                                                <li><a href="#">politics,</a></li>
                                                <li><a href="#">stock market</a></li>
                                            </ul>
                                        </div>

                                        <!-- Post Like & Post Comment -->
                                        <div class="d-flex align-items-center post-like--comments">
                                            <a href="#" class="post-like"><img src="{{ asset('asset/img/core-img/like.png') }}" alt=""> <span>392</span></a>
                                            <a href="#" class="post-comment"><img src="{{ asset('asset/img/core-img/chat.png') }}" alt=""> <span>{{$comment->count()}}</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- About Author -->
                        <div class="blog-post-author d-flex">
                            <div class="author-thumbnail">
                                <img src="img/bg-img/32.jpg" alt="">
                            </div>
                            <div class="author-info">
                                <a href="#" class="author-name">James Smith, <span>The Author</span></a>
                                <p>Donec turpis erat, scelerisque id euismod sit amet, fermentum vel dolor. Nulla facilisi. Sed pellen tesque lectus et accu msan aliquam. Fusce lobortis cursus quam, id mattis sapien.</p>
                            </div>
                        </div>

                        <div class="pager d-flex align-items-center justify-content-between">
                            <div class="prev">
                                <a href="#" class="active"><i class="fa fa-angle-left"></i> previous</a>
                            </div>
                            <div class="next">
                                <a href="#">Next <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>

                        <div class="section-heading">
                            <h6>Related</h6>
                        </div>

                        <div class="row">
                            <!-- Single Post -->
                           
                            <?php $data1=$tin_tuc->where('id_loai_tin',$data['id_loai_tin'])->sortByDesc('created_at')->take(3); 
                            ?>
                            @foreach($data1->all() as $tintuc)
                            <?php $catagory= $loai_tin->where('id','=' ,$tintuc['id_loai_tin'])->first();  ?>
                            <div class="col-12 col-md-4">
                                <div class="single-blog-post style-3 mb-80">
                                    @include('partials.post_item',['tintuc'=>$tintuc, 'catagory'=>$catagory])
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <!-- Comment Area Start -->
                        <div class="comment_area clearfix">
                            <?php $comment=$comment->where('id_tin_tuc','=',$data['id']); 
                            ?>
                            <h5 class="title">{{ $comment->count() }} Comments</h5>
                            @foreach($comment as $value)
                            <ol>
                                <!-- Single Comment Area -->
                                <li class="single_comment_area">
                                    <!-- Comment Content -->
                                    <div class="comment-content d-flex">
                                        <!-- Comment Author -->
                                        <div class="comment-author">
                                            <img src="{{ asset('upload/avatar'.'/'.$member->find($value->id_user)->avatar) }}" alt="author">
                                        </div>
                                        <!-- Comment Meta -->
                                        <div class="comment-meta">
                                            <a href="#" class="post-author">{{ $member->find($value->id_user)->name }}</a>
                                            <a href="#" class="post-date">{{ $value->created_at }}</a>
                                            <p>{{ $value->noi_dung}}</p>
                                        </div>
                                    </div>
                                </li>
                            </ol>
                            @endforeach
                        </div>

                        <div class="post-a-comment-area section-padding-80-0">
                            <h4>Leave a comment</h4>
                            
                            <!-- Reply Form -->
                            <div class="contact-form-area">
                                <form action="#" method="post">
                                    <div class="row">
                                        <div class="col-12">
                                            <?php $catagory= $loai_tin->where('id','=' ,$data['id_loai_tin'])->first();  ?>
                                            <form  class="form" action="{{ url('/').$catagory['ten_khong_dau']."/".$data['tieu_de_khong_dau'] }}" method="post">
                                                @csrf
                                            <textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Message"></textarea>
                                            </form>
                                        </div>
                                        <div class="col-12 text-center">
                                            <button class="btn newspaper-btn mt-30 w-100" type="submit">Submit Comment</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
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
                            <div class="single-comments d-flex">
                                <div class="comments-thumbnail mr-15">
                                    <img src="img/bg-img/29.jpg" alt="">
                                </div>
                                <div class="comments-text">
                                    <a href="#">Jamie Smith <span>on</span> Facebook is offering facial recognition...</a>
                                    <p>06:34 am, April 14, 2018</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection