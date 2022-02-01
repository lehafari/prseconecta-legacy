let tableAgents;
const formAgentes = document.querySelector("#formAgentes");
const formChangePassword = document.querySelector("#form-change-password");
const socialmediaform = document.querySelector("#socialmediaform");
const foto = document.querySelector("#foto");
const delPhoto = document.querySelector(".delPhoto");
const formImagen = document.querySelector("#form-imagen-perfil");
const btnSubmitPhoto = document.querySelector("#btnSubmitPhoto");
if (document.querySelector("#sobremi")) {
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
}

document.addEventListener("DOMContentLoaded", function (e) {
  if (document.querySelector("#tableAgents")) {
    const urlData = "/agents/getAgents";
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
    tableAgents = getDataTable("#tableAgents", urlData, columns);
  }

  if (formAgentes) {
    formAgentes.onsubmit = function (e) {
      e.preventDefault();
      const nombre = this.nombre.value;
      const apellido = this.apellido.value;
      const email = this.email.value;
      const status = this.listStatus.value;
      const idAgent = this.idAgent.value;

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

      if (this.password) {
        if (this.password.value.trim() === "") {
          swal("Hey!", "Password is required.", "error");
          return;
        }
      }

      if (status.trim() === "") {
        swal("Hey!", "The state cannot be empty.", "error");
        return;
      }

      if (document.querySelector("#sobremi")) {
        tinyMCE.triggerSave();
      }

      function fntSuccess({ msg }) {
        if (idAgent.trim() === "") {
          tableAgents.ajax.reload();
          $("#modalFormAgentes").modal("hide");
          formAgentes.reset();
        }
        swal("Agents", msg, "success");
      }

      const url = idAgent.trim() === "" ? "/Agents/insert" : "/Agents/update";
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
        swal("Agents", msg, "success");
        formChangePassword.reset();
      }

      const url = "/agents/updatePassword";
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
      const idpersona = this.getAttribute("pr");
      removePhoto(idpersona);
    });
  }

  if (socialmediaform) {
    socialmediaform.addEventListener("submit", function (e) {
      e.preventDefault();

      function fntSuccess({ msg }) {
        swal("", msg, "success");
      }
      ajax("/agents/socialmediaUpdate", "POST", this, fntSuccess);
    });
  }
});

function editInfo(element, idagente) {
  function fntSuccess({ data }) {
    changeSettingsModal("UPDATE", "Update Agent");
    rowTable = element.parentNode.parentNode.parentNode;

    const { nombres, apellidos, email_user, telefono, status } = data;

    formAgentes.idAgent.value = idagente;
    formAgentes.nombre.value = nombres;
    formAgentes.apellido.value = apellidos;
    formAgentes.email.value = email_user;
    formAgentes.telefono.value = telefono;
    formAgentes.listStatus.value = status;

    $("#listRolid").selectpicker("render");
    $("#listStatus").selectpicker("render");
    $("#modalFormAgentes").modal("show");
  }

  ajax(`/Agents/getAgent/${idagente}`, "GET", "", fntSuccess);
}

function delInfo(idpersona, reload = false) {
  sweetAlertEliminar({
    title: "Delete Agent",
    text: "Do you really want to remove the agent?",
    fnt() {
      const data = "idAgent=" + idpersona;
      const url = "/Agents/delAgent";

      function fntSuccess({ msg }) {
        swal("Delete", msg, "success");
        if (!reload) {
          tableAgents.ajax.reload();
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
  formAgentes.idAgent.value = "";
  formAgentes.reset();
  changeSettingsModal("NEW", "New Agent");
  $(".selectpicker").selectpicker("render");
  $("#modalFormAgentes").modal("show");
}

function removePhoto(idpersona) {
  const url = "/agents/delImgProfile";
  let formData = new FormData();
  const fotoActual = document.querySelector("#foto_actual").value;

  formData.append("fotoActual", fotoActual);
  formData.append("idpersona", idpersona);
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
      const url = "/agents/changeprofileimage/";
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

async function editarComentario(e, idcomentario, button) {
  const comentario = await axios({
    url: base_url + "/agents/selectComentario",
    params: { idcomentario },
  });
  const { data } = comentario;
  if (data.status) {
    const row =
      button.parentElement.parentElement.parentElement.parentElement
        .parentElement.children;
    const contenedor = row[row.length - 1];
    const textarea = document.createElement("textarea");
    const btnsubmit = document.createElement("button");
    btnsubmit.className = "btn btn-danger btn-sm mt-2";
    btnsubmit.innerHTML = '<i class="bx bxs-edit-alt"></i> Editar';
    btnsubmit.setAttribute("idcomentario", idcomentario);
    btnsubmit.addEventListener("click", function () {
      editInfoComment(this, contenedor);
    });
    textarea.className = "form-control";
    textarea.value = data.text;
    contenedor.innerHTML = "";
    contenedor.appendChild(textarea);
    contenedor.appendChild(btnsubmit);
  } else {
    swal("", data.msg, "error");
  }
}

async function eliminarComentario(e, idcomentario, button) {
  let formData = new FormData();
  formData.append("idcomentario", idcomentario);
  const url = "/agents/delComentario";
  function fntSuccess({ msg }) {
    const tile =
      button.parentElement.parentElement.parentElement.parentElement
        .parentElement.parentElement.parentElement.parentElement.parentElement;

    $(tile).remove();
    swal("Agents", msg, "success");
  }

  function fntError({ msg }) {
    showToast(msg, "error");
  }

  ajax(url, "POST", formData, fntSuccess, fntError);
}

async function editInfoComment(button, container) {
  const idcomentario = button.getAttribute("idcomentario");
  const comentario = button.parentElement.children[0].value;

  const url = `${base_url}/agents/editInfoComment`;
  const data = { idcomentario, comentario };
  showLoading();
  $.post(url, data).done((response) => {
    hideLoading();
    const respuesta = JSON.parse(response);
    if (respuesta.status) {
      container.innerHTML = `<p>${comentario}</p>`;
      swal("Agents", respuesta.msg, "success");
    } else {
      if (respuesta.reload) {
        window.location.reload();
      }
      swal("Agents", respuesta.msg, "error");
    }
  });
}
