<div data-ng-view="" class="mednow-appointment-route-content">
	<div id="mednow">
		<!-- <a class="back btn btn-link hidden-md hidden-lg" ng-class="{'hidden-md':loggedIn, 'hidden-lg':loggedIn }" data-ng-href="" analytics-on="" analytics-category="Link" analytics-label="/mednow" analytics-value=" Back">
		<i class="fa fa-angle-left"></i> Back</a> -->
		<div class="page-header">
			<div class="">
				<h3>Chỉ số xét nghiệm bệnh án</h3>
			</div>
			
			
		</div>

		<table class="table table-hover table-bordered" id="table">
			<thead>
				<th>Tên Chỉ số</th>
				<th>Giá trị</th>
        <th>Đơn vị tính</th>
				<th>Ngày nhập</th>
				<th>Ngày cập nhập</th>
				
			</thead>
			<tbody>
				<?php foreach ($chiso as $cs) { ?>
				<tr>
					<td><?php echo $cs['ten_data'] ?></td>
					<td><?php echo $cs['dulieu'] ?></td>
          <td><?php echo $cs['don_vi'] ?></td>
					<td><?php echo date('d-m-Y',strtotime($cs['created_at'])) ?></td>
					<td><?php echo date('d-m-Y',strtotime($cs['updated_at'])) ?></td>
				
				</tr>
				<?php } ?>
			</tbody>
		</table>
		
	</div>


</div>
<script type="text/javascript">
  $('#table').DataTable();
</script>