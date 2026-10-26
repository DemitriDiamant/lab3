
<?php
// Indexed array
$timeSlots = ["Morning", "Afternoon", "Evening"];

echo "<h2>Indexed Array</h2>";
echo $timeSlots[0] . "<br>";
echo $timeSlots[1] . "<br>";

// Associative array
$request = [
    "course" => "IS 6465",
    "topic" => "PHP arrays",
    "status" => "Pending review"
];

echo "<h2>Associative Array</h2>";
echo htmlspecialchars($request["topic"]) . "<br>";

// Multidimensional array
$requests = [
    ["student" => "Amina", "course" => "IS 6465", "status" => "Pending review"],
    ["student" => "Diego", "course" => "IS 6495", "status" => "Matched"]
];

echo "<h2>Multidimensional Array</h2>";

foreach ($requests as $item) {
    echo htmlspecialchars($item["student"]) . " - ";
    echo htmlspecialchars($item["course"]) . " - ";
    echo htmlspecialchars($item["status"]) . "<br>";
}

// Foreach loop
$courses = ["IS 6465", "IS 6495", "IS 6570"];

echo "<h2>Course Options</h2>";
echo "<select>";

foreach ($courses as $course) {
    $safeCourse = htmlspecialchars($course, ENT_QUOTES, "UTF-8");
    echo "<option value=\"$safeCourse\">$safeCourse</option>";
}

echo "</select>";
?>
