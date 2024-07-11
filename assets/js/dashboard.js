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
            TblDashboard(response);
        },
        error:function(){
            console.log('error de session')
        }
    });
}

function TblDashboard(response){
    $.ajax({
        url:"../modelos/tblDashboard.php",
        type:"POST",
        data:{action:'TblDashboardNomina'},
        dataType:'json',
        success: function(data){
            var data = data.volantes;          
            if(data&&data.length > 0 ){
                var FilaVolante = '';
                $.each(data,function(index,item){
                     FilaVolante += PintarTblDashboardAdmin(index,item,response)
                    
                });
                $('#tblDashboardVolantes').html(FilaVolante);
                dataTablesNomina();
                
            }
        }
    })
}

function dataTablesNomina(){
    new DataTable('#tblDashboard',{
        responsive: true,
        columnDefs: [
            { responsivePriority: 1, targets: 0 },
            { responsivePriority: 10001, targets: 2 },
            { responsivePriority: 2, targets: -5 }
        ],
        language:{
            url:'https://cdn.datatables.net/plug-ins/2.0.8/i18n/es-ES.json'
        },
        
        layout: {
            topStart: {
                pageLength: {
                    menu: [ 5, 10, 25, 50, 100 ],

                }
            },
        }


    });
}

//Funcion pintar tabla de volantes para el admin
function PintarTblDashboardAdmin(index,item,response){
    var id_volante = item.id_volante_pago;
    var mes = item.id_mes;
    var etapa = item.etapa;
    var quincena = parseFloat(item.quincena);
    var devengado = parseFloat(item.devengado);
    var deducido = formatoMoneda (parseFloat(item.deduccion)); 
    TotalDevegado = formatoMoneda (quincena+devengado);
    //concatenar fechas 
    if(mes.length < 2){
        mes = '0'+ mes;
    }  
    if(etapa == 1){
        var FechaInicial = '01/'+mes+'/'+item.año
        var FechaFinal = '15/'+mes+'/'+item.año
    }else{
        var FechaInicial = '16/'+mes+'/'+item.año
        var FechaFinal = '30/'+mes+'/'+item.año
    };
    //////////////////////
    $('#NombreEmpleado').html(response.nombreUsuario);
    $('#identificacion').html(response.usuario);
    if(response.profile == 1){
        $('#perfil').html('Super administrador');
    }else{
        $('#perfil').html('Usuario Estandar');
    }
    let valorNeto = formatoMoneda(parseFloat(item.total_neto));
    var FilaVolante = '';
    FilaVolante +='<tr>';
    FilaVolante +='<td>'+item.nombres_empleados+'</td>';
    FilaVolante +='<td>'+item.empresa+'</td>';
    FilaVolante +='<td>'+item.nombreMes+'</td>';
    FilaVolante +='<td>'+FechaInicial+' - '+FechaFinal+'</td>';
    FilaVolante +='<td>'+TotalDevegado+'</td>'
    FilaVolante +='<td>'+deducido+'</td>'
    FilaVolante +='<td> $'+valorNeto+'</td>';
    FilaVolante +='<td>'
    FilaVolante +='<button class="abrir-pdf btn btn-secondary" data-id="'+ id_volante +'"><i class="far fa fa-print"></i></button>';
    if(response.profile == 1){
        FilaVolante +='<button class=" btn btn-danger" data-id="'+ id_volante +'"><i class="far fa fa-trash"></i></button>';
    }
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