<div class="modal fade login-register-form" id="login-register-form"
  tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info p-0">
        <ul class="nav nav-pills" id="pills-tab" role="tablist">
          <li class="nav-item border-0" role="presentation">
            <a class="nav-link active" id="pills-home-tab" data-toggle="pill"
              href="#pills-home" role="tab" aria-controls="pills-home"
              aria-selected="true">Iniciar Sesión</a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" id="pills-profile-tab" data-toggle="pill"
              href="#pills-profile" role="tab" aria-controls="pills-profile"
              aria-selected="false">Registro</a>
          </li>
        </ul>
        <button type="button" class="close mt-0 mr-0 text-white"
          data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="alert divAlert">
          <p class="text-danger">

          </p>
        </div>
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
            aria-labelledby="pills-home-tab">
            <div class="px-3">
              <form id="form-login" novalidate>
                <div class="mb-3">
                  <label for="email" class="form-label"><i
                      class='bx bx-user'></i>
                    Correo o nombre de Usuario</label>
                  <input type="text" class="form-control form-control-sm"
                    id="email" name="email">
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label"><i
                      class='bx bx-lock-alt'></i>
                    Contraseña</label>
                  <input type="password" class="form-control form-control-sm"
                    id="password" name="password">
                </div>
                <div class="d-flex justify-content-between">
                  <a href="#" data-dismiss="modal" aria-label="Close"
                    data-toggle="modal" data-target="#login-recover-form"
                    class="text-link">¿Olvidaste la contraseña?</a>
                </div>
                <button type="submit"
                  class="btn btn-primary btn-submit-auth">Iniciar Sesión <i
                    class='bx bx-log-in-circle'></i></button>
              </form>
            </div>
          </div>
          <div class="tab-pane fade" id="pills-profile" role="tabpanel"
            aria-labelledby="pills-profile-tab">
            <div class="container-fluid">
              <form id="form-register">
                <div class="mb-3">
                  <label for="username" class="form-label">
                    <i class='bx bx-user'></i> Nombre de usuario
                  </label>
                  <input type="text"
                    placeholder="Introduce tu nombre de usuario"
                    class="form-control form-control-sm" id="username"
                    name="username">
                </div>
                <div class="mb-3">
                  <label for="nombres" class="form-label">
                    Nombres
                  </label>
                  <input type="text" placeholder="Introduce tu nombre"
                    class="form-control form-control-sm" id="nombres"
                    name="nombres">
                </div>
                <div class="mb-3">
                  <label for="apellidos" class="form-label">
                    Apellidos
                  </label>
                  <input type="text" placeholder="Introduce tu apellido"
                    class="form-control form-control-sm" id="apellidos"
                    name="apellidos">
                </div>
                <div class="mb-3">
                  <label for="emailRegister" class="form-label"><i
                      class='bx bx-mail-send'></i>
                    Correo</label>
                  <input type="email" placeholder="Introduce tu correo"
                    class="form-control form-control-sm" id="emailRegister"
                    name="emailRegister">
                </div>
                <div class="mb-3">
                  <label for="rolRegister" class="form-label"><i
                      class='bx bxs-user-circle'></i>
                    Tipo de usuario:</label>

                  <select name="rolRegister" id="rolRegister"
                    class="form-control form-control-sm selectpicker">
                    <option value="<?= RCLIENTES ?>">Cliente</option>
                    <option value="<?= RAGENTES ?>">Agente</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="passwordRegister" class="form-label"><i
                      class='bx bx-lock-alt'></i>
                    Contraseña</label>
                  <input type="password" class="form-control form-control-sm"
                    id="passwordRegister" name="passwordRegister">
                </div>
                <div class="mb-3">
                  <label for="passwordRegisterConfirm" class="form-label"><i
                      class='bx bx-lock-alt'></i>
                    Confirmar Contraseña
                  </label>
                  <input type="password" class="form-control form-control-sm"
                    id="passwordRegisterConfirm" name="passwordRegisterConfirm">
                </div>
                <div class="form-check mb-3">
                  <input class="form-check-input" type="checkbox"
                    id="checkterminos">
                  <label class="form-check-label" for="checkterminos">
                    Aceptar <a href="<?= base_url() ?>/Terminos-y-condiciones"
                      class="text-info" target="_blank">
                      términos y condiciones
                    </a>
                  </label>
                </div>
                <button type="submit"
                  class="btn btn-primary btn-submit-auth">Registrarse <i
                    class='bx bx-user-pin'></i></button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="login-recover-form" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header d-flex justify-content-end bg-info p-3">
        <button type="button" class="btn close ml-auto text-white"
          data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="alert divAlertRecoverEmail" style="display: none;">
          <p class="text-danger">

          </p>
        </div>
        <form name="form-recover" id="form-recover" novalidate>
          <p>Introduce tu correo, para recuperar tu contraseña</p>
          <div class="mb-3">
            <label for="correoRecover" class="form-label"><i
                class='bx bx-mail-send'></i>
              Correo
            </label>
            <input type="email" class="form-control" id="correoRecover"
              name="correoRecover" placeholder="Correo">
          </div>
          <a href="#" data-dismiss="modal" aria-label="Close"
            data-toggle="modal" data-target="#login-register-form"
            class="text-link">Iniciar Sesión</a>
          <button type="submit"
            class="btn btn-primary btn-submit-auth">Recuperar Contraseña <i
              class='bx bxs-lock-open'></i></button>
        </form>
      </div>
    </div>
  </div>
</div>