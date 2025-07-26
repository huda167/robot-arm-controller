function updateValue(i) {
    document.getElementById(`val${i}`).textContent = document.getElementById(`motor${i}`).value;
}

function resetMotors() {
    for (let i = 1; i <= 6; i++) {
        document.getElementById(`motor${i}`).value = 90;
        updateValue(i);
    }
}

function savePose() {
    const data = {};
    for (let i = 1; i <= 6; i++) {
        data[`motor${i}`] = document.getElementById(`motor${i}`).value;
    }

    fetch("save_pose.php", {
        method: "POST",
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(data)
    }).then(() => loadTable());
}

function loadTable() {
    fetch("get_run_pose.php")
        .then(res => res.json())
        .then(data => {
            const table = document.querySelector("#posesTable tbody");
            table.innerHTML = "";
            data.forEach((pose, index) => {
                table.innerHTML += `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${pose.motor1}</td><td>${pose.motor2}</td>
                        <td>${pose.motor3}</td><td>${pose.motor4}</td>
                        <td>${pose.motor5}</td><td>${pose.motor6}</td>
                        <td>
                            <button onclick='loadPose(${pose.id})'>Load</button>
                            <button onclick='removePose(${pose.id})'>Remove</button>
                        </td>
                    </tr>
                `;
            });
        });
}

function loadPose(id) {
    fetch(`load_pose.php?id=${id}`)
        .then(res => res.json())
        .then(pose => {
            for (let i = 1; i <= 6; i++) {
                document.getElementById(`motor${i}`).value = pose[`motor${i}`];
                updateValue(i);
            }
        });
}

function removePose(id) {
    fetch(`remove_pose.php?id=${id}`)
        .then(() => loadTable());
}

function runPose() {
    fetch("update_status.php")
        .then(() => alert("Status updated to 0"));
}

window.onload = loadTable;