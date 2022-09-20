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
                      <th width="20%" class="text-center">Laptop</th>
                      <th width="5%" class="text-center">SN</th>
                      <th width="" class="text-center">Processor</th>
                      <th width="" class="text-center">PIC</th>
                      <th width="" class="text-center">Tgl Pembelian</th>
                      <th width="7%" class="text-center">Kondisi</th>
                      <th width="15%" class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($laptops as $laptop) :
                      switch ($laptop['kondisi']) {
                        case 'good':
                          $badge_status = 'success';
                          break;
                        case 'warning':
                          $badge_status = 'warning';
                          break;
                        case 'bad':
                          $badge_status = 'danger';
                          break;
                        default:
                          # code...
                          break;
                      }
                      $badge_status
                    ?>
                      <tr>
                        <td class="text-center"><?= $laptop['id']; ?></td>
                        <td class=""><?= $laptop['merk']; ?> - <?= $laptop['model']; ?></td>
                        <td class=""><?= $laptop['serial_number']; ?></td>
                        <td class=""><?= $laptop['processor']; ?></td>
                        <td class=""><?= $laptop['nama_lengkap']; ?></td>
                        <td class=""><?= $laptop['tgl_pembelian']; ?></td>
                        <td class="text-center"><span class="badge badge-<?= $badge_status; ?>"><?= $laptop['kondisi']; ?></span></td>
                        <td class="text-center">
                          <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#detail_data_modal<?= $laptop['id']; ?>">
                            <i class="fas fa-info-circle"></i>
                          </button>
                          <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#edit_data_modal<?= $laptop['id']; ?>">
                            <i class="fas fa-edit"></i>
                          </button>
                          <button class="btn btn-sm btn-danger btn-delete" data-toggle="tooltip" data-original-title="Delete item" id="<?= $laptop['id']; ?>">
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
        <h4 class="modal-title">Form Tambah Laptop</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row mb-3">
          <div class="col-sm-12 d-flex flex-column">
            <div class="form-group row">
              <label class="col-sm-2 col-form-label" for="model">Laptop *</label>
              <div class="col-sm-4">
                <select name="merk" class="form-control select2" style="width:100%;">
                  <option value="Asus">Asus</option>
                  <option value="Lenovo">Lenovo</option>
                  <option value="Dell">Dell</option>
                  <option value="Hp">Hp</option>
                  <option value="Macbook">Macbook</option>
                  <option value="Microsoft">Microsoft</option>
                </select>
              </div>
              <div class="col-sm-6">
                <input type="text" class="form-control" id="model" name="model">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-4 col-form-label" for="serial_number">Serial Number *</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="serial_number" name="serial_number">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-4 col-form-label" for="pic">PIC</label>
              <div class="col-sm-8">
                <select name="pic" class="form-control select2" style="width:100%;">
                  <option value="">-</option>
                  <?php foreach($karyawans as $karyawan): ?>
                    <option value="<?= $karyawan['id']; ?>"><?= $karyawan['nama_lengkap']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-4 col-form-label" for="tgl_pembelian">Tgl Pembelian</label>
              <div class="col-sm-8">
                <input type="date" class="form-control" id="tgl_pembelian" name="tgl_pembelian">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-4 col-form-label" for="kondisi">Kondisi *</label>
              <div class="col-sm-8">
                <select name="kondisi" class="form-control select2" style="width:100%;">
                  <option value="good">good</option>
                  <option value="warning">warning</option>
                  <option value="bad">bad</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <hr>
        <div class="mb-3 container">
          <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="processor">Processor *</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="processor" name="processor">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="memory">Memory *</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="memory" name="memory">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="display">Display *</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="display" name="display">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="disk_type_1">Disk 1 *</label>
            <div class="col-sm-4">
              <select name="disk_type_1" class="form-control select2" style="width:100%;">
                <option value="SSD">SSD</option>
                <option value="HDD">HDD</option>
              </select>
            </div>
            <div class="col-sm-4">
              <input type="number" class="form-control" id="disk_size_1" name="disk_size_1">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="disk_type_2">Disk 2</label>
            <div class="col-sm-4">
              <select name="disk_type_2" class="form-control select2" style="width:100%;">
                <option value="">-</option>
                <option value="SSD">SSD</option>
                <option value="HDD">HDD</option>
              </select>
            </div>
            <div class="col-sm-4">
              <input type="number" class="form-control" id="disk_size_2" name="disk_size_2">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="gpu_1">GPU 1 *</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="gpu_1" name="gpu_1">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="gpu_2">GPU 2</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="gpu_2" name="gpu_2">
            </div>
          </div>
        </div>
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

<!-- MODAL IMPORT -->
<div class="modal fade" id="import_data_modal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Form Import Data Laptop</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">Download File Contoh</div>
          <div class="col-md-6">
            <a href="<?=base_url('assets/csv/jenisBarang/masterJenisBarang.csv')?>" download="Db Qrcisoka - Master Import Jenis Barang.csv">
              <button type="button" class="btn btn-sm btn-success" id="downloadFile">
                Download
              </button>
            </a>
          </div>
        </div>
        <br />
        <br />
        <?php echo form_open_multipart(site_url('laptop/import')); ?>
        <div class="row">
          <div class="form-group col-md-12">
              <label for="import_laptop">Upload File (.csv)</label>
              <input type="file" class="form-control-file" accept="text/csv" id="import_laptop" name="import_laptop">
          </div>
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" id="tmb-import" name="import" class="btn btn-primary">Import</button>
      </div>
      <?php echo form_close(); ?>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.MODAL TAMABAH -->

<?php
foreach ($laptops as $laptop) :
?>

  <!-- MODAL DETAIL -->
  <div class="modal fade" id="detail_data_modal<?= $laptop['id']; ?>">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Detail <?= $title; ?> ( <?= $laptop['id']; ?> )</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="mb-3 d-flex justify-content-end">
            <a href="<?= base_url('cetak-qr/') . $laptop['url']; ?>" target="_blank">
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
                <label class="col-sm-2 col-form-label">Laptop</label>
                <div class="col-sm-4">
                  <select class="form-control select2" style="width:100%;" disabled>
                    <option <?= ($laptop['merk'] == "Asus" ? "selected" : ""); ?> value="Asus">Asus</option>
                    <option <?= ($laptop['merk'] == "Lenovo" ? "selected" : ""); ?> value="Lenovo">Lenovo</option>
                    <option <?= ($laptop['merk'] == "Dell" ? "selected" : ""); ?> value="Dell">Dell</option>
                    <option <?= ($laptop['merk'] == "Hp" ? "selected" : ""); ?> value="Hp">Hp</option>
                    <option <?= ($laptop['merk'] == "Macbook" ? "selected" : ""); ?> value="Macbook">Macbook</option>
                    <option <?= ($laptop['merk'] == "Microsoft" ? "selected" : ""); ?> value="Microsoft">Microsoft</option>
                  </select>
                </div>
                <div class="col-sm-6">
                  <input type="text" class="form-control" value="<?= $laptop['model']; ?>" disabled>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Serial Number</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" value="<?= $laptop['serial_number'] ?>" disabled>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">PIC</label>
                <div class="col-sm-8">
                  <select class="form-control select2" style="width:100%;" disabled>
                    <option value="">-</option>
                    <?php foreach($karyawans as $karyawan): ?>
                      <option <?= ($karyawan['id'] == $laptop['id_karyawan']) ? "selected" : ""; ?> value="<?= $karyawan['id']; ?>"><?= $karyawan['nama_lengkap']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Tgl Pembelian</label>
                <div class="col-sm-8">
                  <input type="date" class="form-control" value="<?= $laptop['tgl_pembelian'] ?>" disabled>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Kondisi *</label>
                <div class="col-sm-8">
                  <select class="form-control select2" style="width:100%;" disabled>
                    <option <?= ($laptop['kondisi'] == "good") ? "selected" : ""; ?> value="good">good</option>
                    <option <?= ($laptop['kondisi'] == "warning") ? "selected" : ""; ?> value="warning">warning</option>
                    <option <?= ($laptop['kondisi'] == "bad") ? "selected" : ""; ?> value="bad">bad</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <hr>
          <div class="mb-3 container">
            <div class="form-group row">
              <label class="col-sm-4 col-form-label">Processor</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" value="<?= $laptop['processor']; ?>" disabled>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-4 col-form-label">Memory</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" value="<?= $laptop['memory']; ?>" disabled>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-4 col-form-label">Display</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" value="<?= $laptop['display']; ?>" disabled>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-4 col-form-label">Disk 1</label>
              <div class="col-sm-4">
                <select class="form-control select2" style="width:100%;" disabled>
                  <option <?= ($laptop['disk_type_1'] == "" ? "selected" : ""); ?> value="">-</option>
                  <option <?= ($laptop['disk_type_1'] == "SSD" ? "selected" : ""); ?> value="SSD">SSD</option>
                  <option <?= ($laptop['disk_type_1'] == "HDD" ? "selected" : ""); ?> value="HDD">HDD</option>
                </select>
              </div>
              <div class="col-sm-4">
                <input type="text" class="form-control" value="<?= ($laptop['disk_size_1'] != "") ? $laptop['disk_size_1'] . "Gb" : "-"; ?>" disabled>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-4 col-form-label">Disk 2</label>
              <div class="col-sm-4">
                <select class="form-control select2" style="width:100%;" disabled>
                  <option <?= ($laptop['disk_type_2'] == "" ? "selected" : ""); ?> value="">-</option>
                  <option <?= ($laptop['disk_type_2'] == "SSD" ? "selected" : ""); ?> value="SSD">SSD</option>
                  <option <?= ($laptop['disk_type_2'] == "HDD" ? "selected" : ""); ?> value="HDD">HDD</option>
                </select>
              </div>
              <div class="col-sm-4">
                <input type="text" class="form-control" value="<?= ($laptop['disk_size_2'] != "") ? $laptop['disk_size_2'] . "Gb" : "-"; ?>" disabled>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-4 col-form-label">GPU 1</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" value="<?= ($laptop['gpu_1'] != "") ? $laptop['gpu_1'] : "-"; ?>" disabled>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-4 col-form-label">GPU 2</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" value="<?= ($laptop['gpu_2'] != "") ? $laptop['gpu_2'] : ""; ?>" disabled>
              </div>
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
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success btn-edit" id="<?= $laptop['id']; ?>">Ubah</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.MODAL DETAIL -->

    <!-- MODAL EDIT -->
    <div class="modal fade" id="edit_data_modal<?= $laptop['id']; ?>">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit <?= $title; ?> ( <?= $laptop['id']; ?> )</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row mb-3">
            <div class="col-md-4 text-center">
              <img src="<?= base_url('public/img/laptops/default_laptop.jpg'); ?>" width="150px">
            </div>
            <div class="col-md-8 d-flex flex-column">
              <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="model<?=$laptop['id'];?>">Laptop</label>
                <div class="col-sm-4">
                  <select name="merk<?=$laptop['id'];?>" class="form-control select2" style="width:100%;">
                    <option <?= ($laptop['merk'] == "Asus" ? "selected" : ""); ?> value="Asus">Asus</option>
                    <option <?= ($laptop['merk'] == "Lenovo" ? "selected" : ""); ?> value="Lenovo">Lenovo</option>
                    <option <?= ($laptop['merk'] == "Dell" ? "selected" : ""); ?> value="Dell">Dell</option>
                    <option <?= ($laptop['merk'] == "Hp" ? "selected" : ""); ?> value="Hp">Hp</option>
                    <option <?= ($laptop['merk'] == "Macbook" ? "selected" : ""); ?> value="Macbook">Macbook</option>
                    <option <?= ($laptop['merk'] == "Microsoft" ? "selected" : ""); ?> value="Microsoft">Microsoft</option>
                  </select>
                </div>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="model<?=$laptop['id'];?>" name="model<?=$laptop['id'];?>" value="<?= $laptop['model']; ?>">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label" for="serial_number<?=$laptop['id'];?>">Serial Number</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="serial_number<?=$laptop['id'];?>" name="serial_number<?=$laptop['id'];?>" value="<?= $laptop['serial_number'] ?>">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label" for="pic<?=$laptop['id'];?>">PIC</label>
                <div class="col-sm-8">
                  <select name="pic<?=$laptop['id'];?>" class="form-control select2" style="width:100%;">
                    <option value="">-</option>
                    <?php foreach($karyawans as $karyawan): ?>
                      <option <?= ($karyawan['id'] == $laptop['id_karyawan']) ? "selected" : ""; ?> value="<?= $karyawan['id']; ?>"><?= $karyawan['nama_lengkap']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label" for="tgl_pembelian<?=$laptop['id'];?>">Tgl Pembelian</label>
                <div class="col-sm-8">
                  <input type="date" class="form-control" id="tgl_pembelian<?=$laptop['id'];?>" name="tgl_pembelian<?=$laptop['id'];?>" value="<?= $laptop['tgl_pembelian'] ?>">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label" for="kondisi<?=$laptop['id'];?>">Kondisi *</label>
                <div class="col-sm-8">
                  <select name="kondisi<?= $laptop['id']; ?>" class="form-control select2" style="width:100%;">
                    <option <?= ($laptop['kondisi'] == "good") ? "selected" : ""; ?> value="good">good</option>
                    <option <?= ($laptop['kondisi'] == "warning") ? "selected" : ""; ?> value="warning">warning</option>
                    <option <?= ($laptop['kondisi'] == "bad") ? "selected" : ""; ?> value="bad">bad</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <hr>
          <div class="mb-3 container">
            <div class="form-group row">
              <label class="col-sm-4 col-form-label" for="processor<?=$laptop['id'];?>">Processor</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="processor<?=$laptop['id'];?>" name="processor<?=$laptop['id'];?>" value="<?= $laptop['processor']; ?>">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-4 col-form-label" for="memory<?=$laptop['id'];?>">Memory</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="memory<?=$laptop['id'];?>" name="memory<?=$laptop['id'];?>" value="<?= $laptop['memory']; ?>">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-4 col-form-label" for="display<?=$laptop['id'];?>">Display</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="display<?=$laptop['id'];?>" name="display<?=$laptop['id'];?>" value="<?= $laptop['display']; ?>">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-4 col-form-label" for="disk_type_1<?=$laptop['id'];?>">Disk 1</label>
              <div class="col-sm-4">
                <select name="disk_type_1<?=$laptop['id'];?>" class="form-control select2" style="width:100%;">
                  <option <?= ($laptop['disk_type_1'] == "" ? "selected" : ""); ?> value="">-</option>
                  <option <?= ($laptop['disk_type_1'] == "SSD" ? "selected" : ""); ?> value="SSD">SSD</option>
                  <option <?= ($laptop['disk_type_1'] == "HDD" ? "selected" : ""); ?> value="HDD">HDD</option>
                </select>
              </div>
              <div class="col-sm-4">
                <input type="text" class="form-control" id="disk_size_1" name="disk_size_1<?=$laptop['id'];?>" value="<?= ($laptop['disk_size_1'] != "") ? $laptop['disk_size_1'] . "Gb" : "-"; ?>">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-4 col-form-label" for="disk_type_2<?=$laptop['id'];?>">Disk 2</label>
              <div class="col-sm-4">
                <select name="disk_type_2<?=$laptop['id'];?>" class="form-control select2" style="width:100%;">
                  <option <?= ($laptop['disk_type_2'] == "" ? "selected" : ""); ?> value="">-</option>
                  <option <?= ($laptop['disk_type_2'] == "SSD" ? "selected" : ""); ?> value="SSD">SSD</option>
                  <option <?= ($laptop['disk_type_2'] == "HDD" ? "selected" : ""); ?> value="HDD">HDD</option>
                </select>
              </div>
              <div class="col-sm-4">
                <input type="text" class="form-control" id="disk_size_2" name="disk_size_2<?=$laptop['id'];?>" value="<?= ($laptop['disk_size_2'] != "") ? $laptop['disk_size_2'] . "Gb" : "-"; ?>">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-4 col-form-label" for="gpu_1<?=$laptop['id'];?>">GPU 1</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="gpu_1<?=$laptop['id'];?>" name="gpu_1<?=$laptop['id'];?>" value="<?= ($laptop['gpu_1'] != "") ? $laptop['gpu_1'] : "-"; ?>">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-4 col-form-label" for="gpu_2<?=$laptop['id'];?>">GPU 2</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="gpu_2<?=$laptop['id'];?>" name="gpu_2<?=$laptop['id'];?>" value="<?= ($laptop['gpu_2'] != "") ? $laptop['gpu_2'] : ""; ?>">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success btn-edit" id="<?= $laptop['id']; ?>">Ubah</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.MODAL EDIT -->

<?php
endforeach;
?>