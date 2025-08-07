<!-- Top Bar-->

<div ng-controller="headerPage">
    <div class="tf-topbar bg-dark-blu type-space-2 line-bt-3">
        <div class="container-full-2">
            <div class="row">
                <div class="col-xl-6 col-lg-8">
                    <div class="topbar-left justify-content-center justify-content-sm-start">
                        <ul class="topbar-option-list">
                            <li class="h6 d-none d-sm-flex">
                                <a href="tel:{{ $config->hotline }}" class="text-white link track"><i class="icon icon-phone"></i> Hotline 24/7: {{ $config->hotline }}</a>
                            </li>
                            <li class="br-line d-none d-sm-flex"></li>
                            <li class="h6">
                                <a href="{{ $config->google_map }}" class="text-white link" target="_blank"><i class="icon icon-map-pin"></i> {{ $config->address_company }}</a>
                            </li>
                        </ul>
                    </div>
                </div>

{{--                <div class="col-xl-6 col-lg-4 d-none d-lg-block">--}}
{{--                    <ul class="topbar-right topbar-option-list">--}}
{{--                        <li class="tf-languages d-none d-xl-block">--}}
{{--                            <select class="style-default color-white type-languages" id="siteLang" onchange="translateheader(this.value)">--}}
{{--                                <option value="vi">Tiếng Việt</option>--}}
{{--                                <option value="en">Tiếng Anh</option>--}}
{{--                            </select>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}

                <style>
                    /* 1. Loại bỏ padding/margin mặc định của ul và cho nó flex */
                    .topbar-option-list {
                        list-style: none;
                        margin: 0;
                        padding: 0;
                        display: flex;
                        justify-content: flex-end; /* canh phải trên desktop */
                        align-items: center;
                    }

                    /* 2. Chỉnh select cho đẹp hơn */
                    .type-languages {
                        display: inline-block;
                        width: auto;                /* mặc định là auto, không full 100% */
                        min-width: 120px;           /* giới hạn minimum */
                        max-width: 180px;           /* giới hạn maximum */
                        padding: 0.25rem 0.5rem;
                        background: transparent;
                        border: 1px solid #fff;     /* viền trắng nếu nền tối */
                        border-radius: 0.25rem;
                        color: #fff;
                        appearance: none;           /* ẩn native arrow nếu muốn custom */
                        cursor: pointer;
                    }

                    /* Hiển thị màu đen cho option khi dropdown lên */
                    .type-languages option {
                        color: #000;
                    }

                    /* 3. Trên mobile (xs <576px): căn giữa và thu nhỏ select */
                    @media (max-width: 575.98px) {
                        .topbar-option-list {
                            justify-content: center;    /* căn giữa khối trên mobile */
                        }
                        .type-languages {
                            min-width: 140px;           /* rộng vừa phải */
                            max-width: 100%;            /* không tràn ra ngoài */
                        }
                    }

                </style>
                <div class="col-12 col-md-6 col-lg-4 col-xl-6">
                    <ul class="topbar-right topbar-option-list">
                        <li class="tf-languages">
                            <select
                                class="style-default color-white type-languages w-100"
                                id="siteLang"
                                onchange="translateheader(this.value)"
                            >
                                <option value="vi">Tiếng Việt</option>
                                <option value="en">Tiếng Anh</option>
                            </select>
                        </li>
                    </ul>
                </div>



            </div>
        </div>
    </div>
    <!-- /Top Bar -->
    <!-- Header -->
    <header class="tf-header style-5">
        <div class="header-top ">
            <div class="container-full-2">
                <div class="row align-items-center">
                    <div class="col-md-4 col-3 d-xl-none">
                        <a href="#mobileMenu" data-bs-toggle="offcanvas" class="btn-mobile-menu style-white">
                            <span></span>
                        </a>
                    </div>
                    <div class="col-xl-2 col-md-4 col-6 text-center text-xl-start">
                        <a href="{{ route('front.home-page') }}" class="logo-site justify-content-center justify-content-xl-start">
                            <img src="{{ $config->image->path ?? '' }}" alt="">
                        </a>
                    </div>
                    <div class="col-xl-8 col-md-4 col-3">
                        <div class="header-right">
                            <form class="form_search-product style-search-2 d-none d-xl-flex">
                                <div class="select-category">
                                    <select name="product_cat" id="product_cat" class="dropdown_product_cat">
                                        <option value="all" selected="selected">Tất cả danh mục</option>
                                        @foreach($categories as $cate)
                                            <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <span class="br-line type-vertical"></span>
                                <input class="style-def" type="text" placeholder="Tìm kiếm sản phẩm..." name="keyword" ng-model="keywords" required>
                                <button id="btn-search" type="submit" class="btn-submit" ng-click="search()">
                                    <i class="icon icon-magnifying-glass"></i>
                                    <span class="h6 fw-bold">Tìm kiếm</span>
                                </button>
                            </form>
                            <ul class="nav-icon-list text-nowrap">

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-inner d-none d-xl-block bg-white">
            <div class="container-full-2">
                <div class="header-inner_wrap">
                    <div class="col-left">
                        <div class="nav-category-wrap main-action-active">
                            <div class="btn-nav-drop btn-active">
                                <span class="btn-mobile-menu type-small"><span></span></span>
                                <h6 class="name-category fw-semibold">Danh mục</h6>
                                <i class="icon icon-caret-down"></i>
                            </div>
                            <ul class="box-nav-category active-item">
                                @foreach($categories as $category)
                                    <li><a href="{{ route('front.getListProduct', $category->slug) }}" class="nav-category_link h5" style="font-size: 16px">{{ $category->name }}</a></li>
                                @endforeach

                            </ul>
                        </div>
                        <span class="br-line type-vertical h-24"></span>
                        <nav class="box-navigation">
                            <ul class="box-nav-menu">
                                <li class="menu-item">
                                    <a href="{{ route('front.home-page') }}" class="item-link">Trang chủ</a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{ route('front.about_page') }}" class="item-link">Giới thiệu</a>
                                </li>
                                <li class="menu-item position-relative">
                                    <a href="javascript:void(0)" class="item-link">Sản phẩm<i class="icon icon-caret-down"></i></a>
                                    <div class="sub-menu">
                                        <ul class="sub-menu_list">
                                            @foreach($categories as $category)
                                                <li><a href="{{ route('front.getListProduct', $category->slug) }}" class="sub-menu_link">{{ $category->name }}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </li>
                                <li class="menu-item position-relative">
                                    <a href="javascript:void(0)" class="item-link">Tin tức<i class="icon icon-caret-down"></i></a>
                                    <div class="sub-menu">
                                        <ul class="sub-menu_list">
                                            @foreach($postCategories as $postCategory)
                                                <li><a href="{{ route('front.blogs', $postCategory->slug) }}" class="sub-menu_link">{{ $postCategory->name }}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </li>
                                <li class="menu-item">
                                    <a href="{{ route('front.contact') }}" class="item-link">Liên hệ</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-right">
                        <i class="icon icon-truck"></i>
                        <p class="h6 text-black">
                            Free Shipping nội thành Hà Nội
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <header class="tf-header header-fixed style-5 bg-dark-blu">
        <div class="header-top d-xl-none">
            <div class="container-full-2">
                <div class="row align-items-center">
                    <div class="col-md-4 col-3 d-xl-none">
                        <a href="#mobileMenu" data-bs-toggle="offcanvas" class="btn-mobile-menu style-white">
                            <span></span>
                        </a>
                    </div>
                    <div class="col-xl-2 col-md-4 col-6 text-center text-xl-start">
                        <a href="{{ route('front.home-page') }}" class="logo-site justify-content-center justify-content-xl-start">
                            <img src="{{ $config->image->path ?? '' }}" alt="">
                        </a>
                    </div>
                    <div class="col-xl-8 col-md-4 col-3">
{{--                        <div class="header-right">--}}
{{--                            <form class="form_search-product style-search-2 d-none d-xl-flex">--}}
{{--                                <div class="select-category">--}}
{{--                                    <select name="product_cat" id="product_cat" class="dropdown_product_cat">--}}
{{--                                        <option value="" selected="selected">All categories</option>--}}
{{--                                        <option class="level-0" value="apple-products">Apple products</option>--}}
{{--                                        <option class="level-0" value="audio-equipments">Audio Equipments</option>--}}
{{--                                        <option class="level-0" value="camera-video">Camera & Video</option>--}}
{{--                                        <option class="level-0" value="game-room-furniture">Game & Room Furniture--}}
{{--                                        </option>--}}
{{--                                        <option class="level-0" value="gaming-accessories">Gaming Accessories--}}
{{--                                        </option>--}}
{{--                                        <option class="level-0" value="headphone">Headphone</option>--}}
{{--                                        <option class="level-0" value="laptop-tablet">Laptop & Tablet</option>--}}
{{--                                        <option class="level-0" value="server-workstation">Server & Workstation--}}
{{--                                        </option>--}}
{{--                                        <option class="level-0" value="smartphone">Smartphone</option>--}}
{{--                                        <option class="level-0" value="smartwatch">Smartwatch</option>--}}
{{--                                        <option class="level-0" value="storage-digital-devices">Storage & Digital--}}
{{--                                            Devices</option>--}}
{{--                                    </select>--}}
{{--                                    <ul class="select-options">--}}
{{--                                        <li class="link" rel=""><span>All categories</span></li>--}}
{{--                                        <li class="link" rel="apple-products"><span>Apple products</span> </li>--}}
{{--                                        <li class="link" rel="audio-equipments"><span>Audio Equipments</span></li>--}}
{{--                                        <li class="link" rel="camera-video"><span>Camera & Video</span></li>--}}
{{--                                        <li class="link" rel="game-room-furniture"><span>Game & Room--}}
{{--                                                    Furniture</span></li>--}}
{{--                                        <li class="link" rel="gaming-accessories"><span>Gaming Accessories</span>--}}
{{--                                        </li>--}}
{{--                                        <li class="link" rel="headphone"><span>Headphone</span></li>--}}
{{--                                        <li class="link" rel="laptop-tablet"><span>Laptop & Tablet</span></li>--}}
{{--                                        <li class="link" rel="server-workstation"><span>Server & Workstation</span>--}}
{{--                                        </li>--}}
{{--                                        <li class="link" rel="smartphone"><span>Smartphone</span></li>--}}
{{--                                        <li class="link" rel="smartwatch"><span>Smartwatch</span></li>--}}
{{--                                        <li class="link" rel="storage-digital-devices"><span>Storage & Digital--}}
{{--                                                    Devices</span></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                                <span class="br-line type-vertical"></span>--}}
{{--                                <input class="style-def" type="text" placeholder="Search for products..." required>--}}
{{--                                <button type="submit" class="btn-submit">--}}
{{--                                    <i class="icon icon-magnifying-glass"></i>--}}
{{--                                    <span class="h6 fw-bold">Search</span>--}}
{{--                                </button>--}}
{{--                            </form>--}}
{{--                            <ul class="nav-icon-list text-nowrap">--}}

{{--                            </ul>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
        <div class="header-inner d-none d-xl-block bg-white">
            <div class="container-full-2">
                <div class="header-inner_wrap">
                    <div class="col-left">
                        <div class="nav-category-wrap main-action-active">
{{--                            <div class="btn-nav-drop btn-active">--}}
{{--                                <span class="btn-mobile-menu type-small"><span></span></span>--}}
{{--                                <h6 class="name-category fw-semibold">All Departments</h6>--}}
{{--                                <i class="icon icon-caret-down"></i>--}}
{{--                            </div>--}}
{{--                            <ul class="box-nav-category active-item">--}}
{{--                                <li><a href="shop-default.html" class="nav-category_link h5"><i class="icon icon-tv"></i>Electronics</a></li>--}}
{{--                                <li><a href="shop-default.html" class="nav-category_link h5"><i class="icon icon-arm-chair"></i>Furniture</a></li>--}}
{{--                                <li><a href="shop-default.html" class="nav-category_link h5"><i class="icon icon-shirt"></i>Fashion & Style</a>--}}
{{--                                </li>--}}
{{--                                <li><a href="shop-default.html" class="nav-category_link h5"><i class="icon icon-book"></i>Book</a></li>--}}
{{--                                <li><a href="shop-default.html" class="nav-category_link h5"><i class="icon icon-headset"></i>Music</a></li>--}}
{{--                                <li><a href="shop-default.html" class="nav-category_link h5"><i class="icon icon-drop"></i>Cosmetic & Beauty</a>--}}
{{--                                </li>--}}
{{--                                <li><a href="shop-default.html" class="nav-category_link h5"><i class="icon icon-mobile"></i>Smartphone</a></li>--}}
{{--                                <li><a href="shop-default.html" class="nav-category_link h5"><i class="icon icon-volley-ball"></i>Sports</a></li>--}}
{{--                                <li><a href="shop-default.html" class="nav-category_link h5"><i class="icon icon-sneaker"></i>Shoes</a></li>--}}
{{--                                <li><a href="shop-default.html" class="nav-category_link h5"><i class="icon icon-camera"></i>Camera ---}}
{{--                                        Camcorder</a></li>--}}
{{--                                <li><a href="shop-default.html" class="nav-category_link h5"><i class="icon icon-clock-cd"></i>Clock</a></li>--}}
{{--                                <li><a href="shop-default.html" class="nav-category_link h5"><i class="icon icon-diamond"></i>Jewelry</a></li>--}}
{{--                                <li><a href="shop-default.html" class="nav-category_link h5"><i class="icon icon-barbell"></i>Gym</a></li>--}}
{{--                                <li><a href="shop-default.html" class="nav-category_link h5"><i class="icon icon-bag"></i>Bag</a></li>--}}
{{--                            </ul>--}}
                        </div>
                        <span class="br-line type-vertical h-24"></span>
                        <nav class="box-navigation">
                            <ul class="box-nav-menu">





                                <li class="menu-item mn-none">
                                    <a href="{{ route('front.home-page') }}" class="item-link">Trang chủ</a>
                                </li>
                                <li class="menu-item mn-none">
                                    <a href="{{ route('front.about_page') }}" class="item-link">Giới thiệu</a>
                                </li>
                                <li class="menu-item mn-none position-relative">
                                    <a href="javascript:void(0)" class="item-link">Sản phẩm<i class="icon icon-caret-down"></i></a>
                                    <div class="sub-menu">
                                        <ul class="sub-menu_list">
                                            @foreach($categories as $category)
                                                <li><a href="{{ route('front.getListProduct', $category->slug) }}" class="sub-menu_link">{{ $category->name }}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </li>
                                <li class="menu-item mn-none position-relative">
                                    <a href="javascript:void(0)" class="item-link">Tin tức<i class="icon icon-caret-down"></i></a>
                                    <div class="sub-menu">
                                        <ul class="sub-menu_list">
                                            @foreach($postCategories as $postCategory)
                                                <li><a href="{{ route('front.blogs', $postCategory->slug) }}" class="sub-menu_link">{{ $postCategory->name }}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </li>
                                <li class="menu-item mn-none">
                                    <a href="{{ route('front.contact') }}" class="item-link">Liên hệ</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-right">
                        <i class="icon icon-truck"></i>
                        <p class="h6 text-black">
                            Free Shipping nội thành Hà Nội
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </header>
</div>

<!-- /Header -->
