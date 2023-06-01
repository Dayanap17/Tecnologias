function enviarDocumento(idPregunta) {
  console.log(idPregunta);
  var formData = new FormData();
  span = $(`#pregunta${idPregunta}`).prev();
  var file = $(`#pregunta${idPregunta}`)[0].files[0];

  var usuario = JSON.parse(sessionStorage.getItem("session"));
  formData.append("file", file);
  formData.append("idusuario", usuario.id);
  formData.append("nopregunta", idPregunta.toString());

  $.ajax({
    url: "http://localhost/tecnologia/api/events/upload.php",
    type: "post",
    data: formData,
    contentType: false,
    processData: false,
  })
    .done(function (data) {
      console.log(data)
      res = JSON.parse(data);
      swal(res.message, res.body, res.foot);
      span[0].parentNode.classList.add("Enviado");
    })
    .fail(function (data) {
      res = JSON.parse(data.responseText);
      swal(res.message, res.body, res.foot);
      span[0].parentNode.classList.add("ERROR");
    });
  
}
