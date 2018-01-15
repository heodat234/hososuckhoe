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
        <div class="row">
          <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
            <div class="col-md-9 col-sm-12 col-lg-9 col-xs-12 no-pad ">
              <div>
                <h3 class=""><?php echo $benhvien1['ten'] ?></3>
              </div>
              <!-- <ul class="entry-meta clearfix">
                <li><a href=""><i class="fa fa-user"></i> Admin</a></li>
                <li><a href=""><i class="fa fa-calendar"></i>  <?php echo date('d-m-Y',strtotime($tintuc['created_at'])) ?> </a></li>
                <li><a href=""><i class="fa fa-eye"></i>  <?php echo number_format($tintuc['view']+1) ?></a></li>
              </ul> -->
              <div class="img-news" style="text-align: center;">
                <img width="60%" src="<?php echo base_url().'images/tintuc/'.$benhvien1['anh'] ?>">
              </div>
              <div class="gioithieu-bv" >
                <div><i class="fa fa-phone"></i><a href=""> <?php echo $benhvien1['so_dienthoai'] ?></a></div>
                <div><i class="fa fa-map-marker"></i> <?php echo $benhvien1['dia_chi'] ?></div>
                <div><i class="fa fa-clock-o"></i> <?php echo $benhvien1['gio_lamviec'] ?></div>
                <div><i class="glyphicon glyphicon-globe"></i><a href="<?php echo $benhvien1['website'] ?>"> <?php echo $benhvien1['website'] ?></a></div>
              </div>
              <div id="map" style="height:400px; width:100%"></div>
              <div class="content-news">
                <div>Giới thiệu</div>
                <p><?php echo $benhvien1['description'] ?></p>
              </div> 
              <div class="cmt-news">
                Bình luận
              </div>           
            </div>
            <div class="col-md-3 col-sm-12 col-lg-3 col-xs-12 right">
              <div>
                <div class="heading">
                  <h4 class="head"><i class="fa fa-folder-o" style="color: #f26529;"></i> Danh mục tin tức</h4>
                </div>
                <div>
                  <ul class="list-categories list-categories_widget list-bv">
                    <?php foreach ($benhvien as $bv): ?>
                      <li><a href="<?php echo base_url().'benhvien/'.$bv['id']?>"><span class="list-categories__name"><?php echo $bv['ten'] ?></span></a></li>
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
                    <iframe width="100%"  src="https://www.youtube.com/embed/1-Zee9ZJH7o" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
                  </div>
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
