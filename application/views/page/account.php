<div id="account">
	<div class="alert-success tc"><span ><?php if(isset($b_Check)){echo $b_Check;}?></span></div>
	<div class="alert-danger"><span ><?php if(isset($a_Check) && $a_Check == false){echo "Mật khẩu không đúng. Xóa tài khoản không thành công !";}?></span></div>
	<form name="account" method="post" action="<?php echo base_url() ?>editUser" id="account-form" class="form">
		<div>
			<h1>Tài khoản của tôi</h1>
			<input type="hidden" class="account_action" id="hidden-action0" name="action" value="account" />
			<p class="field field_text-name1">
				<label for="text-name1">Tên</label>
				<input maxlength="100" type="text" id="text-name1" name="name" class="text" value="<?php echo $this->session->userdata('user')['name'] ?>" required />
			</p>
			<p class="field field_text-email2">
				<label for="text-email2">E-mail</label>
				<input maxlength="100" type="email" id="text-email2" name="email" class="text" value="<?php echo $this->session->userdata('user')['email'] ?>" required />
			</p>
			<p class="field field_password-password3">
				<label for="password-password3">Mật khẩu</label>
				<input type="password" id="password-password3" name="password" value="" required="" />
			</p>
			<p class="field field_submit-bt_submit4">
				<label for="submit-bt_submit4">&nbsp;</label>
				<input type="submit" id="submit-bt_submit4" name="bt_submit" class="button" value="Lưu thay đổi" />
			</p>
		</div>
	</form>

	

<!-- Modal -->
<div class="modal fade" id="delete-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Xóa tài khoản của tôi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?php echo base_url() ?>deleteUser">
      	<div class="modal-body">
      	</h2><span class="section_info"><strong>CẢNH BÁO:</strong> Xoá tài khoản sẽ làm bạn mất toàn bộ thông tin vĩnh viễn (bao gồm cả hồ sơ).<br />Và cũng không thể khôi phuc. <br />Bạn có chắc muốn xoá?<br /><br /></span><input type="hidden" id="hidden-action5" name="action" value="terminate" />
      	<span>Nhập mật khẩu:    </span><input type="password" name="password" required="" value="">
      </div>
      <div class="modal-footer">
        <button type="button" class="" style="background-color: #007cfd" data-dismiss="modal">Không</button>
        <button type="submit" class="" style="background-color: #007bff">Có, hãy xóa tài khoản của tôi</button>
      </div>
      </form>
    </div>
  </div>
</div>
	
	
	<a href="#delete-form" data-toggle="modal">Xoá tài khoản của tôi</a>
	
	<script type="text/javascript">
	$('.tc').hide(6000);
	// $('#delete').modal('show');
	</script>
</div>