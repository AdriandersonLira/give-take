/*** Criação do banco de dados ***/
CREATE DATABASE SistemaGive
GO
USE SistemaGive
GO

/*** Criação da tabela Usuarios ***/ 
CREATE TABLE Usuarios 
(
  id_user			varchar(11)     NOT NULL,
  nome				varchar(40)     NOT NULL,
  foto				varchar(40)     NULL,
  telefone			varchar(17)     NOT NULL,
  sexo				varchar(10)		NOT NULL,
  cpf				varchar(14)     NULL,
  profissao			varchar(30)     NOT NULL,
  email				varchar(40)     NOT NULL,
  senha				varchar(32)     NOT NULL,
  nivel_de_acesso	tinyint			NOT NULL,
  data_de_cadastro  datetime		NOT NULL,
  give_one			varchar(200)    NULL,
  give_two			varchar(200)	NULL,
  take_one			varchar(200)	NULL,
  take_two			varchar(200)	NULL,

  CONSTRAINT PK_usuarios  PRIMARY KEY (id_user),
  CONSTRAINT AK_usuarios_cpf UNIQUE (cpf)
)

CREATE TABLE Feedbacks 
(
	id_feedback varchar(11)	 NOT NULL,
	id_user		varchar(11)  NOT NULL,
	mensagem	varchar(300) NULL,
	
	CONSTRAINT PK_feedback  PRIMARY KEY (id_feedback),
	CONSTRAINT FK_id_user FOREIGN KEY (id_user) REFERENCES Usuarios
)

/*** Inserção de dados na tabela Usuarios ***/

INSERT INTO Usuarios VALUES (1, 'Administrador', NULL, '+55(83)00000-0000', 'masculino', '000.000.000-00', 'Administrador', 'administrador@gmail.com', '12345678', 0, '2019-12-27T23:59:10', NULL, NULL, NULL, NULL)
INSERT INTO Usuarios VALUES (2, 'Adrianderson Lira', NULL, '+55(83)98863-6175', 'masculino', '107.204.884-18', 'Fonoaudióloga', 'adrianderson@gmail.com', '12345678', 1, '2019-12-27T23:55:28', NULL, NULL, NULL, NULL)
INSERT INTO Usuarios VALUES (3, 'Vitória Maria', NULL, '+55(83)99651-4026', 'feminino', '000.000.000-01', 'Fonoaudióloga', 'vitoriamaria@gmail.com', '12345678', 2, '2019-12-27T23:55:28', NULL, NULL, NULL, NULL)
INSERT INTO Usuarios VALUES (4, 'Adriano Lira', NULL, '+55(83)9877-20591', 'masculino', '690.013.084-49', 'Pastor', 'adrianoedione@gmail.com', '12345678', 2, '2019-12-27T23:56:54', NULL, NULL, NULL, NULL)
INSERT INTO Usuarios VALUES (5, 'Dione Lira', NULL, '+55(83)98887-3029', 'feminino', '000.000.000-02', 'Professora', 'adrianoedione57@gmail.com', '12345678', 2, '2019-12-27T23:57:25', NULL, NULL, NULL, NULL)

/*** Inserção de dados na tabela Feedbacks ***/

INSERT INTO Feedbacks VALUES (1, 3, 'O site é muito bom e tá muito bem bolado, gostei muito.')
INSERT INTO Feedbacks VALUES (2, 4, 'O site é muito ruim, precisa de umas melhoras urgente.')
INSERT INTO Feedbacks VALUES (3, 5, 'O site precisa de melhoras na área de Login.')
INSERT INTO Feedbacks VALUES (4, 3, 'O site é muito bom.')
INSERT INTO Feedbacks VALUES (5, 5, 'Giveetake é muito bom, gostei muito.')

SELECT * 
FROM Usuarios INNER JOIN Feedbacks
ON Feedbacks.id_user = Usuarios.id_user
ORDER BY Usuarios.nome
