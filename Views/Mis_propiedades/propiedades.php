<?php headerAdmin($data); ?>

<style>
table.table tr td {
  vertical-align: middle;
}

.swal-button.swal-button--confirm {
  background-color: #dc3545;
}
</style>
<section class="home-section">
  <div style="margin: auto 20px;"
    class="home-content d-sm-flex d-block justify-content-between">
    <h3><i class='bx bx-buildings'></i>
      Propiedades</h3>
    <a href="<?= base_url() ?>/crear-listado"
      class="btn btn-info box-shadow-none d-flex justify-content-center align-items-center">
      Agregar
      <i style="font-size: 15px;margin: 0 5px 0 5px;"
        class='bx bxs-plus-circle ml-1 text-light'></i>
    </a>
  </div>

  <div class="app-content">
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <div class="tile-body">
            <div class="table-responsive">
              <table class="table table-hover table-bordered"
                id="tablePropertys">
                <thead>
                  <tr>
                    <th>Portada</th>
                    <th>Titulo</th>
                    <th class="text-center">Estado</th>
                    <th class="text-center">Precio</th>
                    <th class="text-center">Paquete</th>
                    <th class="text-center">Fecha de Vencimiento</th>
                    <th>Ver</th>
                    <th class="text-center">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (!empty($data['propiedades'])) {
                    foreach ($data['propiedades'] as $propiedad) { ?>
                  <tr>
                    <td class="text-center">
                      <?php if (!empty($propiedad['portada'])) { ?>
                      <img style="width: 170px;"
                        src="<?= media() ?>/images/uploads/<?= $propiedad['portada'] ?>"
                        alt="Portada de: <?= $propiedad['titulo'] ?>">
                      <?php } else { ?>
                      <p>Sin portada</p>
                      <?php } ?>
                    </td>
                    <td>
                      <a target="_blank"
                        href="<?= base_url() ?>/resultados-busqueda?listing_id=<?= $propiedad['idpropiedad'] ?>">
                        <h5>
                          <img style="width: 20px;"
                            src="<?= media() ?>/images/award.svg" alt="award">
                          <?= $propiedad['titulo'] ?>
                        </h5>
                      </a>
                      <span class="badge badge-success">Aprobado</span>
                      <br>
                      <p class="mb-2">
                        <span class="font-weight-bold">Tipo:</span>
                        <small>
                          <?= $propiedad['tipo'] ?><?= !empty($propiedad['subtipo']) ? ', ' . $propiedad['subtipo'] : '' ?>

                        </small>
                      </p>
                      <p>
                        <img style="width: 20px;"
                          src="<?= media() ?>/images/puerto-rico.svg"
                          alt="puerto-rico">
                        <small><?= $propiedad['direccion_localizacion'] ?></small>
                      </p>
                    </td>

                    <td class="text-center"><?= $propiedad['tipo'] ?></td>
                    <td class="font-weight-bold text-center">
                      <?= formatMoney($propiedad['precio']) . SMONEY ?>
                    </td>
                    <td class="text-center">
                      <?php if ($propiedad['statuspackage'] === 'Gratuito' || $propiedad['statuspackage'] === 'Pagado') { ?>
                      <span
                        class="badge badge-success"><?= $propiedad['statuspackage'] ?></span>
                      <?php } else { ?>
                      <span
                        class="badge badge-danger"><?= $propiedad['statuspackage'] ?></span>
                      <?php } ?>
                    </td>
                    <td class="font-weight-bold text-center">
                      <?= $propiedad['fecha_vencimiento'] ?>
                    </td>
                    <td> <?php if (intval($propiedad['status']) === 1) { ?>
                      <p>Visto para el público</p>
                      <?php } else { ?>
                      <p>Escondido para el público</p>
                      <?php } ?>
                    </td>
                    <td>
                      <div class="d-flex justify-content-center">
                        <div class="btn-group">
                          <button type="button" class="btn btn-sm"
                            style="border-radius: 50%;" data-toggle="dropdown"
                            aria-haspopup="false" aria-expanded="false">
                            <i style="font-size: 20px;"
                              class='bx bx-dots-vertical text-info font-weight-bold'></i>
                          </button>
                          <div class="dropdown-menu">
                            <?php if ($propiedad['statuspackage'] === 'Gratuito') { ?>
                            <a href="<?= base_url() ?>/mis-propiedades/destacar-propiedad/<?= $propiedad['idpropiedad'] ?>"
                              class="dropdown-item btn-outline-info">
                              <i class='bx bxs-star'></i>
                              Destacar Propiedad
                            </a>
                            <?php } ?>
                            <a href="<?= base_url() ?>/supervision?listing_id=<?= $propiedad['idpropiedad'] ?>"
                              class="dropdown-item btn-outline-info">
                              <i class='bx bx-line-chart'></i>
                              Ver estadísticas
                            </a>
                            <a href="<?= base_url() ?>/mis-propiedades/editar/<?= $propiedad['idpropiedad'] ?>"
                              class="dropdown-item btn-outline-info"><i
                                class='bx bxs-pencil'></i>
                              Editar
                            </a>
                            <button
                              onclick="deletePropiedad('<?= openssl_encrypt($propiedad['idpropiedad'], METHODENCRIPT, KEY) ?>',this)"
                              class="dropdown-item btn-outline-danger"><i
                                class='bx bxs-trash'></i> Eliminar
                            </button>
                            <?php if (intval($propiedad['status']) === 1) { ?>
                            <button
                              class="dropdown-item btn-outline-info btnEspera"
                              s="0" idp="<?= $propiedad['idpropiedad'] ?>">
                              <i class='bx bx-pause-circle'></i>
                              Esconder propiedad
                            </button>
                            <?php } else { ?>
                            <button
                              class="dropdown-item btn-outline-info btnEspera"
                              s="1" idp="<?= $propiedad['idpropiedad'] ?>">
                              <i class='bx bx-pause-circle'></i>
                              Mostrar propiedad
                            </button>
                            <?php } ?>
                            <?php if (
                                  ($propiedad['packageid'] == PAQUETE_SUPER_DESTACADO
                                    || $propiedad['packageid'] == PAQUETE_DESTACADO)
                                  && $propiedad['statuspackage'] === 'No Pagado'
                                ) { ?>
                            <a href="<?= base_url() ?>/crear-listado/pagar-propiedad/<?= $propiedad['idpropiedad'] . '/' . $propiedad['ruta'] ?>"
                              class="dropdown-item btn-outline-info">
                              <i class='bx bxs-star'></i> Pagar Ahora
                            </a>
                            <?php } ?>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <?php }
                  } else { ?>
                  <tr>
                    <td colspan="6" class="text-center">
                      <h4>Todavia no hay propiedades agregadas</h4>
                      <a href="<?= base_url() ?>/crear-listado"
                        class="btn btn-block btn-info box-shadow-none mt-3 d-flex justify-content-center align-items-center">Agregar
                        <i class='bx bxs-plus-circle ml-1'></i></a>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php footerAdmin($data); ?>