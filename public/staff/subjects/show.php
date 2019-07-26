<?php require_once("../../../private/initialize.php"); ?>
<?php 
    //$id = isset($_GET['id']) ? $_GET['id'] : '1';
    $id = $_GET['id'] ?? '1'; //php >7.0
    echo h($id);
?>
<br/>

<a href="show.php?name=<?php echo enCode('Nguyen Hung'); ?>">Link</a><br />
<a href="show.php?love=<?php echo enCode('Hung?Tuyen'); ?>">Link</a><br />
<a href="show.php?query=<?php echo enCode('!#*?'); ?>">Link</a><br />