<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'test') ? '' : 'collapsed' }}" href="{{url('/test')}}">
                <i class="bi bi-dash-circle"></i>
                <span>TEST PAGE</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'home') ? '' : 'collapsed' }}" href="{{url('/')}}">
                <i class="bi bi-grid"></i>
                <span>Home</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'json-viewer') ? '' : 'collapsed' }}" href="{{url('/json-viewer')}}">
                <i class="bi bi-dash-circle"></i>
                <span>JSON Viewer</span>
            </a>
        </li>



    </ul>

</aside><!-- End Sidebar-->
