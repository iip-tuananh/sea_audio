@extends('site.layouts.master')
@section('title')Liên hệ - {{ $config->web_title }}@endsection
@section('description'){{ strip_tags(html_entity_decode($config->introduction)) }}@endsection
@section('image'){{@$config->image->path ?? ''}}@endsection

@section('css')
<style>
    .invalid-feedback {
        display: none;
        width: 100%;
        margin-top: 0.25rem;
        font-size: 100%;
        color: #dc3545;
    }
</style>

<style>
    .send-success-message {
        display: flex;
        align-items: center;
        background-color: #e6ffed;     /* nền xanh nhạt */
        border: 1px solid #71d58b;      /* viền xanh tươi */
        color: #2d6a4f;                 /* chữ xanh đậm */
        padding: 12px 16px;
        border-radius: 8px;
        font-size: 1rem;
        gap: 12px;                      /* khoảng cách icon - text */
        box-shadow: 0 2px 6px rgba(0,0,0,0.05);
        margin-bottom: 10px;
    }

    .send-success-message i {
        font-size: 1.4rem;
    }

    .send-success-message p {
        margin: 0;
        line-height: 1.4;
    }
</style>
@endsection

@section('content')
    <section class="s-page-title">
        <div class="container">
            <div class="content">
                <h1 class="title-page">Liên hệ</h1>
                <ul class="breadcrumbs-page">
                    <li><a href="{{ route('front.home-page') }}" class="h6 link">Trang chủ</a></li>
                    <li class="d-flex"><i class="icon icon-caret-right"></i></li>
                    <li>
                        <h6 class="current-page fw-normal">Liên hệ</h6>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- /Page Title -->
    <!-- Contact Us -->
    <section class="s-contact-us flat-spacing" ng-controller="aboutPage">
        <!-- Map -->
        <div class="wg-map d-flex">
            {!! $config->location !!}
        </div>
        <!-- /Map -->
{{--        <div class="wg-map d-flex">--}}
{{--            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7880.148272329334!2d151.20657421407668!3d-33.858885268389294!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b12ae682c546039%3A0x16da940d587922a1!2sCircular%20Quay!5e0!3m2!1sen!2s!4v1745205798630!5m2!1sen!2s" width="100%" height="461" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>--}}
{{--        </div>--}}
        <div class="container">
            <div class="row">
                <div class="col-xxl-5 offset-xxl-1 col-lg-6">
                    <div class="left-col mb-lg-0">
                        <h3 class="title fw-normal">Thông tin liên hệ</h3>
                        <ul class="store-info-list">
                            <li>
                                <p class="h6 text-black fw-medium">Địa chỉ:</p>
                                <a href="{{ $config->google_map }}" target="_blank"
                                   class="link text-main">
                                   {{ $config->address_company }}
                                </a>
                            </li>
                            <li>
                                <p class="h6 text-black fw-medium">Email:</p>
                                <a href="mailto:{{ $config->email }}" class="link text-main">{{ $config->email }}</a>
                            </li>
                            <li>
                                <p class="h6 text-black fw-medium">Hotline:</p>
                                <a href="tel:{{ $config->hotline }}" class="link text-main">{{ $config->hotline }}</a>
                            </li>
                        </ul>
                        <ul class="tf-social-icon">
                            <li>
                                <a href="{{ $config->facebook }}" target="_blank" class="social-facebook">
                                    <span class="icon"><i class="icon-fb"></i></span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ $config->instagram }}" target="_blank" class="social-instagram">
                                    <span class="icon"><i class="icon-instagram-logo"></i></span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ $config->twitter }}" target="_blank" class="social-x">
                                    <span class="icon"><i class="icon-x"></i></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6">
                    <div class="right-col">
                        <h3 class="title fw-normal">Để lại thông tin</h3>
                        <p class="sub-title text-main-4">
                            Bạn có thắc mắc hoặc cần hỗ trợ, vui lòng để lại thông tin. Chúng tôi sẽ sớm liên hệ lại với bạn
                        </p>
                        <form class="form-contact style-border" id="contactForm">
                            <div class="form-content">
                                <div class="cols tf-grid-layout sm-col-2">
                                    <fieldset>
                                        <input id="name" type="text" name="name" placeholder="Họ tên*">
                                        <div class="invalid-feedback d-block" ng-if="errors['name']"><% errors['name'][0] %></div>
                                    </fieldset>
                                    <fieldset>
                                        <input id="phone" type="text" name="phone" placeholder="Số điện thoại*">
                                        <div class="invalid-feedback d-block" ng-if="errors['phone']"><% errors['phone'][0] %></div>
                                    </fieldset>
                                </div>
                                <textarea id="desc" name="message" placeholder="Nội dung" style="height: 229px;"></textarea>
                                <div class="invalid-feedback d-block" ng-if="errors['message']"><% errors['message'][0] %></div>

                            </div>
                            <div class="form_message text-center"></div>
                            <div class="col-sm-12" ng-if="sendSuccess">
                                <div class="space10"></div> <br>
                                <div class="send-success-message">
                                    <p style="padding-bottom: 0px">Cảm ơn bạn đã để lại lời nhắn. Tin nhắn đã được gửi.</p>
                                </div>
                            </div>
                            <button type="submit" class="tf-btn btn-fill animate-btn w-100" ng-click="submitForm()" ng-disabled="loading">

                                  <span class="btn-wrap" ng-if="!loading">
                                      <span class="text-first">Gửi</span>
                                  </span>
                                <span class="btn-wrap" ng-if="loading">
                                                            <span class="text-first">Đang gửi... <i class="fa fa-spinner fa-spin"></i></span>
                                                        </span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
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
