<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Robot Arm Control Panel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Robot Arm Control Panel</h2>
    <div id="control-panel">
        <?php
        for ($i = 1; $i <= 6; $i++) {
            echo "<label>Motor $i: <span id='val$i'>90</span></label><br>";
            echo "<input type='range' min='0' max='180' value='90' id='motor$i' oninput='updateValue($i)'><br><br>";
        }
        ?>
        <button onclick="resetMotors()">Reset</button>
        <button onclick="savePose()">Save Pose</button>
        <button onclick="runPose()">Run</button>
    </div>

    <h3>Saved Poses</h3>
    <table id="posesTable" border="1">
        <thead>
            <tr>
                <th>#</th>
                <th>Motor 1</th><th>Motor 2</th><th>Motor 3</th>
                <th>Motor 4</th><th>Motor 5</th><th>Motor 6</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>

    <script src="script.js"></script>
</body>
</html>