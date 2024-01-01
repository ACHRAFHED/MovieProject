
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo e(URL::asset('/img/favicon.ico')); ?>" />
    <title>MEGACINÉMAS</title>
  
    <link rel="stylesheet" href="/css/main.css">
    <?php echo \Livewire\Livewire::styles(); ?>

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>


<?php $__env->startSection('content'); ?> 
<body class="font-sans bg-gray-900 text-white">
    <nav class="border-b border-gray-800">
        <div class="container mx-auto px-4 flex flex-col md:flex-row items-center justify-between px-4 py-6"   style="margin-top: -35px;">
            <ul class="flex flex-col md:flex-row items-center">
                <li>
                    <a class="hover:text-gray-300">MEGACINÉMAS</a>
                    
                </li>
            </ul>
            
                <div class="flex flex-col md:flex-row items-center">
                Panier
               
            </div>
           
            
        </nav>

<table id="cart" class="table table-hover table-condensed">
    <thead>
        <tr>
            <th style="width:50%">Product</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">TotalPrice</th>
            <th style="width:10%"></th>
        </tr>
    </thead>
    <tbody>
        <?php $total = 0 ?>
        <?php if(session('cart')): ?>
            <?php $__currentLoopData = session('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $total += $details['price'] * $details['quantity'] ?>
                <tr data-id="<?php echo e($id); ?>">
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs"><img src="<?php echo e($details['image']); ?>" width="100" height="100" class="img-responsive"/></div>
                            <div class="col-sm-9">
                                <h4 class="nomargin"><?php echo e($details['name']); ?></h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price"> <?php echo e($details['price']); ?>DHS</td>
                    <td data-th="Quantity">
                        <input type="number" value="<?php echo e($details['quantity']); ?>" name="quantity" class="form-control quantity update-cart" />
                    </td>
                    <td data-th="Subtotal" class="text-center"><?php echo e($details['price'] * $details['quantity']); ?>DHS</td>
                    <td class="actions" data-th="">
                        <button class="btn btn-danger btn-sm remove-from-cart"><i class="fa fa-trash-o"></i></button>
                    </td>
                </tr>
     
                
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <tr> <td data-th="TotalPrice" class="text-left">TotalPrice:</td> 
            <td data-th="TotalPrice" class="text-right" size><?php echo e($total); ?>DHS</td> </tr>   
          
        <?php endif; ?>

    </tbody>
    <tfoot>
       
</td>
        <tr>
<td>
    
   
<button
 
 class="flex inline-flex items-center bg-orange-500 text-gray-900 rounded font-semibold px-3 py-2 hover:bg-orange-600 transition ease-in-out duration-150">
 <svg class="w-6 fill-current" viewBox="0 0 24 24"></svg>

 <a href="<?php echo e(route('movies.index')); ?>"><span class="ml-1">Continue </span></a>
</button>
<button  class="flex inline-flex items-center bg-orange-500 text-gray-900 rounded font-semibold px-3 py-2 hover:bg-orange-600 transition ease-in-out duration-150">
 <svg class="w-6 fill-current" viewBox="0 0 24 24"></svg>

 <a href="<?php echo e(route('paiement',$total)); ?>"><span class="ml-1">Pay</span></a>
</button>
  </td>
 </tr>
    </tfoot>
</table>
<?php $__env->stopSection(); ?>
  
<?php $__env->startSection('scripts'); ?>
<script type="text/javascript">
  
    $(".update-cart").change(function (e) {
        e.preventDefault();
  
        var ele = $(this);
  
        $.ajax({
            url: '<?php echo e(route('update.cart')); ?>',
            method: "patch",
            data: {
                _token: '<?php echo e(csrf_token()); ?>', 
                id: ele.parents("tr").attr("data-id"), 
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function (response) {
               window.location.reload();
            }
        });
    });
  
    $(".remove-from-cart").click(function (e) {
        e.preventDefault();
  
        var ele = $(this);
  
        if(confirm("Are you sure want to remove?")) {
            $.ajax({
                url: '<?php echo e(route('remove.from.cart')); ?>',
                method: "DELETE",
                data: {
                    _token: '<?php echo e(csrf_token()); ?>', 
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
   
</script>
</body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\movieproject\resources\views/cart.blade.php ENDPATH**/ ?>