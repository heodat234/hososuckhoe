<div class="content-hs">
	<div id="mednow">
		<div class="page-header" style="margin-left: -30px">
        <div class="pull-left" style="padding-top: 10px"><span>Nhập dữ liệu hồ sơ bệnh án</span></div>
    </div>
		
		<h2 class="aliments-header">Các chỉ số khám bệnh cơ bản:</h2>
    
      <div class="modal-body" style="margin-top: 20px;margin-left: -55px; margin-right: 15px">
         <div class="container-fluid">
              <form class="form-horizontal form-pricing" role="form" action="<?php echo base_url() ?>addChiSo" method="post" >
                <input name="<?php echo $csrf['name'] ?>" type="hidden" value="" id="token" />  
                <input type="hidden" name="count" id="count" value="0">
                  <div class="col-md-6 col-md-offset-3">
                    <div class="form-group">
                      <div><b>Chọn bệnh nhân</b></div>
                      <div class="input-group ">
                          <div class="input-group-addon iga2">
                             <span class="glyphicon glyphicon-folder-open"></span>
                          </div>
                          <select class="form-control"  name="user" onchange="changeUser(this)" required="">
                            <option value="">Chọn bệnh nhân</option>
                            <?php foreach ($users as $user): ?>
                              <option value="<?php echo $user['id'] ?>"><?php echo $user['name'] ?></option>
                            <?php endforeach ?>                          
                          </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-md-offset-3" id="form-data">
                    <div class="form-group">
                      <div><b>Chọn Hồ sơ</b></div>
                      <div class="input-group ">
                          <div class="input-group-addon iga2">
                             <span class="glyphicon glyphicon-folder-open"></span>
                          </div>
                          <select class="form-control"  name="id_hoso"  required="">
                            <option value="" id="dom_hoso">Chọn loại hồ sơ</option>
                                                   
                          </select>
                      </div>
                    </div>
                  </div>
                
                <div  style="margin-left: 2px; margin-right: 10px">
                    <div class="col-12 col-md-6">Chọn chỉ số xét nghiệm</div>
                    <div class="col-12 col-md-6">Nhập giá trị chỉ số tương ứng</div>
                    <div >
                      <div class="col-12 col-md-6">
                        <input type="text" name="chiso_0" list="cs" class="form-control" placeholder="Gõ hoặc chọn chỉ số theo danh sách bên dưới" required="">
                        <input type="hidden" name="id_chiso_0" id="id_chiso_0">
                      </div>
                      <div class=" col-8 col-md-4 input-group input-chiso">
                        <input type="number" name="0" value="0"  class="form-control">
                        <div class="input-group-addon " id="dv_0"></div>
                        <input type="hidden" name="dv_0" id="donvi_0">
                      </div>
                      <button type="button" title="Thêm chỉ số" class="btn btn-primary pull-right" onclick="them()" id="btn_0" style="height:34px; margin-top: -34px;"><i class="fa fa-plus"></i></button>
                      <datalist id="cs" >
                        <?php foreach ($chiso as $cs): ?>
                          <option don_vi="<?php echo $cs['don_vi'] ?>" id="<?php echo $cs['id'] ?>" value="<?php echo $cs['ten_chiso'] ?>"><?php echo $cs['ghi_chu'] ?></option>
                        <?php endforeach ?>
                      </datalist>
                    </div>  
                    <div id="dom-input"></div>
                    <div class=" nut  text-center" style="margin-top: 20px">
                       <button type="submit"  class="btn btn-sm btn-success" id="save"> Lưu <span class="glyphicon glyphicon-save"></span></button>
                    </div>
                </div>
                
              </form>
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

  function changeUser(obj) {
    $('.hs').remove();
    var id= obj.value;
    $.ajax({
      url: '<?php  echo base_url()?>loadHoso',
      type: 'post',
      dataType: 'json',
      data: {id: id},
    })
    .done(function(data) {
      $('#token').val(data.csrf['hash']);
      for (var i in data.hoso) {
        $('#dom_hoso').after('<option class="hs" value="'+data.hoso[i].id+'">'+data.hoso[i].ten+'</option>');
      }
      
    })
    .fail(function() {
      console.log("error");
    });
    
  }



  $('input[name=chiso_0]').on('input',function() {
    var selectedOption = $('option[value="'+$(this).val()+'"]');
    if(selectedOption.length>0){
      // console.log( selectedOption.attr('don_vi') );
      $('#dv_0').html(selectedOption.attr('don_vi'));
      $('#donvi_0').val(selectedOption.attr('don_vi'));
      $('#id_chiso_0').val(selectedOption.attr('id'));
    }
  });

  var mang = ['1'];
  function them() {
    var count = $('#count').val();
    for (var i = count; i >= 0; i--) {
      if (mang[i] != 0 ) {
        $('#btn_'+i).hide();
        break;
      }
    }
    count = parseInt(count);
    count = count+1;
    $('#dom-input').before('                                                                                         <div style="margin-top:25px" id="form_'+count+'"><div class="col-12 col-md-6"><input type="text"  name="chiso_'+count+'" list="cs" class="form-control" placeholder="Gõ hoặc chọn chỉ số theo danh sách bên dưới"><input type="hidden" name="id_chiso_'+count+'" id="id_chiso_'+count+'"></div><div class="col-8 col-md-4 input-group input-chiso"><input type="number" name="'+count+'" value="0" class="form-control"><div class="input-group-addon " id="dv_'+count+'"></div><input type="hidden" name="dv_'+count+'" id="donvi_'+count+'"></div><button type="button" title="Thêm chỉ số" class="btn btn-primary pull-right" onclick="them()" id="btn_'+count+'" style="height:34px;margin-top: -34px;margin-right: -10px;"><i class="fa fa-plus"></i></button><button type="button" title="Xóa chỉ số" class="btn btn-danger pull-right" onclick="xoa('+count+')"  style="height:34px; margin-top: -34px; margin-right: 30px;"><i class="fa fa-trash"></i></button><datalist id="cs" id="listCS"><?php foreach ($chiso as $cs): ?><option don_vi="<?php echo $cs['don_vi'] ?>" value="<?php echo $cs['ten_chiso'] ?>" id="<?php echo $cs['id'] ?>"><?php echo $cs['ghi_chu'] ?></option><?php endforeach ?></datalist></div>');
    
    $('input[name=chiso_'+count+']').on('input',function() {
      var selectedOption = $('option[value="'+$(this).val()+'"]');
      if(selectedOption.length>0){
        // console.log( selectedOption.attr('don_vi') );
        $('#dv_'+count).html(selectedOption.attr('don_vi'));
        $('#donvi_'+count).val(selectedOption.attr('don_vi'));
        $('#id_chiso_'+count).val(selectedOption.attr('id'));
      }
    });
    mang.push('1');
    $('#count').val(count);
    // console.log(mang);
  }


  function xoa(id) {
    var count = $('#count').val();
    $('#form_'+id).remove();
    mang[id] = 0;
      
    for (var i = count; i > -1; i--) {
      if (mang[i] != 0 ) {
        $('#btn_'+i).show();
        break;
      }
    }
  
  }
</script>