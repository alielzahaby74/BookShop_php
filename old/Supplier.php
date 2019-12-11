<?php 

require "conn.php";
require "SupplierGPX.php";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$flag = 0;//to see if the book is there or no
	@$bookName = $_POST["title"];
	@$copies = $_POST['copies'];
	@$author = $_POST["author"];

	$query = "SELECT id, title, available FROM books WHERE title=:title";
	$stmt = $conn->prepare($query);
	$stmt->bindParam(":title", $bookName, PDO::PARAM_STR);
	$stmt->execute();
	$row = $stmt->fetch();
	if($stmt->rowCount() > 0)
	{
		$id = $row["id"];
		$supplies = $row["available"];
		$query = "UPDATE books SET available=:available WHERE id=:id";
		$supplies += $copies;
		$stmt = $conn->prepare($query);
		$stmt->bindParam(":available", $supplies, PDO::PARAM_INT);
		$stmt->bindParam(":id", $id, PDO::PARAM_INT);
		$stmt->execute();
		echo "<div class='success'>" . "BOOKS ARE ADDED SUCCESSFULLY!" . "</div>";
	}
	else
	{
		$query = "INSERT INTO books (title, author, available) VALUES (:title, :author, :available);";
		$stmt = $conn->prepare($query);
		$stmt->bindParam(":title", $bookName, PDO::PARAM_STR);
		$stmt->bindParam(":author", $author, PDO::PARAM_STR);
		$stmt->bindParam(":available", $copies, PDO::PARAM_INT);
		$stmt->execute();
		echo "<div class='success'>" . "NEW BOOK HAS BEEN ADDED!" . "</div>";
	}
}