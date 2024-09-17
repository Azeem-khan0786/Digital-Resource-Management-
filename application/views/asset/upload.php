<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form enctype="multipart/form-data" action="<?= echo base_url().'Management/uploaddata' ?>"
                method="post">
                <div class="form-group">
                    <input type="text" class="form-control" name="blog_tittle" placeholder="Tittle">
                </div>
                
                <div class="form-group">
                    <input type="file" class="form-control" name="file" placeholder="Tittle">
                </div>

                <button type="submit" class="btn btn-primary">Add Blog</button>
            </form>
</body>
</html>