
 
<?php 
 echo validation_errors('<div class="alert alert-danger alert-dismissible">', '</div>'); 
buka_form('','','');
buat_textbox('Username','username', $username,'4',"text","required");
buat_textbox('Nama','nama',$nama,'10', "text","required");
buat_textbox('Password','password', '','10', "password","required");
 
?>

<div class="form-group" id="password">
			<label for="password" class="col-sm-2 control-label">Level Akses</label>
			<div class="col-sm-8">
			  <select name="level" class="form-control" required>
				<option>--Level Akses--</option>
				<option value="admin">Administrator</option>
				<option value="user">User</option>
			  </select>
			</div>
		 </div>

<?php 
 
tutup_form('','kirim'); 




 