<form method="GET" action="">
	<label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
	<div class="relative">
		<div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
			<svg class="w-4 h-4 text-gray-500 aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
				fill="none" viewBox="0 0 20 20">
				<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
					d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
			</svg>
		</div>
		<input type="search" name="key"
			class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:border-gray-500 focus:outline-none"
			placeholder="Search" />
		<input type="hidden" name="controller" value="mission">
		<button 
			type="submit"
			name="action"
			value="search"
			class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 "
		>
			Search
		</button>
	</div>
</form>

<div class="flex flex-col">
	<div class="-m-1.5 overflow-x-auto">
		<div class="p-1.5 min-w-full inline-block align-middle">
			<div class="border rounded-lg shadow overflow-hidden">
				<table class="min-w-full divide-y divide-gray-200">
					<thead class="bg-gray-50">
						<tr>
							<th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
								Mission Id
							</th>
							<th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
								Leader Name
							</th>
							<th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
								Name
							</th>
							<th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
								Target Area
							</th>
							<th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
								Strategy
							</th>
							<th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
								Status
							</th>
							<th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
								Date Start
							</th>
							<th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
								Date End
							</th>
							<th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">
								Edit
							</th>
							<th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">
								Delete
							</th>
						</tr>
					</thead>
					<tbody class="divide-y divide-gray-200">
						<?php 
							foreach ($mission_list as $mission)
							{
								$style = $status_list[$mission->status];
								echo 
								'
									<tr>
										<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">' . $mission->id . '</td>
										<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">' . $mission->leaderId . '</td>
										<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">' . $mission->name . '</td>
										<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">' . $mission->targetArea . '</td>
										<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">' . $mission->strategy . '</td>
										<td class="px-6 py-4 whitespace-nowrap text-sm '. $style .'">' . $mission->status . '</td>
										<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">' . $mission->dateStart . '</td>
										<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">' . $mission->dateEnd . '</td>
										<td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
											<a 
												href="?controller=mission&action=editForm&id=' . $mission->id . '" 
												class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 focus:outline-none focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none"
											>
												<i class="fa-regular fa-pen-to-square"></i>
												Edit
											</a>
										</td>
										<td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
											<a 
												href="?controller=mission&action=deleteForm&id=' . $mission->id . '" 
												class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-red-600 hover:text-red-800 focus:outline-none focus:text-red-800 disabled:opacity-50 disabled:pointer-events-none"
											>
												<i class="fa-solid fa-trash"></i>
												Delete
											</a>
										</td>
									</tr>
								';
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<div class="mt-4">
	<a 
		href="?controller=mission&action=addForm"
		class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
	>
		Add
	</a>
</div>