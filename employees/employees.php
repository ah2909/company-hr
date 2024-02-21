<?php
include "../utils.php";
$conn = connect_to_database();
if ($_SESSION["role"] === "admin")
    $emp_list = $conn->query("SELECT * FROM employees JOIN departments WHERE employees.department_id = departments.department_id");
else
    $emp_list = $conn->query("SELECT * FROM employees JOIN departments WHERE employees.department_id = departments.department_id AND employees.department_id = " . $_SESSION["department_id"]);
$dep_list = $conn->query("SELECT * FROM departments");
?>
<script type="text/javascript">
    document.title = 'Employees';

    function matchPassword() {
        var pw1 = document.getElementById("password");
        var pw2 = document.getElementById("confirm-password");
        if (pw1 != pw2) {
            alert("Passwords do not match");
        }
    }
</script>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <section class="panel" style="box-shadow: none;">
                <header class="panel-heading">
                    <h1>Employees</h1>
                    <?php
                    if ($_SESSION["role"] === "Admin") { ?>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Create</button>
                    <?php }
                    ?>
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog" role="document" style="max-width:100%;width:700px">
                            <div class="modal-content">
                                <div class="modal-header" style="display: flex;justify-content: space-between;position: relative;align-items: center;">
                                    <h4 class="modal-title" id="exampleModalLabel1" style="font-weight:700;font-size:20px; width:120px;"> Add new employee</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-left:70%;">
                                        <span aria-hidden="true">&times;</span></button>
                                </div>
                                <form method="post" action="add_user_processing.php" id="btnSubmit" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="row g-3 mb-3">
                                            <div class="col">
                                                <label class="form-label">First name <label style="color:red">*</label></label>
                                                <input type="text" class="form-control" name="first-name" required>
                                            </div>
                                            <div class="col">
                                                <label class="form-label">Middle name </label>
                                                <input type="text" class="form-control" name="middle-name">
                                            </div>
                                            <div class="col">
                                                <label class="form-label">Last name <label style="color:red">*</label></label>
                                                <input type="text" class="form-control" name="last-name" required>
                                            </div>
                                        </div>
                                        <div class="row g-3 mb-3">
                                            <div class="col">
                                                <label class="form-label">Avatar</label>
                                                <input type="file" class="form-control" id="avatar" name="avatar">
                                            </div>
                                            <div class="col">
                                                <label class="form-label">Date of birth <label style="color:red">*</label></label>
                                                <input type="date" class="form-control" id="date-of-birth" name="date-of-birth" required>
                                            </div>
                                        </div>
                                        <div class="row g-3 mb-3">
                                            <div class="col">
                                                <label class="form-label">Department <label style="color:red">*</label></label>
                                                <select class="form-select" name="department-id" required>
                                                    <option selected></option>
                                                    <?php
                                                    foreach ($dep_list as $dep) { ?>
                                                        <option value="<?php echo $dep["department_id"] ?>"><?php echo $dep["department_name"] ?></option>
                                                    <?php }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col">
                                                <label class="form-label">Role <label style="color:red">*</label></label>
                                                <select class="form-select" name="role">
                                                    <option selected></option>
                                                    <option value="Manager">Manager</option>
                                                    <option value="Staff">Staff</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Email <label style="color:red">*</label></label>
                                            <input type="email" class="form-control" name="email">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Phone number <label style="color:red">*</label></label>
                                            <input type="tel" class="form-control" name="phone-number">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Password <label style="color:red">*</label></label>
                                            <input type="password" class="form-control" name="password">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Confirm-password <label style="color:red">*</label></label>
                                            <input type="password" class="form-control" name="confirm-password">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Notes</label>
                                            <textarea class="form-control" id="notes" name="notes" rows="5"></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" name="submit" class="btn btn-primary" onclick="matchPassword()">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- <a href="?page=tasks" class="btn btn-success">Tasks</a>
          <a href="?page=fields" class="btn btn-success">Fields</a> -->
                </header>
                <div class="panel-body">
                    <table id="service_table" class="display">
                        <thead>
                            <tr>
                                <th scope="col">First name</th>
                                <th scope="col">Middle name</th>
                                <th scope="col">Last name</th>
                                <th scope="col">Date of birth</th>
                                <th scope="col">Email</th>
                                <th scope="col">Department</th>
                                <th scope="col">Role</th>
                                <th scope="col">Phone number</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $id = 0;
                            foreach ($emp_list as $emp) { ?>
                                <tr>
                                    <td><?php echo $emp["first_name"] ?></td>
                                    <td><?php echo $emp["middle_name"] ?></td>
                                    <td><?php echo $emp["last_name"] ?></td>
                                    <td><?php echo $emp["birth"] ?></td>
                                    <td><?php echo $emp["email"] ?></td>
                                    <td><?php echo $emp["department_name"] ?></td>
                                    <td><?php echo $emp["role"] ?></td>
                                    <td><?php echo $emp["phone_number"] ?></td>
                                    <td>
                                        <button type="button" class="fa fa-eye btn btn-info btn-sm" data-toggle="modal" data-target="#emp<?php echo $id ?>"></button>
                                        <a type="button" class="fa fa-trash btn btn-danger btn-sm" href="delete_employee_processing.php?id=<?php echo $emp["employee_id"] ?>"></a>
                                        <div class="modal fade" id="emp<?php echo $id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="exampleModalLabel1" style="font-weight:700;font-size:20px; width:120px;">Employee info</h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- <img src="../uploads/<?php echo $emp["avatar"] ?>" width="100%" height="100%"></img> -->
                                                        <form action="edit_user_processing.php" method="post" enctype="multipart/form-data">
                                                            <!-- <h2 class="text-primary">Employee info</h1> -->
                                                            <div class="row g-3 mb-3">
                                                                <div class="col">
                                                                    <label class="form-label">First name <label style="color:red">*</label></label>
                                                                    <input type="text" class="form-control" name="first-name" value="<?php echo $emp["first_name"] ?>" required>
                                                                </div>
                                                                <div class="col">
                                                                    <label class="form-label">Middle name</label>
                                                                    <input type="text" class="form-control" name="middle-name" value="<?php echo $emp["middle_name"] ?>">
                                                                </div>
                                                                <div class="col">
                                                                    <label class="form-label">Last name <label style="color:red">*</label></label>
                                                                    <input type="text" class="form-control" name="last-name" value="<?php echo $emp["last_name"] ?>" required>
                                                                </div>
                                                            </div>
                                                            <div class="row g-3 mb-3">
                                                                <div class="col">
                                                                    <label class="form-label">Avatar</label>
                                                                    <input type="file" class="form-control" id="avatar" name="avatar">
                                                                </div>
                                                                <div class="col">
                                                                    <label class="form-label">Date of birth <label style="color:red">*</label></label>
                                                                    <input type="date" class="form-control" id="date-of-birth" name="date-of-birth" value="<?php echo $emp["birth"] ?>" required>
                                                                </div>
                                                            </div>
                                                            <div class="row g-3 mb-3">
                                                                <div class="col">
                                                                    <label class="form-label">Department <label style="color:red">*</label></label>
                                                                    <select class="form-select" name="department-id" required>
                                                                        <?php
                                                                        foreach ($dep_list as $dep) { ?>
                                                                            <option value="<?php echo $dep["department_id"] ?>" <?php if ($dep["department_id"] == $emp["department_id"]) echo "selected"; ?>><?php echo $dep["department_name"] ?></option>
                                                                        <?php }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                                <div class="col">
                                                                    <label class="form-label">Role <label style="color:red">*</label></label>
                                                                    <select class="form-select" name="role" required>
                                                                        <!-- <option value="<?php echo $emp["role"] ?>" selected><?php echo $emp["role"] ?></option> -->
                                                                        <option value="Manager" <?php if ($emp["role"] === "Manager") echo "selected"; ?>>Manager</option>
                                                                        <option value="Staff" <?php if ($emp["role"] === "Staff") echo "selected"; ?>>Staff</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Email <label style="color:red">*</label></label>
                                                                <input type="email" class="form-control" name="email" value="<?php echo $emp["email"] ?>" readonly>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Phone number <label style="color:red">*</label></label>
                                                                <input type="tel" class="form-control" name="phone-number" value="<?php echo $emp["phone_number"] ?>" readonly>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Notes</label>
                                                                <textarea class="form-control" id="notes" name="notes" rows="5" value="<?php echo $emp["notes"] ?>"></textarea>
                                                            </div>
                                                            <?php
                                                            if ($_SESSION["role"] != "Staff") { ?>
                                                                <button type="submit" class="btn btn-primary">Update</button>
                                                            <?php }
                                                            ?>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                                $id += 1;
                            }
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
                                            "aTargets": [4],
                                            "sWidth": "111px",
                                            "aTargets": [4]
                                        }

                                    ],
                                });
                            });
                    </script>
                </div>
            </section>
        </div>
    </div>
</div>