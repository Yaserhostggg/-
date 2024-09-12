<?php
$servername = "localhost";
$username = "root";  // اسم المستخدم الافتراضي
$password = "";      // عادة كلمة المرور تكون فارغة في XAMPP
$dbname = "famous_personalities";  // اسم قاعدة البيانات التي أنشأتها

// إنشاء اتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
  die("فشل الاتصال: " . $conn->connect_error);
}
?>