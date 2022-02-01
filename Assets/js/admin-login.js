const form_login = document.querySelector("#form_login");
const formReset = document.querySelector("#form_reset_password");
const formCambiarPass = document.querySelector("#formCambiarPass");
const foto = document.querySelector("#foto");
const delPhoto = document.querySelector(".delPhoto");
const formImagen = document.querySelector("#form-imagen-perfil");
const btnSubmitPhoto = document.querySelector("#btnSubmitPhoto");

document.addEventListener("DOMContentLoaded", function () {
  if (form_login) {
    form_login.onsubmit = function (e) {
      e.preventDefault();

      const password = this.password.value;
      const email = this.email.value;

      if (email.trim() === "") {
        swal("Please", "Type an email.", "error");
        return;
      } else if (!validateEmail(email.trim())) {
        swal("", "Email wrong.", "error");
        return;
      }

      if (password.trim() === "") {
        swal("Please", "Type your password", "error");
        return;
      }

      function fntSuccess() {
        swal("Log In", "Session successfully started. ", "success");
        window.location.reload(false);
      }

      function fntError({ msg }) {
        swal("Hey!", msg, "error");
        form_login.password.value = "";
      }

      const url = "/admin-login/LoginUser";
      ajax(url, "POST", this, fntSuccess, fntError);
    };
  }

  if (formReset) {
    formReset.addEventListener("submit", function (e) {
      e.preventDefault();
      const email = this.email.value;

      if (email.trim() === "") {
        swal("Please", "Type an email.", "error");
        return;
      } else if (!validateEmail(email.trim())) {
        swal("", "Email wrong.", "error");
        return;
      }

      function fntSuccess({ msg }) {
        swal({
          title: "",
          text: msg,
          icon: "success",
          confirmButton: "Accept",
        }).then((isConfirm) => {
          if (isConfirm) {
            window.location = base_url + "/admin-login";
          }
        });
      }

      const url = "/admin-login/resetPass";
      ajax(url, "POST", this, fntSuccess);
    });
  }

  if (formCambiarPass) {
    formCambiarPass.onsubmit = function (e) {
      e.preventDefault();
      const password = this.password.value;
      const passwordConfirm = this.passwordConfirm.value;
      const idUsuario = this.idUsuario.value;

      if (
        password.trim() === "" ||
        passwordConfirm.trim() === "" ||
        idUsuario.trim() === ""
      ) {
        swal("Please", "Type the new password.", "error");
        return;
      }

      if (password.trim().length < 5) {
        swal("Hey!", "The password must be a minimum of 5 characters.", "info");
        return;
      }

      if (password.trim() !== passwordConfirm.trim()) {
        swal("Hey!", "Passwords must be the same.", "info");
        return;
      }

      function fntSuccess({ msg }) {
        swal({
          title: "",
          text: msg,
          icon: "success",
          confirmButton: "Accept",
          closeOnConfirm: false,
          closeOnClickOutside: false,
          closeOnEsc: false,
          allowOutsideClick: false,
          allowEscapeKey: false,
        }).then(() => (window.location = base_url + "/admin-login"));
      }
      const url = "/admin-login/setPassword";
      ajax(url, "POST", this, fntSuccess);
    };
  }
});
