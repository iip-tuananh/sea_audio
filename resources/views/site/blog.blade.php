@extends('site.layouts.master')
@section('title'){{ $categoryBlog->name ?? 'Tin tức và hoạt động' }}@endsection
@section('description'){{ strip_tags(html_entity_decode($config->introduction)) }}@endsection
@section('image'){{ @$categoryBlog->image->path ?? '' }}
@endsection

@section('css')

@endsection

@section('content')
    <!-- Page Title -->
    @if(@$categoryBlog)
        <section class="s-page-title parallaxie has-bg" style='background-image: url({{ @$categoryBlog->image->path ?? '' }})'>
            <div class="container position-relative z-5">
                <div class="content">
                    <h1 class="title-page text-white">Tin tức</h1>
                    <ul class="breadcrumbs-page">
                        <li><a href="{{ route('front.home-page') }}" class="h6 text-white link">Trang chủ</a></li>
                        <li class="d-flex"><i class="icon icon-caret-right text-white"></i></li>
                        <li>
                            <h6 class="current-page fw-normal text-white">{{ $categoryBlog ? $categoryBlog->name : 'Tin tức' }}</h6>
                        </li>
                    </ul>
                </div>
            </div>
        </section>

    @else
        <section class="s-page-title">
            <div class="container">
                <div class="content">
                    <h1 class="title-page">Tin tức</h1>
                    <ul class="breadcrumbs-page">
                        <li><a href="{{ route('front.home-page') }}" class="h6 link">Trang chủ</a></li>
                        <li class="d-flex"><i class="icon icon-caret-right"></i></li>
                        <li>
                            <h6 class="current-page fw-normal">Tin tức</h6>
                        </li>
                    </ul>
                </div>
            </div>
        </section>

    @endif

    <!-- /Page Title -->
    <!-- Blog List -->
    <style>
        /* 1. Container các card cho phép các .article-blog cùng cao */
        .tf-grid-layout.row-xl-gap-40 {
            display: grid;
            grid-template-columns: 1fr;          /* mỗi card 100% width, nếu cần 2 cột: repeat(2,1fr) */
            row-gap: 40px;                       /* khoảng cách giữa các row */
            align-items: stretch;               /* ép tất cả .article-blog cùng cao */
        }

        /* 2. Mỗi card thành flex row, ảnh – nội dung */
        .tf-grid-layout.row-xl-gap-40 .article-blog.style-row {
            display: flex;
            flex-direction: row;
            align-items: stretch;
            height: 100%;
        }

        /* 3. Wrapper ảnh cố định tỉ lệ 16:9 (thay đổi tuỳ bạn) */
        .tf-grid-layout.row-xl-gap-40 .entry_image {
            flex: 0 0 40%;                       /* dành 40% width cho ảnh */
            aspect-ratio: 16 / 9;                /* ép khung ảnh luôn 16:9 */
            overflow: hidden;
        }

        /* 4. <img> phủ đầy khung, crop tự động */
        .tf-grid-layout.row-xl-gap-40 .entry_image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            display: block;
        }

        /* 5. Phần content chiếm hết không gian còn lại và flex-column */
        .tf-grid-layout.row-xl-gap-40 .blog-content {
            flex: 1;
            padding-left: 20px;                  /* khoảng cách giữa ảnh và text */
            display: flex;
            flex-direction: column;
            justify-content: stretch;
        }

        /* 6. Giới hạn số dòng cho intro, tránh text quá dài phá layout */
        .tf-grid-layout.row-xl-gap-40 .blog-content .text {
            display: -webkit-box;
            -webkit-line-clamp: 3;               /* giới hạn 3 dòng */
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* 7. (Tuỳ chọn) Đảm bảo tiêu đề và ngày không kéo căng quá */
        .tf-grid-layout.row-xl-gap-40 .entry_name,
        .tf-grid-layout.row-xl-gap-40 .entry_date {
            margin-bottom: 8px;
        }

        @media (max-width: 767px) {
            /* 1. Chuyển flex row thành column */
            .tf-grid-layout.row-xl-gap-40 .article-blog.style-row {
                flex-direction: column;
            }
            /* 2. Ép ảnh full‐width, giữ ratio 16:9 */
            .tf-grid-layout.row-xl-gap-40 .entry_image {
                flex: 0 0 auto;
                width: 100% !important;
                aspect-ratio: 16 / 9;
                margin-bottom: 16px; /* khoảng cách giữa ảnh và nội dung */
            }
            /* 3. Bỏ padding-left để text sát lề */
            .tf-grid-layout.row-xl-gap-40 .blog-content {
                padding-left: 0;
            }
        }

    </style>
    <div class="flat-spacing">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-8">
                    <div class="tf-grid-layout row-xl-gap-40">
                        @foreach($blogs as $blog)
                            <div class="article-blog style-row hover-img4">
                                <a href="{{ route('front.blogDetail', $blog->slug) }}" class="entry_image img-style4">
                                    <img src="{{ $blog->image->path ?? '' }}" data-src="{{ $blog->image->path ?? '' }}" alt="" class="lazyload">
                                </a>
                                <div class="blog-content">
                                    <a href="{{ route('front.blogDetail', $blog->slug) }}" class="entry_date name-tag h6 link">{{ \Illuminate\Support\Carbon::parse($blog->created_at)->format('d/m/Y') }}</a>
                                    <a href="{{ route('front.blogDetail', $blog->slug) }}" class="entry_name link h4">
                                        {{ $blog->name }}
                                    </a>
                                    <p class="text h6">
                                        {{ $blog->intro }}
                                    </p>
                                    <a href="{{ route('front.blogDetail', $blog->slug) }}" class="tf-btn-line">
                                       Đọc thêm
                                    </a>
                                </div>
                            </div>
                        @endforeach



                            <!-- Pagination -->
                            {{ $blogs->links('site.pagination.paginate2') }}


                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 d-none d-lg-block">
                    <div class="blog-sidebar sidebar-content-wrap sticky-top">
                        <div class="sidebar-item">
                            <h4 class="sb-title">Danh mục</h4>
                            <ul class="sb-category">
                                @foreach($categories as $cate)
                                    <li><a href="{{ route('front.blogs', $cate->slug) }}" class="h6 link">{{ $cate->name }}<span>{{ $cate->posts_count }}</span></a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="sidebar-item">
                            <h4 class="sb-title">Bài viết gần đây</h4>
                            <ul class="sb-recent">
                                @foreach($othersPost as $otherPost)
                                    <li class="wg-recent hover-img">
                                        <a href="{{ route('front.blogDetail', $otherPost->slug) }}" class="image img-style">
                                            <img src="{{ $otherPost->image->path ?? '' }}" data-src="images/blog/recent-1.jpg" alt="Recent Post">
                                        </a>
                                        <div class="content">
                                            <a href="{{ route('front.blogDetail', $otherPost->slug) }}" class="entry_name h6 link">{{ $otherPost->name }}</a>
                                            <span class="entry_date text-small">
                                               {{ \Illuminate\Support\Carbon::parse($otherPost->created_at)->format('d/m/Y') }}
                                            </span>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Blog List -->
@endsection

@push('scripts')


@endpush
