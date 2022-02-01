let tablePropertys;

document.addEventListener("DOMContentLoaded", function () {
  if (document.querySelector("#tablePropertys")) {
    const urlData = "/propertys/getPropiedades";
    const columns = [
      { data: "idpropiedad", className: "text-center" },
      { data: "portada" },
      { data: "titulo" },
      { data: "tipo", className: "text-center" },
      { data: "precio", className: "font-weight-bold text-center" },
      { data: "statuspackage", className: "text-center" },
      { data: "options" },
    ];
    tablePropertys = getDataTable("#tablePropertys", urlData, columns);
  }
});

function deletePropiedad(idPropiedad) {
  swal({
    title: "Hey!",
    text: "You will not be able to recover the data of this property",
    icon: "warning",
    buttons: true,
    closeOnConfirm: false,
    animation: "slide-from-top",
    confirmButtonText: "Si, eliminar",
  }).then(function (isConfirmed) {
    if (isConfirmed) {
      const data = "idPropiedad=" + idPropiedad;
      const url = "/propertys/delPropiedad";
      ajax(url, "POST", data, ({ msg }) => {
        swal("Delete", msg, "success");
        tablePropertys.ajax.reload();
      });
    }
    return false;
  });
}
