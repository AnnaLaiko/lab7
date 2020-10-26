  <?php if (isset($_SESSION['user']))
    {if($_SESSION['user']['rank']>0)
      echo file_get_contents('html/header_3.html'); else echo file_get_contents('html/header.html');}
    else echo file_get_contents('html/header_2.html');?>