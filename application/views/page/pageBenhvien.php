<style type="text/css">
  .dropdown-menu>li>a:hover, .dropdown-menu>li>a:focus {
    text-decoration: none;
    color: #107fc9;
    background-color: #fff;
  }
  .dropdown-menu>li>a {
    border-bottom: none;
}
</style>
<div>
  <div class="about-intro-wrap pull-left">
    <div class="bread-crumb-wrap ibc-wrap-1">
      <div class="container">
        <!--Title / Beadcrumb-->
        <div class="inner-page-title-wrap col-xs-12 col-md-12 col-sm-12">
          <div class="bread-heading">
            <h1>Danh sách bệnh viện</h1>
          </div>
          
        </div>
      </div>
    </div>
    <div id="shortcode-12">
      <div class="container">
          <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
            <div class="col-md-9 col-sm-12 col-lg-9 col-xs-12 no-pad body-ds-tin">
              <div>
                <h3 class=""><?php echo $benhvien1['name'] ?></h3>
              </div>
              <div class="img-news">
                <img style="width: 90%;" src="<?php echo json_decode($benhvien1['image'],true)[0]['src'] ?>">
              </div>
              <div class="gioithieu-bv" >
                <div><i class="fa fa-phone"></i><a href=""> <?php echo $benhvien1['tel'] ?></a></div>
                <div><i class="fa fa-map-marker"></i> <?php echo $benhvien1['address'] ?></div>
                <div><i class="fa fa-clock-o"></i> <?php echo $benhvien1['short_desc'] ?></div>
                <div><i class="glyphicon glyphicon-globe"></i><a href="<?php echo $benhvien1['web_site'] ?>"> <?php echo $benhvien1['web_site'] ?></a></div>
                <div style="margin-top: 100px; width: 70%;border-top: 1px solid #f3f3f3">
                   <nav class="navbar navbar-default" role="navigation">
                        <div class="container-fluid">
                        
                            <div class="" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav " style="margin-left: -20px;">
                                    <li class="dropdown <?php echo isset($danhgiaDV)? $danhgiaDV : ''  ?>" style="width: 40%" id="dv">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <img style="width: 35%" src="<?php echo base_url() ?>images/Untitled-1.png"> Dịch vụ
                                        </a>
                                         <ul class="dropdown-menu " style="width: 300px;">
                                            <li class="col-md-4 danhgia" style="margin-left: -15px;"><a href="javascrip:void(0)" onclick="danhgiaDichVu(1)"><img  src="<?php echo base_url() ?>images/icons-Tam-on.png"> Tạm ổn</a></li>
                                            <li class="col-md-4 danhgia"><a href="javascrip:void(0)" onclick="danhgiaDichVu(2)"><img  src="<?php echo base_url() ?>images/icons-Tot.png"> Tốt</a></li>
                                            <li class="col-md-4 danhgia"><a href="javascrip:void(0)" onclick="danhgiaDichVu(3)"><img  src="<?php echo base_url() ?>images/icons-Rat-tot.png"> Rất tốt</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown <?php echo isset($danhgiaCM)? $danhgiaCM : ''  ?>" style="width: 60%" id="cm">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <img style="width: 20%" src="<?php echo base_url() ?>images/icons-dich-vu.png"> Chuyên môn
                                        </a>
                                        <ul class="dropdown-menu " style="width: 300px;">
                                            <li class="col-md-4 danhgia" style="margin-left: -15px;"><a href="javascrip:void(0)" onclick="danhgiaChuyenMon(1)"><img  src="<?php echo base_url() ?>images/icons-Tam-on.png"> Tạm ổn</a></li>
                                            <li class="col-md-4 danhgia"><a href="javascrip:void(0)" onclick="danhgiaChuyenMon(2)"><img  src="<?php echo base_url() ?>images/icons-Tot.png"> Tốt</a></li>
                                            <li class="col-md-4 danhgia"><a href="javascrip:void(0)" onclick="danhgiaChuyenMon(3)"><img  src="<?php echo base_url() ?>images/icons-Rat-tot.png"> Rất tốt</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                                  
                        </div>
                    </nav>  
                </div>
              </div>
              <div id="map" style="height:400px; width:100%"></div>
              <div class="content-news-bv">
                <?php echo $gioithieu ?>
              </div> 
                         
            </div>
            <div class="col-md-3 col-sm-12 col-lg-3 col-xs-12 right">
              <div>
                <div class="heading">
                  <h4 class="head"><i class="fa fa-folder-o" style="color: #f26529;"></i> Danh sách bệnh viện</h4>
                </div>
                <div>
                  <ul class="list-categories list-categories_widget list-bv">
                    <?php foreach ($benhvien as $bv): ?>
                      <li><a href="<?php echo base_url().'benhvien/'.$bv['id'].'-'.to_slug($bv['name']).'.html' ?>"><span class="list-categories__name"><?php echo $bv['name'] ?></span></a></li>
                    <?php endforeach ?>
                  </ul>
                </div>
              </div>
              <div style="margin-top: 20px">
                <div class="heading">
                  <h4 class="head"><i class="fa fa-star" style="color: #f26529;"></i> Video hoạt động</h4>
                </div>
                <div style="border-top:1px solid #ddd">
                  <div>
                    <p>Quản lý hồ sơ sức khỏe cá nhân online</p>
                  </div>
                  <div>
                   
                  </div>
                </div>
              </div>
            </div>
          </div>
        
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">

var gmap = new google.maps.LatLng(<?php echo $toado['lat'] ?>,<?php echo $toado['lng'] ?>);
var marker;

function initialize()
{
    var mapProp = {
         center:new google.maps.LatLng(<?php echo $toado['lat'] ?>,<?php echo $toado['lng'] ?>),
         zoom:16,
        mapTypeId:google.maps.MapTypeId.ROADMAP
    };
    var map=new google.maps.Map(document.getElementById("map")
    ,mapProp);

  var styles = [
    {
      featureType: 'road.arterial',
      elementType: 'all',
      stylers: [
        { hue: '#fff' },
        { saturation: 100 },
        { lightness: -48 },
        { visibility: 'on' }
      ]
    },{
      featureType: 'road',
      elementType: 'all',
      stylers: [
      ]
    },
    {
        featureType: 'water',
        elementType: 'geometry.fill',
        stylers: [
            { color: '#adc9b8' }
        ]
    },{
        featureType: 'landscape.natural',
        elementType: 'all',
        stylers: [
            { hue: '#809f80' },
            { lightness: -35 }
        ]
    }
  ];

  var styledMapType = new google.maps.StyledMapType(styles);
  map.mapTypes.set('Styled', styledMapType);

  marker = new google.maps.Marker({
    map:map,
    draggable:true,
    animation: google.maps.Animation.DROP,
    position: gmap
  });
  google.maps.event.addListener(marker, 'click', toggleBounce);
}

function toggleBounce() {
  if (marker.getAnimation() !== null) {
    marker.setAnimation(null);
  } else {
    marker.setAnimation(google.maps.Animation.BOUNCE);
  }
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>
<script type="text/javascript">
  function danhgiaDichVu(diem) {
    var idBV = <?php echo $benhvien1['id'] ?>;
    <?php if($this->session->has_userdata('user') ){ ?>;
    
      $.ajax({
        url: '<?php echo base_url() ?>Benhvien/danhgiaDichVu',
        type: 'get',
        dataType: 'json',
        data: {diem: diem, idBV: idBV},
      })
      .done(function(data) {
        if (data.err == 1) {
          $('#dv').addClass('active');
          alert('Đánh giá thành công.')
        }else{
          alert('Bạn đã đánh giá dịch vụ của bệnh viện này.')
        }
      })
      .fail(function() {
        console.log("error");
      });
 
    <?php 
        }else{
    ?>
      alert('Bạn phải đăng nhập để có thể đánh giá bệnh viện.');
    <?php } ?>
    
  }
  function danhgiaChuyenMon(diem) {
    var idBV = <?php echo $benhvien1['id'] ?>;
    <?php if($this->session->has_userdata('user') ){ ?>;
    
      $.ajax({
        url: '<?php echo base_url() ?>Benhvien/danhgiaChuyenMon',
        type: 'get',
        dataType: 'json',
        data: {diem: diem, idBV: idBV},
      })
      .done(function(data) {
        if (data.err == 1) {
          $('#cm').addClass('active');
          alert('Đánh giá thành công.')
        }else{
          alert('Bạn đã đánh giá dịch vụ của bệnh viện này.')
        }
      })
      .fail(function() {
        console.log("error");
      });
 
    <?php 
        }else{
    ?>
      alert('Bạn phải đăng nhập để có thể đánh giá bệnh viện.');
    <?php } ?>
  }
</script>
