<?php

# [\AllowDynamicProperties]
class Model
{
    private $db;

    public function __construct()
    {
        // Assuming Database class is defined and available
        $this->db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
    }

    public function saveLog($description)
    {
        // Ensure $_SESSION['userid'] is set
        $userId = isset($_SESSION['userid']) ? $_SESSION['userid'] : 0;

        $this->db->insert("user_log", [
            "userid" => $userId,
            "description" => $description,
            "datelog" => date('Y-m-d H:i:s')
        ]);
    }

    public function humanTiming($time)
    {
        // Your existing code for humanTiming
    }

    public function getStringBetween($string, $start, $end)
    {
        // Your existing code for getStringBetween
    }

    public function base64ToImageFile($base64String, $ext, $uploadDirectory)
    {
        $filenamePath = md5(time() . uniqid()) . "." . $ext;
        $decoded = base64_decode($base64String);

        // Ensure $uploadDirectory exists and has proper permissions
        file_put_contents($uploadDirectory . "/" . $filenamePath, $decoded);

        return $filenamePath;
    }

    public function currentSchoolYear()
    {
        // Your existing code for currentSchoolYear
    }

    public function currentSchoolFirstYear()
    {
        // Your existing code for currentSchoolFirstYear
    }

    public function currentSemester()
    {
        // Your existing code for currentSemester
    }

    public function checkIfYearLevelIsUpdatedForCurrentSchoolYear()
    {
        $checkInfo = $this->db->selectSingleData("SELECT * FROM student_yearlevel_update WHERE schoolyear = '" . $this->currentSchoolYear() . "'");

        return ($checkInfo != null);
    }

    public function getSchoolYears()
    {
        return $this->db->select("SELECT schoolyear FROM student_academic_details WHERE schoolyear != '" . $this->currentSchoolYear() . "' GROUP BY schoolyear");
    }
}
