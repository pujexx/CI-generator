<?php echo anchor('about/add','add');?>
<br>
<?php echo anchor('front','back');?>
<?php echo form_open('about/delete');?>


<table border="1">


    <tr>
        
        <td>idabout</td>
       
        
        <td>title_about</td>
        
        <td>content_about</td>
        
        <td>Action</td>

    </tr>
    <?php foreach ($abouts as $about) { ?>

        <tr>
            <td><?php echo form_checkbox('idabout[]',$about['idabout']).$about['idabout']; ?></td>

             
            <td><?php echo $about['title_about']; ?></td>
           
            <td><?php echo $about['content_about']; ?></td>
           
            <td><a href="<?php echo site_url().'/about/form_update/'.$about['idabout'];?>" >Edit</a>
        </tr>
 
<?php } ?>
</table>
<?php echo $pagination; ?>
<br>
<input type="submit" value="delete" onclick="return confirm('are you sure ?');">

<?php echo form_close();?>