<?php require 'handler.php';?>
<?php require 'layout/header.php'; ?>

<body class="w-full h-full flex flex-col  justify-center items-center">
    <h1 class="font-semibold text-xl text-center">Login Form</h1>
    <form class="bg-slate-100 flex flex-col justify-center px-4 py-6 w-1/2" name="registration" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

        <div class="grid grid-cols-2 gap-4">
            
            <label for="email" class="text-sm font-medium">E-mail <span class="text-red-600">*</span> </label>
            <div>
                <input type="text" name="email" class="border rounded-md w-full px-4 py-2 text-sm" placeholder="Enter Email" >
                <span class="text-sm text-red-600"><?php echo $errors['email'] ?? ''; ?></span>
            </div>

            <label for="password" class="text-sm font-medium">Password <span class="text-red-600">*</span> </label>
            <div>
                <input type="password" name="password" class="border rounded-md w-full px-4 py-2 text-sm mb-2" placeholder="Enter Password">
                <span class="text-sm text-red-600"><?php echo $errors['password'] ?? ''; ?></span>
            </div>
        
        <button type="submit" name="login" id="login" class="bg-blue-800 text-white w-full  px-4 py-2  rounded-md">Login</button>

    </form>
<?php require('layout/footer.php') ?>

