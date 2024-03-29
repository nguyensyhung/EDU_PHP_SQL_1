<?php 
  require_once("../../../private/initialize.php");
?>
<?php
  $subject_set = find_all_subjects();

  // $subjects = [
  //   ['id'  =>  '1', 'position' =>  '1', 'visible'  =>  '1', 'menu_name'  =>  'About Nsh Bank'],
  //   ['id'  =>  '2', 'position' =>  '2', 'visible'  =>  '1', 'menu_name'  =>  'Consumer'],
  //   ['id'  =>  '3', 'position' =>  '3', 'visible'  =>  '1', 'menu_name'  =>  'Small Business'],
  //   ['id'  =>  '4', 'position' =>  '4', 'visible'  =>  '1', 'menu_name'  =>  'Nguyen Sy Hung'],
  // ];
?>
<?php $page_title = "Subjects"; ?>
<?php include(SHARED_PATH . "/staff_header.php"); ?>
    <div id="content">
      <div class="pages listing">
        <h1> Subjects</h1>
        <div class="actions">
          <a href="<?php echo url_for('/staff/subjects/new.php'); ?>" class="action">Create new Subject</a>
        </div>

        <table class = "list">
          <tr>
            <th>ID</th>
            <th>Position</th>
            <th>Visible</th>
            <th>Name</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
          </tr>
          <?php while ($subject = mysqli_fetch_assoc($subject_set)){ ?>
          <tr>
            <td> <?php echo $subject['id'] ;?></td>
            <td> <?php echo $subject['position'] ;?></td>
            <td> <?php echo $subject['visible'] == 1 ? 'true' : 'false' ;?></td>
            <td> <?php echo $subject['menu_name'] ;?></td>
            <td> <a class="action" href="<?php echo url_for('/staff/subjects/show.php?id='.$subject['id']); ?>"> Show</a></td>
            <td> <a class="action" href="<?php echo url_for('/staff/subjects/edit.php?id='. h(enCode($subject['id']))); ?>"> Edit</a></td>
            <td> <a class="action" href="<?php echo url_for('/staff/subjects/delete.php?id='. h(enCode($subject['id']))); ?>"> Delete</a></td>
          </tr>
          <?php } ?>
        </table>
        <?php 
          mysqli_free_result($subject_set);
        ?>
      </div>
    </div>
<?php include(SHARED_PATH . "/staff_footer.php"); ?>
