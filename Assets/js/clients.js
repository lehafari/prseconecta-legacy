let tableClients;
const formClientes = document.querySelector("#formClientes");
const formChangePassword = document.querySelector("#form-change-password");
const foto = document.querySelector("#foto");
const delPhoto = document.querySelector(".delPhoto");
const formImagen = document.querySelector("#form-imagen-perfil");
const btnSubmitPhoto = document.querySelector("#btnSubmitPhoto");
document.addEventListener("DOMContentLoaded", function (e) {
  if (document.querySelector(".selectpicker")) {
    $(".selectpicker").selectpicker("render");
  }

  if (document.querySelector("#tableClients")) {
    const urlData = "/clients/getClients";
    const columns = [
      { data: "idpersona" },
      { data: "imagen" },
      { data: "usuario" },
      { data: "nombres" },
      { data: "apellidos" },
      { data: "email_user" },
      { data: "status", className: "text-center" },
      { data: "options" },
    ];
    tableClients = getDataTable("#tableClients", urlData, columns);
  }

  if (formClientes) {
    formClientes.onsubmit = function (e) {
      e.preventDefault();
      const nombre = this.nombre.value;
      const apellido = this.apellido.value;
      const email = this.email.value;
      const telefono = this.telefono.value;
      const status = this.listStatus.value;
      const idClient = this.idClient.value;

      let password;
      if (this.password) {
        password = this.password.value;
      }
      const username = this.username.value;

      if (username.trim() === "") {
        swal("Hey!", "Username is required.", "error");
        return;
      }

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

      if (idClient.trim() === "") {
        if (password.trim() === "") {
          swal("Hey!", "The password cannot be empty.", "error");
          return;
        } else if (password.length < 5) {
          swal(
            "Hey!",
            "The password must be greater than 4 characters.",
            "error"
          );
          return;
        }
      }

      if (status.trim() === "") {
        swal("Hey!", "The state cannot be empty.", "error");
        return;
      }

      function fntSuccess({ msg }) {
        if (idClient.trim() === "") {
          tableClients.ajax.reload();
          $("#modalFormClientes").modal("hide");
          formClientes.reset();
        }
        swal("Clients", msg, "success");
      }

      const url =
        idClient.trim() === "" ? "/Clients/insert" : "/Clients/update";
      ajax(url, "POST", this, fntSuccess);
    };
  }

  if (formChangePassword) {
    formChangePassword.addEventListener("submit", function (e) {
      e.preventDefault();
      const password = this.password.value;
      const confirmPassword = this.confirmPassword.value;
      if (password.trim() === "") {
        swal("Hey!", "The password cannot be empty.", "error");
        return;
      } else {
        if (password.trim() !== confirmPassword.trim()) {
          swal("Hey!", "Passwords do not match.", "error");
          return;
        }
      }

      function fntSuccess({ msg }) {
        swal("Clients", msg, "success");
        formChangePassword.reset();
      }

      const url = "/Clients/updatePassword";
      ajax(url, "POST", this, fntSuccess);
    });
  }

  if (foto) {
    foto.addEventListener("change", onChangePhoto);

    if (btnSubmitPhoto)
      btnSubmitPhoto.addEventListener("click", function () {
        foto.click();
      });
  }

  if (delPhoto) {
    delPhoto.addEventListener("click", function () {
      const idcliente = this.getAttribute("pr");
      removePhoto(idcliente);
    });
  }
});

function editInfo(element, idclient) {
  function fntSuccess({ data }) {
    changeSettingsModal("UPDATE", "Update Client");
    rowTable = element.parentNode.parentNode.parentNode;

    const { nombres, apellidos, email_user, telefono, status } = data;

    formClientes.idClient.value = idclient;
    formClientes.nombre.value = nombres;
    formClientes.apellido.value = apellidos;
    formClientes.email.value = email_user;
    formClientes.telefono.value = telefono;
    formClientes.listStatus.value = status;

    $("#listRolid").selectpicker("render");
    $("#listStatus").selectpicker("render");
    $("#modalFormClientes").modal("show");
  }

  ajax(`/Clients/getClient/${idclient}`, "GET", "", fntSuccess);
}

function delInfo(idpersona, reload = false) {
  sweetAlertEliminar({
    title: "Delete Client",
    text: "Do you really want to remove the client?",
    fnt() {
      const data = "idClient=" + idpersona;
      const url = "/Clients/delClient";

      function fntSuccess({ msg }) {
        swal("Delete", msg, "success");
        if (!reload) {
          tableClients.ajax.reload();
        } else {
          setTimeout(() => window.location.reload(), 500);
        }
      }
      ajax(url, "POST", data, fntSuccess);
    },
  });
}

function openModal() {
  rowTable = "";
  formClientes.idClient.value = "";
  formClientes.reset();
  changeSettingsModal("NEW", "New Client");
  $(".selectpicker").selectpicker("render");
  $("#modalFormClientes").modal("show");
}

function removePhoto(idcliente) {
  const url = "/clients/delImgProfile";
  let formData = new FormData();
  const fotoActual = document.querySelector("#foto_actual").value;

  formData.append("fotoActual", fotoActual);
  formData.append("idcliente", idcliente);
  function fntSuccess({ msg }) {
    swal("", msg, "success");
    setTimeout(() => {
      window.location.reload();
    }, 1000);
  }

  ajax(url, "POST", formData, fntSuccess);
}

function onChangePhoto(e) {
  const uploadFoto = document.querySelector("#foto").value;
  const fileimg = document.querySelector("#foto").files;
  const contactAlert = document.querySelector("#form_alert");
  if (uploadFoto !== "") {
    const type = fileimg[0].type;
    if (type !== "image/jpeg" && type !== "image/jpg" && type !== "image/png") {
      contactAlert.innerHTML =
        '<p class="errorArchivo">The file is not valid.</p>';
      return false;
    } else {
      const url = "/clients/changeprofileimage/";
      function fntSucces({ msg }) {
        swal("", msg, "success");
        setTimeout(() => {
          window.location.reload();
        }, 1000);
      }
      ajax(url, "POST", formImagen, fntSucces);
    }
  } else {
    swal("No photo selected", "", "error");
  }
}
