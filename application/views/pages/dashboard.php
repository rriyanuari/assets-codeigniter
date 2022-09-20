<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title;  ?></h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
              <i class="fas fa-users"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Karyawan</h4>
              </div>
              <div class="card-body">
                <?= $karyawans->num_rows(); ?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
              <i class="fas fa-laptop"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total Laptop</h4>
              </div>
              <div class="card-body">
                <?= $laptops->num_rows(); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>
</div>