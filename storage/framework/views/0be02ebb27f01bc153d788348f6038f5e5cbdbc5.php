<?php $__env->startSection('content'); ?>


<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CompraEnCVA</title>

        <!-- Fonts -->
         <div class="container"> 
            <div class="row" >
                    <!--Empieza panel-->
                    <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <div class="col-md-4">

                    <div class="panel panel-default">
                        <div class="panel-heading"><?php echo e($p->clave); ?></div>
                        <div class="panel-body">
                            <div  style="margin: 3px">
                            <img src="<?php echo e($p->imagen); ?>" style="width:150px; height:150px; float:left; border-radius:5%; margin-right:25px;">
                            <span><?php echo e($p->descripcion); ?></span>
                           
                            
                            </div>
                        </div>

                        <div class="text-right">

                            <h4></h4>
                            <span style="font-size: 20px"><strong>$<?php echo e($p->precio); ?> <?php echo e($p->moneda); ?>  </strong></span>
                            <a href="#" class="btn btn-success "  style="margin-right:10px ; margin-bottom: 10px;"> 
                            Agregar
                             <span class= "glyphicon glyphicon-shopping-cart"></span> 
                            </a>
                        </div>
                    </div>  

                </div>
                    <!--Termina panel-->
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

    <?php echo $productos->render(); ?>


  
                
             </div> 
        </div>     
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>