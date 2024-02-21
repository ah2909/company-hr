<section style="background-color: #f5f7fa;">
    <div class="row px-5">
        <div class="col-xl-6 col-md-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <a class="text-decoration-none" href="../employees">
                        <div class="d-flex justify-content-between p-md-1">
                            <div class="d-flex flex-row align-self-center">
                                <i class="fa-solid fa-users text-info fa-3x me-4"></i>
                            </div>

                            <h4 class="text-dark ">Total Employees</h4>
                            <p> </p>
                        </div>
                    </a>
                </div>
                <div class="align-self-center">
                    <?php
                    $conn = connect_to_database();
                    $sql = "SELECT COUNT(*) FROM employees";
                    $result = $conn->query($sql)->fetch_assoc()["COUNT(*)"];
                    echo "<h2 class=\"h1 mb-0\">" . $result . "</h2>";
                    ?>
                </div>
            </div>

        </div>
        <div class="col-xl-6 col-md-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <a class="text-decoration-none" href="../projects">
                        <div class="d-flex justify-content-between p-md-1">
                            <div class="d-flex flex-row align-self-center">
                                <i class="fas fa-pencil-alt text-info fa-3x me-4"></i>
                            </div>
                            <h4 class="text-dark">Total Project</h4>
                            <p></p>
                        </div>
                    </a>
                </div>
                <div class="align-self-center">
                    <?php
                    $conn = connect_to_database();
                    $sql = "SELECT COUNT(*) FROM projects";
                    $result = $conn->query($sql)->fetch_assoc()["COUNT(*)"];
                    echo "<h2 class=\"h1 mb-0\">" . $result . "</h2>";
                    ?>

                </div>
            </div>

        </div>
    </div>
</section>
<h2 class="px-5 py-5">List tasks</h2>

<div class="px-5">
    <table class="table table-striped px-5">
        <thead>
            <tr>
                <th>Project Title</th>
                <th>Task Title</th>
                <th>Status</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Assigned Employee</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $conn = connect_to_database();
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "SELECT * FROM tasks";
            $result = $conn->query($sql);
            foreach ($result as $a) {
                $id = $a['project_id'];
                $sql1 = "SELECT * FROM projects WHERE project_id = '$id' ";
                $result1 = $conn->query($sql1);
                foreach ($result1 as $b) {
            ?>
                    <tr>
                        <td><?php echo $b['project_title'] ?></td>
                        <td><?php echo $a['task_title'] ?></td>
                        <td><?php echo $a['task_status'] ?></td>
                        <td><?php echo $a['task_start'] ?></td>
                        <td><?php echo $a['task_end'] ?></td>
                        <td><?php echo $a['assign_user'] ?></td>
                        <td>
                            <a class="fa fa-eye btn btn-info btn-sm" href="../tasks/details_tasks.php?id=<?php echo $a['task_id'] ?>"></a>
                            <a class="fa fa-pencil btn btn-warning btn-sm" href="../tasks/edit_tasks.php?id=<?php echo $a['task_id'] ?>"></a>
                            <a class="fa fa-trash btn btn-danger btn-sm" href="../tasks/delete_tasks.php?id=<?php echo $a['task_id'] ?>"></a>
                        </td>

                    </tr>
            <?php
                }
            }
            $conn->close();
            ?>
        </tbody>
    </table>
    <script type="text/javascript">
        $(document).ready(
            function() {
                $('#service_table').DataTable({
                    "order": [],
                    "aoColumnDefs": [{
                        "bSortable": false,
                        "aTargets": [6],
                        "sWidth": "111px",
                        "aTargets": [6]
                    }]
                });
            });
        $(document).ready(function() {
            $('#inputState').on('change', function() {
                $('#recipient-name').val($('#inputState').find(':selected').data('start')),
                    $('#recipient-name1').val($('#inputState').find(':selected').data('end'))
            })
            $('#inputState1').select2({
                width: '100%'
            })
        })
    </script>
</div>