$(document).ready(function() {
  ObtenerEmpresas();
  TipoIdentificacion();
  Perfiles();  
});

function enviarFormularioPorAjax(formSelector, url, action) {
  $(formSelector).submit(function(e) {
      e.preventDefault(); 
      var formData = $(this).serialize(); 
      formData += `&action=${action}`; 
    
      $.ajax({
          url: url,
          type: 'POST',
          data: formData,
          dataType: 'json', 
          success: function(response) {
              if (response.success) {
                Swal.fire({
                    text: response.success,
                    icon: "success"
                  }).then(()=>{
                    window.location.reload();
                  });
            
              } else {
                  // Manejar respuesta de error
                  alert(response.error);
              }
          },
          error: function(xhr, status, error) {
              console.error('Error en la solicitud AJAX:', error);
              console.log(xhr.responseText); 
              alert('Error en la solicitud AJAX: ' + error);
          }
      });
  });
}

//Enviar Crear Formulario 
enviarFormularioPorAjax('#frmCrearEmpleado', '../modelos/EmpleadoFunction.php','Crear');
