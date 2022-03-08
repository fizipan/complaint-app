CREATE TABLE IF NOT EXISTS `country` (
    `id` bigint(64) NOT NULL,
    `name` varchar(255) NOT NULL,
    `created_at` timestamp NULL,
    `updated_at` timestamp NULL,
    `deleted_at` timestamp NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO country (id, name, created_at, updated_at, deleted_at)
VALUES (1, 'Indonesia', '2022-02-15 20:26:59', '2022-02-15 20:26:59', NULL);
