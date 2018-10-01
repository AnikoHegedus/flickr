<!doctype html>
<html lang="en">

<meta charset="utf-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"></script>
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
            'row text-center text-lg-left', 'id'=>'search', 'value'=>'{{ csrf_token() }}']) !!}
            {{ Form::label('keyword', 'Keyword', array('class' => 'keyword')) }}
            {{ Form::text("keyword1", null, array('class' => 'keyword1')) }}
            {{ Form::select('keyword2', array(
                '' => '',
                'Cats' => array('Leopard' => 'Leopard', 'Lion' => 'Lion', "Mountain Lion" => 'Mountain Lion'),
                'Dogs' => array('Spaniel' => 'Spaniel', 'German Shepherd' => "German Shepherd", "Boxer" => "Boxer"),
                'Birds' => array('Peacock' => 'Peacock', 'Eagle' => 'Eagle', 'Ostrich' => 'Ostrich'),
                'Horses' => array('Mustang' => "Mustang", "Pony" => "Pony")
            ), null, array('class' => 'keyword2') ) }}
            {{ Form::submit('Search', array('class' => 'btn btn-primary')) }}
            <br>
            {{ Form::submit('Reset search fields', array('class' => 'btn btn-info', 'id' => 'reset')) }}
            {!! Form::close() !!}
        </div>

        <div class="row">
            @if(isset($flickr_response))
            @foreach ($flickr_response['photos']['photo'] as $image)

            <div class="col-md-6">
                <div class="card">
                    <img class="card-img-bottom" src='https://farm{{$image["farm"]}}.staticflickr.com/{{$image["server"]}}/{{$image["id"]}}_{{$image["secret"]}}.jpg'>
                    <div class="card-body">
                        <h4 class="card-title">{{ $image["title"] }}</h4>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <h3 class="text-center">{{ "Type in a keyword or choose from the list" }}</h3>
            @endif
        </div>

</body>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
<script src="js/app.js"></script>
<script src="../../resources/assets/js/reset.js"></script>
</html>