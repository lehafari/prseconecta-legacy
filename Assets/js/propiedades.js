let tableUsuarios;
let rowTable = "";
const btnsEsperas = document.querySelectorAll(".btnEspera");
const formsChangeGratuito = document.querySelector("#formsChangeGratuito");
document.addEventListener("DOMContentLoaded", () => {
  btnsEsperas.forEach((btn) => {
    btn.addEventListener("click", function () {
      const status = this.getAttribute("s");
      const idp = this.getAttribute("idp");
      swal({
        title: "Cambiarás la vista de la propiedad!",
        icon: "warning",
        buttons: true,
      }).then(function (isConfirmed) {
        if (isConfirmed) {
          $.post(base_url + "/mis-propiedades/setStatus/", {
            status,
            idp,
          }).done((response) => {
            const respuesta = JSON.parse(response);
            if (respuesta.status) {
              swal("Propiedades", respuesta.msg, "success");
              setTimeout(() => window.location.reload(), 1000);
            } else {
              swal("Propiedades", respuesta.msg, "success");
            }
          });
        }

        return false;
      });
    });
  });

  if (formsChangeGratuito) {
    formsChangeGratuito.addEventListener("submit", function (e) {
      e.preventDefault();

      if ($(".card-package.bg-light").length) {
        const formData = new FormData(this);
        const url = "/mis-propiedades/setNewPackage";
        ajax(url, "POST", formData, ({ status, msg, url_redirect }) => {
          if (status) {
            swal("", msg, "success");
            setTimeout(() => (window.location = url_redirect), 1500);
          }
        });
      }
    });
  }
});

function deletePropiedad(idPropiedad, element) {
  swal({
    title: "¡Cuidado!",
    text: "No podrás recuperar los datos de esta propiedad",
    icon: "warning",
    buttons: {
      confirm: {
        text: "Si, eliminar",
        background: "#dc3545",
      },
    },
  }).then(function (isConfirmed) {
    if (isConfirmed) {
      const data = "idPropiedad=" + idPropiedad;
      const url = "/mis-propiedades/delPropiedad";
      ajax(url, "POST", data, ({ msg }) => {
        swal("Delete", msg, "success");
        const tr =
          element.parentElement.parentElement.parentElement.parentElement
            .parentElement;
        $(tr).remove();
      });
    }

    return false;
  });
}

function setPackageStep1(package, idpackage) {
  const tile = package.children[0];
  console.log(tile);
  $(".card-package").removeClass("bg-light");
  $(tile).addClass("bg-light");
  $(".bx.bxs-check-circle").remove();
  $(tile)
    .find(".checked")
    .html("<i class='bx bxs-check-circle text-success float-right'></i>");
  $(".btnSubmit").removeClass("disabled");
  document.querySelector("#check-package-" + idpackage).checked = true;
}
