const formLogin = document.querySelector("#form-login");
const formRegister = document.querySelector("#form-register");
const formRecover = document.querySelector("#form-recover");
const formReviews = document.querySelector("#frm-reviews");
const formMensajePerfil = document.getElementById("formMensajePerfil");
const tipopropiedadSelect = document.getElementById("tipopropiedad");
const tipoestadoSelect = document.getElementById("tipoestado");
document.addEventListener("DOMContentLoaded", function () {
  $(".selectpicker").selectpicker("render");

  let altura = 0;

  if (document.querySelector(".menu")) {
    altura = $(".menu").offset().top;
  }

  $(window).on("scroll", function () {
    if (document.querySelector(".menu")) {
      if ($(window).scrollTop() > altura) {
        $(".menu").addClass("menu-fixed");
        $(".menu").width($("#wrappermenu").width());
      } else {
        $(".menu").removeClass("menu-fixed");
      }
    }
  });

  if (tipopropiedadSelect) {
    tipopropiedadSelect.addEventListener("change", function () {
      const value = this.value;
      $.get(base_url + "/home/getSubtipos/" + value).done((response) => {
        const respuesta = JSON.parse(response);
        let html = "";
        respuesta.forEach((subtipo, index) => {
          html += `<option ${index === 0 ? "selected" : ""}  value="${
            subtipo.idsubtipo
          }">${subtipo.titulo}</option>`;
        });
        $(tipoestadoSelect).html(html);
        const sVal = $(tipoestadoSelect).find("option:first").val();
        $(".selectpicker").selectpicker("render");
        $(tipoestadoSelect).val(sVal);

        $(".selectpicker").selectpicker("refresh");
        $(tipoestadoSelect)
          .next()
          .find(".filter-option-inner-inner")
          .html($(tipoestadoSelect).find("option:selected").text());
      });
    });
  }

  if (formLogin) {
    formLogin.onsubmit = function (e) {
      e.preventDefault();
      const email = this.email.value;
      const password = this.password.value;
      const btn = formLogin.querySelector('button[type="submit"]');

      if (email.trim() === "") {
        showMessage("Introduce tu correo", "error");
        return;
      }

      if (password.trim() === "") {
        showMessage("Introduce tu contraseña", "error");
        return;
      }

      const url = base_url + "/login/LoginUser";
      btn.innerHTML =
        btn.innerHTML + "<i class='bx bx-loader-circle bx-spin ml-1' ></i>";
      btn.setAttribute("disabled", true);
      $.post(url, $(this).serialize()).done((response) => {
        const { status, msg } = JSON.parse(response);
        if (status) {
          showMessage("Sesión iniciada correctamente.", "success");
          setTimeout(() => {
            if (document.querySelector("#comentarios")) {
              window.location.reload(), 500;
            } else {
              window.location = base_url + "/perfil";
            }
          });
        } else {
          showMessage(msg, "error");
          btn.removeChild(btn.lastChild);
          btn.removeAttribute("disabled");
        }
      });
    };
  }

  if (formRegister) {
    formRegister.onsubmit = function (e) {
      e.preventDefault();
      const username = this.username.value;
      const nombre = this.nombres.value;
      const apellidos = this.apellidos.value;
      const email = this.emailRegister.value;
      const password = this.passwordRegister.value;
      const passwordConfirm = this.passwordRegisterConfirm.value;
      const btn = formRegister.querySelector('button[type="submit"]');

      if (nombre.trim() === "") {
        showMessage("Introduce el nombre de usuario.", "error");
        return;
      }

      if (nombre.trim() === "") {
        showMessage("Introduce tu nombre.", "error");
        return;
      }

      if (apellidos.trim() === "") {
        showMessage("Introduce tu apellido.", "error");
        return;
      }

      if (email.trim() === "") {
        showMessage("Introduce tu correo.", "error");
        return;
      }

      if (password.trim() === "") {
        showMessage("Introduce tu contraseña.", "error");
        return;
      } else {
        if (password.trim().length < 4) {
          showMessage(
            "La contraseña debe ser mayor o igual de 5 carácteres.",
            "error"
          );
          return;
        }
        if (password.trim() !== passwordConfirm) {
          showMessage("Las contraseñas no coinciden.", "error");
          return;
        }
      }

      if (!document.getElementById("checkterminos").checked) {
        showMessage("Tienes que aceptar los términos y condiciones.", "error");
        return;
      }

      const url = "/login/registrar";
      btn.innerHTML =
        btn.innerHTML + "<i class='bx bx-loader-circle bx-spin ml-1' ></i>";
      btn.setAttribute("disabled", true);
      $.post(url, $(this).serialize()).done((response) => {
        const { status, msg } = JSON.parse(response);
        if (status) {
          showMessage(msg, "success");
          setTimeout(() => {
            if (document.querySelector("#comentarios")) {
              window.location.reload(), 500;
            } else {
              window.location = base_url + "/perfil";
            }
          });
        } else {
          showMessage(msg, "error");
          btn.removeChild(btn.lastChild);
          btn.removeAttribute("disabled");
        }
      });
    };
  }

  if (formRecover) {
    formRecover.addEventListener("submit", function (e) {
      e.preventDefault();
      const correo = this.correoRecover.value;
      const div = ".divAlertRecoverEmail";
      if (correo.trim() === "") {
        showMessage("El campo correo no puede estar vacío", "error", div);
        return;
      } else if (!validateEmail(correo.trim())) {
        showMessage("El correo no es válido", "error", div);
        return;
      }

      function fntSucess({ msg }) {
        showMessage(msg, "success", div);
        formRecover.reset();
      }

      function fntError({ msg }) {
        showMessage(msg, "error", div);
      }
      const url = "/login/recoverAccount";
      ajax(url, "POST", this, fntSucess, fntError);
    });
  }

  if (formReviews) {
    formReviews.addEventListener("submit", function (e) {
      e.preventDefault();
      const comentario = this.comentario.value;
      const idpersona = this.idpersona.value;

      const divAlert = ".divAlertReviews";
      if (comentario.trim() === "" || idpersona.trim() === "") {
        showMessage("Es obligatorio colocar un mensaje", "error", divAlert);
        return;
      }

      function fntSuccess({ msg, html }) {
        showMessage(msg, "success", divAlert);
        formReviews.reset();
        $("#comentarios").prepend(html);
        $("#mensajenohaycomentarios").remove();
      }

      function fntError({ msg }) {
        showMessage(msg, "error", divAlert);
      }

      const url = "/agentes/comentarAgente";
      ajax(url, "POST", this, fntSuccess, fntError);
    });
  }

  if (formMensajePerfil) {
    formMensajePerfil.addEventListener("submit", function (e) {
      e.preventDefault();
      const nombre = this.name.value;
      const telefono = this.telefono.value;
      const email = this.email.value;
      const mensaje = this.email.value;

      const divAlert = ".divAlertMensajeAgente";
      if (nombre.trim() === "") {
        showMessage("Nombre no puede ir vacío", "error", divAlert);
        return;
      }

      if (telefono.trim() === "") {
        showMessage("Teléfono no puede ir vacío", "error", divAlert);
        return;
      }

      if (email.trim() === "") {
        showMessage("Es obligatorio colocar correo", "error", divAlert);
        return;
      }

      if (mensaje.trim() === "") {
        showMessage("Por favor, escribe un mensaje...", "error", divAlert);
        return;
      }

      if (!document.getElementById("checkterminosperfil").checked) {
        showMessage(
          "Tienes que aceptar los términos y condiciones.",
          "error",
          divAlert
        );
        return;
      }

      const url = "/agentes/sendMensajeAgente";

      function fntSuccess() {
        showMessage("Mensaje enviado correctamente!", "success", divAlert);
      }
      ajax(url, "POST", this, fntSuccess);
    });
  }

  $(".modal-box-nav a").click(function (e) {
    $(".modal-box-nav a").removeClass("active");
    $(this).addClass("active");
    e.preventDefault();

    if (document.querySelector(this.getAttribute("href"))) {
      document.querySelector(this.getAttribute("href")).scrollIntoView({
        behavior: "smooth",
      });
    }
  });

  $(".modal-box-nav-icon.left").click(function () {
    const activeA = document.querySelector(".modal-box-nav a.active");
    const idactiveA = activeA.getAttribute("data-id-modal-box-nav");
    const prevA = document.querySelector(
      `.modal-box-nav a[data-id-modal-box-nav="${parseInt(idactiveA) - 1}"]`
    );
    if (prevA) {
      prevA.click();
    } else {
      const todosloselementosA = document.querySelectorAll(".modal-box-nav a");
      let arrayIdModalBox = [];
      todosloselementosA.forEach((element) =>
        arrayIdModalBox.push(element.getAttribute("data-id-modal-box-nav"))
      );
      const ultimoId = Math.max(...arrayIdModalBox);
      document.querySelector(`a[data-id-modal-box-nav="${ultimoId}"]`).click();
    }
  });

  $(".modal-box-nav-icon.right").click(function () {
    const activeA = document.querySelector(".modal-box-nav a.active");
    const idactiveA = activeA.getAttribute("data-id-modal-box-nav");
    const nextA = document.querySelector(
      `.modal-box-nav a[data-id-modal-box-nav="${parseInt(idactiveA) + 1}"]`
    );
    if (nextA) {
      nextA.click();
    } else {
      document.querySelector(`a[data-id-modal-box-nav="1"]`).click();
    }
  });
});

if (document.getElementById("slider-1")) {
  window.onload = function () {
    slideOne();
    slideTwo();
  };

  const sliderOne = document.getElementById("slider-1");
  const sliderTwo = document.getElementById("slider-2");
  const displayValOne = document.getElementById("range1");
  const displayValTwo = document.getElementById("range2");
  let minGap = 0;
  const sliderTrack = document.querySelector(".slider-track");
  const sliderMaxValue = document.getElementById("slider-1").max;

  function slideOne() {
    if (parseInt(sliderTwo.value) - parseInt(sliderOne.value) <= minGap) {
      sliderOne.value = parseInt(sliderTwo.value) - minGap;
    }
    displayValOne.textContent = controlDecimal(sliderOne.value);
    fillColor();
  }
  function slideTwo() {
    if (parseInt(sliderTwo.value) - parseInt(sliderOne.value) <= minGap) {
      sliderTwo.value = parseInt(sliderOne.value) + minGap;
    }
    displayValTwo.textContent = controlDecimal(sliderTwo.value);
    fillColor();
  }
  function fillColor() {
    percent1 = (sliderOne.value / sliderMaxValue) * 100;
    percent2 = (sliderTwo.value / sliderMaxValue) * 100;
    sliderTrack.style.background = `linear-gradient(to right, #dadae5 ${percent1}% , #3264fe ${percent1}% , #3264fe ${percent2}%, #dadae5 ${percent2}%)`;
  }
}

async function editarComentario(e, idcomentario, button) {
  const comentario = await axios({
    url: base_url + "/agentes/selectComentario",
    params: { idcomentario },
  });
  const { data } = comentario;
  if (data.status) {
    const row =
      button.parentElement.parentElement.parentElement.parentElement
        .parentElement.children;
    const contenedor = row[row.length - 1];
    const textarea = document.createElement("textarea");
    const btnsubmit = document.createElement("button");
    btnsubmit.className = "btn btn-danger btn-sm mt-2";
    btnsubmit.innerHTML = '<i class="bx bxs-edit-alt"></i> Editar';
    btnsubmit.setAttribute("idcomentario", idcomentario);
    btnsubmit.addEventListener("click", function () {
      editInfoComment(this, contenedor);
    });
    textarea.className = "form-control";
    textarea.value = data.text;
    contenedor.innerHTML = "";
    contenedor.appendChild(textarea);
    contenedor.appendChild(btnsubmit);
  } else {
    swal("", data.msg, "error");
  }
}

async function eliminarComentario(e, idcomentario, button) {
  let formData = new FormData();
  formData.append("idcomentario", idcomentario);
  const url = "/agentes/delComentario";
  function fntSuccess({ msg }) {
    const tile =
      button.parentElement.parentElement.parentElement.parentElement
        .parentElement.parentElement.parentElement.parentElement.parentElement;

    $(tile).remove();
    showToast(msg, "success");
  }

  function fntError({ msg }) {
    showToast(msg, "error");
  }

  ajax(url, "POST", formData, fntSuccess, fntError);
}

async function editInfoComment(button, container) {
  const idcomentario = button.getAttribute("idcomentario");
  const comentario = button.parentElement.children[0].value;

  const url = `${base_url}/agentes/editInfoComment`;
  const data = { idcomentario, comentario };
  showLoading();
  $.post(url, data).done((response) => {
    hideLoading();
    const respuesta = JSON.parse(response);
    if (respuesta.status) {
      container.innerHTML = comentario;
      showToast(respuesta.msg, "success");
    } else {
      if (respuesta.reload) {
        window.location.reload();
      }
      showToast(respuesta.msg, "error");
    }
  });
}

function handleHoverProperty(idpropiedad) {
  console.log(idpropiedad);
  console.log(map);
}

let map, infoWindow;
const TILE_SIZE = 256;

const modalPropiedad = document.querySelector("#modalPropiedad");
if (modalPropiedad) {
  $(modalPropiedad).modal("show");
}

function iniciarMap() {
  map = new google.maps.Map(document.getElementById("map"), {
    zoom: 10,
    center: coord,
    disableDefaultUI: true,
    /*     mapTypeControl: true,
    mapTypeControlOptions: {
      style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
      position: google.maps.ControlPosition.TOP_RIGHT,
      mapTypeIds: [
        google.maps.MapTypeId.ROADMAP,
        google.maps.MapTypeId.HYBRID,
        google.maps.MapTypeId.TERRAIN,
        google.maps.MapTypeId.SATELLITE,
      ],
    },
    zoomControl: true,
    zoomControlOptions: {
      position: google.maps.ControlPosition.TOP_LEFT,
      style: google.maps.ZoomControlStyle.SMALL,
    }, */
  });

  initZoomControl(map);
  initMapTypeControl(map);
  initFullscreenControl(map);

  /*  const chicago = new google.maps.LatLng(coord.lat, coord.lng);
  const coordInfoWindow = new google.maps.InfoWindow(); */

  /*   coordInfoWindow.setContent(createInfoWindowContent(chicago, map.getZoom()));
  coordInfoWindow.setPosition(chicago);
  coordInfoWindow.open(map);
  map.addListener("zoom_changed", () => {
    if (textTileMaps) {
      coordInfoWindow.setContent(
        createInfoWindowContent(chicago, map.getZoom())
      );
      coordInfoWindow.open(map);
    }
  }); */

  const marker = new google.maps.Marker({
    position: coord,
    map,
  });

  let mapaPropiedad = document.querySelector(".mapaPropiedad");

  if (mapaPropiedad) {
    const lat =
      parseFloat(modalPropiedad.getAttribute("lat")) === NaN
        ? 0
        : parseFloat(modalPropiedad.getAttribute("lat"));
    const lng =
      parseFloat(modalPropiedad.getAttribute("long")) === NaN
        ? 0
        : parseFloat(modalPropiedad.getAttribute("long"));
    mapaPropiedad = new google.maps.Map(mapaPropiedad, {
      zoom: 9,
      center: { lat, lng },
    });
    let markerPropiedad = new google.maps.Marker({
      position: { lat, lng },
      map: mapaPropiedad,
    });
  }
}

function createInfoWindowContent(latLng, zoom) {
  const scale = 1 << zoom;
  const worldCoordinate = project(latLng);

  if (textTileMaps) {
    return [textTileMaps].join("<br>");
  }
  return null;
}

// The mapping between latitude, longitude and pixels is defined by the web
// mercator projection.
function project(latLng) {
  let siny = Math.sin((latLng.lat() * Math.PI) / 180);

  // Truncating to 0.9999 effectively limits latitude to 89.189. This is
  // about a third of a tile past the edge of the world tile.
  siny = Math.min(Math.max(siny, -0.9999), 0.9999);
  return new google.maps.Point(
    TILE_SIZE * (0.5 + latLng.lng() / 360),
    TILE_SIZE * (0.5 - Math.log((1 + siny) / (1 - siny)) / (4 * Math.PI))
  );
}

function initZoomControl(map) {
  document.querySelector(".zoom-control-in").onclick = function () {
    map.setZoom(map.getZoom() + 1);
  };

  document.querySelector(".zoom-control-out").onclick = function () {
    map.setZoom(map.getZoom() - 1);
  };

  map.controls[google.maps.ControlPosition.LEFT_TOP].push(
    document.querySelector(".zoom-control")
  );
}

function initMapTypeControl(map) {
  const mapTypeControlDiv = document.querySelector(".maptype-control");

  const ul = document.querySelector(".dropdown-map").children;
  Array.prototype.slice.call(ul).forEach((li) => {
    li.addEventListener("click", function () {
      map.setMapTypeId(this.getAttribute("data-maptye"));
    });
  });

  map.controls[google.maps.ControlPosition.RIGHT_TOP].push(mapTypeControlDiv);
}

function initFullscreenControl(map) {
  const elementToSendFullscreen = map.getDiv().firstChild;
  const fullscreenControl = document.querySelector(".fullscreen-control");

  map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(
    fullscreenControl
  );
  fullscreenControl.onclick = function () {
    if (isFullscreen(elementToSendFullscreen)) {
      exitFullscreen();
    } else {
      requestFullscreen(elementToSendFullscreen);
    }
  };

  document.onwebkitfullscreenchange =
    document.onmsfullscreenchange =
    document.onmozfullscreenchange =
    document.onfullscreenchange =
      function () {
        if (isFullscreen(elementToSendFullscreen)) {
          fullscreenControl.classList.add("is-fullscreen");
        } else {
          fullscreenControl.classList.remove("is-fullscreen");
        }
      };
}

function isFullscreen(element) {
  return (
    (document.fullscreenElement ||
      document.webkitFullscreenElement ||
      document.mozFullScreenElement ||
      document.msFullscreenElement) == element
  );
}

function requestFullscreen(element) {
  if (element.requestFullscreen) {
    element.requestFullscreen();
  } else if (element.webkitRequestFullScreen) {
    element.webkitRequestFullScreen();
  } else if (element.mozRequestFullScreen) {
    element.mozRequestFullScreen();
  } else if (element.msRequestFullScreen) {
    element.msRequestFullScreen();
  }
}

function exitFullscreen() {
  if (document.exitFullscreen) {
    document.exitFullscreen();
  } else if (document.webkitExitFullscreen) {
    document.webkitExitFullscreen();
  } else if (document.mozCancelFullScreen) {
    document.mozCancelFullScreen();
  } else if (document.msExitFullscreen) {
    document.msExitFullscreen();
  }
}
