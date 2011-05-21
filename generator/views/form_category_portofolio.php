
<?php
if ($type_form == 'post') {

    echo form_open('category_portofolio/add');
} else {

    echo form_open('category_portofolio/update');
}
?>


<?php echo form_error('title_category_portofolio'); ?>

<table border="0">
    
    <tr>
        <td>id_category_portofolio-if the primary key is auto_increment then delete this field </td>
        <td><input type="text" name="id_category_portofolio" value="<?php if(isset ($isi['id_category_portofolio'])){echo $isi['id_category_portofolio'];}?>" /></td>
    </tr>
    
   
    <tr>
        <td>title_category_portofolio</td>
        <td><input type="text" name="title_category_portofolio" value="<?php if(isset ($isi['title_category_portofolio'])){echo $isi['title_category_portofolio'];}?>" /></td>
    </tr>
    
   
    <tr>
        <td></td>
        <td>
               <?php if ($type_form == 'post') { ?>
            <input type="submit" name="post" value="Submit" />
               <?php } else { ?>

             <?php if(isset ($isi['id_category_portofolio'])){ echo form_hidden('id_category_portofolio',$isi['id_category_portofolio']);}?>

            <input type="submit" name="update" value="update" />       
            
                <?php } ?>

        </td>
    </tr>
</table>




</form>