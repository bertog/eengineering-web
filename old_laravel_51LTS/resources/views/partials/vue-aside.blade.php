@section('aside')
    <aside>
        <ul>
            <li><a v-link="{ path: '/' }"><i class="fa fa-home fa-2x"></i></a></li>
            <li><a v-link="{ path: '/about'}"><i class="fa fa-users fa-2x"></i></a></li>
            <li><a v-link="{ path: '/contacts'}"><i class="fa fa-map-marker fa-2x"></i></a></li>
            <li><a v-link="{ path: '/brands'}"><i class="fa fa-product-hunt fa-2x"></i></a></li>
            <li><a href="/blog"><i class="fa fa-clipboard fa-2x"></i></a></li>
        </ul>
    </aside>
@stop