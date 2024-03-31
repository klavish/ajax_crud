<?php require 'handler.php';?>
<?php require 'layout/header.php'; ?>
<?php include_once 'database.php'; ?>


<body class="w-full h-full flex flex-col  justify-center items-center">
    <h1 class="font-semibold text-xl text-center">Update Form</h1>
    <form class="bg-slate-100 flex flex-col justify-center px-4 py-6 w-1/2" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

        <div class="grid grid-cols-2 gap-4">
            <label for="fname" class="text-sm font-medium">First Name<span class="text-red-600">*</span></label>
            <div>
                <input type="text" name="fname" id="fname" class="border rounded-md w-full px-4 py-2 text-sm" placeholder="Enter Name" value="<?=  $row['fname'] ?? ''; ?>">
                <span class="text-sm text-red-600"><?php echo $errors['fname'] ?? ''; ?></span>
            </div>
            <label for="lname" class="text-sm font-medium">Last Name<span class="text-red-600">*</span></label>
            <div>
                <input type="text" name="lname" id="lname" class="border rounded-md w-full px-4 py-2 text-sm" placeholder="Enter Name" value="<?= $row['lname'] ?? ''; ?>">
                <span class="text-sm text-red-600"><?php echo $errors['lname'] ?? ''; ?></span>
            </div>
            <label for="email" class="text-sm font-medium">E-mail <span class="text-red-600">*</span> </label>
            <div>
                <input type="text" name="email" class="border rounded-md w-full px-4 py-2 text-sm" placeholder="Enter Email" value="<?= $row['email'] ?? ''; ?>">
                <span class="text-sm text-red-600"><?php echo $errors['email'] ?? ''; ?></span>
            </div>

            <label for="contact" class="text-sm font-medium">Phone <span class="text-red-600">*</span> </label>
            <div>
                <input type="tel" name="contact" class="border rounded-md w-full px-4 py-2 text-sm" placeholder="Enter Phone Number" value="<?= $row['contact'] ?? ''; ?>">
                <span class="text-sm text-red-600"><?php echo $errors['contact'] ?? ''; ?></span>
            </div>

            <label for="password" class="text-sm font-medium">Password <span class="text-red-600">*</span> </label>
            <div>
                <input type="password" name="password" class="border rounded-md w-full px-4 py-2 text-sm mb-2" placeholder="Enter Password" value="">
                <span class="text-sm text-red-600"><?php echo $errors['password'] ?? ''; ?></span>
            </div>

            <label for="gender" class="text-sm font-medium">Gender<span class="text-red-600">*</span></label>
            <div class="flex flex-row gap-2 items-center">
                <input type="radio" name="gender" value="Male" <?php if($row['gender'] == 'Male'){ echo 'checked';}?>>Male
                <input type="radio" name="gender" value="Female" <?php if($row['gender'] == 'Female'){ echo 'checked';}?>>Female
                <input type="radio" name="gender" value="other" <?php if($row['gender'] == 'Other'){ echo 'checked';}?>>Other
                <span class="text-sm text-red-600"><?php echo $errors['gender'] ?? ''; ?></span>

            </div>

            <label for="address" class="text-sm font-medium">Address <span class="text-red-600">*</span> </label>
            <div>
                <textarea name="address" id="address" class="border rounded-md w-full px-4 py-2 text-sm mb-2" placeholder="Enter Address" rows="3" cols="15"><?= $row['address'] ?? ''; ?></textarea>
                <span class="text-sm text-red-600"><?php echo $errors['address'] ?? ''; ?></span>

            </div>
        
        <button type="submit" name="update" id="update" class="bg-blue-800 text-white w-full  px-4 py-2  rounded-md">Update</button>

    </form>
<?php require('layout/footer.php') ?>

