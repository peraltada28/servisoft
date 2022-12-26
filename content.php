<?php 
    require "config/database.php";

    //empty es para comprbar vacio
    if(empty($_SESSION['fun_nom']) && empty($_SESSION['fun_pass'])){
        echo "<meta http-equiv='refresh' content='0; url=index.php?alert=3'>";
    } else {
        //----------------------------------------- servisoft
        if($_GET['module'] == 'start'){
            include "modules/start/view.php";
        }
        //----------------------------------------- servisoft
        else if($_GET['module'] == 'password'){
            include "modules/4_referenciales/password/view.php";
        }
        //----------------------------------------- servisoft
        else if($_GET['module'] == 'funcionarios'){
            include "modules/4_referenciales/1_funcionarios/view.php";
        }
        else if($_GET['module'] == 'form_funcionarios'){
            include "modules/4_referenciales/1_funcionarios/form.php";
        }
        //----------------------------------------- servisoft 2023
        else if($_GET['module'] == 'tipo_productos'){
            include "modules/4_referenciales/3_tipo_productos/view.php";
        }
        else if($_GET['module'] == 'form_tipo_productos'){
            include "modules/4_referenciales/3_tipo_productos/form.php";
        }
        //----------------------------------------- servisoft 2023
        else if($_GET['module'] == 'pedidos_compras'){
            include "modules/1_compras/1_pedidos_compra/view.php";
        } 
        else if($_GET['module'] == 'form_pedidos_compras'){
            include "modules/1_compras/1_pedidos_compra/form.php";
        }
        //----------------------------------------- servisoft 2023
        else if($_GET['module'] == 'clientes'){
            include "modules/1_clientes/view.php";
        }
        else if($_GET['module'] == 'form_clientes'){
            include "modules/1_clientes/form.php";
        }
        //----------------------------------------- servisoft
        else if($_GET['module'] == 'vehiculos'){
            include "modules/2_vehiculos/view.php";
        }
        else if($_GET['module'] == 'form_vehiculos'){
            include "modules/2_vehiculos/form.php";
        }
        //----------------------------------------- servisoft
        
        else if($_GET['module'] == 'sucursales'){
            include "modules/4_sucursales/view.php";
        }
        else if($_GET['module'] == 'form_sucursales'){
            include "modules/4_sucursales/form.php";
        }
        //----------------------------------------- servisoft
        else if($_GET['module'] == 'items'){
            include "modules/5_items/view.php";
        }
        else if($_GET['module'] == 'form_items'){
            include "modules/5_items/form.php";
        }
        //----------------------------------------- servisoft
        else if($_GET['module'] == 'tipo_items'){
            include "modules/6_tipo_items/view.php";
        }
        else if($_GET['module'] == 'form_tipo_items'){
            include "modules/6_tipo_items/form.php";
        }
        //----------------------------------------- servisoft
        else if($_GET['module'] == 'orden_trabajos'){
            include "modules/7_orden_trabajos/view.php";
        }
        else if($_GET['module'] == 'form_orden_trabajos'){
            include "modules/7_orden_trabajos/form.php";
        }
        //----------------------------------------- servisoft
        else if($_GET['module'] == 'diagnosticos'){
            include "modules/8_diagnosticos/view.php";
        }
        else if($_GET['module'] == 'form_diagnosticos'){
            include "modules/8_diagnosticos/form.php";
        }
        //----------------------------------------- talleres_refrigeracion
        else if($_GET['module'] == 'recepcion'){
            include "modules/9_recepcion/view.php";
        }
        else if($_GET['module'] == 'form_recepcion'){
            include "modules/9_recepcion/form.php";
        }
        //----------------------------------------- talleres_refrigeracion
        else if($_GET['module'] == 'diagnosticos'){
            include "modules/10_diagnosticos/view.php";
        }
        else if($_GET['module'] == 'form_diagnosticos'){
            include "modules/10_diagnosticos/form.php";
        }
        //----------------------------------------- talleres_refrigeracion
        else if($_GET['module'] == 'presupuestos'){
            include "modules/11_presupuestos/view.php";
        }
        else if($_GET['module'] == 'form_presupuestos'){
            include "modules/11_presupuestos/form.php";
        }
        //----------------------------------------- talleres_refrigeracion
        else if($_GET['module'] == 'orden_trabajos'){
            include "modules/12_orden_trabajos/view.php";
        }
        else if($_GET['module'] == 'form_orden_trabajos'){
            include "modules/12_orden_trabajos/form.php";
        }
        //----------------------------------------- talleres_refrigeracion
        else if($_GET['module'] == 'servicios'){
            include "modules/13_servicios/view.php";
        }
        else if($_GET['module'] == 'form_servicios'){
            include "modules/13_servicios/form.php";
        }
        //----------------------------------------- talleres_refrigeracion
        else if($_GET['module'] == 'promociones'){
            include "modules/14_promociones/view.php";
        }
        else if($_GET['module'] == 'form_promociones'){
            include "modules/14_promociones/form.php";
        }
        //----------------------------------------- talleres_refrigeracion
        else if($_GET['module'] == 'salida'){
            include "modules/15_salida/view.php";
        }
        else if($_GET['module'] == 'form_salida'){
            include "modules/15_salida/form.php";
        }
        //----------------------------------------- talleres_refrigeracion
        else if($_GET['module'] == 'reclamos'){
            include "modules/16_reclamos/view.php";
        }
        else if($_GET['module'] == 'form_reclamos'){
            include "modules/16_reclamos/form.php";
        }
        //----------------------------------------- talleres_refrigeracion
        else if($_GET['module'] == 'deposito'){
            include "modules/deposito/view.php";
        }
        else if($_GET['module'] == 'form_deposito'){
            include "modules/deposito/form.php";
        }
    }

?>
