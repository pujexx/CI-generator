<?php echo anchor('contact/add','add');?>
<br>
<?php echo anchor('front','back');?>
<?php echo form_open('contact/delete');?>


<table border="1">


    <tr>
        
        <td>id_contact</td>
       
        
        <td>title_contact</td>
        
        <td>content_contact</td>
        
        <td>Action</td>

    </tr>
    <?php foreach ($contacts as $contact) { ?>

        <tr>
            <td><?php echo form_checkbox('id_contact[]',$contact['id_contact']).$contact['id_contact']; ?></td>

             
            <td><?php echo $contact['title_contact']; ?></td>
           
            <td><?php echo $contact['content_contact']; ?></td>
           
            <td><a href="<?php echo site_url().'/contact/form_update/'.$contact['id_contact'];?>" >Edit</a>
        </tr>
 
<?php } ?>
</table>
<?php echo $pagination; ?>
<br>
<input type="submit" value="delete" onclick="return confirm('are you sure ?');">

<?php echo form_close();?>