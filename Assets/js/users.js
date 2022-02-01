let tableUsuarios;
let rowTable = "";
const formUsuario = document.querySelector("#formUsuarios");
const formPerfil = document.querySelector("#form-perfil");
const formChangePassword = document.querySelector("#form-change-password");
const foto = document.querySelector("#foto");
const delPhoto = document.querySelector(".delPhoto");
const formImagen = document.querySelector("#form-imagen-perfil");
const btnSubmitPhoto = document.querySelector("#btnSubmitPhoto");
document.addEventListener("DOMContentLoaded", () => {
  if (document.querySelector("#tableUsuarios")) {
    const urlData = "/users/getUsuarios";
    const columns = [
      { data: "idpersona" },
      { data: "nombres" },
      { data: "apellidos" },
      { data: "email_user" },
      { data: "telefono" },
      { data: "nombrerol" },
      { data: "status", className: "text-center" },
      { data: "options" },
    ];
    tableUsuarios = getDataTable("#tableUsuarios", urlData, columns);
  }

  if (formUsuario) {
    formUsuario.onsubmit = function (e) {
      e.preventDefault();
      const nombre = this.nombre.value;
      const apellido = this.apellido.value;
      const email = this.email.value;
      const telefono = this.telefono.value;
      const status = this.listStatus.value;
      const idusuario = this.idUsuario.value;
      const password = this.password.value;

      if (nombre.trim() === "" || apellido.trim() === "") {
        swal("Hey!", "First Name and Last Name are required.", "error");
        return;
      }

      if (email.trim() === "") {
        swal("Hey!", "Email is required.", "error");
        return;
      } else if (!validateEmail(email.trim())) {
        swal("Hey!", "The email is not valid.", "error");
        return;
      }

      if (password.trim() === "" && idusuario.trim() === "") {
        swal("Hey!", "The password cannot be empty.", "error");
        return;
      } else if (password.length < 5 && idusuario.trim() === "") {
        swal(
          "Hey!",
          "The password must be greater than 4 characters.",
          "error"
        );
        return;
      }

      if (status.trim() === "") {
        swal("Hey!", "The state cannot be empty.", "error");
        return;
      }

      function fntSuccess({ msg }) {
        if (rowTable == "") {
          tableUsuarios.ajax.reload();
        } else {
          const htmlStatus =
            status == 1
              ? '<span class="badge badge-success">Active</span>'
              : '<span class="badge badge-danger">Inactive</span>';
          rowTable.cells[1].textContent = nombre;
          rowTable.cells[2].textContent = apellido;
          rowTable.cells[3].textContent = email;
          rowTable.cells[4].textContent = telefono;
          rowTable.cells[5].textContent =
            document.querySelector("#listRolid").selectedOptions[0].text;
          rowTable.cells[6].innerHTML = htmlStatus;
        }
        $("#modalFormUsuario").modal("hide");
        formUsuario.reset();
        swal("Users", msg, "success");
      }

      const url =
        idusuario.trim() === "" ? "/users/nuevoUsuario" : "/users/setUsuario";
      ajax(url, "POST", this, fntSuccess);
    };
  }

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

      if (nombre.trim() === "" || apellido.trim() === "") {
        swal("Hey!", "First Name and Last Name are required", "error");
        return;
      }

      if (email.trim() === "") {
        swal("Hey!", "Email is required", "error");
        return;
      } else if (!validateEmail(email.trim())) {
        swal(
          "Hey!",
          "The email is not valid, please enter a valid email",
          "error"
        );
        return;
      }

      function fntSuccess({ msg }) {
        swal({
          title: "",
          text: msg,
          icon: "success",
          confirmButtonText: "Accept",
          closeOnConfirm: false,
          closeOnClickOutside: false,
          closeOnEsc: false,
          allowOutsideClick: false,
          allowEscapeKey: false,
        }).then(() => location.reload());
      }
      ajax("/users/putPerfil", "POST", this, fntSuccess);
    };
  }

  if (formChangePassword) {
    formChangePassword.onsubmit = function (e) {
      e.preventDefault();

      const password = this.password.value;
      const passwordConfirm = this.passwordconfirm.value;

      if (password.trim().length < 4) {
        swal(
          "Hey!",
          "The password must be greater than 4 or equal to 5 characters",
          "error"
        );
        return;
      } else {
        if (passwordConfirm.trim() !== password.trim()) {
          swal("Hey!", "The password must equal to confirm password", "error");
          return;
        }
      }

      const url = "/users/changePassword";

      function fntSuccess({ msg }) {
        swal("", msg, "success");
        formChangePassword.reset();
      }

      ajax(url, "POST", this, fntSuccess);
    };
  }
});

function viewInfo(idpersona) {
  function fntSuccess({ data }) {
    const {
      status,
      nombres,
      apellidos,
      telefono,
      email_user,
      nombrerol,
      fechaRegistro,
    } = data;
    const estadoUsuario =
      status == 1
        ? '<span class="badge badge-success">Active</span>'
        : '<span class="badge badge-danger">Inactive</span>';
    document.querySelector("#celNombre").innerHTML = nombres;
    document.querySelector("#celApellido").innerHTML = apellidos;
    document.querySelector("#celTelefono").innerHTML = telefono;
    document.querySelector("#celEmail").innerHTML = email_user;
    document.querySelector("#celTipoUsuario").innerHTML = nombrerol;
    document.querySelector("#celEstado").innerHTML = estadoUsuario;
    document.querySelector("#celFechaRegistro").innerHTML = fechaRegistro;
    $("#modalViewUser").modal("show");
  }

  ajax("/Users/getUsuario/" + idpersona, "GET", "", fntSuccess);
}

function editInfo(element, idpersona) {
  function fntSuccess({ data }) {
    changeSettingsModal("UPDATE", "Update user");
    rowTable = element.parentNode.parentNode.parentNode;

    const { nombres, apellidos, email_user, telefono, idrol, status } = data;

    formUsuario.idUsuario.value = idpersona;
    formUsuario.nombre.value = nombres;
    formUsuario.apellido.value = apellidos;
    formUsuario.email.value = email_user;
    formUsuario.telefono.value = telefono;
    formUsuario.listRolid.value = idrol;
    formUsuario.listStatus.value = status;

    $("#listRolid").selectpicker("render");
    $("#listStatus").selectpicker("render");
    $("#modalFormUsuario").modal("show");
  }

  ajax(`/Users/getUsuario/${idpersona}`, "GET", "", fntSuccess);
}

function delInfo(idpersona) {
  sweetAlertEliminar({
    title: "Delete User",
    text: "Do you really want to remove the user?",
    fnt() {
      const data = "idUsuario=" + idpersona;
      const url = "/Users/delUsuario";

      function fntSuccess({ msg }) {
        swal("Eliminar!", msg, "success");
        tableUsuarios.ajax.reload();
      }
      ajax(url, "POST", data, fntSuccess);
    },
  });
}

function openModal() {
  rowTable = "";
  document.querySelector("#idUsuario").value = "";
  changeSettingsModal("NEW", "Nuevo Usuario");
  document.querySelector("#formUsuarios").reset();
  $(".selectpicker").selectpicker("render");
  $("#modalFormUsuario").modal("show");
}

function openModalPerfil() {
  $("#modalFormPerfil").modal("show");
}

function removePhoto() {
  const url = "/users/delImgProfile";
  let formData = new FormData();
  const fotoActual = document.querySelector("#foto_actual").value;
  formData.append("fotoActual", fotoActual);

  function fntSuccess({ msg }) {
    swal({
      title: "",
      text: msg,
      icon: "success",
      confirmButton: "Accept",
      closeOnConfirm: false,
      closeOnClickOutside: false,
      closeOnEsc: false,
      allowOutsideClick: false,
      dangerMode: true,
      allowEscapeKey: false,
    }).then(() => (window.location = base_url + "/users/profile"));
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
        '<p class="errorArchivo">The file is not valid.</p > ';
      return false;
    } else {
      const url = "/users/changeprofile/";
      function fntSucces({ msg }) {
        swal({
          title: "",
          text: msg,
          icon: "success",
          confirmButton: "Accept",
          closeOnConfirm: false,
          closeOnClickOutside: false,
          closeOnEsc: false,
          allowOutsideClick: false,
          allowEscapeKey: false,
        }).then(() => (window.location = base_url + "/users/profile"));
      }
      ajax(url, "POST", formImagen, fntSucces);
    }
  } else {
    swal("No photo selected", "", "error");
  }
}

function deleteAccount() {
  swal({
    title: "Hey! watch out",
    text: 'To delete you have to write: "delete account"',
    content: "input",
    icon: "warning",
    showCancelButton: true,
    closeOnConfirm: false,
    animation: "slide-from-top",
    confirmButtonText: "Yes, delete",
  }).then(function (inputValue) {
    if (inputValue === null) return false;

    if (inputValue !== "delete account") {
      swal.showInputError('You need to write "delete account" to delete!');
      return false;
    }
    const url = "/users/deleteAccount";
    function fntSucces({ msg }) {
      swal({
        title: "",
        text: msg,
        icon: "success",
        confirmButton: "Ok",
        closeOnConfirm: false,
        closeOnClickOutside: false,
        closeOnEsc: false,
        allowOutsideClick: false,
        allowEscapeKey: false,
      }).then(() => (window.location = base_url + "/logout?redirect=admin"));
    }

    ajax(url, "POST", "action=eliminar", fntSucces);
  });
}
