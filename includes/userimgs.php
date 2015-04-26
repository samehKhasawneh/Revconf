<?php
require_once("DatabaseObject.php");
require_once("database.php");

class userimgs extends DatabaseObject {

    protected static $table_name="userimgs";
    protected static $db_fields=array('userID', 'imageURL');

    public $userID;
    public $imageURL;

    public $filename;
    private $temp_path;
    protected $upload_dir='C:\wamp\www\Revconf\img';
    public $errors=array();

    protected $upload_errors = array(
        UPLOAD_ERR_OK 				=> "No errors.",
        UPLOAD_ERR_INI_SIZE  	=> "Larger than upload_max_filesize.",
        UPLOAD_ERR_FORM_SIZE 	=> "Larger than form MAX_FILE_SIZE.",
        UPLOAD_ERR_PARTIAL 		=> "Partial upload.",
        UPLOAD_ERR_NO_FILE 		=> "No file.",
        UPLOAD_ERR_NO_TMP_DIR => "No temporary directory.",
        UPLOAD_ERR_CANT_WRITE => "Can't write to disk.",
        UPLOAD_ERR_EXTENSION 	=> "File upload stopped by extension."
    );

    public function attach_file($file) {
        // Perform error checking on the form parameters
        if(!$file || empty($file) || !is_array($file)) {
            // error: nothing uploaded or wrong argument usage
            $this->errors[] = "No file was uploaded.";
            return false;
        } elseif($file['error'] != 0) {
            // error: report what PHP says went wrong
            $this->errors[] = $this->upload_errors[$file['error']];
            return false;
        } else {
            // Set object attributes to the form parameters.
            $this->temp_path  = $file['tmp_name'];
            $this->filename   = basename($file['name']);
            return true;
        }
    }

    public function save() {
            // Determine the target_path
            $target_path = $this->upload_dir .'"\"'. $this->filename;

            if(file_exists($target_path)) {
                $this->errors[] = "The file {$this->filename} already exists.";
                return false;
            }

            // Attempt to move the file
            if(move_uploaded_file($this->temp_path, $target_path)) {
                // Success
                // Save a corresponding entry to the database
                if($this->create()) {
                    // We are done with temp_path, the file isn't there anymore
                    unset($this->temp_path);
                    return true;
                }
            } else {
                // File was not moved.
                $this->errors[] = "The file upload failed, possibly due to incorrect permissions on the upload folder.";
                return false;
            }
    }

    public function create(){
        global $database;
        $query = "INSERT INTO userimgs(userID,imageURL) VALUES ($this->userID,$this->temp_path)";
        if($database->query($query)){
            return true;
        }else {
            return false;
        }

    }
}


