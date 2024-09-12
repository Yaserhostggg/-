<?php
// الاتصال بقاعدة البيانات
$servername = "localhost";  // الخادم
$username = "root";         // اسم المستخدم
$password = "";             // كلمة المرور (افتراضية في XAMPP تكون فارغة)
$dbname = "famous_personalities";        // اسم قاعدة البيانات

// إنشاء اتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}

// ضبط الاتصال لاستخدام الترميز utf8
$conn->set_charset("utf8");

// استعلام لجلب البيانات من جدول الشخصيات
$sql = "SELECT name, age, description FROM personalities";
$result = $conn->query($sql);

$personalities = [];

// تحقق مما إذا كانت هناك نتائج
if ($result->num_rows > 0) {
    // استخراج البيانات وإضافتها إلى المصفوفة
    while($row = $result->fetch_assoc()) {
        $personalities[] = $row;
    }
}

// إغلاق الاتصال بقاعدة البيانات
$conn->close();

// إعداد هيدر JSON
header('Content-Type: application/json; charset=utf-8');

// تحويل البيانات إلى JSON وإرجاعها
echo json_encode($personalities, JSON_UNESCAPED_UNICODE);
?>