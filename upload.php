<?php
$target_dir = "uploads/";
$uploadOk = 0;

// Check if the fileToUpload key is set in the $_FILES array
if(isset($_FILES["fileToUpload"])) {
    $fileName = $_FILES["fileToUpload"]["name"];
    $imageFileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $target_file_name = $target_dir . "upload." . $imageFileType; // Append the extension with a dot
    $target_file = $target_file_name;
    // Check if file has been uploaded successfully
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $uploadOk = 1;
        file_put_contents("file.txt", $target_file);
        echo json_encode(['status' => 'success', 'message' => 'File uploaded successfully']);
        shell_exec("python test.py");
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Sorry, there was an error uploading your file.']);
    }

} else {
    echo json_encode(['status' => 'error', 'message' => 'No file has been uploaded.']);
}
?>
