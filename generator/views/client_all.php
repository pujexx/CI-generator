<?php echo anchor('client/add','add');?>
<br>
<?php echo anchor('front','back');?>
<?php echo form_open('client/delete');?>


<table border="1">


    <tr>
        
        <td>id_client</td>
       
        
        <td>name_client</td>
        
        <td>content_client</td>
        
        <td>client_tumbh</td>
        
        <td>Action</td>

    </tr>
    <?php foreach ($clients as $client) { ?>

        <tr>
            <td><?php echo form_checkbox('id_client[]',$client['id_client']).$client['id_client']; ?></td>

             
            <td><?php echo $client['name_client']; ?></td>
           
            <td><?php echo $client['content_client']; ?></td>
           
            <td><?php echo $client['client_tumbh']; ?></td>
           
            <td><a href="<?php echo site_url().'/client/form_update/'.$client['id_client'];?>" >Edit</a>
        </tr>
 
<?php } ?>
</table>
<?php echo $pagination; ?>
<br>
<input type="submit" value="delete" onclick="return confirm('are you sure ?');">

<?php echo form_close();?>