<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>View List</h3>
    <?php if ($this->session->flashdata('msg')):?>
        <p><?php echo $this->session->flashdata('msg'); ?></p>
    <?php endif;?>
          
    <?php foreach ($items as $row): ?>
            <tr>
                <span><?php echo $row['Id']; ?></span>
                <span><?php echo $row['name']; ?></span>
                <span><?php echo $row['email']; ?></span>
                <!-- Print more table data if needed -->
            </tr><br>
    <?php endforeach; ?>
          
    </body>
</html>