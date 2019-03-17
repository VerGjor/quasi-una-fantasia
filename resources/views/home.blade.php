<!DOCTYPE html>
<html>
<head>
    <title>~ Quasi Una Fantasia ~</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>

        body {
            color: #000;
            font-family: Monospace, serif;
            font-size:13px;

            background-color: #fff;
            margin: 0;
        }

        * {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
        }


        #info {
            position: absolute;
            top: 0; width: 100%;
            padding: 5px;
            text-align:center;
        }

        #content {
            position: absolute;
            top: 0; width: 100%;
            z-index: 1;
            padding: 3em 0 0 0;
        }

        a {
            color: #0080ff;
        }

        #c {
            position: absolute;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .list-item .scene {
            width: 200px;
            height: 200px;
        }

        .list-item .description {
            color: #888;
            font-family: sans-serif;
            font-size: large;
            width: 200px;
            margin-top: 0.5em;
        }

        .title {
            font-family: "Montserrat", serif;
            text-align: center;
            color: #FFF;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 50vh;
            letter-spacing: 1px;
        }

        h1 {

            background-image: url(https://media.giphy.com/media/26BROrSHlmyzzHf3i/giphy.gif);
            background-size: cover;
            color: transparent;
            -webkit-background-clip: text;
            text-transform: uppercase;
            font-size: 100px;
            line-height: .75;
            margin: 10px 0;

        }

        .navbar-nav {
            width: 100%;
            text-align: center;
        }

        li {
            float: none;
            display: inline-block;
        }

        #scene3d {
            width: 300px;
            height: 300px;
            background: red;
        }

        .typewriter h3 {
            overflow: hidden; /* Ensures the content is not revealed until the animation */
            border-right: .15em solid orange; /* The typwriter cursor */
            white-space: nowrap; /* Keeps the content on a single line */
            margin: 0 auto; /* Gives that scrolling effect as the typing happens */
            letter-spacing: .15em; /* Adjust as needed */
            animation:
                    typing 3.5s steps(40, end),
                    blink-caret .75s step-end infinite;
        }

        /* The typing effect */
        @keyframes typing {
            from { width: 0 }
            to { width: 100% }
        }

        /* The typewriter cursor effect */
        @keyframes blink-caret {
            from, to { border-color: transparent }
            50% { border-color: orange; }
        }

        hr.style15 {
            margin-top: 50px;
            height: 10px;
            border: 0;
            box-shadow: 0 10px 10px -10px #8c8b8b inset;
        }

        .btn{
            border: 1px solid;
        }

        .btn-text, .btn-text:hover{
            color: #343a40;
        }

        .btn:hover{
            border: 1px dotted #343a40;
        }



    </style>

</head>
<body class="bg-light col-lg-12 h-100">

<div class="container d-block justify-content-center text-center">
    <nav class="navbar navbar-expand-lg navbar-collapse bg-dark navbar-dark rounded-bottom font-weight-bold mb-3">
        <div class="container">
            <div class="collapse navbar-collapse center-block" id="navbarResponsive">
                <ul class="navbar-nav justify-content-center">
                    <li class="nav-item active mr-5"><a class="nav-link text-light" href="/home">Home</a></li>
                    <li class="nav-item mr-5"><a class="nav-link" href="/catalogue">Catalogue</a></li>
                    <li class="nav-item mr-5"><a class="nav-link" href="/upload">Upload</a></li>
                    <li class="nav-item"><a class="nav-link" href="/shopping_cart">Shopping cart</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="title text-center mb-5 col-lg-12 m-2">
        <h1>Quasi<br/>Una<br/>Fantasia</h1>
    </div>

    <div class="typewriter pt-5 col-lg-12 mx-auto text-center">
        <h3>Home of the rarest instruments from across the globe.</h3>
    </div>

    <hr class="style15">

    <div class="col-lg-12 pt-5 pb-2">
        <h4 class="text-dark font-weight-light text-center">Latest additions.</h4>
    </div>

    @foreach($post as $ins)
        <div class="row d-inline-block col-xl-4 col-lg-4">
            <div class="card-group mr-3 ml-3 mt-3 col-xl-12 col-lg-12 justify-content-center">
                <div class="row mx-auto col-lg-12 w-100">

                    <div class="container col-xl-12 col-lg-12 col-md-8 col-sm-12 mx-auto mt-5 mr-5 ml-5">
                        <div class="w-75 h-75 border border-dark" >
                            <div class="card-img mx-auto p-3">
                                <img class="img-thumbnail embed-responsive w-100 h-100" src="{{asset($ins['preview'])}}" width="350" height="200"/>
                            </div>
                            <div class="card-title text-monospace text-center text-dark"><h5></h5></div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="card-group mr-3 ml-3 mb-3 col-xl-12 col-lg-12 justify-content-center">
                <div class="row mx-auto col-lg-12 w-100">

                    <div class="container col-xl-12 col-lg-12 col-md-8 col-sm-12 mx-auto">
                        <div class="w-75 h-75 text-center" >
                            <div class="card-title text-monospace text-center text-dark"><span style="font-size: 15px">{{$ins['name']}}</span></div>
                            <div class="card-body text-monospace text-center text-dark"><span style="font-size: 15px">${{$ins['price']}}</span></div>
                            <div class="btn text-monospace text-center text-dark">
                                <a class="btn-text" style="text-decoration: none" href="{{action('InstrumentController@instrument_info_home', ['id' => $ins['instrument_family'], 'index' => $ins['id']])}}"><span>See more.</span></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endforeach
    <hr class="style15">

</div>



</body>
</html>
