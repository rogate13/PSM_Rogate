CREATE TABLE member_log (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    member_id BIGINT UNSIGNED NOT NULL,
    action ENUM('CREATE','UPDATE','DELETE') NOT NULL,
    old_data JSON NULL,
    new_data JSON NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT fk_memberlog_member
        FOREIGN KEY (member_id) REFERENCES members(id)
        ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE login_log (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT UNSIGNED NOT NULL,
    ip_address VARCHAR(50),
    user_agent TEXT,
    status ENUM('SUCCESS','FAILED') NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT fk_loginlog_user
        FOREIGN KEY (user_id) REFERENCES users(id)
        ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE transaction_log (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    transaction_id BIGINT UNSIGNED NOT NULL,
    member_id BIGINT UNSIGNED NOT NULL,
    before_balance BIGINT NOT NULL,
    after_balance BIGINT NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT fk_trxlog_trx
        FOREIGN KEY (transaction_id) REFERENCES transactions(id)
        ON UPDATE CASCADE ON DELETE CASCADE,

    CONSTRAINT fk_trxlog_member
        FOREIGN KEY (member_id) REFERENCES members(id)
        ON UPDATE CASCADE ON DELETE CASCADE
);