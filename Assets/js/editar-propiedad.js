const formListado = document.querySelector("#formListado");
const btnFocusMap = document.querySelector("#map").parentElement.children[2];
const tableDetallesAdicionales = document.querySelector(
  "#tableDetallesAdicionales"
);
const btnAñadir =
  tableDetallesAdicionales.parentElement.parentElement.parentElement
    .parentElement.children[0].children[0].children[0];
let myDropzone;
var fileList = new Array();
Dropzone.autoDiscover = false;

async function setPackageStep1(package, idpackage) {
  const tile = package.children[0];
  $(".card-package").removeClass("bg-light");
  $(tile).addClass("bg-light");
  $(".bx.bxs-check-circle").remove();
  $(tile)
    .find(".checked")
    .html("<i class='bx bxs-check-circle text-success float-right'></i>");
  $("#step1 .btnProximoStep1").removeClass("disabled");
  document.querySelector("#check-package-" + idpackage).checked = true;
  document
    .querySelector("#step1 .btnProximoStep1")
    .addEventListener("click", goStep2);
  const url = base_url + "/crear-listado/getPaquete/" + idpackage;
  $.get(url).done((response) => {
    $("#divCheckedPaquetesCrearListado").html(response);
  });
}

function goStep2() {
  if (validarDescripcionPrecio()) return;

  changePage({
    before: "#step1",
    after: "#step2",
  });
}

function goStep3() {
  changePage({
    before: "#step2",
    after: "#step3",
  });
}

function goStep4() {
  changePage({
    before: "#step3",
    after: "#step4",
  });
}

function backStep1() {
  changePage({
    before: "#step2",
    after: "#step1",
  });
}

function backStep2() {
  changePage({
    before: "#step3",
    after: "#step2",
  });
}
function backStep3() {
  changePage({
    before: "#step4",
    after: "#step3",
  });
}

function changePage({ before, after }) {
  $(before).removeClass("active show");
  $(after).addClass("active show");
  $(".nav.nav-pills .nav-link[href='" + before + "']").removeClass("active");
  $(".nav.nav-pills .nav-link[href='" + after + "']").addClass("active");
}

const configTinyMCE = {
  selector: "#contenido",
  width: "100%",
  height: 300,
  statubar: true,
  encoding: "UTF-8",
  plugins: [
    "advlist autolink link lists charmap hr pagebreak",
    "searchreplace wordcount visualblocks",
    "table contextmenu directionality paste textcolor",
    "visualchars code fullscreen insertdatetime nonbreaking",
  ],
  entity_encoding: "raw",
  end_container_on_empty_block: true,
  toolbar_mode: "sliding",
  toolbar: `undo redo | bold italic underline | fontsizeselect formatselect | 
    alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist checklist | 
   | fullscreen  |  link anchor`,
};

tinymce.init(configTinyMCE);
document.addEventListener("DOMContentLoaded", function () {
  const listadoPaquetes = document.querySelectorAll(".listadoPaquetes");
  listadoPaquetes.forEach((paquete) => {
    new Sortable(paquete, {
      disabled: true,
      store: {
        get: (sortable) => {
          const orden = paquete.getAttribute("orden");
          return orden ? orden.split(",") : [];
        },
      },
    });
  });

  btnAñadir.addEventListener("click", function () {
    const tbody = tableDetallesAdicionales.querySelector("tbody");
    const html = `
    <tr>
      <td>
        <input type="text" name="detallesAdicionales[${contadorDetallesAdicionales}][0]"
          placeholder="Ej. Ingrese el tipo de construcción"
          class="form-control">
      </td>
      <td>
        <input type="text" name="detallesAdicionales[${contadorDetallesAdicionales}][1]"
          placeholder="Ingresa el Valor" class="form-control">
      </td>
      <td>
        <button type="button"
          onclick="deleteDetalleAdicional(this)"
          class="btn btn-outline-danger btn-block btn-sm">
          <i class='bx bx-x' style="font-size: 25px;"></i>
        </button>
      </td>
    </tr>
    `;

    $(tbody).append(html);

    contadorDetallesAdicionales++;
  });

  formListado.addEventListener("submit", function (e) {
    e.preventDefault();

    function errorStep1() {
      changePage({
        before: "#step4",
        after: "#step1",
      });
    }

    if (validarDescripcionPrecio()) {
      errorStep1();
      return;
    }
    tinyMCE.triggerSave();
    const url = "/mis-propiedades/editarPropiedad";
    const formData = new FormData(this);
    ajax(url, "POST", formData, (respuesta) => {
      if (respuesta.status) {
        swal("", respuesta.msg, "success");
        setTimeout(
          () => (window.location = base_url + "/mis-propiedades/"),
          1500
        );
      } else {
        swal("", respuesta.msg, "error");
      }
    });
  });

  btnFocusMap.addEventListener("click", function () {
    const input = formListado["direccion-localizacion"];
    input.focus();
    window.scrollTo({
      top: 0,
      behavior: "smooth",
    });
  });
});

function validarDescripcionPrecio() {
  let isError = false;
  const titulo = formListado.querySelector("#step1 #titulo");
  const tipo = formListado.querySelector("#step1 #tipo");
  const subtipo = formListado.querySelector("#step1 #subtipo");
  const precio = formListado.querySelector("#step1 #precio");

  if (titulo.value.trim() === "") {
    $(".tituloMensajeText").remove();
    $(titulo).before(
      "<p class='text-danger tituloMensajeText'>Titulo no puede estar vacío</p>"
    );
    $(titulo).addClass("is-invalid");
    $(titulo).removeClass("is-valid");
    swal("", "El titulo no puede estar vacío", "error");
    isError = true;
  } else {
    $(".tituloMensajeText").remove();
    $(titulo).removeClass("is-invalid");
    $(titulo).addClass("is-valid");
  }

  if (tipo.value.trim() === "") {
    $(".tipoMensajeText").remove();
    $(tipo).before(
      "<p class='text-danger tipoMensajeText'>Este campo no puede estar vacío</p>"
    );
    swal("", "El tipo no puede estar vacío", "error");
    isError = true;
  } else {
    $(".tipoMensajeText").remove();
  }

  if (subtipo) {
    if (subtipo.value.trim() === "") {
      $(".subtipoMensajeText").remove();
      $(subtipo).before(
        "<p class='text-danger subtipoMensajeText'>Este campo no puede estar vacío</p>"
      );
      swal("", "El subtipo no puede estar vacío", "error");
      isError = true;
    } else {
      $(".subtipoMensajeText").remove();
    }
  }

  if (precio.value.trim() === "") {
    $(".precioMensajeText").remove();
    $(precio).before(
      "<p class='text-danger precioMensajeText'>Precio no puede estar vacío</p>"
    );
    $(precio).addClass("is-invalid");
    $(precio).removeClass("is-valid");
    swal("", "El precio no puede estar vacío", "error");
    isError = true;
  } else {
    $(".precioMensajeText").remove();
    $(precio).removeClass("is-invalid");
    $(precio).addClass("is-valid");
  }
  return isError;
}

function getSubtipos(element) {
  const url = base_url + "/crear-listado/getSubtipos/" + element.value;
  $.get(url).done((response) => {
    const respuesta = JSON.parse(response);
    const { status, msg, data } = respuesta;
    if (status) {
      const select = document.querySelector("#subtipo");
      let html = "";
      data.forEach(({ idsubtipo, titulo }) => {
        html += `<option value="${idsubtipo}">${titulo}</option>`;
      });

      const divSubtipo =
        element.parentElement.parentElement.parentElement.children[2];
      divSubtipo.style.display = "block";

      select.innerHTML = html;
      $(".selectpicker").selectpicker("render");
      $(".selectpicker").selectpicker("refresh");
      select.addEventListener("change", (e) => onChangeSubtipo(e, select));
      document.querySelector("#divDetalles").innerHTML = "";
    }
  });
}

function onChangeSubtipo(e, select) {
  const value = select.value;
  const url = base_url + "/crear-listado/getFormFields/" + value;
  $.get(url).done((response) => {
    const respuesta = JSON.parse(response);
    const { msg, status, html } = respuesta;
    const divDetalles = document.querySelector("#divDetalles");
    if (status) {
      divDetalles.parentElement.parentElement.style.display = "block";
      divDetalles.style.display = "flex";
      $("#divDetalles").html(html);
    } else {
      divDetalles.parentElement.parentElement.style.display = "none";
    }
  });
}

function fntSortable(element, orden) {
  new Sortable(element, {
    disabled: true,
    store: {
      get: () => {
        return orden ? orden.split(",") : [];
      },
    },
  });
}

function deleteDetalleAdicional(btn) {
  const tr = btn.parentElement.parentElement;
  tr.parentElement.removeChild(tr);
}

function renderFileInput(maxFiles = 3, idpropiedad = 0) {
  $("#fileUpload").dropzone({
    url: `${base_url}/mis-propiedades/uploadFile`,
    method: "POST",
    addRemoveLinks: true,
    parallelUploads: 1,
    autoProcessQueue: true,
    uploadMultiple: false,
    acceptedFiles: "image/*",
    dictMaxFilesExceeded: "Haz llegado al límite de imágenes en este paquete",
    dictRemoveFile: "Borrar archivo",
    dictInvalidFileType: "Sólo archivos JPG/PNG",
    maxFiles: maxFiles,
    success: function (file, response) {
      const resultado = JSON.parse(response);
      const { msg, status, idimagen } = resultado;

      if (status) {
        file.id = idimagen;
        file.previewElement.classList.add("dz-success");
        return true;
      } else {
        swal("Editar Propiedad", msg, "error");
      }
    },
    maxfilesexceeded: async function (files) {
      if (this.files[1] != null) {
        this.removeFile(this.files[0]);
      }
    },
    error: function (file, response) {
      file.previewElement.classList.add("dz-error");
    },
    init: function () {
      myDropzone = this;
      const urlGetImagenes =
        base_url + "/mis-propiedades/getFilesProperty/" + idpropiedad;
      $.get(urlGetImagenes).done((response) => {
        const resultado = JSON.parse(response);
        if (resultado.status) {
          $.each(resultado.file_list, function (key, value) {
            myDropzone.options.maxFiles = myDropzone.options.maxFiles - 1;
          });
        }
      });
      this.on("addedfile", function (file) {
        let isExceed = false;
        const msgFileUpload = document.querySelector("#msgFileUpload");
        for (
          let i = myDropzone.files.length - myDropzone.options.maxFiles - 1;
          i >= 0;
          i--
        ) {
          let f = myDropzone.files[i];
          if (f.upload.uuid !== file.upload.uuid) {
            isExceed = true;
            myDropzone.removeFile(f);
          }
        }
        if (isExceed) {
          msgFileUpload.style.display = "block";
        } else {
          msgFileUpload.style.display = "none";
        }
      });

      this.on("sending", function (file, xhr, formData) {
        const idpropiedad = document.querySelector("#idpropiedad").value;
        formData.append("idpropiedad", idpropiedad);
      });

      this.on("removedfile", function (file) {
        console.log(file);
        const idpropiedad = document.querySelector("#idpropiedad").value;
        if (file.status === "success" && file.id) {
          const idimagen = file.id;
          $.post(base_url + "/mis-propiedades/delFile", {
            idpropiedad,
            file: idimagen,
          }).done((response) => {
            const respuesta = JSON.parse(response);
            if (respuesta.status) {
              myDropzone.options.maxFiles = myDropzone.options.maxFiles + 1;
            } else {
              file.status = "success";
              swal("", respuesta.msg, "error");
              dontremoveFile(file, file.id);
            }
          });
        } else {
          file.status = "success";
          dontremoveFile(file);
        }

        function dontremoveFile(file, id = null) {
          if (id) file.id = id;
          myDropzone.options.addedfile.call(myDropzone, file);
          myDropzone.options.thumbnail.call(myDropzone, file, file.dataURL);
          file.previewElement.classList.add("dz-success");
        }
      });

      this.on("maxfilesexceeded", function (file) {
        this.removeFile(file);
        $(file.previewElement).remove();
      });
    },
  });
}

let map, infoWindow;

function iniciarMap() {
  map = new google.maps.Map(document.getElementById("map"), {
    zoom: 10,
    center: coord,
  });

  const marker = new google.maps.Marker({
    position: coord,
    map: map,
  });

  const input = formListado["direccion-localizacion"];

  let autocomplete = new google.maps.places.Autocomplete(input);

  autocomplete.setComponentRestrictions({ country: ["PR"] });

  autocomplete.addListener("place_changed", function () {
    const place = autocomplete.getPlace();
    const lat = place.geometry.location.lat();
    const lng = place.geometry.location.lng();
    formListado["direccion-localizacion"].value = place.formatted_address;
    formListado["latitud-mapa"].value = lat;
    formListado["longitud-mapa"].value = lng;
    map.panTo({ lat, lng });
    marker.setPosition({ lat, lng });
  });
}

function fntDelItemImagen(element) {
  const nameImg = document
    .querySelector(element + " .btnDeleteImage")
    .getAttribute("imgname");
  const idpropiedad = document.querySelector("#idpropiedad").value;

  const url = "/mis-propiedades/delFile";
  let formData = new FormData();
  formData.append("idpropiedad", idpropiedad);
  formData.append("file", nameImg);

  function fntSuccess({ msg }) {
    swal("", msg, "success");
    const itemRemove = document.querySelector(element);
    itemRemove.parentNode.removeChild(itemRemove);
    myDropzone.options.maxFiles = myDropzone.options.maxFiles + 1;
  }
  ajax(url, "POST", formData, fntSuccess);
}
