<?php if(session('type') && session('title') && session('msg')): ?>
<script type="text/javascript">
	Lobibox.notify('<?php echo e(session('type')); ?>', {
		title: '<?php echo e(session('title')); ?>',
		sound: true,
		msg: '<?php echo e(session('msg')); ?>'
	});
</script>
<?php endif; ?>

<div class="modal fade" id="notificationsModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="notificationTitle"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">					
					<div class="col-12">
						<p id="notificationDescription"></p>
						<p id="notificationTime"></p>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div><?php /**PATH C:\Users\USUARIO\Desktop\electiva-4\resources\views/admin/partials/notifications.blade.php ENDPATH**/ ?>