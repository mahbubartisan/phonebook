@extends('layouts.app')

@section('title')
	Favourite Contacts
@endsection

@include('navbar.navbar')
@php
$total_contacts = App\Models\Contact::select('id')
    ->where('favourite', 1)
    ->count();
@endphp

@section('content')
	<!-- Table -->

	<div class="container w-full md:w-4/5 xl:w-3/5 mx-auto px-2 relative">

		<!--Title-->
		<h1 class="flex items-center font-sans font-bold break-normal text-indigo-500 px-2 py-8 text-xl md:text-2xl">
			Your Favourite Contacts ({{ $total_contacts }})
		</h1>

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
										<input type="checkbox" id="rate" name="rate" value="0"
											onchange="status({{ $contact->id }}, this)" {{ $contact->favourite == 1 ? 'checked' : '' }} />
										<label for="rate" title="Favourite"></label>
									</div>
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
@endsection
