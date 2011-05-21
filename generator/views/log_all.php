<?php echo anchor('log/add','add');?>
<br>
<?php echo anchor('front','back');?>
<?php echo form_open('log/delete');?>


<table border="1">


    <tr>
        
        <td>id_log</td>
       
        
        <td>time</td>
        
        <td>date</td>
        
        <td>name_log</td>
        
        <td>Action</td>

    </tr>
    <?php foreach ($logs as $log) { ?>

        <tr>
            <td><?php echo form_checkbox('id_log[]',$log['id_log']).$log['id_log']; ?></td>

             
            <td><?php echo $log['time']; ?></td>
           
            <td><?php echo $log['date']; ?></td>
           
            <td><?php echo $log['name_log']; ?></td>
           
            <td><a href="<?php echo site_url().'/log/form_update/'.$log['id_log'];?>" >Edit</a>
        </tr>
 
<?php } ?>
</table>
<?php echo $pagination; ?>
<br>
<input type="submit" value="delete" onclick="return confirm('are you sure ?');">

<?php echo form_close();?>