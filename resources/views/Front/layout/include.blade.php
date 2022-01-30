        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                @isset($title)
                <div class="masthead-subheading">{{$title}}</div>
                @endisset
                @isset($subTitle)
                <div class="masthead-heading text-uppercase">{{$subTitle}}</div>
                @endisset
                @isset($bottun)
                <a class="btn btn-primary btn-xl text-uppercase" href="{{route('ServicePage')}}">{{$bottun}}</a>
                @endisset
            </div>
        </header>
