const frmCaracteristicas = document.querySelector("#frmCaracteristicas");

function openModal() {
  $("#modalCharacteristics").modal("show");
  changeSettingsModal("NEW", "New Characteristic");
  frmCaracteristicas.idcaracteristica.value = "";
  frmCaracteristicas.reset();
}

document.addEventListener("DOMContentLoaded", function (e) {
  if (frmCaracteristicas) {
    frmCaracteristicas.addEventListener("submit", function (e) {
      e.preventDefault();

      const titulo = this.title.value;
      const idcaracteristica = this.idcaracteristica.value;
      if (titulo.trim() === "") {
        swal("", "Title cannot be empty", "error");
        return;
      }

      function fntSuccess(response) {
        if (idcaracteristica.trim() === "") {
          const { msg, html } = response;
          swal("", msg, "success");
          $("#list-group-add").prepend(html);
        } else {
          const { msg } = response;
          $(`div[data-id=${idcaracteristica}]`).find(".contenido").html(titulo);
        }
        $("#modalCharacteristics").modal("hide");
      }
      const url =
        idcaracteristica.trim() === ""
          ? "/characteristics/insert"
          : "/characteristics/edit";
      ajax(url, "POST", this, fntSuccess);
    });
  }
});

function editInfo(btn, idcheck) {
  const url = "/characteristics/getcaracteristica/" + idcheck;

  function fntSuccess({ data }) {
    $("#modalCharacteristics").modal("show");
    changeSettingsModal("UPDATE", "Update Characteristic");
    const { titulo } = data;
    frmCaracteristicas["title"].value = titulo;
    frmCaracteristicas["idcaracteristica"].value = idcheck;
  }

  ajax(url, "GET", "action=get", fntSuccess);
}

function delInfo(btn, idcheck) {
  sweetAlertEliminar({
    title: "Delete Characteristic",
    text: "Do you really want to remove the characteristic?",
    fnt() {
      const data = "idcaracteristica=" + idcheck;
      const url = "/characteristics/delcharacteristic";

      function fntSuccess({ msg }) {
        swal.close();
        const card =
          btn.parentElement.parentElement.parentElement.parentElement;
        $(card).slideUp(500, () => {
          $(card).remove();
        });
      }
      ajax(url, "POST", data, fntSuccess);
    },
  });
}
