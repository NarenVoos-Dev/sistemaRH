$(document).ready(function() {
    validar();
});

function validar(){
    $.ajax({
        url:'../modelos/session.php',
        method:'GET',
        data:{action:'validarSesion'},
        dataType:'json',
        success: function(response){
            const perfil = response.profile;
            const usuario = response.usuario;
            TblDashboard(perfil, usuario);
        },
        error:function(){
            console.log('error de session')
        }
    });
}

function TblDashboard(perfil,usuario){
    $.ajax({
        url:"../modelos/tblDashboard.php",
        type:"GET",
        data:{action:'TblDashboardNomina'},
        dataType:'json',
        success: function(data){
            
            if(data&&data.length > 0 ){
                var FilaVolante = '';
                $.each(data,function(index,item){
                    if(perfil == 1){
                        FilaVolante += PintarTblDashboardAdmin(index,item,usuario)
                    }else{
                        FilaVolante += PintarTblDashboard(index,item)
                    }
                });
                $('#tblDashboardVolantes').html(FilaVolante);
            }
        }
    })
}

//Funcion pintar tabla de volantes de usuarios
function PintarTblDashboard(index,item){
    var NombreEmpleado = item.nombres_empleados;
    var Identificacion = item.identificacion;
    var id_volante = item.id_volante_pago;
    var mes = item.id_mes;
    var etapa = item.etapa;
    var quincena = parseFloat(item.quincena);
    var devengado = parseFloat(item.devengado);
    var deducido = formatoMoneda (parseFloat(item.deduccion)); 
    TotalDevegado = formatoMoneda (quincena+devengado);
    if(mes.length < 2){
        mes = '0'+ mes;
    }
    
    if(etapa == 1){
        var FechaInicial = '01/'+mes+'/'+item.año
        var FechaFinal = '15/'+mes+'/'+item.año
    }else{
        var FechaInicial = '16/'+mes+'/'+item.año
        var FechaFinal = '30/'+mes+'/'+item.año
    }
    $('.logo-name').html(item.empresa)
    $('#NombreEmpleado').html(NombreEmpleado);
    $('#identificacion').html(Identificacion);
    let valorNeto = formatoMoneda(parseFloat(item.total_neto));
    var FilaVolante = '';
    FilaVolante +='<tr>';
    FilaVolante +='<td>'+item.nombreMes+'</td>';
    FilaVolante +='<td>'+FechaInicial+' - '+FechaFinal+'</td>';
    FilaVolante +='<td>'+TotalDevegado+'</td>'
    FilaVolante +='<td>'+deducido+'</td>'
    FilaVolante +='<td> $'+valorNeto+'</td>';
    FilaVolante +='<td>'
    FilaVolante +='<button class="abrir-pdf btn btn-secondary" data-id="'+ id_volante +'"><i class="far fa fa-print"></i> Print</button>';
    FilaVolante +='</td>'
    FilaVolante +='</tr>';
    return FilaVolante; 
}


//Funcion pintar tabla de volantes para el admin
function PintarTblDashboardAdmin(index,item,usuario){
    $('.item-admin').show();
    var Identificacion = item.identificacion;
    var id_volante = item.id_volante_pago;
    var mes = item.id_mes;
    var etapa = item.etapa;
    var quincena = parseFloat(item.quincena);
    var devengado = parseFloat(item.devengado);
    var deducido = formatoMoneda (parseFloat(item.deduccion)); 
    TotalDevegado = formatoMoneda (quincena+devengado);
    if(mes.length < 2){
        mes = '0'+ mes;
    }
    
    if(etapa == 1){
        var FechaInicial = '01/'+mes+'/'+item.año
        var FechaFinal = '15/'+mes+'/'+item.año
    }else{
        var FechaInicial = '16/'+mes+'/'+item.año
        var FechaFinal = '30/'+mes+'/'+item.año
    }
    
    $('#NombreEmpleado').html(usuario);
    $('#identificacion').html('Super administrador');
    let valorNeto = formatoMoneda(parseFloat(item.total_neto));
    var FilaVolante = '';
    FilaVolante +='<tr>';
    FilaVolante +='<td>'+Identificacion+'</td>';
    FilaVolante +='<td>'+item.empresa+'</td>';
    FilaVolante +='<td>'+item.nombreMes+'</td>';
    FilaVolante +='<td>'+FechaInicial+' - '+FechaFinal+'</td>';
    FilaVolante +='<td>'+TotalDevegado+'</td>'
    FilaVolante +='<td>'+deducido+'</td>'
    FilaVolante +='<td> $'+valorNeto+'</td>';
    FilaVolante +='<td>'
    FilaVolante +='<button class="abrir-pdf btn btn-secondary m-1" data-id="'+ id_volante +'"><i class="far fa fa-print"></i></button>';
    FilaVolante +='<button class="btn btn-danger" data-id="'+ id_volante +'"><i class="far fa fa-trash"></i></button>';
    FilaVolante +='</td>'
    FilaVolante +='</tr>';
    return FilaVolante; 
}

$('.abrir-pdf').hover(function(){
    $(this).val("Print");
});

//Abrir pdf
$(document).on('click','.abrir-pdf',function(e){
    e.preventDefault();
    var id = $(this).data('id');
    window.location.href='../componentes/Reporte/reporte.php?id='+id;

})


// Cambiar el formato string a moneda 
function formatoMoneda(valor) {
    // Convertir el string a un número float
    let valorConvertir = parseFloat(valor);

    // Formatear el número como moneda
    let formato = new Intl.NumberFormat('es-ES', {
        style: 'currency',
        currency: 'COP'
    });

    return formato.format(valorConvertir);
}