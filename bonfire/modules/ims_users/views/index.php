<div>
	<h1 class="page-header">IMS Users</h1>
</div>

<br />

<?php if (isset($records) && is_array($records) && count($records)) : ?>
				
	<table class="table table-striped table-bordered">
		<thead>
		
			
		<th>Institute Id</th>
		<th>Type</th>
		<th>User Id</th>
		<th>In Type Id</th>
		<th>Ims User Created By</th>
		<th>Ims User Created On</th>
		<th>Remarks</th>
		<th>Status</th>
		
		</thead>
		<tbody>
		
		<?php foreach ($records as $record) : ?>
			<?php $record = (array)$record;?>
			<tr>
			<?php foreach($record as $field => $value) : ?>
				
				<?php if ($field != 'id') : ?>
					<td><?php echo ($field == 'deleted') ? (($value > 0) ? lang('ims_users_true') : lang('ims_users_false')) : $value; ?></td>
				<?php endif; ?>
				
			<?php endforeach; ?>

			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
<?php endif; ?>