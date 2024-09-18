<?php
class theme
{
    public $id;
    public $name;
    public function getThemes()
    {
        $conn = database::start();

        $sql = "SELECT * FROM themes";
        $result = $conn->query($sql);

        $themes = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $theme = new theme();
                $theme->id = $row['theme_id'];
                $theme->name = $row['theme_name'];
                $themes[] = $theme;
            }
        }
        $conn->close();
        return $themes;
    }
}