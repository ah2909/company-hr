<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <a type="button" class="btn btn-info" href="?page=signup">+Add</a>
        </div>
    </div>
    <table class="table">
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
            $conn = connect_to_database();
            $sql = "SELECT * FROM employees ORDER BY email";
            $emp_list = $conn->query($sql);
            $id = 0;
            foreach ($emp_list as $emp) { ?>
                <tr>
                    <td><?php echo $emp["first_name"] ?></td>
                    <td><?php echo $emp["middle_name"] ?></td>
                    <td><?php echo $emp["last_name"] ?></td>
                    <td><?php echo $emp["birth"] ?></td>
                    <td><?php echo $emp["email"] ?></td>
                    <td><?php echo $emp["department"] ?></td>
                    <td><?php echo $emp["role"] ?></td>
                    <td><?php echo $emp["phone_number"] ?></td>
                    <td>
                        <button id="view-product" type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#emp<?php echo $id ?>">View</button>
                        <div class="modal fade" id="emp<?php echo $id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><?php echo $emp["first_name"] . " " . $emp["middle_name"] . " " . $emp["last_name"] ?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- <img src="../uploads/<?php echo $emp["avatar"] ?>" width="100%" height="100%"></img> -->
                                        <form action="edit_user_processing.php" method="post" enctype="multipart/form-data">
                                            <h2 class="text-primary">Employee info</h1>
                                                <div class="row g-3 mb-3">
                                                    <div class="col">
                                                        <label class="form-label">First name <label style="color:red">*</label></label>
                                                        <input type="text" class="form-control" name="first-name" value="<?php echo $emp["first_name"] ?>">
                                                    </div>
                                                    <div class="col">
                                                        <label class="form-label">Middle name</label>
                                                        <input type="text" class="form-control" name="middle-name" value="<?php echo $emp["middle_name"] ?>">
                                                    </div>
                                                    <div class="col">
                                                        <label class="form-label">Last name <label style="color:red">*</label></label>
                                                        <input type="text" class="form-control" name="last-name" value="<?php echo $emp["last_name"] ?>">
                                                    </div>
                                                </div>
                                                <div class="row g-3 mb-3">
                                                    <div class="col">
                                                        <label class="form-label">Avatar</label>
                                                        <input type="file" class="form-control" id="avatar" name="avatar">
                                                    </div>
                                                    <div class="col">
                                                        <label class="form-label">Date of birth <label style="color:red">*</label></label>
                                                        <input type="date" class="form-control" id="date-of-birth" name="date-of-birth" value="<?php echo $emp["birth"] ?>">
                                                    </div>
                                                </div>
                                                <div class="row g-3 mb-3">
                                                    <div class="col">
                                                        <label class="form-label">Department <label style="color:red">*</label></label>
                                                        <select class="form-select" name="department">
                                                            <option selected></option>
                                                            <option value=""></option>
                                                            <option value=""></option>
                                                        </select>
                                                    </div>
                                                    <div class="col">
                                                        <label class="form-label">Role <label style="color:red">*</label></label>
                                                        <select class="form-select" name="role">
                                                            <option value="<?php echo $emp["role"] ?>" selected><?php echo $emp["role"] ?></option>
                                                            <option value="Manager">Manager</option>
                                                            <option value="Staff">Staff</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Email <label style="color:red">*</label></label>
                                                    <input type="email" class="form-control" name="email" value="<?php echo $emp["email"] ?>" readonly>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Phone number <label style="color:red">*</label></label>
                                                    <input type="tel" class="form-control" name="phone-number" value="<?php echo $emp["phone_number"] ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Notes</label>
                                                    <textarea class="form-control" id="notes" name="notes" rows="5" value="<?php echo $emp["notes"] ?>"></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Submit</button>
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
</div>