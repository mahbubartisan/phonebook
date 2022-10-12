@extends('layouts.app')
@section('title')
	Forgot Password
@endsection
@section('content')
	<div
		class="mx-auto mt-36 p-4 w-full max-w-sm bg-white rounded-xl border border-gray-200 shadow-md sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
		<form class="space-y-6" action="{{ route('forget.password') }}" method="POST">
			@csrf
			<div class="space-y-1">
				<h5 class="text-xl font-medium text-gray-900 dark:text-white">Forgot Password?</h5>
				<p class="text-sm">No problem. Just let us know your email address and we will email you a password reset link.</p>
			</div>
			@if (Session::has('message'))
				<div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800">
					<span class="font-medium">{{ Session::get('message') }}</span>
				</div>
			@endif
			<div>
				<label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Email</label>
				<input type="email" name="email" id="email"
					class="bg-gray-50 border @error('email') border-red-500 @enderror border-gray-300 text-gray-900 text-sm rounded-lg outline-none focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
					placeholder="your@email.com">
				@error('email')
					<p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
				@enderror
			</div>
			<button type="submit"
				class="w-full text-white uppercase bg-gray-700 hover:bg-gray-500 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
				Email password reset link</button>
		</form>
	</div>
@endsection
