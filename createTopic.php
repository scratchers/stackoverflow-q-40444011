<?php

// returns an intance of PDO
// https://github.com/jpuck/qdbp
$pdo = require __DIR__.'/mei_DV59j8_A.pdo.php';

// dummy signin
session_start();
$_SESSION['signedIn'] = true;
$_SESSION['userid'] = 42;

//show form if not posted
if($_SERVER['REQUEST_METHOD'] != 'POST'){

	$sql = "SELECT * FROM category;";

	// run query
	$result = $pdo->query($sql);

	?>

	<form method="post" action="createTopic.php">
	Choose a category:
	</br>
	</br>

	<?php
	// get results
	while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
		echo "
			<div class= 'choice'>
				<input type='radio' name='category' value='$row[idcategory]'/>
				$row[categorySubject]
			</div>
			</br>
		";
	}

	echo '
		Topic: <input type="text" name="topic" minlength="3" required>
		</br></br>
		<input type="submit" value="Add Topic" required>
	</form>
	';

}


if ($_POST){
	if(!isset($_SESSION['signedIn']) && $_SESSION['signedIn'] == false){
		echo 'You must be signed in to contribute';
	} else {
		// simulate your date input
		$date = date("Y-m-d");

		// bind parameters
		$sql = "
			INSERT INTO topic (
				subject,   topicDate,  users_idusers,  category_idcategory,  category_users_idusers
			) VALUES(
				:subject, :topicDate, :users_idusers, :category_idcategory, :category_users_idusers
			);
		";

		// prepare and execute
		$statement = $pdo->prepare($sql);
		$statement->execute([
			'subject' => "($_POST[topic])",
			'topicDate' => $date,
			'users_idusers' => $_SESSION['userid'],
			// to answer your question, here's your variable
			'category_idcategory' => $_POST['category'],
			'category_users_idusers' => $_SESSION['userid'],
		]);

		echo "Added!";
	}
}