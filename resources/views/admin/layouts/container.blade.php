<div class="container">
    <div class="slim-pageheader">
        <ol class="breadcrumb slim-breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Blank Page</li>
        </ol>
        <h6 class="slim-pagetitle">@yield('title',env('APP_ADMIN_NAME'))</h6>
    </div><!-- slim-pageheader -->

    @yield('content',"")

</div><!-- container -->
