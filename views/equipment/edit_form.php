<div class="flex justify-center items-center h-lvh overflow-hidden">
    <div class="w-full max-w-lg">
        <form 
            method="POST" 
            action="?controller=equipment&action=edit" 
            class="bg-white shadow-md rounded-xl px-8 pt-6 pb-8 mb-4" 
        >
            <div class="mb-6">
                <label class="block text-gray-700 text-xl font-bold">
                    Edit Equipment ID[<?php echo $equipment->id ?>]
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
                    placeholder="name" 
                    value="<?php echo $equipment->name ?>"
                >
            </div>
            <div class="md:mb-4 flex flex-wrap -mx-3">
                <div class="w-full md:w-1/2 px-3 mb-4 md:mb-0">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        Type
                    </label>
                    <div class="relative">
                        <select
                            name="type"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500"
                            >
                            <?php
                                foreach($type_list as $type)
                                {
                                    $selected = ($type == $equipment->type) ? 'selected' : '';
                                    echo '
                                        <option 
                                            value="'.$type.'"
                                            '.$selected.'
                                        >'
                                        .ucfirst($type).
                                        '</option>';
                                }
                            ?>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
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
                            foreach($status_list as $status)
                            {
                                $selected = ($status == $equipment->status) ? 'selected' : '';
                                echo '
                                    <option 
                                        value="'.$status.'"
                                        '. $selected .'
                                    >'
                                    .ucfirst($status).
                                    '</option>';
                            }
                        ?>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </div>
                    </div>
                </div>

            </div>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2">
                    Detail
                </label>
                <textarea 
                    name="detail" 
                    rows=4
                    class="block shadow p-2.5 w-full text-sm text-gray-900 rounded-lg border leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" 
                    placeholder="Write your equipment detail"
                ><?php echo $equipment->detail ?></textarea>
            </div>

            <div class="flex items-center justify-between">
                <input type="hidden" name="id" value="<?php echo $equipment->id ?>">
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
                    value="cancel"
                    class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800"
                    type="submit"
                >
                    Cancel
                </button>
            </div>
        </form>
    </div>
</div>