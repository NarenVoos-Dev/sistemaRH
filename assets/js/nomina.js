$(document).ready(function() {
    ObtenerEmpleado();
    ObtenerEmpresas();
    TipoIdentificacion();
    Perfiles();
    ObtenerAño();
    ObtenerMeses();
    ObtenerMotivos();
   

});

function ObtenerEmpleado() {
    $.ajax({
      url: "../modelos/Empleados.php",
      type: "GET",
      data:{action:'ObtenerEmpleados'},
      success: function (data) {
        try {
          data = JSON.parse(data);
        } catch (e) {
          console.error("Error al parsear datos como JSON: " + e);
          return;
        }
        
        DatosEmpleado(data);
        if (Array.isArray(data)) {
          const $selectEmpleado = $("#selectEmpleado");
          $selectEmpleado.empty();
          $selectEmpleado.append(
            '<option value="0">SELECCIONA UN EMPLEADO</option>'
          );
          data.forEach(function (item) {
            nombreEmpleado = item.Nombres_empleados.toUpperCase();
            idEmpleado = item.id_empleados.toUpperCase();
            $selectEmpleado.append(
              '<option value="' +idEmpleado +'">'+nombreEmpleado +"</option>"
            );
          });
        } else {
          console.error("Los datos recibidos no son un array.");
        }
      },
      error: function (xhr, status, error) {
        console.error("Error al obtener datos: " + error);
      },
    });
  }


  function DatosEmpleado (data){
    $('#selectEmpleado').on('change', function() {
      var empleado = $(this).val();
      
      data.forEach(function(item) {
        var idEmpleado = item.id_empleados;
        var salario_empleado = parseFloat(item.salario_empleado);
        var Quincena = (item.salario_empleado/2)
        if (empleado == idEmpleado) {
          $('#selectEmpresas').val(item.id_empresa_empleado).prop('disabled', true);
          $('#tipoDocumento').val(item.id_tipoDocumento_empleado).prop('disabled', true);
          $('#numeroDocumento').val(item.identificacion_empleado).prop('disabled', true);
          $('#Perfiles').val(item.id_cargo_empleado).prop('disabled', true);
          $('#salarioEmpleado').val(salario_empleado.toFixed(2)).prop('disabled', true);
          $('#id_empleado').val(item.id_empleados).prop('disable',true);
          $('#Quincena').val(Quincena.toFixed(2));
          TotalNomina();
        }
      });
    });
    
  }
  
let jsonObject = new Array();
//funcion para agregar devengados
$('#CrearDevengado').submit(function(e){
  e.preventDefault();
  var idMotivo = $('#selectMotivoDevengado').val()
  var DescripcionMotivo = $('#DescripMotivo').val();
  var ValorDevengado = $('#ValorDevengado').val();

  if(ValorDevengado!=''){
    jsonObject.push({
      idMotivo:idMotivo,
      DescripcionMotivo: DescripcionMotivo,
      ValorDevengado:ValorDevengado,    
    });
    $('#DescripMotivo').val('');
    $('#ValorDevengado').val('');
  }else{
    alert('Valor devengado no ingresado')
  }
 // let jsonString = JSON.stringify(jsonObject); 
  TblDevengados(jsonObject)
  
})

//funcion tabla devengados aqui mostramos la informacion que se 
//agrega de la funcion anterior
function TblDevengados(jsonObject){
  if(jsonObject && jsonObject.length > 0){
    var tablaFilaDevengadoHTML = '';
    var totalDevengado=0;
    $.each(jsonObject, function(index, datos){
      tablaFilaDevengadoHTML += PintarTblDevengados(index,datos);
      totalDevengado += parseFloat(datos.ValorDevengado);
    });
    $('#tblDevengados #FilaDevengado').html(tablaFilaDevengadoHTML);

    $('#TotalDevengado ').val(totalDevengado.toFixed(2));
  }

  TotalNomina();
}


let jsonObjectDed = new Array(); //ARREGLO PARA INGRESAR LOS DEDUCCIONES
//Funcion para agregar deducido
$('#CrearDeduccido').submit(function(e){
  e.preventDefault();
  var DescripcionMotivo = $('#DescripMotivoDeduccion').val();
  var ValorDeducido = $('#ValorDeducido').val();
  var idMotivoded = $('#selectMotivoDeduccion').val()
  if(ValorDeducido!=''){
    jsonObjectDed.push({
      idMotivo:idMotivoded,
      DescripcionMotivo: DescripcionMotivo,
      ValorDeducido:ValorDeducido,    
    });
    $('#DescripMotivoDeduccion').val('');
    $('#ValorDeducido').val('');
  }else{
    alert('Valor deducido no ingresado');
  }
  TblDeducidos(jsonObjectDed);
})

//agrega de la funcion anterior
function TblDeducidos(jsonObjectDed){
  console.log(jsonObjectDed);
  if(jsonObjectDed && jsonObjectDed.length > 0){
    var tablaFilaDeduccionHTML = '';
    var totalDeducido=0;
    $.each(jsonObjectDed, function(index, datos){
      tablaFilaDeduccionHTML += PintarTblDeduccion(index,datos);
      totalDeducido += parseFloat(datos.ValorDeducido);
    });
    $('#tblDevengados #FilaDeduccion').html(tablaFilaDeduccionHTML);

    $('#TotalDeducido').val(totalDeducido.toFixed(2));
  }
  TotalNomina();
}

//funcion para pintar la Fila de devengados en el HTML
function PintarTblDevengados(index,datos){
  var tablaFilaDevengadoHTML = '';
  tablaFilaDevengadoHTML +='<tr>';
  tablaFilaDevengadoHTML +='<td>'+datos.DescripcionMotivo+'</td>';
  tablaFilaDevengadoHTML +='<td></td>';
  tablaFilaDevengadoHTML +='<td>'+datos.ValorDevengado+'</td>';
  tablaFilaDevengadoHTML +='<td><a href ="#">Quitar</a></td>';
  tablaFilaDevengadoHTML +='</tr>';
  return tablaFilaDevengadoHTML;

}
//funcion para pintar la Fila de deducidos en el HTML
function PintarTblDeduccion(index,datos){

  var tablaFilaDeduccionHTML = '';
  tablaFilaDeduccionHTML +='<tr>';
  tablaFilaDeduccionHTML +='<td>'+datos.DescripcionMotivo+'</td>';
  tablaFilaDeduccionHTML +='<td>'+datos.ValorDeducido+'</td>';
  tablaFilaDeduccionHTML +='<td></td>';
  tablaFilaDeduccionHTML += '<td><a href="#" class="quitar" id="">Quitar</a></td>';
  tablaFilaDeduccionHTML +='</tr>';
  return tablaFilaDeduccionHTML;

}
//FUNCION PARA EL TOTAL DE LA NOMINA
function TotalNomina() {
  Devengado = parseFloat($('#TotalDevengado').val());
  Deducido = parseFloat($('#TotalDeducido').val());
  Quincena = parseFloat($('#Quincena').val());
  var totalNomina = $('#TotalNomina').val();
  totalNomina =(Quincena+Devengado) - Deducido;
  $('#TotalNomina').val(totalNomina.toFixed(2));
  return totalNomina;
}


$('#GuardarVolante').click(function(){
  var idEmpleado = $('#id_empleado').val();
  var Quincena = $('#Quincena').val();
  var totalDevengado = $('#TotalDevengado').val();
  var totalDeducido = $('#TotalDeducido').val();
  var totalNomina = $('#TotalNomina').val();
  var año = $('#selectAño').val();
  var mes = $('#selectMes').val();
  var periodo =$('#selectPeriodo').val()
  var action ='GuardarVolante';
  $.ajax({
      url:'../modelos/Nomina.php',
      method: 'POST',
      data:{
        idEmpleado:idEmpleado,
        Quincena:Quincena,
        totalDevengado:totalDevengado,
        totalDeducido:totalDeducido,
        totalNomina:totalNomina,
        año:año,
        mes:mes,
        periodo:periodo,
        action:action
      },
      dataType: 'json',
      success:function(response){
        if(response.success){
          registrarDetalles(response.volanteId);
        }else{
          alert(response.error);
        }
      },
      error:function(xhr,status,error){
        console.error('Error en la solicitud AJAX:', error)
        console.log(xhr.responseText); 
        alert('Error en la solicitud AJAX: ' + error);
      }

    });
});


function registrarDetalles(respuesta){
  var IdVolante = respuesta;
  var idEmpleado = $('#id_empleado').val();
  $.ajax({
    url:'../modelos/Nomina.php',
    method: 'POST',
    data:{
      jsonStringDeduccion:JSON.stringify(jsonObjectDed),
      jsonStringDevengados:JSON.stringify(jsonObject),
      IdVolante:IdVolante,
      idEmpleado:idEmpleado,
      action:'registrarDetalles'
    },
    dataType: 'json',
    success:function(response){
      if(response.success){  
        Swal.fire({
          position: "center",
          icon: "success",
          title: response.success,
          showConfirmButton: false,
          timer: 1500
        }).then(() =>{
          window.location.reload();
        });


      }else{
        Swal.fire({
          text: response.error,
          icon: "error"
        });

      }
    },
    error:function(xhr,status,error){
      console.error('Error en la solicitud AJAX:', error)
      console.log(xhr.responseText); 
      alert('Error en la solicitud AJAX: ' + error);
    }
    

  });
}


