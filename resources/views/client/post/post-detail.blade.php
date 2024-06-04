

@extends('client.layout.master')
@section('content')

<div class="breadcrumb-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-12">
                <div class="breadcrumb-list">
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                            <li class="breadcrumb-item" aria-current="page">Bài viết</li>
                            <li class="breadcrumb-item" aria-current="page">Chi tiết bài viết</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>


<section class="course-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12">

                <div class="blog">
                    <div class="blog-image">
                        <a href="#"><img class="img-fluid" src="{{ $post->thumbnail ? Storage::url($post->thumbnail) : 'https://caodem.com/wp-content/uploads/caodem-hinh-anh-xoa-bai-viet-xoa-luon-hinh-anh-dinh-kem-caodem.jpg' }}"
                                alt="Post Image"></a>
                    </div>
                    <div class="blog-info clearfix">
                        <div class="post-left">
                            <ul>
                                
                                <li><img class="img-fluid" src="/img/icon/icon-22.svg" alt>{{ $post->created_at->format('d/m/Y') }}
                                </li>
                                @foreach($post->post_categories as $category)
                                <li><img class="img-fluid" src="/img/icon/icon-23.svg" alt> <span><a href="{{ route('client.category-detail', ['slug' => $category->slug]) }}">{{ $category->name }}</a></span></li>
                                    @endforeach
                            </ul>
                        </div>
                    </div>
                    <h3 class="blog-title">{{ $post->title }}</h3>
                    <div class="blog-content">
                        {!! $post->content !!}
                    </div>
                    
                </div>

            </div>

            <div class="col-lg-3 col-md-12 sidebar-right theiaStickySidebar">

                <div class="card search-widget blog-search blog-widget">
                    <div class="card-body">
                        <form class="search-form">
                            <div class="input-group">
                                <input type="text" placeholder="Search..." class="form-control">
                                <button type="submit" class="btn btn-primary"><i
                                        class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>


                <div class="card post-widget blog-widget">
                    <div class="card-header">
                        <h4 class="card-title">Bài viết liên quan</h4>
                    </div>
                    <div class="card-body">
                        <ul class="latest-posts">
                            <li>
                                <div class="post-thumb">
                                    <a href="blog-details.html">
                                        <img class="img-fluid" src="/img/blog/blog-01.jpg" alt>
                                    </a>
                                </div>
                                <div class="post-info">
                                    <h4>
                                        <a href="blog-details.html">Learn Webs Applications Development from
                                            Experts</a>
                                    </h4>
                                    <p><img class="img-fluid" src="/img/icon/icon-22.svg" alt>Jun 14, 2022
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="post-thumb">
                                    <a href="blog-details.html">
                                        <img class="img-fluid" src="/img/blog/blog-02.jpg" alt>
                                    </a>
                                </div>
                                <div class="post-info">
                                    <h4>
                                        <a href="blog-details.html">Expand Your Career Opportunities With
                                            Python</a>
                                    </h4>
                                    <p><img class="img-fluid" src="/img/icon/icon-22.svg" alt> 3 Dec 2019
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="post-thumb">
                                    <a href="blog-details.html">
                                        <img class="img-fluid" src="/img/blog/blog-03.jpg" alt>
                                    </a>
                                </div>
                                <div class="post-info">
                                    <h4>
                                        <a href="blog-details.html">Complete PHP Programming Career
                                            Guideline</a>
                                    </h4>
                                    <p><img class="img-fluid" src="/img/icon/icon-22.svg" alt> 3 Dec 2019
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>


                


                <div class="card tags-widget blog-widget tags-card">
                    <div class="card-header">
                        <h4 class="card-title"> Danh mục bài viết</h4>
                    </div>
                    <div class="card-body">
                        <ul class="tags">
                            
                                    @foreach($post->post_categories as $category)
                            <li><a href="{{ route('client.category-detail', ['slug' => $category->slug]) }}" class="tag">{{ $category->name }}</a></li>
                            @endforeach
                            
                        </ul>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>

@endsection