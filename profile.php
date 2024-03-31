<?php
include_once 'database.php';
session_start();
if(!isset($_SESSION['user_id'])){
    header('location:login.php');
}
require 'layout/header.php';?>
<div>
    <table class="border w-full text-center">
        <thead>
        <tr>
            <th class="border">Id</th>
            <th class="border">First Name</th>
            <th class="border">Last Name</th>
            <th class="border">Email</th>
            <th class="border">Contact Number</th>
            <th class="border">Gender</th>
            <th class="border">Address</th>
            <th class="border">Action</th>
        </tr>
        </thead>
        <tbody>
            <?php 
            $id = $_SESSION['user_id'];
            $db = new Database();
            $sql = "select * from users where id='$id'";
            $db->sql($sql);
            $rows = $db->getResult();?>
            <?php foreach($rows as $row):?>
            <tr>
                <td class="border"><?= $row['id']; ?></td>
                <td class="border"><?= $row['fname']; ?></td>
                <td class="border"><?= $row['lname']; ?></td>
                <td class="border"><?= $row['email']; ?></td>
                <td class="border"><?= $row['contact']; ?></td>
                <td class="border"><?= $row['gender']; ?></td>
                <td class="border"><?= $row['address']; ?></td>
                <td class="flex gap-4 justify-center items-center">
                    <a class="bg-blue-800 rounded-md text-white text-sm px-4 py-2" href="./update.php?id=<?= $row['id']; ?>">Edit</a>
                    <a class="bg-blue-800 rounded-md text-white text-sm px-4 py-2" href="./delete.php?id=<?= $row['id']; ?>">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php require 'layout/footer.php';?>