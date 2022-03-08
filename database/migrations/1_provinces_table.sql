CREATE TABLE IF NOT EXISTS `provinces` (
    `id` bigint(64) unsigned NOT NULL,
    `country_id` bigint(64) unsigned NOT NULL,
    `name` varchar(255) NULL,
    `alt_name` varchar(255) NULL,
    `latitude` float(8) NULL,
    `longitude` float(8) NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO provinces (id, country_id, name, alt_name, latitude, longitude) VALUES (11, 1, 'ACEH', 'ACEH', '4.36855', '97.0253');
INSERT INTO provinces (id, country_id, name, alt_name, latitude, longitude) VALUES (12, 1, 'SUMATERA UTARA', 'SUMATERA UTARA', '2.19235', '99.38122');
INSERT INTO provinces (id, country_id, name, alt_name, latitude, longitude) VALUES (13, 1, 'SUMATERA BARAT', 'SUMATERA BARAT', '-1.34225', '100.0761');
INSERT INTO provinces (id, country_id, name, alt_name, latitude, longitude) VALUES (14, 1, 'RIAU', 'RIAU', '0.50041', '101.54758');
INSERT INTO provinces (id, country_id, name, alt_name, latitude, longitude) VALUES (15, 1, 'JAMBI', 'JAMBI', '-1.61157', '102.7797');
INSERT INTO provinces (id, country_id, name, alt_name, latitude, longitude) VALUES (16, 1, 'SUMATERA SELATAN', 'SUMATERA SELATAN', '-3.12668', '104.09306');
INSERT INTO provinces (id, country_id, name, alt_name, latitude, longitude) VALUES (17, 1, 'BENGKULU', 'BENGKULU', '-3.51868', '102.53598');
INSERT INTO provinces (id, country_id, name, alt_name, latitude, longitude) VALUES (18, 1, 'LAMPUNG', 'LAMPUNG', '-4.8555', '105.0273');
INSERT INTO provinces (id, country_id, name, alt_name, latitude, longitude) VALUES (19, 1, 'KEPULAUAN BANGKA BELITUNG', 'KEPULAUAN BANGKA BELITUNG', '-2.75775', '107.58394');
INSERT INTO provinces (id, country_id, name, alt_name, latitude, longitude) VALUES (21, 1, 'KEPULAUAN RIAU', 'KEPULAUAN RIAU', '-0.15478', '104.58037');
INSERT INTO provinces (id, country_id, name, alt_name, latitude, longitude) VALUES (31, 1, 'DKI JAKARTA', 'DKI JAKARTA', '6.1745', '106.8227');
INSERT INTO provinces (id, country_id, name, alt_name, latitude, longitude) VALUES (32, 1, 'JAWA BARAT', 'JAWA BARAT', '-6.88917', '107.64047');
INSERT INTO provinces (id, country_id, name, alt_name, latitude, longitude) VALUES (33, 1, 'JAWA TENGAH', 'JAWA TENGAH', '-7.30324', '110.00441');
INSERT INTO provinces (id, country_id, name, alt_name, latitude, longitude) VALUES (34, 1, 'DI YOGYAKARTA', 'DI YOGYAKARTA', '7.7956', '110.3695');
INSERT INTO provinces (id, country_id, name, alt_name, latitude, longitude) VALUES (35, 1, 'JAWA TIMUR', 'JAWA TIMUR', '-6.96851', '113.98005');
INSERT INTO provinces (id, country_id, name, alt_name, latitude, longitude) VALUES (36, 1, 'BANTEN', 'BANTEN', '-6.44538', '106.13756');
INSERT INTO provinces (id, country_id, name, alt_name, latitude, longitude) VALUES (51, 1, 'BALI', 'BALI', '-8.23566', '115.12239');
INSERT INTO provinces (id, country_id, name, alt_name, latitude, longitude) VALUES (52, 1, 'NUSA TENGGARA BARAT', 'NUSA TENGGARA BARAT', '-8.12179', '117.63696');
INSERT INTO provinces (id, country_id, name, alt_name, latitude, longitude) VALUES (53, 1, 'NUSA TENGGARA TIMUR', 'NUSA TENGGARA TIMUR', '-8.56568', '120.69786');
INSERT INTO provinces (id, country_id, name, alt_name, latitude, longitude) VALUES (61, 1, 'KALIMANTAN BARAT', 'KALIMANTAN BARAT', '-0.13224', '111.09689');
INSERT INTO provinces (id, country_id, name, alt_name, latitude, longitude) VALUES (62, 1, 'KALIMANTAN TENGAH', 'KALIMANTAN TENGAH', '-1.49958', '113.29033');
INSERT INTO provinces (id, country_id, name, alt_name, latitude, longitude) VALUES (63, 1, 'KALIMANTAN SELATAN', 'KALIMANTAN SELATAN', '-2.94348', '115.37565');
INSERT INTO provinces (id, country_id, name, alt_name, latitude, longitude) VALUES (64, 1, 'KALIMANTAN TIMUR', 'KALIMANTAN TIMUR', '0.78844', '116.242');
INSERT INTO provinces (id, country_id, name, alt_name, latitude, longitude) VALUES (65, 1, 'KALIMANTAN UTARA', 'KALIMANTAN UTARA', '2.72594', '116.911');
INSERT INTO provinces (id, country_id, name, alt_name, latitude, longitude) VALUES (71, 1, 'SULAWESI UTARA', 'SULAWESI UTARA', '0.65557', '124.09015');
INSERT INTO provinces (id, country_id, name, alt_name, latitude, longitude) VALUES (72, 1, 'SULAWESI TENGAH', 'SULAWESI TENGAH', '-1.69378', '120.80886');
INSERT INTO provinces (id, country_id, name, alt_name, latitude, longitude) VALUES (73, 1, 'SULAWESI SELATAN', 'SULAWESI SELATAN', '-3.64467', '119.94719');
INSERT INTO provinces (id, country_id, name, alt_name, latitude, longitude) VALUES (74, 1, 'SULAWESI TENGGARA', 'SULAWESI TENGGARA', '-3.54912', '121.72796');
INSERT INTO provinces (id, country_id, name, alt_name, latitude, longitude) VALUES (75, 1, 'GORONTALO', 'GORONTALO', '0.71862', '122.45559');
INSERT INTO provinces (id, country_id, name, alt_name, latitude, longitude) VALUES (76, 1, 'SULAWESI BARAT', 'SULAWESI BARAT', '-2.49745', '119.3919');
INSERT INTO provinces (id, country_id, name, alt_name, latitude, longitude) VALUES (81, 1, 'MALUKU', 'MALUKU', '-3.11884', '129.42078');
INSERT INTO provinces (id, country_id, name, alt_name, latitude, longitude) VALUES (82, 1, 'MALUKU UTARA', 'MALUKU UTARA', '0.63012', '127.97202');
INSERT INTO provinces (id, country_id, name, alt_name, latitude, longitude) VALUES (91, 1, 'PAPUA BARAT', 'PAPUA BARAT', '-1.38424', '132.90253');
INSERT INTO provinces (id, country_id, name, alt_name, latitude, longitude) VALUES (94, 1, 'PAPUA', 'PAPUA', '-3.98857', '138.34853');
