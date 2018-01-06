
<div class="mednow-appointment-route-content">
	<div id="mednow">
		
		<div class="page-header">
			<div class="row">
		      <div class="col-md-12">
		        <div class="box">
		          <div class="box-header with-boder">
		            <h3 class="box-title">Lọc kết quả</h3>
		          </div>
		          <div class="animate">
		            <div class="box-body no-padding-bottom" >
		              <form method="post" action="<?php echo base_url() ?>locChiSo" id="filter-form">
		              	<input name="<?php echo $csrf['name'] ?>" type="hidden" value="<?php echo $csrf['hash'] ?>" />  
		                <div class="row">
		                	<div class="col-sm-3">
			                    <div class="form-group">
			                      <label>Chỉ số</label>
			                      <select class="form-control" name="loai_chiso" required="">
			                      	<option value="">Chọn chỉ số xét nghiệm</option>
			                      	<?php foreach ($chiso as $chi): ?>
			                      		<?php if (isset($id_chiso) && $id_chiso == $chi['id']) { ?>
			                      			<option required value="<?php echo $chi['id']?>"><?php echo $chi['ten_chiso'] ?></option>
			                      		<?php } else { ?>
			                      			<option value="<?php echo $chi['id']?>"><?php echo $chi['ten_chiso'] ?></option>
			                      		<?php }?>
			                      	<?php endforeach ?>
			                      </select>
			                    </div>
			                </div>
		                  	<div class="col-sm-3">
		                    	<div class="form-group">
		                      		<label>Từ ngày</label>
		                      		<?php if (isset($start)) {
		                        		echo '<input type="date" name="from" class="form-control" value="'.$start.'">';
		                      		} else{
		                        		echo '<input type="date" name="from" class="form-control" id="date-from-picker">';
		                      		} ?>
		                    	</div>
		                  	</div>
			                <div class="col-sm-3">
			                    <div class="form-group">
			                      <label>Đến ngày</label>
			                      <?php if (isset($end)) {
			                        echo '<input type="date" name="to" class="form-control" value="'.$end.'">';
			                      } else{
			                        echo '<input type="date" name="to" class="form-control" id="date-to-picker">';
			                      } ?>
			                    </div>
			                </div>
			                <div class="col-sm-3">
		                		<button class=" btn btn-warning btn_quick_filter" id="btn-filter" style="margin-top: 30px"><i class="fa fa-search"></i> Lọc kết quả</button>
			                </div>
		                </div>
		              </form>
		            </div>
		          </div>
		        </div>
		      </div>  
		    </div>
		</div>
		<h2 class="aliments-header">Các chỉ số khám bệnh cơ bản:</h2>
		<?php foreach ($chiso as $cs): ?>
			<?php if (isset($data[$cs['id']-1])): ?>
			<div class="row" >
			  <div class="modal-body" style="margin-top: 20px">
			    <div class="container-fluid">
			       <div id="chart_<?php echo $cs['id'] ?>" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
			    </div>
			  </div>
			</div>
			<?php endif ?>
		<?php endforeach ?>
    		
		
	</div>
</div>
<script type="text/javascript">
	var date = new Date(), y = date.getFullYear(), m = date.getMonth();
	var fd = new Date(y, m, 2);
	var ld = new Date(y, m + 1, 1);
	if ($('#date-from-picker').length >0 && $('#date-to-picker').length >0) {
	    document.querySelector("#date-from-picker").valueAsDate = fd;
	    document.querySelector("#date-to-picker").valueAsDate = ld;
	}
	<?php foreach ($chiso as $ss): ?>
		<?php if (isset($data[$ss['id']-1])): ?>
			Highcharts.chart('chart_<?php echo $ss['id'] ?>', {
		      chart: {
		            type: 'spline'
		        },
		        title: {
		            text: 'Chỉ số sức khỏe',
		        },

		        plotOptions: {
		            areaspline: {
		                fillOpacity: 0.5
		            }
		        },
		        xAxis: {
		            categories: <?php echo $ngay[$ss['id']-1] ?>
		        },
		        yAxis: {
		            title: {
		                text: '<?php echo $ss['ten_chiso'] ?>'
		            },
		            plotLines: [{
		                value: 0,
		                width: 2,
		                zIndex: 2,
		                label:{text:'0'},
		                color: '#808080'
		            }]
		        },
		        tooltip: {
		            
		            valueSuffix: '<?php echo $ss['don_vi'] ?>',
		            crosshairs: true,
		            shared: true
		        },
		        legend: {
		            layout: 'vertical',
		            align: 'right',
		            verticalAlign: 'middle',
		            borderWidth: 0,
		        },
		        
		        series: [{
		            name: '<?php echo $ss['ten_chiso'] ?>',
		            data: <?php echo $data[$ss['id']-1] ?>
		        }],
		    });
		<?php endif ?>
	<?php endforeach ?>
		
	
	
</script>
