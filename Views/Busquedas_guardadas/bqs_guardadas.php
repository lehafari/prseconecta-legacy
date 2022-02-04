<?php headerAdmin($data); ?>

<section class="home-section">
  <div class="home-content">
    <h3>
      <!--  SECCION BUSQUEDAS GUARDADAS -->
      <!-- <i class='bx bx-search-alt'></i>
      Búsquedas guardadas -->
    </h3>

  </div>

  <div class="app-content">
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <div class="tile-body">
            <div class="table-responsive">
              <table class="table table-hover table-bordered"
                id="tableFavorites">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Thumbnail</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Price</th>
                    <th class="text-center">Actions</th>
                  </tr>
                </thead>
                <tbody>
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