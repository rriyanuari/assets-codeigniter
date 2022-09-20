<!DOCTYPE html>
<html>
<head>
  <title>DB-qrcisoka | QR Code</title>
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/bootstrap/css/bootstrap.min.css">
  <!-- <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/fontawesome/css/all.min.css"> -->
  <script src="<?php echo base_url() ?>/assets/modules/jquery.min.js"></script>
  <script src="<?php echo base_url() ?>/assets/modules/jquery_qrcode.min.js"></script>

  <style>
    .container{
      width: 85%;
      padding: 20px;
      margin: 50px auto;
      border: 2px solid;
    }
    .col{
      border: 1px solid;
    }
  </style>
</head>
<body>
  <div class="container">
    <table class="table">
      <tbody>
          <tr>
            <td class="m-1 p-1 border text-center">
              <span style="font-size:12px"></span>
              <div id="output"></div> 
            </td>
          </tr>
        <script>
          $(`#output`).qrcode({
            render: "canvas", 
            text: `<?= base_url("check/"); ?><?= $laptop['url'] ?>`, 
            width: 200, 
            height: 200,
            background: "#ffffff", 
            foreground: "#000000", 
            src: '<?= base_url('public/img/fyfe-background.jpg') ?>',
            imgWidth: 72,
            imgHeight: 36
          });          
        </script>
      </tbody>
    </table>
  </div>
</body>
</html>