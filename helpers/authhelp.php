<?php

    function isAuth()
    {
    	return (! empty($_SESSION ['login']) && ! empty($_SESSION['id'])) or (! empty($_SESSION['name']['id']));
    }

    function isADM()
    {
    	return (! empty($_SESSION['login']) || ! empty($_SESSION['id'])) && ($_SESSION['user_type'] == 'admin');
    }
?>