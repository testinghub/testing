<?php

    function isAuth()
    {
    	return ! empty($_SESSION['login']) || ! empty($_SESSION['id']);
    }
    function isADM()
    {
    	return (! empty($_SESSION['login']) || ! empty($_SESSION['id'])) && ($_SESSION['user_type'] == 'admin');
    }
?>