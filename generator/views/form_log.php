
<?php
if ($type_form == 'post') {

    echo form_open('log/add');
} else {

    echo form_open('log/update');
}
?>


<?php echo form_error('time'); ?>

<?php echo form_error('date'); ?>

<?php echo form_error('name_log'); ?>

<table border="0">
    
    <tr>
        <td>id_log-if the primary key is auto_increment then delete this field </td>
        <td><input type="text" name="id_log" value="<?php if(isset ($isi['id_log'])){echo $isi['id_log'];}?>" /></td>
    </tr>
    
   
    <tr>
        <td>time</td>
        <td><input type="text" name="time" value="<?php if(isset ($isi['time'])){echo $isi['time'];}?>" /></td>
    </tr>
    
    <tr>
        <td>date</td>
        <td><input type="text" name="date" value="<?php if(isset ($isi['date'])){echo $isi['date'];}?>" /></td>
    </tr>
    
    <tr>
        <td>name_log</td>
        <td><input type="text" name="name_log" value="<?php if(isset ($isi['name_log'])){echo $isi['name_log'];}?>" /></td>
    </tr>
    
   
    <tr>
        <td></td>
        <td>
               <?php if ($type_form == 'post') { ?>
            <input type="submit" name="post" value="Submit" />
               <?php } else { ?>

             <?php if(isset ($isi['id_log'])){ echo form_hidden('id_log',$isi['id_log']);}?>

            <input type="submit" name="update" value="update" />       
            
                <?php } ?>

        </td>
    </tr>
</table>




</form>