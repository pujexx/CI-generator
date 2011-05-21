
<?php
if ($type_form == 'post') {

    echo form_open('contact/add');
} else {

    echo form_open('contact/update');
}
?>


<?php echo form_error('title_contact'); ?>

<?php echo form_error('content_contact'); ?>

<table border="0">
    
    <tr>
        <td>id_contact-if the primary key is auto_increment then delete this field </td>
        <td><input type="text" name="id_contact" value="<?php if(isset ($isi['id_contact'])){echo $isi['id_contact'];}?>" /></td>
    </tr>
    
   
    <tr>
        <td>title_contact</td>
        <td><input type="text" name="title_contact" value="<?php if(isset ($isi['title_contact'])){echo $isi['title_contact'];}?>" /></td>
    </tr>
    
    <tr>
        <td>content_contact</td>
        <td><input type="text" name="content_contact" value="<?php if(isset ($isi['content_contact'])){echo $isi['content_contact'];}?>" /></td>
    </tr>
    
   
    <tr>
        <td></td>
        <td>
               <?php if ($type_form == 'post') { ?>
            <input type="submit" name="post" value="Submit" />
               <?php } else { ?>

             <?php if(isset ($isi['id_contact'])){ echo form_hidden('id_contact',$isi['id_contact']);}?>

            <input type="submit" name="update" value="update" />       
            
                <?php } ?>

        </td>
    </tr>
</table>




</form>