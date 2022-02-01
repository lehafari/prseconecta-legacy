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
            <i class='bx bxs-user-circle icon-page'></i>
            <h3>
                <?= $data['page_title'] ?>
            </h3>
        </div>

        <form class="formulario" name="form_login" id="form_login">

            <div>
                <div class="input-group">
                    <input type="email" id="email" name="email">
                    <label class="label" for="email"><i class='bx bx-mail-send'></i> Email:</label>
                </div>
                <div class="input-group">
                    <input type="password" id="password" name="password">
                    <label class="label" for="pass"><i class='bx bx-lock-alt'></i> Password:</label>
                </div>

                <button id="btn-submit">
                    Log In
                    <i class='bx bx-log-in'></i>
                </button>
                <div class="link">
                    <a href="<?= base_url() ?>/admin-login/reset-password">Forgot your password? <i
                            class='bx bxs-lock-open'></i></a>
                </div>

            </div>

        </form>
    </div>
</div>

<?php footerAdminLogin($data); ?>