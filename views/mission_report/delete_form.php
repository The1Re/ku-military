<div class="flex justify-center items-center h-lvh overflow-hidden">
    <div class="w-full max-w-lg">
        <form method="GET" action="" class="bg-white shadow-md rounded-xl px-8 pt-6 pb-8 mb-4">
            <div class="mb-6">
                <label class="block text-gray-700 text-xl font-bold">
                    Confirm to delete?
                </label>
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 font-normal text-sm mb-2">
                    Are you sure to remove <span class="text-red-500 ">Mission Report ID[<?php echo $mission_report->id ?>]</span> ?
                </label>
            </div>

            <div class="flex items-center justify-between">
                <input type="hidden" name="id" value="<?php echo $mission_report->id ?>">
                <input type="hidden" name="missionId" value="<?php echo $mission_report->missionId ?>">
                <input type="hidden" name="controller" value="missionReport">
                <button
                    name="action"
                    value="delete"
                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit"
                >
                    Delete
                </button>
                <button 
                    name="action"
                    value="index"
                    class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800"
                    type="sumbit"
                >
                    Cancel
                </button>
            </div>
        </form>
    </div>
</div>