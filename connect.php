<?php
$conn = mysqli_connect("localhost", "root", "", "college");
echo "<center>";
if (!$conn) {
    echo "Error in connection" . "<br>";
} else {
    echo "Connected Successfully!" . "<br>";
}

$sql = "INSERT INTO student (Rollno, Name, Age, course_id) VALUES (1, 'Arpitha', 21, 102),(2, 'Binu' ,21, 101),(3,'Anu', 21, 101),(5,'Jeevan', 21, 101)";

if (mysqli_query($conn, $sql)) {
    echo "Inserted Successfully" . "<br>";
} else {
    echo "Error in record insertion" . "<br>";
}

$select_query = "SELECT * FROM student";
$result = mysqli_query($conn, $select_query);

if (mysqli_num_rows($result) > 0)
 {
    echo "<h2>Student Table</h2>";
    echo "<table border='1',width='1000',height='500'>
            <tr>
                <th>Roll No</th>
                <th>Name</th>
                <th>Age</th>
                <th>Course ID</th>
            </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['Rollno'] . "</td>";
        echo "<td>" . $row['Name'] . "</td>";
        echo "<td>" . $row['Age'] . "</td>";
        echo "<td>" . $row['course_id'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No records found in the student table";
}


/*$select_query = "SELECT * FROM course";
$result = mysqli_query($conn, $select_query);

if (mysqli_num_rows($result) > 0)
 {
    echo "<h2>Course Table</h2>";
    echo "<table border='1'>
            <tr>
                <th>COURSE ID</th>
                <th>COURSE</th>
                <th>DURATION</th>
            </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['course_id'] . "</td>";
        echo "<td>" . $row['course'] . "</td>";
        echo "<td>" . $row['duration'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No records found in the student table";
}*/




echo "</center>";
mysqli_close($conn);
?>
