@extends('site.layouts.master')

@section('title'){{ $config->web_title }}@endsection
@section('description'){{ strip_tags(html_entity_decode($config->introduction)) }}@endsection
@section('image'){{@$config->image->path ?? ''}}@endsection

@section('css')
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css"
    />
    <!-- JS Flatpickr -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
@endsection


@section('content')
    <!-- Banner Slider -->
    <div class="tf-slideshow tf-btn-swiper-main">
        <div dir="ltr" class="swiper tf-swiper sw-slide-show slider_effect_fade" data-auto="true" data-loop="true" data-effect="fade"
             data-delay="3000">
            <div class="swiper-wrapper">

                @foreach($banners as $banner)
                    <div class="swiper-slide">
                        <div class="slider-wrap style-2">
                            <div class="sld_image">
                                <img src="{{ $banner->image->path ?? '' }}" data-src="{{ $banner->image->path ?? '' }}" alt="Slider"
                                     class="lazyload scale-item">
                            </div>
                            <div class="sld_content">
                            </div>
                        </div>
                    </div>

                @endforeach

            </div>
            <div class="sw-dot-default tf-sw-pagination"></div>
        </div>
    </div>
    <!-- /Banner Slider -->
    <!-- Category -->
    <section class="flat-spacing">
        <div class="container">
            <h1 class="sect-title text-center title wow fadeInUp" style="margin-bottom: 10px">Danh mục sản phẩm</h1>
            <div dir="ltr" class="swiper tf-swiper wow fadeInUp" data-preview="6" data-tablet="4" data-mobile-sm="3" data-mobile="2"
                 data-space-lg="48" data-space-md="32" data-space="12" data-pagination="2" data-pagination-sm="3" data-pagination-md="4"
                 data-pagination-lg="6">
                <div class="swiper-wrapper">
                    @foreach($categories as $category)
                        <div class="swiper-slide">
                            <a href="{{ route('front.getListProduct', $category->slug) }}" class="widget-collection style-circle hover-img">
                                <div class="collection_image img-style">
                                    <img class="lazyload" src="{{ $category->image->path ?? '' }}" data-src="{{ $category->image->path ?? '' }}" alt="">
                                </div>
                                <p class="collection_name h4 link">
                                    {{ $category->name }}
                                </p>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="sw-dot-default tf-sw-pagination"></div>
            </div>
        </div>
    </section>
    <!-- /Category -->
    <!-- Box Image -->
    <div class="flat-spacing pt-0" style="padding-bottom: 22px; padding-top: 20px !important;">
        <div class="container">
            <div dir="ltr" class="swiper tf-swiper" data-preview="2" data-tablet="2" data-mobile-sm="1" data-mobile="1" data-space-lg="48"
                 data-space-md="32" data-space="12" data-pagination="1" data-pagination-sm="1" data-pagination-md="2" data-pagination-lg="3">
                <div class="swiper-wrapper">
                    <!-- item 1 -->
                    @foreach($imageBlocks as $imgBlock)
                        <div class="swiper-slide">
                            <div class="box-image_V05 type-space-2 hover-img wow fadeInLeft">
                                <a href="{{ $imgBlock->content }}" class="box-image_image img-style" target="_blank">
                                    <img src="{{ $imgBlock->image->path ?? '' }}" data-src="{{ $imgBlock->image->path ?? '' }}" alt="" class="lazyload">
                                </a>
                                <div class="box-image_content">
{{--                                    <p class="sub-title text-primary h6 fw-semibold">{{ $imgBlock->title }}</p>--}}
{{--                                    <h4 class="title">--}}
{{--                                        <a href="shop-default.html" class="link">--}}
{{--                                            {{ $imgBlock->content }}--}}
{{--                                        </a>--}}
{{--                                    </h4>--}}
{{--                                    <a href="shop-default.html" class="tf-btn-line fw-bold letter-space-0">--}}
{{--                                        Shop now--}}
{{--                                    </a>--}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="sw-dot-default tf-sw-pagination"></div>
            </div>
        </div>
    </div>
    <!-- /Box Image -->

    <!-- /Feature Product -->
    <!-- Product On Sale -->

    <!-- /Product On Sale -->
    <!-- Best Seller -->

    <style>


        /* 1. Ép swiper và slide đều nhau về chiều cao */
        .special-swiper {
            display: flex !important;
            align-items: stretch !important;
        }
        .special-swiper .swiper-slide {
            display: flex !important;
            flex-direction: column !important;
        }

        /* 2. Cho card-product full height slide */
        .special-swiper .card-product {
            display: flex !important;
            flex-direction: column !important;
            height: 100% !important;
        }

        /* 3. Override hoàn toàn aspect-ratio-0 */
        .special-swiper .card-product_wrapper.aspect-ratio-0 {
            /* tạo tỉ lệ 1:1 */
            width: 100% !important;
            height: 0 !important;
            padding-bottom: 100% !important;
            position: relative !important;
            overflow: hidden !important;
        }

        /* 4. Ép thẻ <a> ảnh chiếm full wrapper */
        .special-swiper .card-product_wrapper.aspect-ratio-0 > a.product-img {
            position: absolute !important;
            top: 0; left: 0; right: 0; bottom: 0 !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
        }

        /* 5. Ảnh fill và crop đều */
        .special-swiper .card-product_wrapper.aspect-ratio-0 img {
            /* ép full vùng, crop nếu cần */
            width: 100% !important;
            height: 100% !important;
            object-fit: contain !important;
        }



    </style>
    @foreach($categoriesSpecial as $cateSpecial)
        <section class="flat-spacing">
            <div class="container">
                <div class="sect-title type-3 type-2 wow fadeInUp">
                    <h2 class="s-title type-semibold text-nowrap">{{ $cateSpecial->name }}</h2>
                </div>
                @if($cateSpecial->products->count())
                    <div dir="ltr" class="swiper tf-swiper wow fadeInUp" data-preview="5" data-tablet="3" data-mobile-sm="2" data-mobile="2"
                         data-space-lg="48" data-space-md="24" data-space="12" data-pagination="2" data-pagination-sm="2" data-pagination-md="3"
                         data-pagination-lg="4">

                        {{--                        <div class="swiper-wrapper special-swiper">--}}
                        {{--                            @foreach($cateSpecial->products as $product)--}}
                        {{--                            <div class="swiper-slide">--}}
                        {{--                                <div class="card-product style-5">--}}
                        {{--                                    <div class="card-product_wrapper aspect-ratio-0 d-flex">--}}
                        {{--                                        <a href="product-detail.html" class="product-img">--}}
                        {{--                                            <img class="lazyload img-product" src="{{ $product->image->path ?? '' }}"--}}
                        {{--                                                 data-src="{{ $product->image->path ?? '' }}" alt="Product">--}}
                        {{--                                            <img class="lazyload img-hover" src="{{ $product->image_back->path ?? ($product->image->path ?? '') }}"--}}
                        {{--                                                 data-src="{{ $product->image_back->path ?? ($product->image->path ?? '') }}" alt="Product">--}}
                        {{--                                        </a>--}}
                        {{--                                    </div>--}}
                        {{--                                    <div class="card-product_info d-grid">--}}
                        {{--                                        <p class="tag-product text-small">{{$product->name}}</p>--}}
                        {{--                                        <h6 class="name-product">--}}
                        {{--                                            <a href="product-detail.html" class="link">{{$product->name}}e</a>--}}
                        {{--                                        </h6>--}}
                        {{--                                        <div class="rate_wrap w-100">--}}
                        {{--                                            <i class="icon-star text-star"></i>--}}
                        {{--                                            <i class="icon-star text-star"></i>--}}
                        {{--                                            <i class="icon-star text-star"></i>--}}
                        {{--                                            <i class="icon-star text-star"></i>--}}
                        {{--                                            <i class="icon-star text-star"></i>--}}
                        {{--                                        </div>--}}
                        {{--                                        <div class="price-wrap mb-0">--}}
                        {{--                                            <h4 class="price-new">{{ formatCurrency($product->price) }}đ</h4>--}}
                        {{--                                        </div>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                            @endforeach--}}
                        {{--                        </div>--}}
                        <!-- Thêm class bản quyền chỉ cho khối này -->
                        <div class="swiper-wrapper special-swiper">
                            @foreach($cateSpecial->products as $product)
                                <div class="swiper-slide">
                                    <div class="card-product style-5">
                                        <div class="card-product_wrapper aspect-ratio-0 d-flex">
                                            <a href="{{ route('front.getProductDetail', $product->slug) }}" class="product-img">
                                                <img class="lazyload img-product"
                                                     src="{{ $product->image->path ?? '' }}"
                                                     data-src="{{ $product->image->path ?? '' }}"
                                                     alt="Product">
                                                <img class="lazyload img-hover"
                                                     src="{{ $product->image_back->path ?? ($product->image->path ?? '') }}"
                                                     data-src="{{ $product->image_back->path ?? ($product->image->path ?? '') }}"
                                                     alt="Product">
                                            </a>
                                        </div>
                                        <div class="card-product_info d-grid">
                                            <p class="tag-product text-small">{{ $product->category->name ?? '' }}</p>
                                            <h6 class="name-product">
                                                <a href="{{ route('front.getProductDetail', $product->slug) }}" class="link">{{ $product->name }}</a>
                                            </h6>
                                            <div class="rate_wrap w-100">
                                                <i class="icon-star text-star"></i>
                                                <i class="icon-star text-star"></i>
                                                <i class="icon-star text-star"></i>
                                                <i class="icon-star text-star"></i>
                                                <i class="icon-star text-star"></i>
                                            </div>
                                            <div class="price-wrap mb-0">
                                                <h4 class="price-new" style="font-size: 18px">{{ formatCurrency($product->price) }}đ</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>


                        <div class="sw-dot-default tf-sw-pagination d-xl-none"></div>

                    </div>
                @else
                  <p>Dữ liệu đang được cập nhật</p>
                @endif

            </div>
        </section>

    @endforeach
    <!-- /Best Seller -->

    <!-- Feature -->
    <style>
        /* 1. Đặt slide thành flex-column để dễ canh cao */
        .product-swiper .swiper-slide {
            display: flex;
            flex-direction: column;
        }

        /* 2. Ép wrapper ảnh vuông (hoặc tỉ lệ tuỳ bạn) */
        .product-swiper .card-product_wrapper {
            width: 100%;
            aspect-ratio: 1 / 1;       /* hoặc 4/3, 16/9 tuỳ thiết kế */
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* 3. Cho ảnh fill đầy wrapper, giữ tỉ lệ và crop tự động */
        .product-swiper .card-product_wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }

        /* 4. Nếu muốn phần info giãn đều, canh giữa hoặc đẩy xuống dưới */
        .product-swiper .card-product_info {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between; /* hoặc center, tuỳ mục đích */
        }

    </style>
    @foreach($categoriesProduct as $catesProduct)
        <section class="flat-spacing">
            <div class="container">
                <div class="sect-title type-3 type-2 wow fadeInUp">
                    <h2 class="s-title type-semibold">{{ $catesProduct->name }}</h2>
                    <a href="{{ route('front.getListProduct', $catesProduct->slug) }}" class="tf-btn-icon h6 fw-medium">
                        Xem tất cả
                        <i class="icon icon-caret-circle-right"></i>
                    </a>
                </div>
                @if($catesProduct->products->count())
                    <div dir="ltr" class="swiper tf-swiper wrap-sw-over wow fadeInUp" data-preview="3" data-tablet="2" data-mobile-sm="1" data-mobile="1"
                         data-space-lg="48" data-space-md="24" data-space="12" data-pagination="1" data-pagination-sm="1" data-pagination-md="2"
                         data-pagination-lg="3" data-grid="2">
                        <div class="swiper-wrapper product-swiper">
                            @foreach($catesProduct->products as $product)
                                <div class="swiper-slide">
                                    <div class="card-product product-style_list-mini type-2">
                                        <div class="card-product_wrapper">
                                            <a href="{{ route('front.getProductDetail', $product->slug) }}" class="product-img img-style">
                                                <img class="img-product lazyload" src="{{$product->image->path ?? ''}}"
                                                     data-src="{{$product->image->path ?? ''}}" alt="Product">
                                            </a>
                                        </div>
                                        <div class="card-product_info">
                                            <p class="tag-product text-small">{{ $product->category->name ?? '' }}</p>
                                            <h6 class="name-product">
                                                <a href="{{ route('front.getProductDetail', $product->slug) }}" class="text-line-clamp-2 link">{{ $product->name }}r</a>
                                            </h6>
                                            <div class="group-action">
                                                <div class="price-wrap mb-0">
                                                    <h4 class="price-new">{{ formatCurrency($product->price) }}đ</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <!-- Product 1 -->
                        </div>
                        <div class="sw-dot-default tf-sw-pagination"></div>
                    </div>
                @else
                    <p>Dữ liệu đang được cập nhật</p>
                @endif

            </div>
        </section>
    @endforeach

    <!-- Blog -->
    <section style="padding-bottom: 100px">
        <div class="container">
            <div class="sect-title type-3 type-2 wow fadeInUp">
                <h2 class="s-title type-semibold text-nowrap">Tin tức mới nhất</h2>
                <a href="{{ route('front.blogs') }}" class="tf-btn-icon h6 fw-medium text-nowrap">
                    Xem tất cả
                    <i class="icon icon-caret-circle-right"></i>
                </a>
            </div>
            <style>
                /* 1. Ép .swiper-wrapper thành flex (thực ra Swiper đã để flex;
    chúng ta chỉ cần chắc chắn align-items:stretch) */
                .blog-swiper .swiper-wrapper {
                    display: flex;
                    align-items: stretch; /* stretch=đều cao */
                }

                /* 2. Mỗi slide nội dung flex-column, fill 100% chiều cao wrapper */
                .blog-swiper .swiper-slide {
                    display: flex;
                }
                .blog-swiper .swiper-slide .article-blog {
                    display: flex;
                    flex-direction: column;
                    flex: 1;                /* fill hết chiều cao của slide */
                }

                /* 3. Ép khung ảnh tỉ lệ 16:9 (có thể đổi thành 4/3, 1/1 tuỳ muốn) */
                .blog-swiper .entry_image {
                    width: 100%;
                    aspect-ratio: 16 / 9;
                    overflow: hidden;
                }
                .blog-swiper .entry_image img {
                    width: 100%;
                    height: 100%;
                    object-fit: cover;      /* crop đều, giữ tỉ lệ */
                    object-position: center;
                    display: block;
                }

                /* 4. Phần nội dung “blog-content” fill phần còn lại và căn đều */
                .blog-swiper .blog-content {
                    flex: 1;
                    display: flex;
                    flex-direction: column;
                    justify-content: space-between;
                }

                /* 5. Giới hạn số dòng intro để tránh slide giãn quá cao */
                .blog-swiper .blog-content .text {
                    display: -webkit-box;
                    -webkit-line-clamp: 3;        /* chỉ 3 dòng */
                    -webkit-box-orient: vertical;
                    overflow: hidden;
                }

            </style>
            <div dir="ltr" class="swiper tf-swiper" data-preview="3" data-tablet="3" data-mobile-sm="2" data-mobile="1" data-space-lg="48"
                 data-space-md="32" data-space="12" data-pagination="1" data-pagination-sm="2" data-pagination-md="3" data-pagination-lg="3">
                <div class="swiper-wrapper blog-swiper">
                    <!-- item 1 -->
                    @foreach($posts as $post)
                        <div class="swiper-slide">
                            <div class="article-blog type-space-2 hover-img4 wow fadeInLeft">
                                <a href="{{ route('front.blogDetail', $post->slug) }}" class="entry_image img-style4">
                                    <img src="{{ $post->image->path ?? '' }}" data-src="{{ $post->image->path ?? '' }}" alt="Blog" class="lazyload aspect-ratio-0">
                                </a>
                                <div class="entry_tag">
                                    <a href="{{ route('front.blogDetail', $post->slug) }}" class="name-tag h6 link">{{ \Illuminate\Support\Carbon::parse($post->created_at)->format('d/m/Y') }}</a>
                                </div>

                                <div class="blog-content">
                                    <a href="{{ route('front.blogDetail', $post->slug) }}" class="entry_name link h4">
                                       {{ $post->name }}
                                    </a>
                                    <p class="text h6">
                                        {{ $post->intro }}
                                    </p>
                                    <a href="{{ route('front.blogDetail', $post->slug) }}" class="">
                                        Đọc thêm
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="sw-dot-default tf-sw-pagination"></div>
            </div>
        </div>
    </section>
    <!-- /Blog -->

@endsection

@push('scripts')
@endpush
