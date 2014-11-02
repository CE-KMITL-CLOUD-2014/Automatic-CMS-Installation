<!-- Modal on hide domain-->
<div class="modal fade" id="modalConfirmHideDomain" tabindex="-1" role="dialog" aria-labelledby="HideModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="HideModalLabel">การยืนยันการซ่อนโดเมน</h4>
			</div>
			<div class="modal-body" id="modalHideText">
				<p class="alert alert-warning" id="show_hide_status">กรุณายืนยันการซ่อนโดเมน : <span id="show_hide_domain"></span></p>
			</div>
			<div class="modal-body" id="modalHideLoading" style="display:none;">
				<p>กรุณารอสักครู่...</p>
				<div class="progress">
					<div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">  
					</div>
				</div>
			</div>
			<div class="modal-footer" id="modalHideFooter">
				<input type="hidden" id="confirm_hide_input" value="0" />
				<button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
				<button type="button" class="btn btn-primary" id="confirm_hide_btn">ยืนยัน</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal on show domain-->
<div class="modal fade" id="modalConfirmShowDomain" tabindex="-1" role="dialog" aria-labelledby="ShowModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="ShowModalLabel">การยืนยันการแสดงโดเมน</h4>
			</div>
			<div class="modal-body" id="modalShowText">
				<p class="alert alert-success" id="show_show_status">กรุณายืนยันการแสดงโดเมน : <span id="show_show_domain"></span></p>
			</div>
			<div class="modal-body" id="modalShowLoading" style="display:none;">
				<p>กรุณารอสักครู่...</p>
				<div class="progress">
					<div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">  
					</div>
				</div>
			</div>
			<div class="modal-footer" id="modalShowFooter">
				<input type="hidden" id="confirm_show_input" value="0" />
				<button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
				<button type="button" class="btn btn-primary" id="confirm_show_btn">ยืนยัน</button>
			</div>
		</div>
	</div>
</div>