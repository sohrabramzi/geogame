<?php

class UploadModel
{
    public function addImage($file)
    {
        $uploaded = "succes";
        $message = "";
        $target_dir = "uploads/";

        $target_file = $target_dir . basename($file["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($file["tmp_name"]);
            if($check !== false) {
                //echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                $message .= "File is not an image. <br>";
                $uploaded = "fail";
                $uploadOk = 0;
                if (file_exists($target_file)) {
                    unlink($target_file);
                }
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            $message .= "Sorry, file already exists. <br>";
            $uploaded = "fail";
            $uploadOk = 0;
        }
        // Check file size
        if ($file["size"] > 5000000) {
            $message .= "Sorry, your file is too large. <br>";
            $uploaded = "fail";
            $uploadOk = 0;
            if (file_exists($target_file)) {
                unlink($target_file);
            }
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            $message .= "Sorry, only JPG, JPEG, PNG & GIF files are allowed. <br>";
            $uploaded = "fail"; 
            $uploadOk = 0;
            if (file_exists($target_file)) {
                unlink($target_file);
            }
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $message .= "Sorry, your file was not uploaded. <br>";
            $uploaded = "fail";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($file["tmp_name"], $target_file)) {
                     $exif = exif_read_data($target_file, "EXIF");
                //var_dump($exif);

                if(isset($exif['GPSLongitude'])) {
                    $long = $exif['GPSLongitude'];
                    $lat = $exif['GPSLatitude'];
                    $longRef = $exif['GPSLongitudeRef'];
                    $latRef = $exif['GPSLatitudeRef'];

                    $lat = $this->getGPS($lat,$latRef);
                    $long = $this->getGPS($long,$longRef);


                    $query = "INSERT INTO `images` (`filename`,`long`,`lat`) VALUES ('".substr($target_file,7)."','".$long."','".$lat."');";
                    $stmt = $this->db->prepare($query);
                    $stmt->execute();


                } else {
                    $message .= "Sorry, your image doesn't contain a GPS location. <br>";
                    $uploaded = "fail"; 
                    unlink($target_file);
                }
        } else {
            $message = "sorry there was an error <br>";
            $uploaded = "fail";
            unlink($target_file);
        }

        $result = Array($uploaded, $message, $target_file,$exif);
        return $result;
        }
    }


    public function getGPS($exifCoord, $hemi) {

        $degrees = count($exifCoord) > 0 ? $this->gps2Num($exifCoord[0]) : 0;
        $minutes = count($exifCoord) > 1 ? $this->gps2Num($exifCoord[1]) : 0;
        $seconds = count($exifCoord) > 2 ? $this->gps2Num($exifCoord[2]) : 0;

        $flip = ($hemi == 'W' or $hemi == 'S') ? -1 : 1;

        return $flip * ($degrees + $minutes / 60 + $seconds / 3600);

    }

    function gps2Num($coordPart) {

        $parts = explode('/', $coordPart);

        if (count($parts) <= 0)
            return 0;

        if (count($parts) == 1)
            return $parts[0];

        return floatval($parts[0]) / floatval($parts[1]);
    }

    public function getImages()
    {
        $query = "SELECT * FROM images WHERE `publish`='1'";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

}
