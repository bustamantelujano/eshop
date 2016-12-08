<?php $__env->startSection('content'); ?>


<head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

   
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="height: auto;">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
              </ol>

              <!-- Wrapper for slides -->
              <div class="carousel-inner">
                <div class="item active">
                  <img src="/img/carrusel1.jpg" alt="...">
                  <div class="carousel-caption">
                  </div>
                </div>
                <div class="item">
                  <img src="/img/carrusel1.jpg" alt="...">
                  <div class="carousel-caption">
                  </div>
                </div>
                <div class="item">
                  <img src="/img/carrusel1.jpg" alt="...">
                  <div class="carousel-caption">
                  </div>
                </div>
              </div>

              <!-- Controls -->
              <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
              </a>
              <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
              </a>
            </div>





<br><br>

        <!-- Fonts -->
         <div class="container"> 
         <div class="jumbotron">
            <div class="row" >
                    <!--Empieza panel-->
                    <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <div class="col-md-6 col-xs-12 col-lg-4 ">

                    <div class="panel panel-default" id="linkPanel" >
                         <!--
                         <div class="panel-heading" href>   
                            <a href="">
                            <?php if(strlen("<?php echo e($p->ficha_comercial); ?>") > 37 ): ?>
                                <?php echo e(substr($p->descripcion,0,37)); ?>...</span>
                            <?php else: ?>
                                <?php echo e($p->descripcion); ?>

                            <?php endif; ?>
                            </a>
                        </div>
                        -->

                        <div class="panel-body" style="max-height: 140px">
                            <div  style="margin: 3px">
                                <?php if(strlen("<?php echo e($p->imagen); ?>") < 20 ): ?>
                            <img href="<?php echo e(url('/producto')); ?>/<?php echo e($p->clave); ?>" src="http://www.adwore.com/images/propiedad/sinimagendisp.png" style="width:180px; height:180px; float:left; border-radius:5%; margin-right:25px;">
                                <?php else: ?>
                            <a href="<?php echo e(url('/producto')); ?>/<?php echo e($p->clave); ?>">
                            <img href="" src="<?php echo e($p->imagen); ?>" style="width:150px; height:150px; float:left; border-radius:5%; margin-right:25px;">
                            </a>
                            <?php endif; ?>
                            <span style="font-size: 10px ;"">
                                <?php if(strlen("<?php echo e($p->ficha_comercial); ?>") > 140 ): ?>
                                    <?php echo e(substr($p->ficha_comercial,0,140)); ?>...</span>
                                <?php else: ?>
                                    <?php echo e($p->ficha_comercial); ?>

                                <?php endif; ?>
                            
                            </div>
                        </div>
                        <div class="text-right" style="font-size: 17px ; margin: 5px"><strong>Disponible: <?php echo e($p -> disponible); ?> </strong></div>
                        <div class="text-right">


                            <span style="font-size: 20px; margin: 10px"><strong>$<?php echo e($p->precio); ?> Pesos </strong>  </span>
                           <!--
                            
                            -->
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