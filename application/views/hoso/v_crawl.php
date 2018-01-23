
<div class="mednow-appointment-route-content">
    <div class="modal-body" style="margin-top: 20px;margin-left: -55px; margin-right: 15px">
        <table id="myTable" class=" table order-list">
		    <thead>
		        <tr>
		            <td>Crawl</td>
		        </tr>
		    </thead>
		    <tbody>
		        <tr>
		            <td class="col-sm-12">
		                <div class="input-group col-sm-9">
					      <span class="input-group-addon"><i class="glyphicon glyphicon-tag"></i></span>
					      <input id="name" type="text" class="form-control" name="name" placeholder="Tên domain" list="from-domain">
					      <datalist id="from-domain">
					      	<option domain="https://www.nhathuocankhang.com" value="Nhà thuốc An Khang" />
					      </datalist>
					    </div>
		            </td>
		        </tr>
		        <tr>
		        	<td class="col-sm-12">
		                <div class="input-group col-sm-9">
					      <span class="input-group-addon"><i class="	glyphicon glyphicon-link"></i></span>
					      <input id="category" type="text" class="form-control" name="category" placeholder="Danh mục" list="category-list">
					      <datalist id="category-list">
					      	
					      </datalist>
					    </div>
		            </td>
		        </tr>
		        <tr id="level-2-input">   
		            <td class="col-sm-12">
		                <div class="input-group col-sm-9">
					      <span class="input-group-addon"><i class="glyphicon glyphicon-plus"></i></span>
					      <input id="detail" type="text" class="form-control" name="detail" placeholder="Chi tiết danh mục" list="cat-detail">
					      <datalist id="cat-detail">
					      	
					      </datalist>
					    </div>
					</td>
				</tr>
		    <!-- <td class="col-sm-2">
		            <div class="input-group">
		                <label class="input-group-btn">
		                    <span class="btn btn-primary">
		                        Upload hình ảnh<input type="file" style="display: none;" multiple>
		                    </span>
		                </label>
		                <input type="text" class="form-control" readonly>
		            </div>
		            </td>
		            <td class="col-sm-2"><a class="deleteRow"></a>
		            </td>
		        </tr> -->
		    </tbody>
		    <tfoot>
		        <tr>
		            <td colspan="1" style="text-align: left;">
		                <input style="display: none;" type="button" class="btn btn-lg" id="btn-crawl" value="Crawl" />
		            </td>
		        </tr>
		    </tfoot>
		</table>
	</div>
	<form id="crawl-result-form">
		<input type="hidden" name="name_category">
		<input type="hidden" name="code">
		<div id="crawl-result"></div>
	</form>
	<input type="button" class="btn btn-lg" id="btn-save-result" value="Save Result" style="display: none;" />
</div>
<script type="text/javascript">
    $('input[name=name]').on('input',function() {
	    var selectedOption = $('option[value="'+$(this).val()+'"]');
	    if(selectedOption.length>0){
	      $.ajax({
	        url:'<?=base_url()?>Crawl/crawl_domain_category/',
	        type:'post',
	        dataType:'json',
	        data:{
	          name_domain:selectedOption.attr('domain')
	        },
	        success:function(data){
	          if (data.category) {
	          	var list = document.getElementById('category-list');
	          	list.innerHTML = "";
	          	for (let [key, value] of Object.entries(data.category)) {
	          		var option = document.createElement('option');
					option.value = value['name'];
					option.setAttribute('href',value['href']);
					list.appendChild(option);
				}
				// console.log(category_list);
	          }
	          if(data.error){
	          	ssi_modal.notify('error', {content: data.error});
	          }
	        }
	      });
	    }
    // console.log(selectedOption.length ? selectedOption.attr('id') : 'This opiton is not in the list!');
    });
    $('input[name=category]').on('input',function() {
	    var selectedOption = $('option[value="'+$(this).val()+'"]');
	    if(selectedOption.length>0){
	      $.ajax({
	        url:'<?=base_url()?>Crawl/crawl_domain_category_detail/',
	        type:'post',
	        dataType:'json',
	        data:{
	          name_domain:selectedOption.attr('href')
	        },
	        success:function(data){
	          if (data.level_2) {
	          	var list = document.getElementById('cat-detail');
	          	list.innerHTML = "";
	          	for (let [key, value] of Object.entries(data.level_2['category'])) {
	          		var option = document.createElement('option');
					option.value = value['name'];
					option.setAttribute('href', value['href']);
					list.appendChild(option);
				}
				// console.log(category_list);
				$('#level-2-input').show();
				$('#crawl-result').html('');
				$('#btn-save-result').hide();
	          }
	          if(data.error){
	          	ssi_modal.notify('error', {content: data.error});
	          }
	          if (data.code) {
		        $('input[name=code]').val(data.code);
		      }
	          if (data.level_3) {
	          	var innerHTML = "<p>Tìm thấy "+data.level_3['crawl_list'].length+" kết quả ở trang đầu tiên.</p>";
	          	if (data.level_3['count_extra']) {
	          		innerHTML+= "<p>Và "+data.level_3['count_extra']+" kết quả mở rộng.</p>";
	          	}
	          	for (let [key, value] of Object.entries(data.level_3['crawl_list'])) {
	          		innerHTML+=('<input type="hidden" name="'+key+'" value="'+value['href']+'"><a target="_blank" href = "'+value['href']+'">'+value['name']+'</a></br>');
				}
				$('#crawl-result').html(innerHTML);
				$('#btn-save-result').show();
				$('#level-2-input').hide();
	          }
	          if (data.level_3_extra) {
	          	for (let [key, value] of Object.entries(data.level_3_extra['crawl_list_extra'])) {
	          		var innerHTML = "<p>Trang thứ "+(parseInt(key)+2)+" có "+value.length+" kết quả.</p>";
	          		var newobj = value;
	          		var page = key;
		          	for (let [k, v] of Object.entries(newobj)) {
		          		innerHTML+=('<input type="hidden" name="'+key+k+'" value="'+v['href']+'"><a target="_blank" href = "'+v['href']+'">'+v['name']+'</a></br>');
					}
					$('#crawl-result').append(innerHTML);
				}
	          }
	        }
	      });
	    }
    // console.log(selectedOption.length ? selectedOption.attr('id') : 'This opiton is not in the list!');
    });
    $('input[name=detail]').on('input',function() {
	    var selectedOption = $('option[value="'+$(this).val()+'"]');
	    $('input[name=name_category]').val($(this).val());
	    if(selectedOption.length>0){
	    	$.ajax({
		        url:'<?=base_url()?>Crawl/crawl_domain_category_content/',
		        type:'post',
		        dataType:'json',
		        data:{
		          name_domain:selectedOption.attr('href')
		        },
		        success:function(data){
		          if (data.code) {
		          	$('input[name=code]').val(data.code);
		          }
		          if (data.level_3) {
		          	var innerHTML = "<p>Tìm thấy "+data.level_3['crawl_list'].length+" kết quả ở trang đầu tiên.</p>";
		          	if (data.level_3['count_extra']) {
		          		innerHTML+= "<p>Và "+data.level_3['count_extra']+" kết quả mở rộng.</p>";
		          	}
		          	for (let [key, value] of Object.entries(data.level_3['crawl_list'])) {
		          		innerHTML+=('<input type="hidden" name="'+key+'" value="'+value['href']+'"><a target="_blank" href = "'+value['href']+'">'+value['name']+'</a></br>');
					}
					$('#crawl-result').html(innerHTML);
					$('#btn-save-result').show();
		          }
		          if (data.level_3_extra) {
		          	for (let [key, value] of Object.entries(data.level_3_extra['crawl_list_extra'])) {
		          		var innerHTML = "<p>Trang thứ "+(parseInt(key)+2)+" có "+value.length+" kết quả.</p>";
		          		var newobj = value;
		          		var page = key;
			          	for (let [k, v] of Object.entries(newobj)) {
			          		innerHTML+=('<input type="hidden" name="'+key+k+'" value="'+v['href']+'"><a target="_blank" href = "'+v['href']+'">'+v['name']+'</a></br>');
						}
						$('#crawl-result').append(innerHTML);
					}
		          }
		          if(data.error){
		          	ssi_modal.notify('error', {content: data.error});
		          	$('#btn-save-result').hide();
		          }
		        }
		    });	
	    }
    // console.log(selectedOption.length ? selectedOption.attr('id') : 'This opiton is not in the list!');
    });
    $('#btn-save-result').click(function(){
    	var route = '<?=base_url()?>crawl/save_crawl_link_result/';
	  	var frm = new FormData($('form#crawl-result-form')[0]);
	    $.ajax({
	      	url:route,
	      	processData: false, 
	      	contentType: false,
	      	type:'post',
	      	dataType:'json',
	      	data:frm,
	      	success:function(data){
	      		if(data.error){
		          	ssi_modal.notify('error', {content: data.error});
		        }
		        if(data.success){
		          	ssi_modal.notify('success', {content: data.success});
		        }
	      	}
	    });
    });
    $(document).ajaxStart(function(){
	    $('#loader-overlay').show();
	 }).ajaxStop(function(){
	    $('#loader-overlay').hide();
	 });
</script>