<?php
	function show_cate($parent_id = 0 , $text = "" ){
		global $conn;
		$query = "SELECT * FROM demotittle WHERE parent_id = $parent_id";
		$cateresult = mysqli_query($conn, $query);
		while ($category = mysqli_fetch_array($cateresult, MYSQLI_ASSOC)){
			echo '<option value = '.$category['id'].'>'.$text.$category['name'].'<option>';
			show_cate($category['id'], $text."-");
		}
		
	}
	function creSelect($name){
		echo '<select value = "'.$name.'" >';
		echo '<option value = 0>thẻ cha</option>';
		show_cate();
		echo '</select>';
	}
  ?>