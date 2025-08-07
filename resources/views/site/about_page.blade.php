@extends('site.layouts.master')

@section('title')Về chúng tôi - {{ $config->web_title }}@endsection
@section('description'){{ strip_tags(html_entity_decode($config->introduction)) }}@endsection
@section('image'){{@$config->image->path ?? ''}}@endsection
@section('css')

@endsection

@section('content')
    <style>
        .page-title-image .page_image {
            position: relative;
        }

        /*.page-title-image .page_image::before {*/
        /*    content: "";*/
        /*    position: absolute;*/
        /*    inset: 0;                     !* tương đương top:0; right:0; bottom:0; left:0; *!*/
        /*    background: rgba(0, 0, 0, 0.4); !* lớp nền mờ, bạn có thể chỉnh alpha (0.4) tùy ý *!*/
        /*    pointer-events: none;         !* để overlay không chặn tương tác *!*/
        /*}*/
        .page-title-image::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.3019607843);
        }

    </style>
    <section class="page-title-image">
        <div class="page_image overflow-hidden">
            <img class="lazyload ani-zoom" src="{{ $about->image_banner->path ?? '' }}" data-src="{{ $about->image_banner->path ?? '' }}" alt="Banner">
        </div>
        <div class="page_content">
            <div class="container">
                <div class="content">
                    <h1 class="heading fw-bold" style="color: #fff">
                        Về chúng tôi
                    </h1>
                </div>
            </div>
        </div>
    </section>
    <!-- /Page Title -->
    <!-- Hero Section -->
    <section class="s-intro flat-spacing">
        <div class="container">
            {!! $about->body_text !!}
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        app.controller('aboutPage', function ($rootScope, $scope, $interval) {
            $scope.errors = [];
            $scope.sendSuccess = false;
            $scope.submitForm = function () {
                var url = "{{route('front.submitContact')}}";
                var data = jQuery('#contactForm').serialize();
                $scope.loading = true;
                jQuery.ajax({
                    type: 'POST',
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': CSRF_TOKEN
                    },
                    data: data,
                    success: function (response) {
                        if (response.success) {
                            toastr.success(response.message);
                            jQuery('#contactForm')[0].reset();
                            $scope.errors = [];
                            $scope.sendSuccess = true;
                            $scope.$apply();
                        } else {
                            $scope.errors = response.errors;
                            toastr.warning(response.message);
                        }
                    },
                    error: function () {
                        toastr.error('Đã có lỗi xảy ra');
                    },
                    complete: function () {
                        $scope.loading = false;
                        $scope.$apply();
                    }
                });
            }

        })
    </script>

@endpush
