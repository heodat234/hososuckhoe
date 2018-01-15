<div class="welcome-route-content content-hs col-10 col-offset-2" id="page-info">
    <section >
      <div class="row">
        <div class="page-header clearfix col-sx-12">
            <h3>Xin chào <?php echo $this->session->userdata('user')['name']  ?></h3>
        </div>
        <div>
            <div class="row">
              <div class=" col-12 col-sm-4 col-lg-2">
                <?php if ($this->session->userdata('user')['avatar'] == ''){ ?>
                  <img style="width: 90%" src="<?php echo base_url() ?>images/profile.png">
                <?php }else { ?>
                  <img style="width: 90%" src="<?php echo base_url() ?>images/avatar/<?php echo $this->session->userdata('user')['avatar'] ?>">
                <?php } ?>
              </div>
              <div class="col-12 col-sm-8 col-lg-10" style="margin-top: 10px;">
                <table>
                  <tr>
                    <td class="tenmuc">Họ và tên: </td>
                    <td class="col-1"> <?php echo $this->session->userdata('user')['name'] ?></td>
                  </tr>
                  <tr>
                    <td class="tenmuc">Email: </td>
                    <td> <?php echo $this->session->userdata('user')['email'] ?></td>
                  </tr>
                  <tr>
                    <td class="tenmuc">Số CMND: </td>
                    <td> <?php echo $this->session->userdata('user')['cmnd'] ?></td>
                  </tr>
                  <tr>
                    <td class="tenmuc">Giới tính: </td>
                    <td> <?php echo $this->session->userdata('user')['gioi_tinh']==0 ?"Nam":"Nữ"  ?></td>
                  </tr>
                  <tr>
                    <td class="tenmuc">Số điện thoại: </td>
                    <td> <?php echo $this->session->userdata('user')['phone'] ?></td>
                  </tr>
                  <tr>
                    <td class="tenmuc">Địa chỉ: </td>
                    <td> <?php echo $this->session->userdata('user')['dia_chi'] ?></td>
                  </tr>
                </table>
              </div>
              
              <div class="col-md-6 col-md-offset-2 col-12" style="width: 90%">
                <br>
                <button class="btn btn-info" data-toggle="modal" data-target="#edit" data-id='<?php echo $this->session->userdata('user')['id'] ?>' data-name='<?= $this->session->userdata('user')['name'] ?>' data-cmnd='<?php echo $this->session->userdata('user')['cmnd'] ?>' data-gioitinh='<?php echo $this->session->userdata('user')['gioi_tinh'] ?>' data-phone='<?php echo $this->session->userdata('user')['phone'] ?>' data-diachi='<?php echo $this->session->userdata('user')['dia_chi'] ?>' data-ngaysinh='<?php echo date('Y-m-d',strtotime($this->session->userdata('user')['ngay_sinh'])) ?>' >
                    <i class="fa fa-edit"></i> Chỉnh sửa thông tin
                </button>
                <button class="btn btn-danger" data-toggle="modal" data-target="#editPass"><i class="fa fa-key"></i> Đổi mật khẩu</button>
            </div>
            </div>
            
        </div>
      </div>
    </section>
    <!-- modal sửa thông tin -->
    <div class="modal fade" id="edit" data-backdrop='static'>
      <div class="modal-dialog">
       <div class="modal-content">
          <div class="modal-header">
             <button type="button" class="close" data-dismiss='modal' aria-hidden="true"><span class="glyphicon glyphicon-remove"></span></button>
             <h4 class="modal-title" style="font-size: 20px; padding: 12px;">Chỉnh sửa thông tin </h4>
          </div>
          <form method="post" id="add-form" enctype="multipart/form-data" action="<?php echo base_url() ?>editUser ">
            <input name="<?php echo $csrf['name'] ?>" type="hidden" value="<?php echo $csrf['hash'] ?>" /> 
            <input type="hidden" name="id">
          <div class="modal-body">
             <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                          <div class="form-group">
                             <div><b>Họ tên</b></div>
                             <div class="input-group">
                                <div class="input-group-addon iga2">
                                   <span class="glyphicon glyphicon-folder-open"></span>
                                </div>
                                <input type="text" class="form-control"  name="name"  required="">
                             </div>
                          </div>
                          <div class="form-group">
                             <div><b>Số CMND</b></div>
                             <div class="input-group">
                                <div class="input-group-addon iga2">
                                   <span class="glyphicon glyphicon-folder-open"></span>
                                </div>
                                <input type="text" class="form-control" name="cmnd"  required="">
                             </div>
                          </div>
                          <div class="form-group">
                             <div><b>Số điện thoại</b></div>
                             <div class="input-group">
                                <div class="input-group-addon iga2">
                                   <span class="glyphicon glyphicon-folder-open"></span>
                                </div>
                                <input type="tel" class="form-control" name="phone" required="" data-val="true" pattern="[0-9]{10,11}"  title="10-11 chữ số." >
                             </div>
                          </div>
                          <div class="form-group">
                             <div><b>Giới tính</b></div>
                             <div class="input-group">
                                <div class="input-group-addon iga2">
                                   <span class="glyphicon glyphicon-folder-open"></span>
                                </div>
                                <select class="form-control" name="gioi_tinh">
                                    <option value="0">Nam</option>
                                    <option value="1">Nữ</option>
                                </select>
                             </div>
                          </div>
                          <div class="form-group">
                             <div><b>Ngày sinh</b></div>
                             <div class="input-group">
                                <div class="input-group-addon iga2">
                                   <span class="glyphicon glyphicon-folder-open"></span>
                                </div>
                                <input type="date" class="form-control" name="ngay_sinh" id="ngay_sinh">
                             </div>
                          </div>
                          <div class="form-group">
                             <div><b>Địa chỉ</b></div>
                             <div class="input-group">
                                <div class="input-group-addon iga2">
                                   <span class="glyphicon glyphicon-folder-open"></span>
                                </div>
                                <input type="text" class="form-control" name="dia_chi" >
                             </div>
                          </div>
                    </div>
                </div>
             </div>
          </div>

          <div class="modal-footer" style="height: 10px;">
             <div class="form-group">
                <button type="submit"  class="btn btn-sm btn-success"> Lưu <span class="glyphicon glyphicon-save"></span></button>
                <button type="button" data-dismiss="modal" class="btn btn-sm btn-default"> Cancel <span class="glyphicon glyphicon-remove"></span></button>
             </div>
          </div>
          </form>
        </div>
      </div>
    </div>
    <!-- đổi mật khẩu -->
    <div class="modal fade" id="editPass" data-backdrop='static'>
      <div class="modal-dialog">
       <div class="modal-content">
          <div class="modal-header">
             <button type="button" class="close" data-dismiss='modal' aria-hidden="true"><span class="glyphicon glyphicon-remove"></span></button>
             <h4 class="modal-title" style="font-size: 20px; padding: 12px;">Đổi mật khẩu </h4>
          </div>
          <form method="post" id="form-pass" enctype="multipart/form-data" action="<?php echo base_url() ?>editPass">
            <input name="csrf_test_name" type="hidden" value="" id ="csrf" /> 
            <input type="hidden" name="id" id="id" value="<?php echo $this->session->userdata('user')['id'] ?>">
              <div class="modal-body">
                 <div class="container-fluid">
                    <div class="row">
                        <div class="alert alert-danger hide err"></div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                              <div class="form-group">
                                 <div><b>Mât khẩu cũ</b></div>
                                 <div class="input-group">
                                    <div class="input-group-addon iga2">
                                       <span class="glyphicon glyphicon-folder-open"></span>
                                    </div>
                                    <input type="password" class="form-control"  name="old_pass"  required="" id="old_pass">
                                 </div>
                                 
                              </div>
                              <div class="form-group">
                                 <div><b>Mật khẩu mới</b></div>
                                 <div class="input-group">
                                    <div class="input-group-addon iga2">
                                       <span class="glyphicon glyphicon-folder-open"></span>
                                    </div>
                                    <input type="password" class="form-control" name="new_pass"  required="" id="new_pass" >
                                 </div>
                              </div>
                              <div class="form-group">
                                 <div><b>Nhập lại mật khẩu</b></div>
                                 <div class="input-group">
                                    <div class="input-group-addon iga2">
                                       <span class="glyphicon glyphicon-folder-open"></span>
                                    </div>
                                    <input type="password" class="form-control" name="re-pass" required="" id="re_pass" >
                                 </div>
                              </div>
                              
                        </div>
                    </div>
                 </div>
              </div>

          <div class="modal-footer" style="height: 10px;">
             <div class="form-group">
                <button type="button"  class="btn btn-sm btn-success" id="savePass"> Lưu <span class="glyphicon glyphicon-save"></span></button>
                <button type="button" data-dismiss="modal" class="btn btn-sm btn-default"> Cancel <span class="glyphicon glyphicon-remove"></span></button>
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
     //mở form chỉnh sửa
    $('#edit').on('show.bs.modal', function(e) {
      //get data-id attribute of the clicked element
      var id = $(e.relatedTarget).data('id');
      var ten = $(e.relatedTarget).data('name');
      var cmnd = $(e.relatedTarget).data('cmnd');
      var gioi_tinh = $(e.relatedTarget).data('gioitinh');
      var phone = $(e.relatedTarget).data('phone');
      var ngay_sinh = $(e.relatedTarget).data('ngaysinh');
      var dia_chi = $(e.relatedTarget).data('diachi');
      //populate the textbox
      $(e.currentTarget).find('input[name="id"]').val(id);
      $(e.currentTarget).find('input[name="name"]').val(ten);
      $(e.currentTarget).find('input[name="cmnd"]').val(cmnd);
        $('.gioi_tinh option[value="'+gioi_tinh+'"]').prop('selected','selected');
      $(e.currentTarget).find('input[name="phone"]').val(phone);
      $(e.currentTarget).find('input[name="ngay_sinh"]').attr('value',ngay_sinh);
      $(e.currentTarget).find('input[name="dia_chi"]').val(dia_chi);
      
    });
    $('#savePass').on('click',function(e) {
         e.preventDefault();
        var new_pass = $('#new_pass').val();
        var re_pass = $('#re_pass').val();
        var old_pass = $('#old_pass').val();
        var id = $('#id').val();
        if (old_pass == '') {
            $('.err').html('Bạn chưa nhập mật khẩu cũ.');
            $('.err').removeClass('hide');
        }else{
            $.ajax({
                url: '<?php echo base_url() ?>checkPass',
                type:'post',
                dataType: 'json',
                data:{pass: old_pass, id: id},
                success:function(data) {
                    // console.log(data.csrf['hash']);
                    $('#csrf').val(data.csrf['hash']);
                    if (data.data == 1) {
                        if (re_pass == '' || new_pass == '' ) {
                            $('.err').html('');
                            $('.err').html('Bạn chưa nhập mật khẩu mới.');
                            $('.err').removeClass('hide');
                        }
                        if (new_pass != re_pass) {
                            $('.err').html('Mật khẩu không khớp.');
                            $('.err').removeClass('hide');
                        }
                        if (new_pass != '' &&  re_pass != '' && new_pass == re_pass ) {
                            // $('#csrf').attr('name',data.csrf['name']);
                            
                            $('#form-pass').submit();
                        }
                    }else{
                        $('.err').html('');
                        $('.err').html('Mật khẩu cũ chưa đúng. Vui lòng nhập đúng mật khẩu cũ');
                        $('.err').removeClass('hide');
                    }
                }
            });
        }
        
    });
</script>