
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
					      <input id="domain-name" type="text" class="form-control" name="name" placeholder="Tên domain" list="from-domain">
					      <datalist id="from-domain">
					      	<option domain="https://www.nhathuocankhang.com/thuoc" value="Nhà thuốc An Khang"></option>
					      </datalist>
					    </div>
		            </td>
		        </tr>
		        <tr>
		        	<td class="col-sm-12">
		                <div class="input-group col-sm-9">
					      <span class="input-group-addon"><i class="	glyphicon glyphicon-link"></i></span>
					      <input id="product.link" type="text" class="form-control" name="product.link" placeholder="Danh mục" list="category-list">
					      <datalist id="category-list">
					      	
					      </datalist>
					    </div>
		            </td>
		        </tr>
		        <tr>   
		            <td class="col-sm-12">
		                <div class="input-group col-sm-9">
					      <span class="input-group-addon"><i class="glyphicon glyphicon-plus"></i></span>
					      <input id="product.quantity" type="text" class="form-control" name="product.quantity" placeholder="Chi tiết danh mục" list="cat-detail">
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
		                <input type="button" class="btn btn-lg btn-block" id="btn-crawl" value="Crawl" />
		            </td>
		        </tr>
		    </tfoot>
		</table>
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
	          console.log(data);
	        }
	      });
	    }
    // console.log(selectedOption.length ? selectedOption.attr('id') : 'This opiton is not in the list!');
    });
</script>