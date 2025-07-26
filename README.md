Robot Arm Control Panel

A simple web interface to control a robot arm using sliders. Built with HTML, CSS, JavaScript, PHP, and MySQL.

Features

- Control 6 motors using sliders
- Save poses to a database
- Load and delete saved poses
- Set pose status to 0 (Run command)

File Structure

- index.php – Main interface
- script.js – Frontend logic
- style.css – Page styling
- save_pose.php – Save pose
- get_run_pose.php – Get all poses
- load_pose.php – Load single pose
- remove_pose.php – Delete pose
- update_status.php – Set status = 0

 Database

- Database: my_project
- Table: poses with columns: id, pose_name, motor1-6, status

 How to Run

1. Place the folder in xampp/htdocs/
2. Start Apache from XAMPP
3. Open http://localhost/my_project/index.php

