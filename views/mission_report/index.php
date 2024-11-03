<div class="container mx-auto px-6 py-12">
    <div class="flex flex-col lg:flex-row bg-white shadow-lg rounded-lg overflow-hidden">
        <!-- Mission Section -->
        <div class="lg:w-1/3 p-6 bg-blue-300">
            <form method="GET" class="flex flex-row flex-wrap">
                <h2 class="text-2xl font-bold mb-2 mr-4">Mission ID</h2>
                <input 
                    name="missionId"
                    type="text" 
                    class="min:w-1/3 mr-4 mb-2 shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" 
                    value="<?php echo $missionId; ?>"
                />
                <input type="hidden" name="controller" value="missionReport">
                <button 
                    type="submit"
                    name="action"
                    value="index"
                    class="min:w-1/3 mb-2 bg-gray-700 hover:bg-gray-900 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                >
                    Get
                </button>
            </form>
            <?php if(isset($mission) && $mission) :?>
                <ul class="space-y-2">
                    <li><span class="font-semibold">Title : </span><?php echo $mission->name; ?></li>
                    <li><span class="font-semibold">Status : </span><?php echo $mission->status; ?></li>
                    <li><span class="font-semibold">Leader ID : </span><?php echo $mission->leaderId; ?></li>
                    <li><span class="font-semibold">Target Area : </span><?php echo $mission->targetArea; ?></li>
                    <li><span class="font-semibold">Date Start : </span><?php echo $mission->dateStart; ?></li>
                    <?php if ($mission->dateEnd) : ?> 
                        <li><span class="font-semibold">Date End : </span><?php echo $mission->dateEnd; ?></li>
                    <?php endif; ?>
                    <li>
                        <label class="font-semibold">Strategy : </label>
                        <div class="max-w-96 text-wrap break-words"><?php echo $mission->strategy; ?></div>
                    </li>
                </ul>
            <?php elseif(isset($error) && $error) : ?>
                <h1 class="text-lg"><?php echo $error; ?></h1>
            <?php else : ?>
                <h1 class="text-lg">Please select mission before</h1>
            <?php endif; ?>
        </div>
        
        <!-- Mission Report Section -->
        <div class="lg:w-2/3 p-6 <?php if(!$mission_report_list) echo "hidden"; ?>">
            <h2 class="text-2xl font-bold mb-2">Mission Report</h2>
            <div class="mb-4">
                <p>Report summary for Mission A:</p>
                <ul class="mt-2 space-y-2">
                    <li><span class="font-semibold">Injured:</span> 19 people</li>
                    <li><span class="font-semibold">Sick:</span> 15 people</li>
                </ul>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="bg-gray-50 p-4 rounded shadow">
                    <h3 class="font-semibold">Additional Details 1</h3>
                    <p>Details about this section of the report.</p>
                </div>
                <div class="bg-gray-50 p-4 rounded shadow">
                    <h3 class="font-semibold">Additional Details 2</h3>
                    <p>Details about another aspect of the mission report.</p>
                </div>
            </div>
        </div>
    </div>
</div>