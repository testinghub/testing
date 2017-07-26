<?php
    function articles_all($link)
    {
        $query = "SELECT * FROM articles ORDER BY id DESC  ";
        $result = mysqli_query($link, $query);
        if (!$result)
            die(mysqli_error($link));
        $n = mysqli_num_rows($result);
        $articles = array();
        for ($i = 0; $i < $n; $i++)
        {
        $row = mysqli_fetch_assoc($result);
        $articles[] = $row;
        }
        return  $articles;
    }
    function articles_get($link, $id_article)
    {
        $query = sprintf("SELECT * FROM articles WHERE id=%d",
        (int)$id_article);
        $result = mysqli_query($link, $query);
        if (!$result)
            die(mysqli_error($link));
        $article = mysqli_fetch_assoc($result);
        return $article;
    }
    function articles_new($link, $title, $date, $content, $section_id)
    {
        $title = trim($title);
        $content = trim($content);
        $section_id = trim($section_id);
        if($title == '')
            return false;
        $t = "INSERT INTO articles (title, date, content, section_id) VALUES ('%s', '%s', '%s', '%s')";
        $query = sprintf($t, mysqli_real_escape_string($link, $title),
                             mysqli_real_escape_string($link, $date),
                             mysqli_real_escape_string($link, $content),
                             mysqli_real_escape_string($link, $section_id));
        //echo $query;
        $result = mysqli_query($link, $query);
        if (!$result)
            die(mysqli_error($link));
            return true;
    }
    function articles_edit($link, $id, $title, $date, $content, $section_id)
    {
        $title = trim($title);
        $content = trim($content);
        $date = trim($date);
        $section_id = trim($section_id);
        $id = (int)$id;
        if ($title == '')
            return false;
        $sql = "UPDATE articles SET title='%s', content='%s', date='%s', section_id='%s' WHERE id='%d'";
        $query = sprintf($sql,mysqli_real_escape_string($link, $title),
                              mysqli_real_escape_string($link, $content),
                              mysqli_real_escape_string($link, $date),
                              mysqli_real_escape_string($link, $section_id),
                              $id);
        $result = mysqli_query($link, $query);
        if (!$result)
            die(mysqli_error($link));
        return mysqli_affected_rows($link);
    }
    function articles_delete($link, $id)
    {
        $id = (int)$id;
        if ($id == 0)
         return false;
         $query = sprintf("DELETE FROM articles WHERE id='%d'", $id);
         $result = mysqli_query($link, $query);
         if (!$result)
            die(mysqli_error($linl));
            return mysqli_affected_rows($link);
    }
    function articles_intro($text, $len = 500)
    {
        return mb_substr($text, 0, $len);
    }
    function articles_all2($link)
    {
        $query = "SELECT * FROM articles ORDER BY id DESC LIMIT 3";
        $result = mysqli_query($link, $query);
        if (!$result)
            die(mysqli_error($link));
        $n = mysqli_num_rows($result);
        $articles2 = array();
        for ($i = 0; $i < $n; $i++)
        {
        $row = mysqli_fetch_assoc($result);
        $articles2[] = $row;
        }
        return  $articles2;
    }
    function articles_intro2($text, $len = 100)
    {
        return mb_substr($text, 0, $len);
    }
    function section_all($link)
    {
        $query = "SELECT * FROM section order by timestamp";
        $result = mysqli_query($link, $query);
        if (!$result)
            die(mysqli_error($link));
        //$n = mysqli_num_rows($result);
       // $section = array();
/*
        for ($i = 0; $i < $n; $i++)
        {
        $row = mysqli_fetch_assoc($result);
        $section[] = $row;
        }
*/
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    function section_get($link, $section_id)
    {
        $query = sprintf("SELECT * FROM articles WHERE section_id='%d'",
        (int)$section_id);
        $result = mysqli_query($link, $query);
        if (!$result)
            die(mysqli_error($link));
        $section = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $section;
    }
?>