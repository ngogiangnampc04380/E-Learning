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
                @auth
                @if(auth()->check())
                    @if(auth()->user()->role == 1)
                        <a href="/admin/posts" class="btn btn-secondary mb-5"><i class="fa-solid fa-gear"></i> Quản lí bài viết</a>
                    @endif
                @endif
                @endauth
            
               
                    @foreach($posts as $post)
                        <div class="blog">
                            <div class="blog-image">
                                <a href="{{ route('client.post-detail', ['slug' => $post->slug]) }}">
                                    <img class="img-fluid" src="{{ $post->thumbnail ? Storage::url($post->thumbnail) : 'https://caodem.com/wp-content/uploads/caodem-hinh-anh-xoa-bai-viet-xoa-luon-hinh-anh-dinh-kem-caodem.jpg' }}" alt="{{ $post->title }}">
                                </a>
                            </div>
                            <div class="blog-info clearfix">
                                <div class="post-left">
                                    <ul>
                                        <li><img class="img-fluid" src="/img/icon/icon-22.svg" alt>{{ $post->created_at->format('d/m/Y') }}</li>
                                        @foreach($post->post_categories as $category)
                                            <li><img class="img-fluid" src="/img/icon/icon-23.svg" alt> <span><a href="{{ route('client.category-detail', ['slug' => $category->slug]) }}">{{ $category->name }}</a></span></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <h3 class="blog-title"><a href="{{ route('client.post-detail', ['slug' => $post->slug]) }}">{{ $post->title }}</a></h3>
                            <div class="blog-content blog-read">
                                {!! Str::limit($post->content, 200) !!}
                            </div>
                            <a href="{{ route('client.post-detail', ['slug' => $post->slug]) }}" class="read-more btn btn-primary">Xem thêm</a>
                        </div>
                    @endforeach
            
                    <!-- Pagination Links -->
                    <div class="d-flex justify-content-center">
                        {{ $posts->links('pagination::bootstrap-4') }}
                    </div>
                
            </div>
            

            <div class="col-lg-3 col-md-12 sidebar-right theiaStickySidebar">
                <div class="card search-widget blog-search blog-widget">
                    <div class="card-body">
                        <form class="search-form">
                            <div class="input-group">
                                <input type="text" placeholder="Tìm..." class="form-control">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>

                

                <div class="card tags-widget blog-widget tags-card">
                    <div class="card-header">
                        <h4 class="card-title">Danh mục bài viết</h4>
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
