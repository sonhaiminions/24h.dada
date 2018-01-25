<?php $__env->startSection('content'); ?>


<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Category
                    <small>List</small>
                </h1>
            </div>
            <div style="margin-bottom: 15px;">
                <form action="admin/category/search" method="POST">
                      <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                    <input type="text" name="search">
                    <input type="submit" name="gui" value="tim">
                </form>
            </div>
            <!-- /.col-lg-12 -->
            <?php if(session('success')): ?>
            <div class="alert alert-success">
              <p><?php echo e(session('success')); ?></p>
          </div>
          <?php endif; ?>
          <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>Thể loại tin </th>
                    <th>Mô tả</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $cate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr class="even gradeC" align="center">
                <td><?php echo e($key->id); ?></td>
                <td><?php echo e($key->name); ?></td>
                <td><?php echo e($key->des); ?></td>

                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/category/delete/<?php echo e($key->id); ?>"> Delete</a></td>
                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/category/edit/<?php echo e($key->id); ?>">Edit</a></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>