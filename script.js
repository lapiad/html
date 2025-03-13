let students = {}; // Store student info
let lockers = {}; // Store locker assignments, PINs, and time logs
let logs = []; // Store locker usage logs
let selectedLocker = null;

document.getElementById("register-btn").addEventListener("click", function(event){
    event.preventDefault();
});
document.getElementById("locker-modal").addEventListener("click", function(event){
    event.preventDefault();
});

// Register a student
function registerStudent() {
    let name = document.getElementById("studentName").value;
    let studentId = document.getElementById("studentId").value;

    if (name === "" || studentId === "") {
        alert("Please enter both Name and Student ID.");
        return;
    }

    // Register student in the students object
    students[studentId] = { name };
    console.log(students);
    alert(`${name} (ID: ${studentId}) registered successfully!`);
    
}

// Open a locker modal
function openLocker(lockerId) {
    selectedLocker = lockerId;
    document.getElementById("lockerTitle").innerText = `Locker ${lockerId}`;
    document.getElementById("lockerPin").value = ""; // Clear previous PIN input

    if (lockers[lockerId]) {
        // Locker is assigned
        document.getElementById("lockerOwner").innerText = `Assigned to: ${lockers[lockerId].name}`;
        document.getElementById("lockerTime").innerText = `Time In: ${lockers[lockerId].timeIn}`;
    } else {
        // Locker is unassigned
        document.getElementById("lockerOwner").innerText = "Locker is unassigned.";
        document.getElementById("lockerTime").innerText = "";
    }

    document.getElementById("lockerModal").style.display = "block"; // Show the modal
}

// Close the modal
function closeModal() {
    document.getElementById("lockerModal").style.display = "none"; // Hide the modal
}

// Lock or unlock a locker
function lockUnlockLocker() {
    let pin = document.getElementById("lockerPin").value;
    let studentId = prompt("Enter your Student ID:");

    if (!students[studentId]) {
        alert("Student not registered!");
        return;
    }

    let lockerElement = document.querySelector(`.locker:nth-child(${selectedLocker})`);
    let currentTime = new Date().toLocaleString(); // Get the current time

    if (lockers[selectedLocker]) {
        // Locker is locked, check PIN
        if (lockers[selectedLocker].pin === pin && lockers[selectedLocker].studentId === studentId) {
            alert("Locker Unlocked!");

            // Log the unlock activity
            logs.push({
                lockerNo: selectedLocker,
                studentName: students[studentId].name,
                studentId: studentId,
                timeIn: lockers[selectedLocker].timeIn,
                timeOut: currentTime
            });

            updateLogTable(); // Update the log table after unlocking

            delete lockers[selectedLocker]; // Remove lock
            lockerElement.classList.remove("locked"); // Unlock the locker
        } else {
            alert("Incorrect PIN or Student ID!");
        }
    } else {
        // Lock the locker
        lockers[selectedLocker] = {
            pin, 
            studentId, 
            name: students[studentId].name, 
            timeIn: currentTime
        };
        console.log(lockers);
        alert(`Locker Locked by ${students[studentId].name}`);
        lockerElement.classList.add("locked"); // Lock the locker
    }

    closeModal(); // Close the modal after the action
}

// Update the log table
function updateLogTable() {
    let tableBody = document.getElementById("logTable");
    tableBody.innerHTML = ""; // Clear the table before updating

    // Loop through each log and add it to the table
    logs.forEach(log => {
        let row = `<tr>
            <td>${log.lockerNo}</td>
            <td>${log.studentName}</td>
            <td>${log.studentId}</td>
            <td>${log.timeIn}</td>
            <td>${log.timeOut}</td>
        </tr>`;
        tableBody.innerHTML += row; // Add the row to the table
    });
}
