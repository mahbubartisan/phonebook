<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	@vite('resources/css/app.css')
	<title>404 Page</title>
</head>

<body class="bg-indigo-800">
	<!-- ====== Error 404 Section Start -->
	<section class="font-inter text-center space-y-4">
		<h1 class="text-9xl text-white font-bold mt-48 leading-tight">404 Page</h1>
		
		<p class="text-2xl text-white font">
			The page you are looking for it maybe deleted
		</p>
		<a href="{{ url('/')}}" type="button" class="border border-white px-5 py-2.5 rounded-full bg-white text-indigo-700 font-bold leading-tight hover:shadow-lg hover:text-blue-500">
			Go To Home
		</a>
	</section>
	<!-- ====== Error 404 Section End -->

</body>

</html>
