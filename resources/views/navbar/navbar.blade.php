<nav class="bg-gradient-to-tr from-indigo-300 to-pink-300 border-gray-200 px-2 sm:px-4 py-2.5 dark:bg-gray-900">
	<div class="container flex flex-wrap justify-between items-center mx-auto">
		<a href="{{ url('dashboard') }}" class="flex items-center">
			<svg class="w-11 h-11 mr-1 -ml-1 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
				xmlns="http://www.w3.org/2000/svg">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
					d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
				</path>
			</svg>
			<span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">PhoneBook</span>
		</a>
		<div class="flex items-center md:order-2">
			<button type="button"
				class="flex mr-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
				id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
				<span class="sr-only">Open user menu</span>
				<img class="w-11 h-11 rounded-full"
					src="{{ !empty(auth()->user()->image) ? url('upload/user/' . auth()->user()->image) : url('upload/user/no-image.png') }}"
					alt="profile photo">
			</button>
			<!-- Dropdown menu -->
			<div
				class="hidden z-50 my-4 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600"
				id="user-dropdown" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="bottom"
				style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(0px, 1510px);">
				<div class="py-3 px-4">
					<span class="block text-sm text-gray-900 dark:text-white">{{ auth()->user()->name }}</span>
					<span
						class="block text-sm font-medium text-gray-500 truncate dark:text-gray-400">{{ auth()->user()->email }}</span>
				</div>
				<ul class="py-1" aria-labelledby="user-menu-button">

					<li>
						<a href="{{ url('dashboard') }}"
							class=" block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard
						</a>
					</li>
					<li>
						<a href="{{ route('contact.favourite') }}"
							class=" block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Favourite
						</a>
					</li>
					<li>
						<a href="{{ url('user/profile') }}"
							class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Profile</a>
					</li>
					<li>
						<a href="{{ url('user/change/password') }}"
							class="block py-2 px-4 text-sm items-center text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Change
							Password
						</a>
					</li>
					<li>
						<a href="{{ url('logout') }}"
							class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Log
							out
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</nav>
