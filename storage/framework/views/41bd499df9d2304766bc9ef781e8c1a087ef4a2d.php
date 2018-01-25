<?php $__env->startSection('content'); ?>
 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">New
                            <small>List</small>
                        </h1>
                    </div>
                     <div style="margin-bottom: 15px;">
                <form action="admin/news/search" method="POST">
                      <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                    <input type="text" name="search">
                    <input type="submit" name="gui" value="tim">
                </form>
            </div>
                    <?php if(session('thongbao')): ?>
                    <div class="alert alert-success">
                        <p><?php echo e(session('thongbao')); ?></p>
                    </div>
                    <?php endif; ?>
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tiêu đề</th>
                                <th>thể loại</th>
                                <th>Nội Dung</th>
                                <th>Hình ảnh</th>
                                <th>lượt xem</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $new; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="odd gradeX" align="center">

                                <td><?php echo e($key->id); ?></td>
                                <td><?php echo e($key->title); ?></td>
                                <td><?php echo e($key->id_cat); ?></td>
                                <td><?php echo e($key->content); ?></td>
                                <td><?php echo e($key->img); ?></td>
                                <td><?php echo e($key->view); ?></td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/news/delete/<?php echo e($key->id); ?>"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/news/edit/<?php echo e($key->id); ?>">Edit</a></td>
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