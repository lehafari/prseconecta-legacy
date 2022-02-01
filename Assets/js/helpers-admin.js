const divLoading = document.querySelector("#divLoading");
function showLoading() {
  divLoading.style.display = "flex";
}

function hideLoading() {
  divLoading.style.display = "none";
}

function validateEmail(email) {
  var stringEmail = new RegExp(
    /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/
  );
  if (stringEmail.test(email) === false) {
    return false;
  } else {
    return true;
  }
}

function controlDecimal(e) {
  e.target.addEventListener("focus", function (e) {
    $(e.target).select();
  });

  e.target.addEventListener("keyup", function (e) {
    $(e.target).val(function (index, value) {
      return value
        .replace(/\D/g, "")
        .replace(/([0-9])([0-9]{2})$/, "$1.$2")
        .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
    });
  });
}

function getDataTable(selector, urlData, datos, extraconfig = null) {
  const config = {
    aProcessing: true,
    aServerSide: true,
    ajax: {
      url: base_url + urlData,
      dataSrc: "",
    },
    columns: datos,
    responsive: true,
    bDestroy: true,
    iDisplayLength: 10,
    order: [[0, "desc"]],
  };

  if (extraconfig) {
    const { columnDefs } = extraconfig;

    if (columnDefs) {
      config.columnDefs = columnDefs;
    }
  }

  const table = $(selector).DataTable(config);
  return table;
}

function sweetAlertEliminar({ title, text, fnt }) {
  swal({
    title,
    text,
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Yes, delete",
    cancelButtonText: "No, cancel",
    closeOnConfirm: false,
  }).then((isConfirmed) => {
    if (isConfirmed) {
      fnt();
    }
  });
}

function ajax(url, method, data, fntSuccess, fntError = null) {
  showLoading();
  let formData;

  const request = window.XMLHttpRequest
    ? new XMLHttpRequest()
    : new ActiveXObject("Microsoft.XMLHTTP");
  const ajaxUrl = base_url + url;

  if (
    (typeof data === "string" || typeof data === "object") &&
    data.nodeName !== "FORM"
  ) {
    formData = data;
  } else {
    formData = new FormData(data);
  }

  request.open(method, ajaxUrl, true);
  if (typeof data === "string" && data !== "") {
    request.setRequestHeader(
      "Content-type",
      "application/x-www-form-urlencoded"
    );
  }
  request.send(formData);
  request.onreadystatechange = () => {
    if (request.readyState == 4 && request.status == 200) {
      hideLoading();
      const resultado = JSON.parse(request.responseText);
      const { status, msg } = resultado;
      if (status) {
        fntSuccess(resultado);
      } else {
        if (fntError === null) {
          swal("Error", msg, "error");
        } else {
          fntError(resultado);
        }
      }
      return;
    }
  };
}

function changeSettingsModal(updateOrNew, title) {
  document.querySelector("#titleModal").innerHTML = title;
  const btnText = document.querySelector("#btnText");
  const modalHeader = document.querySelector(".modal-header");
  const btnActionForm = document.querySelector("#btnActionForm");
  const iconbtn = document.querySelector(".iconbtn");
  if (updateOrNew === "UPDATE") {
    modalHeader.classList.replace("headerRegister", "headerUpdate");
    btnActionForm.classList.replace("btn-primary", "btn-info");
    iconbtn.classList.replace("bx-save", "bx-pencil");
    btnText.innerHTML = "Update";
  } else if (updateOrNew === "NEW") {
    modalHeader.classList.replace("headerUpdate", "headerRegister");
    btnActionForm.classList.replace("btn-info", "btn-primary");
    iconbtn.classList.replace("bx-pencil", "bx-save");
    btnText.innerHTML = "Save";
  }
}

function logout(e, idioma) {
  e.preventDefault();
  let title = "";
  let confirmButtonText = "";
  let cancelButtonText = "";
  if (idioma === "spanish") {
    title = "¿Estás seguro que quieres cerrar la sesión?";
    confirmButtonText = "Si, cerrar sesión";
    cancelButtonText = "No, cancelar";
  } else {
    title = "Are you sure you want to log out?";
    confirmButtonText = "Yes, log out";
    cancelButtonText = "No, cancel";
  }

  swal({
    title,
    icon: "warning",
    showCancelButton: true,
    confirmButtonText,
    cancelButtonText,
    confirmButtonColor: "#08c0ff",
    closeOnConfirm: false,
  }).then((isConfirm) => {
    if (isConfirm) {
      let redirect = base_url + "/logout";
      if (idioma != "spanish") {
        redirect = base_url + "/logout?redirect=admin";
      }
      window.location = redirect;
    }
  });
}
