<!DOCTYPE html>
<html>
<head>
    <title>~ Quasi Una Fantasia ~</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>

    <!-- Bootstrap core CSS -->
    <link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet">

    <script src="{{ url('js/dropzone.min.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('css/dropzone.min.css') }}">

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
            height: 20vh;
            letter-spacing: 1px;
        }

        h3 {

            background-image: url(https://media.giphy.com/media/26BROrSHlmyzzHf3i/giphy.gif);
            background-size: cover;
            color: transparent;
            -webkit-background-clip: text;
            text-transform: uppercase;
            font-size: 65px;
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

        #preview.btn-text:hover{
            border: 1px dotted #8ebc4f;
            color: #343a40;
        }

        #remove.btn-text:hover{
            border: 1px dotted #e15239;
            color: #343a40;
        }

    </style>
</head>
<body class="bg-light col-lg-12 h-100">

<div class="container d-block mx-auto align-content-center">
    <nav class="navbar navbar-expand-lg navbar-collapse bg-dark navbar-dark rounded-bottom font-weight-bold mb-3">
        <div class="container">
            <div class="collapse navbar-collapse center-block" id="navbarResponsive">
                <ul class="navbar-nav justify-content-center">
                    <li class="nav-item mr-5"><a class="nav-link" href="/home">Home</a></li>
                    <li class="nav-item mr-5"><a class="nav-link" href="/catalogue">Catalogue</a></li>
                    <li class="nav-item mr-5"><a class="nav-link" href="/upload">Upload</a></li>
                    <li class="nav-item active"><a class="nav-link text-light" href="/shopping_cart">Shopping cart</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container col-lg-12 p-5">
        <div class="title pt-3 col-lg-12 mx-auto text-center">
            <h3 class="mt-3">Shopping cart</h3>
        </div>
    </div>

    <hr class="style15">

    @if (session('success'))
        <div class="alert alert-success" style="margin: 15px;">
            <strong> {{ session('success') }} </strong>
        </div>
        @elseif(session('warning'))
        <div class="alert alert-warning" style="margin: 15px;">
            <strong> {{ session('warning') }} </strong>
        </div>
    @endif

    @if(sizeof($data) > 0)
        <div class="table-responsive">
        <table class="mx-auto text-monospace m-4 col-9 table">
            <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th></th>
                <th class="text-center">Quantity</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            </thead>

            <tbody class="text-monospace text-dark">
        @foreach($data as $ins)
            <tr>
                <td>
                    <p><strong>{{$ins->model->name}}</strong></p>
                </td>
                <td>${{$ins->price}}</td>
                <td class="float-right">
                    <div class="btn text-monospace text-center text-dark">
                        <a class="btn-text" style="text-decoration: none" href="{{action('CartController@decrease', ['id' => $ins->id])}}"><span>-</span></a>
                    </div>
                </td>
                <td class="text-center">{{$ins->qty}}</td>
                <td class="float-left">
                    <div class="btn text-monospace text-center text-dark">
                        <a class="btn-text" style="text-decoration: none" href="{{action('CartController@increase', ['id' => $ins->id])}}"><span>+</span></a>
                    </div>
                </td>
                <td>
                    <div class="btn text-monospace text-center float-right">
                        <a id="preview" class="btn-text" style="text-decoration: none" href="/catalogue/{{$ins->model->instrument_family}}/preview/{{$ins->id}}"><span>Preview</span></a>
                    </div>
                <td>
                    <div class="btn text-monospace text-center">
                        <a id="remove" class="btn-text" style="text-decoration: none" href="{{action('CartController@remove', ['id' => $ins->id])}}"><span>Remove</span></a>
                    </div>
                </td>
            </tr>
        @endforeach

            </tbody>

            <tfoot>
            <tr>
                <td class="mt-4 pt-5" colspan="5">&nbsp;</td>
                <td class="h5 pt-5 float-right text-monospace text-uppercase">Total:</td>
                <td class="h5 mt-4 pt-5 text-monospace">${{$total}}</td>
            </tr>
            <tr class="table-borderless">
                <td class="mt-4 pt-5" colspan="5">&nbsp;</td>
                <td>
                    <div class="btn text-monospace text-center float-right">
                        <a class="btn-text" style="text-decoration: none" href="{{action('CartController@checkout')}}"><span>Checkout.</span></a>
                    </div>
                </td>
                <td>
                    <div class="btn text-monospace text-center">
                        <a class="btn-text" style="text-decoration: none"  href="{{action('CartController@clear')}}"><span>Clear.</span></a>
                    </div>
                </td>
            </tr>
            </tfoot>
        </table>
        </div>


    @else
        <div class="typewriter pt-5 col-lg-10 mx-auto text-muted text-center">
            <h5>There are currently no instruments in your shopping cart.</h5>
        </div>
    @endif

</div>

</body>
</html>
