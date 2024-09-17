<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
To print the value of $data['department'], you first need to ensure that getDepartmentData(org_data) successfully
returns the data you're expecting. Assuming it's an array or some type of data structure, you can use various methods to
print it.

Here are a few ways to print the $data['department'] value in PHP:

1. Using print_r()
print_r() is useful for displaying arrays or objects in a readable format.

php
Copy code
echo `<pre>'; // Optional: Makes the output more readable
print_r($data['department']);
echo '</pre>';
2. Using var_dump()
var_dump() provides detailed information about a variable, including its type and value.

php
Copy code
echo '
<pre>'; // Optional: Makes the output more readable
var_dump($data['department']);
echo '</pre>';
3. Using json_encode()
If you prefer a JSON format, you can use json_encode(). This is useful for debugging or if you want to display the data
in a format that is easy to read or send to a client.

php
Copy code
echo '
<pre>'; // Optional: Makes the output more readable
echo json_encode($data['department'], JSON_PRETTY_PRINT);
echo '</pre>';
Example
Assuming your $data['department'] contains some data:

php
Copy code
$data['department'] = $this->Manage_model->getDepartmentData($org_data);

// Print the department data
echo '
<pre>';
print_r($data['department']);
echo '</pre>';
Additional Notes
Make sure that getDepartmentData($org_data) is returning data. If $data['department'] is null or empty, the output might
not be as expected.
Using
<pre> tags in HTML output helps with formatting and readability, especially for arrays and objects.
Let me know if you need help with anything else!
</body>
</html>