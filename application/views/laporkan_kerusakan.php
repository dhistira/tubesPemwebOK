<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Laporkan Kerusakan - E-Aspirasi</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/components.css">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <div class="form-inline mr-auto">
        </div>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="<?= base_url(); ?>assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, <?= $this->session->userdata('username'); ?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="<?php echo site_url('login/logout');?>" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <?php $this->load->view('sidebar'); ?>        
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Laporkan Kerusakan Fasilitas / Jalan</h1>
          </div>

          <div class="section-body">
            <h2 class="section-title">Laporkan Kerusakan Fasilitas / Jalan</h2>
            <p class="section-lead">
              Isi formulir berikut untuk melaporkan kerusakan
            </p>

            <div class="row">
              <?php if(isset($_GET['t'])){
                if($_GET['t'] == 'true'){
                  echo '<div class="alert alert-success">Berhasil! Data berhasil ditambah!</div>';
                } else {
                  echo '<div class="alert alert-danger">Oops! Terjadi masalah!</div>';
                }
              }?>
              <div class="col-6">
              <form id="myForm" method="post" action="<?= base_url().'page/action_laporkan_kerusakan';?>" enctype='multipart/form-data'>
                <div class="card">
                  <div class="card-header">
                    <h4>Tandai Lokasi Kerusakan</h4>
                  </div>
                  <div class="card-body">
                    <div class="row mb-4">
                      <div class="col-md-10">
                        <div class="input-group">
                          <input type="text" class="form-control" id="input-lat" placeholder="Latitude" name="lat">
                          <input type="text" class="form-control" id="input-lng" placeholder="Longitude" name="lon">
                        </div>
                      </div>
                    </div>
                    <div id="map" data-height="400"></div>
                  </div>
                </div>
              </div>

              <div class="col-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Isi Formulir Berikut</h4>
                  </div>
                  <div class="card-body">
                      <div class="form-group">
                        <label>Tipe Fasilitas</label>
                        <select class="form-control" name="tipefasilitas">
                          <option name="tipefasilitas" value="1">Fasilitas Umum</option>
                          <option name="tipefasilitas" value="2">Jalan</option>
                          <option name="tipefasilitas" value="3">Lainnya</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>ID Fasilitas (Jika Ada) (<a href="#">Apa ini?</a>)</label>
                        <canvas style="position: fixed;margin: 0 auto; top:0px;" id="canvascam"></canvas>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text" onclick="activeQR()">
                              QR Code Scan
                            </div>
                          </div>
                          <input type="text" name="idfasilitas" id="idfasilitas" class="form-control" placeholder="#-#-#-#">
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Keterangan Fasilitas (Jika Ada, misal nama warna dll)</label>
                        <div class="input-group">
                          <input type="text" name="keteranganFasilitas" class="form-control" placeholder="Keterangan tentang Fasilitas Ini">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Status Fasilitas</label>
                        <div class="selectgroup w-100">
                          <label class="selectgroup-item">
                            <input type="radio" name="statusfasilitas" value="1" class="selectgroup-input" checked="">
                            <span class="selectgroup-button">Baik</span>
                          </label>
                          <label class="selectgroup-item">
                            <input type="radio" name="statusfasilitas" value="2" class="selectgroup-input">
                            <span class="selectgroup-button">Perlu Perbaikan</span>
                          </label>
                          <label class="selectgroup-item">
                            <input type="radio" name="statusfasilitas" value="3" class="selectgroup-input">
                            <span class="selectgroup-button">Rusak</span>
                          </label>
                          <label class="selectgroup-item">
                            <input type="radio" name="statusfasilitas" value="4" class="selectgroup-input">
                            <span class="selectgroup-button">Rusak Parah</span>
                          </label>
                          <label class="selectgroup-item">
                            <input type="radio" name="statusfasilitas" value="5" class="selectgroup-input">
                            <span class="selectgroup-button">Tidak Dapat Digunakan</span>
                          </label>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Upload Foto Pendukung</label>
                        <div class="input-group">
                          <input type="file" name="image" class="btn btn-info">
                        </div>
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-warning">Submit</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2019 <div class="bullet"></div> E-Aspirasi</a>
        </div>
        <div class="footer-right">
          
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="<?= base_url(); ?>assets/modules/jquery.min.js"></script>
  <script src="<?= base_url(); ?>assets/modules/popper.js"></script>
  <script src="<?= base_url(); ?>assets/modules/tooltip.js"></script>
  <script src="<?= base_url(); ?>assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?= base_url(); ?>assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="<?= base_url(); ?>assets/modules/moment.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/stisla.js"></script>
  
  <!-- JS Libraies -->
  <script src="http://maps.google.com/maps/api/js?key=AIzaSyB55Np3_WsZwUQ9NS7DP-HnneleZLYZDNw&amp;sensor=true"></script>
  <script src="<?= base_url(); ?>assets/modules/gmaps.js"></script>

  <!-- Page Specific JS File -->
  <script src="<?= base_url(); ?>assets/js/page/gmaps-draggable-marker.js"></script>
  
  <!-- Template JS File -->
  <script src="<?= base_url(); ?>assets/js/scripts.js"></script>
  <script src="<?= base_url(); ?>assets/js/custom.js"></script>
  <script type="text/javascript" src="<?= base_url(); ?>webCodeCam/js/qrcodelib.js"></script>
  <script type="text/javascript" src="<?= base_url(); ?>webCodeCam/js/webcodecamjs.js"></script>
  <script type="text/javascript">
  function activeQR(){
    var txt = "innerText" in HTMLElement.prototype ? "innerText" : "textContent";
    var x = document.getElementById('idfasilitas');
    var arg = {
      resultFunction: function(result) {
        x.setAttribute("value",result.code);
      }
    };
    new WebCodeCamJS("canvas").init(arg).play();
  }
  </script>
</body>
</html>