<div class=" flex flex-col w-64 bg-white h-screen border-r" id="sidebar">
    <div class="flex items-center h-14 border-b px-4 space-x-2 hover:cursor-pointer bg-blue-500 " id="toggleSidebar">
        <img src="public/images/logo.png" alt="logo.png" class="w-10 h-10">
        <label class="text-white text-xl font-bold hover:cursor-pointer">KU Military</label>
    </div>
    <div class="overflow-y-auto overflow-x-hidden flex-grow">
        <ul class="flex flex-col py-4 space-y-1">
            <li class="px-5">
                <div class="flex flex-row items-center h-8">
                    <div class="text-sm font-light tracking-wide text-gray-500">Menu</div>
                </div>
            </li>
            <li>
                <a href="?controller=page&action=home"
                    class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-blue-500 pr-6">
                    <span class="inline-flex justify-center items-center ml-4">
                        <i class="fa-solid fa-house"></i>
                    </span>
                    <span class="ml-2 text-sm tracking-wide truncate">Home</span>
                </a>
            </li>
            <li>
                <div class="prevent-select hover:cursor-pointer toggle-list relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-blue-500 pr-6">

                    <span class="inline-flex justify-center items-center ml-4">
                        <i class="fa-solid fa-bullseye"></i>
                    </span>
                    <span class="ml-2 text-sm tracking-wide truncate">Mission</span>   
                    
                    <span class="px-2 py-0.5 ml-auto text-xs font-medium tracking-wide ">
                        <i class="fa-solid fa-angle-down toggle-icon"></i>
                    </span>
                    
                </div>

                <ul id="dropdown" class="hidden">
                    <li>
                        <a 
                            href="?controller=mission&action=index"
                            class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-blue-500 pr-6"
                        >
                            <span class="ml-12 text-sm tracking-wide truncate">List</span>
                        </a>
                    </li>
                    <li>
                        <a 
                            href="?controller=missionReport&action=index"
                            class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-blue-500 pr-6"
                        >
                            <span class="ml-12 text-sm tracking-wide truncate">Report</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="?controller=equipment&action=index"
                    class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-blue-500 pr-6">
                    <span class="inline-flex justify-center items-center ml-4">
                        <i class="fa-solid fa-briefcase"></i>
                    </span>
                    <span class="ml-2 text-sm tracking-wide truncate">Equipment</span>
                </a>
            </li>
            <li>
                <a href="http://158.108.207.4/db24/db24_150/humanResoure/"
                    class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-blue-500 pr-6">
                    <span class="inline-flex justify-center items-center ml-4">
                        <i class="fa-solid fa-people-group"></i>
                    </span>
                    <span class="ml-2 text-sm tracking-wide truncate">Team</span>
                </a>
            </li>
            <li>
                <a href="http://158.108.207.4/db24/db24_041/"
                    class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-blue-500 pr-6">
                    <span class="inline-flex justify-center items-center ml-4">
                        <i class="fa-solid fa-file-circle-exclamation"></i>
                    </span>
                    <span class="ml-2 text-sm tracking-wide truncate">Report</span>
                </a>
            </li>
        </ul>
    </div>
</div>