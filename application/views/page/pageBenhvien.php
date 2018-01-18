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
                <h3 class=""><?php echo $benhvien1['name'] ?></3>
              </div>
              <div class="img-news" style="text-align: center;">
                <img style="width: 40%;" src="<?php echo json_decode($benhvien1['image'],true)[0]['src'] ?>">
              </div>
              <div class="gioithieu-bv" >
                <div><i class="fa fa-phone"></i><a href=""> <?php echo $benhvien1['tel'] ?></a></div>
                <div><i class="fa fa-map-marker"></i> <?php echo $benhvien1['address'] ?></div>
                <div><i class="fa fa-clock-o"></i> <?php echo $benhvien1['short_desc'] ?></div>
                <div><i class="glyphicon glyphicon-globe"></i><a href="<?php echo $benhvien1['web_site'] ?>"> <?php echo $benhvien1['web_site'] ?></a></div>
              </div>
              <div id="map" style="height:400px; width:100%"></div>
              <div class="content-news">
                <?php echo $gioithieu ?>
              </div> 
              <div class="cmt-news">
                Bình luận
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
                      <li><a href="<?php echo base_url().'benhvien/'.$bv['id']?>"><span class="list-categories__name"><?php echo $bv['name'] ?></span></a></li>
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
