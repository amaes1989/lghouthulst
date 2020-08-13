<?php


class Image extends Db_object
{
    protected static $db_table = "images";
    protected static $db_table_fields = array('name', 'alt', 'eventid');
    public $id;
    public $name;
    public $alt;
    public $eventid;
    public $tmp_path;
    public $upload_directory = 'img';


    public static function find_by_eventid($id){
        global $database;
        $result = static::find_this_query ("SELECT * FROM " . static::$db_table . " WHERE eventid=$id LIMIT 1");
        /*        $user_found = mysqli_fetch_array($result);*/

        return !empty($result) ? array_shift ($result) : false;
    }

    public function set_file($file){
        if(empty($file) || !$file || !is_array ($file)){
            $this->errors[] = "No file uploaded";
            return false;
        }elseif ($file['error'] != 0){
            $this->errors[] = $this->upload_errors_array[$file['error']];
            return false;
        }else{
            $this->name = basename ($file['name']);
            $this->tmp_path = $file['tmp_name'];
            /*$this->alt = $file['alt'];
            $this->eventid = $file['eventid'];*/
        }
    }

    public function save_image(){
        //als eventid bestaat dan update
        if($this->id){
            $this->update ();
        }else{
            if(!empty($this->errors)){
                return false;
            }
            if(empty($this->name) || empty($this->tmp_path)){
                $this->errors[] = "File not available";
                return false;
            }
            $target_path = SITE_ROOT . DS . "admin" . DS . $this->upload_directory . DS . $this->name;

            if(file_exists ($target_path)){
                $this->errors[] = "File {$this->name} exists!";
                return false;
            }
            if(move_uploaded_file ($this->tmp_path, $target_path)){
                if($this->create ()){
                    var_dump ($this);
                    unset($this->tmp_path);
                    return true;
                }
            }else{
                $this->errors[] = "this folder has no write rights!";
                return false;
            }
        }
    }

    public function picture_path(){
        return $this->upload_directory.DS.$this->name;
    }

    public function delete_photo(){
        if($this->delete ()){
            $target_path = SITE_ROOT.DS. 'admin' .DS. $this->picture_path ();
            return unlink ($target_path) ? true : false;
        }else{
            return false;
        }
    }

}