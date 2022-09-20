<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('admin/components/header')?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <?php if ($this->session->flashdata('input')){ ?>
    <script>
    swal({
        title: "Success!",
        text: "Data Berhasil Ditambahkan!",
        icon: "success"
    });
    </script>
    <?php } ?>

    <?php if ($this->session->flashdata('eror_input')){ ?>
    <script>
    swal({
        title: "Erorr!",
        text: "Data Gagal Ditambahkan!",
        icon: "error"
    });
    </script>
    <?php } ?>

    <?php if ($this->session->flashdata('update')){ ?>
    <script>
    swal({
        title: "Success!",
        text: "Data Berhasil Diubah!",
        icon: "success"
    });
    </script>
    <?php } ?>

    <?php if ($this->session->flashdata('eror_update')){ ?>
    <script>
    swal({
        title: "Erorr!",
        text: "Data Gagal Diubah!",
        icon: "error"
    });
    </script>
    <?php } ?>

    <?php if ($this->session->flashdata('hapus')){ ?>
    <script>
    swal({
        title: "Success!",
        text: "Data Berhasil Dihapus!",
        icon: "success"
    });
    </script>
    <?php } ?>

    <?php if ($this->session->flashdata('eror_hapus')){ ?>
    <script>
    swal({
        title: "Erorr!",
        text: "Data Gagal Dihapus!",
        icon: "error"
    });
    </script>
    <?php } ?>


    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?=base_url();?>assets/admin_lte/dist/img/AdminLTELogo.png"
                alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <?php $this->load->view('admin/components/navbar')?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php $this->load->view('admin/components/sidebar')?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Produk</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Produk</li>
                            </ol>

                        </div><!-- /.col -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Tambah Produk
                        </button>
                        
                        <a type="button" target="_blank" href="<?=base_url();?>Cetak/laporan_pdf"
                            class="btn btn-primary ml-2">
                            Cetak Produk
                        </a>

                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Data Produk</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Produk</th>
                                                <th>Gambar Produk</th>
                                                <th>Harga Produk</th>
                                                <th>Diskon</th>
                                                <th>Jumlah Produk</th>
                                                <th>Tanggal Kadaluarsa</th>
                                                <th>Tanggal Produksi</th>
                                                <th>Deskripsi Produk</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $no = 0;
                                            foreach($produk as $i):
                                                $no++;
                                                $id_produk = $i['id_produk'];
                                                $nama_produk = $i['nama_produk'];
                                                $gambar_produk = $i['gambar_produk'];
                                                $harga_produk = $i['harga_produk'];
                                                $diskon = $i['diskon'];
                                                $jumlah_produk = $i['jumlah_produk'];
                                                $tanggal_kadaluarsa = $i['tanggal_kadaluarsa'];
                                                $tanggal_produksi = $i['tanggal_produksi'];
                                                $deskripsi_produk = $i['deskripsi_produk'];
                                                ?>
                                            <tr>
                                                <td><?=$no?></td>
                                                <td><?=$nama_produk?></td>
                                                <td>
                                                    <center>
                                                        <a href="<?=base_url();?>assets/gambar/<?=$gambar_produk?>"
                                                            target="_blank">
                                                            <img src="<?=base_url();?>assets/gambar/<?=$gambar_produk?>"
                                                                width="25%">
                                                        </a>
                                                    </center>
                                                </td>
                                                <td><?=$harga_produk?></td>
                                                <td><?=$diskon?></td>
                                                <td><?=$jumlah_produk?></td>
                                                <td><?=$tanggal_kadaluarsa?></td>
                                                <td><?=$tanggal_produksi?></td>
                                                <td><?=$deskripsi_produk?></td>
                                                <td>
                                                    <div class="table-responsive">
                                                        <div class="table table-striped table-hover ">
                                                            <a href="" class="btn btn-primary" data-toggle="modal"
                                                                data-target="#edit_data_produk<?= $id_produk ?>">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="table-responsive">
                                                        <div class="table table-striped table-hover ">
                                                            <a href="" data-toggle="modal"
                                                                data-target="#hapus<?php echo  $id_produk ?>"
                                                                class="btn btn-danger"><i class="fas fa-trash"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <!-- Modal Edit -->
                                            <div class="modal fade" id="edit_data_produk<?= $id_produk ?>" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit Produk
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="<?=base_url();?>Produk/edit_produk"
                                                                method="POST" enctype="multipart/form-data">
                                                                <input type="text" name="id_produk"
                                                                    value="<?=$id_produk?>" hidden>
                                                                <div class="form-group">
                                                                    <label for="nama_produk">Nama Produk</label>
                                                                    <input type="text" class="form-control"
                                                                        id="nama_produk" name="nama_produk"
                                                                        value="<?=$nama_produk?>" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="gambar_produk">Gambar Produk</label>
                                                                    <input type="file" class="form-control"
                                                                        id="gambar_produk" name="gambar_produk"
                                                                        required>
                                                                    <input type="text" class="form-control"
                                                                        id="gambar_produk_old" name="gambar_produk_old"
                                                                        value="<?=$gambar_produk?>" hidden>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="harga_produk">Harga Produk</label>
                                                                    <input type="number" class="form-control"
                                                                        id="harga_produk" name="harga_produk"
                                                                        value="<?=$harga_produk?>" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="diskon">Diskon</label>
                                                                    <input type="number" class="form-control"
                                                                        id="diskon" name="diskon" value="<?=$diskon?>"
                                                                        required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="jumlah_produk">Jumlah Produk</label>
                                                                    <input type="number" class="form-control"
                                                                        id="jumlah_produk" name="jumlah_produk"
                                                                        value="<?=$jumlah_produk?>" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="tanggal_kadaluarsa">Tanggal
                                                                        Kadaluarsa</label>
                                                                    <input type="date" class="form-control"
                                                                        id="tanggal_kadaluarsa"
                                                                        name="tanggal_kadaluarsa"
                                                                        value="<?=$tanggal_kadaluarsa?>" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="tanggal_produksi">Tanggal
                                                                        Produksi</label>
                                                                    <input type="date" class="form-control"
                                                                        id="tanggal_produksi" name="tanggal_produksi"
                                                                        value="<?=$tanggal_produksi?>" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="deskripsi">Deskripsi</label>
                                                                    <textarea class="form-control" id="deskripsi"
                                                                        name="deskripsi" rows="3"
                                                                        required><?=$deskripsi_produk?></textarea>
                                                                </div>

                                                                <button type="submit"
                                                                    class="btn btn-primary">Submit</button>
                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Modal Hapus Produk -->
                                            <div class="modal fade" id="hapus<?= $id_produk ?>" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Produk
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="<?php echo base_url()?>Produk/hapus_produk"
                                                                method="post" enctype="multipart/form-data">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <input type="hidden" name="id_produk"
                                                                            value="<?php echo $id_produk?>" />

                                                                        <input type="text" class="form-control"
                                                                            id="gambar_produk_old"
                                                                            aria-describedby="emailHelp"
                                                                            name="gambar_produk_old"
                                                                            value="<?=$gambar_produk?>" hidden>

                                                                        <p>Apakah kamu yakin ingin menghapus data
                                                                            ini?</i></b></p>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger ripple"
                                                                        data-dismiss="modal">Tidak</button>
                                                                    <button type="submit"
                                                                        class="btn btn-success ripple save-category">Ya</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endforeach; ?>
                                        </tbody>

                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="<?=base_url();?>Produk/tambah_produk" method="POST"
                                        enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="nama_produk">Nama Produk</label>
                                            <input type="text" class="form-control" id="nama_produk" name="nama_produk"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="gambar_produk">Gambar Produk</label>
                                            <input type="file" class="form-control" id="gambar_produk"
                                                name="gambar_produk" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="harga_produk">Harga Produk</label>
                                            <input type="number" class="form-control" id="harga_produk"
                                                name="harga_produk" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="diskon">Diskon</label>
                                            <input type="number" class="form-control" id="diskon" name="diskon"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="jumlah_produk">Jumlah Produk</label>
                                            <input type="number" class="form-control" id="jumlah_produk"
                                                name="jumlah_produk" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggal_kadaluarsa">Tanggal Kadaluarsa</label>
                                            <input type="date" class="form-control" id="tanggal_kadaluarsa"
                                                name="tanggal_kadaluarsa" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggal_produksi">Tanggal Produksi</label>
                                            <input type="date" class="form-control" id="tanggal_produksi"
                                                name="tanggal_produksi" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="deskripsi">Deskripsi</label>
                                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"
                                                required></textarea>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <?php $this->load->view('admin/components/js')?>
</body>

</html>