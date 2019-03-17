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

    <script src="{{ asset('js/three/build/three.js') }}"></script>
    <script src="{{ asset('js/three/examples/js/controls/OrbitControls.js') }}"></script>
    <script src="{{ asset('js/three/examples/js/loaders/GLTFLoader.js') }}"></script>
    <script src="{{ asset('js/three/examples/js/WebGL.js') }}"></script>

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
            font-size: 45px;
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

        #families{
            cursor: grab;
        }

    </style>
</head>
<body class="bg-light col-lg-12 h-100">

<div class="container d-block">
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


    <div class="container col-lg-12 p-5">
        <div class="title pt-3 col-lg-12 mx-auto text-center">
            <h3 class="mt-3">{{$instrument['name']}}</h3>
        </div>
    </div>

    <div class="container col-lg-12 text-center pt-4">
        <div class="btn text-monospace text-center text-dark">
            <a class="btn-text" style="text-decoration: none" href="{{action('InstrumentController@home')}}"><span>Go back.</span></a>
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


    <div class="container col-lg-12 d-inline">
        <div id="families" class="float-left border" style="width: 600px; height: 400px;"></div>

        <div class="float-left col-lg-4 d-inline-block">
            <div class="typewriter p-3">
                <h5>Description</h5>
            </div>
            <span class="text-monospace text-dark">{{$instrument['details']}}</span>
            <h5 class="text-monospace pt-5 text-dark">Instrument family: <span class="text-muted">{{$family_name['family']}}</span></h5>
            <h5 class="text-monospace pt-1 text-dark">Price: <span class="text-muted">${{$instrument['price']}}</span></h5>
            <h5 class="text-monospace pt-1 text-dark">In stock: <span class="text-muted">{{$instrument['in_store']}}</span></h5>
            <div class="btn text-monospace text-center text-dark">
                <form action="/shopping_cart" method="POST">
                    {!! csrf_field() !!}
                    <input type="hidden" name="id" value="{{ $instrument['id']}}">
                    <input type="hidden" name="name" value="{{ $instrument['name'] }}">
                    <input type="hidden" name="price" value="{{ $instrument['price'] }}">
                    <input type="hidden" name="family" value="{{ $instrument['instrument_family'] }}">
                    <div class="container col-lg-12 text-center p-4">
                        <input type="submit" class="btn-text bg-transparent" value="Add to cart.">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>

        // Three.js - Load .GLTF
        // from https://threejsfundamentals.org/threejs/threejs-load-gltf.html

        'use strict';

        /* global THREE */

        function main(id) {
            var canvas = document.createElement('canvas');
            var div = document.getElementById(id);
            canvas.style.width  = '100%';
            canvas.style.height = '100%';
            div.appendChild(canvas)

            const renderer = new THREE.WebGLRenderer({canvas: canvas});

            const fov = 45;
            const aspect = 2;  // the canvas default
            const near = 0.1;
            const far = 1000;
            const camera = new THREE.PerspectiveCamera(fov, aspect, near, far);
            camera.position.set(0, 10, 20);

            const controls = new THREE.OrbitControls(camera, canvas);
            controls.target.set(0, 5, 0);
            controls.update();

            const scene = new THREE.Scene();
            scene.background = new THREE.Color(0xf8f9fa);




            {
                const skyColor = 0xB1E1FF;  // light blue
                const groundColor = 0xB97A20;  // brownish orange
                const intensity = 1;
                const light = new THREE.HemisphereLight(skyColor, groundColor, intensity);
                scene.add(light);
            }

            {
                const color = 0xFFFFFF;
                const intensity = 1;
                const light = new THREE.DirectionalLight(color, intensity);
                light.position.set(5, 10, 2);
                scene.add(light);
                scene.add(light.target);
            }

            function frameArea(sizeToFitOnScreen, boxSize, boxCenter, camera) {
                const halfSizeToFitOnScreen = sizeToFitOnScreen * 0.8;
                const halfFovY = THREE.Math.degToRad(camera.fov * .5);
                const distance = halfSizeToFitOnScreen / Math.tan(halfFovY);

                // compute a unit vector that points in the direction the camera is now
                // in the xz plane from the center of the box
                const direction = (new THREE.Vector3())
                    .subVectors(camera.position, boxCenter)
                    .multiply(new THREE.Vector3(1, 0, 1))
                    .normalize();

                // move the camera to a position distance units way from the center
                // in whatever direction the camera was from the center already
                camera.position.copy(direction.multiplyScalar(distance).add(boxCenter));

                // pick some near and far values for the frustum that
                // will contain the box.
                camera.near = boxSize / 100;
                camera.far = boxSize * 100;

                camera.updateProjectionMatrix();

                // point the camera to look at the center of the box
                camera.lookAt(boxCenter.x, boxCenter.y, boxCenter.z);
            }

            {
                var obj = String('{{asset($instrument['object'])}}');
                const gltfLoader = new THREE.GLTFLoader();
                gltfLoader.load(obj, (gltf) => {
                    const root = gltf.scene;
                    scene.add(root);

                    // compute the box that contains all the stuff
                    // from root and below
                    const box = new THREE.Box3().setFromObject(root);

                    const boxSize = box.getSize(new THREE.Vector3()).length();
                    const boxCenter = box.getCenter(new THREE.Vector3());

                    // set the camera to frame the box
                    frameArea(boxSize * 0.5, boxSize, boxCenter, camera);

                    // update the Trackball controls to handle the new size
                    controls.maxDistance = boxSize * 10;
                    controls.target.copy(boxCenter);
                    controls.update();
                });
            }

            function resizeRendererToDisplaySize(renderer) {
                const canvas = renderer.domElement;
                const width = canvas.clientWidth;
                const height = canvas.clientHeight;
                const needResize = canvas.width !== width || canvas.height !== height;
                if (needResize) {
                    renderer.setSize(width, height, false);
                }
                return needResize;
            }

            function render() {
                if (resizeRendererToDisplaySize(renderer)) {
                    const canvas = renderer.domElement;
                    document.getElementById(id).appendChild( canvas );
                    camera.aspect = canvas.clientWidth / canvas.clientHeight;
                    camera.updateProjectionMatrix();
                }

                renderer.render(scene, camera);

                requestAnimationFrame(render);
            }

            requestAnimationFrame(render);
        }

        main('families');

    </script>

</div>



</body>
</html>
