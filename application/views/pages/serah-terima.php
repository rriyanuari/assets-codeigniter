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
                      <th width="" class="text-center">Karyawan</th>
                      <th width="" class="text-center">Tgl Serah Terima</th>
                      <th width="7%" class="text-center">Aksesoris</th>
                      <th width="15%" class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($serah_terimas as $serah_terima) :
                    ?>
                      <tr>
                        <td class="text-center"><?= $serah_terima['id']; ?></td>
                        <td class=""><?= $serah_terima['merk']; ?> - <?= $serah_terima['model']; ?></td>
                        <td class=""><?= $serah_terima['serial_number']; ?></td>
                        <td class=""><?= $serah_terima['nama_lengkap']; ?></td>
                        <td class=""><?= date( 'd-m-Y', strtotime($serah_terima['tgl_serah_terima'])); ?></td>
                        <td class=""><?= $serah_terima['aksesoris_1']; ?>, <?= $serah_terima['aksesoris_2']; ?>, <?= $serah_terima['aksesoris_3']; ?></td>
                        <td class="text-center">
                          <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#detail_data_modal<?= $serah_terima['id']; ?>">
                            <i class="fas fa-info-circle"></i>
                          </button>
                          <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#edit_data_modal<?= $serah_terima['id']; ?>">
                            <i class="fas fa-edit"></i>
                          </button>
                          <button class="btn btn-sm btn-danger btn-delete" data-toggle="tooltip" data-original-title="Delete item" id="<?= $serah_terima['id']; ?>">
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
        <h4 class="modal-title">Form Tambah Serah Terima</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row mb-3">
          <div class="col-sm-12 d-flex flex-column">
            <div class="form-group row">
              <label class="col-sm-4 col-form-label" for="id_laptop">Laptop *</label>
              <div class="col-sm-8">
                <select name="id_laptop" class="form-control select2" style="width:100%;">
                  <option value="">-</option>
                  <?php foreach($laptops as $laptop): ?>
                    <option value="<?= $laptop['id']; ?>"><?= $laptop['serial_number']; ?> - <?= $laptop['merk'] . " " . $laptop['model']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-4 col-form-label" for="id_karyawan">Karyawan *</label>
              <div class="col-sm-8">
                <select name="id_karyawan" class="form-control select2" style="width:100%;">
                  <option value="">-</option>
                  <?php foreach($karyawans as $karyawan): ?>
                    <option value="<?= $karyawan['id']; ?>"><?= $karyawan['nama_lengkap']; ?> - <?= $karyawan['divisi']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-4 col-form-label" for="tgl_serah_terima">Tgl Serah Terima</label>
              <div class="col-sm-8">
                <input type="date" class="form-control" id="tgl_serah_terima" name="tgl_serah_terima">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-4 col-form-label" for="aksesoris_1">Aksesoris 1 *</label>
              <div class="col-sm-8">
                <select name="aksesoris_1" class="form-control select2" style="width:100%;">
                  <option value="">-</option>
                  <option value="Charger">Charger</option>
                  <option value="Mouse Wired">Mouse Wired</option>
                  <option value="Mouse Wireless">Mouse Wireless</option>
                  <option value="Tas">Tas</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-4 col-form-label" for="aksesoris_2">Aksesoris 2</label>
              <div class="col-sm-8">
                <select name="aksesoris_2" class="form-control select2" style="width:100%;">
                  <option value="">-</option>
                  <option value="">Charger</option>
                  <option value="">Mouse Wired</option>
                  <option value="">Mouse Wireless</option>
                  <option value="">Tas</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-4 col-form-label" for="aksesoris_3">Aksesoris 3</label>
              <div class="col-sm-8">
                <select name="aksesoris_3" class="form-control select2" style="width:100%;">
                  <option value="">-</option>
                  <option value="">Charger</option>
                  <option value="">Mouse Wired</option>
                  <option value="">Mouse Wireless</option>
                  <option value="">Tas</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <hr>
        <div class="mb-3 container">
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

<?php
foreach ($laptops as $laptop) :
?>


<?php
endforeach;
?>