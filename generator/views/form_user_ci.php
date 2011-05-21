
<?php
if ($type_form == 'post') {

    echo form_open('user_ci/add');
} else {

    echo form_open('user_ci/update');
}
?>


<?php echo form_error('username'); ?>

<?php echo form_error('password'); ?>

<?php echo form_error('email'); ?>

<?php echo form_error('level'); ?>

<?php echo form_error('status'); ?>

<table border="0">
    
    <tr>
        <td>id-if the primary key is auto_increment then delete this field </td>
        <td><input type="text" name="id" value="<?php if(isset ($isi['id'])){echo $isi['id'];}?>" /></td>
    </tr>
    
   
    <tr>
        <td>username</td>
        <td><input type="text" name="username" value="<?php if(isset ($isi['username'])){echo $isi['username'];}?>" /></td>
    </tr>
    
    <tr>
        <td>password</td>
        <td><input type="text" name="password" value="<?php if(isset ($isi['password'])){echo $isi['password'];}?>" /></td>
    </tr>
    
    <tr>
        <td>email</td>
        <td><input type="text" name="email" value="<?php if(isset ($isi['email'])){echo $isi['email'];}?>" /></td>
    </tr>
    
    <tr>
        <td>level</td>
        <td><input type="text" name="level" value="<?php if(isset ($isi['level'])){echo $isi['level'];}?>" /></td>
    </tr>
    
    <tr>
        <td>status</td>
        <td><input type="text" name="status" value="<?php if(isset ($isi['status'])){echo $isi['status'];}?>" /></td>
    </tr>
    
   
    <tr>
        <td></td>
        <td>
               <?php if ($type_form == 'post') { ?>
            <input type="submit" name="post" value="Submit" />
               <?php } else { ?>

             <?php if(isset ($isi['id'])){ echo form_hidden('id',$isi['id']);}?>

            <input type="submit" name="update" value="update" />       
            
                <?php } ?>

        </td>
    </tr>
</table>




</form>