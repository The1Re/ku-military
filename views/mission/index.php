<div class="flex flex-col h-screen py-12 px-10 bg-gray-50">
    <div class="w-full">
        
        <label class="prevent-select block text-gray-800 text-2xl font-bold mb-4 mx-auto">
            List of Missions
        </label>

		<div class="flex justify-between items-center mb-6">
			<form method="GET" action="" class="mr-4">
				<label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
				<div class="relative w-96">
					<div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
						<i class="fa-solid fa-magnifying-glass w-4 h-4 text-gray-500"></i>
					</div>
					<input type="search" name="key"
						class="block w-full p-3 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-white focus:border-blue-500 focus:outline-none shadow-sm"
						placeholder="Search" />
					<input type="hidden" name="controller" value="mission">
					<button 
						type="submit"
						name="action"
						value="search"
						class="text-white absolute end-2.5 bottom-1.5 bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 transition duration-200 shadow-md"
					>
						Search
					</button>
				</div>
			</form>
			
			<a 
				href="?controller=mission&action=addForm"
				class="text-center bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline shadow-md transition duration-200 w-24"
			>
				Add
			</a>
		</div>

        
        <div class="flex flex-col overflow-x-auto">
            <div class="min-w-full inline-block align-middle">
                <div class="border rounded-lg shadow-md overflow-hidden">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-700 uppercase tracking-wider">
                                    Mission Id
                                </th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-700 uppercase tracking-wider">
                                    Leader Id
                                </th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-700 uppercase tracking-wider">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-700 uppercase tracking-wider">
                                    Target Area
                                </th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-700 uppercase tracking-wider">
                                    Strategy
                                </th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-700 uppercase tracking-wider">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-700 uppercase tracking-wider">
                                    Date Start
                                </th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-700 uppercase tracking-wider">
                                    Date End
                                </th>
                                <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-700 uppercase tracking-wider">
                                    Edit
                                </th>
                                <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-700 uppercase tracking-wider">
                                    Delete
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <?php 
                                foreach ($mission_list as $mission)
                                {
                                    $style = $status_list[$mission->status];
                                    echo 
                                    '
                                        <tr class="hover:bg-gray-100 transition duration-200">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">' . $mission->id . '</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">' . $mission->leaderId . '</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">' . $mission->name . '</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">' . $mission->targetArea . '</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">' . $mission->strategy . '</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm ' . $style . '">' . $mission->status . '</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">' . $mission->dateStart . '</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">' . $mission->dateEnd . '</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                                <a 
                                                    href="?controller=mission&action=editForm&id=' . $mission->id . '" 
                                                    class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 focus:outline-none focus:text-blue-800 transition duration-200"
                                                >
                                                    <i class="fa-regular fa-pen-to-square"></i>
                                                    Edit
                                                </a>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                                <a 
                                                    href="?controller=mission&action=deleteForm&id=' . $mission->id . '" 
                                                    class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-red-600 hover:text-red-800 focus:outline-none focus:text-red-800 transition duration-200"
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
</div>