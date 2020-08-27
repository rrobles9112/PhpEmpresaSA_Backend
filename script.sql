
CREATE DATABASE `db`; /*!40100 DEFAULT CHARACTER SET utf8mb4 */

CREATE SCHEMA `db`;

create table if not exists products
(
    id             int auto_increment
        primary key,
    name           varchar(200)           not null,
    reference      varchar(200)           not null,
    price          int                    not null,
    weight         int                    not null,
    category       varchar(200)           not null,
    stock          int                    not null,
    created_date   date default curdate() not null,
    date_last_sell datetime               null
);


