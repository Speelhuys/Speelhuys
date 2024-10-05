<?php
class Session
{
    public $id;
    public $userId;
    public $key;
    public $start;
    public $end;
    //Zoekt naar actieve sessies
    public static function findActiveSession()
    {
        $session = null;
        if (isset($_COOKIE["speelhuys-session"])) {
            $conn = database::start();
            $key = mysqli_real_escape_string($conn, $_COOKIE["speelhuys-session"]);
            $query = "SELECT * FROM sessions WHERE session_key = '" . $key . "' AND session_end > '" . date("Y-m-d H:i:s") . "'";
            $result = $conn->query($query);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $session = new Session();
                $session->id = $row['session_id'];
                $session->userId = $row['session_user_id'];
                $session->key = $row['session_key'];
                $session->start = $row['session_start'];
                $session->end = $row['session_end'];
            }
        }
        $conn->close();
        return $session;
    }
    //Creërt een nieuwe sessie
    public function insert()
    {
        $conn = database::start();
        mysqli_real_escape_string($conn, $this->userId);
        mysqli_real_escape_string($conn, $this->key);
        mysqli_real_escape_string($conn, $this->start);
        mysqli_real_escape_string($conn, $this->end);
        $sql = "INSERT INTO sessions (session_user_id, session_key, session_start, session_end) VALUES ('" . $this->userId . "', '" . $this->key . "', '" . $this->start . "', '" . $this->end . "')";
        $conn->query($sql);
        $conn->close();
    }
}
