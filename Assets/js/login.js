const formRegistroAgentes = document.querySelector('#form_registro_agente')
const formCambiarPass = document.querySelector('#formCambiarPass')
document.addEventListener('DOMContentLoaded', function (e) {
    if (formRegistroAgentes) {
        formRegistroAgentes.addEventListener('submit', function (e) {
            e.preventDefault();

            const nombre = this.nombres.value
            const apellido = this.apellidos.value
            const email = this.correo.value
            const telefono = this.telefono.value
            const password = this.password.value
            const passwordConfirm = this.passwordConfirm.value

            if (nombre.trim() === '' || apellido.trim() === '') {
                swal('Por favor', 'Rellena los datos nombre y apellido', 'error')
                return
            }

            if (email.trim() === '') {
                swal('Por favor', 'Rellena el campo correo', 'error')
                return
            } else if (!validateEmail(email.trim())) {
                swal('Por favor', 'Coloca un email válido', 'error')
                return
            }

            if (telefono.trim() === '') {
                swal('Por favor', 'Rellena el campo teléfono', 'error')
                return
            }

            if (password.trim() === '' || passwordConfirm === '') {
                swal('Por favor', 'Coloca tu contraseña', 'info')
                return
            } else {

                if (password.trim() !== passwordConfirm.trim()) {
                    swal('', 'Las dos contraseñas tienen que ser iguales', 'info')
                    return
                }

                if (password.trim().length < 5) {
                    swal('Por favor', 'La contraseña tiene que ser mayor o igual a 5 carácteres', 'info')
                    return
                }

            }

            function fntSucces({ msg }) {
                swal({
                    title: '',
                    text: msg,
                    type: 'success',
                    confirmButton: 'Aceptar',
                    closeOnConfirm: false,
                    closeOnClickOutside: false,
                    closeOnEsc: false,
                    allowOutsideClick: false,
                    dangerMode: true,
                    allowEscapeKey: false
                }, () => window.location = base_url + '/perfil')
            }

            const url = '/login/registroAgente'

            ajax(url, 'POST', this, fntSucces)
        })
    }

    if (formCambiarPass) {
        formCambiarPass.onsubmit = function (e) {
            e.preventDefault();
            const password = this.password.value;
            const passwordConfirm = this.passwordConfirm.value;
            const idUsuario = this.idUsuario.value;

            if (password.trim() === '' || passwordConfirm.trim() === '' || idUsuario.trim() === '') {
                swal('Please', 'Type the new password.', 'error');
                return;
            }

            if (password.trim().length < 5) {
                swal('Hey!', 'The password must be a minimum of 5 characters.', 'info');
                return;
            }

            if (password.trim() !== passwordConfirm.trim()) {
                swal('Hey!', 'Passwords must be the same.', 'info');
                return;
            }

            function fntSuccess({ msg }) {
                swal({
                    title: '',
                    text: msg,
                    type: 'success',
                    confirmButton: 'Accept',
                    closeOnConfirm: false,
                    closeOnClickOutside: false,
                    closeOnEsc: false,
                    allowOutsideClick: false,
                    dangerMode: true,
                    allowEscapeKey: false
                }, () => window.location = base_url)
            }
            const url = '/login/setPassword';
            ajax(url, 'POST', this, fntSuccess)
        }
    }
})