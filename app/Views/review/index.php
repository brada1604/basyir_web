<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Master Review</h1>
    <p class="mb-4">Data untuk memanage review. </p>
    <a class="edit" href="/review/add"><button type="button" class="btn btn-primary">Tambah Review</button></a>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Review</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr align="center">
                            <th>No</th>
                            <th>Reviewer</th>
                            <th>Pekerjaan</th>
                            <th>Bintang</th>
                            <th>Pesan</th>
                            <th>status</th>
                            <th>Gambar</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr align="center">
                            <th>No</th>
                            <th>Reviewer</th>
                            <th>Pekerjaan</th>
                            <th>Bintang</th>
                            <th>Pesan</th>
                            <th>status</th>
                            <th>Gambar</th>
                            <th>Opsi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $nomor = 1;
                        foreach ($getReview as $row) :
                        ?>
                            <tr>
                                <td align="center"><?= $nomor++; ?></td>
                                <td><?= $row->reviewer; ?></td>
                                <td><?= $row->pekerjaan; ?></td>
                                <td><?= $row->bintang; ?></td>
                                <td><?= $row->pesan; ?></td>
                                <td align="center">
                                    <?php if ($row->status_review == 1) : ?>
                                        <span class="badge bg-success text-light">Show</span>
                                        <hr>
                                        <a class="edit_status" class="btn btn-outline-secondary" href="/review/edit_status/<?= $row->id_review; ?>/0" onClick='return confirm("Yakin akan hide data review ini untuk user?")'><button type="button" class="btn btn-outline-secondary">Hide</button></a>
                                    <?php elseif ($row->status_review == 0) : ?>
                                        <span class="badge bg-danger text-light">Hide</span>
                                        <hr>
                                        <a class="edit_status" class="btn btn-outline-secondary" href="/review/edit_status/<?= $row->id_review; ?>/1" onClick='return confirm("Yakin akan show data review ini untuk user?")'><button type="button" class="btn btn-outline-secondary">Show</button></a>
                                    <?php endif ?>
                                </td>
                                <td><img clas="bd-placeholder-img card-img-top" width="100" height="100" src="<?= base_url($row->gambar_reviewer); ?>"></td>
                                <td align="center">
                                    <a class="edit" class="btn btn-warning" href="/review/edit/<?= $row->id_review; ?>" title="Edit Data"><button type="button" class="btn btn-warning"><i class="fas fa-fw fa-pen"></i></button></a>
                                    <a class="hapus" class="btn btn-danger" href="/review/delete/<?= $row->id_review; ?>" title="Hapus Data" onClick='return confirm("Yakin akan menghapus data review ini?")'><button type="button" class="btn btn-danger"><i class="fas fa-fw fa-trash"></i></button></a>               
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->