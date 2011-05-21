
<?php
if ($type_form == 'post') {

    echo form_open('screenshot_portofolio/add');
} else {

    echo form_open('screenshot_portofolio/update');
}
?>


<?php echo form_error('title_screenshot'); ?>

<table border="0">
    
    <tr>
        <td>id_screenshot_portofolio-if the primary key is auto_increment then delete this field </td>
        <td><input type="text" name="id_screenshot_portofolio" value="<?php if(isset ($isi['id_screenshot_portofolio'])){echo $isi['id_screenshot_portofolio'];}?>" /></td>
    </tr>
    
    <tr>
        <td>id_portofolio-if the primary key is auto_increment then delete this field </td>
        <td><input type="text" name="id_portofolio" value="<?php if(isset ($isi['id_portofolio'])){echo $isi['id_portofolio'];}?>" /></td>
    </tr>
    
   
    <tr>
        <td>title_screenshot</td>
        <td><input type="text" name="title_screenshot" value="<?php if(isset ($isi['title_screenshot'])){echo $isi['title_screenshot'];}?>" /></td>
    </tr>
    
   
    <tr>
        <td></td>
        <td>
               <?php if ($type_form == 'post') { ?>
            <input type="submit" name="post" value="Submit" />
               <?php } else { ?>

             <?php if(isset ($isi['id_screenshot_portofolio'])){ echo form_hidden('id_screenshot_portofolio',$isi['id_screenshot_portofolio']);}?>

             <?php if(isset ($isi['id_portofolio'])){ echo form_hidden('id_portofolio',$isi['id_portofolio']);}?>

            <input type="submit" name="update" value="update" />       
            
                <?php } ?>

        </td>
    </tr>
</table>




</form>