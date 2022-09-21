<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title; ?></h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-end mb-3">
                <a href="#" class="btn btn-success" data-toggle="modal" data-target="#tambah_data_modal">
                  <i class="fas fa-plus-circle"></i> Tambah Data
                </a>
                <button class="btn btn-sm btn-primary ml-3" data-toggle="modal" data-target="#import_data_modal">
                  <i class="fas fa-file-import"></i> Import Data
                </button>

              </div>
              <div class="table-responsive">
                <table class="table table-striped datatables">
                  <thead>
                    <tr>
                      <th width="5%" class="text-center">#</th>
                      <th width="%" class="text-center">Merk & Model</th>
                      <th width="%" class="text-center">Divisi</th>
                      <th width="%" class="text-center">Mac Address</th>
                      <th width="" class="text-center">Ip Address</th>
                      <th width="15%" class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($printers as $printer) :
                    ?>
                      <tr>
                        <td class="text-center"><?= $no; ?></td>
                        <td class=""><?= $printer['merk_model']; ?></td>
                        <td class=""><?= $printer['akronim']; ?></td>
                        <td class=""><?= $printer['mac_address']; ?></td>
                        <td class=""><?= $printer['ip_address']; ?></td>
                        <td class="text-center">
                          <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#detail_data_modal<?= $printer['id']; ?>">
                            <i class="fas fa-info-circle"></i>
                          </button>
                          <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#edit_data_modal<?= $printer['id']; ?>">
                            <i class="fas fa-edit"></i>
                          </button>
                          <button class="btn btn-sm btn-danger btn-delete" data-toggle="tooltip" data-original-title="Delete item" id="<?= $printer['id']; ?>">
                            <i class="fas fa-times-circle"></i>
                          </button>
                        </td>
                      </tr>
                    <?php
                      $no++;
                    endforeach;
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>
</div>

<!-- MODAL TAMBAH -->
<div class="modal fade" id="tambah_data_modal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Form Tambah printer</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success btn-add">Simpan</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.MODAL TAMABAH -->

<?php
foreach ($printers as $printer) :
?>

  <!-- MODAL DETAIL -->
  <div class="modal fade" id="detail_data_modal<?= $printer['id']; ?>">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Detail <?= $title; ?> ( <?= $printer['host_name']; ?> )</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="mb-3 d-flex justify-content-end">
            <a href="<?= base_url('cetak-qr/') . $printer['url']; ?>" target="_blank">
              <button class="btn btn-lg btn-primary" data-toggle="tooltip" data-original-title="Cetak Qr">
                <i class="fas fa-qrcode"></i>
              </button>
            </a>
          </div>
          <div class="row mb-3">
            <div class="col-md-4 text-center">
              <img src="<?= base_url('public/img/laptops/default_laptop.jpg'); ?>" width="150px">
            </div>
            <div class="col-md-8 d-flex flex-column">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">printer</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" value="<?= $printer['merk_model']; ?>" disabled>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Divisi</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" value="<?= $printer['nama']; ?>" disabled>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Mac Address</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" value="<?= $printer['mac_address'] ?>" disabled>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Ip Address</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" value="<?= $printer['ip_address'] ?>" disabled>
                </div>
              </div>
            </div>
          </div>
          <hr>
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
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success btn-edit" id="<?= $printer['id']; ?>">Ubah</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.MODAL DETAIL -->

<?php
endforeach;
?>