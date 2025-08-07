<!-- Footer -->
<footer class="tf-footer">
    <div class="container d-flex">
        <span class="br-line"></span>
    </div>
    <div class="footer-body">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-sm-6 mb_30 mb-xl-0">
                    <div class="footer-col-block">
                        <p class="footer-heading footer-heading-mobile">Liên hệ với chúng tôi</p>
                        <div class="tf-collapse-content">
                            <ul class="footer-contact">
                                <li>
                                    <i class="icon icon-map-pin"></i>
                                    <span class="br-line"></span>
                                    <a href="{{ $config->google_map }}" target="_blank"
                                       class="h6 link">
                                       {{ $config->address_company }}
                                    </a>
                                </li>
                                <li>
                                    <i class="icon icon-phone"></i>
                                    <span class="br-line"></span>
                                    <a href="tel:{{ $config->hotline }}" class="h6 link">{{ $config->hotline }}</a>
                                </li>
                                <li>
                                    <i class="icon icon-envelope-simple"></i>
                                    <span class="br-line"></span>
                                    <a href="mailto:{{ $config->email }}" class="h6 link">{{ $config->email }}</a>
                                </li>
                            </ul>
                            <div class="social-wrap">
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
                    </div>
                </div>
                <div class="col-xl-2 col-sm-6 mb_30 mb-xl-0">
                    <div class="footer-col-block footer-wrap-1 ms-xl-auto">
                        <p class="footer-heading footer-heading-mobile">Sản pẩm</p>
                        <div class="tf-collapse-content">
                            <ul class="footer-menu-list">
                                @foreach($categories as $cate)
                                    <li><a href="{{ route('front.getListProduct', $cate->slug) }}" class="link h6">{{ $cate->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb_30 mb-sm-0">
                    <div class="footer-col-block footer-wrap-2 mx-xl-auto">
                        <p class="footer-heading footer-heading-mobile">Về chúng tôi</p>
                        <div class="tf-collapse-content">
                            <ul class="footer-menu-list">
                                <li><a href="{{ route('front.about_page') }}" class="link h6">Giới thiệu</a></li>
                                <li><a href="{{ route('front.contact') }}" class="link h6">Liên hệ</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6">
                    <div class="footer-col-block">
                        <p class="footer-heading footer-heading-mobile">Đăng ký email</p>
                        <div class="tf-collapse-content">
                            <div class="footer-newsletter">
                                <p class="h6 caption">
                                    Nhập email của bạn bên dưới để là người đầu tiên biết về sản phẩm hoặc tin tức mới nhất
                                </p>
                                <div class="sib-form sib-form_footer">
                                    <div id="sib-form-container" class="sib-form-container">
                                        <div id="error-message" class="sib-form-message-panel">
                                            <div class="sib-form-message-panel__text sib-form-message-panel__text--center">
                                                <svg viewBox="0 0 512 512" class="sib-icon sib-notification__icon">
                                                    <path
                                                        d="M256 40c118.621 0 216 96.075 216 216 0 119.291-96.61 216-216 216-119.244 0-216-96.562-216-216 0-119.203 96.602-216 216-216m0-32C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm-11.49 120h22.979c6.823 0 12.274 5.682 11.99 12.5l-7 168c-.268 6.428-5.556 11.5-11.99 11.5h-8.979c-6.433 0-11.722-5.073-11.99-11.5l-7-168c-.283-6.818 5.167-12.5 11.99-12.5zM256 340c-15.464 0-28 12.536-28 28s12.536 28 28 28 28-12.536 28-28-12.536-28-28-28z" />
                                                </svg>
                                                <span class="sib-form-message-panel__inner-text">Your subscription could not be saved. Please
                                                            try again.
                                                        </span>
                                            </div>
                                        </div>
                                        <div id="success-message" class="sib-form-message-panel">
                                            <div class="sib-form-message-panel__text sib-form-message-panel__text--center">
                                                <svg viewBox="0 0 512 512" class="sib-icon sib-notification__icon">
                                                    <path
                                                        d="M256 8C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 464c-118.664 0-216-96.055-216-216 0-118.663 96.055-216 216-216 118.664 0 216 96.055 216 216 0 118.663-96.055 216-216 216zm141.63-274.961L217.15 376.071c-4.705 4.667-12.303 4.637-16.97-.068l-85.878-86.572c-4.667-4.705-4.637-12.303.068-16.97l8.52-8.451c4.705-4.667 12.303-4.637 16.97.068l68.976 69.533 163.441-162.13c4.705-4.667 12.303-4.637 16.97.068l8.451 8.52c4.668 4.705 4.637 12.303-.068 16.97z" />
                                                </svg>
                                                <span class="sib-form-message-panel__inner-text">Your subscription has been successful.
                                                        </span>
                                            </div>
                                        </div>
                                        <div id="sib-container" class="sib-container--large sib-container--vertical ">
                                            <form id="sib-form" method="POST"
                                                  action="#"
                                                  data-type="subscription">
                                                <div>
                                                    <div class="sib-form-block">
                                                        <p></p>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="sib-form-block">
                                                        <div class="sib-text-form-block">
                                                            <p></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-content_fieldset form-get_email">
                                                    <div class="fieldset-input_email">
                                                        <div class="sib-input sib-form-block">
                                                            <div class="form__entry entry_block">
                                                                <div class="form__label-row ">
                                                                    <label class="entry__label d-none" for="EMAIL"></label>
                                                                    <div class="entry__field ip">
                                                                        <input class="input " type="email" id="EMAIL" name="EMAIL"
                                                                               autocomplete="off" placeholder="Enter your email"
                                                                               data-required="true" required>
                                                                    </div>
                                                                </div>
                                                                <label class="entry__error entry__error--primary"></label>
                                                                <label class="entry__specification"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="fiedset-button_submit">
                                                        <div class="sib-form-block">
                                                            <button
                                                                class="sib-form-block__button sib-form-block__button-with-loader tf-btn animate-btn type-small-2"
                                                                form="sib-form" type="submit">
                                                                <svg class="icon clickable__icon progress-indicator__icon sib-hide-loader-icon"
                                                                     viewBox="0 0 512 512">
                                                                    <path
                                                                        d="M460.116 373.846l-20.823-12.022c-5.541-3.199-7.54-10.159-4.663-15.874 30.137-59.886 28.343-131.652-5.386-189.946-33.641-58.394-94.896-95.833-161.827-99.676C261.028 55.961 256 50.751 256 44.352V20.309c0-6.904 5.808-12.337 12.703-11.982 83.556 4.306 160.163 50.864 202.11 123.677 42.063 72.696 44.079 162.316 6.031 236.832-3.14 6.148-10.75 8.461-16.728 5.01z">
                                                                    </path>
                                                                </svg>
                                                                Đăng ký
                                                                <i class="icon icon-arrow-right"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <div class="sib-optin sib-form-block">
                                                        <div class="form__entry entry_mcq">
                                                            <div class="form__label-row ">
                                                                <div class="entry__choice checkbox-wrap">
                                                                    <input type="checkbox" class="input_replaced tf-check style-3" value="1"
                                                                           id="OPT_IN" name="OPT_IN">
                                                                    <label for="OPT_IN" class="h6 font-main text-main">
                                                                        By clicking subcribe, you agree to the
                                                                        <a href="#"
                                                                           class="text-decoration-underline link text-black">Terms
                                                                            of Service </a> and <a href="#"
                                                                                                  class="text-decoration-underline link text-black">
                                                                            Privacy Policy</a>.
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <label class="entry__error entry__error--primary"></label>
                                                            <label class="entry__specification"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="text" name="email_address_check" value="" class="input--hidden">
                                                <input type="hidden" name="locale" value="en">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</footer>
<!-- /Footer -->
