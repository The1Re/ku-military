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
		<input type="hidden" name="controller" value="borrowborrow">
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
								ID
							</th>
							<th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
								Mission ID
							</th>
							<th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
								Borrow date
							</th>
							<th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
								Return date
							</th>
							<th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
								Detail
							</th>
						</tr>
					</thead>
					<tbody class="divide-y divide-gray-200">
						<?php foreach ($borrow_list as $borrow)
							echo 
							'
								<tr>
									<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">' . $borrow->id . '</td>
									<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">' . $borrow->missionId . '</td>
									<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">' . $borrow->borrowDate . '</td>
									<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">' . $borrow->returnDate . '</td>
									<td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
										<a 
											href="?controller=borrow&action=editForm&id=' . $borrow->id . '" 
											class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 focus:outline-none focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 dark:focus:text-blue-400"
										>
											Edit
										</a>
									</td>
									<td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
										<a 
											href="?controller=borrow&action=deleteForm&id=' . $borrow->id . '" 
											class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 focus:outline-none focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 dark:focus:text-blue-400"
										>
											Delete
										</a>
									</td>
								</tr>
							'
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<div class="w-80 bg-blue-300">
	<a href="?controller=borrowEquipment&action=borrowForm">
		Add
	</a>
</div>