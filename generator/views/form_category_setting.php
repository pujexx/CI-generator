
<?php
if ($type_form == 'post') {

    echo form_open('category_setting/add');
} else {

    echo form_open('category_setting/update');
}
?>


<?php echo form_error('title_category_setting'); ?>

<table border="0">
    
    <tr>
        <td>id_category_setting-if the primary key is auto_increment then delete this field </td>
        <td><input type="text" name="id_category_setting" value="<?php if(isset ($isi['id_category_setting'])){echo $isi['id_category_setting'];}?>" /></td>
    </tr>
    
   
    <tr>
        <td>title_category_setting</td>
        <td><input type="text" name="title_category_setting" value="<?php if(isset ($isi['title_category_setting'])){echo $isi['title_category_setting'];}?>" /></td>
    </tr>
    
   
    <tr>
        <td></td>
        <td>
               <?php if ($type_form == 'post') { ?>
            <input type="submit" name="post" value="Submit" />
               <?php } else { ?>

             <?php if(isset ($isi['id_category_setting'])){ echo form_hidden('id_category_setting',$isi['id_category_setting']);}?>

            <input type="submit" name="update" value="update" />       
            
                <?php } ?>

        </td>
    </tr>
</table>




</form>