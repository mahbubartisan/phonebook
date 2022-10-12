@extends('layouts.app')

@section('title')
	Profile
@endsection

@include('navbar.navbar')

@section('content')
	<div
		class="max-w-2xl mt-7 mx-auto  bg-white rounded-xl border border-gray-200 shadow-lg dark:bg-gray-800 dark:border-gray-700">

		<div class="flex flex-col items-center pb-10">
			<div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
				<h3 class="text-xl font-semibold text-gray-900 dark:text-white">
					User Profile
				</h3>

			</div>
			<img class="mb-3 mt-7 w-24 h-24 rounded-full shadow-lg"
				src="{{ !empty($user->image) ? url('upload/user/' . $user->image) : url('upload/user/no-image.png') }}"
				alt="Bonnie image" id="showImage">
			<h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{ $user->name }}</h5>
			<span class="text-sm text-gray-500 dark:text-gray-400">{{ $user->email }}</span>
			<div class="flex mt-4 space-x-3 md:mt-6">

				<form action="{{ route('user.profile') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="grid gap-6 mb-6 md:grid-cols-2">
						<div>
							<label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Username</label>
							<input type="text" name="name" id="name"
								class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
								placeholder="name" value="{{ $user->name }}">
						</div>
						<div>
							<label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="image">
								Image</label>
							<input
								class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
								id="image" type="file" name="image" onchange="preview()">
						</div>

						<div>
							<label for="birthday" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Birthday</label>
							<div class="relative">
								<div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
									<svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20"
										xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd"
											d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
											clip-rule="evenodd"></path>
									</svg>
								</div>
								<input datepicker type="text" name="birthday" id="birthday"
									class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
									placeholder="Select date" value="{{ $user->birthday }}">
							</div>
						</div>
						<div>
							<label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Phone number</label>
							<input type="number" id="phone" name="phone"
								class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
								placeholder="123-45-678" value="{{ $user->phone }}">
						</div>
						<div>
							<label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Email</label>
							<input type="email" id="email" name="email"
								class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
								placeholder="your@email.com" value="{{ $user->email }}">
						</div>
						<div>
							<label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Address
							</label>
							<input type="text" id="address" name="address"
								class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
								placeholder="address" value="{{ $user->address }}">
						</div>
					</div>

					<div class="relative">
						<button type="submit"
							class="text-white absolute -right-2 bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Update</button>
					</div>
				</form>

			</div>
		</div>
	</div>
@endsection
