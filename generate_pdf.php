<?php
require('fpdf/fpdf.php');
$conn = new mysqli('localhost', 'username', 'password', 'database_name');

// Get feedback ID from POST request
$feedback_id = $_POST['feedback_id'];

// Fetch feedback data
$sql = "SELECT * FROM feedback WHERE feedback_id = $feedback_id";
$result = $conn->query($sql);
$feedback = $result->fetch_assoc();

// Create PDF
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);

// Add content
$pdf->Cell(40, 10, "Module: " . $feedback['module_name']);
$pdf->Ln();
$pdf->Cell(40, 10, "Lecturer: " . $feedback['lecturer']);
$pdf->Ln();
$pdf->Cell(40, 10, "Comment: ");
$pdf->Ln();
$pdf->MultiCell(0, 10, $feedback['comment']);

// Output the PDF
$pdf->Output();

$conn->close();
?>
