<!doctype html>
<html lang="en">

<meta charset="utf-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Flickr Search</title>

<!-- Bootstrap core CSS -->
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="css/app.css" rel="stylesheet">

</head>

<body>
    @include('inc.navbar')

    <!-- Page Content -->
    <div class="container">
        <h1 class="my-4 text-center text-lg-left">Flickr Gallery</h1>
        <div class="form-group">
            {!! Form::open(['action' => 'SearchController@search', 'url' => 'search', 'method' => 'POST', 'class' =>
            'row
            text-center text-lg-left', 'id'=>'search', 'value'=>'{{ csrf_token() }}']) !!}
            {{ Form::label('keyword', 'Keyword', array('class' => 'keyword')) }}
            {{ Form::text("keyword") }}
           {{ Form::select('keyword', array(
                'Cats' => array('leopard' => 'Leopard'),
                'Dogs' => array('spaniel' => 'Spaniel'),
            )) }}
            {{ Form::submit('Search', ['class' => 'btn btn-primary']) }}
            {!! Form::close() !!}
        </div>

<div class="row">
                <div class="d-flex justify-content-between align-items-center">
        @if(isset($flickr_response))
            @foreach ($flickr_response['photos']['photo'] as $image)
                    <div class="col-md-4 mx-2 justify-content-around">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top" src='https://farm{{$image["farm"]}}.staticflickr.com/{{$image["server"]}}/{{$image["id"]}}_{{$image["secret"]}}.jpg' />
                            <div class="card-body">
                                <p class="card-text">{{ $image["title"] }}</p>
                            </div>
                        </div>
                    </div>
            @endforeach
        @endif
        </div>
        </div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
<script src="js/app.js"></script>

</html>