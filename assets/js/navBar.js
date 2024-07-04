
$(document).ready(function(){
    validarPerfil();
})
$(document).on('click', '.menu-icon', function() {
    $('nav').toggleClass('open');
});


$(document).on('click','.overlay',function(){
    $('nav').removeClass('open');
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
                actualizarNavbar(perfil);
            }else{
                window.location.href='Login.php';
            }
        },
        error:function(){
            console.log('error de session')
        }
    });
}

function actualizarNavbar(perfil){
    if(perfil != 1){
        $('.super-admin').hide();
    }
}

$('#salir').on('click',function(){
    $.ajax({
        url:'../modelos/session.php',
        method:'GET',
        data:{action:'CerrarSesion'},
        dataType:'json',
        success: function(response){
            if(response.exit){
                let timerInterval;
            Swal.fire({
              title: "Cerrando session",
              icon: "success",
              html: "Cargando....",
              timer: 1500,
              timerProgressBar: true,
              didOpen: () => {
                Swal.showLoading();
                timerInterval = setInterval(() => {
                  timer.textContent = `${Swal.getTimerLeft()}`;
                }, 100);
              }
            }).then(() =>{
              window.location.href='Login.php';
            });

            }
        },
        error:function(){
            console.log('error de session')
        }
    });
})