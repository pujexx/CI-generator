
<?php
if ($type_form == 'post') {

    echo form_open('portofolio/add');
} else {

    echo form_open('portofolio/update');
}
?>


<?php echo form_error('title_portofolio'); ?>

<?php echo form_error('content_portofolio'); ?>

<?php echo form_error('pict_tumbh'); ?>

<table border="0">
    
    <tr>
        <td>id_portofolio-if the primary key is auto_increment then delete this field </td>
        <td><input type="text" name="id_portofolio" value="<?php if(isset ($isi['id_portofolio'])){echo $isi['id_portofolio'];}?>" /></td>
    </tr>
    
    <tr>
        <td>id_category_portofolio-if the primary key is auto_increment then delete this field </td>
        <td><input type="text" name="id_category_portofolio" value="<?php if(isset ($isi['id_category_portofolio'])){echo $isi['id_category_portofolio'];}?>" /></td>
    </tr>
    
   
    <tr>
        <td>title_portofolio</td>
        <td><input type="text" name="title_portofolio" value="<?php if(isset ($isi['title_portofolio'])){echo $isi['title_portofolio'];}?>" /></td>
    </tr>
    
    <tr>
        <td>content_portofolio</td>
        <td><input type="text" name="content_portofolio" value="<?php if(isset ($isi['content_portofolio'])){echo $isi['content_portofolio'];}?>" /></td>
    </tr>
    
    <tr>
        <td>pict_tumbh</td>
        <td><input type="text" name="pict_tumbh" value="<?php if(isset ($isi['pict_tumbh'])){echo $isi['pict_tumbh'];}?>" /></td>
    </tr>
    
   
    <tr>
        <td></td>
        <td>
               <?php if ($type_form == 'post') { ?>
            <input type="submit" name="post" value="Submit" />
               <?php } else { ?>

             <?php if(isset ($isi['id_portofolio'])){ echo form_hidden('id_portofolio',$isi['id_portofolio']);}?>

             <?php if(isset ($isi['id_category_portofolio'])){ echo form_hidden('id_category_portofolio',$isi['id_category_portofolio']);}?>

            <input type="submit" name="update" value="update" />       
            
                <?php } ?>

        </td>
    </tr>
</table>




</form>