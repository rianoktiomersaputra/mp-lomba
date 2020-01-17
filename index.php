<?php
  $conn = mysqli_connect("localhost", "root", "", "mp-lomba");
  $daftarLomba = mysqli_query($conn, "SELECT * FROM dev GROUP BY nomor_peserta ORDER BY all_total DESC");
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
                    <a class="nav-item nav-link ml-auto text-white" href="#" tabindex="-1"
                        aria-disabled="true">Keluar</a>
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
                                <a class="nav-link active text-dark" id="beranda-tab" data-toggle="tab" href="#beranda"
                                    role="tab" aria-controls="beranda" aria-selected="true">Beranda</a>
                            </li>
                        </ul>

                        <div class="tab-content">

                            <!-- Tampilan halaman beranda -->
                            <div class="tab-pane fade show active" id="beranda" role="tabpanel"
                                aria-labelledby="beranda-tab">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <div class="row">
                                            <div class="col-1"></div>
                                            <div class="col-10">
                                                <h3 class="m-0 font-weight-bold text-dark text-center">Daftar Penilaian Juri</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="hasilPenilaian" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center"> Nomor Kerekan </th>
                                                        <th class="text-center"> Nama Pemilik </th>
                                                        <th class="text-center"> Babak I </th>
                                                        <th class="text-center"> Babak II </th>
                                                        <th class="text-center"> Babak III </th>
                                                        <th class="text-center"> Babak IV </th>
                                                        <th class="text-center"> Urutan Juara </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $no =1;
                                                if(mysqli_num_rows($daftarLomba) > 0){
                                                    while($dP = mysqli_fetch_array($daftarLomba)){
                                                ?>
                                                    <tr>
                                                        <td class="text-center align-middle"> 
                                                            <?=$dP['nomor_peserta']?> 
                                                        </td>
                                                        <td class="text-center align-middle">
                                                        <?php if ($dP['nama_peserta'] == ""){ ?>
                                                            <span data-toggle="modal" data-id="<?=$dP['id_dev']?>" class="idDevPesertaBtnModal" data-target="#modalTambahNama">
                                                                <a data-toggle="tooltip" data-placement="top" title="Klik untuk memasukkan nama peserta" style="text-decoration:none; color:white;" class="btn btn-sm btn-success">Masukkan nama</a>
                                                            </span>
                                                        <?php } else { ?>
                                                            <?=$dP['nama_peserta']?>
                                                        <?php } ?>
                                                        </td>
                                                        <td class="text-center align-middle">
                                                        <?php if ($dP['jumlah_nilai'] == "0"){ ?>
                                                            <span data-toggle="modal" data-id="<?=$dP['id_dev']?>" class="idDevPesertaBtnModal" data-target="#modalBabakI">
                                                                <a data-toggle="tooltip" data-placement="top" title="Klik untuk memasukkan nilai babak I <?=$dP['nama_peserta']?>" style="text-decoration:none; color:white;" class="btn btn-sm btn-success">Masukkan nilai</a>
                                                            </span>
                                                        <?php } else { ?>
                                                            <?=$dP['jumlah_nilai']/5?>
                                                        <?php } ?>
                                                        </td>
                                                        <td class="text-center align-middle">
                                                        <?php if ($dP['jumlah_nilai_babak_2'] == "0"){ ?>
                                                            <span data-toggle="modal" data-id="<?=$dP['id_dev']?>" class="idDevPesertaBtnModal" data-target="#modalBabakII">
                                                                <a data-toggle="tooltip" data-placement="top" title="Klik untuk memasukkan nilai babak II <?=$dP['nama_peserta']?>" style="text-decoration:none; color:white;" class="btn btn-sm btn-success">Masukkan nilai</a>
                                                            </span>
                                                        <?php } else { ?>
                                                            <?=$dP['jumlah_nilai_babak_2']/5?>
                                                        <?php } ?>
                                                        </td>
                                                        <td class="text-center align-middle">
                                                        <?php if ($dP['jumlah_nilai_babak_3'] == "0"){ ?>
                                                            <span data-toggle="modal" data-id="<?=$dP['id_dev']?>" class="idDevPesertaBtnModal" data-target="#modalBabakIII">
                                                                <a data-toggle="tooltip" data-placement="top" title="Klik untuk memasukkan nilai babak III <?=$dP['nama_peserta']?>" style="text-decoration:none; color:white;" class="btn btn-sm btn-success">Masukkan nilai</a>
                                                            </span>
                                                        <?php } else { ?>
                                                            <?=$dP['jumlah_nilai_babak_3']/5?>
                                                        <?php } ?>
                                                        </td>
                                                        <td class="text-center align-middle">
                                                        <?php if ($dP['jumlah_nilai_babak_4'] == "0"){ ?>
                                                            <span data-toggle="modal" data-id="<?=$dP['id_dev']?>" class="idDevPesertaBtnModal" data-target="#modalBabakIV">
                                                                <a data-toggle="tooltip" data-placement="top" title="Klik untuk memasukkan nilai babak IV <?=$dP['nama_peserta']?>" style="text-decoration:none; color:white;" class="btn btn-sm btn-success">Masukkan nilai</a>
                                                            </span>
                                                        <?php } else { ?>
                                                            <?=$dP['jumlah_nilai_babak_4']/5?>
                                                        <?php } ?>
                                                        </td>

                                                        <td class="text-center align-middle">
                                                        <?php if($dP['jumlah_nilai'] == 0 || $dP['jumlah_nilai_babak_2'] == 0 || $dP['jumlah_nilai_babak_3'] == 0 || $dP['jumlah_nilai_babak_4'] == 0){ ?>
                                                            
                                                                <form action="" method="post">
                                                                <button type="submit" class="btn btn-sm btn-success" name="total" disabled>Submit</button>
                                                                </form>
                                                            <?php  
                                                            } else if ($dP['all_total'] == 0){
                                                            ?>
                                                                <?php if(isset($_POST['total'])){ 
                                                                    $id_dev = $dP['id_dev'];
                                                                    $babak1 = $dP['jumlah_nilai'];
                                                                    $babak2 = $dP['jumlah_nilai_babak_2'];
                                                                    $babak3 = $dP['jumlah_nilai_babak_3'];
                                                                    $babak4 = $dP['jumlah_nilai_babak_4'];
                                                                    $total = $babak1 + $babak2 + $babak3 + $babak4;
                                                                    $editTotal = mysqli_query($conn, "UPDATE dev SET all_total = '$total' WHERE id_dev='$id_dev'");
                                                                ?> 
                                                                <form action="" method="post">
                                                                    <button type="submit" class="btn btn-sm btn-success" name="total">Submit</button>
                                                                </form> 
                                                        <?php } } else { ?> 
                                                            <?=$dP['all_total']/5/4?>/ Juara <?=$no++;?>
                                                        <?php } ?>
                                                        </td>
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

    <!-- Modal Tambah Peserta-->
    <div class="modal" id="modalTambahNama">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <h4 class="modal-title text-center mb-3">Tambah Nama Peserta</h4>
                    <?php 
                        if(isset($_POST['btnNamaPeserta'])){
                            $id_dev = $_POST['idDevPeserta'];
                            $nama = $_POST['namaPeserta'];
                            $editNamaPeserta = mysqli_query($conn, "UPDATE dev SET nama_peserta = '$nama' WHERE id_dev='$id_dev'");
                        }
                    ?>
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-1"></div>
                            <div class="col-10">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="idDevPeserta" name="idDevPeserta" hidden>
                                    <label for="namaPeserta">Nama Peserta</label>
                                    <input type="text" class="form-control" id="namaPeserta" name="namaPeserta">
                                </div>
                            </div>
                            <div class="col-1"></div>
                        </div>
                    
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" name="btnNamaPeserta">Submit</button>
                    </form>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
    <!-- Akhir modal ubah nama lomba -->

    <!-- Modal Babai I-->
    <div class="modal" id="modalBabakI">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <h4 class="modal-title text-center mb-3">Tambah Nilai <?=$dP['nama_peserta']?> | Babak I</h4>
                    <?php 
                        if(isset($_POST['btnBabakI'])){
                            $id_dev = $_POST['idDevPeserta'];
                            $suara_depan = $_POST['suara_depan'];
                            $suara_tengah = $_POST['suara_tengah'];
                            $suara_ujung = $_POST['suara_ujung'];
                            $irama = $_POST['irama'];
                            $dasar_suara = $_POST['dasar_suara'];
                            $total_nilai = $suara_depan + $suara_tengah + $suara_ujung + $irama + $dasar_suara;
                            $editBabakI = mysqli_query($conn, "UPDATE dev SET suara_depan = '$suara_depan', suara_tengah = '$suara_tengah', suara_ujung = '$suara_ujung', irama = '$irama', dasar_suara = '$dasar_suara', jumlah_nilai = '$total_nilai' WHERE id_dev='$id_dev'");
                        }
                    ?>
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-1"></div>
                            <div class="col-10">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="idDevPeserta" name="idDevPeserta" hidden>
                                    <label for="suara_depan">Suara Depan</label>
                                    <input type="number" class="form-control" id="suara_depan" name="suara_depan" min=1 max=100>
                                    <label for="suara_tengah">Suara Tengah</label>
                                    <input type="number" class="form-control" id="suara_tengah" name="suara_tengah" min=1 max=100>
                                    <label for="suara_ujung">Suara Ujung</label>
                                    <input type="number" class="form-control" id="suara_ujung" name="suara_ujung" min=1 max=100>
                                    <label for="irama">Irama</label>
                                    <input type="number" class="form-control" id="irama" name="irama" min=1 max=100>
                                    <label for="dasar_suara">Dasar Suara</label>
                                    <input type="number" class="form-control" id="dasar_suara" name="dasar_suara" min=1 max=100>
                                </div>
                            </div>
                            <div class="col-1"></div>
                        </div>
                    
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" name="btnBabakI">Submit</button>
                    </form>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
    <!-- Akhir modal babak I -->

    <!-- Modal Babak II-->
    <div class="modal"Id="modalBabakII">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <h4 class="modal-title text-center mb-3">Tambah Nilai <?=$dP['nama_peserta']?> | Babak II</h4>
                    <?php 
                        if(isset($_POST['btnBabakII'])){
                            $id_dev = $_POST['idDevPeserta'];
                            $suara_depan = $_POST['suara_depan'];
                            $suara_tengah = $_POST['suara_tengah'];
                            $suara_ujung = $_POST['suara_ujung'];
                            $irama = $_POST['irama'];
                            $dasar_suara = $_POST['dasar_suara'];
                            $total_nilai = $suara_depan + $suara_tengah + $suara_ujung + $irama + $dasar_suara;
                            $editBabakI = mysqli_query($conn, "UPDATE dev SET suara_depan_2 = '$suara_depan', suara_tengah_2 = '$suara_tengah', suara_ujung_2 = '$suara_ujung', irama_2 = '$irama', dasar_suara_2 = '$dasar_suara', jumlah_nilai_babak_2 = '$total_nilai' WHERE id_dev='$id_dev'");
                        }
                    ?>
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-1"></div>
                            <div class="col-10">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="idDevPeserta" name="idDevPeserta" hidden>
                                    <label for="suara_depan">Suara Depan</label>
                                    <input type="number" class="form-control" id="suara_depan" name="suara_depan" min=1 max=100>
                                    <label for="suara_tengah">Suara Tengah</label>
                                    <input type="number" class="form-control" id="suara_tengah" name="suara_tengah" min=1 max=100>
                                    <label for="suara_ujung">Suara Ujung</label>
                                    <input type="number" class="form-control" id="suara_ujung" name="suara_ujung" min=1 max=100>
                                    <label for="irama">Irama</label>
                                    <input type="number" class="form-control" id="irama" name="irama" min=1 max=100>
                                    <label for="dasar_suara">Dasar Suara</label>
                                    <input type="number" class="form-control" id="dasar_suara" name="dasar_suara" min=1 max=100>
                                </div>
                            </div>
                            <div class="col-1"></div>
                        </div>
                    
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" name="btnBabakII">Submit</button>
                    </form>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
    <!-- Akhir modal babak II -->

    <!-- Modal Babak III-->
    <div class="modal"Id="modalBabakIII">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <h4 class="modal-title text-center mb-3">Tambah Nilai <?=$dP['nama_peserta']?> | Babak III</h4>
                    <?php 
                        if(isset($_POST['btnBabakIII'])){
                            $id_dev = $_POST['idDevPeserta'];
                            $suara_depan = $_POST['suara_depan'];
                            $suara_tengah = $_POST['suara_tengah'];
                            $suara_ujung = $_POST['suara_ujung'];
                            $irama = $_POST['irama'];
                            $dasar_suara = $_POST['dasar_suara'];
                            $total_nilai = $suara_depan + $suara_tengah + $suara_ujung + $irama + $dasar_suara;
                            $editBabakI = mysqli_query($conn, "UPDATE dev SET suara_depan_3 = '$suara_depan', suara_tengah_3 = '$suara_tengah', suara_ujung_3 = '$suara_ujung', irama_3 = '$irama', dasar_suara_3 = '$dasar_suara', jumlah_nilai_babak_3 = '$total_nilai' WHERE id_dev='$id_dev'");
                        }
                    ?>
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-1"></div>
                            <div class="col-10">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="idDevPeserta" name="idDevPeserta" hidden>
                                    <label for="suara_depan">Suara Depan</label>
                                    <input type="number" class="form-control" id="suara_depan" name="suara_depan" min=1 max=100>
                                    <label for="suara_tengah">Suara Tengah</label>
                                    <input type="number" class="form-control" id="suara_tengah" name="suara_tengah" min=1 max=100>
                                    <label for="suara_ujung">Suara Ujung</label>
                                    <input type="number" class="form-control" id="suara_ujung" name="suara_ujung" min=1 max=100>
                                    <label for="irama">Irama</label>
                                    <input type="number" class="form-control" id="irama" name="irama" min=1 max=100>
                                    <label for="dasar_suara">Dasar Suara</label>
                                    <input type="number" class="form-control" id="dasar_suara" name="dasar_suara" min=1 max=100>
                                </div>
                            </div>
                            <div class="col-1"></div>
                        </div>
                    
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" name="btnBabakIII">Submit</button>
                    </form>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
    <!-- Akhir modal babak III -->

    <!-- Modal Babak III-->
    <div class="modal"Id="modalBabakIV">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <h4 class="modal-title text-center mb-3">Tambah Nilai <?=$dP['nama_peserta']?> | Babak IV</h4>
                    <?php 
                        if(isset($_POST['btnBabakIV'])){
                            $id_dev = $_POST['idDevPeserta'];
                            $suara_depan = $_POST['suara_depan'];
                            $suara_tengah = $_POST['suara_tengah'];
                            $suara_ujung = $_POST['suara_ujung'];
                            $irama = $_POST['irama'];
                            $dasar_suara = $_POST['dasar_suara'];
                            $total_nilai = $suara_depan + $suara_tengah + $suara_ujung + $irama + $dasar_suara;
                            $editBabakI = mysqli_query($conn, "UPDATE dev SET suara_depan_4 = '$suara_depan', suara_tengah_4 = '$suara_tengah', suara_ujung_4 = '$suara_ujung', irama_4 = '$irama', dasar_suara_4 = '$dasar_suara', jumlah_nilai_babak_4 = '$total_nilai' WHERE id_dev='$id_dev'");
                        }
                    ?>
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-1"></div>
                            <div class="col-10">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="idDevPeserta" name="idDevPeserta" hidden>
                                    <label for="suara_depan">Suara Depan</label>
                                    <input type="number" class="form-control" id="suara_depan" name="suara_depan" min=1 max=100>
                                    <label for="suara_tengah">Suara Tengah</label>
                                    <input type="number" class="form-control" id="suara_tengah" name="suara_tengah" min=1 max=100>
                                    <label for="suara_ujung">Suara Ujung</label>
                                    <input type="number" class="form-control" id="suara_ujung" name="suara_ujung" min=1 max=100>
                                    <label for="irama">Irama</label>
                                    <input type="number" class="form-control" id="irama" name="irama" min=1 max=100>
                                    <label for="dasar_suara">Dasar Suara</label>
                                    <input type="number" class="form-control" id="dasar_suara" name="dasar_suara" min=1 max=100>
                                </div>
                            </div>
                            <div class="col-1"></div>
                        </div>
                    
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" name="btnBabakIV">Submit</button>
                    </form>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
    <!-- Akhir modal babak IV -->

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

        $(document).on("click", ".idDevPesertaBtnModal", function () {
            var idDevPeserta = $(this).data('id');
            $(".modal-body #idDevPeserta").val( idDevPeserta);
            // As pointed out in comments, 
            // it is unnecessary to have to manually call the modal.
            // $('#addBookDialog').modal('show');
        });
    </script>

</body>

</html>