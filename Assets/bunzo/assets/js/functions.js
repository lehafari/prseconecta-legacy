const divLoading = document.querySelector("#divLoading");

function openModal(selector) {
  if (selector === "login-register-form") {
    $("#mobile-menu-overlay").removeClass("active");
  }

  $("#" + selector).modal("show");
}

function showLoading() {
  divLoading.style.display = "flex";
}

function hideLoading() {
  divLoading.style.display = "none";
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

function validateEmail(email) {
  const stringEmail = new RegExp(
    /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/
  );
  if (stringEmail.test(email) === false) {
    return false;
  } else {
    return true;
  }
}

function controlDecimal(value) {
  return value
    .replace(/\D/g, "")
    .replace(/([0-9])([0-9]{3})$/, "$1.$2")
    .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
}

function showMessage(text, status, selector = ".divAlert") {
  let icon;
  const div = document.querySelector(selector);
  const p = document.querySelector(selector + " p");
  if (status === "success") {
    icon = "<i class='bx bx-check-circle'></i>";
    p.classList.replace("text-danger", "text-success");
  } else if (status === "error") {
    icon = "<i class='bx bx-x-circle'></i>";
    p.classList.replace("text-success", "text-danger");
  }

  $(div).slideDown();
  p.innerHTML = icon + " " + text;

  setTimeout(() => {
    $(div).slideUp();
    p.textContent = "";
  }, 10000);
}

function smoothMovement(e) {
  e.preventDefault();
  const destino = e.target.getAttribute("href");
  $("html, body").animate(
    {
      scrollTop: $(destino).offset().top - 50,
    },
    1500
  );
}

function showToast(msg, status) {
  const element = $(".toast");
  element.toast({
    delay: 2500,
  });
  element.find(".toast-body").html(msg);
  const icon = document.querySelector(".toast .icon");
  if (status === "success") {
    element.find(".toast-header").css("background-color", "#00b894");
    element.find(".toast-header").css("color", "#fff");
    icon.classList.replace("bxs-x-circle", "bxs-check-circle");
  } else if (status === "error") {
    icon.classList.replace("bxs-check-circle", "bxs-x-circle");
    element.find(".toast-header").css("background-color", "#d63031");
    element.find(".toast-header").css("color", "#fff");
  }
  element.toast("show");
}
