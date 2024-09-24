<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Content List</title>
    <style>
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
                <h4 class="text-center "><b>Add Digital Resources</b></h4>
                <?php if ($this->session->flashdata('message')): ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <p><?php echo $this->session->flashdata('message'); ?></p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php endif; ?>
                
                <form method="post" action='<?php echo base_url('Management/content_add_form');?>'
                    enctype="multipart/form-data" style=" background-color: lightblue; margin:0px">
                    
                    <div class="form-row">
                        <!-- Left Column -->
                        <div class="col-md-6">
                            <div class="form-group m-3">
                                <label for="title">Content Title</label>
                                <input type="text" class="form-control" name='content_title' id="" placeholder="Add Title">
                            </div>
                            <div class="form-group m-3">
                                <label for="category_type">CategoryName</label>
                                <select name="categoryId" id="category_type" onchange="showOptions()" required class="form-control" style='background-color: #dbdbdb;'>
                                    <?php foreach($category as $cata): ?>
                                    <option value="<?php echo $cata['categoryId']; ?>">
                                         <?php echo $cata['categoryName']; ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <!-- Dynamic Hidden Fields (e.g. pdf_options, video_options, etc.) -->
                            <div class="form-group m-3 hidden" id="pdf_options">
                                <label for="pdf_type">Type of PDF:</label>
                                <select name="pdf_type" class="form-control">
                                    <option value="tutorial">Tutorial</option>
                                    <option value="promotional">Promotional</option>
                                    <option value="educational">Educational</option>
                                    <option value="entertainment">Entertainment</option>
                                </select>
                            </div>
                            <!-- Repeat other hidden fields (video_options, image_options, etc.) here as needed -->
                        </div>

                        <!-- Right Column -->
                        <div class="col-md-6">
                            <div class="form-group m-3">
                                <label for="file">File Name</label>
                                <input type="file" name="userfile" id="file" size="20" class="form-control">
                            </div>
                            <div class="form-group m-3">
                                <label for="inputAddress2">Content Description</label>
                                <textarea rows="3" class="form-control" id="inputAddress2" name='content_description' placeholder="Describe content..."></textarea>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-primary btn-sm m-3">Add here</button>
                            <button type="reset" class="btn btn-dark btn-sm m-3">Reset</button>
                        </div>
                    </div>
                </form>
                <br>
            </div>
        </div>
    </div>

    <script>
        function showOptions() {
            var documentType = document.getElementById('category_type').value;
            var PdfOptions = document.getElementById('pdf_options');
            var videoOptions = document.getElementById('video_options');
            var apkOptions = document.getElementById('apk_options');
            var imageOptions = document.getElementById('image_options');

            PdfOptions.classList.add('hidden');
            videoOptions.classList.add('hidden');
            apkOptions.classList.add('hidden');
            imageOptions.classList.add('hidden');

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
            } else {
                document.getElementById('file').accept = ""; 
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
</body>

</html>
