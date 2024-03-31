<?php require 'handler.php'; ?>
<?php require 'layout/header.php'; ?>

<body class="w-full h-full flex flex-col  justify-center items-center">
    <h1 class="font-semibold text-xl text-center">Registration Form</h1>
    <form class="bg-slate-100 flex flex-col justify-center px-4 py-6 w-1/2" id="myForm">

        <div class="grid grid-cols-2 gap-4">
            <label for="fname" class="text-sm font-medium">First Name<span class="text-red-600">*</span></label>
            <div>
                <input type="text" name="fname" id="fname" class="border rounded-md w-full px-4 py-2 text-sm" placeholder="Enter Name" value="<?php echo $_POST['fname'] ?? ''; ?>">
                <span class="text-sm text-red-600"><?php echo $errors['fname'] ?? ''; ?></span>
            </div>
            <label for="lname" class="text-sm font-medium">Last Name<span class="text-red-600">*</span></label>
            <div>
                <input type="text" name="lname" id="lname" class="border rounded-md w-full px-4 py-2 text-sm" placeholder="Enter Name" value="<?php echo $_POST['lname'] ?? ''; ?>">
                <span class="text-sm text-red-600"><?php echo $errors['lname'] ?? ''; ?></span>
            </div>
            <label for="email" class="text-sm font-medium">E-mail <span class="text-red-600">*</span> </label>
            <div>
                <input type="text" name="email" class="border rounded-md w-full px-4 py-2 text-sm" placeholder="Enter Email" value="<?php echo $_POST['email'] ?? ''; ?>">
                <span class="text-sm text-red-600"><?php echo $errors['email'] ?? ''; ?></span>
            </div>

            <label for="contact" class="text-sm font-medium">Phone <span class="text-red-600">*</span> </label>
            <div>
                <input type="tel" name="contact" class="border rounded-md w-full px-4 py-2 text-sm" placeholder="Enter Phone Number" value="<?php echo $_POST['contact'] ?? ''; ?>">
                <span class="text-sm text-red-600"><?php echo $errors['contact'] ?? ''; ?></span>
            </div>

            <label for="password" class="text-sm font-medium">Password <span class="text-red-600">*</span> </label>
            <div>
                <input type="password" name="password" class="border rounded-md w-full px-4 py-2 text-sm mb-2" placeholder="Enter Password" value="<?php echo $_POST['password'] ?? ''; ?>">
                <span class="text-sm text-red-600"><?php echo $errors['password'] ?? ''; ?></span>
            </div>

            <label for="gender" class="text-sm font-medium">Gender<span class="text-red-600">*</span></label>
            <div class="flex flex-row gap-2 items-center">
                <input type="radio" name="gender" value="Male">Male
                <input type="radio" name="gender" value="Female">Female
                <input type="radio" name="gender" value="other">Other
                <span class="text-sm text-red-600"><?php echo $errors['gender'] ?? ''; ?></span>

            </div>


            <label for="address" class="text-sm font-medium">Address <span class="text-red-600">*</span> </label>
            <div>
                <textarea name="address" id="address" class="border rounded-md w-full px-4 py-2 text-sm mb-2" placeholder="Enter Address" rows="3" cols="15"><?php echo $_POST['address'] ?? ''; ?></textarea>
                <span class="text-sm text-red-600"><?php echo $errors['address'] ?? ''; ?></span>

            </div>
            <button type="submit" name="register" id="register" class="bg-blue-800 text-white w-full  px-4 py-2  rounded-md">SignUp</button>

    </form>
    <div id="error-messages">
       
    </div>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#register").click(function(e) {
                e.preventDefault();
                var fname = $("#fname").val();
                var lname = $("#lname").val();
                var email = $("#email").val();
                var contact = $("#contact").val();
                var password = $("#password").val();
                var gender = $("input[name='gender']:checked").val();
                var address = $("#address").val();

                // Send AJAX request to handler.php
                $.ajax({
                    url: "handler.php",
                    method: "POST",
                    data: {
                        register: true,
                        fname: fname,
                        lname: lname,
                        email: email,
                        contact: contact,
                        password: password,
                        gender: gender,
                        address: address
                    },
                    success: function(data) {
                        // Check if data is a JSON string
                        try {
                            var response = JSON.parse(data);
                            if (response.success) {
                                // Data saved successfully
                                alert("Data inserted Successfully");
                            } else {
                                // Validation errors occurred, display error messages
                                $("#error-messages").html(response.errors.join("<br>"));
                            }
                        } catch (error) {
                            // Data is not in JSON format, handle as needed
                            alert("Error: Unable to process the request");
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle error response
                        $("#error-messages").html("Error: " + xhr.statusText);
                    }

                });
            });
        });
    </script>


    <?php require('layout/footer.php') ?>