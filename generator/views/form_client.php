
<?php
if ($type_form == 'post') {

    echo form_open('client/add');
} else {

    echo form_open('client/update');
}
?>


<?php echo form_error('name_client'); ?>

<?php echo form_error('content_client'); ?>

<?php echo form_error('client_tumbh'); ?>

<table border="0">
    
    <tr>
        <td>id_client-if the primary key is auto_increment then delete this field </td>
        <td><input type="text" name="id_client" value="<?php if(isset ($isi['id_client'])){echo $isi['id_client'];}?>" /></td>
    </tr>
    
   
    <tr>
        <td>name_client</td>
        <td><input type="text" name="name_client" value="<?php if(isset ($isi['name_client'])){echo $isi['name_client'];}?>" /></td>
    </tr>
    
    <tr>
        <td>content_client</td>
        <td><input type="text" name="content_client" value="<?php if(isset ($isi['content_client'])){echo $isi['content_client'];}?>" /></td>
    </tr>
    
    <tr>
        <td>client_tumbh</td>
        <td><input type="text" name="client_tumbh" value="<?php if(isset ($isi['client_tumbh'])){echo $isi['client_tumbh'];}?>" /></td>
    </tr>
    
   
    <tr>
        <td></td>
        <td>
               <?php if ($type_form == 'post') { ?>
            <input type="submit" name="post" value="Submit" />
               <?php } else { ?>

             <?php if(isset ($isi['id_client'])){ echo form_hidden('id_client',$isi['id_client']);}?>

            <input type="submit" name="update" value="update" />       
            
                <?php } ?>

        </td>
    </tr>
</table>




</form>