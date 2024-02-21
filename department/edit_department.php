<?php
include "./header.php";
include "../header.php";
include "../utils.php";
?>
<script type="text/javascript">
  document.title = 'Department Detail';
</script>
<div class="row">
  <div class="col-lg-6">
    <section class="panel" style="box-shadow: none;">
      <header class="panel-heading">
        <h1>Department Detail</h1>
        <a href="../department" class="btn btn-success">Back</a>
      </header>
      <div class="panel-body">
        <dl class="dl-horizontal">
          <?php
          $conn = connect_to_database();
          if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }
          $id = $_GET['id'];
          $sql = "SELECT * FROM departments WHERE department_id ='$id'";
          $result = $conn->query($sql);
          foreach ($result as $a) {
          ?>
            <form method="post" action="./edit_department_processing.php?id=<?php echo $id ?>">
              <dt>ID</dt>
              <dd><?php echo $a['department_id'] ?></dd>
              <dt style="margin-top: 6px;">Department Name</dt>
              <dd><input type="text" name="dename" class="form-control" id="recipient-name1" value="<?php echo $a['department_name'] ?>"></dd>
              <?php $id = $a['department_id'];
              $sql1 = "SELECT * FROM employees_in_departments WHERE department_id='$id' ";
              $result1 = $conn->query($sql1);
              foreach ($result1 as $b) {
                $id1 = $b['employee_id'];
                $sql2 = "SELECT * FROM employees WHERE employee_id='$id1'";
                $result2 = $conn->query($sql2);
                foreach ($result2 as $c) {
              ?>
                  <dt style="margin-top: 6px;">Manager</dt>
                  <dd><select class="select2 form-control custom-select col-md-4" tabindex="1" name="proid" id="inputState">
                      <option value="<?php if ($c['role'] === 'Manager') echo $id1 ?>" selected="selected" hidden><?php if ($c['role'] === 'Manager') echo $c['first_name'];
                                                                                                                  else echo 'Null' ?></option>
                      <?php
                      $conn = connect_to_database();
                      if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                      }
                      $na = $c['first_name'];
                      $sql3 = "SELECT * FROM employees WHERE role='Manager' AND first_name != '$na'";
                      $result3 = $conn->query($sql3);
                      foreach ($result3 as $d) {

                      ?>

                        <option value="<?php echo $d['employee_id'] ?>"><?php echo $d['first_name'] ?></option>
                      <?php } ?>
                    </select></dd>
                  <dt style="margin-top: 6px;">Employee</dt>
                  <dd><select class="select2 form-control custom-select col-md-4" multiple="multiple" tabindex="1" name="proid1[]" id="inputState1">
                      <option value="<?php if ($c['role'] === 'Employee') echo $id1 ?>" selected="selected" hidden><?php if ($c['role'] === 'Employee') echo $c['first_name'];
                                                                                                                  else echo 'Null' ?></option>
                      <?php
                      $conn = connect_to_database();
                      if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                      }
                      $na = $c['first_name'];
                      $sql4 = "SELECT * FROM employees WHERE role='Employee' AND first_name != '$na'";
                      $result4 = $conn->query($sql4);
                      foreach ($result4 as $r) {

                      ?>

                        <option value="<?php echo $r['employee_id'] ?>"><?php echo $r['first_name'] ?></option>
                      <?php } ?>
                    </select></dd>
              <?php }
              } ?>
              <div class="form-row" style="margin-left: 350px; margin-top: 30px">
                <div class="col-md-4">
                  <button name="submit" type="submit" class="btn btn-primary"><i class="fa fa-pencil"></i> Update</button>
            </form>
        </dl>
      </div>
    </section>
  </div>
</div>
<?php
          }
?>
<script>
  $('#inputState1').select2({
    width: '100%'
  })
</script>