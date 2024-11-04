<?php
    $list_user = [
        [
            'link' => 'http://158.108.207.4/db24/db24_141/ku-military?controller=mission&action=index',
            'id' => 6520503258,
            'name' => 'นายคเณศ อรชุนเลิศไมตรี',
            'detail' => 'ภารกิจ, รายงานประจำวัน, รายงานสิ้นสุดภารกิจ และ การคืนยุทโธปกรณ์'
        ],
        [
            'link' => 'http://158.108.207.4/db24/db24_139/',
            'id' => 6520501042,
            'name' => 'นายณัฐกิตต์ จันทพรม',
            'detail' => 'ทีมที่ปฏิบัติภารกิจ, สมาชิกทีม, รายชื่อทหาร'
        ],
        [
            'link' => 'http://158.108.207.4/db24/db24_140/',
            'id' => 6520501093,
            'name' => 'นายปกรณ์สัณห์ สุเชาว์อินทร์',
            'detail' => 'ยุทโธปกรณ์, ใบเบิกยุทโธปกรณ์, รายการยุทโธปกรณ์ที่เบิก'
        ],
        [
            'link' => 'http://158.108.207.4/db24/db24_142/',
            'id' => 6520503236,
            'name' => 'นายยุทธการ ศรีศักดา',
            'detail' => 'ทหารบาดเจ็บในแต่ละวัน, รายชื่อแพทย์, รายชื่อค่ายชั่วคราว'
        ]
    ];
?>


<div class="flex justify-center items-center h-screen overflow-x-hidden">
    <div class="mx-auto max-w-2xl py-32 sm:py-48 lg:py-56">
        <h1 class="text-center text-balance text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">
            Welcome to <span class="text-blue-500">KU Military</span>
        </h1>

        <?php foreach($list_user as $user) : ?>
            <div class="mt-8">
                <a 
                    href="<?php echo $user['link']; ?>" 
                    class="block bg-blue-300 shadow-lg rounded-lg p-6 max-w-sm mx-auto border border-gray-200 hover:-translate-y-2 transition-transform"
                >
                    <h2 class="text-lg font-bold text-gray-800"><?php echo $user['id']; ?></h2>
                    <p class="text-lg font-bold text-gray-800 mb-2"><?php echo $user['name']; ?></p>
                    <div>
                        <label class="font-semibold">หน้าที่ : </label>
                        <p class="text-gray-600"><?php echo $user['detail']; ?></p>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>