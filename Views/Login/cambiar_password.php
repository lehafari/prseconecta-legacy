<?php 
headerAdminLogin($data); 

?>

<div class="contenedor-formulario">
    <div class="wrap" style="max-width: 400px;">
        <div id="divLoading">
            <div>
                <img src="<?= media(); ?>/images/loading.svg" alt="Loading">
            </div>
        </div>

        <div class="contenedor-logo">
            <i class='bx bxs-lock-open icon-page'></i>
            <h3>
                <?= $data['page_title'] ?>
            </h3>
        </div>

        <form class="formulario" name="formCambiarPass" id="formCambiarPass">
            <input type="hidden" name="idUsuario" value="<?= $data['idpersona'] ?>">
            <input type="hidden" name="email" value="<?= $data['email'] ?>">
            <input type="hidden" name="token" value="<?= $data['token'] ?>">
            <div>
                <div class="input-group">
                    <input type="password" id="password" name="password">
                    <label class="label" for="password"><i class='bx bxs-lock-alt'></i> Contraseña:</label>
                </div>
                <div class="input-group">
                    <input type="password" id="passwordConfirm" name="passwordConfirm">
                    <label class="label" for="passwordConfirm"><i class='bx bxs-lock-alt'></i>Confirmar
                        Contraseña:</label>
                </div>

                <button id="btn-submit">
                    Cambiar contraseña
                    <i class='bx bxs-lock-open'></i>
                </button>
            </div>
        </form>
    </div>
</div>

<?php footerAdminLogin($data); ?>