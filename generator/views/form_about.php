
<?php
if ($type_form == 'post') {

    echo form_open('about/add');
} else {

    echo form_open('about/update');
}
?>


<?php echo form_error('title_about'); ?>

<?php echo form_error('content_about'); ?>

<table border="0">
    
    <tr>
        <td>idabout-if the primary key is auto_increment then delete this field </td>
        <td><input type="text" name="idabout" value="<?php if(isset ($isi['idabout'])){echo $isi['idabout'];}?>" /></td>
    </tr>
    
   
    <tr>
        <td>title_about</td>
        <td><input type="text" name="title_about" value="<?php if(isset ($isi['title_about'])){echo $isi['title_about'];}?>" /></td>
    </tr>
    
    <tr>
        <td>content_about</td>
        <td><input type="text" name="content_about" value="<?php if(isset ($isi['content_about'])){echo $isi['content_about'];}?>" /></td>
    </tr>
    
   
    <tr>
        <td></td>
        <td>
               <?php if ($type_form == 'post') { ?>
            <input type="submit" name="post" value="Submit" />
               <?php } else { ?>

             <?php if(isset ($isi['idabout'])){ echo form_hidden('idabout',$isi['idabout']);}?>

            <input type="submit" name="update" value="update" />       
            
                <?php } ?>

        </td>
    </tr>
</table>




</form>