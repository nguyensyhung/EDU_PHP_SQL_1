<?php require_once('../../../private/initialize.php'); ?>
<?php $page_title = "Pages" ?>  
<?php include(SHARED_PATH . "/staff_header.php"); ?>
<?php 
  $pages = find_all_pages(); 

  // $pages = [
  //   ['id' =>  '1',  'position'  => 'Khach hang tiem nang', 'visible'  =>  '1', 'name' =>  'Nguyen Hau Hoang'],
  //   ['id' =>  '2',  'position'  =>  'Khach hang VIP', 'visible' =>  '1', 'name' =>  'Nguyen Sy Hung'],
  //   ['id' =>  '3',  'position'  =>  'Khach hang ', 'visible' =>  '1', 'name' =>  'Nguyen Thanh Tuyen'],
  // ];
?>
<div id="content">
  <div class="subjects listing">
  <h1>Pages</h1>
  <div class="actions">
    <a href="<?php echo url_for('/staff/pages/new.php'); ?>" class="actions ">Create new Page</a>
  </div>
    <table class="list">
      <tr>
        <th>ID</th>
        <th>Position</th>
        <th>Visible</th>
        <th>Name</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
      </tr>
<?php while ($page = mysqli_fetch_assoc( $pages)) { ?>
      <tr>
        <td><?php echo h($page['id']); ?></td>
        <td><?php echo h($page['position']) ; ?></td>
        <td><?php echo $page['visible'] == 1 ? 'true' : 'false' ?></td>
        <td><?php echo h($page['menu_name']) ; ?></td>
        <td class="action"><a href="<?php echo url_for('/staff/pages/show.php?name='. h(enCode($page['menu_name'])));?>"> Show</a></td>
        <td class="action"><a href="<?php echo url_for('/staff/pages/edit.php?id='. h(enCode($page['id'])));?>"> Edit</a></td>
        <td class="action"><a href=""> Delete</a></td>
      </tr>
<?php }?>
    </table>
    <?php 
      mysqli_free_result($pages);
    ?>
  </div>
</div>
<?php include(SHARED_PATH . "/staff_footer.php") ?>