<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/dashboard.css'?> ">

    <title>Content List</title>
    <style>
        body {
            font-size: 14px;
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 20px;
        }
        .content-article {
            border: 1px solid #ddd;
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }
        .content-article:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }
        .content-title {
            font-size: 22px;
            font-weight: bold;
            color: #343a40;
            margin-bottom: 10px;
        }
        .content-meta {
            font-size: 14px;
            color: #6c757d;
            margin-bottom: 10px;
        }
        .content-meta span {
            margin-right: 15px;
        }
        .content-description {
            margin-top: 15px;
            margin-bottom: 15px;
        }
        .content-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .content-actions a {
            font-size: 14px;
        }
        .content-actions .btn {
            font-size: 14px;
        }
        .btn-dark {
            background-color: #343a40;
            border: none;
        }
        .alert-warning {
            font-size: 16px;
            font-weight: 600;
            color: #856404;
            background-color: #fff3cd;
            border-color: #ffeeba;
            padding: 15px;
        }
        .description-preview {
            display: -webkit-box;
            -webkit-line-clamp: 3; /* Limit to 3 lines */
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .read-more {
            color: #007bff;
            cursor: pointer;
            font-size: 14px;
            text-decoration: underline;
        }
    </style>
</head>

<body>
    
    <?php $this->load->view('asset/assetNavbar'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <?php $this->load->view('asset/DashSidebar'); ?>
            </div>
            <div class="col-md-10">
            <?php $this->load->view('asset/base'); ?>
                <div class="card-header d-flex justify-content-between">
                    <div><i class="fas fa-table me-1 m-1"></i>Manage your content</div>
                    <?php if ($this->session->userdata('desig_level') == 3): ?>
                        <div class="card  mb-1" style="background-color:#99bbff;">
                           <?php $office_id = $this->session->userdata('office_id');?>
                           <?php $content_count = $this->Manage_model->countContentByOffice($office_id);?>
                            <div class="card-body">Total content:
                                <b><?php echo $content_count;  ?> records</b>
                            </div> 
                        </div>
                    <?php endif;?> 
                    <?php if ($this->session->userdata('desig_level') == 4): ?>
                        <div class="card  mb-1" style="background-color:#99bbff;">
                           <?php $staff_id = $this->session->userdata('staff_id');?>
                           <?php $content_count = $this->Manage_model->countContentByStaff($staff_id);?>
                            <div class="card-body">Total content:
                                <b><?php echo $content_count;  ?> records</b>
                            </div> 
                        </div>
                    <?php endif;?>


                    
                </div>
                <pre><?php print_r($office_id); ?></pre>

                <div style="margin-left: 930px; margin-top: 10px;" ><a href="<?=base_url('Management/content_add_form/' . ($office_id ?? ''))?>" class="btn btn-primary btn-sm mb-1"> <b>+Add Digital Assets</b></a></div>
            
                <div class="card-body">
                    
                        <?php foreach ($contents as $content): ?>
                            <div class="content-article">
                                <div class="d-flex justify-content-between">
                                    
                                    <div class="content-title"> 
                                        <!-- <div><?php if (!empty($content->filename)) : ?> 
                                                <img src="<?php echo base_url('uploads/' . $content->filename); ?>" alt="" style="width: 125px; height: 125px;">
                                            <?php endif; ?>
                                        </div>  -->
                                        <div style="width: 125px; height: 125px;">
                                            <?php if (!empty($content->filename)) : ?> 
                                                <img src="<?php echo base_url('uploads/' . $content->filename); ?>" alt=""
                                                    style="width: 100%; height: 100%; object-fit: contain;">
                                            <?php endif; ?>
                                        </div>
                                    <h4><?php echo $content->content_title; ?> </h4>
                                    </div>
                                    <div class="p-1 m-1">
                                        <div class='row'><strong>ISBN:</strong> <?php echo !empty($content->ISBN) ? $content->ISBN : 'N/A'; ?></div>
                                        <div class='row'><strong>Genre:</strong> <?php echo !empty($content->genre) ? $content->genre : 'N/A'; ?></div>
                                    </div>
                                </div>
                                <span><strong>Publisher: </strong><a href="<?= base_url('Management/user_info/' . $content->staff_id); ?>"><?= htmlspecialchars($content->staff_name); ?></a></span>
                                <div class="content-meta">
                                
                                

                                    <span><strong>Content ID :</strong> <?php echo $content->content_id; ?></span>
                                    <span><strong>Category :</strong> <?php echo $content->categoryName; ?></span>
                                    <span><strong>Created At :</strong> <?php echo date("F j, Y, g:i a", strtotime($content->created_at)); ?></span>
                                    
                                </div>
                                <span><strong>Uploaded file:</strong> 
                                    <?php if (!empty($content->filename)) : ?>
                                        <a href="<?php echo base_url('uploads/' . $content->filename); ?>" target="_blank">
                                          <?php echo $content->filename; ?>
                                        </a>
                                    <?php else : ?>
                                        Not uploaded yet
                                    <?php endif; ?>
                                </span>
                                <div class="content-description">
                                    <strong>Description:</strong>
                                    <p class="description-preview" id="desc-<?php echo $content->content_id; ?>"><?php echo $content->content_description; ?></p>
                                    <span class="read-more" id="read-more-<?php echo $content->content_id; ?>" onclick="toggleDescription(<?php echo $content->content_id; ?>)">Read More</span>
                                </div>
                                
                                <?php if (!empty($content->num_of_pages)) : ?>
                                    <span><strong>Pages :</strong> <?php echo $content->num_of_pages; ?></span>
                                <?php endif; ?>
                                <div class="content-actions">
                                    <a href="<?php echo base_url().'uploads/'.$content->filename; ?>" class="btn btn-success btn-sm" download>
                                        <i class="fa fa-download"></i> Download
                                    </a>
                                    <a href="<?= base_url('Management/delete_content/'.$content->content_id) ?>" class="btn btn-dark btn-sm" onclick="return confirm('Are you sure you want to delete this content?');">
                                        <i class="fa fa-trash"></i> Delete
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                     
                </div>
            </div>
        </div>
    </div>
</div>

</body>

<script>
    function toggleDescription(contentId) {
        var description = document.getElementById('desc-' + contentId);
        var readMoreButton = document.getElementById('read-more-' + contentId);

        if (description.style.display === "-webkit-box") {
            description.style.display = "block";
            readMoreButton.innerText = "Read Less";
        } else {
            description.style.display = "-webkit-box";
            readMoreButton.innerText = "Read More";
        }
    }
</script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>

</html>
