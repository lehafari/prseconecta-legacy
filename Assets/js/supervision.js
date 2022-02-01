$(".date-picker").datepicker({
  closeText: "Cerrar",
  prevText: "<Ant",
  nextText: "Sig>",
  currentText: "Hoy",
  monthNames: [
    "1 -",
    "2 -",
    "3 -",
    "4 -",
    "5 -",
    "6 -",
    "7 -",
    "8 -",
    "9 -",
    "10 -",
    "11 -",
    "12 -",
  ],
  monthNamesShort: [
    "Enero",
    "Febrero",
    "Marzo",
    "Abril",
    "Mayo",
    "Junio",
    "Julio",
    "Agosto",
    "Septiembre",
    "Octubre",
    "Noviembre",
    "Diciembre",
  ],
  changeMonth: true,
  changeYear: true,
  showButtonPanel: true,
  dateFormat: "MM yy",
  showDays: false,
  onClose: function (dateText, inst) {
    $(this).datepicker(
      "setDate",
      new Date(inst.selectedYear, inst.selectedMonth, 1)
    );
  },
});

function onChangeSelect(select) {
  window.location = base_url + "/supervision?listing_id=" + select.value;
}

function fntSearchVistosDispositivos(idpropiedad) {
  let fecha = document.querySelector(".inputDispositivos").value;
  if (fecha == "") {
    swal("", "Seleccione mes y año", "error");
    return false;
  }

  let request = window.XMLHttpRequest
    ? new XMLHttpRequest()
    : new ActiveXObject("Microsoft.XMLHTTP");
  let ajaxUrl = base_url + "/supervision/vistosDispositivos";
  divLoading.style.display = "flex";
  let formData = new FormData();
  formData.append("fecha", fecha);
  formData.append("idpropiedad", idpropiedad);
  request.open("POST", ajaxUrl, true);
  request.send(formData);
  request.onreadystatechange = function () {
    if (request.readyState != 4) return;
    if (request.status == 200) {
      const response = JSON.parse(request.responseText);
      $("#graficaDevices").html(response.script);
      if (response.datos.vistosDevices.length) {
        let htmlTbody = "";

        response.datos.vistosDevices.forEach((device) => {
          htmlTbody += `
            <tr>
              <td>${device.device}</td>
              <td>${device.cantidad}</td>
            </tr>
          `;
        });
        document.querySelector("#tableVistosDevices").innerHTML = `
        <table class="table-bordered table table-hover">
        <thead>
          <tr class="table-primary">
            <th>Dispositivo</th>
            <th>Vistas</th>
          </tr>
        </thead>
        <tbody>
          ${htmlTbody}
        </tbody>
      </table>
        `;
      } else {
        document.querySelector("#tableVistosDevices").innerHTML = "";
      }
      divLoading.style.display = "none";
      return false;
    }
  };
}

function fntSearchVistosPaises(idpropiedad) {
  let fecha = document.querySelector(".inputPaises").value;
  if (fecha == "") {
    swal("", "Seleccione mes y año", "error");
    return false;
  }

  let request = window.XMLHttpRequest
    ? new XMLHttpRequest()
    : new ActiveXObject("Microsoft.XMLHTTP");
  let ajaxUrl = base_url + "/supervision/vistosPaises";
  divLoading.style.display = "flex";
  let formData = new FormData();
  formData.append("fecha", fecha);
  formData.append("idpropiedad", idpropiedad);
  request.open("POST", ajaxUrl, true);
  request.send(formData);
  request.onreadystatechange = function () {
    if (request.readyState != 4) return;
    if (request.status == 200) {
      const response = JSON.parse(request.responseText);

      $("#graficaPaises").html(response.script);
      if (response.datos.vistosCountrys.length) {
        let htmlTbody = "";

        response.datos.vistosCountrys.forEach(({ country, cantidad }) => {
          htmlTbody += `
            <tr>
              <td>${country}</td>
              <td>${cantidad}</td>
            </tr>
          `;
        });
        document.querySelector("#divtableVistosCountry").innerHTML = `
        <table class="table-bordered table table-hover">
        <thead>
          <tr class="table-primary">
            <th>Dispositivo</th>
            <th>Vistas</th>
          </tr>
        </thead>
        <tbody>
          ${htmlTbody}
        </tbody>
      </table>
        `;
      } else {
        document.querySelector("#divtableVistosCountry").innerHTML = "";
      }
      divLoading.style.display = "none";
      return false;
    }
  };
}

function fntSearchVMes(idpropiedad) {
  let fecha = document.querySelector(".vistosMes").value;
  if (fecha === "") {
    swal("", "Seleccione mes y año", "error");
    return false;
  } else {
    let request = window.XMLHttpRequest
      ? new XMLHttpRequest()
      : new ActiveXObject("Microsoft.XMLHTTP");
    let ajaxUrl = base_url + "/supervision/vistosMes";
    divLoading.style.display = "flex";
    let formData = new FormData();
    formData.append("fecha", fecha);
    formData.append("idpropiedad", idpropiedad);
    request.open("POST", ajaxUrl, true);
    request.send(formData);
    request.onreadystatechange = function () {
      if (request.readyState != 4) return;
      if (request.status == 200) {
        $("#graficaMes").html(request.responseText);
        divLoading.style.display = "none";
        return false;
      }
    };
  }
}

function fntSearchVAnio(idpropiedad) {
  let anio = document.querySelector(".vistosAnio").value;
  if (anio === "") {
    swal("", "Ingrese año ", "error");
    return false;
  }

  let request = window.XMLHttpRequest
    ? new XMLHttpRequest()
    : new ActiveXObject("Microsoft.XMLHTTP");
  let ajaxUrl = base_url + "/supervision/vistosAnio";
  divLoading.style.display = "flex";
  let formData = new FormData();
  formData.append("anio", anio);
  formData.append("idpropiedad", idpropiedad);
  request.open("POST", ajaxUrl, true);
  request.send(formData);
  request.onreadystatechange = function () {
    if (request.readyState != 4) return;
    if (request.status == 200) {
      $("#graficaAnio").html(request.responseText);
      divLoading.style.display = "none";
      return false;
    }
  };
}
