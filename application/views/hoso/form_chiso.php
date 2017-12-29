
<div data-ng-view="" class="mednow-appointment-route-content">
	<div id="mednow">
		<a class="back btn btn-link hidden-md hidden-lg" ng-class="{'hidden-md':loggedIn, 'hidden-lg':loggedIn }" data-ng-href="" analytics-on="" analytics-category="Link" analytics-label="/mednow" analytics-value=" Back">
		<i class="fa fa-angle-left"></i> Back</a>
		<div class="page-header">
			<div class="">
				<h3>Nhập dữ liệu hồ sơ bệnh án</h3>
			</div>
			<!-- <div ><button class="btn btn-lg btn-success " data-toggle="modal" data-target="#add-dieutri" style="margin-top: 10px;" title="Thêm hồ sơ mới"><i class="fa fa-plus"></i></button></div> -->
			
		</div>
		<h2 class="aliments-header">Các chỉ số khám bệnh cơ bản:</h2>
    <div>
      <button class="btn btn-info" data-toggle="modal" data-target="#addChiso" >Chọn các chỉ số cơ bản</button>
      <div class="col-xs-12 col-sm-12 col-md-12" style="border: 1px solid gray; border-radius: 5px; min-height: 100px; margin-top: 10px">
        <div id="dom"></div>
      </div>
    </div>
    
    <div class="row" >
      <div class="modal-body" style="margin-top: 150px">
         <div class="container-fluid">
            <div class="row">
              <form class="form-horizontal form-pricing" role="form" action="<?php echo base_url() ?>addChiSo" method="post" >
                <input name="<?php echo $csrf['name'] ?>" type="hidden" value="<?php echo $csrf['hash'] ?>" />  

                <div class="col-xs-12 col-sm-12 col-md-12">
                    
                    <div id="dom-input"></div>
                  <input type="hidden" name="count" id="count">
                  <input type="hidden" name="id_hoso" value="<?php echo $id_hoso ?>">
                  <div class="form-group nut hide text-center">
                     <button type="submit"  class="btn btn-sm btn-success" id="save"> Lưu <span class="glyphicon glyphicon-save"></span></button>
                  </div>
                </div>
              </form>
            </div>
         </div>
      </div>
    </div>
		
	</div>

  <!-- form thêm chỉ số mới -->
  <div class="modal fade" id="addChiso" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
       <div class="modal-content">
          <div class="modal-header">
             <button type="button" class="close" data-dismiss='modal' aria-hidden="true"><span class="glyphicon glyphicon-remove"></span></button>
             <h4 class="modal-title" style="font-size: 20px; padding: 12px;">Các chỉ số cơ bản </h4>
          </div>
          <div class="modal-body" style="min-height: 300px;">
             <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12" style="border: 1px solid gray; border-radius: 5px; min-height: 100px;">
                      <div id="dom-tag"></div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                      <h4>Bấm vào để chọn</h4>
                        <?php foreach ($chiso as $cs){ ?>
                          <button class="btn btn-info chiso" title="<?php echo $cs['ghi_chu'] ?>" id="<?php echo $cs['id'] ?>"><?php echo $cs['ten_chiso'] ?></button>
                        <?php } ?>
                    </div>
                </div>
             </div>
          </div>

          <div class="modal-footer" style="height: 70px;">
                <button type="button" data-dismiss="modal" class="btn btn-sm btn-success" id="saveChiso"> Đồng ý <span class="glyphicon glyphicon-save"></span></button>
                <button type="button" data-dismiss="modal" class="btn btn-sm btn-default"> Cancel <span class="glyphicon glyphicon-remove"></span></button>
          </div>
        </div>
      </div>
  </div>

</div>
<script type="text/javascript">
  // $(document).ready(function(){
  //   $('#tooltip-chiso').tooltip(); 
  // });

  var x = document.querySelectorAll(".chiso");
  var mang = {};
  for (var i = 1; i <= x.length; i++) {
    mang[i] = false;
  }
  for (var i = 0; i < x.length; i++) {
          x[i].onclick = function(){
            if (mang[$(this).attr('id')] == false) {
                $('#dom-tag').before('<span style="margin-left:10px;" id="'+$(this).attr('id')+'" onclick="xoa('+$(this).attr('id')+')" class="btn btn-primary tag"><i class="fa fa-remove"></i> '+$(this).text()+'</span>');
            }
            mang[$(this).attr('id')] = true;
          }

  }
  
  function xoa(id) {
    $('#'+id).remove();
    mang[id] = false;
  }
var i=0;
  $('#saveChiso').click(function(event) {
    $('.tag-c').remove();
    $('.form-cs').remove();
    <?php foreach ($chiso as $cs): ?>
      
      i =parseInt(i);
      if (mang[<?php echo $cs['id'] ?>] == true) {
        i++;
        $('#dom').before('<span style="margin-left:10px;" class="btn btn-primary tag-c" title="'+'<?php echo $cs['ghi_chu'] ?>'+'">'+'<?php echo $cs['ten_chiso'] ?>'+'</span>');
        $('#dom-input').before('<div class="form-group form-cs"><h4 class="great">'+'<?php echo $cs['ten_chiso'] ?>'+'</h4><span class="help-tooltip" title="'+'<?php echo $cs['ghi_chu'] ?>'+'"><i class="fa fa-info-circle"></i></span><div class="input-group"><input type="number" class="form-control" value="0" name="'+<?php echo $cs['id'] ?>+'" required="" ><div class="input-group-addon iga2"><span>'+'<?php echo $cs['don_vi'] ?>'+'</span></div></div></div>');  
        
      }    
    <?php endforeach ?>
      $('#count').val(JSON.stringify(mang));
      $('.nut').removeClass('hide');
  });
</script>
<script type="text/javascript">
  
  // $(document).ready(function() {
  //         $("#slider1").slider({
  //             animate: true,
  //             value:1,
  //             min: 0,
  //             max: 50,
  //             step: 0.1,
  //             slide: function(event, ui) {
  //                 update(1,ui.value); //changed
  //             }
  //         });
  //         //Added, set initial value.
  //         $("#1").val(0);
  //         $("#1-label").text(0);
          
  //         update();
  //     });
  //     //changed. now with parameter
  //     function update(slider,val) {
  //       var $amount = slider == 1?val:$("#1").val();
        
  //        $( "#1" ).val($amount);
  //        $( "#1-label" ).text($amount);

  //        $('#slider1 a').html('<label> '+$amount+' </label>');
  //     }
</script>