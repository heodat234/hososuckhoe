<div  class="content-hs" style="margin-left: -30px">
	<div id="mednow">
		<div class="page-header">
        <div class="pull-left" style="padding-top: 10px"><span>Quản lý tin tức</span></div>
        <div class="pull-right" id="btn-add-hoso" >
          <button class="btn btn-lg btn-primary " data-toggle="modal" data-target="#add-tintuc" title="Thêm tin tức mới"><i class="fa fa-plus"></i></button>
        </div>
    </div>
		
    <div >
		  <table class="table table-hover table-bordered" id="table" cellspacing="0" width="100%">
			<thead>
        <th class="col-1 col-md-1 col-lg-1"></th>
				<th class="col-11 col-md-2 col-lg-2">Tiêu đề</th>
				<!-- <th class=" col-md-1 col-lg-1">Ảnh</th> -->
				<th class="col-md-2 col-lg-2">Mô tả</th>
				<th class="col-11 col-md-3 col-lg-3">Nội dung</th>
				<th class=" col-md-1 col-lg-1">Ngày tạo</th>
        <td class="col-md-1 col-lg-1">Sửa</td>
        <td class="col-md-1 col-lg-1">Xóa</td>
			</thead>
			<tbody>
				<?php foreach ($news as $new) { ?>
				<tr id="row_<?php echo $new['id'] ?>">
          <td></td>
					<td><?php echo $new['title'] ?></td>
					<!-- <td><img style="width: 20%" src="<?php echo base_url().'images/tintuc/'.$new['image'] ?> "></td> -->
          <td><?php echo word_limiter($new['description'],30) ?></td>
          <td><?php echo word_limiter($new['content'],40) ?></td>
					<td><?php echo date('d-m-Y',strtotime($new['created_at'])) ?></td>
					<td>
						<button class="btn btn-success" data-toggle="modal" data-target="#edit-tintuc" title="Sửa tin tức" data-id="<?php echo $new['id'] ?>" data-title="<?php echo $new['title'] ?>" data-desc='<?php echo $new['description'] ?>' data-content='<?php echo $new['content'] ?>' data-image="<?php echo $new['image'] ?>"><i class="fa fa-edit fa-lg"></i></button>
					</td>
					<td>
						<button class="btn btn-danger" onclick="delete_row(<?php echo $new['id'] ?>)" title="Xóa tin tức"><i class="fa fa-trash fa-lg"></i></button>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		  </table>
    </div>
	</div>
  <!-- form thêm tin tức mới -->
  <div class="modal fade" id="add-tintuc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
     <div class="modal-content">
        <div class="modal-header">
           <button type="button" class="close" data-dismiss='modal' aria-hidden="true"><span class="glyphicon glyphicon-remove"></span></button>
           <h4 class="modal-title" style="font-size: 20px; padding: 12px;">Thêm Tin Tức </h4>
        </div>
        <form method="post" id="form" enctype="multipart/form-data" action="<?php echo base_url() ?>addNews">
          <input name="<?php echo $csrf['name'] ?>" type="hidden" value="<?php echo $csrf['hash'] ?>" />  
            <div class="modal-body">
               <div class="container-fluid">
                  <div class="row">
                      <div class="alert alert-danger hide err"></div>
                      <div class="col-xs-12 col-sm-12 col-md-12">
                          <div class="form-group">
                              <div><b>Tiêu đề</b></div>
                              <div class="input-group">
                                  <div class="input-group-addon iga2">
                                     <span class="glyphicon glyphicon-folder-open"></span>
                                  </div>
                                  <input type="text" class="form-control"  name="title"  required="">
                              </div>
                          </div>
                          <div class="form-group">
                               <div><b>Mô tả</b></div>
                               <div class="input-group">
                                  <textarea class="form-control" name="desc" required="" id="desc"></textarea>
                               </div>
                          </div>
                          <div class="form-group">
                               <div><b>Nội dung</b></div>
                               <div class="input-group">
                                  <textarea class="form-control" name="content" required="" id="contentNew"></textarea>
                               </div>
                          </div>
                          <div class="form-group">
                            <div><b>Chọn ảnh</b></div>
                            <div class="input-group">
                                <div class="input-group-addon iga2">
                                   <span class="glyphicon glyphicon-folder-open"></span>
                                </div>
                                <input type="file" class="form-control"  name="image" id="i_file"  required="">
                            </div>
                        </div>
                      </div>
                  </div>
               </div>
            </div>

        <div class="modal-footer" style="height: 10px;">
           <div class="form-group">
              <button type="submit"  class="btn btn-sm btn-success saveNew" > Lưu <span class="glyphicon glyphicon-save"></span></button>
              <button type="button" data-dismiss="modal" class="btn btn-sm btn-default"> Cancel <span class="glyphicon glyphicon-remove"></span></button>
           </div>
        </div>
        </form>
      </div>
    </div>
  </div>

  <!-- form sửa tin tức -->
  <div class="modal fade" id="edit-tintuc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
     <div class="modal-content">
        <div class="modal-header">
           <button type="button" class="close" data-dismiss='modal' aria-hidden="true"><span class="glyphicon glyphicon-remove"></span></button>
           <h4 class="modal-title" style="font-size: 20px; padding: 12px;">Sửa Tin Tức </h4>
        </div>
        <form method="post" id="form" enctype="multipart/form-data" action="<?php echo base_url() ?>editNews">
          <input name="<?php echo $csrf['name'] ?>" type="hidden" value="<?php echo $csrf['hash'] ?>" id="token" />  
          <input type="hidden" name="id">
            <div class="modal-body">
               <div class="container-fluid">
                  <div class="row">
                      <div class="alert alert-danger hide err"></div>
                      <div class="col-xs-12 col-sm-12 col-md-12">
                          <div class="form-group">
                              <div><b>Tiêu đề</b></div>
                              <div class="input-group">
                                  <div class="input-group-addon iga2">
                                     <span class="glyphicon glyphicon-folder-open"></span>
                                  </div>
                                  <input type="text" class="form-control"  name="title"  required="">
                              </div>
                          </div>
                          <div class="form-group">
                               <div><b>Mô tả</b></div>
                               <div class="input-group">
                                  <textarea class="form-control" name="desc" required="" id="desc_edit"></textarea>
                               </div>
                          </div>
                          <div class="form-group">
                               <div><b>Nội dung</b></div>
                               <div class="input-group">
                                  <textarea class="form-control" name="content" required="" id="content_edit"></textarea>
                               </div>
                          </div>
                          <div class="form-group">
                            <div><b>Chọn ảnh</b></div>
                            <div class="input-group">
                                <div class="input-group-addon iga2">
                                   <span class="glyphicon glyphicon-folder-open"></span>
                                </div>
                                <input type="text" class="form-control" name="image" disabled="" id="f_in">
                              <div class="input-group-addon iga2">
                                 <label class="glyphicon">Browse...<input onchange="showFile(this);" type="file" id="file_input" name="file" style="display: none;"></label>
                              </div>
                            </div>
                        </div>
                      </div>
                  </div>
               </div>
            </div>

        <div class="modal-footer" style="height: 10px;">
           <div class="form-group">
              <button type="submit"  class="btn btn-sm btn-success saveNew" > Lưu <span class="glyphicon glyphicon-save"></span></button>
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
  function showFile(fileName) {
      if (fileName.files && fileName.files[0]) {
          $('#f_in').val(fileName.files[0].name);
      }
  }
  $('#edit-tintuc').on('show.bs.modal', function(e) {
    //get data-id attribute of the clicked element
    var id 		= $(e.relatedTarget).data('id');
    var title 	= $(e.relatedTarget).data('title');
    var image 	= $(e.relatedTarget).data('image');
    var desc 	= $(e.relatedTarget).data('desc');
    var content = $(e.relatedTarget).data('content');
    //populate the textbox
    $(e.currentTarget).find('input[name="title"]').val(title);
    $(e.currentTarget).find('input[name="id"]').val(id);
    CKEDITOR.instances['desc_edit'].setData(desc);
    CKEDITOR.instances['content_edit'].setData(content);
    $(e.currentTarget).find('input[name="image"]').val(image);
	});

  function delete_row(id)
    {
      
      ssi_modal.confirm({
        content: 'Bạn có muốn xóa tin này không?',
        okBtn: {
          className:'btn btn-primary'
        },
        cancelBtn:{
          className:'btn btn-danger'
        }
      },function (result)
      {
        if(result)
        {
          var route="<?php echo base_url() ?>deleteNews";
          $.ajax({
            url:route,
            type:'post',
            dataType : 'json',
            data:{id:id},
            success:function(data) {
            	$('#token').val(data.csrf['hash']);
               	$('#table').dataTable().fnDeleteRow($('#row_'+id)[0]);
            }
          });
        }
        else
          ssi_modal.notify('error', {content: "Hủy xóa"});
        }
      );
    }

  $('.saveNew').click( function(e) {
       //kiem tra trinh duyet co ho tro File API
        if (window.File && window.FileReader && window.FileList && window.Blob)
        {
          // lay dung luong va kieu file tu the input file
            var ftype = $('#i_file')[0].files[0].type;
           // .alert( ftype);
           switch(ftype)
            {
                case 'image/png':
                case 'image/gif':
                case 'image/jpeg':
                case 'image/pjpeg':
                    break;
                default:
                    alert('File chỉ được là file Ảnh');
                    e.preventDefault();
            }
     
        }else{
            alert("Please upgrade your browser, because your current browser lacks some new features we need!");
        }
    });

	CKEDITOR.config.height = 150;
	CKEDITOR.replace('contentNew');
	CKEDITOR.replace('desc');
	CKEDITOR.replace('content_edit');
	CKEDITOR.replace('desc_edit');
</script>