CREATE DATABASE IF NOT EXISTS maniank;
USE maniank;



CREATE TABLE `categories` (
  `id` int(255) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `books` (
  `id` int(255) NOT NULL,
  `user_id` int(255) DEFAULT NULL,
  `category_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `publication_date` date NOT NULL,
  `author` varchar(255) NOT NULL,
  `borrow` tinyint(1) DEFAULT NULL,
  `borrow_user_id` int(4) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(100) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_book_category` (`category_id`);


ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
ADD PRIMARY KEY (`id`);

ALTER TABLE `books`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;


ALTER TABLE `categories`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `books`
  ADD CONSTRAINT `fk_book_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `fk_book_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);



INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'NoSql', 'No SQl desc', '2021-03-17 12:38:14', '2021-03-18 00:00:40'),
(2, 'BlockChain', 'Cadema de bloques', '2021-03-17 12:39:08', '2021-03-17 12:39:08'),
(3, 'Finanzas', 'Educacion financiera', '2021-03-17 12:39:08', '2021-03-17 12:39:08'),
(4, 'Coding', 'Developers', '2021-03-17 23:31:39', '2021-03-17 23:31:39');

INSERT INTO `users` (`id`, `name`, `surname`, `role`, `email`, `password`, `description`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, 'admin', 'admin', 'ROLE_ADMIN', 'admin@admin.com', 'admin', 'descripcion admin', '2021-03-17 12:36:46', '2021-03-17 12:36:46', NULL),
(2, 'Arthur', 'Morgan', 'ROLE_USER', 'a@a.com', '12345', NULL, NULL, NULL, NULL),
(3, 'Dutch', 'Van der linde', 'ROLE_USER', 'v@v.com', '123456', NULL, NULL, NULL, NULL);


INSERT INTO `books` (`id`, `user_id`, `category_id`, `name`, `publication_date`, `author`, `borrow`, `borrow_user_id`, `content`, `created_at`, `updated_at`) VALUES
(2, 1, 2, 'Polkadot', '2021-03-25', 'Dutch', 0, 0, 'Dot\'s, Parachouting, dropshiping', '2021-03-17 12:40:11', '2021-03-17 12:40:11'),
(3, 1, 3, 'Wallstreet finance', '2021-03-22', 'Collen', 0, 0, 'investing money', '2021-03-17 12:41:53', '2021-03-17 12:41:53'),
(4, 1, 3, 'Rich Dad', '2021-03-01', 'Robert', 0, 0, 'Make the mony works for you', '2021-03-17 12:41:53', '2021-03-17 12:41:53'),
(5, 1, 1, 'PC gamer', '2021-03-11', 'Sam Builder', 0, 0, 'Asus', '2021-03-17 12:43:44', '2021-03-19 16:46:39'),
(10, NULL, 4, 'Game of thrones', '2012-01-01', 'G. G. Martin', 1, 2, 'qqq', '2021-03-18 15:00:02', '2021-03-19 18:44:11'),
(26, NULL, 1, 'Angular  Mateial Tutorial', '2021-03-24', 'Data table pagination', 0, 0, NULL, '2021-03-22 17:20:24', '2021-03-22 17:20:24'),
(27, NULL, 1, 'Remove add', '2021-03-17', 'kendo', 0, 0, NULL, '2021-03-22 18:47:26', '2021-03-22 18:47:26'),
(28, NULL, 3, 'Reddead', '2021-03-25', 'Arthur Morgan', 0, 0, NULL, '2021-03-22 18:55:54', '2021-03-22 18:55:54'),
(29, NULL, 2, 'Texas Lone start state', '2021-04-01', 'Jim rainor', 0, 0, 'asdasd', '2021-03-22 19:33:31', '2021-03-22 19:55:04'),
(31, NULL, 4, 'Cronixsss', '2021-04-01', 'Kuns25sss', 1, 1, NULL, '2021-03-22 21:07:38', '2021-03-22 21:07:53');