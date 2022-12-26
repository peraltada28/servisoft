<?php  
    if($_SESSION['fun_niv'] == 'ADMINISTRADOR'){?>

        <section class="content-header">
            <h1>
                <i class="fa fa-home icon-title"></i>
                Inicio
            </h1>

            <ol class="breadcrumb">
                <li>
                    <a href="?module=start">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
            </ol>
        </section>
        <!---------------------------------------------------------------->
        <section class="content">
            <!-------------------------------------->
            <div class="row">
                <div class="col-lg-12 col-xs-12">
                    <div class="alert alert-info alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <p style="font-size:15px">
                            <i class="icon fa fa-user"></i>
                            Bienvenido/a <strong><?php echo $_SESSION['fun_nom'];?> </strong>
                            al area virtual del taller
                        </p>
                    </div>
                </div>
            </div>     
            <!-------------------------------------->
            <div class="row">
                <!--Bloque 1------------------------------------------------------------->
                <div class="col-lg-12 col-xs-12" style="background-color:#C1C1C1; color:#fff" class="">
                    <div class="col-lg-3 col-xs-6">
                        <div style="background-color:#00CAB7; color:#fff" class="small-box">
                            <div class="inner">
                                <p><strong>COMPRAS</strong>
                                    <ul>
                                        <li>REGISTRAR PEDIDOS</li>
                                        <li>DE COMPRAS</li>
                                    </ul>
                                </p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-file-o"></i>
                            </div>
                            <a href="?module=pedidos_compras" class="small-box-footer" title="Pedidos de Compras" data-toggle="tooltip">
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>            
                    </div>
                    <!--Fin Bloque 1---------------------------------------------------------->

                    <!--Bloque 2------------------------------------------------------------->
                    <div class="col-lg-3 col-xs-6">
                        <div style="background-color:#00CAB7; color:#fff" class="small-box">
                            <div class="inner">
                                <p><strong>COMPRAS</strong>
                                    <ul>
                                        <li>REGISTRAR PRESUPUESTOS</li>
                                        <li>DE COMPRAS</li>
                                    </ul>
                                </p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-file-o"></i>
                            </div>
                            <a href="?module=pedidos_compras" class="small-box-footer" title="Administrar Compras" data-toggle="tooltip">
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>            
                    </div>
                    <!--Fin Bloque 2---------------------------------------------------------->

                    <!--Bloque 3------------------------------------------------------------->
                    <div class="col-lg-3 col-xs-6">
                        <div style="background-color:#00CAB7; color:#fff" class="small-box">
                            <div class="inner">
                                <p><strong>COMPRAS</strong>
                                    <ul>
                                        <li>GENERAR ORDENES</li>
                                        <li>DE COMPRAS</li>
                                    </ul>
                                </p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-file-o"></i>
                            </div>
                            <a href="?module=pedidos_compras" class="small-box-footer" title="Administrar Compras" data-toggle="tooltip">
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>            
                    </div>
                    <!--Fin Bloque 3---------------------------------------------------------->

                    <!--Bloque 4------------------------------------------------------------->
                    <div class="col-lg-3 col-xs-6">
                        <div style="background-color:#00CAB7; color:#fff" class="small-box">
                            <div class="inner">
                                <p><strong>COMPRAS</strong>
                                    <ul>
                                        <li>REGISTRAR FACTURAS</li>
                                        <li>DE COMPRAS</li>
                                    </ul>
                                </p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-file-o"></i>
                            </div>
                            <a href="?module=pedidos_compras" class="small-box-footer" title="Administrar Compras" data-toggle="tooltip">
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>            
                    </div>
                    <!--Fin Bloque 4---------------------------------------------------------->
                    
                    <!--Bloque 5------------------------------------------------------------->
                    <div class="col-lg-3 col-xs-6">
                        <div style="background-color:#00CAB7; color:#fff" class="small-box">
                            <div class="inner">
                                <p><strong>COMPRAS</strong>
                                    <ul>
                                        <li>REGISTRAR NOTAS</li>
                                        <li>DE REMISION</li>
                                    </ul>
                                </p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-file-o"></i>
                            </div>
                            <a href="?module=pedidos_compras" class="small-box-footer" title="Administrar Compras" data-toggle="tooltip">
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>            
                    </div>
                    <!--Fin Bloque 5---------------------------------------------------------->

                    
                    <!--Bloque 6------------------------------------------------------------->
                    <div class="col-lg-3 col-xs-6">
                        <div style="background-color:#00CAB7; color:#fff" class="small-box">
                            <div class="inner">
                                <p><strong>COMPRAS</strong>
                                    <ul>
                                        <li>REGISTRAR NOTAS</li>
                                        <li>DE CREDITO / DEBITO</li>
                                    </ul>
                                </p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-file-o"></i>
                            </div>
                            <a href="?module=pedidos_compras" class="small-box-footer" title="Administrar Compras" data-toggle="tooltip">
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>            
                    </div>
                    <!--Fin Bloque 6---------------------------------------------------------->
                    
                    <!--Bloque 7------------------------------------------------------------->
                    <div class="col-lg-3 col-xs-6">
                        <div style="background-color:#00CAB7; color:#fff" class="small-box">
                            <div class="inner">
                                <p><strong>COMPRAS</strong>
                                    <ul>
                                        <li>REGISTRAR AJUSTES</li>
                                        <li>DE STOCK</li>
                                    </ul>
                                </p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-file-o"></i>
                            </div>
                            <a href="?module=pedidos_compras" class="small-box-footer" title="Administrar Compras" data-toggle="tooltip">
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>            
                    </div>
                    <!--Fin Bloque 7---------------------------------------------------------->
                </div>
            </div>
            <!-------------------------------------->

            <!-------------------------------------->
            <div class="row">
                <!--Bloque 1------------------------------------------------------------->
                <div class="col-lg-12 col-xs-12" style="background-color:#E3E3E3; color:#fff" class="">
                    <div class="col-lg-3 col-xs-6">
                        <div style="background-color:#00FF7C; color:#fff" class="small-box">
                            <div class="inner">
                                <p><strong>SERVICIOS</strong>
                                    <ul>
                                        <li>REGISTRAR SOLICITUD</li>
                                        <li>DE SERVICIOS</li>
                                    </ul>
                                </p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-file-o"></i>
                            </div>
                            <a href="?module=pedidos_compras" class="small-box-footer" title="Administrar Compras" data-toggle="tooltip">
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>            
                    </div>
                    <!--Fin Bloque 1---------------------------------------------------------->

                    <!--Bloque 2------------------------------------------------------------->
                    <div class="col-lg-3 col-xs-6">
                        <div style="background-color:#00FF7C; color:#fff" class="small-box">
                            <div class="inner">
                                <p><strong>SERVICIOS</strong>
                                    <ul>
                                        <li>REGISTRAR</li>
                                        <li>DIAGNOSTICOS</li>
                                    </ul>
                                </p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-file-o"></i>
                            </div>
                            <a href="?module=pedidos_compras" class="small-box-footer" title="Administrar Compras" data-toggle="tooltip">
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>            
                    </div>
                    <!--Fin Bloque 2---------------------------------------------------------->

                    <!--Bloque 3------------------------------------------------------------->
                    <div class="col-lg-3 col-xs-6">
                        <div style="background-color:#00FF7C; color:#fff" class="small-box">
                            <div class="inner">
                                <p><strong>SERVICIOS</strong>
                                    <ul>
                                        <li>REGISTRAR PROMOCIONES</li>
                                        <li>Y DESCUENTOS</li>
                                    </ul>
                                </p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-file-o"></i>
                            </div>
                            <a href="?module=pedidos_compras" class="small-box-footer" title="Administrar Compras" data-toggle="tooltip">
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>            
                    </div>
                    <!--Fin Bloque 3---------------------------------------------------------->

                    <!--Bloque 4------------------------------------------------------------->
                    <div class="col-lg-3 col-xs-6">
                        <div style="background-color:#00FF7C; color:#fff" class="small-box">
                            <div class="inner">
                                <p><strong>SERVICIOS</strong>
                                    <ul>
                                        <li>GENERAR</li>
                                        <li>PRESUPUESTOS</li>
                                    </ul>
                                </p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-file-o"></i>
                            </div>
                            <a href="?module=pedidos_compras" class="small-box-footer" title="Administrar Compras" data-toggle="tooltip">
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>            
                    </div>
                    <!--Fin Bloque 4---------------------------------------------------------->
                    
                    <!--Bloque 5------------------------------------------------------------->
                    <div class="col-lg-3 col-xs-6">
                        <div style="background-color:#00FF7C; color:#fff" class="small-box">
                            <div class="inner">
                                <p><strong>SERVICIOS</strong>
                                    <ul>
                                        <li>GENERAR ORDEN</li>
                                        <li>DE TRABAJO</li>
                                    </ul>
                                </p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-file-o"></i>
                            </div>
                            <a href="?module=pedidos_compras" class="small-box-footer" title="Administrar Compras" data-toggle="tooltip">
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>            
                    </div>
                    <!--Fin Bloque 5---------------------------------------------------------->

                    
                    <!--Bloque 6------------------------------------------------------------->
                    <div class="col-lg-3 col-xs-6">
                        <div style="background-color:#00FF7C; color:#fff" class="small-box">
                            <div class="inner">
                                <p><strong>SERVICIOS</strong>
                                    <ul>
                                        <li>REGISTRAR SERVICIOS</li>
                                        <li>REALIZADOS</li>
                                    </ul>
                                </p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-file-o"></i>
                            </div>
                            <a href="?module=pedidos_compras" class="small-box-footer" title="Administrar Compras" data-toggle="tooltip">
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>            
                    </div>
                    <!--Fin Bloque 6---------------------------------------------------------->
                    
                    <!--Bloque 7------------------------------------------------------------->
                    <div class="col-lg-3 col-xs-6">
                        <div style="background-color:#00FF7C; color:#fff" class="small-box">
                            <div class="inner">
                                <p><strong>SERVICIOS</strong>
                                    <ul>
                                        <li>REGISTRAR ENTREGA</li>
                                        <li>DE EQUIPOS</li>
                                    </ul>
                                </p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-file-o"></i>
                            </div>
                            <a href="?module=pedidos_compras" class="small-box-footer" title="Administrar Compras" data-toggle="tooltip">
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>            
                    </div>
                    <!--Fin Bloque 7---------------------------------------------------------->
                    
                    <!--Bloque 8------------------------------------------------------------->
                    <div class="col-lg-3 col-xs-6">
                        <div style="background-color:#00FF7C; color:#fff" class="small-box">
                            <div class="inner">
                                <p><strong>SERVICIOS</strong>
                                    <ul>
                                        <li>REGISTRAR</li>
                                        <li>RECLAMOS</li>
                                    </ul>
                                </p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-file-o"></i>
                            </div>
                            <a href="?module=pedidos_compras" class="small-box-footer" title="Administrar Compras" data-toggle="tooltip">
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>            
                    </div>
                    <!--Fin Bloque 8---------------------------------------------------------->
                </div>
            </div>
            <!-------------------------------------->
        </section>
    <?php   }
    elseif($_SESSION['fun_niv'] == 'ENC_COMPRAS'){?>

        <section class="content-header">
            <h1>
                <i class="fa fa-home icon-title"></i>
                Inicio
            </h1>

            <ol class="breadcrumb">
                <li>
                    <a href="?module=start">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
            </ol>
        </section>
        <section class="content">
    
                    <div class="row">
                        <div class="col-lg-12 col-xs-12">
                            <div class="alert alert-info alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p style="font-size:15px">
                                    <i class="icon fa fa-user"></i>
                                    Bienvenido/a <strong><?php echo $_SESSION['emp_nom_ape'];?> </strong>
                                    al area virtual del taller
                                </p>
                            </div>
                        </div>
                    </div>     
    
                <div class="row">
                 <!--Bloque 2------------------------------------------------------------->
                 <div class="col-lg-3 col-xs-6">
                    <div style="background-color:#5AFF64; color:#fff" class="small-box">
                        <div class="inner">
                            <p><strong>DIAGNOSTICOS</strong>
                                <ul>
                                    <li>REGISTRAR</li>
                                    <li>PEDIDOS</li>
                                    <li>DE COMPRAS</li>
                                </ul>
                            </p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-heartbeat"></i>
                        </div>
                        <a href="?module=diagnosticos" class="small-box-footer" title="Regitrar Diagnostico" data-toggle="tooltip">
                            <i class="fa fa-plus"></i>
                        </a>
                    </div>            
                </div>
                <!--Fin Bloque 2---------------------------------------------------------->

                <!--Bloque 2------------------------------------------------------------->
                <div class="col-lg-3 col-xs-6">
                    <div style="background-color:#5AFF64; color:#fff" class="small-box">
                        <div class="inner">
                            <p><strong>PRESUPUESTOS</strong>
                                <ul>
                                    <li>REGISTRAR</li>
                                    <li>PRESUPUESTOS</li>
                                    <li>DE DIAGNOSTICOS</li>
                                </ul>
                            </p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-file-text-o"></i>
                        </div>
                        <a href="?module=presupuestos" class="small-box-footer" title="Regitrar Presupuestos" data-toggle="tooltip">
                            <i class="fa fa-plus"></i>
                        </a>
                    </div>            
                </div>
                <!--Fin Bloque 2---------------------------------------------------------->

                <div class="col-xl-4 col-lg-5">
                    <div class="card-no-shadow nh-4">
                        <div class="card-header py-J d-flex flex-row aling-items-center justify-content-between"></div>
                    </div>
                </div>
                <!--Fin de bloque 3-->
                </div>
    
            </section>
    <?php }
    elseif($_SESSION['fun_niv'] == 'AUX_COMPRAS'){?>

        <section class="content-header">
            <h1>
                <i class="fa fa-home icon-title"></i>
                Inicio
            </h1>

            <ol class="breadcrumb">
                <li>
                    <a href="?module=start">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
            </ol>
        </section>
        <section class="content">
    
                    <div class="row">
                        <div class="col-lg-12 col-xs-12">
                            <div class="alert alert-info alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p style="font-size:15px">
                                    <i class="icon fa fa-user"></i>
                                    Bienvenido/a <strong><?php echo $_SESSION['emp_nom_ape'];?> </strong>
                                    al area virtual del taller
                                </p>
                            </div>
                        </div>
                    </div>     
    
                <div class="row">
                 <!--Bloque 2------------------------------------------------------------->
                 <div class="col-lg-3 col-xs-6">
                    <div style="background-color:#5AFF64; color:#fff" class="small-box">
                        <div class="inner">
                            <p><strong>DIAGNOSTICOS</strong>
                                <ul>
                                    <li>REGISTRAR</li>
                                    <li>DIAGNOSTICOS</li>
                                    <li>DE VEHICULOS</li>
                                </ul>
                            </p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-heartbeat"></i>
                        </div>
                        <a href="?module=diagnosticos" class="small-box-footer" title="Regitrar Diagnostico" data-toggle="tooltip">
                            <i class="fa fa-plus"></i>
                        </a>
                    </div>            
                </div>
                <!--Fin Bloque 2---------------------------------------------------------->

                <!--Bloque 2------------------------------------------------------------->
                <div class="col-lg-3 col-xs-6">
                    <div style="background-color:#5AFF64; color:#fff" class="small-box">
                        <div class="inner">
                            <p><strong>PRESUPUESTOS</strong>
                                <ul>
                                    <li>REGISTRAR</li>
                                    <li>PRESUPUESTOS</li>
                                    <li>DE DIAGNOSTICOS</li>
                                </ul>
                            </p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-file-text-o"></i>
                        </div>
                        <a href="?module=presupuestos" class="small-box-footer" title="Regitrar Presupuestos" data-toggle="tooltip">
                            <i class="fa fa-plus"></i>
                        </a>
                    </div>            
                </div>
                <!--Fin Bloque 2---------------------------------------------------------->

                <div class="col-xl-4 col-lg-5">
                    <div class="card-no-shadow nh-4">
                        <div class="card-header py-J d-flex flex-row aling-items-center justify-content-between"></div>
                    </div>
                </div>
                <!--Fin de bloque 3-->
                </div>
    
            </section>
    <?php }
    elseif($_SESSION['fun_niv'] == 'ENC_SERVICIOS'){?>

        <section class="content-header">
            <h1>
                <i class="fa fa-home icon-title"></i>
                Inicio
            </h1>

            <ol class="breadcrumb">
                <li>
                    <a href="?module=start">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
            </ol>
        </section>
        <section class="content">
    
                    <div class="row">
                        <div class="col-lg-12 col-xs-12">
                            <div class="alert alert-info alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p style="font-size:15px">
                                    <i class="icon fa fa-user"></i>
                                    Bienvenido/a <strong><?php echo $_SESSION['emp_nom_ape'];?> </strong>
                                    al area virtual del taller
                                </p>
                            </div>
                        </div>
                    </div>     
    
                <div class="row">
                 <!--Bloque 2------------------------------------------------------------->
                 <div class="col-lg-3 col-xs-6">
                    <div style="background-color:#5AFF64; color:#fff" class="small-box">
                        <div class="inner">
                            <p><strong>DIAGNOSTICOS</strong>
                                <ul>
                                    <li>REGISTRAR</li>
                                    <li>DIAGNOSTICOS</li>
                                    <li>DE VEHICULOS</li>
                                </ul>
                            </p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-heartbeat"></i>
                        </div>
                        <a href="?module=diagnosticos" class="small-box-footer" title="Regitrar Diagnostico" data-toggle="tooltip">
                            <i class="fa fa-plus"></i>
                        </a>
                    </div>            
                </div>
                <!--Fin Bloque 2---------------------------------------------------------->

                <!--Bloque 2------------------------------------------------------------->
                <div class="col-lg-3 col-xs-6">
                    <div style="background-color:#5AFF64; color:#fff" class="small-box">
                        <div class="inner">
                            <p><strong>PRESUPUESTOS</strong>
                                <ul>
                                    <li>REGISTRAR</li>
                                    <li>PRESUPUESTOS</li>
                                    <li>DE DIAGNOSTICOS</li>
                                </ul>
                            </p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-file-text-o"></i>
                        </div>
                        <a href="?module=presupuestos" class="small-box-footer" title="Regitrar Presupuestos" data-toggle="tooltip">
                            <i class="fa fa-plus"></i>
                        </a>
                    </div>            
                </div>
                <!--Fin Bloque 2---------------------------------------------------------->

                <div class="col-xl-4 col-lg-5">
                    <div class="card-no-shadow nh-4">
                        <div class="card-header py-J d-flex flex-row aling-items-center justify-content-between"></div>
                    </div>
                </div>
                <!--Fin de bloque 3-->
                </div>
    
            </section>
    <?php }
    elseif($_SESSION['fun_niv'] == 'AUX_SERVICIOS'){?>

        <section class="content-header">
            <h1>
                <i class="fa fa-home icon-title"></i>
                Inicio
            </h1>

            <ol class="breadcrumb">
                <li>
                    <a href="?module=start">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
            </ol>
        </section>
        <section class="content">
    
                    <div class="row">
                        <div class="col-lg-12 col-xs-12">
                            <div class="alert alert-info alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p style="font-size:15px">
                                    <i class="icon fa fa-user"></i>
                                    Bienvenido/a <strong><?php echo $_SESSION['emp_nom_ape'];?> </strong>
                                    al area virtual del taller
                                </p>
                            </div>
                        </div>
                    </div>     
    
                <div class="row">
                 <!--Bloque 2------------------------------------------------------------->
                 <div class="col-lg-3 col-xs-6">
                    <div style="background-color:#5AFF64; color:#fff" class="small-box">
                        <div class="inner">
                            <p><strong>DIAGNOSTICOS</strong>
                                <ul>
                                    <li>REGISTRAR</li>
                                    <li>DIAGNOSTICOS</li>
                                    <li>DE VEHICULOS</li>
                                </ul>
                            </p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-heartbeat"></i>
                        </div>
                        <a href="?module=diagnosticos" class="small-box-footer" title="Regitrar Diagnostico" data-toggle="tooltip">
                            <i class="fa fa-plus"></i>
                        </a>
                    </div>            
                </div>
                <!--Fin Bloque 2---------------------------------------------------------->

                <!--Bloque 2------------------------------------------------------------->
                <div class="col-lg-3 col-xs-6">
                    <div style="background-color:#5AFF64; color:#fff" class="small-box">
                        <div class="inner">
                            <p><strong>PRESUPUESTOS</strong>
                                <ul>
                                    <li>REGISTRAR</li>
                                    <li>PRESUPUESTOS</li>
                                    <li>DE DIAGNOSTICOS</li>
                                </ul>
                            </p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-file-text-o"></i>
                        </div>
                        <a href="?module=presupuestos" class="small-box-footer" title="Regitrar Presupuestos" data-toggle="tooltip">
                            <i class="fa fa-plus"></i>
                        </a>
                    </div>            
                </div>
                <!--Fin Bloque 2---------------------------------------------------------->

                <div class="col-xl-4 col-lg-5">
                    <div class="card-no-shadow nh-4">
                        <div class="card-header py-J d-flex flex-row aling-items-center justify-content-between"></div>
                    </div>
                </div>
                <!--Fin de bloque 3-->
                </div>
    
            </section>
    <?php }
    elseif($_SESSION['fun_niv'] == 'ENC_FACTURACION'){?>

        <section class="content-header">
            <h1>
                <i class="fa fa-home icon-title"></i>
                Inicio
            </h1>

            <ol class="breadcrumb">
                <li>
                    <a href="?module=start">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
            </ol>
        </section>
        <section class="content">
    
                    <div class="row">
                        <div class="col-lg-12 col-xs-12">
                            <div class="alert alert-info alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p style="font-size:15px">
                                    <i class="icon fa fa-user"></i>
                                    Bienvenido/a <strong><?php echo $_SESSION['emp_nom_ape'];?> </strong>
                                    al area virtual del taller
                                </p>
                            </div>
                        </div>
                    </div>     
    
                <div class="row">
                 <!--Bloque 2------------------------------------------------------------->
                 <div class="col-lg-3 col-xs-6">
                    <div style="background-color:#5AFF64; color:#fff" class="small-box">
                        <div class="inner">
                            <p><strong>DIAGNOSTICOS</strong>
                                <ul>
                                    <li>REGISTRAR</li>
                                    <li>DIAGNOSTICOS</li>
                                    <li>DE VEHICULOS</li>
                                </ul>
                            </p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-heartbeat"></i>
                        </div>
                        <a href="?module=diagnosticos" class="small-box-footer" title="Regitrar Diagnostico" data-toggle="tooltip">
                            <i class="fa fa-plus"></i>
                        </a>
                    </div>            
                </div>
                <!--Fin Bloque 2---------------------------------------------------------->

                <!--Bloque 2------------------------------------------------------------->
                <div class="col-lg-3 col-xs-6">
                    <div style="background-color:#5AFF64; color:#fff" class="small-box">
                        <div class="inner">
                            <p><strong>PRESUPUESTOS</strong>
                                <ul>
                                    <li>REGISTRAR</li>
                                    <li>PRESUPUESTOS</li>
                                    <li>DE DIAGNOSTICOS</li>
                                </ul>
                            </p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-file-text-o"></i>
                        </div>
                        <a href="?module=presupuestos" class="small-box-footer" title="Regitrar Presupuestos" data-toggle="tooltip">
                            <i class="fa fa-plus"></i>
                        </a>
                    </div>            
                </div>
                <!--Fin Bloque 2---------------------------------------------------------->

                <div class="col-xl-4 col-lg-5">
                    <div class="card-no-shadow nh-4">
                        <div class="card-header py-J d-flex flex-row aling-items-center justify-content-between"></div>
                    </div>
                </div>
                <!--Fin de bloque 3-->
                </div>
    
            </section>
    <?php }
    elseif($_SESSION['fun_niv'] == 'CAJERO'){?>

        <section class="content-header">
            <h1>
                <i class="fa fa-home icon-title"></i>
                Inicio
            </h1>

            <ol class="breadcrumb">
                <li>
                    <a href="?module=start">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
            </ol>
        </section>
        <section class="content">
    
                    <div class="row">
                        <div class="col-lg-12 col-xs-12">
                            <div class="alert alert-info alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p style="font-size:15px">
                                    <i class="icon fa fa-user"></i>
                                    Bienvenido/a <strong><?php echo $_SESSION['emp_nom_ape'];?> </strong>
                                    al area virtual del taller
                                </p>
                            </div>
                        </div>
                    </div>     
    
                <div class="row">
                 <!--Bloque 2------------------------------------------------------------->
                 <div class="col-lg-3 col-xs-6">
                    <div style="background-color:#5AFF64; color:#fff" class="small-box">
                        <div class="inner">
                            <p><strong>DIAGNOSTICOS</strong>
                                <ul>
                                    <li>REGISTRAR</li>
                                    <li>DIAGNOSTICOS</li>
                                    <li>DE VEHICULOS</li>
                                </ul>
                            </p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-heartbeat"></i>
                        </div>
                        <a href="?module=diagnosticos" class="small-box-footer" title="Regitrar Diagnostico" data-toggle="tooltip">
                            <i class="fa fa-plus"></i>
                        </a>
                    </div>            
                </div>
                <!--Fin Bloque 2---------------------------------------------------------->

                <!--Bloque 2------------------------------------------------------------->
                <div class="col-lg-3 col-xs-6">
                    <div style="background-color:#5AFF64; color:#fff" class="small-box">
                        <div class="inner">
                            <p><strong>PRESUPUESTOS</strong>
                                <ul>
                                    <li>REGISTRAR</li>
                                    <li>PRESUPUESTOS</li>
                                    <li>DE DIAGNOSTICOS</li>
                                </ul>
                            </p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-file-text-o"></i>
                        </div>
                        <a href="?module=presupuestos" class="small-box-footer" title="Regitrar Presupuestos" data-toggle="tooltip">
                            <i class="fa fa-plus"></i>
                        </a>
                    </div>            
                </div>
                <!--Fin Bloque 2---------------------------------------------------------->

                <div class="col-xl-4 col-lg-5">
                    <div class="card-no-shadow nh-4">
                        <div class="card-header py-J d-flex flex-row aling-items-center justify-content-between"></div>
                    </div>
                </div>
                <!--Fin de bloque 3-->
                </div>
    
            </section>
    <?php }
?>