function auth() {
  let username = $("#correoLogin").val();
  let password = $("#contrasenaLogin").val();

  if (username == null || username == "") {
    swal("Incorrecto", "Debe ingresar un correo valido", "error");
  } else if (password == null || password == "") {
    swal("Incorrecto", "Debe ingresar una contraseña valida", "error");
  } else {
    let data = {
      username,
      password,
    };

    $.ajax({
      url: "http://localhost/tecnologia/api/events/login.php",
      type: "POST",
      data: JSON.stringify(data),
    })
      .done(function (data) {
        res = JSON.parse(data);
        console.log(res);
        sessionStorage.setItem("session", JSON.stringify(res.rol));
        swal({
          title: res.message,
          text: res.body,
          type: res.foot,
        }).then(() => {
          console.log(res.rol.rol);
          if (res.rol.rol == 1) {
            location.href = "http://localhost/tecnologia/menu_profesor.html";
          } else {
            location.href =
              "http://localhost/tecnologia/menu_centro_de_investigacion.html";
          }
        });
      })
      .fail(function (data) {
        res = JSON.parse(data.responseText);
        swal(res.message, res.body, res.foot);
      });
  }
}

function logout() {
  sessionStorage.clear();
  location.href = "http://localhost/tecnologia";
}

function signin() {
  let username = $("#correoSignIn").val();
  let password = $("#contrasenaSignIn").val();
  let rol = $("#selectSignIn").val();

  if (username == null || username == "") {
    swal("Incorrecto", "Debe ingresar un correo valido", "error");
  } else if (password == null || password == "") {
    swal("Incorrecto", "Debe ingresar una contraseña valida", "error");
  } else if (rol == null || rol == "") {
    swal("Incorrecto", "Debe ingresar un rol valido", "error");
  } else {
    let data = {
      username,
      password,
      rol,
    };
    $.ajax({
      url: "http://localhost/tecnologia/api/events/signin.php",
      type: "POST",
      data: JSON.stringify(data),
    })
      .done(function (data) {
        res = JSON.parse(data);
        console.log("Guardo Exitosamente",res);
        swal(res.message, res.body, res.foot);
      })
      .fail(function (data) {
        res = JSON.parse(data.responseText);
        swal(res.message, res.body, res.foot);
      });
  }
}
