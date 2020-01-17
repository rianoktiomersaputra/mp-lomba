<?php
    $id = $_GET['id'];
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

    <title>Penilaian Juri - MP Lomba</title>

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
                                    role="tab" aria-controls="beranda" aria-selected="true">Penilaian Juri</a>
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
                                                <h3 class="m-0 font-weight-bold text-dark text-center">Penilaian Juri</h3>
                                            </div>
                                            <div class="col-1">
                                                <span data-toggle="modal" data-target="#modalTambahLomba">
                                                    <a class="btn btn-sm btn-success text-light" data-toggle="tooltip"
                                                        data-placement="top"
                                                        title="Klik untuk menambahkan lomba baru"><i
                                                            class="fa fa-plus"></i></a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="hasilPenilaian" width="100%"
                                                cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center"> No </th>
                                                        <th class="text-center"> Nomor Kerekan </th>
                                                        <th class="text-center"> Nama Pemilik </th>
                                                        <th class="text-center"> Suara Depan </th>
                                                        <th class="text-center"> Suara Tengah </th>
                                                        <th class="text-center"> Suara Ujung </th>
                                                        <th class="text-center"> Irama </th>
                                                        <th class="text-center"> Dasar Suara </th>
                                                        <th class="text-center"> Jumlah Nilai </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
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

</body>

</html>