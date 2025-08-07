<meta charset="utf-8">
<title>@yield('title')</title>
<meta name="author" content="">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">


<!-- Favicon and touch Icons -->
<link rel="shortcut icon" href="{{@$config->favicon->path ?? ''}}" type="image/x-icon">
<link rel="apple-touch-icon" sizes="180x180" href="{{@$config->favicon->path ?? ''}}">
<link rel="icon" type="image/png" sizes="32x32" href="{{@$config->favicon->path ?? ''}}">
<link rel="icon" type="image/png" sizes="16x16" href="{{@$config->favicon->path ?? ''}}">
<meta name="application-name" content="{{ $config->web_title }}" />
<meta name="generator" content="@yield('title')" />

<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:title" content="@yield('title')">
<meta property="og:description" content="@yield('description')">
<meta property="og:image" content="@yield('image')">
<meta property="og:site_name" content="{{ url()->current() }}">
<meta property="og:image:alt" content="{{ $config->web_title }}">
<meta itemprop="description" content="@yield('description')">
<meta itemprop="image" content="@yield('image')">
<meta itemprop="url" content="{{ url()->current() }}">
<meta property="og:type" content="website" />
<meta property="og:locale" content="vi_VN" />
<meta name="twitter:card" content="summary" />
<meta name="twitter:site" content="{{ url()->current() }}" />


<!-- font -->
<link rel="stylesheet" href="/site/fonts/fonts.css">
<link rel="stylesheet" href="/site/icon/icomoon/style.css">
<link
    href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap"
    rel="stylesheet"
/>

<!-- css -->
<link rel="stylesheet" href="/site/sibforms.com/forms/end-form/build/sib-styles.css">
<link rel="stylesheet" href="/site/css/bootstrap.min.css">
<link rel="stylesheet" href="/site/css/swiper-bundle.min.css">
<link rel="stylesheet" href="/site/css/animate.css">
<link rel="stylesheet" type="text/css" href="/site/css/styles.css">



<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({pageLanguage: 'vi',includedLanguages:'en,hi,vi,zh-CN', }, 'translate_select');
    }
</script>
<style>
    .VIpgJd-ZVi9od-aZ2wEe-wOHMyf-ti6hGc {
        display: none;
    }
    .skiptranslate{
        display: none;
        top: 0;
    }
    .goog-te-banner-frame{display: none !important;}
    .goog-text-highlight { background: none !important; box-shadow: none !important;}
    .goog-te-banner-frame.skiptranslate {
        display: none !important;
    }

    .goog-gt-tt{
        display: none !important;
    }
    body {
        position: revert!important;
        top: 0px !important;
    }
</style>
<style>
    .tf-languages {
        position: relative;
        display: inline-block;
    }

    /* 1. Select chính không viền, text header trắng rõ */
    .tf-languages select#siteLang {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;

        background: transparent;   /* giữ trong suốt */
        border: none;              /* bỏ border */
        padding: 8px 32px 8px 12px;/* chừa chỗ cho arrow */
        font-size: 16px;           /* to hơn */
        font-weight: 600;          /* đậm hơn */
        color: #fff;               /* chữ trắng rõ */
        cursor: pointer;

        /* mũi tên custom trắng */
        background-image: url("data:image/svg+xml;utf8,<svg width='10' height='6' viewBox='0 0 10 6' xmlns='http://www.w3.org/2000/svg'><path d='M0 0l5 6 5-6H0z' fill='%23fff'/></svg>");
        background-repeat: no-repeat;
        background-position: calc(100% - 8px) center;
        background-size: 10px 6px;
    }

    /* 2. Style cho dropdown list (nhiều trình duyệt hỗ trợ) */
    .tf-languages select#siteLang option {
        background-color: #fff;  /* nền trắng */
        color: #333;             /* chữ đen, dễ đọc */
        font-size: 15px;
        font-weight: 500;
        padding: 6px 12px;
    }

    /* 3. Ẩn arrow mặc định IE/Edge */
    .tf-languages select#siteLang::-ms-expand {
        display: none;
    }

    /* 4. Focus outline nhẹ để UX tốt hơn */
    .tf-languages select#siteLang:focus {
        outline: none;
        box-shadow: 0 0 0 2px rgba(255,255,255,0.5);
    }


</style>

<style>
    .tf-languages {
        position: relative;
        display: inline-block;
    }

    /* 1. Select chính không viền, text header trắng rõ */
    .tf-languages select#siteLang2 {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;

        background: transparent;   /* giữ trong suốt */
        border: none;              /* bỏ border */
        padding: 8px 32px 8px 12px;/* chừa chỗ cho arrow */
        font-size: 16px;           /* to hơn */
        font-weight: 600;          /* đậm hơn */
        color: black;               /* chữ trắng rõ */
        cursor: pointer;

        /* mũi tên custom trắng */
        background-image: url("data:image/svg+xml;utf8,<svg width='10' height='6' viewBox='0 0 10 6' xmlns='http://www.w3.org/2000/svg'><path d='M0 0l5 6 5-6H0z' fill='%23fff'/></svg>");
        background-repeat: no-repeat;
        background-position: calc(100% - 8px) center;
        background-size: 10px 6px;
    }

    /* 2. Style cho dropdown list (nhiều trình duyệt hỗ trợ) */
    .tf-languages select#siteLang2 option {
        background-color: #fff;  /* nền trắng */
        color: #333;             /* chữ đen, dễ đọc */
        font-size: 15px;
        font-weight: 500;
        padding: 6px 12px;
    }

    /* 3. Ẩn arrow mặc định IE/Edge */
    .tf-languages select#siteLang2::-ms-expand {
        display: none;
    }

    /* 4. Focus outline nhẹ để UX tốt hơn */
    .tf-languages select#siteLang2:focus {
        outline: none;
        box-shadow: 0 0 0 2px rgba(255,255,255,0.5);
    }


</style>
