
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
        <form  method="get" action="<?php echo base_url() ?>timkiemchitiet.html">
          <div class=" col-xs-12 col-md-6 col-sm-12">
            <div class="timkiem-info">
              <input name="<?php echo $csrf['name'] ?>" type="hidden" value="<?php echo $csrf['hash'] ?>" /> 
              <div class=" input-group">
                <input type="text" name="search"   class="form-control" placeholder="Tra cứu ngay">
                <div class="input-group-addon btn-timkiem"><button class="btn-search"><i class="fa fa-search"></i></button></div>
              </div>
              <div><h6>Tra cứu thông tin Bệnh viện, Bác sĩ, Thuốc,...</h6></div>
            </div>
          </div>
          <div class=" col-xs-6 col-md-3 col-sm-6">
            <div class="timkiem-info">
              <div class="checkbox">
                  <input id="check1" type="checkbox" name="check_thuoc" value="check1">
                  <label for="check1">Thuốc</label>
                  <br>
                  <input id="check2" type="checkbox" name="check_bv" value="check2">
                  <label for="check2">Bệnh viện</label>
              </div>
            </div>
          </div>
          <div class=" col-xs-6 col-md-3 col-sm-6">
            <div class="timkiem-info">
              <div class="checkbox">
                  <input id="check3" type="checkbox" name="check_bs" value="check3">
                  <label for="check3">Bác sĩ</label>
                  <br>
                  <input id="check4" type="checkbox" name="check_tin" value="check4">
                  <label for="check4">Tin tức</label>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    
    <div id="shortcode-12" class="timkiem-body">
      <div class="container ">
        <div class="col-md-8 col-sm-12 col-lg-8 col-xs-12 left body-ds-tin"  >
          <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 timkiem <?php  echo isset($hideThuoc) ? $hideThuoc : ''; ?>" >
            <div class="subtitle  pull-left news-sub timkiem-tittle">
              <div class="title-c">TÊN THUỐC</div>
              <div class="title-e"><p></p></div>
            </div>
            <?php if (!empty($thuocs)){ ?>
              <?php foreach ($thuocs as $thuoc): ?>
                <div class="col-sm-6 col-xs-12 col-md-4  col-lg-4">
                  <div class="icon-box-5 wow fadeInDown" data-wow-delay="0.5s" data-wow-offset="150">
                    <div class ="thuoc-img">
                      <a href="<?php echo base_url().'thuoc/'.$thuoc['id'] ?>">
                        <img src="<?php echo json_decode($thuoc['image'],true)[0]['src'] ?>">
                      </a>
                    </div>
                    <div class="icon-box2-title tenthuoc">
                      <a href="<?php echo base_url().'thuoc/'.$thuoc['id'] ?>"><?php echo $thuoc['title'] ?></a>
                    </div>
                    <p>Giá: <?php echo  $thuoc['price'] . $thuoc['unit'] ?></p>
                  </div>   
                </div>
              <?php endforeach ?>
            <?php }else { echo "Không có kết quả phù hợp.";} ?>            
          </div>
            
          <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 timkiem <?php echo isset($hideBv) ? $hideBv : '';?>">
            <div class="subtitle  pull-left news-sub timkiem-tittle">
              <div class="title-c">THEO BỆNH VIỆN</div>
              <div class="title-e"><p></p></div>
            </div>
              <ul>
                <?php if (empty($benhvien)){ ?>
                  <span>Không có kết quả phù hợp.</span>
                <?php }else { ?>
                  <?php if (count($benhvien) == 1){
                  $headers = @get_headers(json_decode($benhvien[0]['image'],true)[0]['src']); ?>
                    <li class="ds-tin-a ds-timkiem2">
                      <?php if ($headers == true){ ?>
                        <a href="<?php echo base_url().'benhvien/'.$benhvien[0]['id']?>"><img style=""  class="img-responsive" src="<?php echo json_decode($benhvien[0]['image'],true)[0]['src'] ?>"></a>
                      <?php }else{ ?>
                          <a href="<?php echo base_url().'bacsi/'.$benhvien[0]['id'] ?>"><img class="avatar-bs"  class="img-responsive" src="<?php echo base_url() ?>images/benhvien.jpg"></a>
                      <?php } ?>
                      </a>
                      <div class="ds-tin-content" >
                        <div>
                          <h3><a href="<?php echo base_url().'benhvien/'.$benhvien[0]['id'] ?>">
                            <?php echo $benhvien[0]['name'] ?>
                          </a></h3>
                        </div>
                        <div>
                          <p><b>Giờ làm việc: </b><?php echo $benhvien[0]['short_desc'] ?></p>
                        </div>
                        <div>
                          <p><b>Số điện thoai: </b><?php echo $benhvien[0]['tel'] ?></p>
                        </div>
                        <div>
                          <p><b>Địa chỉ: </b><?php echo $benhvien[0]['address'] ?></p>
                        </div>
                      </div>
                    </li>
                  <?php }else { ?>
                    <?php for ($i=0; $i < count($benhvien); $i++) { 
                      $headers = @get_headers(json_decode($benhvien[$i]['image'],true)[0]['src']); ?>
                      <?php if ($i < count($benhvien)-1){ ?>
                        <li class=" ds-timkiem1">
                           <?php if ($headers == true){ ?>
                            <a href="<?php echo base_url().'benhvien/'.$benhvien[$i]['id']?>"><img style=""  class="img-responsive" src="<?php echo json_decode($benhvien[$i]['image'],true)[0]['src'] ?>"></a>
                          <?php }else{ ?>
                              <a href="<?php echo base_url().'bacsi/'.$benhvien[$i]['id'] ?>"><img class="avatar-bs"  class="img-responsive" src="<?php echo base_url() ?>images/benhvien.jpg"></a>
                          <?php } ?>
                          <div class="ds-tin-content" >
                            <div>
                              <h3><a href="<?php echo base_url().'benhvien/'.$benhvien[$i]['id'] ?>">
                                <?php echo $benhvien[$i]['name'] ?>
                              </a></h3>
                            </div>
                            <div>
                              <p><b>Giờ làm việc: </b><?php echo $benhvien[$i]['short_desc'] ?></p>
                            </div>
                            <div>
                              <p><b>Số điện thoai: </b><?php echo $benhvien[$i]['tel'] ?></p>
                            </div>
                            <div>
                              <p><b>Địa chỉ: </b><?php echo $benhvien[$i]['address'] ?></p>
                            </div>
                          </div>
                        </li>
                      <?php }else{ ?>
                        <li class="ds-tin-a ds-timkiem2">
                          <?php if ($headers == true){ ?>
                            <a href="<?php echo base_url().'benhvien/'.$benhvien[$i]['id']?>"><img style=""  class="img-responsive" src="<?php echo json_decode($benhvien[$i]['image'],true)[0]['src'] ?>"></a>
                          <?php }else{ ?>
                              <a href="<?php echo base_url().'bacsi/'.$benhvien[$i]['id'] ?>"><img class="avatar-bs"  class="img-responsive" src="<?php echo base_url() ?>images/benhvien.jpg"></a>
                          <?php } ?>
                          <div class="ds-tin-content" >
                            <div>
                              <h3><a href="<?php echo base_url().'benhvien/'.$benhvien[$i]['id'] ?>">
                                <?php echo $benhvien[$i]['name'] ?>
                              </a></h3>
                            </div>
                            <div>
                              <p><b>Giờ làm việc: </b><?php echo $benhvien[$i]['short_desc'] ?></p>
                            </div>
                            <div>
                              <p><b>Số điện thoai: </b><?php echo $benhvien[$i]['tel'] ?></p>
                            </div>
                            <div>
                              <p><b>Địa chỉ: </b><?php echo $benhvien[$i]['address'] ?></p>
                            </div>
                          </div>
                        </li>
                      <?php } ?>
                    <?php } ?>
                  <?php } ?>
                <?php } ?>
              </ul>
          </div>


          <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 timkiem <?php echo isset($hideBs) ? $hideBs : ''; ?>">
            <div class="subtitle  pull-left news-sub timkiem-tittle">
              <div class="title-c">THEO BÁC SĨ</div>
              <div class="title-e"><p></p></div>
            </div>
            <ul>
              <?php if (empty($bacsi)){ ?>
                  <span>Không có kết quả phù hợp.</span>
              <?php }else { ?>
                <?php if (count($bacsi) == 1){ 
                  $headers = @get_headers(json_decode($bacsi[0]['image'],true)[0]['src']); ?>
                  <li class="ds-tin-a ds-timkiem2">
                    <?php if ($headers == true){ ?>
                      <a href="<?php echo base_url().'bacsi/'.$bacsi[0]['id']?>"><img class="avatar-bs" style="width: 170px; height: 170px" class="img-responsive" src="<?php echo json_decode($bacsi[0]['image'],true)[0]['src'] ?>"></a>
                    <?php }else{ ?>
                      <a href="<?php echo base_url().'bacsi/'.$bacsi[0]['id']?>"><img class="avatar-bs" style="width: 170px; height: 170px" class="img-responsive" src="<?php echo base_url() ?>images/profile.png"></a>
                    <?php } ?>
                    
                    <div class="ds-tin-content" >
                      <div>
                        <h3><a href="<?php echo base_url().'bacsi/'.$bacsi[0]['id'] ?>">
                          <?php echo $bacsi[0]['name'] ?>
                        </a></h3>
                      </div>
                      <div>
                        <p><b>Chuyên khoa: </b><?php echo $bacsi[0]['branch'] ?></p>
                      </div>
                      <div>
                        <p><b>Nơi làm việc: </b><?php echo $bacsi[0]['short_desc'] ?></p>
                      </div>
                    </div>
                  </li>
                <?php }else { ?>
                  <?php for ($i=0; $i < count($bacsi); $i++) { 
                    $headers = @get_headers(json_decode($bacsi[$i]['image'],true)[0]['src']);  ?>
                    <?php if ($i < count($bacsi)-1){ ?>
                      <li class=" ds-timkiem1">
                        <?php if ($headers == true){ ?>
                          <a href="<?php echo base_url().'bacsi/'.$bacsi[$i]['id']?>"><img class="avatar-bs" style="width: 170px; height: 170px" class="img-responsive" src="<?php echo json_decode($bacsi[$i]['image'],true)[0]['src'] ?>"></a>
                        <?php }else{ ?>
                          <a href="<?php echo base_url().'bacsi/'.$bacsi[$i]['id']?>"><img class="avatar-bs" style="width: 170px; height: 170px" class="img-responsive" src="<?php echo base_url() ?>images/profile.png"></a>
                        <?php } ?>
                        
                        <div class="ds-tin-content" >
                          <div>
                            <h3><a href="<?php echo base_url().'bacsi/'.$bacsi[$i]['id'] ?>">
                              <?php echo $bacsi[$i]['name'] ?>
                            </a></h3>
                          </div>
                          <div>
                            <p><b>Chuyên khoa: </b><?php echo $bacsi[$i]['branch'] ?></p>
                          </div>
                          <div>
                            <p><b>Nơi làm việc: </b><?php echo $bacsi[$i]['short_desc'] ?></p>
                          </div>
                        </div>
                      </li>
                    <?php }else{ ?>
                      <li class="ds-tin-a ds-timkiem2">
                        <?php if ($headers == true){ ?>
                          <a href="<?php echo base_url().'bacsi/'.$bacsi[$i]['id']?>"><img class="avatar-bs" style="width: 170px; height: 170px" class="img-responsive" src="<?php echo json_decode($bacsi[$i]['image'],true)[0]['src'] ?>"></a>
                        <?php }else{ ?>
                          <a href="<?php echo base_url().'bacsi/'.$bacsi[$i]['id']?>"><img class="avatar-bs" style="width: 170px; height: 170px" class="img-responsive" src="<?php echo base_url() ?>images/profile.png"></a>
                        <?php } ?>
                        <div class="ds-tin-content" >
                          <div>
                            <h3><a href="<?php echo base_url().'bacsi/'.$bacsi[$i]['id'] ?>">
                              <?php echo $bacsi[$i]['name'] ?>
                            </a></h3>
                          </div>
                          <div>
                            <p><b>Chuyên khoa: </b><?php echo $bacsi[$i]['branch'] ?></p>
                          </div>
                          <div>
                            <p><b>Nơi làm việc: </b><?php echo $bacsi[$i]['short_desc'] ?></p>
                          </div>
                        </div>
                      </li>
                    <?php } ?>
                  <?php } ?>
                <?php } ?>
              <?php } ?>  
            </ul>
          </div>
            
          <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 timkiem <?php echo isset($hideTin) ? $hideTin : ''; ?>">
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
                      <img style="margin-top: 15px;"  class="img-responsive" src="<?php echo json_decode($tintuc[0]['image'],true)[0]['data-original'] ?>">
                    </a>
                    <div class="ds-tin-content" >
                      <div>
                        <h3><a href="<?php echo base_url().'tintuc/'.$tintuc[0]['id'] ?>">
                              <?php echo $tintuc[0]['title'] ?>
                        </a></h3>
                      </div>
                      <div>
                        <p><b><?php if ($tintuc[0]['id_loai'] == 1){echo "Tin tức Y khoa"; ?>
                            <?php }else{ echo "Tin tức Nội bộ";} ?></p>
                      </div>
                      <div>
                        <p><?php echo word_limiter($tintuc[0]['short_desc'],30) ?></p>
                      </div>
                    </div>
                  </li>
                <?php }else { ?>
                  <?php for ($i=0; $i < count($tintuc); $i++) { ?>
                    <?php if ($i < count($tintuc)-1){ ?>
                      <li class=" ds-timkiem1">
                        <a href="<?php echo base_url().'tintuc/'.$tintuc[$i]['id']?>"><img class="img-responsive" src="<?php echo json_decode($tintuc[$i]['image'],true)[0]['data-original'] ?>"></a>
                        <div class="ds-tin-content" >
                          <div>
                            <h3><a href="<?php echo base_url().'tintuc/'.$tintuc[$i]['id'] ?>">
                              <?php echo $tintuc[$i]['title'] ?>
                            </a></h3>
                          </div>
                          <div>
                            <p><b><?php if ($tintuc[$i]['id_loai'] == 1){echo "Tin tức Y khoa"; ?>
                            <?php }else{ echo "Tin tức Nội bộ";} ?></b></p>
                          </div>
                          <div>
                            <p><?php echo word_limiter($tintuc[$i]['short_desc'],30) ?></p>
                          </div>
                        </div>
                      </li>
                    <?php }else{ ?>
                      <li class="ds-tin-a ds-timkiem2">
                        <a href="<?php echo base_url().'tintuc/'.$tintuc[$i]['id'] ?>">
                          <img style="margin-top: 15px;"  class="img-responsive" src="<?php echo json_decode($tintuc[$i]['image'],true)[0]['data-original'] ?>">
                        </a>
                        <div class="ds-tin-content" >
                          <div>
                            <h3><a href="<?php echo base_url().'tintuc/'.$tintuc[$i]['id'] ?>">
                              <?php echo $tintuc[$i]['title'] ?>
                            </a></h3>
                          </div>
                          <div>
                            <p><b><?php if ($tintuc[$i]['id_loai'] == 1){echo "Tin tức Y khoa"; ?>
                            <?php }else{ echo "Tin tức Nội bộ";} ?></b></p>
                          </div>
                          <div>
                            <p><?php echo word_limiter($tintuc[$i]['short_desc'],30) ?></p>
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