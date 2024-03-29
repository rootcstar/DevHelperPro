<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

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
        <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'json-xml') ? '' : 'collapsed' }}" href="{{url('/json-xml')}}">
                <i class="bi bi-dash-circle"></i>
                <span>JSON and XML Converter Viewer</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'json-csv') ? '' : 'collapsed' }}" href="{{url('/json-csv')}}">
                <i class="bi bi-dash-circle"></i>
                <span>JSON to CSV Converter</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'csv-json') ? '' : 'collapsed' }}" href="{{url('/csv-json')}}">
                <i class="bi bi-dash-circle"></i>
                <span>CSV to JSON Converter</span>
            </a>
        </li>


    </ul>

</aside><!-- End Sidebar-->
