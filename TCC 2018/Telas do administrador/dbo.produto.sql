CREATE TABLE [dbo].[produto] (
    [id_produto] CHAR(10)          IDENTITY (1, 1) NOT NULL,
    [nome]       TEXT         NULL,
    [descricao]  TEXT         NULL,
    [img]        IMAGE        NULL,
    [preco]      DECIMAL (18) NULL,
    [estoque]    INT          NULL,
    [tipo]       TEXT         NULL,
    [preco_custo] DECIMAL NULL, 
    [fornecedor] INT NULL, 
    PRIMARY KEY CLUSTERED ([id_produto] ASC)
);

