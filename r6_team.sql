CREATE TABLE r6_team (
    team_id INT PRIMARY KEY AUTO_INCREMENT,
    team_name VARCHAR(100),
    coach VARCHAR(100),
    nationality VARCHAR(100),
    ranking INT
);

INSERT INTO r6_team (team_id, team_name, coach, nationality, ranking) VALUES
(1, 'Team BDS', 'Elemzje', 'France', 1),
(2, 'G2 Esports', 'Shas', 'Germany', 2),
(3, 'Wolves Esports', 'Spark', 'Europe', 3),
(4, 'Virtus.pro', 'Krasno', 'Russia', 4),
(5, 'KOI', 'Txmpe', 'Spain', 5),
(6, 'MNM Gaming', 'LeonGids', 'UK', 6),
(7, 'Natus Vincere (NAVI)', 'Saves', 'Ukraine', 7),
(8, 'Spacestation Gaming (SSG)', 'Lycan', 'USA', 8),
(9, 'DarkZero Esports (DZ)', 'Panbazou', 'USA', 9),
(10, 'Oxygen Esports', 'FoxA', 'USA', 10),
(11, 'M80', 'Rb', 'USA', 11),
(12, 'Soniqs', 'Supr', 'USA', 12),
(13, 'w7m esports', 'Rdking', 'Brazil', 13),
(14, 'Team Liquid', 'Paluh', 'Brazil', 14),
(15, 'FaZe Clan', 'Cyber', 'Brazil', 15),
(16, 'Los + oNe', 'Novys', 'Brazil', 16),
(17, 'FURIA Esports', 'Miracle', 'Brazil', 17),
(18, 'FURY', 'Derpeh', 'Australia', 18),
(19, 'Elevate', 'HysteRiX', 'Southeast Asia', 19),
(20, 'Dplus', 'EnvyTaylor', 'South Korea', 20),
(21, 'SCARZ', 'Gatorada', 'Japan', 21);