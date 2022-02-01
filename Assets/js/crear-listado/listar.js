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
  changePage({
    before: "#step1",
    after: "#step2",
  });
}

function goStep3() {
  const titulo = formListado.querySelector("#step2 #titulo");
  const tipo = formListado.querySelector("#step2 #tipo");
  const subtipo = formListado.querySelector("#step2 #subtipo");
  const precio = formListado.querySelector("#step2 #precio");

  if (titulo.value.trim() === "") {
    $(".tituloMensajeText").remove();
    $(titulo).before(
      "<p class='text-danger tituloMensajeText'>Titulo no puede estar vacío</p>"
    );
    $(titulo).addClass("is-invalid");
    $(titulo).removeClass("is-valid");
    return;
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
    return;
  } else {
    $(".tipoMensajeText").remove();
  }

  if (!subtipo || subtipo.value.trim() === "") {
    $(".subtipoMensajeText").remove();
    $(subtipo).before(
      "<p class='text-danger subtipoMensajeText'>Este campo no puede estar vacío</p>"
    );
    return;
  } else {
    $(".subtipoMensajeText").remove();
  }

  if (precio.value.trim() === "") {
    $(".precioMensajeText").remove();
    $(precio).before(
      "<p class='text-danger precioMensajeText'>Precio no puede estar vacío</p>"
    );
    $(precio).addClass("is-invalid");
    $(precio).removeClass("is-valid");
    return;
  } else {
    $(".precioMensajeText").remove();
    $(precio).removeClass("is-invalid");
    $(precio).addClass("is-valid");
  }

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

function goStep5() {
  if (myDropzone) {
    if (!myDropzone.files.length) {
      swal("Imágenes", "Tienes que subir minimo una imágen", "error");
      return;
    }
  }
  changePage({
    before: "#step4",
    after: "#step5",
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

function backStep4() {
  changePage({
    before: "#step5",
    after: "#step4",
  });
}

function changePage({ before, after }) {
  $(before).fadeOut(() => $(after).fadeIn());
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
let contadorDetallesAdicionales = 2;
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
          placeholder="Ingrese el Valor" class="form-control">
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
    if (myDropzone) {
      if (!myDropzone.files.length) {
        swal("Imágenes", "Tienes que subir minimo una imágen", "error");
        return;
      }
      tinyMCE.triggerSave();
      myDropzone.processQueue();
    }
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
    maxFilesize: 5,
    url: `${base_url}/crear-listado/nuevaPropiedad/Listar`,
    method: "POST",
    addRemoveLinks: true,
    uploadMultiple: true,
    parallelUploads: 10000,
    uploadMultiple: true,
    autoProcessQueue: false,
    acceptedFiles: "image/*",
    dictMaxFilesExceeded: "Haz llegado al límite de imágenes en este paquete",
    dictInvalidFileType: "Sólo archivos JPG/PNG",
    dictRemoveFile: "Borrar archivo",
    success: function (file, response) {
      const resultado = JSON.parse(response);
      const { msg, status, url } = resultado;

      if (status) {
        file.previewElement.classList.add("dz-success");
        swal("Crear Listado", msg, "success");
        setTimeout(() => (window.location = url), 1500);
        return true;
      } else {
        swal("Crear Listado", msg, "error");
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
      this.on("sending", function (file, xhr, formData) {
        // Append all form inputs to the formData Dropzone will POST
        const data = $("form").serializeArray();
        $.each(data, function (key, el) {
          formData.append(el.name, el.value);
        });

        if (formListado.btnFilePdfDocumentos.value !== "") {
          formData.append(
            "documentoPdf",
            formListado.btnFilePdfDocumentos.files[0]
          );
        }
      });
      this.on("addedfile", function (file) {
        let isExceed = false;
        const msgFileUpload = document.querySelector("#msgFileUpload");
        for (let i = myDropzone.files.length - maxFiles - 1; i >= 0; i--) {
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

      this.on("error", function (file, response) {
        swal(
          "",
          "Ha ocurrido un error..., por favor verifica tu conexión a internet y vuelve a subir las imágenes de su listado",
          "error"
        );
      });

      this.on("sending", function (file) {
        $(".modalProgress").modal("show");
      });

      this.on("queuecomplete", function (progress) {
        document.querySelector("#the-progress-div").style.width =
          progress + "%";
        $(".modalProgress").modal("hide");
      });
    },
    uploadprogress: function (file, progress, bytesSent) {
      document.querySelector("#the-progress-div").style.width = progress + "%";
      $(".the-progress-text").text(progress + "%");
    },
  });
}

let map, infoWindow;

function iniciarMap() {
  var coord = { lat: 18.200178, lng: -66.664513 };
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
