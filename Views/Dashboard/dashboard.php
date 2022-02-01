<?php
headerAdmin($data);
$permisos = $_SESSION['permisos'];
?>



<div class="row">
  <div class="col-md-12">
    <div class="tile pb-1">
      <div class="tile-title d-flex align-items-center">
        <i class='bx bxs-tachometer mr-2'></i>
        <?= $data['page_title'] ?>
      </div>
    </div>
  </div>
</div>

<?php if (!empty($_SESSION['permisosMod']['r'])) { ?>
<div class="row">
  <div class="col-md-12">
    <div class="row">
      <?php if (!empty($permisos[MUSUARIOS]['r'])) { ?>
      <div class="col-xl-3 col-lg-6 col-md-12">
        <a href="<?= base_url() ?>/users">
          <div class="widget-small info coloured-icon">
            <i class="icon bx bxs-user"></i>
            <div class="info">
              <h4 class="font-weight-bold">Users</h4>
              <p><b><?= $data['totalUsuarios'] ?></b></p>
            </div>
          </div>
        </a>
      </div>
      <?php } ?>
      <?php if (!empty($permisos[MAGENTS]['r'])) { ?>
      <div class="col-xl-3 col-lg-6 col-md-12">
        <a href="<?= base_url() ?>/agents">

          <div class="widget-small dark coloured-icon">
            <i class="icon bx bxs-user-voice"></i>
            <div class="info">
              <h4 class="font-weight-bold">Agents</h4>
              <p><b><?= $data['totalAgentes'] ?></b></p>
            </div>
          </div>
        </a>
      </div>
      <?php } ?>
      <?php if (!empty($permisos[MCLIENTS]['r'])) { ?>
      <div class=" col-xl-3 col-lg-6 col-md-12">
        <a href="<?= base_url() ?>/clients">

          <div class="widget-small danger coloured-icon">
            <i class="icon bx bxs-user"></i>
            <div class="info">
              <h4 class="font-weight-bold">Clients</h4>
              <p><b><?= $data['totalClientes'] ?></b></p>
            </div>
          </div>
        </a>
      </div>
      <?php } ?>
      <?php if (!empty($permisos[MPROPERTYS]['r'])) { ?>
      <div class="col-xl-3 col-lg-6 col-md-12">
        <a href="<?= base_url() ?>/propertys">
          <div class="widget-small warning coloured-icon">
            <i class="icon bx bx-buildings"></i>
            <div class="info">
              <h4 class="font-weight-bold">Propertys</h4>
              <p><b>100</b></p>
            </div>
          </div>
        </a>
      </div>
      <?php } ?>

    </div>

  </div>
</div>

<div class="row">
  <?php if (!empty($permisos[MAGENTS]['r'])) { ?>
  <div class="col-md-6">
    <div class="container-fluid">
      <div class="tile">
        <div class="tile-body">
          <div class="tile-title">
            <h2 class="font-weight-bolder text-capitalize">Last Five Agents</h2>
            <hr class="bg-info">
          </div>
          <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Fullname</th>
                  <th scope="col">Email</th>
                  <th scope="col" class="text-center">Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($data['LastAgents'])) {
                      $indexAgentes = 1; ?>
                <?php foreach ($data['LastAgents'] as $agente) {
                        $url = base_url() . '/agents/agent/' . $agente['idpersona'];
                      ?>
                <tr>
                  <td><?= $indexAgentes ?></td>
                  <td><?= $agente['fullname'] ?></td>
                  <td><?= $agente['email_user'] ?></td>
                  <td class="text-center">
                    <a href="<?= $url ?>" class="btn btn-primary bx-tada-hover"
                      title="View Client">
                      <i class='bx bxs-show'></i>
                    </a>
                    <?php if (!empty($permisos[MCLIENTS]['u'])) { ?>
                    <a href="<?= $url ?>?action=edit"
                      class="btn btn-secondary bx-tada-hover"
                      title="Edit Agent">
                      <i class='bx bxs-pencil'></i>
                    </a>
                    <?php } ?>
                  </td>
                </tr>
                <?php $indexAgentes++;
                      } ?>
                <?php } else { ?>
                <tr>
                  <td colspan="4" class="text-center">Data empty</td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>
  <?php } ?>
  <?php if (!empty($permisos[MCLIENTS]['r'])) { ?>

  <div class="col-md-6">
    <div class="container-fluid">
      <div class="tile">
        <div class="tile-body">
          <div class="tile-title">
            <h2 class="font-weight-bolder text-capitalize">Last Five Clients
            </h2>
            <hr class="bg-info">
          </div>
          <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Fullname</th>
                  <th scope="col">Email</th>
                  <th scope="col" class="text-center">Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($data['LastClients'])) {
                      $indexCliente = 1; ?>
                <?php foreach ($data['LastClients'] as $cliente) { ?>
                <tr>
                  <td><?= $indexCliente ?></td>
                  <td><?= $cliente['fullname'] ?></td>
                  <td><?= $cliente['email_user'] ?></td>
                  <td class="text-center">
                    <a href="<?= base_url() ?>/clients/client/<?= $cliente['idpersona'] ?>"
                      class="btn btn-primary bx-tada-hover" title="View Client">
                      <i class='bx bxs-show'></i>
                    </a>
                    <?php if (!empty($permisos[MCLIENTS]['u'])) { ?>
                    <a href="<?= base_url() ?>/clients/client/<?= $cliente['idpersona'] ?>?action=edit"
                      class="btn btn-secondary bx-tada-hover"
                      title="Edit Client">
                      <i class='bx bxs-pencil'></i>
                    </a>
                    <?php } ?>
                  </td>
                </tr>
                <?php $indexCliente++;
                      } ?>
                <?php } else { ?>
                <tr>
                  <td colspan="4" class="text-center">Data empty</td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>
  <?php } ?>

  <div class="col-md-12">
    <div class="container-fluid">
      <div class="tile">
        <div class="tile-body">
          <div class="tile-title">
            <h2 class="font-weight-bolder text-capitalize">Last Five Propertys
            </h2>
            <hr class="bg-info">
          </div>
          <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Thumbnail</th>
                  <th scope="col">Title</th>
                  <th scope="col">Package</th>
                  <th scope="col">Status</th>
                  <th scope="col" class="text-center">Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td colspan="6" class="text-center">Data not Found</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
<?php } ?>
<?php footerAdmin($data); ?>