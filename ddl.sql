create table member
(
    no            int auto_increment,
    name          varchar(100)               not null,
    phone         varchar(20)                not null,
    insurance     varchar(1)                 not null,
    income        int                        not null,
    loan_amount   int                        not null,
    overdue       varchar(1)                 not null,
    register_date date                       not null,
    role          varchar(10) default 'user' not null,
    constraint member_no_uindex
        unique (no)
);

alter table member
    add primary key (no);

