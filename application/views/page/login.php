<!-- <section class="complete-content content-footer-space">	 -->
     <div class="about-intro-wrap pull-left">
     
	    <div class="bread-crumb-wrap ibc-wrap-1">
	        <div class="container">
	            <div class="inner-page-title-wrap col-xs-12 col-md-12 col-sm-12">
	                <div class="bread-heading"><h1>Đăng nhập</h1></div>
	                <div class="bread-crumb pull-right">
		                <ul>
		                	<li><a href="index-2.html">Trang chủ</a></li>
		               	 	<li><a href="about-us-1.html">Đăng nhập</a></li>
		                </ul>
	                </div>
	            </div>
	         </div>
	    </div>
		<div class="container">
		    <div class="row">
		    	<div class="alert-success" style="text-align: center;"><span><?php if(isset($a_Check)){echo $a_Check;}?></span></div>
		    	<div class="alert-danger" style="text-align: center;"><span><?php if(isset($b_Check)){echo $b_Check;}?></span></div>
		    	<div class="alert-success" style="text-align: center;"><span><?php if(isset($c_Check) && $c_Check == true){echo "Mật khẩu mới đã được gửi tới mail của bạn !";}?></span></div>
		    	<div class="alert-success" style="text-align: center;"><span><?php if(isset($d_Check) && $d_Check == true){echo "Tài khoản của bạn đã được xác nhận. Bạn có thể đăng nhập để sử dụng !";}?></span></div>
    			<div class="col-md-6 col-md-offset-3">
        			<section id="loginForm">
						<form action="<?php echo base_url() ?>loginUser" class="form-horizontal form-appointment ui-form" method="post" role="form" style="margin-top: 0px;">                
							<h4 class="text-center">Đăng nhập hệ thống</h4>
							<input name="<?php echo $csrf['name'] ?>" type="hidden" value="<?php echo $csrf['hash'] ?>" />             <hr />
			                    <div class="col-md-12">
			                        <div class="input-group">
			                        	<label class="col-lg-3 control-label" for="ten">Tên đăng nhập</label>
                          				<div class="col-lg-9">
			                            	<input class="form-control" data-val="true" data-val-required="Không được để trống!" id="UserName" name="username" placeholder="Nhập email/số điện thoại" type="text" value="" />
			                            	<span class="field-validation-valid text-danger" data-valmsg-for="UserName" data-valmsg-replace="true"></span>
			                            </div>
			                        </div>
			                        <br>
			                        <div class="input-group">
			                        	<label class="col-lg-3 control-label" for="ten">Mật khẩu</label>
                          				<div class="col-lg-9">
			                            	<input class="form-control" data-val="true" data-val-required="Không được để trống!" id="Password" name="password" placeholder="Mật khẩu" type="password" />
			                            	<span class="field-validation-valid text-danger" data-valmsg-for="Password" data-valmsg-replace="true"></span>
			                            </div>
			                        </div>
			                    </div>
                						                    
			                    <div class="col-md-12  text-center" style="margin-top: 12px;">

			                        <a href="#forgotPass" data-toggle="modal" >  Bạn quên mật khẩu?</a>

			                    </div>
			                    <div class="col-md-12 text-center" style="margin-top:30px;">
			                        <button type="submit" class="btn btn-success">Đăng Nhập</button>
			                    </div>
			                <div class="" style="margin-top:30px;">
			                    <div class="col-md-12 text-center">
			                        <a href="<?php echo base_url() ?>pageRegister"> Đăng ký tài khoản mới </a>
			                    </div>
			                </div>
						</form>            
						<div class="" style="margin-top:10px;">

			                <div class="col-md-12">
			                    <h4 class="text-center">Sử dụng tài khoản khác.</h4>
			                    <hr />
			                </div>

			                <div class="col-md-12 col-md-offset-2 col-sm-offset-3 ">
			                    <section id="socialLoginForm">
									<form action="/Account/ExternalLogin" method="post">
										<input name="__RequestVerificationToken" type="hidden" value="" /> <div id="socialLoginList">
							                <p style="color:#000">
							                    <button class="btn btn-primary"><i class="fa fa-facebook"></i><a href="<?php echo base_url() ?>loginFb" style="color: white" > Login with Facebook</a></button>
												<button class="btn btn-danger"><i class="fa fa-google"></i><a href="<?php echo base_url() ?>loginGoogle" style="color: white"> Login with Google</a></button>
							                </p>
            							</div>
									</form>
                    			</section>
                			</div>
            			</div>
        			</section>
    			</div>
			</div>
		</div>

		<!-- form nhập mail lấy lại mật khẩu -->
		<div class="modal fade" id="forgotPass" data-backdrop='static'>
		  <div class="modal-dialog">
		   <div class="modal-content">
		      <div class="modal-header">
		         <button type="button" class="close" data-dismiss='modal' aria-hidden="true"><span class="glyphicon glyphicon-remove"></span></button>
		         <h4 class="modal-title" style="font-size: 20px; padding: 12px;">Quên mật khẩu?</h4>
		      </div>
		      <form method="post" action="<?php echo base_url() ?>forgotPassword">
		      	<input name="<?php echo $csrf['name'] ?>" type="hidden" value="<?php echo $csrf['hash'] ?>" />
		      <div class="modal-body">
		         <div class="container-fluid">
		               <div class="col-xs-12 col-sm-12 col-md-12">
		                  <div class="form-group">
		                     <div><b>Nhập mail</b></div>
		                     <div class="input-group">
		                        <div class="input-group-addon iga2">
		                           <span class="glyphicon glyphicon-folder-open"></span>
		                        </div>
		                        <input type="text" class="form-control" name="eamil">
		                     </div>
		                  </div>
		               </div>
		         </div>
		      </div>

		      <div class="modal-footer">
		         <div class="form-group">
		            <button type="submit" class="btn btn-sm btn-info"  id="btn-add"> Gửi <span class="glyphicon glyphicon-saved"></span></button>

		            <button type="button" data-dismiss="modal" class="btn btn-sm btn-default"> Hủy <span class="glyphicon glyphicon-remove"></span></button>
		         </div>
		      </div>
		      </form>
		    </div>
		  </div>
		</div>
	</div>
<!-- </section> -->