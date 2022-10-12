@extends('layouts.app')

@section('title')
	Change Password
@endsection

@include('navbar.navbar')

@section('content')
	<div
		class="mx-auto mt-9 p-4 w-full max-w-sm bg-white rounded-xl border border-gray-200 shadow-lg sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
		<form class="space-y-6" action="{{ route('password.update') }}" method="POST">
			@csrf
			<h5 class="text-xl font-medium text-gray-900 dark:text-white">Change Password</h5>
			@if (Session::has('message'))
				<div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800">
					<span class="font-medium">{{ Session::get('message') }}</span>
				</div>
			@endif
			<div>
				<label for="current_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Current
					password</label>
				<input type="password" name="current_password" id="current_password" placeholder="••••••••"
					class="bg-gray-50 border border-gray-300 @error('current_password') border-red-500 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
				@error('current_password')
					<p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
				@enderror
			</div>
			<div>
				<label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Password</label>
				<input type="password" name="password" id="password" placeholder="••••••••"
					class="bg-gray-50 border border-gray-300 @error('password') border-red-500 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">

				@error('password')
					<p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
				@enderror
			</div>
			<div>
				<label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Confirm
					password</label>
				<input type="password" name="password_confirmation" id="password-confirm" placeholder="••••••••"
					class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
			</div>
			<button type="submit"
				class="w-full text-white shadow-lg bg-indigo-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update Password
			</button>
		</form>
	</div>
@endsection
