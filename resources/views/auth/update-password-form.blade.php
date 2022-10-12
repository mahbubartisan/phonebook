@extends('layouts.app')
@section('title')
	Reset Password
@endsection
@section('content')
	<div
		class="mx-auto mt-16 p-4 w-full max-w-sm bg-white rounded-xl border border-gray-200 shadow-md sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
		<form class="space-y-6" action="{{ route('update.password') }}" method="POST">
			@csrf
			<input type="hidden" name="token" value="{{ $token }}">
			<h5 class="text-xl font-medium text-gray-900 dark:text-white">Reset Password</h5>

			@if (Session::has('message'))
				<div class="mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800">
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
			<div>
				<label for="passowrd" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Passowrd</label>
				<input type="password" name="password" id="password"
					class="bg-gray-50 border @error('password') border-red-500 @enderror border-gray-300 text-gray-900 text-sm rounded-lg outline-none focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
					placeholder="••••••••">
				@error('password')
					<p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
				@enderror
			</div>
			<div>
				<label for="password-confirm" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Confirm
					Password</label>
				<input type="password" name="password_confirmation" id="password-confirm"
					class="bg-gray-50 border @error('password-confirm') border-red-500 @enderror border-gray-300 text-gray-900 text-sm rounded-lg outline-none focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
					placeholder="••••••••">
				@error('password-confirm')
					<p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
				@enderror
			</div>
			<button type="submit"
				class="w-full text-white uppercase bg-gray-700 hover:bg-gray-500 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
				Reset Password</button>
		</form>
	</div>
@endsection
