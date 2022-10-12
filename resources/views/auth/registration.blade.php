@extends('layouts.app')
@section('title')
	Registration
@endsection
@section('content')
	<div
		class="mx-auto mt-16 p-4 w-full max-w-sm bg-white rounded-3xl border border-gray-200 shadow-md sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
		<form class="space-y-6" action="{{ route('create.user') }}" method="POST">
			@csrf
			<h5 class="text-xl font-medium text-gray-900 dark:text-white">Create a new account</h5>
			<div>
				<label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Username</label>
				<input type="text" name="name" id="name"
					class="bg-gray-50 border @error('name') border-red-500 @enderror border-gray-300 text-gray-900 text-sm rounded-lg outline-none focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
					placeholder="enter username">

				@error('name')
					<p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
				@enderror
			</div>
			<div>
				<label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Email</label>
				<input type="email" name="email" id="email"
					class="bg-gray-50 border @error('email') border-red-500 @enderror border-gray-300 text-gray-900 text-sm rounded-lg outline-none focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
					placeholder="name@email.com">
				@error('email')
					<p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
				@enderror
			</div>
			<div>
				<label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Password</label>
				<input type="password" name="password" id="password" placeholder="••••••••"
					class="bg-gray-50 border @error('password') border-red-500 @enderror border-gray-300 text-gray-900 text-sm rounded-lg outline-none focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
				@error('password')
					<p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
				@enderror
			</div>
			<button type="submit"
				class="w-full text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Create
				a new account
			</button>
			<div class="text-sm font-medium text-gray-500 dark:text-gray-300">
				Already registered? <a href="{{ url('/') }}" class="text-blue-700 hover:underline dark:text-blue-500">Log
					In</a>
			</div>
		</form>
	</div>
@endsection
