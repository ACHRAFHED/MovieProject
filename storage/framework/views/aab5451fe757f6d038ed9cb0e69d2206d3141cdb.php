<h1>Mes Achats</h1>
        <div class="row">
    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php dd($order)?>
        <div class="col-xs-18 col-sm-6 col-md-3">
            <div class="thumbnail">
                <div class="caption">
              
                    <h4><?php echo e($order); ?></h4>
                    <img src="<?php echo e(session('orders')[session('product')['id']]['image']); ?>" alt="">
                 </div>
            </div>
         
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<a href="<?php echo e(route('movies.index')); ?>">Homepage</a>
</div><?php /**PATH C:\laragon\www\movieproject\resources\views/MesAchats.blade.php ENDPATH**/ ?>