-- DropTables.sql
IF OBJECT_ID('dbo.regimen_fiscal', 'U') IS NOT NULL DROP TABLE dbo.cat_regimen_fiscal;
IF OBJECT_ID('dbo.facturacion_test', 'U') IS NOT NULL DROP TABLE dbo.facturacion_test;
IF OBJECT_ID('dbo.clientes_hash_crypt', 'U') IS NOT NULL DROP TABLE dbo.clientes_hash_crypt;
IF OBJECT_ID('dbo.facturacion', 'U') IS NOT NULL DROP TABLE dbo.facturacion;
IF OBJECT_ID('dbo.usuarios', 'U') IS NOT NULL DROP TABLE dbo.usuarios;
IF OBJECT_ID('dbo.niu', 'U') IS NOT NULL DROP TABLE dbo.niu;

-- Create Table Script
SET ANSI_NULLS ON
SET QUOTED_IDENTIFIER ON

CREATE TABLE [dbo].[usuarios]
(
    [id]                     [int] IDENTITY (1,1) NOT NULL,
    [session_id]             [varchar](max)       NULL,
    [id_rol]                 [int]                NOT NULL,
    [id_cliente]             [int]                NOT NULL,
    [id_proveedor]           [int]                NOT NULL,
    [tipo_proveedor]         [varchar](2)         NOT NULL,
    [rfc]                    [varchar](15)        NOT NULL,
    [name]                   [varchar](50)        NULL,
    [apellido_paterno]       [varchar](50)        NULL,
    [apellido_materno]       [varchar](50)        NULL,
    [razon_social]           [varchar](max)       NULL,
    [tipo_sociedad]          [varchar](max)       NULL,
    [email]                  [varchar](max)       NULL,
    [email_verified_at]      [datetime2](7)       NULL,
    [password]               [varchar](max)       NOT NULL,
    [prov_rfc_rl]            [varchar](13)        NULL,
    [prov_nombre_rl]         [varchar](50)        NULL,
    [prov_telefono]          [bigint]             NULL,
    [prov_nombre_vialidad][varchar](max)          NULL,
    [prov_numero_exterior][varchar](max)          NULL,
    [prov_numero_interior][varchar](max)          NULL,
    [prov_colonia]           [varchar](max)       NULL,
    [prov_alcaldia_municipio][varchar](max)       NULL,
    [prov_codigo_postal]     [varchar](5)         NULL,
    [prov_entidad]           [varchar](max)       NULL,
    [prov_membresia]         [varchar](max)       NULL,
    [prov_pdf]               [varchar](max)       NULL,
    [estatus_registro]       [varchar](max)       NULL,
    [remember_token]         [varchar](100)       NULL,
    [created_at]             [datetime2](7)       NULL,
    [updated_at]             [datetime2](7)       NULL,
    CONSTRAINT [PK_usuarios] PRIMARY KEY CLUSTERED ([id] ASC)
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY];

GO

CREATE TABLE [dbo].[clientes_hash_crypt]
(
    [id]           [int] IDENTITY (1,1) NOT NULL,
    [cliente]      [varchar](max)       NOT NULL,
    [cliente_hash] [varchar](max)       NOT NULL,
    CONSTRAINT [PK_clientes_hash_crypt] PRIMARY KEY CLUSTERED ([id] ASC)
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY];

GO

CREATE TABLE [dbo].[niu]
(
    [niu]              [varchar](50)  NOT NULL,
    [niu_pf_pm]        [varchar](2)   NULL,
    [id_cliente]       [int]          NOT NULL,
    [id_proveedor]     [int]          NOT NULL,
    [fecha_asignacion] [datetime2](7) NOT NULL,
    [marca]            [varchar](max) NULL,
    CONSTRAINT [PK_niu] PRIMARY KEY CLUSTERED ([niu] ASC)
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY];

GO

CREATE TABLE [dbo].[facturacion]
(
    [id]                  [int] IDENTITY (1,1) NOT NULL,
    [id_cliente]          [int]                NOT NULL,
    [id_proveedor]        [int]                NOT NULL,
    [uso_cfdi]            [varchar](max)       NOT NULL,
    [regimen_fiscal_id]   [int]                NOT NULL,
    [regimen_fiscal_desc] [varchar](max)       NOT NULL,
    [rfc]                 [varchar](13)        NOT NULL,
    [razon_social]        [varchar](max)       NOT NULL,
    [correo]              [varchar](max)       NULL,
    [nombre_vialidad]     [varchar](max)       NULL,
    [numero_exterior]     [varchar](max)       NULL,
    [numero_interior]     [varchar](max)       NULL,
    [colonia]             [varchar](max)       NULL,
    [alcaldia_municipio]  [varchar](max)       NULL,
    [codigo_postal]       [varchar](5)         NULL,
    [entidad]             [varchar](max)       NULL,
    [fecha_registro]      [datetime2](7)       NOT NULL,
    [fecha_actualizacion] [datetime2](7)       NOT NULL,
    CONSTRAINT [PK_facturacion] PRIMARY KEY CLUSTERED ([id] ASC)
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY];

GO

CREATE TABLE [dbo].[facturacion_test]
(
    [id]                 [int] IDENTITY (1,1) NOT NULL,
    [serie]              [varchar](50)        NOT NULL,
    [folio]              [int]                NOT NULL,
    [fecha_facturacion]  [date]               NOT NULL,
    [forma_pago]         [varchar](max)       NOT NULL,
    [membresia]          [varchar](7)         NOT NULL,
    [niu]                [varchar](50)        NOT NULL,
    [razon_social]       [varchar](max)       NOT NULL,
    [cliente]            [varchar](max)       NOT NULL,
    [total]              [decimal](18, 2)     NOT NULL,
    [iva]                [decimal](18, 2)     NOT NULL,
    [importe]            [decimal](18, 2)     NOT NULL,
    [fecha_pago]         [date]               NOT NULL,
    [renovacion]         [varchar](max)       NOT NULL,
    [observaciones]      [varchar](max)       NOT NULL,
    [regimen_fiscal]     [varchar](max)       NOT NULL,
    [rfc]                [varchar](13)        NOT NULL,
    [correo]             [varchar](max)       NOT NULL,
    [vialidad]           [varchar](max)       NOT NULL,
    [numero_interior]    [varchar](max)       NOT NULL,
    [numero_exterior]    [varchar](max)       NOT NULL,
    [codigo_postal]      [varchar](5)         NOT NULL,
    [colonia]            [varchar](max)       NOT NULL,
    [alcaldia_municipio] [varchar](max)       NOT NULL,
    [entidad]            [varchar](max)       NOT NULL,
    [file_path]          [varchar](max)       NULL,
    [usuario_id]         [int]                NOT NULL,
    [cliente_id]         [int]                NOT NULL,
    [fecha_creacion]     [varchar]            NULL,
    [updated_at]         [datetime2]          NOT NULL,
    [created_at]         [datetime2]          NOT NULL,
    CONSTRAINT [PK_facturacion_test] PRIMARY KEY CLUSTERED ([id] ASC),
    CONSTRAINT [FK_facturacion_test_niu] FOREIGN KEY ([niu]) REFERENCES [dbo].[niu] ([niu]),
    CONSTRAINT [FK_facturacion_test_cliente_id] FOREIGN KEY ([cliente_id]) REFERENCES [dbo].[clientes_hash_crypt] ([id]),
    CONSTRAINT [FK_facturacion_test_usuario_id] FOREIGN KEY ([usuario_id]) REFERENCES [dbo].[usuarios] ([id])
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY];

GO


CREATE TABLE [dbo].[cat_regimen_fiscal]
(
    [id]              [int] IDENTITY (1,1) NOT NULL,
    [c_RegimenFiscal] [varchar](50)        NOT NULL,
    [Descripcion]     [varchar](255)       NOT NULL,
    CONSTRAINT [PK_cat_regimen_fiscal] PRIMARY KEY CLUSTERED ([id] ASC)
) ON [PRIMARY];

GO

CREATE TABLE [dbo].[cp]
(
    [id]               [int] IDENTITY (1,1) NOT NULL,
    [d_codigo]         [varchar](50)        NULL,
    [d_asenta]         [varchar](255)       NULL,
    [d_tipo_asenta]    [varchar](255)       NULL,
    [D_mnpio]          [varchar](255)       NULL,
    [d_estado]         [varchar](255)       NULL,
    [d_ciudad]         [varchar](255)       NULL,
    [d_CP]             [varchar](50)        NULL,
    [c_estado]         [varchar](50)        NULL,
    [c_oficina]        [varchar](50)        NULL,
    [c_CP]             [varchar](50)        NULL,
    [c_tipo_asenta]    [varchar](50)        NULL,
    [c_mnpio]          [varchar](50)        NULL,
    [id_asenta_cpcons] [int]                NULL,
    [d_zona]           [varchar](50)        NULL,
    [c_cve_ciudad]     [varchar](50)        NULL,
    CONSTRAINT [PK_cp] PRIMARY KEY CLUSTERED ([id] ASC)
) ON [PRIMARY];

GO
