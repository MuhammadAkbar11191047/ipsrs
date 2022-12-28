<html lang="en">
    <head>
        <!-- meta tags -->
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title>IPSRS-RSPB</title>
        <style type="text/css">
            @font-face {
                font-family: "Font Giulia";
                src: url('GiuliaDEMO-Bold.otf');
            }
            .giulia {
                font-family: "Font Giulia";
            }
            @font-face {
                font-family: "Font Montserrat";
                src: url('Montserrat-Bold.ttf');
            }
            @font-face {
                font-family: "Font Cocogoose";
                src: url('font\Cocogoose-Classic-Medium-trial.ttf');
            }
            .montserrat {
                font-family: "Font Montserrat";
            }
            @media screen and (max-width:680px){
                maincontent{
                    width: auto;
                    float: none;
                }
                sidebar{
                    width: auto;
                    float: none;
                }
            }
        </style>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('backend/assets/cssl/main.css') }}"/>
        <link rel="icon" href="{{ asset('backend/assets/logo/logo_RSPB.png') }}"/>
        <link rel="preconnect" href="https://fonts.googleapis.com"/>
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap" rel="stylesheet"/>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
        
    </head>
    <!-- ===== HEADER ===== -->
    <input type="checkbox" id="check">
    <!-- side bar-->
    <div class="sidebar">
      <ul id="sidebar-kiri">
        <li><a href="">Login sebagai Admin</a></li>
        <li><a href="">Form Aktivitas Harian</a></li>
      </ul>
    </div>
    <!-- -->
    <div id="top-header">
      <div class="container clearfix">
        <div id="et-secondary-menu">
          <!-- menu mobile -->
          <label for="check" class="mobile-menu"><i class="fa-solid fa-bars fa-2x"></i></label>
          
          <!-- -->
          <ul id="et-secondary-nav" class="menu">
            <li id="list" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-110">
              <a target="_blank" rel="noopener" href="/login">Login sebagai Admin</a>
            </li>
            <li id="list" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-14420">
              <a target="_blank" rel="noopener" href="/respon">Form Aktivitas Harian</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <header id="header" class="fixed-top">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="d-flex align-items-center">
            <a  class="logo-mr-auto"><img style="width: 1520px;" id="logoLengkap" src="{{ asset('backend/assets/logo/logo_4C.png')}}" alt=""></a>
            <nav class="nav-menu d-none d-lg-block offset-2"></nav>
          </div>
          <div class="d-flex align-items-center">
           
          </div>
        </div>
      </div>
    </header> <!-- ===== END HEADER ===== -->
    <body>
    <div id = "kolomkonten" class="header">
        <div id="judul">
            <h1 style="font-size:40px; text-align:center; margin-top:0px; font-family: Ubuntu">  
              <b>IPSRS<br>RUMAH SAKIT PERTAMINA BALIKPAPAN</b>
            </h1>
        </div>
        <div id="form" class="fullCard" id="thumbnail">
          <div class="cardContent">
            <div class="cardText">
              <form action="{{url('/postlaporan')}}" method="POST" class="row g-3" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6">
                  <label for="inputEmail4" class="form-label" name = 'email'>Email</label>
                  <input type="email" class="form-control" id="inputEmail" name="email"required>
                </div>
                <div class="col-md-6">
                  <label for="inputUnit" class="form-label"name = 'unit_pelapor'>Unit Pelapor</label>
                  <select id="inputUnit" class="form-select" name="unit_lapor"required>
                    <option selected>Choose...</option>
                    @foreach ($data as $item => $result)
                      <option value="{{ $result->nama_unit }}">{{ $result->nama_unit }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-4">
                  <label for="inputNama" class="form-label" name = 'nama_pelapor'>Nama Pelapor</label>
                  <input type="text" class="form-control" id="inputNama" name="nama"required>
                </div>
                <div class="col-md-4">
                  <label for="inputRuang" class="form-label" name = 'tempat_ruangan'>Tempat / Ruangan</label>
                  <input type="text" class="form-control" id="inputRuang" name="tempat_ruang"required>
                </div>
                <div class="col-md-4">
                  <label for="inputTanggal" class="form-label" name = 'tanggal_waktu'>Tanggal & Jam Laporan</label>
                  <input type="datetime-local" class="form-control" id="inputTanggal" name="tanggal"required>
                </div>
                <div class="col-12">
                  <label for="inputPerihal" class="form-label" name = perihal_laporan>Perihal Laporan</label>
                  <input type="text" class="form-control" id="inputPerihal" placeholder="" name="perihal"required>
                </div>
                <div class="col-12">
                  <label for="inputDetail" class="form-label" name = 'detail_laporan'>Detail Laporan</label>
                  <textarea class="form-control" id="inputDetail" rows="2" name="detail"required></textarea>
                </div>
                <div class="mb-3 col-6">
                  <label for="inputFile" class="form-label" name = 'foto_pendukung'>Bukti Foto Kerusakan Barang</label>
                  <p style="font-size: 14px; color:rgb(239, 239, 239);">Sertakan foto barang yang rusak / barang yang akan diperbaiki</p>
                  <input class="form-control" type="file" id="inputFile" name="bukti" multiple required>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                  <button id="submitForm" type="submit" class="btn btn-primary" name ='input'>Submit Form</button>
                </div>
                @include('sweetalert::alert')
              </form>
            </div>
          </div>
        </div>
    </div>
    </body>
    <footer>
      <div class="et_pb_row et_pb_row_1_tb_footer">
        <div class="et_pb_column et_pb_column_4_4 et_pb_column_5_tb_footer  et_pb_css_mix_blend_mode_passthrough et-last-child">
          <div class="et_pb_module et_pb_text et_pb_text_6_tb_footer  et_pb_text_align_left et_pb_bg_layout_light">
            <div class="et_pb_text_inner">
              <p style="font-family: bahnschrift; color: white;">Copyright ©2022: RSPB - Rumah Sakit Pertamina Balikpapan 2022</p>
            </div>
          </div>
        </div>
      </div>
    </footer>
</html>