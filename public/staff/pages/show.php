<?php require_once('../../../private/initialize.php'); ?>
<?php
    $name = $_GET['name'] ?? null;
?>
<br/>
<a href="<?php echo url_for('/staff/pages/index.php') ?>"> &laquo; Back to list </a> <br />
<h5>Name cua khach hang la: <?php echo h($name); ?></h5>