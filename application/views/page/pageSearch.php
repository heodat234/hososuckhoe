<section>
  <div class="">
    <div class=" ibc-wrap-1">
      <div class="container">
        <div class=" col-xs-12 col-md-12 col-sm-12">
          <div class="" >
              <h2 >Tra cứu</h2>
          </div>
        </div>
      </div>
    </div>
    <div class="ibc-wrap-1 timkiem-box">
      <div class="container">
        <div class=" col-xs-12 col-md-6 col-sm-12">
          <div class="timkiem-info">
              <form>
                  <div class=" input-group">
                    <input type="text" name="0"   class="form-control">
                    <div class="input-group-addon btn-timkiem"><i class="fa fa-search"></i></div>
                  </div>
                  <div><h6>Tra cứu thông tin Bệnh viện, Bác sĩ, Thuốc,...</h6></div>
              </form>
          </div>
        </div>
      </div>
    </div>
    
    <div id="shortcode-12" class="timkiem-body">
      <div class="container ">
        <div class="col-md-8 col-sm-12 col-lg-8 col-xs-12 left body-ds-tin"  >
          <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 timkiem" >
            <div class="subtitle  pull-left news-sub timkiem-tittle">
              <div class="title-c">TÊN THUỐC</div>
              <div class="title-e"><p></p></div>
            </div>
            <?php if ($thuocs != ''){ ?>
              <?php foreach ($thuocs as $thuoc): ?>
                <div class="col-sm-6 col-xs-12 col-md-4  col-lg-4">
                  <div class="icon-box-5 wow fadeInDown" data-wow-delay="0.5s" data-wow-offset="150">
                    <div class ="thuoc-img">
                      <a href="<?php echo base_url().'thuoc/'.$thuoc['id'] ?>">
                        <img src="<?php echo base_url() ?>images/thuoc/<?php echo $thuoc['anh'] ?>">
                      </a>
                    </div>
                    <div class="icon-box2-title tenthuoc">
                      <a href="<?php echo base_url().'thuoc/'.$thuoc['id'] ?>"><?php echo $thuoc['ten'] ?></a>
                    </div>
                    <p>Công dụng: <?php echo  word_limiter($thuoc['cong_dung'],20) ?>.</p>
                  </div>   
                </div>
              <?php endforeach ?>
            <?php }else { echo "Không có kết quả phù hợp.";} ?>            
          </div>
            
          <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 timkiem">
            <div class="subtitle  pull-left news-sub timkiem-tittle">
              <div class="title-c">THEO BỆNH VIỆN</div>
              <div class="title-e"><p></p></div>
            </div>
              <ul>
                <?php if (empty($benhvien)){ ?>
                  <span>Không có kết quả phù hợp.</span>
                <?php }else { ?>
                  <?php if (count($benhvien) == 1){ ?>
                    <li class="ds-tin-a ds-timkiem2">
                      <a href="<?php echo base_url().'benhvien/'.$benhvien[0]['id'] ?>">
                        <img style="margin-top: 15px;"  class="img-responsive" src="<?php echo base_url().'images/benhvien/'.$benhvien[0]['anh'] ?>">
                      </a>
                      <div class="ds-tin-content" >
                        <div>
                          <h3><a href="<?php echo base_url().'benhvien/'.$benhvien[0]['id'] ?>">
                            <?php echo $benhvien[0]['ten'] ?>
                          </a></h3>
                        </div>
                        <div>
                          <p><b>Chuyên khoa: </b><?php echo $benhvien[0]['chuyen_khoa'] ?></p>
                        </div>
                        <div>
                          <p><b>Số điện thoai: </b><?php echo $benhvien[0]['so_dienthoai'] ?></p>
                        </div>
                        <div>
                          <p><b>Địa chỉ: </b><?php echo $benhvien[0]['dia_chi'] ?></p>
                        </div>
                      </div>
                    </li>
                  <?php }else { ?>
                    <?php for ($i=0; $i < count($benhvien); $i++) { ?>
                      <?php if ($i < count($benhvien)-1){ ?>
                        <li class=" ds-timkiem1">
                          <a href="<?php echo base_url().'benhvien/'.$benhvien[$i]['id']?>"><img class="img-responsive" src="<?php echo base_url().'images/'.$benhvien[$i]['anh'] ?>"></a>
                          <div class="ds-tin-content" >
                            <div>
                              <h3><a href="<?php echo base_url().'benhvien/'.$benhvien[$i]['id'] ?>">
                                <?php echo $benhvien[$i]['ten'] ?>
                              </a></h3>
                            </div>
                            <div>
                              <p><b>Chuyên khoa: </b><?php echo $benhvien[$i]['chuyen_khoa'] ?></p>
                            </div>
                            <div>
                              <p><b>Số điện thoai: </b><?php echo $benhvien[$i]['so_dienthoai'] ?></p>
                            </div>
                            <div>
                              <p><b>Địa chỉ: </b><?php echo $benhvien[$i]['dia_chi'] ?></p>
                            </div>
                          </div>
                        </li>
                      <?php }else{ ?>
                        <li class="ds-tin-a ds-timkiem2">
                          <a href="<?php echo base_url().'benhvien/'.$benhvien[$i]['id'] ?>">
                            <img style="margin-top: 15px;"  class="img-responsive" src="<?php echo base_url().'images/benhvien/'.$benhvien[$i]['anh'] ?>">
                          </a>
                          <div class="ds-tin-content" >
                            <div>
                              <h3><a href="<?php echo base_url().'benhvien/'.$benhvien[$i]['id'] ?>">
                                <?php echo $benhvien[$i]['ten'] ?>
                              </a></h3>
                            </div>
                            <div>
                              <p><b>Chuyên khoa: </b><?php echo $benhvien[$i]['chuyen_khoa'] ?></p>
                            </div>
                            <div>
                              <p><b>Số điện thoai: </b><?php echo $benhvien[$i]['so_dienthoai'] ?></p>
                            </div>
                            <div>
                              <p><b>Địa chỉ: </b><?php echo $benhvien[$i]['dia_chi'] ?></p>
                            </div>
                          </div>
                        </li>
                      <?php } ?>
                    <?php } ?>
                  <?php } ?>
                <?php } ?>
              </ul>
          </div>


          <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 timkiem">
            <div class="subtitle  pull-left news-sub timkiem-tittle">
              <div class="title-c">THEO BÁC SĨ</div>
              <div class="title-e"><p></p></div>
            </div>
            <ul>
              <?php if (empty($bacsi)){ ?>
                  <span>Không có kết quả phù hợp.</span>
              <?php }else { ?>
                <?php if (count($bacsi) == 1){ ?>
                  <li class="ds-tin-a ds-timkiem2">
                    <a href="<?php echo base_url().'bacsi/'.$bacsi[0]['id'] ?>">
                      <img style="margin-top: 15px;"  class="img-responsive" src="<?php echo base_url().'images/bacsi/'.$bacsi[0]['anh'] ?>">
                    </a>
                    <div class="ds-tin-content" >
                      <div>
                        <h3><a href="<?php echo base_url().'bacsi/'.$bacsi[0]['id'] ?>">
                          <?php echo $bacsi[0]['ten'] ?>
                        </a></h3>
                      </div>
                      <div>
                        <p><b>Chuyên khoa: </b><?php echo $bacsi[0]['chuyen_khoa'] ?></p>
                      </div>
                      <div>
                        <p><b>Nơi làm việc: </b><?php echo $bacsi[0]['noi_lam_viec'] ?></p>
                      </div>
                    </div>
                  </li>
                <?php }else { ?>
                  <?php for ($i=0; $i < count($bacsi); $i++) { ?>
                    <?php if ($i < count($bacsi)-1){ ?>
                      <li class=" ds-timkiem1">
                        <a href="<?php echo base_url().'bacsi/'.$bacsi[$i]['id']?>"><img class="img-responsive" src="<?php echo base_url().'images/'.$bacsi[$i]['anh'] ?>"></a>
                        <div class="ds-tin-content" >
                          <div>
                            <h3><a href="<?php echo base_url().'bacsi/'.$bacsi[$i]['id'] ?>">
                              <?php echo $bacsi[$i]['ten'] ?>
                            </a></h3>
                          </div>
                          <div>
                            <p><b>Chuyên khoa: </b><?php echo $bacsi[$i]['chuyen_khoa'] ?></p>
                          </div>
                          <div>
                            <p><b>Nơi làm việc: </b><?php echo $bacsi[$i]['noi_lam_viec'] ?></p>
                          </div>
                        </div>
                      </li>
                    <?php }else{ ?>
                      <li class="ds-tin-a ds-timkiem2">
                        <a href="<?php echo base_url().'bacsi/'.$bacsi[$i]['id'] ?>">
                          <img style="margin-top: 15px;"  class="img-responsive" src="<?php echo base_url().'images/bacsi/'.$bacsi[$i]['anh'] ?>">
                        </a>
                        <div class="ds-tin-content" >
                          <div>
                            <h3><a href="<?php echo base_url().'bacsi/'.$bacsi[$i]['id'] ?>">
                              <?php echo $bacsi[$i]['ten'] ?>
                            </a></h3>
                          </div>
                          <div>
                            <p><b>Chuyên khoa: </b><?php echo $bacsi[$i]['chuyen_khoa'] ?></p>
                          </div>
                          <div>
                            <p><b>Nơi làm việc: </b><?php echo $bacsi[$i]['noi_lam_viec'] ?></p>
                          </div>
                        </div>
                      </li>
                    <?php } ?>
                  <?php } ?>
                <?php } ?>
              <?php } ?>  
            </ul>
          </div>
            
          <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 timkiem">
            <div class="subtitle  pull-left news-sub timkiem-tittle">
              <div class="title-c">TIN TỨC</div>
              <div class="title-e"><p></p></div>
            </div>
            <ul>
              <?php if (empty($tintuc)){ ?>
                <span>Không có kết quả phù hợp.</span>
              <?php }else { ?>
                <?php if (count($tintuc) == 1){ ?>
                  <li class="ds-tin-a ds-timkiem2">
                    <a href="<?php echo base_url().'tintuc/'.$tintuc[0]['id'] ?>">
                      <img style="margin-top: 15px;"  class="img-responsive" src="<?php echo base_url().'images/tintuc/'.$tintuc[0]['image'] ?>">
                    </a>
                    <div class="ds-tin-content" >
                      <div>
                        <h3><a href="<?php echo base_url().'tintuc/'.$tintuc[0]['id'] ?>">
                              <?php echo $tintuc[0]['ten'] ?>
                        </a></h3>
                      </div>
                      <div>
                        <p><b><?php if ($tintuc[0]['id_loai'] == 1){echo "Tin tức Y khoa"; ?>
                            <?php }else{ echo "Tin tức Nội bộ";} ?></p>
                      </div>
                      <div>
                        <p><?php echo word_limiter($tintuc['description'],30) ?></p>
                      </div>
                    </div>
                  </li>
                <?php }else { ?>
                  <?php for ($i=0; $i < count($tintuc); $i++) { ?>
                    <?php if ($i < count($tintuc)-1){ ?>
                      <li class=" ds-timkiem1">
                        <a href="<?php echo base_url().'tintuc/'.$tintuc[$i]['id']?>"><img class="img-responsive" src="<?php echo base_url().'images/'.$tintuc[$i]['image'] ?>"></a>
                        <div class="ds-tin-content" >
                          <div>
                            <h3><a href="<?php echo base_url().'tintuc/'.$tintuc[$i]['id'] ?>">
                              <?php echo $tintuc[$i]['ten'] ?>
                            </a></h3>
                          </div>
                          <div>
                            <p><b><?php if ($tintuc[$i]['id_loai'] == 1){echo "Tin tức Y khoa"; ?>
                            <?php }else{ echo "Tin tức Nội bộ";} ?></b></p>
                          </div>
                          <div>
                            <p><?php echo word_limiter($tintuc['description'],30) ?></p>
                          </div>
                        </div>
                      </li>
                    <?php }else{ ?>
                      <li class="ds-tin-a ds-timkiem2">
                        <a href="<?php echo base_url().'tintuc/'.$tintuc[$i]['id'] ?>">
                          <img style="margin-top: 15px;"  class="img-responsive" src="<?php echo base_url().'images/tintuc/'.$tintuc[$i]['image'] ?>">
                        </a>
                        <div class="ds-tin-content" >
                          <div>
                            <h3><a href="<?php echo base_url().'tintuc/'.$tintuc[$i]['id'] ?>">
                              <?php echo $tintuc[$i]['ten'] ?>
                            </a></h3>
                          </div>
                          <div>
                            <p><b><?php if ($tintuc[$i]['id_loai'] == 1){echo "Tin tức Y khoa"; ?>
                            <?php }else{ echo "Tin tức Nội bộ";} ?></b></p>
                          </div>
                          <div>
                            <p><?php echo word_limiter($tintuc['description'],30) ?></p>
                          </div>
                        </div>
                      </li>
                    <?php } ?>
                  <?php } ?>
                <?php } ?>
              <?php } ?>
            </ul>
          </div>
        </div>
        <div class="col-md-4 col-sm-12 col-lg-4 col-xs-12 right">
          <div>
            <div class="heading">
              <h3 class="head">Bệnh Viện Nổi Bật</h3>
            </div>
            <div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>