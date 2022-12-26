<?php 

    if($_SESSION['fun_niv'] == 'ADMINISTRADOR'){?>

        <!--Para ques e quede seleccionado 
        cuando estas en el archivo selecionado-->
        <ul class="sidebar-menu">
            <li class="header">Menu</li>
                <?php 
                    if($_GET["module"] == "start"){
                        $active_home ="active";
                    } else {
                        $active_home ="";
                    }   
                ?>
            <!--------------------------------------->
            <li class="<?php echo $active_home ?>">
                <a href="?module=start">
                <i class="fa fa-home"></i>Inicio</a>
            </li>
            <!--------------------------------------->
            <li class="treeview">
                <a href="javascript:void(0);">
                    <i class="fa fa-file-text"></i>
                    <span>Administracion</span>
                </a>
                
                <ul class="treeview-menu">
                    <li> <!--Target para reportes, crea otra ventana-->
                        <!------------------------------->
                        <a href="?module=funcionarios">
                            <i class="fa fa-circle-o"></i>
                            Funcionarios
                        </a>
                        <!------------------------------->
                        <a href="?module=proveedores">
                            <i class="fa fa-circle-o"></i>
                            Proveedores
                        </a>
                        <!------------------------------->
                        <a href="?module=tipo_productos">
                            <i class="fa fa-circle-o"></i>
                            Tipo de productos
                        </a>
                        <!------------------------------->
                        <a href="?module=productos">
                            <i class="fa fa-circle-o"></i>
                            Productos
                        </a>
                        <!------------------------------->
                        <a href="?module=depositos">
                            <i class="fa fa-circle-o"></i>
                            Depositos
                        </a>
                        <!------------------------------->
                        <a href="?module=clientes">
                            <i class="fa fa-circle-o"></i>
                            Clientes
                        </a>
                        <!------------------------------->
                        <a href="?module=equipos">
                            <i class="fa fa-circle-o"></i>
                            Equipos
                        </a>
                        <!------------------------------->
                        <a href="?module=caja">
                            <i class="fa fa-circle-o"></i>
                            Caja
                        </a>
                        <!------------------------------->
                        <a href="?module=timbrado">
                            <i class="fa fa-circle-o"></i>
                            Timbrado
                        </a>
                        <!------------------------------->
                        <a href="?module=nro_facturas">
                            <i class="fa fa-circle-o"></i>
                            Numeros de Facturas
                        </a>
                        <!------------------------------->
                        <a href="?module=forma_cobro">
                            <i class="fa fa-circle-o"></i>
                            Forma de Cobro
                        </a>
                        <!------------------------------->
                    </li>
                </ul>
            </li>
            <!--------------------------------->
            <li class="treeview">
                <a href="javascript:void(0);">
                    <i class="fa fa-file-text"></i>
                    <span>Compras</span>
                </a>

                
                <ul class="treeview-menu">
                    <li> <!--Target para reportes, crea otra ventana-->
                        <!------------------------------>
                        <a href="?module=orden_trabajos">
                            <i class="fa fa-circle-o"></i>
                            Ordenes de Trabajos
                        </a>
                    </li>
                </ul>            
            </li>
            <!--------------------------------->
            
            <!--------------------------------->
            <li class="treeview">
                <a href="javascript:void(0);">
                    <i class="fa fa-file-text"></i>
                    <span>Facturacion</span>
                </a>

                
                <ul class="treeview-menu">
                    <li> <!--Target para reportes, crea otra ventana-->
                        <!------------------------------>
                        <a href="?module=orden_trabajos">
                            <i class="fa fa-circle-o"></i>
                            Ordenes de Trabajos
                        </a>
                    </li>
                </ul>            
            </li>
            <!--------------------------------->
            <li class="treeview">
                <a href="javascript:void(0);">
                    <i class="fa fa-file-text"></i>
                    <span>Servicios</span>
                </a>
                
                <ul class="treeview-menu">
                    <li> <!--Target para reportes, crea otra ventana-->
                        <!------------------------------>
                        <a href="?module=orden_trabajos">
                            <i class="fa fa-circle-o"></i>
                            Ordenes de Trabajos
                        </a>
                        <!------------------------------>
                        <a href="?module=diagnosticos">
                            <i class="fa fa-circle-o"></i>
                            Diagnosticos
                        </a>
                        <!------------------------------->
                        <a href="?module=presupuestos">
                            <i class="fa fa-circle-o"></i>
                            Presupuestos
                        </a>
                        <!------------------------------->
                        <a href="?module=servicios">
                            <i class="fa fa-circle-o"></i>
                            Promociones
                        </a>
                        <!------------------------------->
                        <a href="?module=reclamos">
                            <i class="fa fa-circle-o"></i>
                            Reclamos
                        </a>
                        <!------------------------------->
                    </li>
                </ul>
            </li>
            <!--------------------------------->
           <li>
                <a href="?module=password">
                    <i class="glyphicon glyphicon-lock"></i>
                    Cambiar contraseña
                </a>
            </li>
            <!--------------------------------->
            <li>
                <a href="modules/ayudas/1_admin/gral.php?act=on" target="_blank">
                    <i class="glyphicon glyphicon-lock"></i>
                    Manual y Ayuda
                </a>
            </li> 
                
        <?php 
    //si es de mecanicos
    } else if($_SESSION['fun_niv'] == 'ENC_COMPRAS'){?>
        
         <!--Para ques e quede seleccionado 
        cuando estas en el archivo selecionado-->
        <ul class="sidebar-menu">
            <li class="header">Menu</li>
                <?php 
                    if($_GET["module"] == "start"){
                        $active_home ="active";
                    } else {
                        $active_home ="";
                    }   
                ?>
            <!--------------------------------------->
            <li class="<?php echo $active_home ?>">
                <a href="?module=start">
                <i class="fa fa-home"></i>Inicio</a>
            </li>
            <!--------------------------------->
            <li class="treeview">
                <a href="javascript:void(0);">
                    <i class="fa fa-file-text"></i>
                    <span>Servicios</span>
                    <i class="fa fa-angle-left pull-rigth"></i>
                </a>
                
                <ul class="treeview-menu">
                    <li> <!--Target para reportes, crea otra ventana-->
                        <!------------------------------>
                        <a href="?module=diagnosticos">
                            <i class="fa fa-circle-o"></i>
                            Diagnostico
                        </a>
                        <!------------------------------->
                        <a href="?module=presupuestos">
                            <i class="fa fa-circle-o"></i>
                            Presupuestos
                        </a>
                        <!------------------------------->
                        <a href="?module=servicios">
                            <i class="fa fa-circle-o"></i>
                            Servicios
                        </a>
                        <!------------------------------->
                    </li>
                </ul>
            </li>
            <!--------------------------------->
           
            <?php 
                
                if($_GET['module'] == "password"){?>
                    <li class="active">
                        <a href="?module=password">
                            <i class="glyphicon glyphicon-lock"></i>
                            Cambiar contraseña
                        </a>
                    </li>

                <?php
                } else {?>
                    <li>
                        <a href="?module=password">
                            <i class="glyphicon glyphicon-lock"></i>
                            Cambiar contraseña
                        </a>
                    </li>

                <?php
                }
                ?> 

                <li class="active">
                    <a href="modules/ayudas/1_mecanica/gral.php?act=on" target="_blank">
                        <i class="glyphicon glyphicon-lock"></i>
                        Manual y Ayuda
                    </a>
                </li>   
                <?php 
                //}
                ?>
            </ul>
        <?php 
    //si es de porteros
    } else if($_SESSION['fun_niv'] == 'AUX_COMPRAS'){?>
        
        <!--Para ques e quede seleccionado 
       cuando estas en el archivo selecionado-->
       <ul class="sidebar-menu">
           <li class="header">Menu</li>
               <?php 
                   if($_GET["module"] == "start"){
                       $active_home ="active";
                   } else {
                       $active_home ="";
                   }   
               ?>
           <!--------------------------------------->
           <li class="<?php echo $active_home ?>">
               <a href="?module=start">
               <i class="fa fa-home"></i>Inicio</a>
           </li>
           <!--------------------------------->
           <li class="treeview">
               <a href="javascript:void(0);">
                   <i class="fa fa-file-text"></i>
                   <span>Servicios</span>
                   <i class="fa fa-angle-left pull-rigth"></i>
               </a>
               
               <ul class="treeview-menu">
                   <li> <!--Target para reportes, crea otra ventana-->
                       <!------------------------------>
                       <a href="?module=diagnosticos">
                           <i class="fa fa-circle-o"></i>
                           Diagnostico
                       </a>
                       <!------------------------------->
                       <a href="?module=presupuestos">
                           <i class="fa fa-circle-o"></i>
                           Presupuestos
                       </a>
                       <!------------------------------->
                       <a href="?module=servicios">
                           <i class="fa fa-circle-o"></i>
                           Servicios
                       </a>
                       <!------------------------------->
                   </li>
               </ul>
           </li>
           <!--------------------------------->
          
           <?php 
               
               if($_GET['module'] == "password"){?>
                   <li class="active">
                       <a href="?module=password">
                           <i class="glyphicon glyphicon-lock"></i>
                           Cambiar contraseña
                       </a>
                   </li>

               <?php
               } else {?>
                   <li>
                       <a href="?module=password">
                           <i class="glyphicon glyphicon-lock"></i>
                           Cambiar contraseña
                       </a>
                   </li>

               <?php
               }
               ?> 

               <li class="active">
                   <a href="modules/ayudas/1_mecanica/gral.php?act=on" target="_blank">
                       <i class="glyphicon glyphicon-lock"></i>
                       Manual y Ayuda
                   </a>
               </li>   
               <?php 
               //}
               ?>
           </ul>
       <?php 
    //si es de porteros
    } else if($_SESSION['fun_niv'] == 'ENC_SERVICIOS'){?>
        
        <!--Para ques e quede seleccionado 
       cuando estas en el archivo selecionado-->
       <ul class="sidebar-menu">
           <li class="header">Menu</li>
               <?php 
                   if($_GET["module"] == "start"){
                       $active_home ="active";
                   } else {
                       $active_home ="";
                   }   
               ?>
           <!--------------------------------------->
           <li class="<?php echo $active_home ?>">
               <a href="?module=start">
               <i class="fa fa-home"></i>Inicio</a>
           </li>
           <!--------------------------------->
           <li class="treeview">
               <a href="javascript:void(0);">
                   <i class="fa fa-file-text"></i>
                   <span>Servicios</span>
                   <i class="fa fa-angle-left pull-rigth"></i>
               </a>
               
               <ul class="treeview-menu">
                   <li> <!--Target para reportes, crea otra ventana-->
                       <!------------------------------>
                       <a href="?module=diagnosticos">
                           <i class="fa fa-circle-o"></i>
                           Diagnostico
                       </a>
                       <!------------------------------->
                       <a href="?module=presupuestos">
                           <i class="fa fa-circle-o"></i>
                           Presupuestos
                       </a>
                       <!------------------------------->
                       <a href="?module=servicios">
                           <i class="fa fa-circle-o"></i>
                           Servicios
                       </a>
                       <!------------------------------->
                   </li>
               </ul>
           </li>
           <!--------------------------------->
          
           <?php 
               
               if($_GET['module'] == "password"){?>
                   <li class="active">
                       <a href="?module=password">
                           <i class="glyphicon glyphicon-lock"></i>
                           Cambiar contraseña
                       </a>
                   </li>

               <?php
               } else {?>
                   <li>
                       <a href="?module=password">
                           <i class="glyphicon glyphicon-lock"></i>
                           Cambiar contraseña
                       </a>
                   </li>

               <?php
               }
               ?> 

               <li class="active">
                   <a href="modules/ayudas/1_mecanica/gral.php?act=on" target="_blank">
                       <i class="glyphicon glyphicon-lock"></i>
                       Manual y Ayuda
                   </a>
               </li>   
               <?php 
               //}
               ?>
           </ul>
       <?php 
    //si es de porteros
    } else if($_SESSION['fun_niv'] == 'AUX_SERVICIOS'){?>
        
        <!--Para ques e quede seleccionado 
       cuando estas en el archivo selecionado-->
       <ul class="sidebar-menu">
           <li class="header">Menu</li>
               <?php 
                   if($_GET["module"] == "start"){
                       $active_home ="active";
                   } else {
                       $active_home ="";
                   }   
               ?>
           <!--------------------------------------->
           <li class="<?php echo $active_home ?>">
               <a href="?module=start">
               <i class="fa fa-home"></i>Inicio</a>
           </li>
           <!--------------------------------->
           <li class="treeview">
               <a href="javascript:void(0);">
                   <i class="fa fa-file-text"></i>
                   <span>Servicios</span>
                   <i class="fa fa-angle-left pull-rigth"></i>
               </a>
               
               <ul class="treeview-menu">
                   <li> <!--Target para reportes, crea otra ventana-->
                       <!------------------------------>
                       <a href="?module=diagnosticos">
                           <i class="fa fa-circle-o"></i>
                           Diagnostico
                       </a>
                       <!------------------------------->
                       <a href="?module=presupuestos">
                           <i class="fa fa-circle-o"></i>
                           Presupuestos
                       </a>
                       <!------------------------------->
                       <a href="?module=servicios">
                           <i class="fa fa-circle-o"></i>
                           Servicios
                       </a>
                       <!------------------------------->
                   </li>
               </ul>
           </li>
           <!--------------------------------->
          
           <?php 
               
               if($_GET['module'] == "password"){?>
                   <li class="active">
                       <a href="?module=password">
                           <i class="glyphicon glyphicon-lock"></i>
                           Cambiar contraseña
                       </a>
                   </li>

               <?php
               } else {?>
                   <li>
                       <a href="?module=password">
                           <i class="glyphicon glyphicon-lock"></i>
                           Cambiar contraseña
                       </a>
                   </li>

               <?php
               }
               ?> 

               <li class="active">
                   <a href="modules/ayudas/1_mecanica/gral.php?act=on" target="_blank">
                       <i class="glyphicon glyphicon-lock"></i>
                       Manual y Ayuda
                   </a>
               </li>   
               <?php 
               //}
               ?>
           </ul>
       <?php 
    //si es de porteros
    } else if($_SESSION['fun_niv'] == 'ENC_FACTURACION'){?>
        
        <!--Para ques e quede seleccionado 
       cuando estas en el archivo selecionado-->
       <ul class="sidebar-menu">
           <li class="header">Menu</li>
               <?php 
                   if($_GET["module"] == "start"){
                       $active_home ="active";
                   } else {
                       $active_home ="";
                   }   
               ?>
           <!--------------------------------------->
           <li class="<?php echo $active_home ?>">
               <a href="?module=start">
               <i class="fa fa-home"></i>Inicio</a>
           </li>
           <!--------------------------------->
           <li class="treeview">
               <a href="javascript:void(0);">
                   <i class="fa fa-file-text"></i>
                   <span>Servicios</span>
                   <i class="fa fa-angle-left pull-rigth"></i>
               </a>
               
               <ul class="treeview-menu">
                   <li> <!--Target para reportes, crea otra ventana-->
                       <!------------------------------>
                       <a href="?module=diagnosticos">
                           <i class="fa fa-circle-o"></i>
                           Diagnostico
                       </a>
                       <!------------------------------->
                       <a href="?module=presupuestos">
                           <i class="fa fa-circle-o"></i>
                           Presupuestos
                       </a>
                       <!------------------------------->
                       <a href="?module=servicios">
                           <i class="fa fa-circle-o"></i>
                           Servicios
                       </a>
                       <!------------------------------->
                   </li>
               </ul>
           </li>
           <!--------------------------------->
          
           <?php 
               
               if($_GET['module'] == "password"){?>
                   <li class="active">
                       <a href="?module=password">
                           <i class="glyphicon glyphicon-lock"></i>
                           Cambiar contraseña
                       </a>
                   </li>

               <?php
               } else {?>
                   <li>
                       <a href="?module=password">
                           <i class="glyphicon glyphicon-lock"></i>
                           Cambiar contraseña
                       </a>
                   </li>

               <?php
               }
               ?> 

               <li class="active">
                   <a href="modules/ayudas/1_mecanica/gral.php?act=on" target="_blank">
                       <i class="glyphicon glyphicon-lock"></i>
                       Manual y Ayuda
                   </a>
               </li>   
               <?php 
               //}
               ?>
           </ul>
       <?php 
    //si es de porteros
    } else if($_SESSION['fun_niv'] == 'CAJERO'){?>
        
        <!--Para ques e quede seleccionado 
       cuando estas en el archivo selecionado-->
       <ul class="sidebar-menu">
           <li class="header">Menu</li>
               <?php 
                   if($_GET["module"] == "start"){
                       $active_home ="active";
                   } else {
                       $active_home ="";
                   }   
               ?>
           <!--------------------------------------->
           <li class="<?php echo $active_home ?>">
               <a href="?module=start">
               <i class="fa fa-home"></i>Inicio</a>
           </li>
           <!--------------------------------->
           <li class="treeview">
               <a href="javascript:void(0);">
                   <i class="fa fa-file-text"></i>
                   <span>Servicios</span>
                   <i class="fa fa-angle-left pull-rigth"></i>
               </a>
               
               <ul class="treeview-menu">
                   <li> <!--Target para reportes, crea otra ventana-->
                       <!------------------------------>
                       <a href="?module=diagnosticos">
                           <i class="fa fa-circle-o"></i>
                           Diagnostico
                       </a>
                       <!------------------------------->
                       <a href="?module=presupuestos">
                           <i class="fa fa-circle-o"></i>
                           Presupuestos
                       </a>
                       <!------------------------------->
                       <a href="?module=servicios">
                           <i class="fa fa-circle-o"></i>
                           Servicios
                       </a>
                       <!------------------------------->
                   </li>
               </ul>
           </li>
           <!--------------------------------->
          
           <?php 
               
               if($_GET['module'] == "password"){?>
                   <li class="active">
                       <a href="?module=password">
                           <i class="glyphicon glyphicon-lock"></i>
                           Cambiar contraseña
                       </a>
                   </li>

               <?php
               } else {?>
                   <li>
                       <a href="?module=password">
                           <i class="glyphicon glyphicon-lock"></i>
                           Cambiar contraseña
                       </a>
                   </li>

               <?php
               }
               ?> 

               <li class="active">
                   <a href="modules/ayudas/1_mecanica/gral.php?act=on" target="_blank">
                       <i class="glyphicon glyphicon-lock"></i>
                       Manual y Ayuda
                   </a>
               </li>   
               <?php 
               //}
               ?>
           </ul>
       <?php 
    //si es de porteros
    } 
?>
