<?php 
    require_once('../../../private/initialize.php');
    if (!isset($_GET['id'])) {
        redirect_to(url_for('/staff/pages/index.php'));
    }
    $id = $_GET['id'];
    

    if (is_post_request()) {
        $page = [];
        $page['id'] = $id;
        $page['subject_id'] = $_POST['subject_id'] ?? '';
        $page['menu_name'] = $_POST['menu_name'] ?? '';
        $page['position']  = $_POST['position'] ?? '';
        $page['visible']   = $_POST['visible'] ?? '';
        $page['content']   = $_POST['content'] ?? '';

        $result = edit_page($page);
        redirect_to(url_for('/staff/pages/show.php?id='. $id));
    }
    else{
        $page = find_page_by_id($id);
        $page_set = find_all_pages();
        $page_count = mysqli_num_rows($page_set);
        mysqli_free_result($page_set);
    }
?>
<?php 
    $page_title = "Pages Edit";
    include(SHARED_PATH . ('/staff_header.php'));
?>


<div id="content">

<a class="back-link" href="<?php echo url_for('/staff/pages/index.php'); ?>">&laquo; Back to List</a>

<div class="page new">
    <h1>Edit Page</h1>

    <form action="<?php echo url_for('/staff/pages/edit.php?id=' . $id); ?>" method="post">
    <dl>
        <dt>Subject Name</dt>
        <dd>
        <select name="subject_id">
            <?php
            $subject_set = find_all_subjects();
            while ($subject = mysqli_fetch_assoc($subject_set)) {
                echo "<option value =\"" . h($subject['id']) . "\"";
                if ($page["subject_id"] == $subject['id']) {
                    echo " selected";
                }
                echo ">" . h($subject['menu_name']) . "</option>";
            }
            mysqli_free_result($subject_set);
            ?>
        </select>

        </dd>
    </dl>
    <dl>
        <dt>Menu Name</dt>
        <dd><input type="text" name="menu_name" value="<?php echo $page['menu_name'] ?>" /></dd>
    </dl>
    <dl>
        <dt>Position</dt>
        <dd>
        <select name="position">
            <?php
                for ($i=1; $i <= $page_count; $i++) { 
                    echo "<option value=\"{$i}\"";
                    if ($page["position"] == $i) {
                        echo " selected";
                    }
                    echo ">" . $i . "</option>";
                }
            ?>
        </select>
        </dd>
    </dl>
    <dl>
        <dt>Visible</dt>
        <dd>
        <input type="hidden" name="visible" value="0" />
        <input type="checkbox" name="visible" value="1" />
        </dd>
    </dl>
    <dl>
        <dt>Content</dt>
        <dd>
            <textarea name="content" cols="60" rows="10"><?php echo $page['content'];  ?></textarea>
        </dd>
    </dl>
    <div id="operations">
        <input name="submit" type="submit" value="Create Page" />
    </div>
    </form>

</div>

</div>
<?php include(SHARED_PATH . ('/staff_footer.php')); ?>
