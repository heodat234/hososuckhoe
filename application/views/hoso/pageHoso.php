<div data-ng-view="" class="mednow-appointment-route-content">
	<div id="mednow">
		<a class="back btn btn-link hidden-md hidden-lg" ng-class="{'hidden-md':loggedIn, 'hidden-lg':loggedIn }" data-ng-href="" analytics-on="" analytics-category="Link" analytics-label="/mednow" analytics-value=" Back">
		<i class="fa fa-angle-left"></i> Back</a>
		<div class="page-header">
			<div class="col-sm-11">
				<h3>Bệnh án</h3>
			</div>
			<div ><button class="btn btn-lg btn-success " data-toggle="modal" data-target="#add-dieutri" style="margin-top: 10px;" title="Thêm hồ sơ mới"><i class="fa fa-plus"></i></button></div>
			
		</div>
		<h2 class="aliments-header">Các đợt điều trị: </h2>

		<table class="table table-hover table-bordered" id="table">
			<thead>
				<th>Tên đợt điều trị</th>
				<th>Loại điều trị</th>
				<th>Ngày bắt đầu</th>
				<th>Ngày kết thúc</th>
				<th>Thêm ảnh hồ sơ</th>
        <th>Nhập các chỉ số</th>
        <th>Xem chi tiết</th>
				<th>Xóa</th>
			</thead>
			<tbody>
				<?php foreach ($hoso as $hs) { ?>
				<tr>
					<td><?php echo $hs['ten'] ?></td>
					<td><?php echo $hs['loai'] ?></td>
					<td><?php echo date('d-m-Y',strtotime($hs['ngay_batdau'])) ?></td>
					<td><?php echo date('d-m-Y',strtotime($hs['ngay_ketthuc'])) ?></td>
					<td><button class="btn btn-info" data-toggle="modal" data-target="#add-file" data-id="<?php echo $hs['id'] ?>"><i class="fa fa-file" title="Thêm file hồ sơ"></i></button></td>
          <td><a class="btn btn-primary" href="<?php echo base_url() ?>form.html/<?php echo $hs['id'] ?>"><i class="fa fa-pencil"></i></a></td>
          <td><button class="btn btn-info" data-toggle="modal" data-target="#view" data-id="<?php echo $hs['id'] ?>"><i class="fa fa-eye" title="Xem chi tiết hồ sơ"></i></button></td>
					<td><button class="btn btn-danger" title="Xóa hồ sơ"><i class="fa fa-trash"></i></button></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		
	</div>

  <!-- form thêm hồ sơ mới -->
	<div class="modal fade" id="add-dieutri" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
       <div class="modal-content">
          <div class="modal-header">
             <button type="button" class="close" data-dismiss='modal' aria-hidden="true"><span class="glyphicon glyphicon-remove"></span></button>
             <h4 class="modal-title" style="font-size: 20px; padding: 12px;">Đợt điều trị </h4>
          </div>
          <form method="post" id="form" enctype="multipart/form-data" action="<?php echo base_url() ?>addHoso">
            <input name="<?php echo $csrf['name'] ?>" type="hidden" value="<?php echo $csrf['hash'] ?>" />  
              <div class="modal-body">
                 <div class="container-fluid">
                    <div class="row">
                        <div class="alert alert-danger hide err"></div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <div><b>Tên đợt điều trị</b></div>
                                <div class="input-group">
                                    <div class="input-group-addon iga2">
                                       <span class="glyphicon glyphicon-folder-open"></span>
                                    </div>
                                    <input type="text" class="form-control"  name="name"  required="">
                                </div>
                            </div>
                            <div class="form-group">
                                 <div><b>Loại điều trị</b></div>
                                 <div class="input-group">
                                    <div class="input-group-addon iga2">
                                       <span class="glyphicon glyphicon-folder-open"></span>
                                    </div>
                                    <select class="form-control"  name="loai" required="">
                                    	<option value="Nội trú">Nội trú</option>
                                    	<option value="Ngoại trú">Ngoại trú</option>
                                    	<option value="Định kỳ">Định kỳ</option>
                                    </select>
                                 </div>
                            </div>
                            <div class="form-group">
                                 <div><b>Từ ngày</b></div>
                                 <div class="input-group">
                                    <div class="input-group-addon iga2">
                                       <span class="glyphicon glyphicon-folder-open"></span>
                                    </div>
                                    <input type="date" class="form-control today" name="from" required="" >
                                 </div>
                            </div>
                            <div class="form-group">
                                 <div><b>Đến ngày</b></div>
                                 <div class="input-group">
                                    <div class="input-group-addon iga2">
                                       <span class="glyphicon glyphicon-folder-open"></span>
                                    </div>
                                    <input type="date" class="form-control today" name="end" required="" >
                                 </div>
                            </div>
                            <div class="form-group">
                              <div><b>Chọn ảnh</b></div>
                              <div class="input-group">
                                  <div class="input-group-addon iga2">
                                     <span class="glyphicon glyphicon-folder-open"></span>
                                  </div>
                                  <input type="file" class="form-control"  name="userfile[]" multiple="multiple" id="i_file"  required="">
                              </div>
                              <span>*Có thể nhiều file ảnh cùng lúc.</span>
                          </div>
                        </div>
                    </div>
                 </div>
              </div>

          <div class="modal-footer" style="height: 10px;">
             <div class="form-group">
                <button type="submit"  class="btn btn-sm btn-success" id="savePass"> Lưu <span class="glyphicon glyphicon-save"></span></button>
                <button type="button" data-dismiss="modal" class="btn btn-sm btn-default"> Cancel <span class="glyphicon glyphicon-remove"></span></button>
             </div>
          </div>
          </form>
        </div>
      </div>
  </div>


  <!-- form thêm file -->
  <div class="modal fade" id="add-file" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
     <div class="modal-content">
        <div class="modal-header">
           <button type="button" class="close" data-dismiss='modal' aria-hidden="true"><span class="glyphicon glyphicon-remove"></span></button>
           <h4 class="modal-title" style="font-size: 20px; padding: 12px;">Thêm ảnh </h4>
        </div>
        <form method="post" id="form" enctype="multipart/form-data" action="<?php echo base_url() ?>addFile">
          <input name="<?php echo $csrf['name'] ?>" type="hidden" value="<?php echo $csrf['hash'] ?>" id= "csrf"/>  
          <input type="hidden" name="id">
            <div class="modal-body">
               <div class="container-fluid">
                  <div class="row">
                      <div class="alert alert-danger hide err"></div>
                      <div class="col-xs-12 col-sm-12 col-md-12">
                          <div class="form-group">
                              <div><b>Chọn ảnh</b></div>
                              <div class="input-group">
                                  <div class="input-group-addon iga2">
                                     <span class="glyphicon glyphicon-folder-open"></span>
                                  </div>
                                  <input type="file" class="form-control"  name="userfile[]" multiple="multiple" id="i_file"  required="">
                              </div>
                              <span>*Có thể nhiều file ảnh cùng lúc.</span>
                          </div>
                          
                      </div>
                  </div>
               </div>
            </div>

        <div class="modal-footer" style="height: 10px;">
           <div class="form-group">
              <button type="submit"  class="btn btn-sm btn-success" id="saveFile"> Lưu <span class="glyphicon glyphicon-save"></span></button>
              <button type="button" data-dismiss="modal" class="btn btn-sm btn-default"> Cancel <span class="glyphicon glyphicon-remove"></span></button>
           </div>
        </div>
        </form>
      </div>
    </div>
  </div>

  <!-- modal xem chi tiết -->
  <div class="modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
     <div class="modal-content">
        <div class="modal-header">
           <button type="button" class="close" data-dismiss='modal' aria-hidden="true"><span class="glyphicon glyphicon-remove"></span></button>
           <h4 class="modal-title" style="font-size: 20px; padding: 12px;">Xem chi tiết hồ sơ</h4>
        </div>
            <div class="modal-body">
               <div class="container-fluid">
                  <div class="row">
                      <div class="col-xs-12 col-sm-12 col-md-12">
                          <div class="col-xs-6 col-sm-6 col-md-6">
                              <div><b>Xem file ảnh</b></div>
                              <div class="input-group">
                                <button type="button" class="btn btn-primary" id="btn-image" data-toggle="modal" data-target="#view-image">Xem ảnh</button>
                                  
                              </div>
                          </div>
                          <div class="col-xs-6 col-sm-6 col-md-6">
                              <div><b>Xem chỉ số nhập</b></div>
                              <div class="input-group">
                                <form method="post" action="<?php echo base_url() ?>pageChiSo.html">
                                  <input name="<?php echo $csrf['name'] ?>" type="hidden" id="token" value="<?php echo $csrf['hash'] ?>" /> 
                                  <input type="hidden" name="id_hoso" value="">
                                  <button type="submit" class="btn btn-info" >Xem Chỉ số</button>
                                </form>
                                  
                              </div>
                          </div>
                      </div>
                  </div>
               </div>
            </div>

        <div class="modal-footer" style="height: 60px;">
              
              <button type="button" data-dismiss="modal" class="btn btn-sm btn-default"> Cancel <span class="glyphicon glyphicon-remove"></span></button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <!-- modal ảnh -->
  <div class="modal fade" id="view-image" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
     <div class="modal-content">
        <div class="modal-header">
           <button type="button" class="close" data-dismiss='modal' aria-hidden="true"><span class="glyphicon glyphicon-remove"></span></button>
           <h4 class="modal-title" style="font-size: 20px; padding: 12px;">Xem ảnh hồ sơ</h4>
        </div>
        <form method="post" id="form" enctype="multipart/form-data" action="<?php echo base_url() ?>addFile">
            <div class="modal-body">
               <div class="container-fluid">
                  <div class="row">
                      <div class="col-xs-12 col-sm-12 col-md-12" >
                        <div id="dom-image"></div>
                          
                      </div>
                  </div>
               </div>
            </div>

        <div class="modal-footer" style="height: 10px;">
           <div class="form-group">
              
              <button type="button" data-dismiss="modal" class="btn btn-sm btn-default"> Cancel <span class="glyphicon glyphicon-remove"></span></button>
           </div>
        </div>
        </form>
      </div>
    </div>
  </div>
  
  <!-- xem ảnh to -->
  <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> 
   <div class="modal-dialog"> 
    <div class="modal-content"> 
     <div class="modal-header"> 
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>
      </button> 
      <h4 class="modal-title" id="image-gallery-title"></h4> 
     </div> 
     <div class="modal-body"> 
      <p align="center"><img id="image-gallery-image" class="img-responsive" src="" alt="">
      </p> 
     </div> 
     <div class="modal-footer"> 
      <div class="col-md-2"> 
       <button type="button" class="btn btn-primary" id="show-previous-image"><< </button> 
      </div> 
      <div class="col-md-8 text-center" id="image-gallery-caption"> </div> 
      <div class="col-md-2"> 
       <button type="button" class="btn btn-primary" id="show-next-image">>> </button> 
      </div> 
     </div> 
    </div> 
   </div> 
  </div>


</div>
<script type="text/javascript">
  $.ajaxSetup({
    beforeSend: function(xhr, settings) {
      if (settings.data.indexOf('csrf_test_name') === -1) {
        settings.data += '&csrf_test_name=' + encodeURIComponent(Cookies.get('csrf_cookie_name'));
      }
    }
  });

	$('#table').DataTable();


	var x = document.querySelectorAll(".today");
        for (var i = 0; i < x.length; i++) {
          x[i].valueAsDate = new Date();
    }

    $('#add-file').on('show.bs.modal', function(e) {
      //get data-id attribute of the clicked element
      var id = $(e.relatedTarget).data('id');
      //populate the textbox
      $(e.currentTarget).find('input[name="id"]').val(id);
      
    });

    $('#view').on('show.bs.modal', function(e) {
      //get data-id attribute of the clicked element
      var id = $(e.relatedTarget).data('id');
      $(e.currentTarget).find('button[id="btn-image"]').attr('data-id', id);
      $(e.currentTarget).find('input[name="id_hoso"]').val(id);
    });


    $('#view-image').on('show.bs.modal', function(e) {
      //get data-id attribute of the clicked element
      $('#view').modal('hide');
      $('.thumb').remove();
      var id_hoso = $(e.relatedTarget).data('id');

      $.ajax({
        url: '<?php echo base_url() ?>loadImage',
        type: 'POST',
        dataType: 'json',
        data: {id_hoso: id_hoso, active:2 },
      })
      .done(function(data) {
        $('#csrf').val(data.csrf['hash']);
        $('#token').val(data.csrf['hash']);
        for (var i in data.image) {
          var j= parseInt(i)+1;
          $('#dom-image').before('<div class="col-lg-3 col-md-4 col-xs-6 thumb"> <a href="<?php echo base_url() ?>#" class="thumbnail" data-image-id="'+j+'" data-max="'+data.image.length+'" data-toggle="modal" data-title="Ảnh '+j+'" data-caption="Hososuckhoe.org Giải pháp chăm sóc sức khỏe toàn diện." data-image="<?php echo base_url() ?>images/hoso/'+data.image[i].dulieu+'" data-target="#image-gallery"> <img  class="img-hs" src="<?php echo base_url() ?>images/hoso/'+data.image[i].dulieu+'" alt="Ảnh '+j+'"> </a> </div> ');
        }
      })
      .fail(function() {
        console.log("error");
      });
      
      
    });

    $('#saveFile').click( function(e) {
           //kiem tra trinh duyet co ho tro File API
            if (window.File && window.FileReader && window.FileList && window.Blob)
            {
              // lay dung luong va kieu file tu the input file
                var ftype = $('#i_file')[0].files[0].type;
               // .alert( ftype);
               switch(ftype)
                {
                    case 'application/pdf':
                    case 'image/png':
                    case 'image/gif':
                    case 'image/jpeg':
                    case 'image/pjpeg':
                        break;
                    default:
                        alert('File chỉ được là file Ảnh hoặc PDF');
                        e.preventDefault();
                }
         
            }else{
                alert("Please upgrade your browser, because your current browser lacks some new features we need!");
            }
        });
</script>
<script type="text/javascript">
  $(document).ready(function(){
     
    $('#image-gallery').on('show.bs.modal', function(e) {
      var id = $(e.relatedTarget).data('image-id');
      var max = $(e.relatedTarget).data('max');
      
      loadGallery(true, 'a.thumbnail',id,max);
      if (id == max) {
        $('#show-next-image').hide();  
      }
    });  
    
         
    function disableButtons(counter_max, counter_current){        
      $('#show-previous-image, #show-next-image').show();        
      if(counter_max == counter_current){            
      $('#show-next-image').hide();        
      } 
      else if (counter_current == 1){            
      $('#show-previous-image').hide();        
      }    
    }
             
     
    function loadGallery(setIDs, setClickAttr,current_image,max){        
      var             
      selector,            
      counter = 0;
      selector = $('[data-image-id="' + current_image + '"]'); 
      updateGallery(selector);  
      
      $('#show-next-image, #show-previous-image').click(function(){            
        if($(this).attr('id') == 'show-previous-image'){                
        current_image--;            
        } else {                
        current_image++;            
        }
                   
        selector = $('[data-image-id="' + current_image + '"]'); 
        updateGallery(selector);        
      });

      $(window).keyup(function(e){
        if(e.keyCode=='37' && current_image !=1 ){
          current_image--; 
        }
        if(e.keyCode=='39') { 
          if (current_image < max) {
            current_image++; 
          }else{
            $('#show-next-image').hide(); 
          }             
        }
        selector = $('[data-image-id="' + current_image + '"]'); 
        updateGallery(selector); 
      }); 

      function updateGallery(selector) {            
        var $sel = selector;
        current_image = $sel.data('image-id');            
        $('#image-gallery-caption').text($sel.data('caption'));            
        $('#image-gallery-title').text($sel.data('title'));            
        $('#image-gallery-image').attr('src', $sel.data('image'));            
        disableButtons(counter, $sel.data('image-id'));        
      }
               
       
      if(setIDs == true){            
        $('[data-image-id]').each(function(){                
        counter++;                
        $(this).attr('data-image-id',counter);            
        });        
      }        
      $(setClickAttr).on('click',function(){  
        updateGallery($(this)); 
             
      });    
    }
});
 
</script>