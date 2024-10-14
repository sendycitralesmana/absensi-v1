<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Karyawan</title>
	<link rel="icon" href="assets/images/favicon/icon.png">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&amp;display=swap"
		rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('assets/karyawan/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/karyawan/css/main-style.css') }}">
</head>

<body>
	<div class="site_content">
		<section id=homepage2-sec>
			@yield('content')
		</section>
	</div>
    @include('sweetalert::alert')
	<script src="{{ asset('assets/karyawan/js/jquery-min-3.6.0.js') }}"></script>
	<script src="{{ asset('assets/karyawan/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
