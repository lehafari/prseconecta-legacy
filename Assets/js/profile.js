const formPerfil = document.querySelector("#form-perfil");
const socialmediaform = document.querySelector("#socialmediaform");
const formChangePassword = document.querySelector("#form-change-password");
const foto = document.querySelector("#foto");
const delPhoto = document.querySelector(".delPhoto");
const formImagen = document.querySelector("#form-imagen-perfil");
const btnSubmitPhoto = document.querySelector("#btnSubmitPhoto");

const configTinyMCE = {
  selector: "#sobremi",
  width: "100%",
  height: 300,
  statubar: true,
  encoding: "UTF-8",
  plugins: [
    "advlist autolink link lists charmap hr pagebreak",
    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime nonbreaking",
    "table contextmenu directionality paste textcolor",
  ],
  entity_encoding: "raw",
  end_container_on_empty_block: true,
  toolbar_mode: "sliding",
  toolbar: `undo redo | bold italic underline | fontselect fontsizeselect formatselect | 
    alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist checklist | 
    forecolor backcolor | fullscreen  |  link anchor`,
};

tinymce.init(configTinyMCE);

document.addEventListener("DOMContentLoaded", function () {
  $(".selectpicker").selectpicker("render");

  if (foto) {
    foto.addEventListener("change", onChangePhoto);

    if (btnSubmitPhoto)
      btnSubmitPhoto.addEventListener("click", function () {
        foto.click();
      });
  }

  if (delPhoto) {
    delPhoto.onclick = function (e) {
      removePhoto();
    };
  }

  // Actualizar Perfil
  if (formPerfil) {
    formPerfil.onsubmit = function (e) {
      e.preventDefault();
      const nombre = this.firstname.value;
      const apellido = this.lastname.value;
      const email = this.email.value;
      const usuario = this.username.value;

      if (nombre.trim() === "" || apellido.trim() === "") {
        swal("Hey!", "Nombre y apellido son obligatorios", "error");
        return;
      }

      if (usuario.trim() === "") {
        swal("Hey!", "El nombre de usuario es requerido", "error");
        return;
      }

      if (email.trim() === "") {
        swal("Hey!", "El correo no puede estar vacío", "error");
        return;
      } else if (!validateEmail(email.trim())) {
        swal(
          "Hey!",
          "El correo no es válido, por favor introduce un correo correcto.",
          "error"
        );
        return;
      }

      tinyMCE.triggerSave();

      function fntSuccess({ msg }) {
        location.reload();
      }
      ajax("/perfil/putPerfil", "POST", this, fntSuccess);
    };
  }

  // Actualizar Redes sociales

  if (socialmediaform) {
    socialmediaform.addEventListener("submit", function (e) {
      e.preventDefault();

      function fntSuccess({ msg }) {
        swal("", msg, "success");
      }
      ajax("/perfil/socialmediaInsert", "POST", this, fntSuccess);
    });
  }

  if (formChangePassword) {
    formChangePassword.onsubmit = function (e) {
      e.preventDefault();

      const password = this.password.value;
      const passwordConfirm = this.passwordconfirm.value;

      if (password.trim().length < 4) {
        swal(
          "Hey!",
          "La contraseña debe ser mayor o igual a 5 caracteres",
          "error"
        );
        return;
      } else {
        if (passwordConfirm.trim() !== password.trim()) {
          swal(
            "Hey!",
            "La contraseña debe ser igual a confirmar contraseña",
            "error"
          );
          return;
        }
      }

      const url = "/perfil/changePassword";

      function fntSuccess({ msg }) {
        swal("", msg, "success");
        formChangePassword.reset();
      }

      ajax(url, "POST", this, fntSuccess);
    };
  }
});

function deleteAccount() {
  swal({
    text: 'Para eliminar tu cuenta debes escribir: "Eliminar mi cuenta"',
    content: "input",
    showCancelButton: true,
    closeOnConfirm: false,
    animation: "slide-from-top",
    confirmButtonText: "Si, borrar",
    dangerMode: true,
    buttons: true,
  }).then((inputValue) => {
    if (inputValue === null) return false;

    if (inputValue !== "Eliminar mi cuenta") {
      swal(
        "",
        '¡Necesitas escribir "Eliminar mi cuenta" para eliminar!',
        "error"
      );
      return false;
    }
    const url = "/perfil/deleteAccount";
    function fntSucces({ msg }) {
      alert(msg);
      window.location = base_url + "/logout";
    }

    ajax(url, "POST", "action=eliminar", fntSucces);
  });
}

function removePhoto() {
  const url = "/perfil/delImgProfile";
  let formData = new FormData();
  const fotoActual = document.querySelector("#foto_actual").value;
  formData.append("fotoActual", fotoActual);

  function fntSuccess({ msg }) {
    swal({
      title: "",
      text: msg,
      icon: "success",
      confirmButton: "Aceptar",
      closeOnConfirm: false,
      closeOnClickOutside: false,
      closeOnEsc: false,
      allowOutsideClick: false,
      allowEscapeKey: false,
    }).then(() => (window.location = base_url + "/perfil"));
  }

  ajax(url, "POST", formData, fntSuccess);
}

function onChangePhoto(e) {
  const uploadFoto = document.querySelector("#foto").value;
  const fileimg = document.querySelector("#foto").files;
  const contactAlert = document.querySelector("#form_alert");
  if (uploadFoto != "") {
    const type = fileimg[0].type;
    if (type !== "image/jpeg" && type !== "image/jpg" && type !== "image/png") {
      contactAlert.innerHTML =
        '<p class="errorArchivo">El archivo no es válido.</p>';
      return false;
    } else {
      const url = "/perfil/changeprofile/";
      function fntSucces({ msg }) {
        swal({
          title: "",
          text: msg,
          icon: "success",
          confirmButton: "Aceptar",
          closeOnConfirm: false,
          closeOnClickOutside: false,
          closeOnEsc: false,
          allowOutsideClick: false,
          allowEscapeKey: false,
        }).then(() => (window.location = base_url + "/perfil"));
      }
      ajax(url, "POST", formImagen, fntSucces);
    }
  } else {
    swal("No se seleccionó foto", "", "error");
  }
}
