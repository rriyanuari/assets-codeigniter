<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title; ?> </h1>
    </div>

    <?php
      foreach($laptops as $laptop):
    ?>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="row mb-3">
                <div class="col-md-4 text-center">
                  <img src="<?= base_url('public/img/laptops/default_laptop.jpg'); ?>" width="150px">
                </div>
                <div class="col-md-8 d-flex flex-column">
                  <table width="100%">
                    <tr class="font-weight-bold">
                      <td width="30%">Laptop</td>
                      <td width="70%">: <?= $laptop['merk'] . ' - ' . $laptop['model'] ?></td>
                    </tr>
                    <tr class="">
                      <td width="30%">Serial Number</td>
                      <td width="70%">: <?= $laptop['serial_number'] ?></td>
                    </tr>
                    <tr class="">
                      <td width="30%">Tanggal Pembelian</td>
                      <td width="70%">: <?= $laptop['tgl_pembelian'] ?></td>
                    </tr>
                  </table>
                  <div class="mt-auto d-flex justify-content-end">
                    <a href="<?= base_url('cetak-qr/') . $laptop['url']; ?>" target="_blank">
                      <button class="btn btn-lg btn-primary" data-toggle="tooltip" data-original-title="Cetak Qr">
                        <i class="fas fa-qrcode"></i>
                      </button>
                    </a>
                  </div>
                </div>
              </div>
              <hr>
              <div class="row mb-3 container">
                <div class="col-md-12">
                  <table width="100%">
                    <tr class="row">
                      <td width="30%">Processor</td>
                      <td width="70%">: <?= $laptop['processor']; ?></td>
                    </tr>
                    <tr class="row">
                      <td width="30%">Memory</td>
                      <td width="70%">: <?= $laptop['memory']; ?></td>
                    </tr>
                    <tr class="row">
                      <td width="30%">Ukuran Layar</td>
                      <td width="70%">: <?= $laptop['display'] ?>"</td>
                    </tr>
                    <tr class="row">
                      <td width="30%">Disk 1</td>
                      <td width="70%">: <?= ($laptop['disk_type_1'] != "") ? $laptop['disk_type_1'] . " - " .  $laptop['disk_size_1'] . "Gb" : "-"; ?></td>
                    </tr>
                    <tr class="row">
                      <td width="30%">Disk 2</td>
                      <td width="70%">: <?= ($laptop['disk_type_2'] != "") ? $laptop['disk_type_2'] . " - " .  $laptop['disk_size_2'] . "Gb" : "-"; ?></td>
                    </tr>
                    <tr class="row">
                      <td width="30%">GPU 1</td>
                      <td width="70%">: <?= ($laptop['gpu_1'] != "") ? $laptop['gpu_1'] : "-"; ?></td>
                    </tr>
                    <tr class="row">
                      <td width="30%">GPU 2</td>
                      <td width="70%">: <?= ($laptop['gpu_2'] != "") ? $laptop['gpu_2'] : "-"; ?></td>
                    </tr>
                  </table>
                </div>
              </div>
              <hr />
              <div class="row">
                <div class="col-md-5 activities flex-column">
                  <h4 class="mb-3">History PIC</h4>
                  <?php
                  if (count($laptop['serah_terimas']) != 0) {
                    foreach ($laptop['serah_terimas'] as $serah_terima) :
                  ?>
                      <div class="activity">
                        <div class="activity-icon bg-primary text-white shadow-primary">
                          <i class="fas fa-comment-alt"></i>
                        </div>
                        <div class="activity-detail">
                          <div class="mb-2">
                            <span class="text-job text-primary"><?= $serah_terima['tgl_serah_terima'] ?></span>
                            <span class="bullet"></span>
                            <a class="text-job" href="#">Serah Terima <?= $serah_terima['id']; ?></a>
                          </div>
                          <p>
                            <?= $serah_terima['nama_lengkap']; ?> <br />
                            " <em class="text-primary"><?= $serah_terima['jabatan']; ?> / <?= $serah_terima['divisi']; ?></em> "
                          </p>
                        </div>
                      </div>
                    <?php
                    endforeach;
                  } else {
                    ?>
                    <div class="activity">
                      <em> -- Belum ada history --</em>
                    </div>
                  <?php
                  }
                  ?>
                </div>
                <div class="col-md-7 activities flex-column">
                  <h4 class="mb-3">History Maintenance</h4>
                  <?php
                  if (count($laptop['maintenances']) != 0) {
                    foreach ($laptop['maintenances'] as $maintenance) :
                      switch ($maintenance['status']) {
                        case 'pending':
                          $status = 'primary';
                          break;
                        case 'proses':
                          $status = 'warning';
                          break;
                        case 'selesai':
                          $status = 'success';
                          break;
                      }
                      switch ($maintenance['kategori']) {
                        case 'hardware':
                          $icon = 'fas fa-toolbox';
                          break;
                        case 'software':
                          $icon = 'fab fa-microsoft';
                          break;
                        case 'network':
                          $icon = 'fas fa-network-wired';
                          break;
                      }
                  ?>
                      <div class="activity">
                        <div class="activity-icon bg-primary text-white shadow-primary">
                          <i class="<?= $icon; ?>"></i>
                        </div>
                        <div class="activity-detail">
                          <div class="mb-2">
                            <span class="text-job text-primary"><?= $maintenance['waktu_mulai'] ?></span>
                            <span class="bullet"></span>
                            <span class="text-job text-<?= $status ?>"><?= $maintenance['status']; ?></span>
                          </div>
                          <p>
                            Masalah : <?= $maintenance['permasalahan']; ?> <br />
                            Penyelesaian : <em><?= $maintenance['penyelesaian']; ?></em>
                          </p>
                        </div>
                      </div>
                    <?php
                    endforeach;
                  } else {
                    ?>
                    <div class="activity">
                      <em> -- Belum ada history --</em>
                    </div>
                  <?php
                  }
                  ?>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

    <?php endforeach; ?>
  </section>
</div>