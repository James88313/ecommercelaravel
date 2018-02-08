<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body>
    @include('includes.header')
    <div class="container main">
        <div id="content" class="row">
            @if(Session::has('success'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        {{ Session::get('success')  }}
                    </div>
    @endif
    @if ($errors->any())
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>                
    @endif
            @yield('content')
        </div>
    </div>
    @include('includes.footer')
    <!-- LOAD MDB JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.5/js/mdb.min.js"></script>
</body>
</html>