<?php
  $conn = mysqli_connect("localhost", "root", "", "mp-lomba");
  $daftarLomba = mysqli_query($conn, "SELECT * FROM lomba ORDER BY status DESC");
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Beranda - MP Lomba</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">
  <nav class="navbar sticky-top navbar-expand-lg navbar-light" style="background-color:#4E73DF">
    <div class="container">
      <a class="navbar-brand text-white" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
          <a class="nav-item nav-link ml-auto text-white" href="#" tabindex="-1" aria-disabled="true">Keluar</a>
        </div>
      </div>
    </div>
  </nav>

  <!-- Page Wrapper -->
  <div id="wrapper">


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column bg-white">

      <!-- Main Content -->
      <div id="content">
        <!-- Begin Page Content -->
        <div class="container-fluid mt-2">
          <!-- DataTales Example -->
          <div class="container border rounded pt-3 my-3">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active text-dark" id="beranda-tab" data-toggle="tab" href="#beranda" role="tab"
                  aria-controls="beranda" aria-selected="true">Beranda</a>
              </li>
            </ul>

            <div class="tab-content">

              <!-- Tampilan halaman beranda -->
              <div class="tab-pane fade show active" id="beranda" role="tabpanel" aria-labelledby="beranda-tab">
                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <div class="row">
                      <div class="col-1"></div>
                      <div class="col-10">
                        <h3 class="m-0 font-weight-bold text-dark text-center">Daftar Lomba</h3>
                      </div>
                      <div class="col-1">
                        <span data-toggle="modal" data-target="#modalTambahLomba">
                          <a class="btn btn-sm btn-success text-light" data-toggle="tooltip" data-placement="top"
                            title="Klik untuk menambahkan lomba baru"><i class="fa fa-plus"></i></a>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered" id="hasilPenilaian" width="100%" cellspacing="0">
                        <thead>
                          <tr>
                            <th class="text-center"> No </th>
                            <th class="text-center" style="width:200px"> Nama </th>
                            <th class="text-center"> Tanggal </th>
                            <th class="text-center" style="width:250px"> Lokasi </th>
                            <th class="text-center"> Status </th>
                            <th class="text-center"> Peserta </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $no = 1;
                            function hari($hari){
                              switch($hari){
                                case 'Sun':
                                  return "Minggu";
                                break;
                                case 'Mon':			
                                  return "Senin";
                                break;
                                case 'Tue':
                                  return "Selasa";
                                break;
                                case 'Wed':
                                  return "Rabu";
                                break;
                                case 'Thu':
                                  return "Kamis";
                                break;
                                case 'Fri':
                                  return "Jumat";
                                break;
                                case 'Sat':
                                  return "Sabtu";
                                break;
                                
                                default:
                                  return "Tidak di ketahui";		
                                break;
                              }
                            }
                            function bulan($bulan){
                              switch($bulan){
                                case '01':
                                  return "Jan";
                                break;
                                case '02':			
                                  return "Feb";
                                break;
                                case '03':
                                  return "Mar";
                                break;
                                case '04':
                                  return "Apr";
                                break;
                                case '05':
                                  return "Mei";
                                break;
                                case '06':
                                  return "Jun";
                                break;
                                case '07':
                                  return "Jul";
                                break;
                                case '08':
                                  return "Agu";
                                break;
                                case '09':
                                  return "Sep";
                                break;
                                case '10':
                                  return "Okt";
                                break;
                                case '11':
                                  return "Nov";
                                break;
                                case '12':
                                  return "Des";
                                break;
                                
                                default:
                                  return "Tidak di ketahui";		
                                break;
                              }
                            }
                            if(mysqli_num_rows($daftarLomba) > 0){
                              while($dataLomba = mysqli_fetch_array($daftarLomba)){
                          ?>
                          <tr>
                            <!-- Nomor  -->
                            <td class="text-center align-middle"> <?= $no++;?> </td>
                            <!-- Akhir nomor  -->

                            <!-- Nama lomba  -->
                            <td class="align-midde align-middle">
                              <span data-toggle="modal" data-target="#modalUbahNamaLomba">
                                <a data-toggle="tooltip" data-placement="top" title="Klik untuk mengubah nama lomba"
                                  style="text-decoration:none; color:#8D8796;" class="nama_lomba">
                                  <?= $dataLomba['nama_lomba'];?>
                                </a>
                              </span>
                            </td>
                            <!-- Akhir nama lomba  -->

                            <!-- Tanggal lomba -->
                            <td class="text-center align-middle">
                              <span data-toggle="modal" data-target="#modalUbahTanggalLomba">
                                <a data-toggle="tooltip" data-placement="top"
                                  title="Klik untuk mengubah tanggal lomba" style="text-decoration:none; color:#8D8796;"
                                  class="tanggal_lomba">
                                  <?= hari(date('D', strtotime($dataLomba['tanggal_lomba']))); ?>,
                                  <?= date('d', strtotime($dataLomba['tanggal_lomba']));?>
                                  <?= bulan(date('m', strtotime($dataLomba['tanggal_lomba']))); ?>
                                  <?= date('Y', strtotime($dataLomba['tanggal_lomba']));?>
                                </a>
                              </span>
                            </td>
                            <!-- Akhir tanggal lomba -->

                            <!-- Lokasi lomba -->
                            <td class="align-middle""> 
                              <a href="" data-toggle=" tooltip" data-placement="top"
                              title="Klik untuk mengubah lokasi lomba" style="text-decoration:none; color:#8D8796;"
                              class="lokasi_lomba">
                              <?= $dataLomba['lokasi_lomba'];?>
                              </a>
                            </td>
                            <!-- Akhir lokasi lomba -->

                            <!-- Status lomba -->
                            <td class=" text-center align-middle"">
                              <?php
                                if( $dataLomba['status'] == 0){ ?>
                                 <a href="" class="btn btn-sm btn-success" style="width:80px;" data-toggle="tooltip" data-placement="top" title="Klik untuk melihat hasil lomba"> Selesai </a>
                                <?php } else if( $dataLomba['status'] == 1 ){ ?>
                                  <a href="" class="btn btn-sm btn-warning" style="width:80px;" data-toggle="tooltip" data-placement="top" title="Lomba akan / sedang berjalan"> Berjalan </a>
                                <?php } else if( $dataLomba['status'] == 2 ){ ?>
                                  <a href="penilaianLomba.php?id=<?=$dataLomba['id_lomba']?>" class="btn btn-sm btn-danger" style="width:80px;" data-toggle="tooltip" data-placement="top" title="Klik untuk melakukan penilaian"> Penilaian </a>
                                <?php }
                              ?>
                            </td>
                            <!-- Akhir status lomba -->

                            <!-- Tambah peserta -->
                            <td class=" text-center align-middle">
                              <a href="" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Klik untuk menambahkan peserta baru">Tambah</a>
                            </td>
                            <!-- Akhir tambah peserta -->
                          </tr>
                          <?php 
                              } 
                            }
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Akhir halaman beranda -->
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer" style="height: 20px; background-color:#4E73DF">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span class="text-white">Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Modal Tambah Lomba-->
  <div class="modal" id="modalTambahLomba">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <h4 class="modal-title text-center mb-3">Tambah Lomba</h4>
          <form action="">
            <div class="row">
              <div class="col-1"></div>
              <div class="col-10">
                <div class="form-group">
                  <label for="namaLomba">Lomba</label>
                  <input type="text" class="form-control" id="namaLomba">
                </div>
                <div class="form-group">
                  <label for="tanggalLomba">Tanggal</label>
                  <input type="date" class="form-control" id="tanggalLomba">
                </div>
                <div class="form-group">
                  <label for="lokasiLomba">Lokasi</label>
                  <input type="text" class="form-control" id="lokasiLomba">
                </div>
              </div>
              <div class="col-1"></div>
            </div>
          </form>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Submit</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>
  <!-- Akhir modal tambah lomba -->

  <!-- Modal Ubah Nama Lomba-->
  <div class="modal" id="modalUbahNamaLomba">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <h4 class="modal-title text-center mb-3">Ubah Nama Lomba</h4>
          <form action="">
            <div class="row">
              <div class="col-1"></div>
              <div class="col-10">
                <div class="form-group">
                  <label for="usr">Nama Lomba</label>
                  <input type="text" class="form-control" id="usr">
                </div>
              </div>
              <div class="col-1"></div>
            </div>
          </form>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Submit</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>
  <!-- Akhir modal ubah nama lomba -->

  <!-- Modal ubah tanggal lomba-->
  <div class="modal" id="modalUbahTanggalLomba">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <h4 class="modal-title text-center mb-3">Ubah Tanggal Lomba</h4>
          <form action="">
            <div class="row">
              <div class="col-1"></div>
              <div class="col-10">
                <div class="form-group">
                  <label for="ubahTanggalLomba">Tanggal</label>
                  <input type="date" class="form-control" id="ubahTanggalLomba">
                </div>
              </div>
              <div class="col-1"></div>
            </div>
          </form>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Submit</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>
  <!-- Akhir modal ubah tanggal lomba -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <script>
    $(function () {
      $('#hasilPenilaian').DataTable();
    });

    $(function () {
      $('#penilaianJuri').DataTable();
    });
  </script>

  <script>
    $(document).ready(function () {
      $('[data-toggle="tooltip"]').tooltip();
    });
  </script>

  <script>
    $('#btn-next-1').click(function () {
      $('#btn-next-1').remove();
      $('.progress-bar').attr('style', 'width:20%;');
      $('#btn').prepend(`<a class="btn btn-primary text-white" id="btn-next-2">Next</a></div>`);
      $('#btn-next-2').click(function () {
        $('#btn-prev-1').remove();
        $('#btn-next-2').remove();
        $('.progress-bar').attr('style', 'width:40%;');
        $('#btn').prepend(`<a class="btn btn-primary text-white" id="btn-next-3">Next</a></div>`);
        $('#btn-next-3').click(function () {
          $('#btn-prev-2').remove();
          $('#btn-next-3').remove();
          $('.progress-bar').attr('style', 'width:60%;');
          $('#btn').prepend(`<a class="btn btn-primary text-white" id="btn-next-4">Next</a></div>`);
          $('#btn-next-4').click(function () {
            $('#btn-prev-3').remove();
            $('#btn-next-4').remove();
            $('.progress-bar').attr('style', 'width:80%;');
            $('#btn').prepend(`<a class="btn btn-primary text-white" id="btn-next-5">Next</a></div>`);
            $('#btn-next-5').click(function () {
              $('#btn-prev-4').remove();
              $('#btn-next-5').remove();
              $('.progress-bar').attr('style', 'width:100%;');
              $('#btn').prepend(
                `<a class="btn btn-primary text-white" id="btn-submit">Submit</a></div>`);
            });
          });
        });
      });
    });
  </script>

</body>

</html>