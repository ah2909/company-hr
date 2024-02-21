<?php
include "./header.php";
include "../utils.php";
include "../header.php";
?>
<script type="text/javascript">
  document.title = 'Change Project Detail';
</script>
<div class="row">
  <div class="col-lg-6">
    <section class="panel" style="box-shadow: none;">
      <header class="panel-heading">
        <h1>Change Project Detail</h1>
        <a href="../projects" class="btn btn-success">Back</a>
      </header>
      <div class="panel-body">
        <dl class="dl-horizontal">
          <?php
          $conn =  connect_to_database();
          if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }
          $id = $_GET['id'];
          $sql = "SELECT * FROM projects WHERE project_id='$id'";
          $result = $conn->query($sql);
          $conn->close();
          foreach ($result as $a) {
          ?>
            <form method="post" action="./edit_project_processing.php?id=<?php echo $a['project_id'] ?>">
              <dt>Id</dt>
              <dd><?php echo $id ?></dd>
              <dt style="margin-top: 6px;">Name</dt>
              <dd><input type="text" name="protitle" class="form-control" id="recipient-name1" minlength="8" maxlength="250" value="<?php echo $a['project_title'] ?>"></dd>
              <dt style="margin-top: 6px;">Status</dt>
              <dd><select class="form-control custom-select valid" tabindex="1" name="prostatus">
                  <option value="upcoming">Upcoming</option>
                  <option value="complete">Complete</option>
                  <option value="running">Running</option>
                </select></dd>
              <dt style="margin-top: 6px;">Start Date</dt>
              <dd><input type="text" name="startdate" class="form-control" id="recipient-name1" value="<?php echo $a['project_start'] ?>"></dd>
              <dt style="margin-top: 6px;">End Date</dt>
              <dd><input type="text" name="enddate" class="form-control" id="recipient-name1" value="<?php echo $a['project_end'] ?>"></dd>
              <dt style="margin-top: 6px;">Details</dt>
              <dd><textarea class="form-control" name="details" id="message-text1" maxlength="1300" style="resize: none;"><?php echo $a['project_details'] ? $a['project_details'] : 'Null' ?></textarea></dd>
              <dt style="margin-top: 6px;">Summary</dt>
              <dd><textarea class="form-control" name="summery" id="message-text1" maxlength="1300" style="resize: none;"><?php echo $a['project_summary'] ? $a['project_summary'] : 'Null' ?></textarea></dd>
              <div class="form-row" style="margin-left: 350px; margin-top: 30px">
                <div class="col-md-4">
                  <button name="submit" type="submit" class="btn btn-primary"><i class="fa fa-pencil"></i> Update</button>
            </form>
      </div>
  </div>
</div>

</dl>
</div>
</section>
</div>
</div>
<?php
          }
?>