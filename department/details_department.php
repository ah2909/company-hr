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
            <dt>ID</dt>
            <dd><?php echo $a['department_id'] ?></dd>
            <dt>Department Name</dt>
            <dd><?php echo $a['department_name'] ?></dd>
            <?php $id = $a['department_id'];
            $sql1 = "SELECT * FROM employees_in_departments WHERE department_id='$id' ";
            $result1 = $conn->query($sql1);
            foreach ($result1 as $b) {
              $id1 = $b['employee_id'];
              $sql2 = "SELECT * FROM employees WHERE employee_id='$id1'";
              $result2 = $conn->query($sql2);
              foreach ($result2 as $c) {
            ?>
                <dt>Manager</dt>
                <dd><?php if ($c['role'] === 'Manager')
                      echo  $c['first_name'];
                    else echo  "Null"; ?></dd>
                <dt>Employee</dt>
                <dd><?php if ($c['role'] === 'Employee')
                      echo  $c['first_name'];
                    else echo  "Null"; ?></dd>
            <?php }
            } ?>
        </dl>
      </div>
    </section>
  </div>
</div>
<?php
          }
?>