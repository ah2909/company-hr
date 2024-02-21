CREATE TABLE `tasks` (
  `task_id` int(6) NOT NULL,
  `project_id` int(6) NOT NULL,
  `assign_user` varchar(64) DEFAULT NULL,
  `task_title` varchar(15) NOT NULL,
  `task_status` varchar(100) NOT NULL,
  `task_start` date DEFAULT NULL,
  `task_end` date DEFAULT NULL,
  `task_details` varchar(100) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_id`);
ALTER TABLE `tasks`
  MODIFY `task_id` int(6) NOT NULL AUTO_INCREMENT;
ALTER TABLE `tasks`
  ADD FOREIGN KEY (`project_id`) REFERENCES `projects`(`project_id`) ;
INSERT INTO `tasks` (`project_id`, `assign_user`,`task_title`, `task_status`, `task_start`, `task_end`,`task_details`) VALUES
('1','dan','hot americano', 'disabled', '2022-11-29', '2022-11-29',''),
('2','dan','iced americano', 'disabled', '2022-11-29', '2022-11-29','');
COMMIT;