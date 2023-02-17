<div class="pagetitle">
    <h1>{{ucwords(str_replace("-"," ",Route::currentRouteName()))}}</h1>
    <nav>
        <ol class="breadcrumb">
            @if(Route::currentRouteName() != 'home')
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            @endif

            <li class="breadcrumb-item active">{{ucwords(str_replace("-"," ",Route::currentRouteName()))}}</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
