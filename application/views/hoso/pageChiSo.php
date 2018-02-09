<div data-ng-view="" class="content-hs">
	<div id="mednow">
		<div class="page-header" style="margin-left: -30px">
        <div class="pull-left" style="padding-top: 10px"><span>Nhập dữ liệu hồ sơ bệnh án</span></div>
    </div>

		<table class="table table-hover table-bordered" id="table" cellspacing="0" width="100%">
			<thead>
				<th></th>
				<th>Tên Chỉ số</th>
				<th>Giá trị</th>
        		<th>Đơn vị tính</th>
				<th>Ngày nhập</th>
				<th>Ngày cập nhập</th>
			</thead>
			<tbody>
				<?php foreach ($chiso as $cs) { ?>
				<tr>
					<td></td>
					<td><?php echo $cs['name'] ?></td>
					<td><?php echo $cs['value'] ?></td>
          			<td><?php echo $cs['unit'] ?></td>
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