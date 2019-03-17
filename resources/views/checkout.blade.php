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
                    <li class="nav-item active"><a class="nav-link" href="/shopping_cart">Shopping cart</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container col-lg-12 p-5">
        <div class="title pt-3 col-lg-12 mx-auto text-center">
            <h3 class="mt-3">Checkout.</h3>
        </div>
    </div>

    <div class="container col-lg-12 text-center pt-4">
        <div class="btn text-monospace text-center text-dark">
            <a class="btn-text" style="text-decoration: none" href="{{action('CartController@index')}}"><span>Back to cart.</span></a>
        </div>
    </div>

    <hr class="style15">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
    @endif
    @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
        @elseif(session()->get('danger'))
            <div class="alert alert-danger">
                {{ session()->get('danger') }}
            </div>
    @endif

    <form method="POST" class="d-inline-block pt-5 col-lg-6 col-md-6" enctype="multipart/form-data">
        {{csrf_field()}}

        <h4 class="p-3">Billing Details</h4>

        <div class="form-group col-10 float-left p-3">
            <label class="text-monospace text-muted" style="font-size: 20px">E-mail address:</label><br/>
            <input type="email" class="form-control" name="email" required>
        </div>

        <div class="form-group col-10 float-left p-3">
            <label class="text-monospace text-muted" style="font-size: 20px">Full name:</label><br/>
            <input type="text" class="form-control" name="full_name" required>
        </div>

        <div class="form-group col-5 float-left p-3">
            <label class="text-monospace text-muted" style="font-size: 20px">City:</label><br/>
            <input type="text" class="form-control" name="city" required>
        </div>

        <div class="form-group col-5 float-left p-3">
            <label class="text-monospace text-muted" style="font-size: 20px">Province:</label><br/>
            <input type="text" class="form-control" name="province" required>
        </div>

        <div class="form-group col-5 float-left p-3">
            <label class="text-monospace text-muted" style="font-size: 20px">Postal code:</label><br/>
            <input type="text" class="form-control" name="postal_code" required>
        </div>

        <div class="form-group col-5 float-left pb-5 pl-3 pr-3 pt-3">
            <label class="text-monospace text-muted" style="font-size: 20px">Phone:</label><br/>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">+389</span>
                </div>
                <input type="text" class="form-control" name="phone" required>
            </div>
        </div>

        <h4 class="p-3">Payment Details</h4>

        <div class="form-group col-10 float-left p-3">
            <label class="text-monospace text-muted" style="font-size: 20px">Name on the card:</label><br/>
            <input type="text" class="form-control" name="name_on_card" required>
        </div>

        <div class="form-group col-10 float-left p-3">
            <label class="text-monospace text-muted" style="font-size: 20px">Credit or debit card:</label><br/>
            <input type="text" class="form-control" name="card_number" placeholder="Card number" required>
        </div>

        <div class="form-group col-5 float-left p-3">
            <label class="text-monospace text-muted" style="font-size: 20px">Expiration date:</label><br/>
            <input type="month" class="form-control" name="expiration_date" required>
        </div>

        <div class="form-group col-5 float-left p-3">
            <label class="text-monospace text-muted" style="font-size: 20px">CVC:</label><br/>
            <input type="text" class="form-control" name="cvc" required>
        </div>

        <div class="text-center float-right p-4">
            <button type="submit" class="btn btn-text text-monospace text-center text-dark">Submit.</button>
        </div>
    </form>

    @if(sizeof($data) > 0)
    <div class="table-responsive d-inline-block float-right col-lg-6 col-md-6" style="padding-top: 120px">
        <table class="mx-auto text-monospace m-4 col-9 table">
            <thead>
            <tr>
                <th class="h5">Product</th>
                <th class="h5 text-center">Quantity</th>
                <th class="h5">Price</th>
            </tr>
            </thead>

            <tbody class="text-monospace text-muted">
            @foreach($data as $ins)
                <tr>
                    <td>
                        <p><strong>{{$ins->model->name}}</strong></p>
                    </td>
                    <td class="text-center">{{$ins->qty}}</td>
                    <td>${{$ins->price}}</td>
                </tr>
            @endforeach

            </tbody>

            <tfoot>
            <tr>
                <td class="mt-4 pt-5" colspan="1">&nbsp;</td>
                <td class="h5 pt-5 float-right text-monospace font-weight-bold text-uppercase">Total:</td>
                <td class="h5 mt-4 pt-5 text-monospace font-weight-bold">${{$total}}</td>
            </tr>
            </tfoot>
        </table>
    </div>
    @endif
</div>


</body>
</html>
