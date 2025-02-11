<div style="display: flex; justify-content: flex-end; gap: 10px; font-size: 18px; font-weight: bold; align-items: center;">
    <span>
        <?php if ($this->session->userdata('org_name')): ?>
            <p style="margin: 0;"><?php echo $this->session->userdata('org_name'); ?></p>
        <?php endif; ?>
    </span> 
    <?php if ($this->session->userdata('org_name') && $this->session->userdata('office_name')): ?>
        <span>/</span>
    <?php endif; ?>
    <span>
        <?php if ($this->session->userdata('office_name')): ?>
            <p style="margin: 0;"><?php echo $this->session->userdata('office_name'); ?></p>
        <?php endif; ?>
    </span>
</div>
