<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Organization Details</h2>
    <p><strong>Organization ID:</strong> <?php echo $org_id; ?></p>
    <p><strong>Admin Name:</strong> <?php echo $admin_data['staff_name']; ?></p>
    <p><strong>Admin ID:</strong> <?php echo $admin_id; ?></p>
    <p><strong>Admin ID:</strong> <?php echo $data; ?></p>

</body>
<table class='table table-striped ' id='search-data-table'>
                            <tr style="font-weight:bold;">
                                <td>OrgID</td>
                                <td>OrgName</td>
                                <td>OrgAdmin</td>
                                <td>OrgType</td>
                                <td>OrgLevel</td>
                                <td>created_at</td>
                                <td>Orglocation</td>
                            </tr>

                            <!-- Assuming $org_data is a single organization entry, not a list -->
                             <?php foreach ($org_data as $row):?>
                            <tr>
                                <td><?php echo $row['org_id']; ?></td>
                                <td><?php echo $row['org_name']; ?></td>
                                <!-- <td><?php echo $admin_data['staff_name']; ?></td> -->
                                <td><?php echo $row['org_type']; ?></td>
                                <td><?php echo $row['org_level']; ?></td>
                                <td><?php echo $row['created_at']; ?></td>
                                <td><?php echo $row['org_location']; ?></td>
                            </tr>
                            <?php endforeach ;?>
                            <?php foreach ($admin_data as $row):?>
                            <tr>
                             
                                <td><?php echo $row['staff_name']; ?></td>
                                
                            </tr>
                            <?php endforeach ;?>
                        </table>
</html>