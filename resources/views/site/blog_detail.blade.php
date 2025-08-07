@extends('site.layouts.master')

@section('title'){{ $blog->name }} - {{ $config->web_title }}@endsection
@section('description'){{ strip_tags(html_entity_decode($config->introduction)) }}@endsection
@section('image'){{ @$blog->image->path ?? '' }}@endsection

@section('css')
    <link href="https://fonts.googleapis.com/css2?family=Roboto&family=Georgia&family=Courier+Prime&display=swap" rel="stylesheet">

    <link type="text/css" rel="stylesheet" href="/site/css/editor-content.css">

@endsection

@section('content')
    <!-- Page Title -->
    <section class="page-title-blog parallaxie" style='background-image: url({{ $categoryBlog->image->path ?? '' }})'>
        <div class="container position-relative z-5">
            <div class="content">
                <h1 class="heading">
                    {{ $blog->name }}
                </h1>
                <div class="entry_author">
                    <span class="h6">Written by:</span>
                    <h6 class="name-author">Admin</h6>
                </div>
            </div>
        </div>
    </section>
    <!-- /Page Title -->
    <!-- Blog Detail -->
    <section class="s-blog-detail flat-spacing">
        <div class="container">
            <div class="row flex-wrap-reverse">

                <div class="col-xl-12">
                    <div class="blog-detail_content tf-grid-layout">
                        <div class="box-text">
                            {!! $blog->body !!}
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Blog Detail -->
    <!-- Relate -->
    <section class="flat-spacing pt-0">
        <div class="container">
            <div class="sect-title">
                <h1>Bài viết liên quan</h1>
            </div>
            <div dir="ltr" class="swiper tf-swiper" data-preview="3" data-tablet="3" data-mobile-sm="2" data-mobile="1" data-space-lg="48"
                 data-space-md="30" data-space="15" data-pagination="1" data-pagination-sm="2" data-pagination-md="3" data-pagination-lg="3">
                <div class="swiper-wrapper">

                    @foreach($otherBlogs as $otherBlog)
                        <div class="swiper-slide">
                            <div class="article-blog hover-img4">
                                <div class="blog-image">
                                    <a href="{{ route('front.blogDetail', $otherBlog->slug) }}" class="entry_image img-style4">
                                        <img src="{{ $otherBlog->image->path ?? '' }}" data-src="{{ $otherBlog->image->path ?? '' }}" alt="" class=" lazyload">
                                    </a>
                                </div>
                                <div class="blog-content p-0">
                                    <a href="{{ route('front.blogDetail', $otherBlog->slug) }}" class="entry_name link h4">
                                        {{ $otherBlog->name }}
                                    </a>
                                    <p class="entry_date">{{ \Illuminate\Support\Carbon::parse($otherBlog->created_at)->format('d/m/Y') }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="sw-dot-default tf-sw-pagination"></div>
            </div>
        </div>
    </section>
    <!-- /Relate -->
@endsection

@push('scripts')
    <script>
    </script>
@endpush
