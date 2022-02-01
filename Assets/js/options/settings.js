const frmTags = document.querySelector("#frmTags");
const divTags = document.querySelector("#divTags");

function openModal() {
  $("#modalTags").modal("show");
  changeSettingsModal("NEW", "New Tag");
  frmTags.idtag.value = "";
  frmTags.reset();
}

document.addEventListener("DOMContentLoaded", function (e) {
  if (frmTags) {
    frmTags.addEventListener("submit", function (e) {
      e.preventDefault();

      const titulo = this.title.value;
      const idtag = this.idtag.value;
      if (titulo.trim() === "") {
        swal("", "Title cannot be empty", "error");
        return;
      }

      function fntSuccess(response) {
        if (idtag.trim() === "") {
          const { msg, html } = response;
          swal("", msg, "success");
          $("#divTags").prepend(html);
        } else {
          console.log(titulo);
          $(`div[data-id=${idtag}]`).find(".contenido").html(titulo);
        }
        $("#modalTags").modal("hide");
      }
      const url =
        idtag.trim() === "" ? "/settings/insertTag" : "/settings/editTag";
      ajax(url, "POST", this, fntSuccess);
    });
  }

  if (divTags) {
    new Sortable(divTags, {
      group: {
        name: "shared",
      },
      animation: 250,
      chosenClass: "seleccionado",
      ghostClass: "fantasma",
      dragClass: "drag",
      handle: ".handle",
      easing: "cubic-bezier(0.895, 0.03, 0.685, 0.22)",
      store: {
        set: async (sortable) => {
          const orden = sortable.toArray();
          const url = `${base_url}/settings/setOrder`;
          $.post(url, {
            status: 1,
            name: "listgroup1",
            orden: orden.join(","),
          });
        },

        get: (sortable) => {
          const orden = divTags.getAttribute("orden");
          return orden ? orden.split(",") : [];
        },
      },
    });
  }
});

function editInfo(btn, idcheck) {
  const url = "/settings/getTag/" + idcheck;

  function fntSuccess({ data }) {
    $("#modalTags").modal("show");
    changeSettingsModal("UPDATE", "Update Tag");
    const { titulotag } = data;
    frmTags["title"].value = titulotag;
    frmTags["idtag"].value = idcheck;
  }

  ajax(url, "GET", "action=get", fntSuccess);
}

function delInfo(btn, idcheck) {
  sweetAlertEliminar({
    title: "Delete Tag",
    text: "Do you really want to remove the tag?",
    fnt() {
      const data = "idtag=" + idcheck;
      const url = "/settings/delTag";

      function fntSuccess({ msg }) {
        swal.close();
        const card = btn.parentElement.parentElement.parentElement;
        $(card).slideUp(500, () => {
          $(card).remove();
        });
      }
      ajax(url, "POST", data, fntSuccess);
    },
  });
}
