
<?php
use App\Http\Controllers\MoviesController;
$total = 0;
if(Session::has('user'))
{
    $total =MoviesController::cartItem();
}

?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
   
    


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo e(URL::asset('/img/favicon.ico')); ?>" />
    <title>MEGACINÉMAS</title>
  
    <link rel="stylesheet" href="/css/main.css">
    <?php echo \Livewire\Livewire::styles(); ?>

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>

<body class="font-sans bg-gray-900 text-white">
    <nav class="border-b border-gray-800">
        <div class="container mx-auto px-4 flex flex-col md:flex-row items-center justify-between px-4 py-6">
            <ul class="flex flex-col md:flex-row items-center">
                <li class="md:ml-3 mt-3 md:mt-0"> 
                    <a class="hover:text-gray-300">MEGACINÉMAS</a>
                   
                    
                </li>
                <li class="md:ml-16 mt-3 md:mt-0">
                    <a href="<?php echo e(route('movies.index')); ?>" class="hover:text-gray-300">Movies</a>
                </li>
                <li class="md:ml-6 mt-3 md:mt-0">
                    <a href="<?php echo e(route('tv.index')); ?>" class="hover:text-gray-300">TV Shows</a>
                </li>
                <li class="md:ml-6 mt-3 md:mt-0">
                    <a href="<?php echo e(route('actors.index')); ?>" class="hover:text-gray-300">Actors</a>
                </li>
            </ul>
            <ul class="navbar-nav">
            <div class="flex flex-col md:flex-row items-center">
            <?php
if (! isset($_instance)) {
    $dom = \Livewire\Livewire::mount('search-dropdown', [])->dom;
} elseif ($_instance->childHasBeenRendered('f6dUHP9')) {
    $componentId = $_instance->getRenderedChildComponentId('f6dUHP9');
    $componentTag = $_instance->getRenderedChildComponentTagName('f6dUHP9');
    $dom = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('f6dUHP9');
} else {
    $response = \Livewire\Livewire::mount('search-dropdown', []);
    $dom = $response->dom;
    $_instance->logRenderedChild('f6dUHP9', $response->id, \Livewire\Livewire::getRootElementTagName($dom));
}
echo $dom;
?> </div>  
            </ul>
            <ul class="navbar-nav">
             <?php if(Session::has('user')): ?>
             <li class="md:ml-8 mt-8 md:mt-0">
                <a class="nav-link" href="/cart">Panier</a>
            </li>
            <li class="md:ml-8 mt-8 md:mt-0">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo e(Session::get('user')['name']); ?>

                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/logout">Logout</a>
                </div>
            </li>
            <?php else: ?>
            <li class="md:ml-8 mt-8 md:mt-0">
                <a class="nav-link" href="/login">Login</a>
            </li>
            <li class="md:ml mt-6 md:mt-0">
                <a class="nav-link" href="/register">Signup</a>
            </li>
            <?php endif; ?>
        </ul>
                
               
            </div>
        </div>
    </nav>
    <?php echo $__env->yieldContent('content'); ?>
   
    <?php echo \Livewire\Livewire::scripts(); ?>

    <?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\laragon\www\movieproject\resources\views/layouts/main.blade.php ENDPATH**/ ?>