<div class="min-h-screen flex flex-row flex-auto flex-shrink-0 antialiased bg-gray-50 text-gray-800">
    <!-- Sidebar -->
    <?php include('views/components/sidebar.php'); ?>

    <!-- Content -->
     <div class="w-screen h-screen bg-gray-50">
         <?php require('route.php'); ?>
     </div>
</div>
<?php 

