<?php
require "conn.php";
require "GPX.php";

if($_SERVER['REQUEST_METHOD'] == "POST")
{
	$query = "SELECT id, title, available FROM books";
	$title = $_POST["title"]; //to get the book title from the user
	$neededBooks = $_POST["available"];//to get the number of books that he needs
	$stmt = $conn->prepare($query);//getting the book id title active from the database
	$stmt->execute();
	while($row = $stmt->fetch())
	{
		if($row["title"] == $title && $row["available"] >= $neededBooks)
		{
			$id = $row["id"];
			$newnum = $row["available"];
			$newnum -=$neededBooks;
			$query = "UPDATE books SET available =:available WHERE id=:id";
			$stmt = $conn->prepare($query);
			$stmt->bindParam(":available", $newnum, PDO::PARAM_INT);
			$stmt->bindParam(":id", $id, PDO::PARAM_INT);
			$stmt->execute();
			break;
		}
	}
	header("Location: Borrow.php");
	//header("Location: GPX.php");
}