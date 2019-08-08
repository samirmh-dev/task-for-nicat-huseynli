<div class="container">
    <div class="slim-pageheader">
        @yield('breadcrumbs', Breadcrumbs::render('home'))

        <h6 class="slim-pagetitle">@yield('title',env('APP_ADMIN_NAME'))</h6>
    </div><!-- slim-pageheader -->

    @yield('content',"")

</div><!-- container -->
