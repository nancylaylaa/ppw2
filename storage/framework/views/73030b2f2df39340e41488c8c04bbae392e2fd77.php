

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h4>Edit Buku</h4>
        <?php $__currentLoopData = $data_buku; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $db): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <form method="post" action="<?php echo e(route('buku.update', $db->id)); ?>">
        <?php echo csrf_field(); ?>
            <div> Judul <input type="text" name="judul" value="<?php echo e($db->judul); ?>"></div>
            <div>Penulis <input type="text" name="penulis" value="<?php echo e($db->penulis); ?>"></div>
            <div>Harga <input type="text" name="harga" value="<?php echo e($db->harga); ?>"></div>
            <div>Tgl. Terbit <input id="datepicker" type = "text" required="required" name="tgl_terbit" 
            value="<?php echo e($db->tgl_terbit); ?>" class="form-control" placeholder = "yyyy/mm/dd"></div>
            <div><button type="submit">Update</button>
            <a href="/buku">Batal</a></div>
        </form>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\code\blog\resources\views/buku/edit.blade.php ENDPATH**/ ?>