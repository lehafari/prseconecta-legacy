let tableRoles;
let rowTable;
const formRol = document.querySelector("#formRol");
document.addEventListener("DOMContentLoaded", () => {
  const urlData = "/Roles/getRoles";
  const columns = [
    { data: "idrol" },
    { data: "nombrerol" },
    { data: "descripcion" },
    { data: "status", className: "text-center" },
    { data: "options" },
  ];

  tableRoles = getDataTable("#tableRoles", urlData, columns);

  formRol.onsubmit = function (e) {
    e.preventDefault();
    const nombre = this.nombre.value;
    const descripcion = this.descripcion.value;
    const status = this.listStatus.value;
    const idrol = this.idRol.value;

    if (nombre.trim() === "") {
      swal("Hey!", "The name field is required.", "error");
      return;
    }

    if (descripcion.trim() === "") {
      swal("Hey!", "The description field is required.", "error");
      return;
    }

    if (status.trim() === "") {
      swal("Hey!", "The status field is required.", "error");
      return;
    }

    function fntSuccess({ msg }) {
      if (rowTable === "") {
        tableRoles.ajax.reload();
      } else {
        const htmlStatus =
          status == 1
            ? '<span class="badge badge-success">Activo</span>'
            : '<span class="badge badge-danger">Inaactivo</span>';

        rowTable.cells[1].textContent = nombre;
        rowTable.cells[2].textContent = descripcion;
        rowTable.cells[3].innerHTML = htmlStatus;
      }
      $("#modalFormRol").modal("hide");
      formRol.reset();
      swal("User Roles", msg, "success");
    }

    const ajaxUrl = idrol.trim() === "" ? "/Roles/nuevoRol" : "/Roles/setRol";

    ajax(ajaxUrl, "POST", this, fntSuccess);
  };
});

function openModal() {
  document.querySelector("#idRol").value = "";
  rowTable = "";
  changeSettingsModal("NEW", "Save Rol");
  document.querySelector("#formRol").reset();
  $("#modalFormRol").modal("show");
}

function editInfo(element, idrol) {
  function fntSuccess({ data }) {
    const { idrol, nombrerol, descripcion, status } = data;
    changeSettingsModal("UPDATE", "Update Rol");
    rowTable = element.parentNode.parentNode.parentNode;

    formRol.idRol.value = idrol;
    formRol.nombre.value = nombrerol;
    formRol.descripcion.value = descripcion;
    formRol.listStatus.value = status;
    $("#modalFormRol").modal("show");
  }

  const ajaxUrl = "/Roles/getRol/" + idrol;
  ajax(ajaxUrl, "GET", "", fntSuccess);
}

function delInfo(idrol) {
  sweetAlertEliminar({
    title: "Delete rol",
    text: "Do you really want to delete the role?",
    fnt() {
      const data = "idrol=" + idrol;
      const ajaxDelRol = "/Roles/delRol";

      function fntSuccess({ msg }) {
        swal("Eliminar!", msg, "success");
        tableRoles.ajax.reload();
      }

      ajax(ajaxDelRol, "POST", data, fntSuccess);
    },
  });
}

function fntPermisos(idrol) {
  const url = "/Permisos/getPermisosRol/" + idrol;

  function fntSuccess({ html }) {
    document.querySelector("#contentAjax").innerHTML = html;
    $(".modalPermisos").modal("show");
    document
      .querySelector("#formPermisos")
      .addEventListener("submit", fntSavePermisos, false);
  }
  ajax(url, "GET", "", fntSuccess);
}

function fntSavePermisos(e) {
  e.preventDefault();
  const ajaxUrl = "/Permisos/setPermisos";
  function fntSuccess({ msg }) {
    swal("User permits", msg, "success");
    $(".modalPermisos").modal("hide");
  }
  ajax(ajaxUrl, "POST", e.target, fntSuccess);
}
