CREATE TABLE IF NOT EXISTS `users`
(
    `username` varchar(50) PRIMARY KEY NOT NULL,
    `password` varchar(50) NOT NULL
);
CREATE UNIQUE INDEX `users_username_uindex` ON `users` (username);