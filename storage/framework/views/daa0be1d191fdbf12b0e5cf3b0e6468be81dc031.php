<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="<?php echo e(asset("js/jquery.js")); ?>"></script>
    <link rel="stylesheet" href="<?php echo e(asset("css/bootstrap.css")); ?>">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">


    <title><?php echo e(config('app.name', 'CompraEnCVA')); ?></title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- css -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" media="all" />
<!--// css -->
<!-- font -->
<link href="//fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- //font -->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.js"></script>
</head>
<body>
    
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                       CVAshop
                    </a>
                </div>
       

                 <form class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Buscar">
                    </div>
                    <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
                  </form>




                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->

                    <ul class="nav navbar-nav navbar-right">
                    <li>
                        
                        <?php if(!Auth::guest() && Auth::user()->isAdmin() ): ?>
                        <a href="<?php echo e(url('/admin/dashboard')); ?>">Dashboard</a>
                        <?php endif; ?>
                    </li>
                    <li>


                        <?php if(!Auth::guest()): ?>

                            <a href="/carrito">Carrito
                                <i class="glyphicon glyphicon-shopping-cart"></i>
                                <?php if( Auth::user()->numitemssinpagar() != null): ?>
                                    <span class="badge">
                                        <strong><?php echo e(Auth::user()->numitemssinpagar()); ?></strong>
                                    </span>
                                <?php endif; ?>
                             </a>   
                    
                        <?php endif; ?>
                    </li>

                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        <?php if(Auth::guest()): ?>
                            <li><a href="<?php echo e(url('/login')); ?>">Iniciar Sesión</a></li>
                            <li><a href="<?php echo e(url('/register')); ?>">Regístrate</a></li>
                        <?php else: ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="position:relative; padding-left:50px;">
                                    <img src="/uploads/avatars/<?php echo e(Auth::user()->avatar); ?>" style="  width:32px; height:32px; position:absolute; top:15px; left:10px; border-radius:50%;">
                                    <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                            
                                    <li>
                                     <a href="<?php echo e(url('/user')); ?>"><i class="glyphicon glyphicon-user"></i> Mi perfil</a>
                                        <a href="<?php echo e(url('/logout')); ?>"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="glyphicon glyphicon-off"></i> Cerrar Sesión
                                        </a>
                                        <form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;">
                                            <?php echo e(csrf_field()); ?>

                                        </form>
                                    </li>
                                   
                                </ul>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <br><br>        <?php echo $__env->yieldContent('content'); ?>
        <br>
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <?php echo $__env->yieldContent('scripts'); ?>

</body>
<footer>
        <hr>
        <div class="text-center">Ingeniería Web &copy; 2016</div>
    </footer></html>
