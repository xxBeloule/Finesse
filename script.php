#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: users
#------------------------------------------------------------

CREATE TABLE users(
        id_u      Int  Auto_increment  NOT NULL ,
        pseudo    Varchar (255) NOT NULL ,
        password  Varchar (255) NOT NULL ,
        mail      Varchar (255) NOT NULL ,
        town      Varchar (255) NOT NULL ,
        street    Varchar (255) NOT NULL ,
        number    Int NOT NULL ,
        zipCode   Int NOT NULL ,
        nOrder    Int ,
        superUser Bool NOT NULL
	,CONSTRAINT users_PK PRIMARY KEY (id_u)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: orders
#------------------------------------------------------------

CREATE TABLE orders(
        id_o   Int  Auto_increment  NOT NULL ,
        status Varchar (255) NOT NULL ,
        time   Varchar (255) NOT NULL ,
        id_u   Int NOT NULL
	,CONSTRAINT orders_PK PRIMARY KEY (id_o)

	,CONSTRAINT orders_users_FK FOREIGN KEY (id_u) REFERENCES users(id_u)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: product
#------------------------------------------------------------

CREATE TABLE product(
        id_p        Int  Auto_increment  NOT NULL ,
        title       Varchar (255) NOT NULL ,
        description Varchar (255) NOT NULL ,
        price       DECIMAL (15,3)  NOT NULL ,
        image       Varchar (255) NOT NULL ,
        id_o        Int
	,CONSTRAINT product_PK PRIMARY KEY (id_p)

	,CONSTRAINT product_orders_FK FOREIGN KEY (id_o) REFERENCES orders(id_o)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: comment
#------------------------------------------------------------

CREATE TABLE comment(
        id_c    Int  Auto_increment  NOT NULL ,
        comment Varchar (255) NOT NULL ,
        id_u    Int NOT NULL ,
        id_p    Int NOT NULL
	,CONSTRAINT comment_PK PRIMARY KEY (id_c)

	,CONSTRAINT comment_users_FK FOREIGN KEY (id_u) REFERENCES users(id_u)
	,CONSTRAINT comment_product0_FK FOREIGN KEY (id_p) REFERENCES product(id_p)
)ENGINE=InnoDB;
