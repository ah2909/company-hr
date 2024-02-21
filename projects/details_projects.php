<?php
include "./header.php";
include "../utils.php";
include "../header.php";
?>
<script type="text/javascript">
  document.title = 'Project Detail';
</script>
<div class="row">
  <div class="col-lg-6">
    <section class="panel" style="box-shadow: none;">
      <header class="panel-heading">
        <h1>Project Detail</h1>
        <a href="../projects" class="btn btn-success">Back</a>
      </header>
      <div class="panel-body">
        <dl class="dl-horizontal">
          <?php
          $conn = connect_to_database();
          if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }
          $id = $_GET['id'];
          $sql = "SELECT * FROM projects WHERE project_id='$id'";
          $result = $conn->query($sql);
          $conn->close();
          foreach ($result as $a) {
          ?>
            <dt>ID</dt>
            <dd><?php echo $a['project_id'] ?></dd>
            <dt>Name</dt>
            <dd><?php echo $a['project_title'] ?></dd>
            <dt>Status</dt>
            <dd><?php echo $a['project_status'] ?></dd>
            <dt>Start Date</dt>
            <dd><?php echo $a['project_start'] ?></dd>
            <dt>End Date</dt>
            <dd><?php echo $a['project_end'] ?></dd>
            <dt>Details</dt>
            <dd><?php echo $a['project_details'] ? $a['project_details'] : "Null" ?></dd>
            <dt>Summary</dt>
            <dd><?php echo $a['project_summary'] ? $a['project_summary'] : "Null" ?></dd>
        </dl>
      </div>
    </section>
  </div>
</div>
<?php
          }
?>