<section class="complete-content content-footer-space">	
     <div class="about-intro-wrap pull-left">
     
	    <div class="bread-crumb-wrap ibc-wrap-1">
	        <div class="container">
	    <!--Title / Beadcrumb-->
	            <div class="inner-page-title-wrap col-xs-12 col-md-12 col-sm-12">
	                <div class="bread-heading"><h1>Đăng ký</h1></div>
	                <div class="bread-crumb pull-right">
		                <ul>
		                	<li><a href="<?php echo base_url() ?>">Trang chủ</a></li>
		               	 	<li><a href="<?php echo base_url() ?>pageRegister">Đăng ký</a></li>
		                </ul>
	                </div>
	            </div>
	         </div>
	    </div>
		<div class="container">
		    <div class="row">
		    	<div class="alert-danger" style="text-align: center;"><span><?php if(isset($b_Check) && $b_Check == false){echo "Email đã tồn tại. Vui lòng nhập email khác !";}?></span></div>
    			<div class="col-md-12">
        			<section id="loginForm">
						<form action="<?php echo base_url() ?>insertUser" class="form-horizontal form-appointment ui-form" method="post" role="form" style="margin-top: 0px;"  id="formRegister">	 
							<input name="<?php echo $csrf['name'] ?>" type="hidden" value="<?php echo $csrf['hash'] ?>" />             
							<div class="col-md-6">
								<h3 class="text-center">Thông tin đăng nhập</h3>            
								<h4 class="text-center">Đăng ký tài khoản</h4>
								<hr />
								<div class="row">
				                    <div class="col-md-12">
				                        <div class="input-group">
				                        	<label class="col-lg-3 control-label" for="ten">Email</label>
	                          				<div class="col-lg-9">
				                            	<input class="form-control" data-val="true" data-val-required="Không được để trống!" id="email" name="email" placeholder="Nhập email" type="text" required="" />
				                            </div>
				                        </div>
				                        <br>
				                        <div class="input-group">
				                        	<label class="col-lg-3 control-label" for="ten">Mật khẩu</label>
	                          				<div class="col-lg-9">
				                            	<input class="form-control" data-val="true" data-val-required="Không được để trống!" id="Password" name="password" placeholder="Mật khẩu" type="password" required="" />
				                            </div>
				                        </div>
				                        <br>
				                        <div class="input-group">
				                        	<label class="col-lg-3 control-label" for="ten">Nhập lại Mật khẩu</label>
	                          				<div class="col-lg-9">
				                            	<input class="form-control" data-val="true" data-val-required="Không được để trống!" id="confirmPassword" name="confirm_password" placeholder="Nhập lại mật khẩu" type="password" required="" />
				                            </div>
				                        </div>
				                        <br>
				                        <div id="passwordStrength"></div>
				                    </div>
	                			</div>
				                
				                <div class="row">
				                    <div class="col-md-12 text-center" style="margin-top:30px;">
				                        <button type="button" id="btnGui" class="btn btn-primary">Đăng Ký</button>
				                    </div>
				                </div>
							</div>
                			<div class="col-md-6">
                				<h4 class="text-center">Thông tin bổ sung (có thể nhập sau)</h4>
								<hr />
								<div class="row">
				                    <div class="col-md-12">
				                        <div class="input-group">
				                        	<label class="col-lg-3 control-label" for="ten">Họ tên</label>
	                          				<div class="col-lg-9">
				                            	<input class="form-control" data-val="true" id="UserName" name="name" placeholder="Nhập họ tên" type="text" value="" />
				                            </div>
				                        </div>
				                        <br>
				                        <div class="input-group">
				                        	<label class="col-lg-3 control-label" for="ten">Số điện thoại</label>
	                          				<div class="col-lg-9">
				                            	<input class="form-control" data-val="true" pattern="[0-9]{10,11}"  title="10-11 chữ số." name="phone" placeholder="Số điện thoại" type="tel" />
				                            </div>
				                        </div>
				                        <br>
				                        <div class="input-group">
				                        	<label class="col-lg-3 control-label" for="ten">Giới tính</label>
	                          				<div class="col-lg-9">
				                            	<select class="form-control" name="gioi_tinh">
				                            		<option value="nam">Nam</option>
				                            		<option value="nu">Nữ</option>
				                            	</select>
				                            </div>
				                        </div>
				                        <br>
				                        <div class="input-group">
				                        	<label class="col-lg-3 control-label" for="ten">Số CMND</label>
	                          				<div class="col-lg-9">
				                            	<input class="form-control" data-val="true" name="cmnd" placeholder="Số chứng minh nhân dân" type="text" />
				                            </div>
				                        </div>
				                        <br>
				                        <div class="input-group">
				                        	<label class="col-lg-3 control-label" for="ten">Ngày sinh</label>
	                          				<div class="col-lg-9">
				                            	<input class="form-control" data-val="true" id="today" name="ngay_sinh"  type="date" />
				                            </div>
				                        </div>
				                        <br>
				                        <div class="input-group">
				                        	<label class="col-lg-3 control-label" for="ten">Địa chỉ</label>
	                          				<div class="col-lg-9">
				                            	<input class="form-control" data-val="true"  name="dia_chi" placeholder="Địa chỉ" type="text" />
				                            </div>
				                        </div>
				                    </div>
	                			</div>
							</div>
						</form>            
        			</section>
    			</div>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript">
	document.querySelector("#today").valueAsDate = new Date();

	//kiểm tra độ mạnh password
	$(document).ready(function() {
		$('#Password, #confirmPassword').keyup( function(e) {
	        if($('#Password').val() == '' && $('#confirmPassword').val() == '')
	        {
	            $('#passwordStrength').removeClass().html('');
	 
	            return false;
	        }
	 
	     if($('#Password').val() != '' && $('#confirmPassword').val() != '' && $('#Password').val() != $('#confirmPassword').val())
	        {
	            $('#passwordStrength').removeClass().addClass('alert alert-error').html('Passwords do not match!');
	            return false;
	        }
	 
	        // Must have capital letter, numbers and lowercase letters
	        var strongRegex = new RegExp("^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
	 
	        // Must have either capitals and lowercase letters or lowercase and numbers
	        var mediumRegex = new RegExp("^(?=.{7,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
	 
	        // Must be at least 6 characters long
	        var okRegex = new RegExp("(?=.{6,}).*", "g");
	 
	        if (okRegex.test($(this).val()) === false) {
	            // If ok regex doesn't match the password
	            $('#passwordStrength').removeClass().addClass('alert alert-error').html('Độ dài mật khẩu phải chứa ít nhất là 6 kí tự.');
	 
	        } else if (strongRegex.test($(this).val())) {
	            // If reg ex matches strong password
	            $('#passwordStrength').removeClass().addClass('alert alert-success').html('Mật khẩu mạnh!');
	        } else if (mediumRegex.test($(this).val())) {
	            // If medium password matches the reg ex
	            $('#passwordStrength').removeClass().addClass('alert alert-info').html('Mật khẩu nên chứa kí tự là chữ hoa, số, kí tự gạch dưới hoặc kí tự đặc biệt như $...!');
	        } else {
	            // If password is ok
	            $('#passwordStrength').removeClass().addClass('alert alert-error').html('Mật khẩu yếu, nên chứa kí tự số, chữ hoa,...');
	        }
	 
	        return true;
	    });
	});

	$('#btnGui').click(function(event) {
	    	if($('#email').val() != '' && $('#Password').val() != '' && $('#confirmPassword').val() != '' && $('#Password').val() == $('#confirmPassword').val())
	        {
	            $('#formRegister').submit();
	        }
	        else{
	        	$('.alert-danger').html('Mật khẩu không khớp.');
	        }
	        if ($('#email').val() == '' && $('#Password').val() == '') {
	        	$('.alert-danger').html('Bạn chưa nhập email và mật khẩu.');
	        } 
	        else if ($('#email').val() == '') {
	        	$('.alert-danger').html('Bạn chưa nhập email.');
	        } 
	        else if ($('#Password').val() == '') {
	        	$('.alert-danger').html('Bạn chưa nhập mật khẩu.');
	        }
	    });
</script>