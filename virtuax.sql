/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 5.7.33 : Database - virtuax
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`virtuax` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `virtuax`;

/*Table structure for table `companies` */

DROP TABLE IF EXISTS `companies`;

CREATE TABLE `companies` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `street_address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zip_code` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `companies` */

insert  into `companies`(`id`,`user_id`,`company_name`,`street_address`,`city`,`state`,`zip_code`,`country`,`created_at`,`created_by`,`updated_at`,`updated_by`,`website`) values (1,1,'Charlotte Metro Credit Union','718 Central Ave','Charlotte','North Carolina','28204','United States','2022-11-15 01:48:43',1,'2022-11-15 01:48:43',NULL,'www.cmcu.org'),(2,1,'dadsadaaaa','214 N Tryon St Fl 20','Charlotte','North Carolina','28202','United States a11','2022-11-15 01:48:43',1,'2022-11-15 12:55:23',1,'www.grandbridge.com122'),(3,1,'Weber and Richmond Trading','In ea nobis consequa','Aut Nam est explicab','Quia qui enim dolor','35919','Et neque beatae nisi','2022-11-15 12:56:17',1,'2022-11-15 12:56:31',1,'https://a'),(4,1,'tetsing',NULL,NULL,NULL,NULL,NULL,'2022-11-16 06:41:58',1,'2022-11-16 06:41:58',NULL,NULL);

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2022_11_17_074449_laratrust_setup_tables',2);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `permission_role` */

DROP TABLE IF EXISTS `permission_role`;

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `permission_role` */

insert  into `permission_role`(`permission_id`,`role_id`) values (1,1),(2,1),(3,1),(4,1),(1,2),(2,2),(3,2),(4,2),(5,3),(6,3);

/*Table structure for table `permission_user` */

DROP TABLE IF EXISTS `permission_user`;

CREATE TABLE `permission_user` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  KEY `permission_user_permission_id_foreign` (`permission_id`),
  CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `permission_user` */

/*Table structure for table `permissions` */

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `permissions` */

insert  into `permissions`(`id`,`name`,`display_name`,`description`,`created_at`,`updated_at`) values (1,'users-create','Create Users','Create Users','2022-11-17 07:46:52','2022-11-17 07:46:52'),(2,'users-read','Read Users','Read Users','2022-11-17 07:46:52','2022-11-17 07:46:52'),(3,'users-update','Update Users','Update Users','2022-11-17 07:46:52','2022-11-17 07:46:52'),(4,'users-delete','Delete Users','Delete Users','2022-11-17 07:46:52','2022-11-17 07:46:52'),(5,'profile-read','Read Profile','Read Profile','2022-11-17 07:46:52','2022-11-17 07:46:52'),(6,'profile-update','Update Profile','Update Profile','2022-11-17 07:46:52','2022-11-17 07:46:52');

/*Table structure for table `role_user` */

DROP TABLE IF EXISTS `role_user`;

CREATE TABLE `role_user` (
  `role_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  KEY `role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `role_user` */

insert  into `role_user`(`role_id`,`user_id`,`user_type`) values (1,25,'App\\Models\\User'),(1,27,'App\\Models\\User'),(2,1,'App\\Models\\User'),(3,24,'App\\Models\\User'),(3,28,'App\\Models\\User');

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `roles` */

insert  into `roles`(`id`,`name`,`display_name`,`description`,`created_at`,`updated_at`) values (1,'user','User','User','2022-11-17 07:46:52','2022-11-17 07:46:52'),(2,'admin','Admin','Admin','2022-11-17 07:46:52','2022-11-17 07:46:52'),(3,'company','Company','Company','2022-11-17 07:46:52','2022-11-17 07:46:52');

/*Table structure for table `user_links` */

DROP TABLE IF EXISTS `user_links`;

CREATE TABLE `user_links` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;

/*Data for the table `user_links` */

insert  into `user_links`(`id`,`user_id`,`type`,`link`,`created_at`,`created_by`) values (67,25,'Vinted','http://virtuax.softixs.com','2022-11-24 01:40:51',1);

/*Table structure for table `user_phone_number` */

DROP TABLE IF EXISTS `user_phone_number`;

CREATE TABLE `user_phone_number` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=latin1;

/*Data for the table `user_phone_number` */

insert  into `user_phone_number`(`id`,`user_id`,`phone_number`,`created_at`,`created_by`) values (93,25,'09862516516','2022-11-24 01:40:51',1),(94,25,'02032032032','2022-11-24 01:40:51',1);

/*Table structure for table `user_views` */

DROP TABLE IF EXISTS `user_views`;

CREATE TABLE `user_views` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

/*Data for the table `user_views` */

insert  into `user_views`(`id`,`user_id`,`created_at`) values (1,25,'2022-11-23 08:14:02'),(2,25,'2022-11-23 01:53:56'),(3,25,'2022-11-23 01:55:54'),(4,25,'2022-11-24 08:43:27'),(5,25,'2022-11-24 08:44:39'),(6,25,'2022-11-24 08:46:32'),(7,25,'2022-11-24 08:49:00'),(8,25,'2022-11-24 08:51:01'),(9,25,'2022-11-24 08:51:13'),(10,25,'2022-11-24 08:52:32'),(11,25,'2022-11-24 08:53:31'),(12,25,'2022-11-24 08:53:34'),(13,25,'2022-11-24 08:54:15'),(14,25,'2022-11-24 08:54:19'),(15,25,'2022-11-24 08:54:21'),(16,25,'2022-11-24 08:54:32'),(17,25,'2022-11-24 08:54:55'),(18,25,'2022-11-24 08:55:51'),(19,25,'2022-11-24 08:55:55'),(20,25,'2022-11-24 08:56:13'),(21,25,'2022-11-24 08:56:37'),(22,25,'2022-11-24 01:40:32'),(23,25,'2022-11-24 01:41:08'),(24,25,'2022-11-25 06:21:02'),(25,25,'2022-11-25 06:23:04'),(26,25,'2022-11-25 07:21:16'),(27,25,'2022-11-25 07:21:28'),(28,25,'2022-11-28 04:35:32'),(29,27,'2022-11-28 04:45:10'),(30,25,'2022-12-01 06:24:42');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` bigint(20) DEFAULT '0',
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` bigint(20) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_show` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'blank.png',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `street_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varbinary(255) DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `function` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `town` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_form_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ios_pass_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `v_card_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`parent_id`,`first_name`,`last_name`,`contact_no`,`company_name`,`email`,`user_type`,`email_verified_at`,`password`,`password_show`,`profile_picture`,`remember_token`,`created_at`,`updated_at`,`deleted_at`,`updated_by`,`created_by`,`street_address`,`city`,`state`,`zip_code`,`country`,`function`,`town`,`contact_form_path`,`ios_pass_path`,`v_card_path`) values (1,0,'Kashir','Khan','020230300203',NULL,'kashir123@gmail.com',2,NULL,'$2y$10$.o8YXhFiVpG9vM8yb0XvHeu4tHbkI4y7IPZD9P9qCOyWbG5hqhIBy','aaa','1/202211172212user.webp',NULL,NULL,'2022-11-17 22:12:11',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(24,0,'Emil Frey',NULL,NULL,NULL,'baxter@company.com',3,NULL,'$2y$10$P6Jn6fCtoX/cAFgLMAspdufZE5kYC79DFT9FfMiIv24TQTmi/32lG','aaa','24/202211290950Capture d’écran 2022-11-29 à 10.49.08.png',NULL,'2022-11-17 21:27:29','2022-11-29 09:50:21',NULL,1,1,'Ad quia nesciunt mo','Quasi ut amet aliqu','Laboriosam id adipi','77475','Quisquam omnis sed e',NULL,NULL,NULL,NULL,NULL),(25,24,'Oussama','BOUAOUD','79123123',NULL,'dawngill08@gmail.com',1,NULL,'$2y$10$rdTrvwe5DYLLPL1XO.jmCOglfdcv9PsI1n0TVgyKSMvVFCGHGv5ui','aaa','blank.png',NULL,'2022-11-17 21:28:08','2022-12-09 11:44:56',NULL,1,24,'Odio perferendis cul',NULL,NULL,'95025','karachi','Dolores sit est exer','Dolor corporis incid','contactformImg/25/202211230818favicon.png','iospasspath/25/thumbnail.png','https://virtuax.softixs.com/vcard/dawn-gilla.vcf'),(27,24,'Oussama','BOUAOUD','0033609892415',NULL,'oussama13-05@hotmail.fr',1,NULL,'$2y$10$H4hA9jrhLEkdVgMoQLNQk.1gxpjf6IDrnZSsMYR2uTLDjYcqRLEt2','aaa','blank.png',NULL,'2022-11-28 16:30:57','2022-11-28 16:30:57',NULL,NULL,24,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(28,0,NULL,NULL,NULL,'VirtuaCard','hello@virtuacard.fr',3,NULL,'$2y$10$pTzOilZIPqi2C85yECveAeIx/MgWWoBKAx4nb7i9iwP.B5qG0ywyu','aaa','blank.png',NULL,'2022-12-08 09:11:43','2022-12-08 09:11:43',NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
