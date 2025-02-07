<div style="display: flex; justify-content: flex-end; gap: 5px; font-size: 18px; font-weight: bold;">
    
    <span>Heading 2</span> /
    <span>Heading 3</span> /
    <span>Heading 4</span>
    <h5 class='' style ='margin-left:920px;'> <?php foreach ($companies as $row): ?>
                            <b><?php echo $row['org_name']; ?></b>
                        <?php endforeach; ?>
                    </h5>
</div>