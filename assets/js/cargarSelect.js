//OBTENER EMPRESAS
function ObtenerEmpresas() {
    $.ajax({
      url: "../modelos/Empleados.php",
      type: "GET",
      data:{action:'ObtenerEmpresas'},
      success: function (data) {
        try {
          data = JSON.parse(data);
        } catch (e) {
          console.error("Error al parsear datos como JSON: " + e);
          return;
        }
        
        if (Array.isArray(data)) {
          const $selectEmpresas = $("#selectEmpresas");
          $selectEmpresas.empty();
          $selectEmpresas.append(
            '<option value="">Selecciona una empresa</option>'
          );
          data.forEach(function (item) {
            nombreEmpresa = item.nombre_empresa.toUpperCase();
            idEmpresa = item.id_empresa.toUpperCase();
            $selectEmpresas.append(
              '<option value="' +idEmpresa +'">'+nombreEmpresa +"</option>"
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
  
  // Obtener tipo de identificaicon 
  function TipoIdentificacion() {
    $.ajax({
      url: "../modelos/Empleados.php",
      type: "GET",
      data:{action:'TipoIdentificacion'},
      success: function (dataIdentificacion) {
        try {
          dataIdentificacion = JSON.parse(dataIdentificacion);
        } catch (e) {
          console.error("Error al parsear datos como JSON: " + e);
          return;
        }
        if (Array.isArray(dataIdentificacion)) {
          const $selectTipoDocumento = $("#tipoDocumento");
          $selectTipoDocumento.empty();
          $selectTipoDocumento.append(
            '<option value="">SELECCIONE TIPO DE DOCUMENTO</option>'
          );  
          dataIdentificacion.forEach(function (item) {
            tipoDocumento = item.nombreDocumento.toUpperCase();
            idDocumento = item.id_tipoDocumento.toUpperCase();
            iniDocumento = item.TD.toUpperCase();
            $selectTipoDocumento.append(
              '<option value="' +idDocumento +'">'+iniDocumento+" - "+tipoDocumento+"</option>"
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
  //Obtener Perfiles
  function Perfiles() {
    $.ajax({
      url: "../modelos/Empleados.php",
      type: "GET",
      data:{action:'Perfil'},
      success: function (dataPerfiles) {
        try {
          dataPerfiles = JSON.parse(dataPerfiles);
        } catch (e) {
          console.error("Error al parsear datos como JSON: " + e);
          return;
        }

        if (Array.isArray(dataPerfiles)) {
          const $selectPerfiles = $("#Perfiles");
          $selectPerfiles.empty();
          $selectPerfiles.append(
            '<option value=""> PERFIL O CARGO</option>'
          );
          dataPerfiles.forEach(function (item) {
            nombrePerfil = item.nombre_cargo.toUpperCase();
            idCargo = item.id_cargos.toUpperCase();
            $selectPerfiles.append(
              '<option value="' +idCargo +'">'+nombrePerfil +"</option>"
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
//Obtener Año
  function ObtenerAño() {
    $.ajax({
      url: "../modelos/Empleados.php",
      type: "GET",
      data:{action:'ObtenerAño'},
      success: function (data) {
        try {
          data = JSON.parse(data);
        } catch (e) {
          console.error("Error al parsear datos como JSON: " + e);
          return;
        }
        if (Array.isArray(data)) {
          const $selectAño = $("#selectAño");
          $selectAño.empty();
          $selectAño.append(
            '<option value="">SELECCIONA EL AÑO ACTUAL</option>'
          );
          data.forEach(function (item) {
            Año = item.año;
            idAño = item.id_año
            $selectAño.append(
              '<option value="' +idAño +'">'+Año +"</option>"
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
//Obtener Meses
function ObtenerMeses() {
  $.ajax({
    url: "../modelos/Empleados.php",
    type: "GET",
    data:{action:'ObtenerMes'},
    success: function (data) {
      try {
        data = JSON.parse(data);
      } catch (e) {
        console.error("Error al parsear datos como JSON: " + e);
        return;
      }
      if (Array.isArray(data)) {
        const $selectMes = $("#selectMes");
        $selectMes.empty();
        $selectMes.append(
          '<option value="">SELECCIONA EL MES ACTUAL</option>'
        );
        data.forEach(function (item) {
          Mes = item.nombreMes.toUpperCase();
          idMes = item.id_mes
          $selectMes.append(
            '<option value="' +idMes +'">'+Mes +"</option>"
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


//Obtener Motivos de deduccion o devengados
function ObtenerMotivos() {
  $.ajax({
    url: "../modelos/Empleados.php",
    type: "GET",
    data:{action:'ObtenerMotivos'},
    success: function (data) {
      try {
        data = JSON.parse(data);
      } catch (e) {
        console.error("Error al parsear datos como JSON: " + e);
        return;
      }
      
      if (Array.isArray(data)) {
        const $selectMotivoDevengado = $("#selectMotivoDevengado");
        const $selectMotivoDeduccion = $("#selectMotivoDeduccion");
        $selectMotivoDevengado.empty();
        $selectMotivoDeduccion.empty();
        $selectMotivoDevengado.append(
          '<option value="">SELECCIONE SU MOTIVO </option>'
        );
        $selectMotivoDeduccion.append(
          '<option value="">SELECCIONE SU MOTIVO </option>'
        );
        data.forEach(function (item) {
          nombreMotivo = item.nombreMotivo;
          id_motivos = item.id_motivos
          $selectMotivoDevengado.append(
            '<option value="' +id_motivos +'">'+nombreMotivo +"</option>"
          );
          $selectMotivoDeduccion.append(
            '<option value="' +id_motivos +'">'+nombreMotivo +"</option>"
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
//Ob