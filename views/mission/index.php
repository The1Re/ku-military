<div class="flex flex-col h-screen py-12 px-10 bg-gray-50">
    <div class="w-full">

        <!-- Title -->
        <label class="prevent-select block text-gray-800 text-2xl font-bold mb-4 mx-auto">
            List of Missions
        </label>

        <!-- Cards Section -->
        <div class="flex items-center overflow-hidden mb-6 space-x-6 py-4">
            <?php foreach($cards as $card) : ?>
                <a 
                    href="?controller=mission&action=search&key=<?php echo $card['key']; ?>" 
                    class="<?php echo $card['color']; ?>-400 hover:<?php echo $card['color']; ?>-500 w-1/3 max-w-sm h-28 rounded-lg shadow-lg p-6"
                >
                    <div class="flex justify-between items-center h-full space-x-4">
                        <div class="text-white font-bold text-3xl text-right">
                            <p><?php echo $card['count']; ?></p>
                        </div>
                        <div class="text-white font-bold text-lg text-right">
                            <i class="<?php echo $card['icon']; ?> fa-xl text-white mb-6"></i>
                            <p><?php echo $card['text']; ?></p>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>

        <!-- Search & Add Section -->
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

        <!-- Table Section -->
        <div class="flex flex-col overflow-hidden max-h-[60vh]">
            <div class="max-w-full inline-block align-middle">
                <div class="border rounded-lg shadow-md overflow-y-auto max-h-[60vh]">
                    <table class="min-w-full divide-y divide-gray-200 table-fixed border">
                        <thead>
                            <?php 
                                function get_option_sortby($sortby) 
                                {
                                    return isset($_GET['sortby']) 
                                            && $_GET['sortby'] == $sortby 
                                            && $_GET['option'] == 'DESC' 
                                            ? 'ASC' : 'DESC';
                                }
                            ?>
                            <tr class="sticky top-0 bg-blue-400">
                                <th scope="col" class=" px-6 py-3 text-start text-xs font-bold text-white uppercase tracking-wider max-w-32">
                                    Mission Id
                                    <a href="?controller=mission&action=sort&sortby=missionId&option=<?php echo get_option_sortby('missionId'); ?>">
                                        <i class="fa-solid fa-sort"></i>
                                    </a>
                                </th>
                                <th scope="col" class=" px-6 py-3 text-start text-xs font-bold text-white uppercase tracking-wider">
                                    Leader Id
                                    <a href="?controller=mission&action=sort&sortby=leaderId&option=<?php echo get_option_sortby('leaderId'); ?>">
                                    <i class="fa-solid fa-sort"></i>
                                    </a>
                                </th>
                                <th scope="col" class=" px-6 py-3 text-start text-xs font-bold text-white uppercase tracking-wider">
                                    Name
                                    <a href="?controller=mission&action=sort&sortby=missionName&option=<?php echo get_option_sortby('missionName'); ?>">
                                        <i class="fa-solid fa-sort"></i>
                                    </a>
                                </th>
                                <th scope="col" class=" px-6 py-3 text-start text-xs font-bold text-white uppercase tracking-wider">
                                    Target Area
                                </th>
                                <th scope="col" class=" px-6 py-3 text-start text-xs font-bold text-white uppercase tracking-wider max-w-96">
                                    Strategy
                                </th>
                                <th scope="col" class=" px-6 py-3 text-start text-xs font-bold text-white uppercase tracking-wider">
                                    Status
                                </th>
                                <th scope="col" class=" px-6 py-3 text-start text-xs font-bold text-white uppercase tracking-wider">
                                    Date Start
                                    <a href="?controller=mission&action=sort&sortby=dateStart&option=<?php echo get_option_sortby('dateStart'); ?>">
                                        <i class="fa-solid fa-sort"></i>
                                    </a>
                                </th>
                                <th scope="col" class=" px-6 py-3 text-start text-xs font-bold text-white uppercase tracking-wider">
                                    Date End
                                    <a href="?controller=mission&action=sort&sortby=dateEnd&option=<?php echo get_option_sortby('dateEnd'); ?>">
                                        <i class="fa-solid fa-sort"></i>
                                    </a>
                                </th>
                                <th scope="col" class=" px-6 py-3 text-center text-xs font-bold text-white uppercase tracking-wider">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <?php foreach ($mission_list as $mission) : ?>
                                <?php $style = getStatusStyle($mission->status); ?>
                                <tr class="hover:bg-gray-100 transition duration-200">
                                    <td class="border-r px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 max-w-32">
                                        <?php echo $mission->id; ?>
                                    </td>
                                    <td class="border-r px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        <?php echo $mission->leaderId; ?>
                                    </td>
                                    <td class="border-r px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        <?php echo $mission->name; ?>
                                    </td>
                                    <td class="border-r px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        <?php echo $mission->targetArea ?>
                                    </td>
                                    <td class="border-r px-6 py-4 whitespace-nowrap text-sm text-gray-900 break-words max-w-96 text-wrap">
                                        <?php echo $mission->strategy; ?>
                                    </td>
                                    <td class="border-r px-6 py-4 whitespace-nowrap text-sm font-semibold <?php echo $style; ?>">
                                        <?php echo $mission->status; ?>
                                    </td>
                                    <td class="border-r px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        <?php echo $mission->dateStart; ?>
                                    </td>
                                    <td class="border-r px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        <?php echo $mission->dateEnd ?>
                                    </td>
                                    <td class="border-r py-4 px-2 whitespace-nowrap text-center space-x-6 text-sm font-medium">
                                        <a 
                                            href="?controller=mission&action=editForm&id=<?php echo $mission->id; ?>" 
                                            class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 focus:outline-none focus:text-blue-800 transition duration-200"
                                        >
                                            <i class="fa-regular fa-pen-to-square"></i>
                                            Edit
                                        </a>
                                        <a 
                                            href="?controller=missionReport&action=index&missionId=<?php echo $mission->id; ?>" 
                                            class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-yellow-600 hover:text-yellow-800 focus:outline-none focus:text-yellow-800 transition duration-200"
                                        >
                                            <i class="fa-solid fa-bullhorn"></i>
                                            Report
                                        </a>
                                        <a 
                                            href="?controller=mission&action=deleteForm&id=<?php echo $mission->id; ?>" 
                                            class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-red-600 hover:text-red-800 focus:outline-none focus:text-red-800 transition duration-200"
                                        >
                                            <i class="fa-solid fa-trash"></i>
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
