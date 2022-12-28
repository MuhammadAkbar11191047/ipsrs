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
        <link rel="stylesheet" href="{{ asset('backend/assets/cssl/petugas.css') }}"/>
        <link rel="icon" href="{{ asset('backend/assets/logo/logo_RSPB.png') }}"/>
        <link rel="preconnect" href="https://fonts.googleapis.com"/>
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap" rel="stylesheet"/>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    </head>
    <!-- ===== HEADER ===== -->
    
    <div id="top-header">
      <div class="container clearfix">
        <div id="et-secondary-menu">
          <!-- menu mobile -->
          <label for="check" class="mobile-menu"><i class="fa-solid fa-bars fa-2x"></i></label>
          
          <!-- -->
          <ul id="et-secondary-nav" class="menu">
            <li id="list" class ="menu-item menu-item-type-custom menu-item-object-custom menu-item-110">
              <a target="_blank" rel="noopener" href="/login">Login sebagai Admin</a>
            </li>
            <li id="list" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-14420">
              <a href="/">IPSRS</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <header id="header" class="fixed-top">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="d-flex align-items-center">
            <a class="logo-mr-auto"><img style="width: 1520px;" id="logoLengkap" src="{{ asset('backend/assets/logo/logo_4C.png')}}" alt=""></a>
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
              <b>AKTIVITAS HARIAN IPSRS</b>
            </h1>
        </div>
        <div id="form" class="fullCard" id="thumbnail">
          <div class="cardContent">
            <div class="cardText">
              <form class="row g-3" action="/postrespon" method="POST" enctype="multipart/form-data">
                @csrf                
                <div class="col-md-4">
                  <label for="inputBagian" class="form-label" name ="bagian">Bagian</label>
                  <select id="inputBagian" class="form-select" name="bagian"required>
                    <option selected>Choose...</option>
                    @foreach ($bagian as $item => $result)
                      <option value="{{ $result->nama_bagian }}">{{ $result->nama_bagian }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-4">
                  <label for="inputStatus" class="form-label" name = 'status_pekerjaan'>Status Pekerjaan</label>
                  <select id="inputStatus" class="form-select" name="status_pekerjaan"required>
                    <option selected>Choose...</option>
                    <option value="selesai">Selesai</option>
                      <option value="belum selesai">Belum Selesai</option>
                    </select>  
                </div>
                <div class="col-md-4">
                  <label for="inputStatus" class="form-label"name = 'status_pekerjaan'>Bagian yng Dikerjakan</label>
                  <select id="inputStatus" class="form-select" name="id_laporan"required>
                    <option selected>Choose...</option>
                    @foreach ($laporan as $item => $result)
                      <option value="{{ $result->id }}">{{ $result->perihal }}</option>
                    @endforeach
                  </select> 
                </div>
                <div class="col-md-4">
                  <label for="inputLokasi" class="form-label" name = 'lokasi'>Lokasi</label>
                  <select id="inputLokasi" class="form-select" name="lokasi"required>
                    <option selected>Choose...</option>
                    @foreach ($lokasi as $item => $result)
                      <option value="{{ $result->nama_lokasi }}">{{ $result->nama_lokasi }}</option>
                    @endforeach
                  </select>  
                </div>
                <div class="col-md-8">
                  <label for="inputPetugas" class="form-label" name = 'petugas'>Petugas</label>
                  <select id="inputPetugas" class="select form-select" name="petugas[]"required multiple="multiple" style="padding:6px 12px;">
                    @foreach ($petugas as $item => $result)
                      <option value="{{ $result->nama_petugas }}">{{ $result->nama_petugas }}</option>
                    @endforeach
                  </select>  
                </div>
                <div class="col-md-6">
                  <label for="inputRuangan" class="form-label" name = 'ruangan'>Ruangan Yang Di Kerjakan</label>
                  <input type="text" class="form-control" id="inputRuangan" name="ruangan"required>
                </div>
                <div class="col-md-2">
                  <label for="inputNoruangan" class="form-label" name = 'no_ruangan'>Nomer Ruangan</label>
                  <input type="text" class="form-control" id="inputNoruangan" name="no_ruangan"required>
                </div>
                <div class="col-md-4">
                  <label for="inputEstimasi" class="form-label" name = 'estimasi_biaya'>Estimasi Biaya</label>
                  <input type="text" class="form-control" id="inputEstimasi" name="biaya"required>
                </div>
                <div class="col-md-6">
                  <label for="inputPekerjan" class="form-label" name = pekerjaan>Pekerjaan Yang Di Lakukan</label>
                  <textarea type="text" class="form-control" id="inputPekerjan" placeholder="" name="pekerjaan"required></textarea>
                </div>
                <div class="col-md-4">
                  <label for="inputTanggal" class="form-label" name = 'tanggal_pengerjaan'>Tanggal Pengerjaan / Penyelesaian</label>
                  <input type="datetime-local" class="form-control" id="inputTanggal" name="tanggal"required>
                </div>
                <div class="mb-3 col-4">
                  <label for="inputFile" class="form-label" name = 'foto_pendukung'>Bukti Perbaikan / Perawatan</label>
                  <input class="form-control" type="file" id="inputFile" name="bukti" multiple required>
                </div>
                <div class="row d-grid gap-2 d-md-flex justify-content-md-start">
                  <button id="submitForm" type="submit" class="btn btn-primary" name ='input'>Submit Form</button>
                </div>
                @include('sweetalert::alert')
              </form>
            </div>
          </div>
        </div>z
    </div>
    </body>
    
    <script>$(document).ready(function() {
      $('.select.form-select').select2();
    });
    </script>

</html>