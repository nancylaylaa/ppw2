
<?php if(count($errors) > 0): ?>
    <ul class="alert alert-danger">
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
<?php endif; ?>
<?php $__env->startSection('content'); ?>
    <div class="container">
        <h4>Tambah Buku</h4>
        <form method="post" action="<?php echo e(route('buku.store')); ?>">
        <?php echo csrf_field(); ?>
            <div>Judul <input type="text" name="judul"></div>
            <div>Penulis <input type="text" name="penulis"></div>
            <div>Harga <input type="text" name="harga"></div>
            <div>Tgl. Terbit <input type="text" id="datepicker" name="tgl_terbit" class="date form-control" 
            placeholder="yyyy/mm/dd"></div>
            <div><button type="submit">Simpan</button>
            <a href="/buku">Batal</a></div>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\code\blog\resources\views/buku/create.blade.php ENDPATH**/ ?>