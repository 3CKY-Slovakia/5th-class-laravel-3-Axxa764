<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>

    <meta charset="utf-8" />
    <title>STI Blog</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <!--Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('/images/favicon.png') }}" />

    <!-- CSS Files -->

    <link rel="stylesheet" href="{{ asset('css/reset.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/socials.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/flexslider.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/simpletextrotator.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/cubeportfolio.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/timeline.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/settings-ie8.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/settings.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/player/YTPlayer.css') }}" />
    <!-- Page Styles -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/backgrounds.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}" />
    <link rel="stylesheet" href="{{ asset('js/summernote-0.6.16-dist/dist/summernote.css') }}" />
    <!-- End Page Styles -->

    <!-- Page Layout Color, night or dark -->
    <link id="changeable_tone" rel="stylesheet" href="{{ asset('css/page_tones/dark.css') }}" />
    <!-- End Page Layout Color -->

    <!-- Page Elements Color -->
    <link id="changeable_color" rel="stylesheet" href="{{ asset('css/colors/red.css') }}" />
    <!-- End Page Elements Color -->

    <!-- Page Fonts / Pacifico-->
    <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    <!-- Raleway-->
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100,,200,300,600,700' rel='stylesheet' type='text/css'>
    <!-- Oswald-->
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,700,300' rel='stylesheet' type='text/css'>

    <!-- End CSS Files -->

</head>

<!-- Body Start -->
<body class="parallax">

@include('sections.page-loader')

@include('sections.page-top')

@include('sections.navigation')

@include('sections.header', ['image' => '40'])

@yield('content')

@include('sections.contact')

@include('sections.footer')



<!-- JS Files -->
<script type="text/javascript" src="{{ asset('js/jquery-2.1.3.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.appear.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/waypoint.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/modernizr-latest.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/SmoothScroll.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.superslides.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.flexslider.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.simple-text-rotator.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.cubeportfolio.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.parallax-1.1.3.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/skrollr.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.fitvids.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.mb.YTPlayer.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/summernote-0.6.16-dist/dist/summernote.js') }}"></script>
<!-- Contact Form -->
<script type="text/javascript" src="{{ asset('js/jquery.validate.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/contact-form.js') }}"></script>
<!-- Twitter -->
<script type="text/javascript" src="{{ asset('js/tweecool.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/tweecool.js') }}"></script>
<!-- Page Plugins -->
<script type="text/javascript" src="{{ asset('js/plugins.js') }}"></script>
<!-- Portfolio Plugins -->
<script type="text/javascript" src="{{ asset('js/portfolio.js') }}"></script>
<!-- End JS Files -->

<!-- MASTER JS -->
<script type="text/javascript" src="{{ asset('js/master.js') }}"></script>

<script>
    $(document).ready(function() {
        $('#latest_tweets').tweecool({
            username : 'envato'
        });
    });
</script>

<!-- GRITTER -->
@if(count($errors) > 0)
    <script>
        @foreach ($errors->all() as $error)
        $.gritter.add({
            title: 'Something went wrong!',
            text: '{{ $error }}'
        });
        @endforeach
    </script>
@endif
@if(Session::has('message'))
    <script>
        $.gritter.add({
            title: 'This is a notice!',
            text: '{{ Session::get('message') }}'
        });
    </script>
@endif


</body>
<!-- Body End -->
</html>