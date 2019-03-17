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

    {{--<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">--}}

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
            height: 20vh;
            letter-spacing: 1px;
        }

        h3 {

            background-image: url(https://media.giphy.com/media/26BROrSHlmyzzHf3i/giphy.gif);
            background-size: cover;
            color: transparent;
            -webkit-background-clip: text;
            text-transform: uppercase;
            font-size: 80px;
            line-height: .75;

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

        .typewriter h5 {
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

        .border-active{
            border: 1px dotted #343a40;
        }


        .btn-text{
            border: 1px solid #343a40;
            padding: 10px;
            border-radius: 8px;
            color: #343a40;
        }

        .btn-text:hover{
            border: 1px dotted #343a40;
            color: #343a40;
        }


    </style>
</head>
<body class="bg-light col-lg-12 h-100">

<div class="container d-block justify-content-center text-center">
    <nav class="navbar navbar-expand-lg navbar-collapse bg-dark navbar-dark rounded-bottom font-weight-bold mb-3">
        <div class="container">
            <div class="collapse navbar-collapse center-block" id="navbarResponsive">
                <ul class="navbar-nav justify-content-center">
                    <li class="nav-item mr-5"><a class="nav-link" href="/home">Home</a></li>
                    <li class="nav-item active mr-5"><a class="nav-link text-light" href="/catalogue">Catalogue</a></li>
                    <li class="nav-item mr-5"><a class="nav-link" href="/upload">Upload</a></li>
                    <li class="nav-item"><a class="nav-link" href="/shopping_cart">Shopping cart</a></li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="title pt-2 col-lg-2 mx-auto text-center">
        <h3>Catalogue.</h3>
    </div>

    <div class="container">
        <hr class="style15">
        <div class="text-monospace text-center text-dark">
            <span>Musical instruments are grouped into families based on how they make sounds. In an orchestra, musicians sit together in these family groupings. But not every instrument fits neatly into a group. For example, the piano has strings that vibrate, and hammers that strike. Is it a string instrument or a percussion instrument? Some say it is both!</span>
        </div>
        <hr class="style15">
    </div>



    <div class="container text-center">
        <div class="btn-group">
            @if($family == 1)
            <div class="btn rounded-pill border-active mt-2 mb-2 mr-4 ml-4">
                <a class="btn-link text-dark" style="text-decoration: none" href="{{action('InstrumentController@instruments', 1)}}">
                    <span>Brass</span>
                </a>
            </div>
            <div class="btn rounded-pill border border-dark mt-2 mb-2 mr-4 ml-4">
                <a class="btn-link text-dark" style="text-decoration: none" href="{{action('InstrumentController@instruments', 2)}}">
                    <span>Percussion</span>
                </a>
            </div>
            <div class="btn rounded-pill border border-dark mt-2 mb-2 mr-4 ml-4">
                <a class="btn-link text-dark" style="text-decoration: none" href="{{action('InstrumentController@instruments', 3)}}">
                    <span>String</span>
                </a>
            </div>
            <div class="btn rounded-pill border border-dark mt-2 mb-2 mr-4 ml-4">
                <a class="btn-link text-dark" style="text-decoration: none" href="{{action('InstrumentController@instruments', 4)}}">
                    <span>Woodwind</span>
                </a>
            </div>
            @elseif($family == 2)

                <div class="btn rounded-pill border border-dark mt-2 mb-2 mr-4 ml-4">
                    <a class="btn-link text-dark" style="text-decoration: none" href="{{action('InstrumentController@instruments', 1)}}">
                    <span>Brass</span>
                    </a>
                </div>
                <div class="btn text-dark border-active rounded-pill mt-2 mb-2 mr-4 ml-4">
                    <a class="btn-link text-dark" style="text-decoration: none" href="{{action('InstrumentController@instruments', 2)}}">
                    <span>Percussion</span>
                    </a>
                </div>
                <div class="btn rounded-pill border border-dark mt-2 mb-2 mr-4 ml-4">
                    <a class="btn-link text-dark" style="text-decoration: none" href="{{action('InstrumentController@instruments', 3)}}">
                    <span>String</span>
                    </a>
                </div>
                <div class="btn rounded-pill border border-dark mt-2 mb-2 mr-4 ml-4">
                    <a class="btn-link text-dark" style="text-decoration: none" href="{{action('InstrumentController@instruments', 4)}}">
                    <span>Woodwind</span>
                    </a>
                </div>

                @elseif( $family == 3)
                    <div class="btn rounded-pill border border-dark mt-2 mb-2 mr-4 ml-4">
                        <a class="btn-link text-dark" style="text-decoration: none" href="{{action('InstrumentController@instruments', 1)}}">
                        <span>Brass</span>
                        </a>
                    </div>
                    <div class="btn rounded-pill border border-dark mt-2 mb-2 mr-4 ml-4">
                        <a class="btn-link text-dark" style="text-decoration: none" href="{{action('InstrumentController@instruments', 2)}}">
                        <span>Percussion</span>
                        </a>
                    </div>
                    <div class="btn text-dark rounded-pill border-active mt-2 mb-2 mr-4 ml-4">
                        <a class="btn-link text-dark" style="text-decoration: none" href="{{action('InstrumentController@instruments', 3)}}">
                        <span>String</span>
                        </a>
                    </div>
                    <div class="btn rounded-pill border border-dark mt-2 mb-2 mr-4 ml-4">
                        <a class="btn-link text-dark" style="text-decoration: none" href="{{action('InstrumentController@instruments', 4)}}">
                        <span>Woodwind</span>
                        </a>
                    </div>
                @else
                    <div class="btn rounded-pill border border-dark mt-2 mb-2 mr-4 ml-4">
                        <a class="btn-link text-dark" style="text-decoration: none" href="{{action('InstrumentController@instruments', 1)}}">
                        <span>Brass</span>
                        </a>
                    </div>
                    <div class="btn rounded-pill border border-dark mt-2 mb-2 mr-4 ml-4">
                        <a class="btn-link text-dark" style="text-decoration: none" href="{{action('InstrumentController@instruments', 2)}}">
                        <span>Percussion</span>
                        </a>
                    </div>
                    <div class="btn rounded-pill border border-dark mt-2 mb-2 mr-4 ml-4">
                        <a class="btn-link text-dark" style="text-decoration: none" href="{{action('InstrumentController@instruments', 3)}}">
                        <span>String</span>
                        </a>
                    </div>
                    <div class="btn text-dark rounded-pill border-active mt-2 mb-2 mr-4 ml-4">
                        <a class="btn-link text-dark" style="text-decoration: none" href="{{action('InstrumentController@instruments', 4)}}">
                        <span>Woodwind</span>
                        </a>
                    </div>
                @endif
        </div>
    </div>


    @if(sizeof($instruments) == 0)
        <div class="typewriter pt-5 col-lg-10 mx-auto text-muted text-center">
            <h5>There are currently no instruments in this instrument family.</h5>
        </div>
    @else
    @foreach($instruments as $ins)
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
                        <a class="btn-text" style="text-decoration: none" href="/catalogue/{{$family}}/instruments/{{$ins['id']}}"><span>See more.</span></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
    @endforeach
    @endif

    <hr class="style15">

    {{ $instruments->links("pagination::customPagination") }}

</div>



</body>
</html>
