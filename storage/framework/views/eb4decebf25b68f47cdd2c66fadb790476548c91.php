<html>
    <head>

    </head>
    <body>
        <h2>List Mahasiswa</h2>
        <a href="<?php echo e(route('mahasiswa.create')); ?>" class="float-left btn btn-primary">Tambah</a>
    <table border="1">
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Jurusan</th>
            <th>Action</th>
        </tr>
        <?php $__currentLoopData = $mahasiswa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($item->id_mahasiswa); ?></td>
            <td><?php echo e($item->nama); ?></td>
            <td><?php echo e($item->jurusan); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
    </body>
</html><?php /**PATH C:\xampp\htdocs\code\blog\resources\views/mahasiswa.blade.php ENDPATH**/ ?>