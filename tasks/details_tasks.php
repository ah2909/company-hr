<?php
include "./header.php";
include "../utils.php";
?>
<script type="text/javascript">
  document.title = 'Task Detail';
</script>
<div class="row">
  <div class="col-lg-6">
    <section class="panel" style="box-shadow: none;">
      <header class="panel-heading">
        <h1>Task Detail</h1>
        <a href="../tasks" class="btn btn-success">Back</a>
      </header>
      <div class="panel-body">
        <dl class="dl-horizontal">
          <?php
          $conn = connect_to_database();
          if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }
          $id = $_GET['id'];
          $sql = "SELECT * FROM tasks WHERE task_id='$id' ";
          $result = $conn->query($sql);
          foreach ($result as $a) {
          ?>
            <dt>ID</dt>
            <dd><?php echo $a['task_id'] ?></dd>
            <?php
            $id = $a['project_id'];
            $sql1 = "SELECT * FROM projects WHERE project_id='$id' ";
            $result1 = $conn->query($sql1);
            foreach ($result1 as $b) {
            ?>
              <dt>Project Name</dt>
              <dd><?php echo $b['project_title'] ?></dd>
            <?php
            }
            ?>
            <dt>Name</dt>
            <dd><?php echo $a['task_title'] ?></dd>
            <dt>Collaborators</dt>
            <dd><?php echo $a['assign_user'] ?></dd>
            <dt>Status</dt>
            <dd><?php echo $a['task_status'] ?></dd>
            <dt>Start Date</dt>
            <dd><?php echo $a['task_start'] ?></dd>
            <dt>End Date</dt>
            <dd><?php echo $a['task_end'] ?></dd>
            <dt>Details</dt>
            <dd><?php echo $a['task_details'] ? $a['task_details'] : "Null" ?></dd>
        </dl>
      </div>
    </section>
  </div>
</div>
<?php
          }
?>