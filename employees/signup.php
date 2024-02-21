<main class="container-sm p-5 my-5 border">
    <form action="#" method="post" enctype="multipart/form-data">
        <h2 class="text-primary">New employee</h1>
            <div class="row g-3 mb-3">
                <div class="col">
                    <label class="form-label">First name <label style="color:red">*</label></label>
                    <input type="text" class="form-control" name="first-name" required>
                </div>
                <div class="col">
                    <label class="form-label">Middle name</label>
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
                    <select class="form-select" name="department" required>
                        <option selected></option>
                        <option value=""></option>
                        <option value=""></option>
                    </select>
                </div>
                <div class="col">
                    <label class="form-label">Role <label style="color:red">*</label></label>
                    <select class="form-select" name="role" required>
                        <option selected></option>
                        <option value="1">Manager</option>
                        <option value="2">Staff</option>
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Email <label style="color:red">*</label></label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Phone number <label style="color:red">*</label></label>
                <input type="tel" class="form-control" name="phone-number" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password <label style="color:red">*</label></label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Confirm-password <label style="color:red">*</label></label>
                <input type="password" class="form-control" name="confirm-password" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Notes</label>
                <textarea class="form-control" id="notes" name="notes" rows="5"></textarea>
            </div>
            <?php
            if (isset($_GET["error"])) {
            ?><p class="error-submit" style="color:red;"><?php echo $_GET["error"]; ?></p><?php
                                                                                        }
                                                                                            ?>
            <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</main>