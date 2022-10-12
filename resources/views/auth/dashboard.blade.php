@extends('layouts.app')

@section('title')
	Dashboard
@endsection

@include('navbar.navbar')

@php
	$total_contacts = App\Models\Contact::select('id')->where('favourite', 0)->count();
@endphp

@section('content')
	<!-- Table -->

	<div class="container w-full md:w-4/5 xl:w-3/5 mx-auto px-2 relative md:relative">

		<!--Title-->
		<h1 class="flex items-center font-sans font-bold break-normal  text-indigo-500 px-2 py-8 text-xl md:text-2xl">
			Your Contacts ({{$total_contacts}})

			{{-- @if (session('success'))
				<div id="toast-success"
					class="flex items-center top-5 right-5 p-4 mb-4 w-full max-w-xs text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
					role="alert">
					<div
						class="inline-flex flex-shrink-0 justify-center items-center w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
						<svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd"
								d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
								clip-rule="evenodd"></path>
						</svg>
						<span class="sr-only">Check icon</span>
					</div>
					<div class="ml-3 text-sm font-normal">{{ session('success') }}</div>
					<button type="button"
						class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
						data-dismiss-target="#toast-success" aria-label="Close">
						<span class="sr-only">Close</span>
						<svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd"
								d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
								clip-rule="evenodd"></path>
						</svg>
					</button>
				</div>
			@endif --}}
		</h1>

		<a
			class=" absolute right-0 top-9 inline-flex items-center text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"
			href="{{ url('contact/add') }}" type="button" data-modal-toggle="editUserModal">
			<svg class="w-6 h-6 mr-2 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
				xmlns="http://www.w3.org/2000/svg">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
					d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
			</svg>Add Contact
		</a>
		<!--Card-->
		<div id='recipients' class="p-8 mt-6 lg:mt-0 rounded-xl shadow-xl bg-white">

			<table id="example" class="stripe hover w-full text-sm text-left text-gray-500 dark:text-gray-400"
				style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
				<thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
					<tr>

						<th scope="col" class="py-3 px-6">
							Image
						</th>
						<th scope="col" class="py-3 px-6">
							Name
						</th>
						<th scope="col" class="py-3 px-6">
							Phone
						</th>
						<th scope="col" class="py-3 px-6">
							Address
						</th>
						<th scope="col" class="py-3 px-6">
							Birthday
						</th>
						<th scope="col" class="py-3 px-6">
							Company
						</th>
						<th scope="col" class="py-3 px-6">
							Favourite
						</th>
						<th scope="col" class="py-3 px-6">
							Action
						</th>
					</tr>
				</thead>
				<tbody>

					@forelse ($contacts as $contact)
						<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
							<td class="p-4 w-4">
								<img class="w-20 h-15 rounded-full"
									src="{{ !empty($contact->image) ? url($contact->image) : url('upload/user/no-image.png') }}"
									alt="{{ $contact->image }}">
							</td>
							<th scope="row" class="flex items-center py-4 px-6 text-gray-900 whitespace-nowrap dark:text-white">
								<div class="pl-3">
									<div class="text-base font-semibold">{{ $contact->first_name }} {{ $contact->last_name }}</div>
									<div class="font-normal text-gray-500">{{ $contact->email }}</div>
								</div>
							</th>
							<td class="py-4 px-6">
								<div class="pl-3">
									<div class="text-base font-semibold">{{ $contact->phone }}</div>
									<div class="font-normal text-gray-500">{{ $contact->phone_2 }}</div>
								</div>
							</td>
							<td class="py-4 px-6">
								{{ $contact->address }}
							</td>
							<td class="py-4 px-6">
								<div class="flex items-center">
									{{ Carbon\Carbon::parse($contact->birthday)->format('d F, Y') }}
								</div>
							</td>
							<td class="py-4 px-6">
								<div class="flex items-center">
									{{ $contact->company }}
								</div>
							</td>
							<td class="py-4 px-6">
								<div class="flex ">
									<div class="rate">
										<input type="checkbox" id="rate" name="rate" value="1" onchange="status({{ $contact->id }}, this)"/>
										<label for="rate" title="Favourite"></label>
									</div>
							</td>
							<td class="py-4 px-6 flex">
								<a href="{{ url('contact/' . $contact->id . '/view/') }}" class="btn btn-primary mb-2 ml-3" title="View">
									<svg class="w-6 h-6 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
										xmlns="http://www.w3.org/2000/svg">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z">
										</path>
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
											d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
										</path>
									</svg> </a>
								<a href="{{ url('contact/' . $contact->id . '/edit/') }}" class="btn btn-primary mb-2 ml-3" title="Edit">
									<svg class="w-6 h-6 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
										xmlns="http://www.w3.org/2000/svg">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
											d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
										</path>
									</svg> </a>
								<a href="{{ url('contact/' . $contact->id . '/delete/') }}" class="btn btn-danger mb-2 ml-3" title="Delete"
									id="delete">
									<svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
										xmlns="http://www.w3.org/2000/svg">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
											d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
										</path>
									</svg></a>
							</td>
						</tr>

					@empty
					@endforelse

				</tbody>
			</table>

		</div>
		<!--/Card-->

	</div>
	<!--/container-->

	<!-- Table End -->

	{{-- @if (session('success'))
		<script>
			toastr.success("{!! session('success') !!}");
		</script>
	@endif --}}
@endsection
