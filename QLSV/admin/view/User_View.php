<?php 
	require_once (ROOT_PATH.'admin/view/header/User_header.php');
 ?>
 <div class="header">
		<p style="display: inline;">xin chao <?php if(isset($admin_name)) echo $admin_name;?></p>
		<a href="admin.php?c=admin&a=logout">Logout</a>
	</div>
	<form action ="admin.php?c=user&a=search" method="POST">
		<input type="text" name="search">
		<input type="submit" name="submit" value="search">
	</form>
	<table cellspacing="5" cellpadding="10" border="1">
		<tr>
			<th>Id</th>
			<th>Ten</th>
			<th>Tuoi</th>
			<th>Lop</th>
			<th>Sua</th>
			<th>Xoa</th>
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
				echo '<td>';
				echo '<a href = "admin.php?c=user&a=update&id='.$value['id'].'">Sua</a>';
				echo '</td>';
				echo '<td>';
				echo '<a onclick="return confirm('."'ban co muon xoa'".')"  
						 href = "admin.php?c=user&a=delete&id='.$value['id'].'"
					  >Delete</a>';
				echo '</td>';
				echo '</tr>';	
			}
		?>
	</table>
	<a href="admin.php?c=user&a=insert">Insert</a>
 <?php 
	require_once (ROOT_PATH.'admin/view/footer/User_footer.php');
 ?>