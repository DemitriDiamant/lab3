
<?php
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    exit("Please submit the tutoring request form.");
}

$course = $_POST["course"] ?? "";
$topic = trim($_POST["topic"] ?? "");
$preferredDate = $_POST["preferreddate"] ?? "";
$preferredTime = $_POST["preferredtime"] ?? "";

$errors = [];

$allowedCourses = ["IS 6465", "IS 6495", "IS 6570"];
$allowedTimes = ["Morning", "Afternoon", "Evening"];

if (!in_array($course, $allowedCourses)) {
    $errors[] = "Select a valid course.";
}

if (!in_array($preferredTime, $allowedTimes)) {
    $errors[] = "Select a valid preferred time.";
}

if ($topic === "" || mb_strlen($topic) > 120) {
    $errors[] = "Enter a topic of 1 to 120 characters.";
}

$date = DateTime::createFromFormat("!Y-m-d", $preferredDate);

if (!$date || $date->format("Y-m-d") !== $preferredDate) {
    $errors[] = "Enter a valid date.";
} elseif ($date < new DateTime("today")) {
    $errors[] = "Preferred date cannot be in the past.";
}

function safe($value) {
    return htmlspecialchars($value, ENT_QUOTES, "UTF-8");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tutoring Request Result</title>
</head>
<body>

<?php if ($errors): ?>
    <h1>Request Errors</h1>
    <ul>
        <?php foreach ($errors as $error): ?>
            <li><?= safe($error) ?></li>
        <?php endforeach; ?>
    </ul>
    <a href="request-form.html">Try Again</a>
<?php else: ?>
    <h1>Request received</h1>
    <p>Course: <?= safe($course) ?></p>
    <p>Topic: <?= safe($topic) ?></p>
    <p>Preferred Date: <?= safe($preferredDate) ?></p>
    <p>Preferred Time: <?= safe($preferredTime) ?></p>
    <p>Status: Pending review</p>
<?php endif; ?>

</body>
</html>
