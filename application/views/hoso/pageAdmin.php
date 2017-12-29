<div class="mednow-appointment-route-content">
	<div id="mednow">
		<div class="page-header">
			<div class="">
				<h3>Chỉ số xét nghiệm bệnh án</h3>
			</div>
		</div>
			<?php foreach ($thongbao as $tb): ?>
				<div class="alert alert-info alert-dismissable page-alert"> 
	   				<button type="button" style="margin-right:20px" class="tat close"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
	   				<a style="margin-right:20px" class="close" data-id="<?php echo $tb['id_hoso'] ?>" data-toggle="modal" data-target="#view-image"><span>xem</span></a>
	   				<?php echo $tb['name'] ?> đã thêm <?php echo $tb['tong'] ?> ảnh mới vào hồ sơ <?php echo $tb['ten'] ?>
	    		</div>
			<?php endforeach ?>
		<div id="noty-holder">
			
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
	        
	        <form method="post" id="form" enctype="multipart/form-data" action="<?php echo base_url() ?>activeFile">
	        	<input name="<?php echo $csrf['name'] ?>" type="hidden" value="<?php echo $csrf['hash'] ?>" id= "csrf"/>  
				
	            <div class="modal-body">
	               <div class="container-fluid">
	                  <div class="row">
	                  	<h4>Chọn những ảnh đã nhập dữ liệu</h4>
	                  	<br>
	                      <div class="col-xs-12 col-sm-12 col-md-12" >
	                        <div id="dom-image"></div>
	                        <input type="hidden" name="id_hoso">  
	                      </div>
	                  </div>
	               </div>
	            </div>

	        <div class="modal-footer" style="height: 10px;">
	           <div class="form-group">
	               <button type="submit"  class="btn btn-sm btn-success" id="save"> Lưu <span class="glyphicon glyphicon-save"></span></button>
	              <button type="button" data-dismiss="modal" class="btn btn-sm btn-default"> Cancel <span class="glyphicon glyphicon-remove"></span></button>
	           </div>
	        </div>
	        </form>
	      </div>
	    </div>
	</div>
	  
	  <!-- xem ảnh to -->
	<div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="min-width: 500px;"> 
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
	 function createNoty(message, type, id_hoso) {
	    var html = '<div class="alert alert-' + type + ' alert-dismissable page-alert">';    
	    html += '<button type="button" style="margin-right:20px" class=" close tat "><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>';
	    html += '<a style="margin-right:20px" class="close" data-id="'+id_hoso+'" data-toggle="modal" data-target="#view-image"><span>xem</span></a>';
	    html += message;
	    // html += '<a class="btn-btn-primary" style="margin-left:10px;" href="#">Xem</a>';
	    html += '</div>';    
	    $(html).hide().prependTo('#noty-holder').slideDown();
	};
	
	var route="<?php echo base_url() ?>loadThongbao";
    setInterval(function(){
    	$('.page-alert').remove();
        $.ajax({
        url:route,
        type:'get',
        dataType:'json',
        data:{},
        success:function(data) { 
        	console.log(data);
        	 for (var i in data) { 
            	createNoty(data[i].name+' đã thêm '+data[i].tong+' ảnh mới vào hồ sơ '+data[i].ten, 'info', data[i].id_hoso);
        	}
        	$('.page-alert .tat').click(function(e) {
			        e.preventDefault();
			        $(this).closest('.page-alert').slideUp();
			});
        }
    });
    },200000);
    $(document).ready(function() {
    	$('.page-alert .tat').click(function(e) {
			        e.preventDefault();
			        $(this).closest('.page-alert').slideUp();
			});
    });


    $('#view-image').on('show.bs.modal', function(e) {
      //get data-id attribute of the clicked element
      $('.thumb').remove();
      var id_hoso = $(e.relatedTarget).data('id');
      $(e.currentTarget).find('input[name="id_hoso"]').val(id_hoso);

      $.ajax({
        url: '<?php echo base_url() ?>loadImage',
        type: 'POST',
        dataType: 'json',
        data: {id_hoso: id_hoso, active:0 },
      })
      .done(function(data) {
        $('#csrf').val(data.csrf['hash']);
        $('#token').val(data.csrf['hash']);
        var j;
        for (var i in data.image) {
          j= parseInt(i)+1;

          x= parseInt(data.image[i].id)+1;
          $('#dom-image').before('<div class="col-lg-3 col-md-4 col-xs-6 thumb"> <a href="<?php echo base_url() ?>#" class="thumbnail" data-image-id="'+j+'" data-max="'+data.image.length+'" data-toggle="modal" data-title="Ảnh '+j+'" data-caption="Hososuckhoe.org Giải pháp chăm sóc sức khỏe toàn diện." data-image="<?php echo base_url() ?>images/hoso/'+data.image[i].dulieu+'" data-target="#image-gallery"> <img  class="img-hs" src="<?php echo base_url() ?>images/hoso/'+data.image[i].dulieu+'" alt="Ảnh '+j+'"> </a><input type="checkbox" style="margin: -15px 45px;" name="'+data.image[i].id+'" /> </div> ');
        }
       
      })
      .fail(function() {
        console.log("error");
      });
      
      
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