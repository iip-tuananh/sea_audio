@extends('site.layouts.master')

@section('title'){{ $category ? $category->name : 'Tất cả sản phẩm' }} - {{ $config->web_title }}@endsection
@section('description'){{ strip_tags(html_entity_decode($config->introduction)) }}@endsection
@section('image'){{@$config->image->path ?? ''}}@endsection

@section('css')

@endsection

@section('content')
    <section class="s-page-title">
        <div class="container">
            <div class="content">
                <h1 class="title-page">{{ $category ? $category->name : 'Tất cả sản phẩm' }}</h1>
                <ul class="breadcrumbs-page">
                    <li><a href="{{ route('front.home-page') }}" class="h6 link">Trang chủ</a></li>
                    <li class="d-flex"><i class="icon icon-caret-right"></i></li>
                    <li>
                        <h6 class="current-page fw-normal">{{ $category ? $category->name : 'Tất cả sản phẩm' }}</h6>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- /Page Title -->
    <!-- Section Product -->
    <div class="flat-spacing">
        <div class="container">
            <div class="row">
                <div class="col-xl-9">
                    <div class="tf-shop-control">


                        <div class="tf-control-sorting">
                            <p class="h6 d-none d-lg-block">Sắp xếp:</p>
                            <div class="tf-dropdown-sort" data-bs-toggle="dropdown">
                                <div class="btn-select">
                                    <span class="text-sort-value">Best Selling</span>
                                    <span class="icon icon-caret-down"></span>
                                </div>
                                <div class="dropdown-menu">
                                    <div class="select-item {{ request('sort') == 'name_asc' ? 'active' : '' }}" data-sort-value="{{ request()->fullUrlWithQuery(['sort'=>'name_asc','page'=>1]) }}">
                                        <span class="text-value-item">Tên (A-Z)</span>
                                    </div>
                                    <div class="select-item {{ request('sort') == 'name_desc' ? 'active' : '' }}" data-sort-value="{{ request()->fullUrlWithQuery(['sort'=>'name_desc','page'=>1]) }}">
                                        <span class="text-value-item">Tên (Z-A)</span>
                                    </div>
                                    <div class="select-item {{ request('sort') == 'price_asc' ? 'active' : '' }}" data-sort-value="{{ request()->fullUrlWithQuery(['sort'=>'price_asc','page'=>1]) }}">
                                        <span class="text-value-item">Giá tăng dần</span>
                                    </div>
                                    <div class="select-item {{ request('sort') == 'price_desc' ? 'active' : '' }}" data-sort-value="{{ request()->fullUrlWithQuery(['sort'=>'price_desc','page'=>1]) }}">
                                        <span class="text-value-item">Giá giảm dần</span>
                                    </div>
                                    <div class="select-item {{ request('sort') == 'date_asc' ? 'active' : '' }}" data-sort-value="{{ request()->fullUrlWithQuery(['sort'=>'date_asc','page'=>1]) }}">
                                        <span class="text-value-item">Ngày cũ đến mới</span>
                                    </div>
                                    <div class="select-item {{ request('sort') == 'date_desc' ? 'active' : '' }}" data-sort-value="{{ request()->fullUrlWithQuery(['sort'=>'date_desc','page'=>1]) }}">
                                        <span class="text-value-item">Ngày mới đến cũ</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <style>
                        /* 1. Wrapper giữ tỉ lệ vuông và position relative */
                        #gridLayout .card-product_wrapper {
                            width: 100%;
                            aspect-ratio: 1 / 1;
                            position: relative;   /* để position-img con có thể absolute nếu cần */
                            overflow: hidden;
                        }

                        /* 2. Buộc <a> xuống block, full kích thước wrapper */
                        #gridLayout .card-product_wrapper a.product-img {
                            display: block;
                            width: 100%;
                            height: 100%;
                        }

                        /* 3. Ảnh phủ đầy, giữ tỉ lệ và crop */
                        #gridLayout .card-product_wrapper img {
                            display: block;
                            width: 100%;
                            height: 100%;
                            object-fit: contain;
                            object-position: center;
                        }

                        /* 4. Cấu trúc card flex-column để info đứng dưới */
                        #gridLayout .card-product {
                            display: flex;
                            flex-direction: column;
                            height: 100%;
                        }
                        #gridLayout .card-product_info {
                            flex: 1;
                            display: flex;
                            flex-direction: column;
                            justify-content: space-between;
                        }

                    </style>
                    <div class="wrapper-control-shop gridLayout-wrapper">
                        <div class="wrapper-shop tf-grid-layout tf-col-3" id="gridLayout">
                            @foreach($products as $product)
                                <div class="card-product grid" data-availability="In stock" data-brand="zeagoo" data-sale="sale">
                                    <div class="card-product_wrapper">
                                        <a href="{{ route('front.getProductDetail', $product->slug) }}" class="product-img">
                                            <img class="lazyload img-product" src="{{ $product->image->path ?? '' }}"
                                                 data-src="{{ $product->image->path ?? '' }}" alt="Product">
                                            <img class="lazyload img-hover" src="{{ $product->image_back->path ?? ($product->image->path ?? '' ) }}"
                                                 data-src="{{ $product->image_back->path ?? '' }}" alt="Product">
                                        </a>
                                    </div>
                                    <div class="card-product_info">
                                        <a href="{{ route('front.getProductDetail', $product->slug) }}" class="name-product h4 link">{{ $product->name }}</a>
                                        <div class="price-wrap">
                                            <span class="price-new h6">{{ formatCurrency($product->price) }}đ</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                                <!-- Pagination -->
                                {{ $products->links('site.pagination.paginate2') }}

                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="canvas-sidebar sidebar-filter canvas-filter right">
                        <div class="canvas-wrapper">
                            <div class="canvas-header d-xl-none">
                                <span class="title h3 fw-medium">Filter</span>
                                <span class="icon-close link icon-close-popup fs-24 close-filter"></span>
                            </div>
                            <div class="canvas-body">
                                <div class="widget-facet">
                                    <div class="facet-title" data-bs-target="#category" role="button" data-bs-toggle="collapse"
                                         aria-expanded="true" aria-controls="category">
                                        <span class="h4 fw-semibold">Danh mục</span>
                                        <span class="icon icon-caret-down fs-20"></span>
                                    </div>
                                    <div id="category" class="collapse show">
                                        <ul class="collapse-body filter-group-check group-category">
                                            @foreach($allCates as $cate)
                                                <li class="list-item">
                                                    <a href="{{ route('front.getListProduct', $cate->slug) }}" class="link h6">{{ $cate->name }}<span class="count">({{ $cate->products_count }})</span></a>
                                                </li>
                                            @endforeach


                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="canvas-bottom d-xl-none">
                                <button id="reset-filter" class="tf-btn btn-reset">Reset Filters</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dropdown = document.querySelector('.tf-dropdown-sort');
            const btnLabel = dropdown.querySelector('.text-sort-value');
            const items = dropdown.querySelectorAll('.select-item');

            // 1. Tìm item đang active, nếu không có thì dùng item đầu tiên
            let activeItem = dropdown.querySelector('.select-item.active');
            if (!activeItem && items.length) {
                activeItem = items[5];
                activeItem.classList.add('active');
            }

            // 2. Cập nhật label cho nút
            if (activeItem) {
                btnLabel.textContent = activeItem
                    .querySelector('.text-value-item')
                    .textContent;
            }

            // 3. Gắn sự kiện click (nếu chưa có)
            items.forEach(item => {
                item.addEventListener('click', function() {
                    // đổi active
                    dropdown.querySelector('.select-item.active')?.classList.remove('active');
                    this.classList.add('active');
                    // cập nhật label
                    btnLabel.textContent = this.querySelector('.text-value-item').textContent;
                    // chuyển trang
                    window.location.href = this.dataset.sortValue;
                });
            });
        });
    </script>



    <script>
        app.controller('productPage', function ($rootScope, $scope, cartItemSync, $interval) {
            $scope.errors = [];

            $scope.buyNow = function (productId) {
                url = "{{route('cart.add.item', ['productId' => 'productId'])}}";
                url = url.replace('productId', productId);

                jQuery.ajax({
                    type: 'POST',
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': CSRF_TOKEN
                    },
                    data: {
                        'qty': 1
                    },
                    success: function (response) {
                        if (response.success) {
                            $interval.cancel($rootScope.promise);
                            $rootScope.promise = $interval(function () {
                                cartItemSync.items = response.items;
                                cartItemSync.total = response.total;
                                cartItemSync.count = response.count;
                            }, 1000);

                            window.location.href = "/gio-hang";

                        }
                    },
                    error: function () {
                        toastr.warning('Thao tác thất bại !');
                    },
                    complete: function () {
                        $scope.$applyAsync();
                    }
                });
            }
        })
    </script>
@endpush
