<?php $__env->startSection('content'); ?>
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Category
					<small>Edit</small>
				</h1>
			</div>
			<!-- /.col-lg-12 -->
			<div class="col-lg-7" style="padding-bottom:120px">
				<?php if(count($errors)>0): ?>
				<div class="errors">
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
				<form action="admin/category/postedit/<?php echo e($cate->id); ?>" method="POST">
					<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
					<div class="form-group">

						<label>Tên thể loại</label>
						<input class="form-control" name="txtCateName" placeholder="Please Enter Category Name"  value="<?php echo e($cate->name); ?>" />
					</div>
					<div class="form-group">

						<label>Mô tả</label>
						<input class="form-control" name="txtCateDes" placeholder="Please Enter Category Describ"  value="<?php echo e($cate->des); ?>" />
					</div>


					<button type="submit" class="btn btn-default">Cập nhật</button>
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