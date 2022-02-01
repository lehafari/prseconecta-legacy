const formMunicipal = document.querySelector("#formMunicipal");
const formAreacapital = document.querySelector("#formAreacapital");
const areacapitalModal = document.querySelector("#areacapitalModal");
const municipalModal = document.querySelector("#municipalModal");
let tableMunicipal;
let tableAreaCapital;
document.addEventListener("DOMContentLoaded", function () {
  const urlDataMunicipal = "/settings/getMunicipales";
  const columnsMunicipal = [
    { data: "idmunicipal" },
    { data: "nombre" },
    { data: "options" },
  ];
  tableMunicipal = getDataTable(
    "#tableMunicipal",
    urlDataMunicipal,
    columnsMunicipal
  );

  const urlDataAreaCapital = "/settings/getAreasCapitales";
  const columnsAreaCapital = [
    { data: "idareacapital" },
    { data: "nombre" },
    { data: "options" },
  ];
  tableAreaCapital = getDataTable(
    "#tableAreaCapital",
    urlDataAreaCapital,
    columnsAreaCapital
  );

  formMunicipal.addEventListener("submit", function (e) {
    e.preventDefault();

    const tituloMunicipal = this.tituloMunicipal.value;

    if (tituloMunicipal.trim() === "") {
      swal("Hey!", "Title is required.", "error");
      return;
    }

    const url = "/settings/setMunicipal";
    const formData = new FormData(this);

    ajax(url, "POST", formData, ({ msg }) => {
      swal("", msg, "success");
      $(municipalModal).modal("hide");
      tableMunicipal.ajax.reload();
    });
  });

  formAreacapital.addEventListener("submit", function (e) {
    e.preventDefault();

    const tituloAreaCapital = this.tituloAreaCapital.value;

    if (tituloAreaCapital.trim() === "") {
      swal("Hey!", "Title is required.", "error");
      return;
    }

    const url = "/settings/setAreaCapital";
    const formData = new FormData(this);

    ajax(url, "POST", formData, ({ msg }) => {
      swal("", msg, "success");
      $(areacapitalModal).modal("hide");
      tableAreaCapital.ajax.reload();
    });
  });
});

function openModalMunicipal() {
  municipalModal.querySelector("#titleModal").innerHTML = "New municipal";
  const btnText = municipalModal.querySelector("#btnText");
  const modalHeader = municipalModal.querySelector(".modal-header");
  const btnActionForm = municipalModal.querySelector("#btnActionForm");
  const iconbtn = municipalModal.querySelector(".iconbtn");
  modalHeader.classList.replace("headerUpdate", "headerRegister");
  btnActionForm.classList.replace("btn-info", "btn-primary");
  iconbtn.classList.replace("bx-pencil", "bx-save");
  btnText.innerHTML = "Save";
  $(municipalModal).modal("show");
  formMunicipal.idmunicipal.value = "";
  $(formMunicipal.tituloMunicipal).focus();

  formMunicipal.reset();
}

function editInfoMunicipio(idmunicipio) {
  const url = "/settings/getMunicipal/" + idmunicipio;

  function fntSuccess({ data }) {
    $(municipalModal).modal("show");
    const { nombre, idmunicipal } = data;
    municipalModal.querySelector("#titleModal").innerHTML = "Edit municipal";
    const btnText = municipalModal.querySelector("#btnText");
    const modalHeader = municipalModal.querySelector(".modal-header");
    const btnActionForm = municipalModal.querySelector("#btnActionForm");
    const iconbtn = municipalModal.querySelector(".iconbtn");
    modalHeader.classList.replace("headerRegister", "headerUpdate");
    btnActionForm.classList.replace("btn-primary", "btn-info");
    iconbtn.classList.replace("bx-save", "bx-pencil");
    btnText.innerHTML = "Update";
    formMunicipal.tituloMunicipal.value = nombre;
    formMunicipal.idmunicipal.value = idmunicipal;
    $(municipalModal).modal("show");
  }

  ajax(url, "GET", "action=get", fntSuccess);
}

function deleteInfoMunicipio(idmunicipio) {
  sweetAlertEliminar({
    title: "Delete Municipio",
    text: "Do you really want to remove the municipio?",
    fnt() {
      const data = "idmunicipio=" + idmunicipio;
      const url = "/Settings/delMunicipio";

      function fntSuccess({ msg }) {
        swal("Delete", msg, "success");
        tableMunicipal.ajax.reload();
      }
      ajax(url, "POST", data, fntSuccess);
    },
  });
}

function openModalAreacapitual() {
  areacapitalModal.querySelector("#titleModal").innerHTML =
    "Crear Area capital";
  const btnText = areacapitalModal.querySelector("#btnText");
  const modalHeader = areacapitalModal.querySelector(".modal-header");
  const btnActionForm = areacapitalModal.querySelector("#btnActionForm");
  const iconbtn = areacapitalModal.querySelector(".iconbtn");
  modalHeader.classList.replace("headerUpdate", "headerRegister");
  btnActionForm.classList.replace("btn-info", "btn-primary");
  iconbtn.classList.replace("bx-pencil", "bx-save");
  btnText.innerHTML = "Save";
  $(areacapitalModal).modal("show");
  formAreacapital.idareacapital.value = "";
  $(formAreacapital.tituloAreaCapital).focus();

  formAreacapital.reset();
}

function editInfoAreaCapital(idareacapital) {
  const url = "/settings/getAreasCapital/" + idareacapital;

  function fntSuccess({ data }) {
    const { nombre, idareacapital } = data;
    areacapitalModal.querySelector("#titleModal").innerHTML = "Edit municipal";
    const btnText = areacapitalModal.querySelector("#btnText");
    const modalHeader = areacapitalModal.querySelector(".modal-header");
    const btnActionForm = areacapitalModal.querySelector("#btnActionForm");
    const iconbtn = areacapitalModal.querySelector(".iconbtn");
    modalHeader.classList.replace("headerRegister", "headerUpdate");
    btnActionForm.classList.replace("btn-primary", "btn-info");
    iconbtn.classList.replace("bx-save", "bx-pencil");
    btnText.innerHTML = "Update";
    formAreacapital.tituloAreaCapital.value = nombre;
    formAreacapital.idareacapital.value = idareacapital;
    $(areacapitalModal).modal("show");
  }

  ajax(url, "GET", "action=get", fntSuccess);
}

function deleteInfoAreaCapital(idareacapital) {
  sweetAlertEliminar({
    title: "Delete Area Capital",
    text: "Do you really want to remove the area capital?",
    fnt() {
      const data = "idareacapital=" + idareacapital;
      const url = "/Settings/delAreaCapital";

      function fntSuccess({ msg }) {
        swal("Delete", msg, "success");
        tableAreaCapital.ajax.reload();
      }
      ajax(url, "POST", data, fntSuccess);
    },
  });
}
