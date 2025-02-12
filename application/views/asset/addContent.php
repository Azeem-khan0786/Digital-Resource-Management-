<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Content List</title>
    <style>
    input.form-control {
        background-color: #dbdbdb;
    }


    body {
        font-size: 12px;
    }
    body {
        font-family: Arial, sans-serif;
        margin: 50px;
    }

    .form-container {
        width: 100%;
        max-width: 500px;
        margin: auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 10px;
        background-color: #f9f9f9; 
    }

    label {
        font-weight: bold;
    }

    input[type="file"],
    select {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
    }

    button {
        background-color: #28a745;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    button:hover {
        background-color: #218838;
    }

    .hidden {
        display: none;
    }

    .error-message {
        color: red;
        font-weight: bold;
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
                <h4 class="text-center "><b>Add Digital Resources</b></h4>
                <?php if ($this->session->flashdata('success')): ?>
                    <div class="alert alert-success">
                        <?= $this->session->flashdata('success'); ?>
                    </div>
                    <?php endif; ?>

                    <?php if ($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger">
                        <?= $this->session->flashdata('error'); ?>
                    </div>
                    <?php endif; ?>
                <?php if ($this->session->flashdata('message')): ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <p><?php echo $this->session->flashdata('message'); ?></p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php endif; ?>
                <form method="post" action='<?php echo base_url('Management/content_add_form');?>'
                    enctype="multipart/form-data" style="   margin:0px;">
                    <div class="form-row" style = width:1580px;>
                        <div class="form-group m-3 col-md-4">
                            <label for="title">Content Title</label>
                            <input type="text" class="form-control" name='content_title' id="" placeholder="Add Title">
                        </div>
                        <div class="form-group m-3 col-md-4">
                                <label for="category_type">CategoryName</label><br>
                                <select name="categoryId" id="category_type" onchange="showOptions()" required
                                    class="form-control" style='background-color: #dbdbdb;'>

                                    <?php foreach($category as $cata):?>
                                    <option value="<?php echo $cata['categoryId']; ?>">
                                        <?php echo $cata['categoryName'];?>
                                    </option>
                                    <?php endforeach;?>
                                </select>
                        </div>
                    </div>
                    <!-- PDF Type Dropdown (Hidden by default) -->
                    <div id="pdf_options" class="hidden form-group m-1 col-md-4">
                        <label for="pdf_type">Type of pdf files:</label>
                        <select name="pdf_type" id="pdf_type" onchange="validateFileType()">
                            <option value="">Select pdf Type</option>
                            <option value="tutorial">Tutorial</option>
                            <option value="promotional">Promotional</option>
                            <option value="educational">Educational</option>
                            <option value="entertainment">Entertainment</option>
                        </select>
                    </div>
                    <!-- Video Type Dropdown (Hidden by default) -->
                    <div id="video_options" class="hidden form-group m-3 col-md-4">
                        <label for="video_type">Type of Video:</label>
                        <select name="video_type" id="video_type" onchange="validateFileType()">
                            <option value="">Select Video Type</option>
                            <option value="tutorial">Tutorial</option>
                            <option value="promotional">Promotional</option>
                            <option value="educational">Educational</option>
                            <option value="entertainment">Entertainment</option>
                        </select>
                    </div>

                    <!-- APK Type Dropdown (Hidden by default) -->
                    <div id="apk_options" class="hidden form-group m-3 col-md-4">
                        <label for="apk_type">Type of APK:</label>
                        <select name="apk_type" id="apk_type" onchange="validateFileType()">
                            <option value="">Select APK Type</option>
                            <option value="game">Game</option>
                            <option value="utility">Utility</option>
                            <option value="social">Social</option>
                            <option value="productivity">Productivity</option>
                            <option value="lifestyle">Lifestyle</option>
                        </select>
                    </div>

                    <!-- Image Type Dropdown (Hidden by default) -->
                    <div id="image_options" class="hidden form-group m-3 col-md-4">
                        <label for="image_type">Type of Image:</label>
                        <select name="image_type" id="image_type" onchange="validateFileType()">
                            <option value="">Select Image Type</option>
                            <option value="png">PNG</option>
                            <option value="jpg">JPG</option>
                            <option value="jpeg">JPEG</option>
                            <option value="gif">GIF</option>
                        </select>
                    </div>
            <!-- Book Type Dropdown and Additional Fields (Hidden by default) -->
                <div id="book_options" class="hidden form-group   m-1">
                    <h3 class ='text-center'>Book Details</h3>
                    <div class="row p-1">
                            <div class="col-md-6">
                                    <label for="book_type">Book Type:</label>
                                    <input type="text" name="book_type" id="book_type" class="form-control" placeholder="Enter Book Type">
                            </div>
                            
                            <div class="col-md-6">
                                    <label for="book_isbn">ISBN:</label>
                                    <input type="text" name="ISBN" id="book_isbn" class="form-control" placeholder="Enter ISBN">
                            </div>
                    </div>
                    
                    
                    <div class="row p-1">
                            <div class="col-md-6">
                                <label for="book_pages">Number of Pages:</label>
                                <input type="number" name="num_of_pages" id="book_pages" class="form-control" placeholder="Enter Page Count">
                            </div>
                            <div class="col-md-6">
                                <label for="book_genre">Genre:</label>
                                <input type="text" name="genre" id="book_genre" class="form-control" placeholder="Enter Genre">
                            </div>
                    </div>
                </div>    
            
         <!--   Additional Fields Phone &  laptop box -->
         <div id="electronics_options" class="hidden form-group   m-1">
                <div class="row">
                        <!-- Left Side -->
                        <div class="col-md-6">
                            <div class="form-group m-3">
                                <label for="model_no">Model No</label>
                                <input type="text" class="form-control" id="model_no" name="model_no" placeholder="Enter Model No">
                            </div>
                            <div class="form-group m-3">
                                <label for="model_name">Model Name</label>
                                <input type="text" class="form-control" id="model_name" name="model_name" placeholder="Enter Model Name">
                            </div>
                            <div class="form-group m-3">
                                <label for="unit_price">Unit Price</label>
                                <input type="number" class="form-control" id="unit_price" name="unit_price" placeholder="Enter Unit Price">
                            </div>
                            <div class="form-group m-3">
                                <label for="category">Category</label>
                                <select class="form-control" id="category" name="category">
                                    <option value="">Select Category</option>
                                    <?php foreach($categories as $category): ?>
                                        <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group m-3">
                                <label for="supplier">Supplier</label>
                                <input type="text" class="form-control" id="supplier" name="supplier" placeholder="Enter Supplier Name">
                            </div>
                            <div class="form-group m-3">
                                <label for="department">Department</label>
                                <input type="text" class="form-control" id="department" name="department" placeholder="Enter Department">
                            </div>
                        </div>

                        <!-- Right Side -->
                        <div class="col-md-6">
                            <div class="form-group m-3">
                                <label for="manufacturing_date">Manufacturing Date</label>
                                <input type="date" class="form-control" id="manufacturing_date" name="manufacturing_date">
                            </div>
                            <div class="form-group m-3">
                                <label for="warranty">Warranty (Months)</label>
                                <input type="number" class="form-control" id="warranty" name="warranty" placeholder="Enter Warranty in Months">
                            </div>
                            <div class="form-group m-3">
                                <label for="location">Location</label>
                                <input type="text" class="form-control" id="location" name="location" placeholder="Enter Location">
                            </div>
                            <div class="form-group m-3">
                                <label for="created_date">Created Date</label>
                                <input type="text" class="form-control" id="created_date" name="created_date" value="<?php echo date('Y-m-d'); ?>" readonly>
                            </div>
                            <div class="form-group m-3">
                                <label for="note">Note</label>
                                <textarea class="form-control" id="note" name="note" rows="5" placeholder="Enter Notes"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Assign Employee Section -->
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="text-center mt-4">Assign Employee</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Available Employees</label>
                                    <select multiple class="form-control" id="available_employees" style="height: 150px;">
                                        <?php foreach ($employees as $employee): ?>
                                            <option value="<?php echo $employee['id']; ?>"><?php echo $employee['name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>Assigned Employees</label>
                                    <select multiple class="form-control" id="assigned_employees" name="assigned_employees[]" style="height: 150px;">
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
                    <label for="inputAddress2">Content Description</label>
                        <textarea rows="7" cols="45" class="form-control" id="inputAddress2" name='content_description'
                              placeholder="Write the description here !!!!!" style='background-color: #dbdbdb;'></textarea>
                    
                    <div class="form-group m-1 ">
                            <label for="file">Upload file here!!</label>
                            <input type="file" name="userfile"  class="form-control" size="20" required onchange="validateFileType()" id="file" />
                    </div>                    
                   
            <button type="submit" class="btn btn-primary btn-sm m-3">Publish</button>
            <button type="cancel" class="btn btn-dark ml-auto btn-sm m-3">reset</button>
            </div> 
            </form>
            <br>
        </div>
    </div>
    </div>

</body>
<!-- JavaScript to toggle options and validate file types -->
<script>
function showOptions() {
    var documentType = document.getElementById('category_type').value;
    var PdfOptions = document.getElementById('pdf_options');
    var videoOptions = document.getElementById('video_options');
    var apkOptions = document.getElementById('apk_options');
    var imageOptions = document.getElementById('image_options');
    var bookOptions = document.getElementById('book_options'); // Book options
    var electronicsOptions = document.getElementById('electronics_options'); // andriod options


    // Hide all options by default
    PdfOptions.classList.add('hidden');
    videoOptions.classList.add('hidden');
    apkOptions.classList.add('hidden');
    imageOptions.classList.add('hidden');
    bookOptions.classList.add('hidden');
    electronicsOptions.classList.add('hidden');

    // Show relevant options based on selection
    if (documentType == '1') {
        PdfOptions.classList.remove('hidden');
        document.getElementById('file').accept = ".pdf";
    } else if (documentType == '2') {
        imageOptions.classList.remove('hidden');
        document.getElementById('file').accept = ".png,.jpg,.jpeg,.gif";
    } else if (documentType == '3') {
        videoOptions.classList.remove('hidden');
        document.getElementById('file').accept = ".mp4,.mov,.avi";
    } else if (documentType == '4') {
        apkOptions.classList.remove('hidden');
        document.getElementById('file').accept = ".apk";
    } else if (documentType == '5') { // Assuming '5' is the ID for the book category
        bookOptions.classList.remove('hidden');
        document.getElementById('file').accept = ""; // Adjust if books need file uploads  
    } else if (documentType == '6') { // Assuming '6' is the ID for the andriod category
        electronicsOptions.classList.remove('hidden');
        document.getElementById('file').accept = ""; // Adjust if books need file uploads    
    }      
    else {
        document.getElementById('file').accept = ""; // Default case, if needed
    }
}

function validateFileType() {
    var documentType = document.getElementById('category_type').value;
    var fileInput = document.getElementById('file');
    var file = fileInput.files[0];
    var fileError = document.getElementById('fileError');
    var selectedImageType = document.getElementById('image_type').value; // Get selected image type
    
    if (!file) return; // No file selected yet

    var fileType = file.name.split('.').pop().toLowerCase(); // Get file extension
    var validTypes = [];

    // Determine valid types based on document type
    if (documentType == '1') {
        validTypes = ['pdf'];
    } else if (documentType == '3') {
        validTypes = ['mp4', 'mov', 'avi'];
    } else if (documentType == '4') {
        validTypes = ['apk'];
    } else if (documentType == '2') {
        // Check if an image type is selected
        if (selectedImageType) {
            validTypes = [selectedImageType];
        } else {
            validTypes = ['png', 'jpg', 'jpeg', 'gif']; // Default to these image types if none selected
        }
    }

    // Check if the selected file type is valid
    if (validTypes.indexOf(fileType) === -1) {
        fileError.classList.remove('hidden');
        fileInput.value = ''; // Clear the file input
    } else {
        fileError.classList.add('hidden');
    }
}

// Attach validation when file input changes
document.getElementById('file').addEventListener('change', validateFileType);

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