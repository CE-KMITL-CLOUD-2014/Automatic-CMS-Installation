<!-- Modal on delete website-->
<div class="modal fade" id="modalConfirmDeleteSite" tabindex="-1" role="dialog" aria-labelledby="DelModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="DelModalLabel">การยืนยันการลบเว็บไซต์</h4>
			</div>
			<div class="modal-body" id="modalDelText">
				<p class="alert alert-warning" id="show_del_status">กรุณายืนยันการลบเว็บไซต์ : <span id="show_del_site"></span></p>
			</div>
			<div class="modal-body" id="modalDelLoading" style="display:none;">
				<p>กรุณารอสักครู่...</p>
				<div class="progress">
					<div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">  
					</div>
				</div>
			</div>
			<div class="modal-footer" id="modalDelFooter">
				<input type="hidden" id="confirm_del_input" value="0" />
				<button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
				<button type="button" class="btn btn-primary" id="confirm_del_site_btn">ยืนยัน</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal on block website-->
<div class="modal fade" id="modalConfirmBlockSite" tabindex="-1" role="dialog" aria-labelledby="BlockModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="BlockModalLabel">การยืนยันการบล็อกเว็บไซต์</h4>
			</div>
			<div class="modal-body" id="modalBlockText">
				<p class="alert alert-info" id="show_block_status">กรุณายืนยันการบล็อกเว็บไซต์ : <span id="show_block_site"></span></p>
			</div>
			<div class="modal-body" id="modalBlockLoading" style="display:none;">
				<p>กรุณารอสักครู่...</p>
				<div class="progress">
					<div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">  
					</div>
				</div>
			</div>
			<div class="modal-footer" id="modalBlockFooter">
				<input type="hidden" id="confirm_block_input" value="0" />
				<button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
				<button type="button" class="btn btn-primary" id="confirm_block_btn">ยืนยัน</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal on unblock website-->
<div class="modal fade" id="modalConfirmUnblockSite" tabindex="-1" role="dialog" aria-labelledby="UnblockModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="UnblockModalLabel">การยืนยันการปลดบล็อกเว็บไซต์</h4>
			</div>
			<div class="modal-body" id="modalUnblockText">
				<p class="alert alert-success" id="show_unblock_status">กรุณายืนยันการปลดบล็อกเว็บไซต์ : <span id="show_unblock_site"></span></p>
			</div>
			<div class="modal-body" id="modalUnblockLoading" style="display:none;">
				<p>กรุณารอสักครู่...</p>
				<div class="progress">
					<div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">  
					</div>
				</div>
			</div>
			<div class="modal-footer" id="modalUnblockFooter">
				<input type="hidden" id="confirm_unblock_input" value="0" />
				<button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
				<button type="button" class="btn btn-primary" id="confirm_unblock_btn">ยืนยัน</button>
			</div>
		</div>
	</div>
</div>
