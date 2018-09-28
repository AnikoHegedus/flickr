<!doctype html>
<html lang="en">

<meta charset="utf-8">
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
        {!! Form::open(['action' => 'SearchController@search', 'url' => 'search', 'method' => 'POST', 'class' => 'row
        text-center text-lg-left']) !!}
        {{ Form::label('keyword', 'Keyword', array('class' => 'keyword')) }}
        {{ Form::text('keyword') }}
        {{ Form::submit('Search', ['class' => 'btn btn-primary']) }}
        {!! Form::close() !!}
        <div class="row text-center text-lg-left">
            <div class="col-lg-3 col-md-4 col-xs-6">
                <img src="https://farm2.staticflickr.com/1929/30016268047_c65a02596b.jpg"/>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6">
                <a href="#" class="d-block mb-4 h-100 pic"></a>
            </div>
        </div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
<script src="js/app.js"></script>
<script src="../../angular/app.js"></script>
</html>