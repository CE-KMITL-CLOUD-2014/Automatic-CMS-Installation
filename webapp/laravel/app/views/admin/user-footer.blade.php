<!-- Modal on ban user-->
<div class="modal fade" id="modalConfirmBanSite" tabindex="-1" role="dialog" aria-labelledby="BanModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="BanModalLabel">การยืนยันการแบนผู้ใช้</h4>
			</div>
			<div class="modal-body" id="modalBanText">
				<p class="alert alert-info" id="show_ban_status">กรุณายืนยันการแบนผู้ใช้ : <span id="show_block_user"></span></p>
			</div>
			<div class="modal-body" id="modalBanLoading" style="display:none;">
				<p>กรุณารอสักครู่...</p>
				<div class="progress">
					<div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">  
					</div>
				</div>
			</div>
			<div class="modal-footer" id="modalBanFooter">
				<input type="hidden" id="confirm_ban_input" value="0" />
				<button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
				<button type="button" class="btn btn-primary" id="confirm_ban_btn">ยืนยัน</button>
			</div>
		</div>
	</div>
</div>

<!-- NF Site Installer-->
<script src="/js/nf_admin.js"></script>
