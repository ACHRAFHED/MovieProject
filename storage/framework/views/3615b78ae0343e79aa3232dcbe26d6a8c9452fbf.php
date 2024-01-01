

<?php $__env->startSection('content'); ?>
    <div class="container mx-auto px-4 pt-16">
        <div class="popular-tv">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Popular Shows</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                <?php $__currentLoopData = $popularTv; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tvshow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if (isset($component)) { $__componentOriginal80f5b95c8947710578ff213f804f57287b4f20c3 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\TvCard::class, ['tvshow' => $tvshow]); ?>
<?php $component->withName('tv-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal80f5b95c8947710578ff213f804f57287b4f20c3)): ?>
<?php $component = $__componentOriginal80f5b95c8947710578ff213f804f57287b4f20c3; ?>
<?php unset($__componentOriginal80f5b95c8947710578ff213f804f57287b4f20c3); ?>
<?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div> <!-- end popular-tv -->

        <div class="top-rated-shows py-24">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Top Rated Shows</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                <?php $__currentLoopData = $topRatedTv; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tvshow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if (isset($component)) { $__componentOriginal80f5b95c8947710578ff213f804f57287b4f20c3 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\TvCard::class, ['tvshow' => $tvshow]); ?>
<?php $component->withName('tv-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal80f5b95c8947710578ff213f804f57287b4f20c3)): ?>
<?php $component = $__componentOriginal80f5b95c8947710578ff213f804f57287b4f20c3; ?>
<?php unset($__componentOriginal80f5b95c8947710578ff213f804f57287b4f20c3); ?>
<?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div> <!-- end top-rated-shows -->
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\movieproject\resources\views/tv/index.blade.php ENDPATH**/ ?>