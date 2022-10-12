<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	@vite('resources/css/app.css')

	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
	<link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css" />
	<!--Regular Datatables CSS-->
	<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
	<!--Responsive Extension Datatables CSS-->
	<link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
	<!-- Google Inter Font -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
	<!-- Google Inter Font -->
	<!--  -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

	<title>@yield('title')</title>
</head>

<body class="bg-gray-300 font-inter">

	@yield('content')

	<script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>

	<!-- jQuery -->
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="https://unpkg.com/flowbite@1.5.3/dist/datepicker.js"></script>
	<!--Datatables -->
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
	<!--Sweet Alert 2 -->
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<!--Sweet Alert 2 -->

	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
	<script>
		$(document).ready(function() {

			var table = $('#example').DataTable({
					responsive: true
				})
				.columns.adjust()
				.responsive.recalc();
		});
	</script>

	<script>
		// Image Preview Start

		function preview() {

			showImage.src = URL.createObjectURL(event.target.files[0]);
		}

		// Image Preview End
	</script>

	<script>
		//SweetAlter Message Start
		const Toast = Swal.mixin({
			toast: true,
			position: 'top-end',
			showConfirmButton: false,
			timer: 3000
		})
		if ($.isEmptyObject(data.error)) {

			Toast.fire({
				type: 'success',
				icon: 'success',
				title: data.success
			})


		} else {

			Toast.fire({
				type: 'error',
				icon: 'error',
				title: data.error
			})
		}
		//SweetAlter Message End
	</script>

	<script>
		$(function() {
			$(document).on('click', '#delete', function(e) {

				e.preventDefault();

				let link = $(this).attr('href');

				Swal.fire({
					title: 'Are you sure?',
					text: "You want to delete this contact!",
					timer: 5000,
					icon: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Yes, delete it!'
				}).then((result) => {
					if (result.isConfirmed) {
						window.location.href = link
						Swal.fire(
							'Deleted!',
							'Your file has been deleted.',
							'success',

						)
					}
				})

			});
		});
	</script>

	<!-- Favourite Contact Function Start-->
	<script>
		function status(contact_id, that) {

			let rate = $(that).val();

			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

			$.ajax({
				type: "POST",
				url: "{{ url('/contact/favourite') }}/" + contact_id,
				data: {

					rate: rate

				},
				dataType: "json",
				success: function(data) {

					window.location.reload();
				}
			});

		}
	</script>
	<!-- Favourite Contact Function End-->

</body>

</html>
