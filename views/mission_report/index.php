<div class="container mx-auto px-6 py-12">
    <div class="flex flex-col lg:flex-row bg-white shadow-lg rounded-lg overflow-hidden">
        <!-- Mission Section -->
        <div class="lg:w-1/3 p-6 bg-blue-300">
            <form method="GET" class="flex flex-row flex-wrap">
                <h2 class="flex-none text-2xl font-bold mb-2 mr-4">Mission ID</h2>
                <input 
                    name="missionId"
                    type="text" 
                    class="flex-auto mr-4 mb-2 shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" 
                    value="<?php echo $missionId; ?>"
                />
                <input type="hidden" name="controller" value="missionReport">
                <button 
                    type="submit"
                    name="action"
                    value="index"
                    class="flex-none mb-2 bg-gray-700 hover:bg-gray-900 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                >
                    Get
                </button>
            </form>
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
                <div class="flex flex-row-reverse">
                    <a
                        href="?controller=missionReport&action=addForm&missionId=<?php echo "$mission->id"; ?>"
                        class="bg-gray-700 hover:bg-gray-900 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    >
                        Create Report
                    </a>
                </div>
            <?php elseif(isset($error) && $error) : ?>
                <h1 class="text-lg"><?php echo $error; ?></h1>
            <?php else : ?>
                <h1 class="text-lg">Please select mission before</h1>
            <?php endif; ?>
        </div>
        
        <!-- Mission Report Section -->
         <?php if(isset($mission_report_list)) : ?>
            <?php if($mission_report_list) : ?>
                <div class="lg:w-2/3 p-6">
                    <h2 class="text-2xl font-bold mb-2">Mission Report</h2>
                    <div class="mb-4">
                        <p>Report summary for <?php echo $mission->name;?></p>
                        <ul class="mt-2 space-y-2">
                            <li><span class="font-semibold">Injured:</span> 19 people</li>
                            <li><span class="font-semibold">Died:</span> 15 people</li>
                        </ul>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <?php foreach($mission_report_list as $mission_report) : ?>
                            <div class="bg-gray-50 p-4 rounded shadow">
                                <div class="flex flex-row space-x-2">
                                    <h3 class="flex-auto font-semibold mb-2">Report ID[<?php echo $mission_report->id; ?>]</h3>
                                    <a 
                                        href="?controller=missionReport&action=editForm&id=<?php echo $mission_report->id; ?>" 
                                        class="inline-flex items-center text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 focus:outline-none focus:text-blue-800 transition duration-200"
                                    >
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                    <a 
                                        href="?controller=missionReport&action=deleteForm&id=<?php echo $mission_report->id; ?>" 
                                        class="inline-flex items-center text-sm font-semibold rounded-lg border border-transparent text-red-600 hover:text-red-800 focus:outline-none focus:text-red-800 transition duration-200"
                                    >
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </div>
                                <p>Created date : <?php echo date('d M Y H:i:s', strtotime($mission_report->date)); ?></p>
                                <p class="text-wrap break-words">Detail : <?php echo $mission_report->detail; ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php else : ?>
                <div class="lg:w-2/3 p-6 flex justify-center items-center">
                    <h2 class="text-2xl font-semibold">There is no mission report</h2>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</div>