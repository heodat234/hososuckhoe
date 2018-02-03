
<!-- <section class="complete-content content-footer-space">	 -->
     <div class="about-intro-wrap pull-left">
     
	    <div class="bread-crumb-wrap ibc-wrap-1">
	        <div class="container">
	            <div class="inner-page-title-wrap col-xs-12 col-md-12 col-sm-12">
	                <div class="bread-heading"><h1>Liên hệ/Góp ý</h1></div>
	                <div class="bread-crumb pull-right">
		                <ul>
		                	<li><a href="index-2.html">Trang chủ</a></li>
		               	 	<li><a href="about-us-1.html">Liên hệ/Góp ý</a></li>
		                </ul>
	                </div>
	            </div>
	         </div>
	    </div>
		<div class="container">
            <!--About-us top-content-->
            <div class="col-xs-12 col-lg-12  col-sm-12 col-md-12 pull-left contact2-wrap no-pad">
                <!--contact widgets-->
                <div class="col-xs-12 col-lg-12 col-sm-12 col-md-12 pull-left no-pad">
                    <div class="subtitle col-xs-12 no-pad col-sm-12 col-md-12 pull-left news-sub icontact-widg" style="padding-top: 10px;">Form Liên hệ / Góp ý</div>
                    <!--Contact form-->
                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 no-pad wow fadeInUp" data-wow-delay="0.5s" data-wow-offset="160">
                        <div></div>                 
						<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 no-pad">
							<div class="alert alert-success hidden" id="contactSuccess">
								<strong>Success!</strong> Your message has been sent to us.
							</div>
							<div class="alert alert-error hidden" id="contactError">
								<strong>Error!</strong> There was an error sending your message.
							</div>
                			<form class="contact2-page-form col-lg-12 col-sm-12 col-md-12 col-xs-12 no-pad contact-v1"  method="post" action="<?php echo base_url() ?>insertContact">
                				<input name="<?php echo $csrf['name'] ?>" type="hidden" value="<?php echo $csrf['hash'] ?>" />
                				<?php if (!$this->session->has_userdata('user')){ ?>
                					<div class="col-lg-4 col-sm-12 col-md-4 col-xs-12 control-group">
		                        		<input type="text" class="contact2-textbox" placeholder="Tên*" name="name" id="name" />
		                            </div>    
	                        
		                            <div class="col-lg-4 col-sm-12 col-md-4 col-xs-12 control-group">
		                            	<input type="email" class="contact2-textbox" placeholder="Email*" name="email" id="email"/>
		                            </div> 
                				<?php } ?>
                					
	                            <div class="col-lg-4 col-sm-12 col-md-4 col-xs-12 control-group">
	                                <input type="text" placeholder="Tiêu đề*" class="contact2-textbox" name="subject" id="subject">
	                            </div>
                            
	                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
	                            	<textarea class="contact2-textarea" placeholder="Nội dung" name="content" id="message"></textarea>
	                            </div>
                            
	                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
	                            	<!-- <section class="color-7" id="btn-click"> -->
	                					<button class="icon-mail btn2-st2 btn-7 btn-7b"   type="submit">Gửi</button>
	                				<!-- </section> -->
	                			</div>
                 			</form>
                		</div>
                
                    </div>
                </div>
            </div>
		</div>
	</div>
<!-- </section> -->
<script type="text/javascript">
	
</script>