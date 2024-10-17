<div class="flex justify-center items-center h-lvh overflow-hidden bg-gray-200">
    <div class="w-full max-w-lg">
        <form method="GET" action="" class="bg-white shadow-md rounded-xl px-8 pt-6 pb-8 mb-4">
            <div class="mb-6">
                <label class="block text-gray-700 text-xl font-bold">
                    Borrow Equipment
                </label>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">
                    Mission ID
                </label>
                <input
                    name="missionId"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500"
                    type="text" 
                    placeholder="mission id" 
                >
            </div>
            

            

            <div class="flex items-center justify-between">
                <input type="hidden" name="controller" value="borrowEquipment">
                <button
                    name="action"
                    value="borrow"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit"
                >
                    Add
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