<!-- Views files -->
<?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success">
        <?= $this->session->flashdata('success'); ?>
    </div>
<?php endif; ?>

<?php if ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger">
    <p><?php echo $this->session->flashdata('error'); ?></p>
    </div>
<?php endif; ?>



<!-- controller -->
$this->session->set_flashdata('error', validation_errors());
 <!-- or -->
$this->session->set_flashdata('success', 'Data inserted successfully');
 
redirect('controller_name/addRoom');
