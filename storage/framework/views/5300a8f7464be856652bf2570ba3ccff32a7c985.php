<?php $__env->startSection('content'); ?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">New
                    <small>Edit</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <?php if(count($errors)>0): ?>
                <div class="alert-warning">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo $err.'<br>'; ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php endif; ?>
                <?php if(session('thongbao')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('thongbao')); ?>

                </div>
                <?php endif; ?>
                <form action="admin/news/postedit/<?php echo e($new->id); ?>"  method="POST"
    enctype="multipart/form-data"
                >
                   <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                   <div class="form-group">
                    <label> Tiêu đề </label>
                    <input class="form-control" name="txttitle" value="<?php echo e($new->title); ?>" placeholder="Please Enter Category Name" />
                </div>
                <div class="form-group">
                    <label>Thể loại</label>
                    <select class="form-control" name="category">
                     <?php $__currentLoopData = $cate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <option value="<?php echo e($ct->id); ?>"
        <?php if($ct->id==$new->id_cat): ?>
        <?php echo e("selected"); ?>

        <?php endif; ?>
                        ><?php echo e($ct->name); ?></option>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 </select>
             </div>



             <div class="form-group">
                <label>Nội dung</label>
                <textarea name="txtcontent" class="form-control ckeditor"  row="3"><?php echo e($new->content); ?></textarea>
            </div>
            <div class="form-group">
                <label>hình ảnh</label>
                <input type="file"  name="txtimg" placeholder="Please Enter img" />

                <img width="100px" height="100px" src="img/<?php echo e($new->img); ?>">
            </div>


            <button type="submit" class="btn btn-default">Category Add</button>
            <button type="reset" class="btn btn-default">Reset</button>
            <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>