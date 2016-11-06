DROP TABLE IF EXISTS `topic`;
DROP TABLE IF EXISTS `category`;

CREATE TABLE IF NOT EXISTS `category` (
	idcategory INT AUTO_INCREMENT PRIMARY KEY,
	categorySubject VARCHAR(21),
	users_idusers INT
);

CREATE TABLE IF NOT EXISTS `topic` (
	subject VARCHAR(21),
	topicDate DATE,
	users_idusers INT,
	category_idcategory INT,
	category_users_idusers INT,
	FOREIGN KEY (category_idcategory) REFERENCES `category`(idcategory)
);

-- seed data
INSERT INTO `category` (categorySubject) VALUES
('something boring'),
('something interesting'),
('something amazing');
