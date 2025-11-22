CREATE TABLE `members` (
    `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `member_code` VARCHAR(30) NOT NULL UNIQUE,
    `full_name` VARCHAR(100) NOT NULL,
    `email` VARCHAR(100) UNIQUE,
    `phone` VARCHAR(20),
    `status` ENUM('ACTIVE','INACTIVE','BLOCKED') NOT NULL DEFAULT 'ACTIVE',
    `current_balance` BIGINT NOT NULL DEFAULT 0,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX `idx_members_status` (`status`)
);

CREATE TABLE `transaction_types` (
    `id` TINYINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `code` VARCHAR(50) NOT NULL UNIQUE,
    `name` VARCHAR(100) NOT NULL,
    `direction` ENUM('CREDIT','DEBIT') NOT NULL,
    `description` VARCHAR(255)
);

CREATE TABLE `users` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `username` VARCHAR(50) NOT NULL UNIQUE,
    `password_hash` VARCHAR(255) NOT NULL,
    `full_name` VARCHAR(100) NOT NULL,
    `role` ENUM('ADMIN','STAFF') NOT NULL DEFAULT 'STAFF',
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

ALTER TABLE users ADD COLUMN api_token VARCHAR(255) NULL;
ALTER TABLE users ADD member_id BIGINT UNSIGNED NULL AFTER role;



CREATE TABLE `transactions` (
    `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `member_id` BIGINT UNSIGNED NOT NULL,
    `transaction_type_id` TINYINT UNSIGNED NOT NULL,
    `reference_no` VARCHAR(100),
    `amount` BIGINT NOT NULL,
    `balance_before` BIGINT NOT NULL,
    `balance_after` BIGINT NOT NULL,
    `description` VARCHAR(255),
    `channel` ENUM('SYSTEM','ADMIN','WEB','MOBILE') NOT NULL DEFAULT 'SYSTEM',
    `created_by` INT UNSIGNED DEFAULT NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT `fk_trx_member`
        FOREIGN KEY (`member_id`) REFERENCES `members`(`id`)
        ON UPDATE CASCADE ON DELETE RESTRICT,

    CONSTRAINT `fk_trx_type`
        FOREIGN KEY (`transaction_type_id`) REFERENCES `transaction_types`(`id`)
        ON UPDATE CASCADE ON DELETE RESTRICT,

    CONSTRAINT `fk_trx_user`
        FOREIGN KEY (`created_by`) REFERENCES `users`(`id`)
        ON UPDATE CASCADE ON DELETE SET NULL,

    INDEX `idx_trx_member_created` (`member_id`, `created_at`),
    INDEX `idx_trx_reference` (`reference_no`)
);

INSERT INTO `transaction_types` (`code`, `name`, `direction`, `description`) VALUES
('TOPUP', 'Top Up Saldo', 'CREDIT', 'Penambahan saldo member'),
('PURCHASE', 'Pembelian / Pemakaian Saldo', 'DEBIT', 'Mengurangi saldo member');