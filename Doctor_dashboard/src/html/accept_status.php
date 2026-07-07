<?php
include("connection.php");

if (isset($_GET['id']) && $_GET['status'] == 'accept') {
    $appointment_id = intval($_GET['id']);

    $query = "SELECT * FROM appointments WHERE id = $appointment_id LIMIT 1";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) == 1) {
        $appointment = mysqli_fetch_assoc($result);

        $update = "UPDATE appointments SET status = 'Accepted' WHERE id = $appointment_id";
        $run_update = mysqli_query($conn, $update);

        if ($run_update) {
            $doctor_id = intval($appointment['doctor_id']);
            $patient_id = intval($appointment['patient_id']);
            $appointment_day = mysqli_real_escape_string($conn, $appointment['appointment_day']);
            $appointment_time = mysqli_real_escape_string($conn, $appointment['appointment_time']);
            $status = 'Accepted';
            $accepted_at = date('Y-m-d H:i:s');

            $insert = "INSERT INTO accepted_appointments (appointment_id, doctor_id, patient_id, appointment_day, appointment_time, status, accepted_at) 
                       VALUES ($appointment_id, $doctor_id, $patient_id, '$appointment_day', '$appointment_time', '$status', '$accepted_at')";

            $run_insert = mysqli_query($conn, $insert);

            if ($run_insert) {
                echo "
                <script>
                    alert('Appointment accepted and data inserted successfully!');
                    window.location.href = 'appointments.php';
                </script>";
                exit();
            } else {
                echo "Error inserting accepted appointment: " . mysqli_error($conn);
            }
        } else {
            echo "Error updating appointment status: " . mysqli_error($conn);
        }
    } else {
        echo "Appointment not found!";
    }
} else {
    echo "
    <script>
        alert('Invalid request!');
        window.location.href = 'index.php';
    </script>";
    exit();
}
?>
