<?php 
	require_once(ROOT_PATH. 'admin/view/header/User_Detail_header.php');
 ?>
	<div class="header">
		<p style="display: inline;">xin chao <?php if(isset($admin_name)) echo $admin_name;?></p>
		<a href="admin.php?c=admin&a=logout">Logout</a>
	</div>
 	<table cellspacing="5" cellpadding="10" border="1">
		<tr>
			<th>Id</th>
			<th>Ten</th>
			<th>Tuoi</th>
			<th>Lop</th>
		</tr>
		<?php
			foreach ($SV as $key => $value) {
				echo '<tr>';
				echo '<td>'.$value['id'].'</td>';
				echo '<td>';
				echo '<a href = "admin.php?c=user&a=detail&id='.$value['id'].' ">'.$value['Ten'].'</a>';
				echo '</td>';
				echo '<td>'.$value['Tuoi'].'</td>';
				echo '<td>'.$value['Lop'].'</td>';
				echo '</tr>';
			}
		?>
	</table>
<?php 
	require_once(ROOT_PATH. 'admin/view/footer/User_Detail_footer.php')
 ?>