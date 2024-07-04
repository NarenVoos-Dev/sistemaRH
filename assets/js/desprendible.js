function getParameterByName(name) {
    name = name.replace(/[\[\]]/g, "\\$&");
    var url = window.location.href;
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}

var id = getParameterByName('id');
if(id > 0)
{
    var id= id;
    datosEmpleados(id);
    itemsDeduccion(id);
    itemsDevengados(id);

}
//DATOS EMPLEADOS
function datosEmpleados(id){
    $.ajax({
        url:"../../modelos/Nomina.php",
        type:"POST",
        data:{
            id:id,
            action:'datoEmpleados'
        },
        dataType:'json',
        success: function(data){
            data.forEach(function(item){
                
                var urlImg = "../../assets/img/empresas/empresa"+item.idEmpresa+".png"
                var quincena_empleado = parseFloat(item.quincena_empleado);
                var totalDevengado = parseFloat(item.total_devengados);
                var subtotalDevengad = quincena_empleado + totalDevengado
                $("#logoVolante").attr("src",urlImg);
                $('#empresa').html(item.nombre_empresa);
                $('#nombre_empleado').html(item.nombre_empleado);
                $('#cedula').html(item.identificacion);
                $('#periodo').html(item.periodo);
                $('#salario').html(item.salario_empleado);
                $('#quincena').html(quincena_empleado);
                $('#mes').html(item.mes);
                $('#totalDevengado').html(subtotalDevengad);
                $('#totalDeducido').html(item.total_deduccion);
                $('#totalPago').html(item.total_neto);
                
    
            });
        }
    })
}

//ITEM DEVENGADOS

function itemsDevengados(id){
    $.ajax({
        url:"../../modelos/Nomina.php",
        type:"POST",
        data:{
            id:id,
            action:'itemsDevengado'
        },
        dataType:'json',
        success: function(data){
            if(data && data.length > 0){
                var FilaDevengado = '';
                $.each(data,function(index,item){
                    FilaDevengado += PintarItemDevengado(index,item)
                });
                $('#itemDevengado').html(FilaDevengado);
            }
        }
    })
}

function PintarItemDevengado(index,item){
    var FilaDevengado = '';
    FilaDevengado +='<tr>';
    FilaDevengado +='<td>'+item.descripcion_motivo+'</td>';
    FilaDevengado +='<td>$ '+item.montoDevengado+'</td>';
    FilaDevengado +='<td> </td>';
    FilaDevengado +='</tr>';
    return FilaDevengado; 
}
//Filas de Deduccion
function itemsDeduccion(id){
    $.ajax({
        url:"../../modelos/Nomina.php",
        type:"POST",
        data:{
            id:id,
            action:'itemsDeduccion'
        },
        dataType:'json',
        success: function(data){
            if(data && data.length > 0){
                var FilaDeducido = '';
                $.each(data,function(index,item){
                    FilaDeducido += PintarItemDeducido(index,item)
                });
                $('#itemDeducido').html(FilaDeducido);
            }
        }
    })
}

function PintarItemDeducido(index,item){
    $('h2 #empresa').html(item.nombre_empresa);
    var FilaDeducido = '';
    FilaDeducido +='<tr>';
    FilaDeducido +='<td>'+item.descripcion_motivo+'</td>';
    FilaDeducido +='<td></td>';
    FilaDeducido +='<td>$'+item.montoDeducido+'</td>';
    FilaDeducido +='</tr>';
    return FilaDeducido; 
}

// Aqui termina filas de deducido 

