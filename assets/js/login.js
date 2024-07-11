$(document).ready(function() {
  validarPerfil()  
  ObtenerEmpresas();

});

function validarPerfil(){
  $.ajax({
      url:'../modelos/session.php',
      method:'GET',
      data:{action:'validarSesion'},
      dataType:'json',
      success: function(response){
          const perfil = response.profile;
          if(perfil){
            window.location.href='Dashboard.php';
          }
      },
      error:function(){
          console.log('error de session')
      }
  });
}

$('#selectEmpresas').on('change', function(){
    let empresa = $(this).val();
    var url = "../assets/img/empresa"+empresa+".png";
    $("#logoLogin").attr("src",url);
    $("#headerLogo").attr("src",url);

})


$('.btn-login').on('click', function(e){
    e.preventDefault();
    let empresa =$('#selectEmpresas').val();
    let usuario = $('#usuario').val();
    let password = $('#passwords').val();
    $.ajax({
        url:'../modelos/login.php',
        type: 'POST',
        data:{
          empresa:empresa,
          usuario:usuario,
          password:password,
          action:'login'
        },
        success:function(response){
          const data = JSON.parse(response)
          if(data.success){  
            let timerInterval;
            Swal.fire({
              title: "Inicio exitoso",
              html: "Cargando....",
              icon: "success",
              timer: 2000,
              timerProgressBar: true,
              didOpen: () => {
                Swal.showLoading();
                timerInterval = setInterval(() => {
                  timer.textContent = `${Swal.getTimerLeft()}`;
                }, 100);
              }
            }).then(() =>{
              window.location.href='Dashboard.php';
            });
          console.log(data)
          }else{
            Swal.fire({
              customClass:{
                confirmButton:'swalBtnColor'
              },
              text: data.message,
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
})


$("#show-pass").change(function(){
  if(this.checked){
    $('#passwords').attr('type','text');
  }else{
    $('#passwords').attr('type','password');
  }
})