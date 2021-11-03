<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <h3>Daftar Buku Novel</h3>
    </head>
    <body>
        <?php if(Session::has('pesan')): ?>
            <div class="alert alert-success"><?php echo e(Session::get('pesan')); ?></div>
        <?php endif; ?>
        <form action="<?php echo e(route('buku.create')); ?>">
            <button class="btn btn-info">Tambah buku</button>
        </form>
        <form action="<?php echo e(route('buku.search')); ?>" method="get">
            <input type="text" name="kata" class="form-control" placeholder="Cari ..." style="width: 30%; 
            display: inline; margin-top: 10px; margin-bottom: 10px; float: right;">
        </form>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Judul Buku</th>
                    <th>Penulis</th>
                    <th>Harga</th>
                    <th>Tgl. Terbit</th>
                    <th colspan='2'>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $data_buku; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $buku): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e(++$no); ?></td>
                    <td><?php echo e($buku->judul); ?></td>
                    <td><?php echo e($buku->penulis); ?></td>
                    <td><?php echo e(number_format($buku->harga, 0, ',', '.')); ?></td>
                    <td><?php echo e($buku->tgl_terbit->format('d/m/Y')); ?></td>
                    <td>
                        <form action="<?php echo e(route('buku.edit', $buku->id)); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <button class="btn btn-success">Edit</button>
                        </form>
                    </td>
                    <td>
                        <form action="<?php echo e(route('buku.destroy', $buku->id)); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <button class="btn btn-danger" onclick="return confirm('Yakin mau dihapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <!-- <tr>
                    <td colspan='4'>Total Buku</td>
                    <td><?php echo e($jumlah); ?></td>
                </tr>
                <tr>
                    <td colspan='4'>Total Harga</td>
                    <td><?php echo e("Rp ".number_format($total, 2, ',', '.')); ?></td>
                </tr> -->
            </tbody>
        </table>
        <div><?php echo e($data_buku->links()); ?></div>
        <?php if(count($data_buku)): ?>
            <div class="alert alert-success">Ditemukan <strong><?php echo e(count($data_buku)); ?></strong> 
            data dengan kata: <strong><?php echo e($cari); ?></strong></div>
        <?php else: ?>
            <div class="alert alert-warning"><h4>Data <?php echo e($cari); ?> tidak ditemukan</h4>
            <a href="/buku" class="btn btn-warning">Kembali</a></div>
        <?php endif; ?>
    </body>
</html><?php /**PATH C:\xampp\htdocs\code\blog\resources\views/buku/search.blade.php ENDPATH**/ ?>