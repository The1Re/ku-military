<div class="container mx-auto px-6 py-12">
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
         <div class="">

         </div>
        
    </div>
</div>