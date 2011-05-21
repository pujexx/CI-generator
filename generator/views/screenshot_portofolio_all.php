<?php echo anchor('screenshot_portofolio/add','add');?>
<br>
<?php echo anchor('front','back');?>
<?php echo form_open('screenshot_portofolio/delete');?>


<table border="1">


    <tr>
        
        <td>id_screenshot_portofolio</td>
       
        
        <td>title_screenshot</td>
        
        <td>Action</td>

    </tr>
    <?php foreach ($screenshot_portofolios as $screenshot_portofolio) { ?>

        <tr>
            <td><?php echo form_checkbox('id_screenshot_portofolio[]',$screenshot_portofolio['id_screenshot_portofolio']).$screenshot_portofolio['id_screenshot_portofolio']; ?></td>

             
            <td><?php echo $screenshot_portofolio['title_screenshot']; ?></td>
           
            <td><a href="<?php echo site_url().'/screenshot_portofolio/form_update/'.$screenshot_portofolio['id_screenshot_portofolio'];?>" >Edit</a>
        </tr>
 
        <td>id_portofolio</td>
       
        
        <td>title_screenshot</td>
        
        <td>Action</td>

    </tr>
    <?php foreach ($screenshot_portofolios as $screenshot_portofolio) { ?>

        <tr>
            <td><?php echo form_checkbox('id_portofolio[]',$screenshot_portofolio['id_portofolio']).$screenshot_portofolio['id_portofolio']; ?></td>

             
            <td><?php echo $screenshot_portofolio['title_screenshot']; ?></td>
           
            <td><a href="<?php echo site_url().'/screenshot_portofolio/form_update/'.$screenshot_portofolio['id_portofolio'];?>" >Edit</a>
        </tr>
 
<?php } ?>
</table>
<?php echo $pagination; ?>
<br>
<input type="submit" value="delete" onclick="return confirm('are you sure ?');">

<?php echo form_close();?>