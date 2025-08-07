@extends('site.layouts.master')

@section('title')Sản phẩm - {{ $config->web_title }}@endsection
@section('description'){{ strip_tags(html_entity_decode($config->introduction)) }}@endsection
@section('image'){{@$config->image->path ?? ''}}@endsection

@section('css')
    <link rel="stylesheet" href="/site/css/drift-basic.min.css">
    <link rel="stylesheet" href="/site/css/photoswipe.css">
@endsection

@section('content')
    <!-- /Header -->
    <!-- Page Title -->
    <section class="s-page-title style-2">
        <div class="container">
            <div class="content">
                <ul class="breadcrumbs-page">
                    <li><a href="{{ route('front.home-page') }}" class="h6 link">Trang chủ</a></li>
                    <li class="d-flex"><i class="icon icon-caret-right"></i></li>
                    <li><a href="{{ route('front.getListProduct', $product->category->slug ?? '') }}" class="h6 link">{{ $product->category->name ?? 'Sản phẩm' }}</a></li>
                    <li class="d-flex"><i class="icon icon-caret-right"></i></li>
                    <li>
                        <h6 class="current-page fw-normal">{{ $product->name }}</h6>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- /Page Title -->
    <!-- Product Main -->
    <section class="flat-single-product flat-spacing-3">
        <div class="tf-main-product section-image-zoom">
            <div class="container">
                <div class="row">
                    <!-- Product Images -->
                    <div class="col-md-6">
                        <div class="tf-product-media-wrap sticky-top">
                            <div class="product-thumbs-slider">
                                <div dir="ltr" class="swiper tf-product-media-thumbs other-image-zoom" data-direction="vertical"
                                     data-preview="4.7">
                                    <div class="swiper-wrapper stagger-wrap">
                                        <div class="swiper-slide stagger-item">
                                            <div class="item">
                                                <img class="lazyload" data-src="{{ $product->image->path ?? '' }}"
                                                     src="{{ $product->image->path ?? '' }}" alt="img-product">
                                            </div>
                                        </div>
                                        @foreach($product->galleries as $gallery)
                                            <div class="swiper-slide stagger-item">
                                                <div class="item">
                                                    <img class="lazyload" data-src="{{ $gallery->image->path ?? '' }}"
                                                         src="{{ $gallery->image->path ?? '' }}" alt="img-product">
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="flat-wrap-media-product">
                                    <div dir="ltr" class="swiper tf-product-media-main" id="gallery-swiper-started">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <a href="{{ $product->image->path ?? '' }}" target="_blank" class="item"
                                                   data-pswp-width="860px" data-pswp-height="1146px">
                                                    <img class="tf-image-zoom lazyload" data-zoom="{{ $product->image->path ?? '' }}"
                                                         data-src="{{ $product->image->path ?? '' }}"
                                                         src="{{ $product->image->path ?? '' }}" alt="">
                                                </a>
                                            </div>
                                            @foreach($product->galleries as $gallery)
                                                <div class="swiper-slide">
                                                    <a href="{{ $gallery->image->path ?? '' }}" target="_blank" class="item"
                                                       data-pswp-width="860px" data-pswp-height="1146px">
                                                        <img class="tf-image-zoom lazyload" data-zoom="{{ $gallery->image->path ?? '' }}"
                                                             data-src="{{ $gallery->image->path ?? '' }}"
                                                             src="{{ $gallery->image->path ?? '' }}" alt="">
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                        <!-- <div class="swiper-button-next button-style-arrow thumbs-next"></div> -->
                                        <!-- <div class="swiper-button-prev button-style-arrow thumbs-prev"></div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Product Images -->
                    <!-- Product Info -->
                    <div class="col-md-6">
                        <div class="tf-product-info-wrap position-relative">
                            <div class="tf-zoom-main sticky-top"></div>
                            <div class="tf-product-info-list other-image-zoom">
                                <h2 class="product-info-name">{{ $product->name }}</h2>
                                <div class="product-info-meta">
                                    <div class="rating">
                                        <div class="d-flex gap-4">
                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M14 5.4091L8.913 5.07466L6.99721 0.261719L5.08143 5.07466L0 5.4091L3.89741 8.7184L2.61849 13.7384L6.99721 10.9707L11.376 13.7384L10.097 8.7184L14 5.4091Z"
                                                    fill="#EF9122" />
                                            </svg>
                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M14 5.4091L8.913 5.07466L6.99721 0.261719L5.08143 5.07466L0 5.4091L3.89741 8.7184L2.61849 13.7384L6.99721 10.9707L11.376 13.7384L10.097 8.7184L14 5.4091Z"
                                                    fill="#EF9122" />
                                            </svg>
                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M14 5.4091L8.913 5.07466L6.99721 0.261719L5.08143 5.07466L0 5.4091L3.89741 8.7184L2.61849 13.7384L6.99721 10.9707L11.376 13.7384L10.097 8.7184L14 5.4091Z"
                                                    fill="#EF9122" />
                                            </svg>
                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M14 5.4091L8.913 5.07466L6.99721 0.261719L5.08143 5.07466L0 5.4091L3.89741 8.7184L2.61849 13.7384L6.99721 10.9707L11.376 13.7384L10.097 8.7184L14 5.4091Z"
                                                    fill="#EF9122" />
                                            </svg>
                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M14 5.4091L8.913 5.07466L6.99721 0.261719L5.08143 5.07466L0 5.4091L3.89741 8.7184L2.61849 13.7384L6.99721 10.9707L11.376 13.7384L10.097 8.7184L14 5.4091Z"
                                                    fill="#EF9122" />
                                            </svg>
                                        </div>
                                    </div>

                                </div>
                                <div class="tf-product-heading">
                                    <div class="product-info-price price-wrap">
                                        <span class="price-new price-on-sale h2 fw-4">{{ formatCurrency($product->price) }} đ</span>
{{--                                        <span class="price-old compare-at-price h6">$19.337</span>--}}
{{--                                        <p class="badges-on-sale h6 fw-semibold">--}}
{{--                                                <span class="number-sale" data-person-sale="29">--}}
{{--                                                    -29 %--}}
{{--                                                </span>--}}
{{--                                        </p>--}}
                                    </div>
                                </div>

                                <div class="tf-product-variant">
                                    <div class="variant-picker-item variant-size">
                                        <div class="variant-picker-label">
                                            <div class="h4 fw-semibold">
                                               Mô tả
                                            </div>

                                        </div>
                                        <div class="variant-picker-values" style="font-size: 20px">
                                            {{ $product->intro }}
                                        </div>
                                    </div>

                                </div>


                                <ul class="tf-product-cate-sku">
                                    <li class="item-cate-sku h6">
                                        <span class="label fw-6 text-black">Tình trạng: </span>
                                        <a href="#" class="value link text-main-2">{{ $product->state == 1 ? 'Còn hàng' : 'Hết hàng' }}</a>
                                    </li>
                                    <li class="item-cate-sku h6">
                                        <span class="label fw-6 text-black">Danh mục:</span>
                                        <span class="value text-main-2">{{ $product->category->name ?? '' }}</span>
                                    </li>
                                </ul>
                            </div>


                            <div class="tf-product-total-quantity">
                                <div class="group-btn">

                                </div>
                                <a href="{{ route('front.contact') }}" class="tf-btn btn-primary w-100">Liên hệ</a>
                            </div>

                        </div>
                    </div>
                    <!-- /Product Info -->
                </div>
            </div>
        </div>
    </section>


    <!-- Product Description -->
    <section class="flat-spacing-3" style="padding-top: 10px">
        <div class="container">
            <div class="flat-animate-tab tab-style-1">
                <ul class="menu-tab menu-tab-1" role="tablist">
                    <li class="nav-tab-item" role="presentation">
                        <a href="#descriptions" class="tab-link active" data-bs-toggle="tab">Thông tin sản phẩm</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane wd-product-descriptions active show" id="descriptions" role="tabpanel">
                        <div class="tab-descriptions">
                            {!! $product->body !!}
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
    <!-- /Product Description -->
    <!-- Box Icon -->

    <!-- /Box Icon -->
    <!-- Also Like -->

    <!-- /Also Like -->
    <!-- Related -->
    <style>
        /* chỉ áp dụng cho slider .other-products-swiper */
        .other-products-swiper .swiper-slide {
            display: flex;
            flex-direction: column;
            height: 100%;            /* ép slides đồng độ cao */
        }
        .other-products-swiper .card-product_wrapper {
            width: 100%;
            aspect-ratio: 1 / 1;     /* ép khung ảnh luôn vuông */
            overflow: hidden;
        }
        .other-products-swiper .card-product_wrapper .product-img {
            display: block;
            width: 100%;
            height: 100%;
        }
        .other-products-swiper .card-product_wrapper img {
            width: 100%;
            height: 100%;
            object-fit: contain;       /* crop ảnh tự động, giữ tỉ lệ */
            object-position: center;
        }
        .other-products-swiper .card-product_info {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between; /* căn đều thông tin */
        }

    </style>
    <section class="flat-spacing-3 pt-0">
        <div class="container">
            <h1 class="sect-title text-center">Sản phẩm tương tự</h1>
            <div dir="ltr" class="swiper tf-swiper wrap-sw-over" data-preview="4" data-tablet="3" data-mobile-sm="2" data-mobile="2"
                 data-space-lg="48" data-space-md="30" data-space="12" data-pagination="2" data-pagination-sm="2" data-pagination-md="3"
                 data-pagination-lg="4">
                <div class="swiper-wrapper other-products-swiper">

                    @foreach($otherProducts as $otherProduct)
                        <div class="swiper-slide">
                            <div class="card-product">
                                <div class="card-product_wrapper">
                                    <a href="{{ route('front.getProductDetail', $otherProduct->slug) }}" class="product-img">
                                        <img class="lazyload img-product" src="{{ $otherProduct->image->path ?? '' }}"
                                             data-src="{{ $otherProduct->image->path ?? '' }}" alt="Product">
                                        <img class="lazyload img-hover" src="{{ $otherProduct->image_back->path ?? ($otherProduct->image->path ?? '') }}"
                                             data-src="{{ $otherProduct->image_back->path ?? ($otherProduct->image->path ?? '') }}" alt="Product">
                                    </a>

                                </div>
                                <div class="card-product_info">
                                    <a href="{{ route('front.getProductDetail', $otherProduct->slug) }}" class="name-product h4 link">{{ $otherProduct->name }}</a>
                                    <div class="price-wrap">
{{--                                        <span class="price-old h6 fw-normal">$99,99</span>--}}
                                        <span class="price-new h6">{{ formatCurrency($otherProduct->price) }} đ</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
                <div class="sw-dot-default tf-sw-pagination"></div>
            </div>
        </div>
    </section>
    <!-- /Related -->
@endsection

@push('scripts')
    <script src="/site/js/drift.min.js"></script>
    <script src="/site/js/photoswipe-lightbox.umd.min.js"></script>
    <script src="/site/js/photoswipe.umd.min.js"></script>
    <script src="/site/js/zoom.js"></script>
    <script>

    </script>
@endpush
