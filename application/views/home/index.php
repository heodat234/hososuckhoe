<div class="container">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="col-xs-12 col-sm-12 col-md-12 pull-left" style="border-bottom: 1px solid #ddd;margin-bottom: 10px;">
            <div class="no-pad icon-boxes-1"> 
                <!--Icon-box-start-->
                <div class="col-sm-6 col-xs-12 col-md-3 col-lg-3">
                 <div class="icon-box-3 wow fadeInUp" data-wow-delay="0.6s" data-wow-offset="150">
                    <div class="icon-boxwrap2"><i class="fa fa-database icon-box-back2"></i></div>
                    <div class="icon-box2-title">Lưu trữ hồ sơ</div>
                    <p>Lưu giữ kết quả khám chữa bệnh trọn đời với biểu đồ sức khỏe trực quan.</p>
                    <!-- <div class="iconbox-readmore"><a href="#">Read More</a></div> -->
                 </div>   
                </div>
                <!--Icon-box-start-->
                <div class="col-sm-6 col-xs-12 col-md-3  col-lg-3">
                 <div class="icon-box-3 wow fadeInDown" data-wow-delay="0.9s" data-wow-offset="150">
                    <div class="icon-boxwrap2"><i data-icon="\e609" class="icon-stethoscope icon-box-back2"></i></div>
                    <div class="icon-box2-title">Hỗ trợ điều trị</div>
                    <p>Phân tích chỉ số sức khỏe, biểu đồ kết quá sức khỏe trực quan hỗ trợ điều trị các bệnh mãn tính.</p>
                    <!-- <div class="iconbox-readmore"><a href="#">Read More</a></div> -->
                 </div>   
                </div>
                <!--Icon-box-start-->
                <div class="col-sm-6 col-xs-12 col-md-3 col-lg-3">
                 <div class="icon-box-3 wow fadeInUp" data-wow-delay="1.2s" data-wow-offset="150">
                    <div class="icon-boxwrap2"><i class="icon-ambulance icon-box-back2"></i></div>
                    <div class="icon-box2-title">Giải pháp mới</div>
                    <p>Ứng dụng trí tuệ nhân tạo trong phân tích, cảnh báo nguy cơ sức khỏe cho người bệnh.</p>
                    <!-- <div class="iconbox-readmore"><a href="#">Read More</a></div> -->
                 </div>   
                </div>
                <div class="col-sm-6 col-xs-12 col-md-3 col-lg-3">
                 <div class="icon-box-3 wow fadeInUp" data-wow-delay="1.2s" data-wow-offset="150">
                    <div class="icon-boxwrap4"><i class="fa fa-search icon-box-back2"></i></div>
                    <div class="icon-box2-title">Tra cứu nhanh</div>
                    <div class="box-search" >
                        <form method="get" action="<?php echo base_url() ?>timkiem.html">
                            <input class="data" type="text" name="search" placeholder="Tra cứu thông tin ngay">
                            <button  ><span class="fa fa-search fa-lg"></span></button>
                            <h6 >Tra cứu thông tin Bệnh viện, Bác sĩ, Thuốc,...</h6>
                        </form>
                    </div>
                 </div>   
                </div>
            </div>
             <div class="col-xs-12 col-sm-12 col-md-12" style="margin-bottom: 30px;">
                <a href="<?php echo base_url() ?>pageLogin"><img width="100%" src="<?php echo base_url() ?>images/banner/Banner-HSSK.gif"></a>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="col-xs-12 col-sm-12 col-md-12 pull-left">
            <div class="">
                <div class="col-xs-12 col-sm-12 col-md-4  styNew">
                    <div class="latest-post-wrap pull-left wow fadeInLeft" data-wow-delay="0.5s" data-wow-offset="100" >
                        <div class="subtitle col-xs-12 no-pad col-sm-11 col-md-12 pull-left news-sub">
                            <div class="title-a">Tin tức</div>
                            <div class="title-b"><p></p></div>
                        </div>
                        <?php for($i = 0; $i<2;$i++): ?>
                            <div class="post-item-wrap pull-left col-sm-6 col-md-12 col-xs-12">
                                <?php if (isset( $tintuc[$i])){ ?>
                                    <img src="<?php echo json_decode($tintuc[$i]['image'],true)[0]['data-original'] ?>" class="img-responsive post-author-img" alt="" />
                                    <div class="post-content1 pull-left col-md-8 col-sm-7 col-xs-7">
                                        <div class="post-title pull-left"><a href="<?php echo base_url().'tintuc/'.$tintuc[$i]['id']?>"><?php echo $tintuc[$i]['title'] ?></a></div>
                                        <div class="post-meta-top pull-left">
                                            <ul>
                                                <li><i class="icon-calendar"></i><?php echo date('d-m-Y',strtotime($tintuc[$i]['created_at'])) ?></li>
                                                <li><a href="#"><i class="fa fa-eye"></i> <?php echo $tintuc[$i]['view'] ?></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="post-content2 pull-left">                   
                                        <p><?php echo $tintuc[$i]['short_desc'] ?><br />
                                            <span class="post-meta-bottom"><a href="<?php echo base_url().'tintuc/'.$tintuc[$i]['id']?>">Xem tiếp ...</a></span>
                                        </p>
                                    </div>
                                <?php }else { ?>
                                    <p>Chưa có tin tức nào.</p>
                                <?php }  ?>
                            </div>
                        <?php endfor ?>
                        <a href="<?php echo base_url() ?>tintuc.html" class="dept-details-butt posts-showall">Xem tất cả</a>
                    </div>
                </div>
           
                <div class="col-xs-12 col-sm-12 col-md-4  department-wrap wow fadeInRight" data-wow-delay="0.5s" data-wow-offset="100">
                    <div class="subtitle">
                        <div class="title-a">Tra cứu</div>
                        <div class="title-b"><p></p></div>
                    </div>
                    <div id="imedica-dep-accordion">
                        <h3><i class="icon-ambulance dept-icon"></i><span class="dep-txt">Bênh viện</span></h3>
                        <div>
                            <img src="<?php echo base_url() ?>images/benhvien.jpg" class="img-responsive dept-author-img-desk col-md-3" alt="" />
                            <div class="dept-content pull-left col-md-7 col-lg-7">
                                <div class="dept-title pull-left">Tra cứu thông tin bệnh viện</div> 
                                
                                <div class="vspacer"></div>
                            </div>
                            <div><p>Chúng tôi cung cấp thông tin cơ bản các bệnh viện , bảng xếp hạng bệnh viện theo tiêu chí người dùng đánh giá , chuyên khoa điều trị ...</p></div>
                        </div>
                    
                        <h3><i class="icon-stethoscope dept-icon"></i><span class="dep-txt">Bác sĩ</span></h3>
                        <div>
                            <img src="<?php echo base_url() ?>images/doctor.png" class="img-responsive dept-author-img-desk col-md-3" alt="" />
                            <div class="dept-content pull-left col-md-7 col-lg-7">
                                <div class="dept-title pull-left">Tra cứu thông tin bác sĩ</div> 
                                <p></p>
                            
                                <!-- <a href="#" class="dept-details-butt">Details</a>
                                <div class="purchase-strip-blue dept-apponit-butt">
                                    <div class="color-4">
                                        <p class="ipurchase-paragraph">
                                            <button class="icon-calendar btn btn-4 btn-4a notViewed">Appointment</button>
                                        </p>
                                    </div>
                                </div> -->
                                <div class="vspacer"></div>
                            </div>
                            <div><p>Chúng tôi cung cấp thông tin cơ bản của các bác sĩ, dược sĩ chuyên khoa trong ngành .</p></div>
                        </div>
                    
                        <h3><i class="icon-heart dept-icon"></i><span class="dep-txt">Thuốc</span></h3>
                        <div>
                           <img src="<?php echo base_url() ?>images/thuoc.jpg" class="img-responsive dept-author-img-desk col-md-4" alt="" />
                            <div class="dept-content pull-left col-md-7 col-lg-7">
                            <div class="dept-title pull-left">Tra cứu thông tin thuốc</div> 
                            
                            
                            <!-- <a href="#" class="dept-details-butt">Details</a>
                            <div class="purchase-strip-blue dept-apponit-butt"><div class="color-4">
                                <p class="ipurchase-paragraph">
                                    <button class="icon-calendar btn btn-4 btn-4a notViewed">Appointment</button>
                                </p>
                            </div></div> -->
                            <div class="vspacer"></div>
                            </div> 
                            <p>Chúng tôi cung cấp thông tin cơ bản của các loại thuốc có mặt trên thị trường.</p>               
                        </div>
                    
                        <h3><i class="icon-stethoscope dept-icon"></i><span class="dep-txt">Tin tức y khoa</span></h3>
                        <div>
                            <img src="<?php echo base_url() ?>images/ykhoa.jpg" class="img-responsive dept-author-img-desk col-md-4" alt="" />
                            <div class="dept-content pull-left col-md-7 col-lg-7">
                                <div class="dept-title pull-left">Cung cấp kiến thức cơ bản</div> 
                                
                            
                                <!-- <a href="#" class="dept-details-butt">Details</a>
                                <div class="purchase-strip-blue dept-apponit-butt">
                                    <div class="color-4">
                                        <p class="ipurchase-paragraph">
                                            <button class="icon-calendar btn btn-4 btn-4a notViewed">Appointment</button>
                                        </p>
                                    </div>
                                </div> -->
                                <div class="vspacer"></div>
                            </div> 
                            <p>Chúng tôi cung cấp thông tin các kiến thức y khoa cơ bản, các bài báo khoa học về y học, các loại bệnh.</p>               
                        </div>
                    </div>
                </div>

                <div  class="col-xs-12 col-sm-12 col-md-4  styBs">
                    <div class="latest-post-wrap pull-left wow fadeInLeft" data-wow-delay="0.5s" data-wow-offset="100" > 
                        <div class="subtitle no-pad pull-left">
                            <div class="title-a">BỆNH VIỆN</div>
                            <div class="title-d"><p></p></div>
                            <div class="tooltip-bs"><a href="#" data-toggle="tooltip" title="Tiêu chí đánh giá bệnh viện dựa trên đánh giá người dùng về các tiêu chí : chất lượng khám chưa bệnh, chất lượng dịch vụ"><i class="fa fa-info-circle"></i></a></div>
                        </div>
                        <div>
                          <ul class="list-categories-bv list-categories_widget list-bv">
                            <li >
                                <span class="number special-1">1</span>
                                <div>
                                    <h4 class="info-bv">
                                        <a href="<?php echo base_url().'benhvien/'.$benhvien[0]['id']?>"><?php echo $benhvien[0]['name'] ?></a>
                                    </h4>
                                    <h5 class="info-bv">
                                        <span><?php echo $benhvien[0]['address'] ?></span>
                                    </h5>
                                </div>
                                    
                            </li>
                            <li>
                                <span class="number special-2">2</span>
                                <div>
                                    <h4 class="info-bv">
                                        <a href="<?php echo base_url().'benhvien/'.$benhvien[1]['id']?>"><?php echo $benhvien[1]['name'] ?></a>
                                    </h4>
                                    <h5 class="info-bv" >
                                        <span><?php echo $benhvien[1]['address'] ?></span>
                                    </h5>
                                </div>
                            </li>
                            <li >
                                <span class="number special-3">3</span>
                                <div>
                                    <h4 class="info-bv">
                                        <a href="<?php echo base_url().'benhvien/'.$benhvien[2]['id']?>"><?php echo $benhvien[2]['name'] ?></a>
                                    </h4>
                                    <h5 class="info-bv" >
                                        <span><?php echo $benhvien[2]['address'] ?></span>
                                    </h5>
                                </div>
                            </li>

                            <?php for ($i=3;$i<count($benhvien); $i++) { ?>
                                <li >
                                    <span class="number"><?php echo $i+1 ?></span>
                                    <div>
                                        <h4 class="info-bv">
                                        <a href="<?php echo base_url().'benhvien/'.$benhvien[$i]['id']?>"><?php echo $benhvien[$i]['name'] ?></a>
                                    </h4>
                                    <h5 class="info-bv" >
                                        <span><?php echo $benhvien[$i]['address'] ?></span>
                                    </h5>
                                    </div>
                                </li>
                            <?php } ?>
                          </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })

     $('.data').mousedown(function(event) {    
            $('.data').autocomplete({
              minLength: 0,
              autoFocus: true,
              source: function(req, res){
                  var key = $('.data').val();
                  
                  $.ajax({
                      url: '<?php echo base_url(); ?>load_data', //Controller where search is performed
                      dataType: 'json',
                      type: 'get',
                      data: {  keyword:key},
                      success: function(data){
                            res($.map(data, function (item) {                                
                                return {value: item};
                            }));        
                      }
                  });
              },
              select: function (event, ui) {                    
                $(".data").val(ui.item.value);
              }
            }).focus(function() {
              $(this).autocomplete("search", "");
            });        
        });
</script>


