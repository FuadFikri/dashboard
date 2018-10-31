<!DOCTYPE html>
<html lang="en">
	<head>
		<title>three.js webgl - FBX loader - Nurbs</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
		<style>
		body { margin: 0;
				color:#778899; 
				width: 50px;
				}
		</style>
	</head>

	<body>

		<script src="{{ asset('threejs/build/three.js') }}"></script>

		<script src="{{ asset('threejs/js/controls/OrbitControls.js') }}"></script>

		<script src="{{ asset('threejs/js/curves/NURBSCurve.js') }}"></script>
		<script src="{{ asset('threejs/js/curves/NURBSUtils.js') }}"></script>
		<script src="{{ asset('threejs/js/loaders/FBXLoader.js') }}"></script>
			<script src="{{ asset('threejs/js/Inflate.min.js') }}"></script>
		<script src="{{ asset('threejs/js/WebGL.js') }}"></script>
		<script src="{{ asset('threejs/js/libs/stats.min.js') }}"></script>

		<script>

			if ( WEBGL.isWebGLAvailable() === false ) {

				document.body.appendChild( WEBGL.getWebGLErrorMessage() );

			}

			var container, stats, controls;
			var camera, scene, renderer, light;

			init();
			animate();

			function init() {

				container = document.createElement( 'div' );
				document.body.appendChild( container );

				camera = new THREE.PerspectiveCamera( 45, window.innerWidth / window.innerHeight, 2, 15000 );
				camera.position.set( 2000,3000,4000 );

				controls = new THREE.OrbitControls( camera );
				controls.target.set( 0, 100, 0 );
				controls.update();

				scene = new THREE.Scene();
				scene.background = new THREE.Color(0xE8EBED);
				scene.fog = new THREE.Fog(0xE8EBED, 2, 1);

				
				stats = new Stats();
				container.appendChild( stats.dom );

				var loader = new THREE.FBXLoader();
				
				loader.load('{{ asset('/upload/'.$file) }}', function (object3d) {
				scene.add(object3d);
				});

				renderer = new THREE.WebGLRenderer();
				renderer.setPixelRatio(window.devicePixelRatio);
				renderer.setSize(window.innerWidth, window.innerHeight);
				container.appendChild( renderer.domElement );

				window.addEventListener( 'resize', onWindowResize, true );

			}

			function onWindowResize() {

				camera.aspect = window.innerWidth / window.innerHeight;
				camera.updateProjectionMatrix();

				renderer.setSize( window.innerWidth, window.innerHeight );

			}

			//

			function animate() {

				requestAnimationFrame( animate );

				renderer.render( scene, camera );

				stats.update();

			}

		</script>

	</body>
</html>
