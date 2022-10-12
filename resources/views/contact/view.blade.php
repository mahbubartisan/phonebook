@extends('layouts.app')

@section('title')
	Contact Detail
@endsection

@include('navbar.navbar')

@section('content')
	<div
		class="max-w-2xl mt-7 mx-auto bg-white rounded-xl border border-gray-200 shadow-lg dark:bg-gray-800 dark:border-gray-700">

		<div class="flex flex-col items-center pb-10">
			<div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
				<h3 class="text-xl font-semibold text-gray-900 dark:text-white">
				 Contact Detail
				</h3>

			</div>
			<img class="mb-3 mt-7 w-24 h-24 rounded-full shadow-lg"
				src="{{ !empty($contact->image) ? url($contact->image) : url('upload/user/no-image.png') }}" alt="Bonnie image"
				id="showImage">
			<h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white"></h5>
			<span class="text-sm text-gray-500 dark:text-gray-400"></span>
			<div class="flex mt-4 space-x-3 md:mt-6">

				<form action="#">
					@csrf
					<div class="grid gap-6 mb-6 md:grid-cols-2">
						<div>
							<label for="firstname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First Name</label>
							<input type="text" name="first_name" id="first_name" value="{{ $contact->first_name }}"
								class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
								placeholder="first name">

							@error('first_name')
								<p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
							@enderror
						</div>
						<div>
							<label for="lastname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last Name</label>
							<input type="text" name="last_name" id="last_name" value="{{ $contact->last_name }}"
								class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
								placeholder="last name">
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
									value="{{ $contact->birthday }}"
									class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
									placeholder="Select date">
							</div>
						</div>
						<div>
							<label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="image">Image
							</label>
							<input
								class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
								id="image" name="image" type="file" onchange="preview()">

							@error('image')
								<p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
							@enderror
						</div>
						<div>
							<label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
							<input type="email" name="email" id="email" value="{{ $contact->email }}"
								class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
								placeholder="example@mail.com">
						</div>
						<div>
							<label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email 2</label>
							<input type="email" name="email_2" id="email_2" value="{{ $contact->email_2 }}"
								class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
								placeholder="example@mail.com">
						</div>
						<div>
							<label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
							<input type="text" name="address" id="address" value="{{ $contact->address }}"
								class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
								placeholder="Address">
						</div>
						<div>
							<label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone Number</label>
							<input type="number" name="phone" id="phone" value="{{ $contact->phone }}"
								class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
								placeholder="e.g. +(12)3456 789">
						</div>
						<div>
							<label for="phone_2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone Number
								2</label>
							<input type="number" name="phone_2" id="phone_2" value="{{ $contact->phone_2 }}"
								class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
								placeholder="e.g. +(12)3456 777">
						</div>
						<div>
							<label for="department" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Department</label>
							<input type="text" name="department" id="department" value="{{ $contact->department }}"
								class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
								placeholder="development">
						</div>
						<div>
							<label for="company" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Company</label>
							<input type="text" name="company" id="company" value="{{ $contact->company }}"
								class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
								placeholder="company">
						</div>
						<div>
							<label for="company_phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
								Company Number</label>
							<input type="number" name="company_phone" id="company_phone" value="{{ $contact->company_phone }}"
								class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
								placeholder="e.g. +(12)3456 546">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection
