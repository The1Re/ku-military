<div class="flex justify-center items-center h-lvh overflow-hidden">
    <div class="w-full max-w-lg">
        <form 
            method="POST" 
            action="?controller=mission&action=edit" 
            class="bg-white shadow-md rounded-xl px-8 pt-6 pb-8 mb-4"
        >
            <div class="mb-6">
                <label class="block text-gray-700 text-xl font-bold">
                    Edit Mission ID[<?php echo $mission->id; ?>]
                </label>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">
                    Name
                </label>
                <input
                    name="name"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500"
                    type="text" 
                    placeholder="mission name" 
                    value="<?php echo $mission->name; ?>"
                >
            </div>
            <div class="md:mb-4 flex flex-wrap -mx-3">
                <div class="w-full md:w-1/2 px-3 mb-4 md:mb-0">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        Leader
                    </label>
                    <div class="relative">
                        <select
                            name="leaderId"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500"
                        >
                        <?php
                            foreach($soldier_list as $soldier)
                            {
                                $selected = ($soldier->soldierId == $mission->leaderId) ? 'selected' : '';
                                echo '
                                    <option 
                                        value="'.$soldier->soldierId.'"
                                        '.$selected.'
                                    >'
                                    .$soldier->firstName.' '.$soldier->lastName.
                                    '</option>';
                            }
                        ?>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-1 flex items-center px-2 text-gray-700">
                            <i class="fa-solid fa-angle-down fa-xs"></i>
                        </div>
                    </div>
                </div>

                <div class="w-full md:w-1/2 px-3 mb-4 md:mb-0">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        Status
                    </label>
                    <div class="relative">
                        <select
                            name="status"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500"
                        >
                        <?php 
                            foreach($status_style as $status => $style)
                            {
                                $selected = ($status == $mission->status) ? 'selected' : '';
                                echo '
                                    <option 
                                        class="'. $style .'"
                                        value="'.$status.'"
                                        '. $selected .'
                                    >'
                                    .$status.
                                    '</option>';
                            }
                        ?>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-1 flex items-center px-2 text-gray-700">
                            <i class="fa-solid fa-angle-down fa-xs"></i>
                        </div>
                    </div>
                </div>

            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">
                    Target Area
                </label>
                <input
                    name="targetArea"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500"
                    type="text" 
                    placeholder="target area location" 
                    value="<?php echo $mission->targetArea; ?>"
                >
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2">
                    Strategy
                </label>
                <textarea 
                    name="strategy" 
                    rows=4
                    class="block shadow p-2.5 w-full text-sm text-gray-900 rounded-lg border leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" 
                    placeholder="Write your mission strategy"
                ><?php echo $mission->strategy; ?></textarea>
            </div>

            <div class="flex items-center justify-between">
                <input type="hidden" name="id" value="<?php echo $mission->id; ?>">
                <button
                    name="action"
                    value="edit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit"
                >
                    Edit
                </button>
                <button 
                    name="action"
                    value="index"
                    class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800"
                    type="submit"
                >
                    Cancel
                </button>
            </div>
        </form>
    </div>
</div>