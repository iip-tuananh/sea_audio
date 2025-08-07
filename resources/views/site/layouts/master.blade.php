<!DOCTYPE html>
<html class="no-js" lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    @include('site.partials.head')
    @yield('css')
</head>

<body ng-app="App">
    <!-- Scroll Top -->
    <button id="goTop">
        <span class="border-progress"></span>
        <span class="icon icon-caret-up"></span>
    </button>

    <!-- preload -->
    <div class="preload preload-container" id="preload">
        <div class="preload-logo">
            <div class="spinner"></div>
        </div>
    </div>
    <!-- /preload -->
    <div id="translate_select"></div>

    <div id="wrapper">
        @include('site.partials.header')

        @yield('content')

        @include('site.partials.footer')

    </div>


    <!-- Mobile Menu -->
    <div class="offcanvas offcanvas-start canvas-mb" id="mobileMenu">
        <span class="icon-close-popup" data-bs-dismiss="offcanvas">
            <i class="icon-close"></i>
        </span>
        <div class="canvas-header">
            <p class="text-logo-mb">{{ $config->short_name_company }}</p>
            <span class="br-line"></span>
        </div>
        <div class="canvas-body">
            <div class="mb-content-top">
                <ul class="nav-ul-mb" id="wrapper-menu-navigation"></ul>
            </div>


        </div>
        <div class="canvas-footer">

            <span class="br-line"></span>
            <div class="tf-languages">
{{--                <select class="tf-dropdown-select style-default type-languages">--}}
{{--                    <option>English</option>--}}
{{--                    <option>العربية</option>--}}
{{--                    <option>简体中文</option>--}}
{{--                    <option>اردو</option>--}}
{{--                </select>--}}
{{--                <select class="style-default type-languages" id="siteLang2" onchange="translateheader(this.value)">--}}
{{--                    <option value="vi">Tiếng Việt</option>--}}
{{--                    <option value="en">Tiếng Anh</option>--}}
{{--                </select>--}}
            </div>
        </div>
    </div>
    <!-- /Mobile Menu -->



    @include('site.partials.angular_mix')

    <script src="/site/js/bootstrap.min.js"></script>
    <script src="/site/js/jquery.min.js"></script>
    <script src="/site/js/swiper-bundle.min.js"></script>
    <script src="/site/js/carousel.js"></script>
    <script src="/site/js/bootstrap-select.min.js"></script>
    <script src="/site/js/lazysize.min.js"></script>
    <script src="/site/js/wow.min.js"></script>
    <script src="/site/js/parallaxie.js"></script>
    <script src="/site/js/count-down.js"></script>
    <script src="/site/js/main.js"></script>

    <script src="/site/js/sibforms.js" defer></script>


    <script>
        var CSRF_TOKEN = "{{ csrf_token() }}";
    </script>

{{--    <script>--}}
{{--        function translateheader(lang) {--}}
{{--            var sel = document.querySelector("select.goog-te-combo");--}}
{{--            console.log(sel)--}}
{{--            if (!sel) {--}}
{{--                // Nếu chưa có, thử lại sau 100ms--}}
{{--                return setTimeout(function() {--}}
{{--                    translateheader(lang);--}}
{{--                }, 100);--}}
{{--            }--}}

{{--            // 1) Gán giá trị--}}
{{--            sel.value = lang;--}}

{{--            // 2) Tạo event theo chuẩn cũ (HTMLEvents)--}}
{{--            var evOld = document.createEvent("HTMLEvents");--}}
{{--            evOld.initEvent("change", true, true);--}}
{{--            sel.dispatchEvent(evOld);--}}

{{--            // 3) Tạo event theo chuẩn mới (Event constructor)--}}
{{--            var evNew = new Event("change", { bubbles: true, cancelable: true });--}}
{{--            sel.dispatchEvent(evNew);--}}
{{--        }--}}

{{--    </script>--}}
    <script>
        // Hàm dịch header (giữ nguyên của bạn)
        function translateheader(lang) {
            var sel = document.querySelector("select.goog-te-combo");
            if (!sel) {
                return setTimeout(function() {
                    translateheader(lang);
                }, 100);
            }
            sel.value = lang;
            sel.dispatchEvent(new Event('change', { bubbles: true }));
        }

        document.addEventListener('DOMContentLoaded', function(){
            var uiSelect = document.getElementById('siteLang');
            // 1. Đọc lang đã lưu hoặc mặc định 'vi'
            var savedLang = localStorage.getItem('siteLang') || 'vi';

            // 2. Set UI select và gọi translate ngay khi load
            uiSelect.value = savedLang;
            translateheader(savedLang);

            // 3. Khi user đổi ngôn ngữ
            uiSelect.addEventListener('change', function(){
                var lang = this.value;
                // Lưu choice
                localStorage.setItem('siteLang', lang);
                // Gọi translate
                translateheader(lang);
            });
        });

        // document.addEventListener('DOMContentLoaded', function(){
        //     var uiSelect = document.getElementById('siteLang2');
        //     // 1. Đọc lang đã lưu hoặc mặc định 'vi'
        //     var savedLang = localStorage.getItem('siteLang2') || 'vi';
        //
        //     // 2. Set UI select và gọi translate ngay khi load
        //     uiSelect.value = savedLang;
        //     translateheader(savedLang);
        //
        //     // 3. Khi user đổi ngôn ngữ
        //     uiSelect.addEventListener('change', function(){
        //         var lang = this.value;
        //         // Lưu choice
        //         localStorage.setItem('siteLang2', lang);
        //         // Gọi translate
        //         translateheader(lang);
        //     });
        // });
    </script>

    <script type="text/javascript"
            src="/site/js/elementa0d8.js?cb=googleTranslateElementInit">
    </script>

    <script>
        app.controller('headerPage', function ($scope, $window) {
            $scope.search = function () {
                // Validate từ khóa
                // if (!$scope.keywords || !$scope.keywords.trim()) {
                //     alert('Vui lòng nhập từ khóa tìm kiếm!');
                //     return;
                // }

                // Xây URL cơ bản
                var url = '/tim-kiem?keywords=' + encodeURIComponent($scope.keywords.trim());

                // Lấy cate_id
                var cate_id = $('#product_cat').val();  // nếu chưa chọn sẽ là ""

                if (cate_id) {
                    url += '&cate=' + encodeURIComponent(cate_id);
                }

                console.log(cate_id)
                // Điều hướng
                $window.location.href = url;
            };
        });


    </script>

    @stack('scripts')
</body>

</html>
