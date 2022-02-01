<?php headerAdminLogin($data); ?>

<div class="contenedor-formulario">
    <div class="wrap">
        <div id="divLoading">
            <div>
                <img src="<?= media(); ?>/images/loading.svg" alt="Loading">
            </div>
        </div>

        <div class="contenedor-logo">
            <a href="<?= base_url() ?>">
                <img style="width: 150px;" src="<?= media() ?>/images/logo.png" alt="">
            </a>
            <i class='bx bxs-lock-open icon-page'></i>
            <h3>
                <?= $data['page_title'] ?>
            </h3>
        </div>

        <form class="formulario" name="form_reset_password" id="form_reset_password">

            <div>
                <div class="input-group">
                    <input type="email" id="email" name="email">
                    <label class="label" for="email"><i class='bx bx-mail-send'></i> Email:</label>
                </div>

                <button id="btn-submit">
                    Reset Password
                    <i class='bx bxs-lock-open'></i>
                </button>
                <div class="link">
                    <a href="<?= base_url() ?>/admin-login/"> <i class='bx bx-log-in' style="margin-right: 5px;"></i>
                        Go
                        to Admin
                        Login</a>
                </div>

            </div>

        </form>
    </div>
</div>

<?php footerAdminLogin($data); ?>