<div class="container mx-auto px-6 py-10 max-h-screen">
    <div class="flex flex-col lg:flex-row bg-white shadow-lg rounded-lg overflow-hidden">
        <!-- Mission Section -->
        <div class="lg:w-1/3 p-6 bg-blue-300">
            <div class="flex flex-row flex-wrap">
                <h2 class="flex-none text-2xl font-bold mb-2 mr-4">Mission ID</h2>
                <input 
                    name="missionId"
                    type="text" 
                    class="flex-auto mr-4 mb-2 shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" 
                    value="<?php echo $missionId; ?>"
                    readonly
                />
            </div>
            <?php if(isset($mission) && $mission) :?>
                <ul class="space-y-2 mb-8 mt-2">
                    <li>
                        <label class="font-semibold">Title : </label>
                        <span><?php echo $mission->name; ?></span>
                    </li>
                    <li>
                        <label class="font-semibold">Status : </label>
                        <span 
                            class="px-4 font-medium text-white text-base rounded-lg bg-<?php echo getStatusStyle($mission->status); ?>"
                        >
                            <?php echo $mission->status; ?>
                        </span>
                    </li>
                    <li>
                        <label class="font-semibold">Leader ID : </label>
                        <?php echo $mission->leaderId; ?>
                    </li>
                    <li>
                        <label class="font-semibold">Target Area : </label>
                        <span><?php echo $mission->targetArea; ?></span>
                    </li>
                    <li>
                        <label class="font-semibold">Date Start : </label>
                        <span><?php echo date("d M Y H:i:s", strtotime($mission->dateStart)); ?></span>
                    </li>
                    <?php if ($mission->dateEnd) : ?> 
                        <li>
                            <label class="font-semibold">Date End : </label>
                            <span><?php echo date("d M Y H:i:s", strtotime($mission->dateEnd)); ?></span>
                        </li>
                    <?php endif; ?>
                    <li>
                        <label class="font-semibold">Strategy : </label>
                        <span class="max-w-96 text-wrap break-words"><?php echo $mission->strategy; ?></span>
                    </li>
                </ul>
                <div class="flex flex-row">
                    <a
                        href="?controller=mission&action=index"
                        class="bg-gray-700 hover:bg-gray-900 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    >
                        Back
                    </a>
                </div>
            <?php elseif(isset($error) && $error) : ?>
                <h1 class="text-lg"><?php echo $error; ?></h1>
            <?php else : ?>
                <h1 class="text-lg">Please select mission before</h1>
            <?php endif; ?>
        </div>
        
        <!-- Return Equipment Section -->
        <?php if(isset($borrowEquipments)) : ?>
            <?php if($borrowEquipments) : ?>
                <div class="lg:w-2/3 p-6 lg:max-h-[52rem] overflow-y-scroll">
                    <h2 class="text-2xl font-bold">Return Equipment</h2>
                    <div class="flex flex-row justify-between-between">
                        <div class="inline-flex flex-auto items-center">
                            <input 
                                type="checkbox"  
                                class="cursor-pointer w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 "
                                value=""
                            >
                            <p class="w-full py-4 ms-2 text-sm font-normal text-gray-900">Select all</p>
                        </div>
                        <a
                            href="?controller=mission&action=index"
                            class="bg-gray-700 flex-none mb-4 hover:bg-gray-900 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        >
                            Submit
                        </a>
                    </div>
                    <div class="grid grid-cols-1 gap-6">
                        <?php foreach($borrowEquipments as $borrowEquipment) : ?>
                            <div class="bg-gray-50 p-4 rounded shadow">
                                <h3 class="flex-auto font-semibold mb-2">Borrow ID[<?php echo $borrowEquipment->id; ?>]</h3>
                                <label class="font-normal">Borrow Date : </label><span><?php echo $borrowEquipment->borrowDate ?></span>
                                <div class="relative mt-4 bg-transparent border border-gray-400 rounded-lg py-6 px-4">
                                    <label class="absolute bg-gray-50 -top-4 left-4 p-1">Detail</label>
                                    <div class="space-y-3">
                                        <div class="flex items-center ps-4 border border-gray-400 rounded bg-blue-400">
                                            <p class="w-full py-4 ms-2 text-base font-semibold text-white">ID</p>
                                            <p class="w-full py-4 ms-2 text-base font-semibold text-white">Name</p>
                                            <p class="w-full py-4 ms-2 text-base font-semibold text-white">Type</p>
                                            <p class="w-full py-4 ms-2 text-base font-semibold text-white">Status</p>
                                        </div>
                                        <?php foreach($borrowEquipment->detail as $detail) : ?>
                                            <ul class="flex items-center ps-4 border border-gray-400 rounded">
                                                <input 
                                                    type="checkbox"  
                                                    class="cursor-pointer w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 "
                                                    value=""
                                                >
                                                <li class="w-full py-4 ms-2 text-sm font-normal text-gray-900"><?php echo $detail->equipment->id; ?></li>
                                                <li class="w-full py-4 ms-2 text-sm font-normal text-gray-900"><?php echo $detail->equipment->name; ?></li>
                                                <li class="w-full py-4 ms-2 text-sm font-normal text-gray-900"><?php echo $detail->equipment->type; ?></li>
                                                <li class="w-full py-4 ms-2 text-sm font-normal text-gray-900">
                                                
                                                        <?php echo $detail->equipment->status; ?>
                                                
                                                </li>
                                            </ul>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php else : ?>
                <div class="lg:w-2/3 p-6 flex justify-center items-center">
                    <h2 class="text-2xl font-semibold">There is no return equipment</h2>
                </div>
            <?php endif; ?>
        <?php endif; ?>
        
    </div>
</div>