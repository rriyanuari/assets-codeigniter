<script>
  //TAMBAH DATA
  $('.btn-add').on('click', function() {
    let merk          = $("select[name=merk]");
    let model         = $("input[name=model]");
    let serial_number = $("input[name=serial_number]");
    let tgl_pembelian = $("input[name=tgl_pembelian]");
    let pic           = $("select[name=pic]");
    let kondisi       = $("select[name=kondisi]");
    let processor     = $("input[name=processor]");
    let memory        = $("input[name=memory]");
    let display       = $("input[name=display]");
    let disk_type_1   = $("select[name=disk_type_1]");
    let disk_type_2   = $("select[name=disk_type_2]");
    let disk_size_1   = $("input[name=disk_size_1]");
    let disk_size_2   = $("input[name=disk_size_2]");
    let gpu_1         = $("input[name=gpu_1]");
    let gpu_2         = $("input[name=gpu_2]");

    if (!model.val().trim()) {
      iziToast.error({
        title: 'Oops!',
        message: 'Model tidak boleh kosong!!',
        position: 'topRight'
      });
      model.focus();

      return false
    }

    if (!serial_number.val()) {
      iziToast.error({
        title: 'Oops!',
        message: 'Serial Number tidak boleh kosong!!',
        position: 'topRight'
      });
      serial_number.focus();

      return false
    }

    if (!processor.val()) {
      iziToast.error({
        title: 'Oops!',
        message: 'Processor tidak boleh kosong!!',
        position: 'topRight'
      });
      processor.focus();

      return false
    }

    if (!memory.val()) {
      iziToast.error({
        title: 'Oops!',
        message: 'Memory tidak boleh kosong!!',
        position: 'topRight'
      });
      memory.focus();

      return false
    }
    
    if (!display.val()) {
      iziToast.error({
        title: 'Oops!',
        message: 'Display tidak boleh kosong!!',
        position: 'topRight'
      });
      display.focus();

      return false
    }

    if (!disk_size_1.val()) {
      iziToast.error({
        title: 'Oops!',
        message: 'Disk size 1 tidak boleh kosong!!',
        position: 'topRight'
      });
      disk_size_1.focus();

      return false
    }

    if (!gpu_1.val()) {
      iziToast.error({
        title: 'Oops!',
        message: 'Gpu 1 tidak boleh kosong!!',
        position: 'topRight'
      });
      gpu_1.focus();

      return false
    }

    let form_data = new FormData();
    form_data.append('merk', merk.val());
    form_data.append('model', model.val());
    form_data.append('serial_number', serial_number.val());
    form_data.append('tgl_pembelian', tgl_pembelian.val());
    form_data.append('pic', pic.val());
    form_data.append('kondisi', kondisi.val());
    form_data.append('processor', processor.val());
    form_data.append('memory', memory.val());
    form_data.append('display', display.val());
    form_data.append('disk_type_1', disk_type_1.val());
    form_data.append('disk_type_2', disk_type_2.val());
    form_data.append('disk_size_1', disk_size_1.val());
    form_data.append('disk_size_2', disk_size_2.val());
    form_data.append('gpu_1', gpu_1.val());
    form_data.append('gpu_2', gpu_2.val());

    $.ajax({
      url: '<?php echo base_url('laptop/create') ?>',
      dataType: 'json', // what to expect back from the PHP script, if anything
      cache: false,
      contentType: false,
      processData: false,
      data: form_data,
      type: 'post',
      success: function(data, status) {
        if (data.status == 'success') {
          swal('Success', `${data.msg}`, 'success').then(function() {
            $(location).attr('href', `<?= base_url('laptop') ?>`); // redirect setelah sukses
          })

        } else {
          swal('Error', `${data.msg}`, 'error');
        }
        console.log(data);
      },
      error: function(data) {
        swal('Error', `${data.msg}`, 'error');
        console.log(data);
      }
    });
  });

  //EDIT DATA
  $('.btn-edit').on('click', function() {
    let id = this.id
    let merk          = $(`select[name=merk${id}]`);
    let model         = $(`input[name=model${id}]`);
    let serial_number = $(`input[name=serial_number${id}]`);
    let tgl_pembelian = $(`input[name=tgl_pembelian${id}]`);
    let pic           = $(`select[name=pic${id}]`);
    let kondisi       = $(`select[name=kondisi${id}]`);
    let processor     = $(`input[name=processor${id}]`);
    let memory        = $(`input[name=memory${id}]`);
    let display       = $(`input[name=display${id}]`);
    let disk_type_1   = $(`select[name=disk_type_1${id}]`);
    let disk_type_2   = $(`select[name=disk_size_2${id}]`);
    let disk_size_1   = $(`input[name=disk_size_1${id}]`);
    let disk_size_2   = $(`input[name=disk_size_2${id}]`);
    let gpu_1         = $(`input[name=gpu_1${id}]`);
    let gpu_2         = $(`input[name=gpu_2${id}]`);

    if (!model.val().trim()) {
      iziToast.error({
        title: 'Oops!',
        message: 'Model tidak boleh kosong!!',
        position: 'topRight'
      });
      model.focus();

      return false
    }

    if (!serial_number.val()) {
      iziToast.error({
        title: 'Oops!',
        message: 'Serial Number tidak boleh kosong!!',
        position: 'topRight'
      });
      serial_number.focus();

      return false
    }

    if (!processor.val()) {
      iziToast.error({
        title: 'Oops!',
        message: 'Processor tidak boleh kosong!!',
        position: 'topRight'
      });
      processor.focus();

      return false
    }

    if (!memory.val()) {
      iziToast.error({
        title: 'Oops!',
        message: 'Memory tidak boleh kosong!!',
        position: 'topRight'
      });
      memory.focus();

      return false
    }
    
    if (!display.val()) {
      iziToast.error({
        title: 'Oops!',
        message: 'Display tidak boleh kosong!!',
        position: 'topRight'
      });
      display.focus();

      return false
    }

    if (!disk_size_1.val()) {
      iziToast.error({
        title: 'Oops!',
        message: 'Disk size 1 tidak boleh kosong!!',
        position: 'topRight'
      });
      disk_size_1.focus();

      return false
    }

    if (!gpu_1.val()) {
      iziToast.error({
        title: 'Oops!',
        message: 'Gpu 1 tidak boleh kosong!!',
        position: 'topRight'
      });
      gpu_1.focus();

      return false
    }

    let form_data = new FormData();
    form_data.append('id', id);
    form_data.append('merk', merk.val());
    form_data.append('model', model.val());
    form_data.append('serial_number', serial_number.val());
    form_data.append('tgl_pembelian', tgl_pembelian.val());
    form_data.append('pic', pic.val());
    form_data.append('kondisi', kondisi.val());
    form_data.append('processor', processor.val());
    form_data.append('memory', memory.val());
    form_data.append('display', display.val());
    form_data.append('disk_type_1', disk_type_1.val());
    form_data.append('disk_type_2', disk_type_2.val());
    form_data.append('disk_size_1', disk_size_1.val());
    form_data.append('disk_size_2', disk_size_2.val());
    form_data.append('gpu_1', gpu_1.val());
    form_data.append('gpu_2', gpu_2.val());

    $.ajax({
      url: '<?php echo base_url('laptop/edit') ?>',
      dataType: 'json', // what to expect back from the PHP script, if anything
      cache: false,
      contentType: false,
      processData: false,
      data: form_data,
      type: 'post',
      success: function(data, status) {
        if (data.status == 'success') {
          swal('Success', `${data.msg}`, 'success').then(function() {
            $(location).attr('href', `<?= base_url('laptop') ?>`); // redirect setelah sukses
          })

        } else {
          swal('Error', `${data.msg}`, 'error');
        }
        console.log(data);
      },
      error: function(data) {
        swal('Error', `${data.msg}`, 'error');
        console.log(data);
      }
    });
  });

  //DELETE DATA
  $('.btn-delete').on('click', function() {
    let form_data = new FormData();
    form_data.append('id', this.id);

    swal({
        title: 'Apakah anda yakin?',
        // text: 'Once deleted, you will not be able to recover this imaginary file!',
        icon: 'warning',
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          $.ajax({
            url: '<?php echo base_url('laptop/delete') ?>',
            dataType: 'json', // what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function(data, status) {
              if (data.status == 'success') {
                swal('Success', `${data.msg}`, 'success').then(function() {
                  $(location).attr('href', `<?= base_url('laptop') ?>`); // redirect setelah sukses
                })
              } else {
                swal('Error', `${data.msg}`, 'error');
              }
              console.log(data);
            },
            error: function(data) {
              swal('Error', `${data.msg}`, 'error');
              console.log(data);
            }
          });
        }
      });
  });
</script>