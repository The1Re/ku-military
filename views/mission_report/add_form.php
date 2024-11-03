<div class="flex justify-center items-center h-lvh overflow-hidden">
    <div class="w-full max-w-lg">
        <form 
            method="POST" 
            action="?controller=missionReport&action=add" 
            class="bg-white shadow-md rounded-xl px-8 pt-6 pb-8 mb-4"
        >
            <div class="mb-6">
                <label class="block text-gray-700 text-xl font-bold">
                    Create Mission Report
                </label>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">
                    Mission
                </label>
                <input
                    name="missionId"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500"
                    type="text" 
                    readonly
                    value="<?php echo $missionId; ?>" 
                >
            </div>
        
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2">
                    Detail
                </label>
                <textarea 
                    name="detail" 
                    rows=4
                    class="block shadow p-2.5 w-full text-sm text-gray-900 rounded-lg border leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" 
                    placeholder="Write your detail for this mission"
                ></textarea>
            </div>

            <div class="flex items-center justify-between">
                <button
                    name="action"
                    value="add"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit"
                >
                    Create
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