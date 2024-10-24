SET IDENTITY_INSERT [dbo].[clientes_hash_crypt] OFF
SET IDENTITY_INSERT [dbo].[facturacion] OFF
SET IDENTITY_INSERT [dbo].[usuarios] OFF
GO

insert into dbo.cat_regimen_fiscal (c_RegimenFiscal, Descripcion)
values (N'601', N'General de Ley Personas Morales'),
       (N'603', N'Personas Morales con Fines no Lucrativos'),
       (N'605', N'Sueldos y Salarios e Ingresos Asimilados a Salarios'),
       (N'606', N'Arrendamiento'),
       (N'607', N'Régimen de Enajenación o Adquisición de Bienes'),
       (N'608', N'Demás ingresos'),
       (N'610', N'Residentes en el Extranjero sin Establecimiento Permanente en México'),
       (N'611', N'Ingresos por Dividendos (socios y accionistas)'),
       (N'612', N'Personas Físicas con Actividades Empresariales y Profesionales'),
       (N'614', N'Ingresos por intereses'),
       (N'615', N'Régimen de los ingresos por obtención de premios'),
       (N'616', N'Sin obligaciones fiscales'),
       (N'620', N'Sociedades Cooperativas de Producción que optan por diferir sus ingresos'),
       (N'621', N'Incorporación Fiscal'),
       (N'622', N'Actividades Agrícolas, Ganaderas, Silvícolas y Pesqueras'),
       (N'623', N'Opcional para Grupos de Sociedades'),
       (N'624', N'Coordinados'),
       (N'625', N'Régimen de las Actividades Empresariales con ingresos a través de Plataformas Tecnológicas'),
       (N'626', N'Régimen Simplificado de Confianza');
GO

SET IDENTITY_INSERT [dbo].[clientes_hash_crypt] ON

GO

INSERT [dbo].[clientes_hash_crypt] ([id], [cliente], [cliente_hash])
VALUES (68, N'EMPRESA PRUEBA, S.A. DE C.V.', N'123456789')

GO

SET IDENTITY_INSERT [dbo].[clientes_hash_crypt] OFF
GO

-- INSERT para la tabla facturacion
SET IDENTITY_INSERT [dbo].[facturacion] ON;
GO
INSERT [dbo].[facturacion] ([id], [id_cliente], [id_proveedor], [uso_cfdi], [regimen_fiscal_id], [regimen_fiscal_desc],
                            [rfc], [razon_social], [correo], [nombre_vialidad], [numero_exterior], [numero_interior],
                            [colonia], [alcaldia_municipio], [codigo_postal], [entidad], [fecha_registro],
                            [fecha_actualizacion])
VALUES (1, 68, 121515, N'POR DEFINIR', 605, 'Sueldos y Salarios e Ingresos Asimilados a Salarios', N'XXX0000000V2',
        N'FDDFDFFD, S.A. DE C.V.', N'fddfdfdffdfd@me.com', N'DFFDDF', N'FDFDDFFD', N'DFFDFDDF', N'PORTALES SUR',
        N'BENITO JUAREZ', N'03300', N'CIUDAD DE MEXICO', CAST(N'2022-03-03T00:53:00.0000000' AS DateTime2),
        CAST(N'2022-03-10T17:32:00.0000000' AS DateTime2)),
       (2, 69, 121516, N'G03', 601, 'General de Ley Personas Morales', N'ALFA0000001A', N'COMPAÑIA ALFA, S.A. DE C.V.',
        N'alfa@correo.com', N'AVENIDA PRIMAVERA', N'100', N'N/A', N'SANTA FE', N'ALVARO OBREGON', N'01210',
        N'CIUDAD DE MEXICO', CAST(N'2023-05-03T11:00:00.0000000' AS DateTime2),
        CAST(N'2023-05-10T12:00:00.0000000' AS DateTime2)),
       (3, 70, 121517, N'P01', 612, 'Personas Físicas con Actividades Empresariales y Profesionales', N'BETA0000002B',
        N'SOLUCIONES BETA, S.A. DE C.V.', N'beta@correo.com', N'CALLE VERANO', N'200', N'N/A', N'LA CONDESA',
        N'CUAUHTEMOC', N'06140', N'CIUDAD DE MEXICO', CAST(N'2023-06-04T13:00:00.0000000' AS DateTime2),
        CAST(N'2023-06-11T14:00:00.0000000' AS DateTime2)),
       (4, 71, 121518, N'D01', 606, 'Arrendamiento', N'GAMMA0000003G', N'TECNOLOGIAS GAMMA, S.A. DE C.V.',
        N'gamma@correo.com', N'AVENIDA OTOÑO', N'300', N'N/A', N'POLANCO', N'MIGUEL HIDALGO', N'11510',
        N'CIUDAD DE MEXICO', CAST(N'2023-07-05T15:00:00.0000000' AS DateTime2),
        CAST(N'2023-07-12T16:00:00.0000000' AS DateTime2)),
       (5, 72, 121519, N'I01', 612, 'Personas Físicas con Actividades Empresariales y Profesionales', N'DELTA0000004D',
        N'DESARROLLOS DELTA, S.A. DE C.V.', N'delta@correo.com', N'CALLE INVIERNO', N'400', N'N/A', N'LINDAVISTA',
        N'GUSTAVO A. MADERO', N'07300', N'CIUDAD DE MEXICO', CAST(N'2023-08-06T17:00:00.0000000' AS DateTime2),
        CAST(N'2023-08-13T18:00:00.0000000' AS DateTime2)),
       (6, 73, 121520, N'P01', 603, 'Personas Morales con Fines no Lucrativos', N'EPSILON005E',
        N'INNOVACIONES EPSILON, S.A. DE C.V.', N'epsilon@correo.com', N'CALLE PRIMAVERA', N'500', N'N/A', N'ROMA SUR',
        N'CUAUHTEMOC', N'06760', N'CIUDAD DE MEXICO', CAST(N'2023-09-07T19:00:00.0000000' AS DateTime2),
        CAST(N'2023-09-14T20:00:00.0000000' AS DateTime2)),
       (7, 74, 121521, N'D01', 601, 'General de Ley Personas Morales', N'ZETA0000006Z',
        N'CONSTRUCCIONES ZETA, S.A. DE C.V.', N'zeta@correo.com', N'AVENIDA VERANO', N'600', N'N/A', N'COYOACAN',
        N'COYOACAN', N'04000', N'CIUDAD DE MEXICO', CAST(N'2023-10-08T21:00:00.0000000' AS DateTime2),
        CAST(N'2023-10-15T22:00:00.0000000' AS DateTime2)),
       (8, 75, 121522, N'P01', 614, 'Ingresos por intereses', N'ETA0000007E', N'IMPORTACIONES ETA, S.A. DE C.V.',
        N'eta@correo.com', N'CALLE OTOÑO', N'700', N'N/A', N'SAN ANGEL', N'ALVARO OBREGON', N'01000',
        N'CIUDAD DE MEXICO', CAST(N'2023-11-09T23:00:00.0000000' AS DateTime2),
        CAST(N'2023-11-16T00:00:00.0000000' AS DateTime2)),
       (9, 76, 121523, N'D01', 607, 'Régimen de Enajenación o Adquisición de Bienes', N'THETA0000008T',
        N'DISTRIBUIDORA THETA, S.A. DE C.V.', N'theta@correo.com', N'CALLE INVIERNO', N'800', N'N/A',
        N'SAN MIGUEL CHAPULTEPEC', N'MIGUEL HIDALGO', N'11850', N'CIUDAD DE MEXICO',
        CAST(N'2023-12-10T01:00:00.0000000' AS DateTime2),
        CAST(N'2023-12-17T02:00:00.0000000' AS DateTime2)),
       (10, 77, 121524, N'P01', 608, 'Demás ingresos', N'IOTA0000009I', N'FINANZAS IOTA, S.A. DE C.V.',
        N'iota@correo.com',
        N'CALLE PRIMAVERA', N'900', N'N/A', N'TACUBAYA', N'MIGUEL HIDALGO', N'11870', N'CIUDAD DE MEXICO',
        CAST(N'2024-01-11T03:00:00.0000000' AS DateTime2), CAST(N'2024-01-18T04:00:00.0000000' AS DateTime2)),
       (11, 78, 121525, N'D01', 610, 'Residentes en el Extranjero sin Establecimiento Permanente en México',
        N'KAPPA0000010K', N'CONSULTORIA KAPPA, S.A. DE C.V.',
        N'kappa@correo.com', N'CALLE OTOÑO', N'1000', N'N/A', N'JUAREZ', N'CUAUHTEMOC', N'06600', N'CIUDAD DE MEXICO',
        CAST(N'2024-02-12T05:00:00.0000000' AS DateTime2), CAST(N'2024-02-19T06:00:00.0000000' AS DateTime2)),
       (12, 79, 121526, N'G02', 601, 'General de Ley Personas Morales', N'JUPE760101ABC', N'EMPRESA PRUEBA',
        N'juan.perez@example.com', N'CALLE LUNA', N'100', N'N/A', N'CENTRO', N'CUAUHTÉMOC', N'06000',
        N'CIUDAD DE MEXICO', CAST(N'2024-08-19T14:00:00.0000000' AS DateTime2),
        CAST(N'2024-08-19T14:30:00.0000000' AS DateTime2)),
       (13, 80, 121527, N'P01', 605, 'Sueldos y Salarios e Ingresos Asimilados a Salarios', N'MALO860524JKL',
        N'SOLUCIONES BETA', N'maria.lopez@example.com', N'AV. SOL', N'200', N'APT 101', N'BOSQUES', N'ALVARO OBREGÓN',
        N'01210', N'CIUDAD DE MEXICO', CAST(N'2024-08-19T15:00:00.0000000' AS DateTime2),
        CAST(N'2024-08-19T15:30:00.0000000' AS DateTime2)),
       (14, 81, 121528, N'D04', 626, 'Régimen Simplificado de Confianza', N'CARS900123XYZ', N'SOLUCIONES BETA',
        N'carlos.sanchez@example.com', N'CALLE ESTRELLA', N'300', N'CASA 3', N'ROMA NORTE', N'CUAUHTÉMOC', N'06700',
        N'CIUDAD DE MEXICO', CAST(N'2024-08-19T16:00:00.0000000' AS DateTime2),
        CAST(N'2024-08-19T16:30:00.0000000' AS DateTime2));
GO
SET IDENTITY_INSERT [dbo].[facturacion] OFF;
GO

SET IDENTITY_INSERT [dbo].[usuarios] ON
GO
INSERT [dbo].[usuarios] ([id], [session_id], [id_rol], [id_cliente], [id_proveedor], [tipo_proveedor], [rfc], [name],
                         [apellido_paterno], [apellido_materno], [razon_social], [tipo_sociedad], [email],
                         [email_verified_at], [password], [prov_rfc_rl], [prov_nombre_rl], [prov_telefono],
                         [prov_nombre_vialidad], [prov_numero_exterior], [prov_numero_interior], [prov_colonia],
                         [prov_alcaldia_municipio], [prov_codigo_postal], [prov_entidad], [prov_membresia], [prov_pdf],
                         [estatus_registro], [remember_token], [created_at], [updated_at])
VALUES (121515, NULL, 1, 68, 1, N'PM', N'XXX0000000V2', NULL, NULL, NULL, N'MEDICAMENTOS AL POR MAYOR ',
        N', S.A. DE C.V.', N'yeiherrera@gmail.com', NULL,
        N'$2y$10$HATLTR9yfbJdfsx7Rixss.fQCBFPv3a1gLsLIxrl3Kq905zjoSPLC', NULL, NULL, 5577075832, N'CLAVELINAS', N'270',
        N'N/A', N'Nueva Santa María', N'Azcapotzalco', N'02800', N'CIUDAD DE MEXICO', N'PLAN_ANUAL',
        N'PMC - AA0000001 KCM1803238V2.pdf', N'COMPLETADO', NULL, CAST(N'2021-08-23T08:48:00.0000000' AS DateTime2),
        CAST(N'2024-06-06T18:31:45.0000000' AS DateTime2))
GO
SET IDENTITY_INSERT [dbo].[usuarios] OFF
GO

INSERT [dbo].[niu] ([niu], [niu_pf_pm], [id_cliente], [id_proveedor], [fecha_asignacion], [marca])
VALUES (N'MX22US01A001', NULL, 68, 121515, CAST(N'2024-07-12T16:58:14.0000000' AS DateTime2),
        N'ASIGNADO PERMANENTEMENTE')

GO


-- INSERT para la tabla clientes_hash_crypt
SET IDENTITY_INSERT [dbo].[clientes_hash_crypt] ON
GO
INSERT [dbo].[clientes_hash_crypt] ([id], [cliente], [cliente_hash])
VALUES (69, N'COMPAÑIA ALFA, S.A. DE C.V.', N'234567890'),
       (70, N'SOLUCIONES BETA, S.A. DE C.V.', N'345678901'),
       (71, N'TECNOLOGIAS GAMMA, S.A. DE C.V.', N'456789012'),
       (72, N'DESARROLLOS DELTA, S.A. DE C.V.', N'567890123'),
       (73, N'INNOVACIONES EPSILON, S.A. DE C.V.', N'678901234'),
       (74, N'CONSTRUCCIONES ZETA, S.A. DE C.V.', N'789012345'),
       (75, N'IMPORTACIONES ETA, S.A. DE C.V.', N'890123456'),
       (76, N'DISTRIBUIDORA THETA, S.A. DE C.V.', N'901234567'),
       (77, N'FINANZAS IOTA, S.A. DE C.V.', N'012345678'),
       (78, N'CONSULTORIA KAPPA, S.A. DE C.V.', N'123456789')
GO
SET IDENTITY_INSERT [dbo].[clientes_hash_crypt] OFF
GO

-- INSERT para la tabla usuarios
SET IDENTITY_INSERT [dbo].[usuarios] ON
GO
INSERT [dbo].[usuarios] ([id], [session_id], [id_rol], [id_cliente], [id_proveedor], [tipo_proveedor], [rfc], [name],
                         [apellido_paterno], [apellido_materno], [razon_social], [tipo_sociedad], [email],
                         [email_verified_at], [password], [prov_rfc_rl], [prov_nombre_rl], [prov_telefono],
                         [prov_nombre_vialidad], [prov_numero_exterior], [prov_numero_interior], [prov_colonia],
                         [prov_alcaldia_municipio], [prov_codigo_postal], [prov_entidad], [prov_membresia], [prov_pdf],
                         [estatus_registro], [remember_token], [created_at], [updated_at])
VALUES (121516, NULL, 1, 69, 2, N'PM', N'ALFA0000001A', NULL, NULL, NULL, N'COMPAÑIA ALFA', N', S.A. DE C.V.',
        N'alfa@correo.com', NULL, N'$2y$10$XXXXXXXXXXXXXXXXXXXXXXX', NULL, NULL, 5587123456, N'AVENIDA PRIMAVERA',
        N'100', N'N/A', N'SANTA FE', N'ALVARO OBREGON', N'01210', N'CIUDAD DE MEXICO', N'PLAN_BIENAL',
        N'PMC - ALFA0000001.pdf', N'COMPLETADO', NULL, CAST(N'2023-05-03T11:00:00.0000000' AS DateTime2),
        CAST(N'2023-05-10T12:00:00.0000000' AS DateTime2)),
       (121517, NULL, 1, 70, 2, N'PM', N'BETA0000002B', NULL, NULL, NULL, N'SOLUCIONES BETA', N', S.A. DE C.V.',
        N'beta@correo.com', NULL, N'$2y$10$XXXXXXXXXXXXXXXXXXXXXXX', NULL, NULL, 5598123457, N'CALLE VERANO', N'200',
        N'N/A', N'LA CONDESA', N'CUAUHTEMOC', N'06140', N'CIUDAD DE MEXICO', N'PLAN_ANUAL', N'PMC - BETA0000002.pdf',
        N'COMPLETADO', NULL, CAST(N'2023-06-04T13:00:00.0000000' AS DateTime2),
        CAST(N'2023-06-11T14:00:00.0000000' AS DateTime2)),
       (121518, NULL, 1, 71, 2, N'PM', N'GAMMA0000003G', NULL, NULL, NULL, N'TECNOLOGIAS GAMMA', N', S.A. DE C.V.',
        N'gamma@correo.com', NULL, N'$2y$10$XXXXXXXXXXXXXXXXXXXXXXX', NULL, NULL, 5599123458, N'AVENIDA OTOÑO', N'300',
        N'N/A', N'POLANCO', N'MIGUEL HIDALGO', N'11510', N'CIUDAD DE MEXICO', N'PLAN_TRIMESTRAL',
        N'PMC - GAMMA0000003.pdf', N'COMPLETADO', NULL, CAST(N'2023-07-05T15:00:00.0000000' AS DateTime2),
        CAST(N'2023-07-12T16:00:00.0000000' AS DateTime2)),
       (121519, NULL, 1, 72, 2, N'PM', N'DELTA0000004D', NULL, NULL, NULL, N'DESARROLLOS DELTA', N', S.A. DE C.V.',
        N'delta@correo.com', NULL, N'$2y$10$XXXXXXXXXXXXXXXXXXXXXXX', NULL, NULL, 5580123459, N'CALLE INVIERNO', N'400',
        N'N/A', N'LINDAVISTA', N'GUSTAVO A. MADERO', N'07300', N'CIUDAD DE MEXICO', N'PLAN_BIENAL',
        N'PMC - DELTA0000004.pdf', N'COMPLETADO', NULL, CAST(N'2023-08-06T17:00:00.0000000' AS DateTime2),
        CAST(N'2023-08-13T18:00:00.0000000' AS DateTime2)),
       (121520, NULL, 1, 73, 2, N'PM', N'EPSILON005E', NULL, NULL, NULL, N'INNOVACIONES EPSILON', N', S.A. DE C.V.',
        N'epsilon@correo.com', NULL, N'$2y$10$XXXXXXXXXXXXXXXXXXXXXXX', NULL, NULL, 5581123460, N'CALLE PRIMAVERA',
        N'500', N'N/A', N'ROMA SUR', N'CUAUHTEMOC', N'06760', N'CIUDAD DE MEXICO', N'PLAN_ANUAL',
        N'PMC - EPSILON0000005.pdf', N'COMPLETADO', NULL, CAST(N'2023-09-07T19:00:00.0000000' AS DateTime2),
        CAST(N'2023-09-14T20:00:00.0000000' AS DateTime2)),
       (121521, NULL, 1, 74, 2, N'PM', N'ZETA0000006Z', NULL, NULL, NULL, N'CONSTRUCCIONES ZETA', N', S.A. DE C.V.',
        N'zeta@correo.com', NULL, N'$2y$10$XXXXXXXXXXXXXXXXXXXXXXX', NULL, NULL, 5582123461, N'AVENIDA VERANO', N'600',
        N'N/A', N'COYOACAN', N'COYOACAN', N'04000', N'CIUDAD DE MEXICO', N'PLAN_TRIMESTRAL', N'PMC - ZETA0000006.pdf',
        N'COMPLETADO', NULL, CAST(N'2023-10-08T21:00:00.0000000' AS DateTime2),
        CAST(N'2023-10-15T22:00:00.0000000' AS DateTime2)),
       (121522, NULL, 1, 75, 2, N'PM', N'ETA0000007E', NULL, NULL, NULL, N'IMPORTACIONES ETA', N', S.A. DE C.V.',
        N'eta@correo.com', NULL, N'$2y$10$XXXXXXXXXXXXXXXXXXXXXXX', NULL, NULL, 5583123462, N'CALLE OTOÑO', N'700',
        N'N/A', N'SAN ANGEL', N'ALVARO OBREGON', N'01000', N'CIUDAD DE MEXICO', N'PLAN_BIENAL', N'PMC - ETA0000007.pdf',
        N'COMPLETADO', NULL, CAST(N'2023-11-09T23:00:00.0000000' AS DateTime2),
        CAST(N'2023-11-16T00:00:00.0000000' AS DateTime2)),
       (121523, NULL, 1, 76, 2, N'PM', N'THETA0000008T', NULL, NULL, NULL, N'DISTRIBUIDORA THETA', N', S.A. DE C.V.',
        N'theta@correo.com', NULL, N'$2y$10$XXXXXXXXXXXXXXXXXXXXXXX', NULL, NULL, 5584123463, N'CALLE INVIERNO', N'800',
        N'N/A', N'SAN MIGUEL CHAPULTEPEC', N'MIGUEL HIDALGO', N'11850', N'CIUDAD DE MEXICO', N'PLAN_ANUAL',
        N'PMC - THETA0000008.pdf', N'COMPLETADO', NULL, CAST(N'2023-12-10T01:00:00.0000000' AS DateTime2),
        CAST(N'2023-12-17T02:00:00.0000000' AS DateTime2)),
       (121524, NULL, 1, 77, 2, N'PM', N'IOTA0000009I', NULL, NULL, NULL, N'FINANZAS IOTA', N', S.A. DE C.V.',
        N'iota@correo.com', NULL, N'$2y$10$XXXXXXXXXXXXXXXXXXXXXXX', NULL, NULL, 5585123464, N'CALLE PRIMAVERA', N'900',
        N'N/A', N'TACUBAYA', N'MIGUEL HIDALGO', N'11870', N'CIUDAD DE MEXICO', N'PLAN_TRIMESTRAL',
        N'PMC - IOTA0000009.pdf', N'COMPLETADO', NULL, CAST(N'2024-01-11T03:00:00.0000000' AS DateTime2),
        CAST(N'2024-01-18T04:00:00.0000000' AS DateTime2)),
       (121525, NULL, 1, 78, 2, N'PM', N'KAPPA0000010K', NULL, NULL, NULL, N'ENERGIA KAPPA', N', S.A. DE C.V.',
        N'kappa@correo.com', NULL, N'$2y$10$XXXXXXXXXXXXXXXXXXXXXXX', NULL, NULL, 5586123465, N'CALLE OTOÑO', N'1000',
        N'N/A', N'TLALPAN', N'TLALPAN', N'14000', N'CIUDAD DE MEXICO', N'PLAN_BIENAL', N'PMC - KAPPA0000010.pdf',
        N'COMPLETADO', NULL, CAST(N'2024-02-12T05:00:00.0000000' AS DateTime2),
        CAST(N'2024-02-19T06:00:00.0000000' AS DateTime2));
GO
SET IDENTITY_INSERT [dbo].[usuarios] OFF

GO

INSERT [dbo].[niu] ([niu], [niu_pf_pm], [id_cliente], [id_proveedor], [fecha_asignacion], [marca])
VALUES (N'MX22US01A002', NULL, 69, 121516, CAST(N'2024-08-01T09:00:00.0000000' AS DateTime2),
        N'ASIGNADO PERMANENTEMENTE'),
       (N'MX22US01A003', NULL, 70, 121517, CAST(N'2024-08-02T10:00:00.0000000' AS DateTime2),
        N'ASIGNADO PERMANENTEMENTE'),
       (N'MX22US01A004', NULL, 71, 121518, CAST(N'2024-08-03T11:00:00.0000000' AS DateTime2),
        N'ASIGNADO PERMANENTEMENTE'),
       (N'MX22US01A005', NULL, 72, 121519, CAST(N'2024-08-04T12:00:00.0000000' AS DateTime2),
        N'ASIGNADO PERMANENTEMENTE'),
       (N'MX22US01A006', NULL, 73, 121520, CAST(N'2024-08-05T13:00:00.0000000' AS DateTime2),
        N'ASIGNADO PERMANENTEMENTE'),
       (N'MX22US01A007', NULL, 74, 121521, CAST(N'2024-08-06T14:00:00.0000000' AS DateTime2),
        N'ASIGNADO PERMANENTEMENTE'),
       (N'MX22US01A008', NULL, 75, 121522, CAST(N'2024-08-07T15:00:00.0000000' AS DateTime2),
        N'ASIGNADO PERMANENTEMENTE'),
       (N'MX22US01A009', NULL, 76, 121523, CAST(N'2024-08-08T16:00:00.0000000' AS DateTime2),
        N'ASIGNADO PERMANENTEMENTE'),
       (N'MX22US01A010', NULL, 77, 121524, CAST(N'2024-08-09T17:00:00.0000000' AS DateTime2),
        N'ASIGNADO PERMANENTEMENTE'),
       (N'MX22US01A011', NULL, 78, 121525, CAST(N'2024-08-10T18:00:00.0000000' AS DateTime2),
        N'ASIGNADO PERMANENTEMENTE'),
       (N'MX22US01A0yy', NULL, 79, 121526, CAST(N'2024-08-19T17:00:00.0000000' AS DateTime2),
        N'ASIGNADO PERMANENTEMENTE'),
       (N'MX22US01A0uu', NULL, 80, 121527, CAST(N'2024-08-19T18:00:00.0000000' AS DateTime2),
        N'ASIGNADO PERMANENTEMENTE'),
       (N'MX22US01A0oo', NULL, 81, 121528, CAST(N'2024-08-19T19:00:00.0000000' AS DateTime2),
        N'ASIGNADO PERMANENTEMENTE');


GO


SET IDENTITY_INSERT [dbo].[clientes_hash_crypt] ON;
GO
SET IDENTITY_INSERT [dbo].[clientes_hash_crypt] ON;
INSERT [dbo].[clientes_hash_crypt] ([id], [cliente], [cliente_hash])
VALUES (79, N'JUAN PÉREZ GÓMEZ', N'789101112'),
       (80, N'MARIA LÓPEZ MARTÍNEZ', N'1213141516'),
       (81, N'CARLOS SÁNCHEZ RUIZ', N'1617181920'),
       (82, N'JUAN PÉREZ GÓMEZ', N'2122232425'),
       (83, N'MARIA LÓPEZ MARTÍNEZ', N'2627282930'),
       (84, N'CARLOS SÁNCHEZ RUIZ', N'3132333435');
SET IDENTITY_INSERT [dbo].[clientes_hash_crypt] OFF;
GO
SET IDENTITY_INSERT [dbo].[clientes_hash_crypt] OFF;
GO

SET IDENTITY_INSERT [dbo].[usuarios] ON;
GO
INSERT [dbo].[usuarios] ([id], [session_id], [id_rol], [id_cliente], [id_proveedor], [tipo_proveedor], [rfc], [name],
                         [apellido_paterno], [apellido_materno], [email], [email_verified_at], [password],
                         [prov_telefono], [prov_nombre_vialidad], [prov_numero_exterior], [prov_numero_interior],
                         [prov_colonia], [prov_alcaldia_municipio], [prov_codigo_postal], [prov_entidad],
                         [prov_membresia], [prov_pdf], [estatus_registro], [remember_token], [created_at], [updated_at])
VALUES (121526, NULL, 1, 79, 121526, N'PF', N'JUPE760101ABC', N'JUAN', N'PÉREZ', N'GÓMEZ', N'juan.perez@example.com',
        NULL, N'$2y$10$HATLTR9yfbJdfsx7Rixss.fQCBFPv3a1gLsLIxrl3Kq905zjoSPLC', 5544332211, N'CALLE LUNA', N'100', NULL,
        N'CENTRO', N'CUAUHTÉMOC', N'06000', N'CIUDAD DE MEXICO', N'PLAN_ANUAL', N'PMC - JUPE760101ABC.pdf',
        N'COMPLETADO', NULL, CAST(N'2024-08-19T14:00:00.0000000' AS DateTime2),
        CAST(N'2024-08-19T14:30:00.0000000' AS DateTime2)),
       (121527, NULL, 1, 80, 121527, N'PF', N'MALO860524JKL', N'MARIA', N'LÓPEZ', N'MARTÍNEZ',
        N'maria.lopez@example.com', NULL, N'$2y$10$HATLTR9yfbJdfsx7Rixss.fQCBFPv3a1gLsLIxrl3Kq905zjoSPLC', 5566778899,
        N'AV. SOL', N'200', N'APT 101', N'BOSQUES', N'ALVARO OBREGÓN', N'01210', N'CIUDAD DE MEXICO', N'PLAN_ANUAL',
        N'PMC - MALO860524JKL.pdf', N'COMPLETADO', NULL, CAST(N'2024-08-19T15:00:00.0000000' AS DateTime2),
        CAST(N'2024-08-19T15:30:00.0000000' AS DateTime2)),
       (121528, NULL, 1, 81, 121528, N'PF', N'CARS900123XYZ', N'CARLOS', N'SÁNCHEZ', N'RUIZ',
        N'carlos.sanchez@example.com', NULL, N'$2y$10$HATLTR9yfbJdfsx7Rixss.fQCBFPv3a1gLsLIxrl3Kq905zjoSPLC',
        5599887766, N'CALLE ESTRELLA', N'300', N'CASA 3', N'ROMA NORTE', N'CUAUHTÉMOC', N'06700', N'CIUDAD DE MEXICO',
        N'PLAN_ANUAL', N'PMC - CARS900123XYZ.pdf', N'COMPLETADO', NULL,
        CAST(N'2024-08-19T16:00:00.0000000' AS DateTime2), CAST(N'2024-08-19T16:30:00.0000000' AS DateTime2));
GO
SET IDENTITY_INSERT [dbo].[usuarios] OFF;
GO


INSERT INTO dbo.facturacion_test (serie, folio, fecha_facturacion, forma_pago, membresia, niu, razon_social, cliente, total, iva, importe, fecha_pago, renovacion, observaciones, regimen_fiscal, rfc, correo, vialidad, numero_interior, numero_exterior, codigo_postal, colonia,alcaldia_municipio, entidad, file_path, usuario_id, cliente_id, updated_at, created_at)
VALUES (N'Quis impedit nulla', 2, N'2015-04-24', N'Quos exercitation ad', N'Anual', N'MX22US01A002',
        N'COMPAÑIA ALFA S.A. DE C.V.', N'COMPAÑIA ALFA S.A. DE C.V.', 44.00, 6.07, 37.93, N'1976-06-25', N'Renovación',
        N'Sit lorem quisquam', N'1', N'ALFA0000001A', N'alfa@correo.com', N'AVENIDA PRIMAVERA', N'N/A', N'100', 1210,
        N'SANTA FE', N'ÁLVARO OBREGÓN', N'CIUDAD DE MÉXICO', N'evidencias/pdfDePrueba.pdf', 121516, 69,
        N'2024-09-04 13:10:09.0950000', N'2024-09-02 10:30:36.0130000'),
       (N'Qui voluptatibus qui', 62, N'2001-12-06', N'Sit fugit molestias', N'Mensual', N'MX22US01A002', N'COMPAÑIA ALFA S.A. DE C.V.', N'COMPAÑIA ALFA S.A. DE C.V.', 23.00, 3.17, 19.83, N'1988-09-14', N'Renovación',
        N'Dolores molestias ma', N'6', N'ALFA0000001A', N'alfa@correo.com', N'AVENIDA PRIMAVERA', N'N/A', N'100', 98546,
        N'MULEROS', N'PÁNUCO', N'ZACATECAS', N'evidencias/pdfDePrueba.pdf', 121516, 69, N'2024-09-04 13:12:50.5480000',
        N'2024-09-02 10:31:49.5510000'),
       (N'Tempor consectetur', 48, N'2009-06-23', N'Proident sunt ut mo', N'Mensual', N'MX22US01A002',
        N'COMPAÑIA ALFA S.A. DE C.V.', N'COMPAÑIA ALFA S.A. DE C.V.', 50.00, 6.90, 43.10, N'2007-12-13', N'Renovación',
        N'Vero quis saepe sed', N'1', N'ALFA0000001A', N'alfa@correo.com', N'AVENIDA PRIMAVERA', N'N/A', N'100', 12100,
        N'CRUZTITLA', N'MILPA ALTA', N'CIUDAD DE MÉXICO', N'evidencias/pdfDePrueba.pdf', 121516, 69,
        N'2024-09-04 13:13:52.1240000', N'2024-09-02 10:38:02.1140000'),
       (N'Aute qui accusantium', 78, N'1996-10-04', N'Explicabo Mollit pl', N'Anual', N'MX22US01A002',
        N'COMPAÑIA ALFA S.A. DE C.V.', N'COMPAÑIA ALFA S.A. DE C.V.', 57.00, 7.86, 49.14, N'2020-04-18', N'Renovación',
        N'Voluptatibus sequi f', N'1', N'ALFA0000001A', N'alfa@correo.com', N'AVENIDA PRIMAVERA', N'N/A', N'100', 49780,
        N'SAN JOSE DEL CARMEN', N'ZAPOTITLÁN DE VADILLO', N'JALISCO', N'evidencias/pdfDePrueba.pdf', 121516, 69,
        N'2024-09-04 13:39:04.8480000', N'2024-09-02 10:38:29.0350000'),
       (N'Id maiores adipisci', 58, N'1977-05-23', N'Suscipit irure elit', N'Anual', N'MX22US01A002',
        N'COMPAÑIA ALFA S.A. DE C.V.', N'COMPAÑIA ALFA S.A. DE C.V.', 38.00, 5.24, 32.76, N'1997-04-10', N'Renovación',
        N'Eos et aute hic qui', N'1', N'ALFA0000001A', N'alfa@correo.com', N'AVENIDA PRIMAVERA', N'N/A', N'100', 1210,
        N'SANTA FE', N'ÁLVARO OBREGÓN', N'CIUDAD DE MÉXICO', N'evidencias/pdfDePrueba.pdf',
        121516, 69, N'2024-09-03 18:32:08.7920000', N'2024-09-03 18:32:08.7920000'),
       (N'Possimus omnis tene', 11, N'1978-05-07', N'Eligendi est et in a', N'Mensual', N'MX22US01A002',
        N'COMPAÑIA ALFA S.A. DE C.V.', N'COMPAÑIA ALFA S.A. DE C.V.', 44.00, 6.07, 37.93, N'2018-07-14', N'Nuevo',
        N'Nemo dolore quod min', N'1', N'ALFA0000001A', N'alfa@correo.com', N'AVENIDA PRIMAVERA', N'N/A', N'100', 1210,
        N'SANTA FE', N'ÁLVARO OBREGÓN', N'CIUDAD DE MÉXICO', N'evidencias/pdfDePrueba.pdf',
        121516, 69, N'2024-09-03 18:42:19.2890000', N'2024-09-03 18:42:19.2890000'),
       (N'Dolorum sit in nobi', 7, N'1987-01-11', N'Doloremque quae esse', N'Mensual', N'MX22US01A002',
        N'COMPAÑIA ALFA S.A. DE C.V.', N'COMPAÑIA ALFA S.A. DE C.V.', 96.00, 13.24, 82.76, N'2021-02-02', N'Renovación',
        N'Fugit labore fugiat', N'1', N'ALFA0000001A', N'alfa@correo.com', N'AVENIDA PRIMAVERA', N'N/A', N'100', 1210,
        N'SANTA FE', N'ÁLVARO OBREGÓN', N'CIUDAD DE MÉXICO', N'evidencias/pdfDePrueba.pdf', 121516, 69,
        N'2024-09-04 15:17:02.8120000', N'2024-09-04 15:15:58.7460000'),
       (N'Sint molestias ulla', 60, N'1975-05-05', N'In non corporis est', N'Mensual', N'MX22US01A010',
        N'FINANZAS IOTA S.A. DE C.V.', N'FINANZAS IOTA S.A. DE C.V.', 42.00, 5.79, 36.21, N'2022-10-26', N'Renovación',
        N'Officia quo quia vol', N'6', N'IOTA0000009I', N'iota@correo.com', N'CALLE PRIMAVERA', N'N/A', N'900', 11870,
        N'TACUBAYA', N'MIGUEL HIDALGO', N'CIUDAD DE MÉXICO', N'evidencias/pdfDePrueba.pdf', 121524, 77,
        N'2024-09-05 11:56:00.6000000', N'2024-09-05 11:55:04.7680000'),
       (N'Et ut laboris id ut', 58, N'1994-09-08', N'Dolore voluptate est', N'Anual', N'MX22US01A007',
        N'CONSTRUCCIONES ZETA S.A. DE C.V.', N'CONSTRUCCIONES ZETA S.A. DE C.V.', 93.00, 12.83, 80.17, N'2024-11-20',
        N'Renovación', N'Error ut officia qui', N'1', N'ZETA0000006Z', N'zeta@correo.com', N'AVENIDA VERANO', N'N/A',
        N'600', 4000, N'VILLA COYOACÁN', N'COYOACÁN', N'CIUDAD DE MÉXICO', N'evidencias/pdfDePrueba.pdf', 121521, 74,
        N'2024-09-05 11:57:07.9250000', N'2024-09-05 11:56:49.6220000'),
       (N'Quis impedit nulla', 2, N'2015-04-24', N'Quos exercitation ad', N'Anual', N'MX22US01A002',
        N'COMPAÑIA ALFA S.A. DE C.V.', N'COMPAÑIA ALFA S.A. DE C.V.', 44.00, 6.07, 37.93, N'1976-06-25', N'Renovación',
        N'Sit lorem quisquam', N'1', N'ALFA0000001A', N'alfa@correo.com', N'AVENIDA PRIMAVERA', N'N/A', N'100', 1210,
        N'SANTA FE', N'ÁLVARO OBREGÓN', N'CIUDAD DE MÉXICO', N'evidencias/pdfDePrueba.pdf', 121516, 69,
        N'2024-09-04 13:10:09.0950000', N'2024-09-02 10:30:36.0130000'),
       (N'ABC', 1, N'2023-01-01', N'Transferencia', N'Anual', N'MX22US01A009', N'Empresa A', N'Cliente A', 100.00, 16.00,
        84.00, N'2023-01-02', N'Nuevo', N'Observación 1', N'6', N'MALO860524JKL', N'correo1@empresa.com', N'Calle 1', N'Int 1',
        N'Ext 1', 12345, N'Colonia 1', N'Municipio 1', N'Entidad 1', N'evidencias/pdfDePrueba.pdf', 121527, 80, N'2023-01-01 12:00:00',
        N'2023-01-01 12:00:00'),
        (N'Lorem ipsum dolor', 3, N'2016-05-25', N'Lorem ipsum', N'Mensual', N'MX22US01A003', N'EMPRESA BETA S.A. DE C.V.', N'EMPRESA BETA S.A. DE C.V.', 55.00, 8.80, 46.20, N'2017-07-15', N'Renovación', N'Lorem ipsum dolor', N'2', N'BETA0000002B', N'beta@correo.com', N'CALLE VERANO', N'N/A', N'200', 1234, N'COLONIA VERANO', N'BENITO JUÁREZ', N'CIUDAD DE MÉXICO', N'evidencias/pdfDePrueba.pdf', 121517, 70, N'2024-09-05 10:00:00.0000000', N'2024-09-05 09:00:00.0000000'), (N'Sit amet consectetur', 4, N'2017-06-26', N'Sit amet', N'Anual', N'MX22US01A004', N'EMPRESA GAMMA S.A. DE C.V.', N'EMPRESA GAMMA S.A. DE C.V.', 66.00, 10.56, 55.44, N'2018-08-16', N'Renovación', N'Sit amet consectetur', N'3', N'GAMMA0000003G', N'gamma@correo.com', N'CALLE OTOÑO', N'N/A', N'300', 5678, N'COLONIA OTOÑO', N'COYOACÁN', N'CIUDAD DE MÉXICO', N'evidencias/pdfDePrueba.pdf', 121518, 71, N'2024-09-06 11:00:00.0000000', N'2024-09-06 10:00:00.0000000'),
        (N'Adipiscing elit', 5, N'2018-07-27', N'Adipiscing elit', N'Mensual', N'MX22US01A005', N'EMPRESA DELTA S.A. DE C.V.', N'EMPRESA DELTA S.A. DE C.V.', 77.00, 12.32, 64.68, N'2019-09-17', N'Renovación', N'Adipiscing elit', N'4', N'DELTA0000004D', N'delta@correo.com', N'CALLE INVIERNO', N'N/A', N'400', 9101, N'COLONIA INVIERNO', N'MIGUEL HIDALGO', N'CIUDAD DE MÉXICO', N'evidencias/pdfDePrueba.pdf', 121519, 72, N'2024-09-07 12:00:00.0000000', N'2024-09-07 11:00:00.0000000'),
        (N'Eiusmod tempor', 6, N'2019-08-28', N'Eiusmod tempor', N'Anual', N'MX22US01A006', N'EMPRESA EPSILON S.A. DE C.V.', N'EMPRESA EPSILON S.A. DE C.V.', 88.00, 14.08, 73.92, N'2020-10-18', N'Nuevo', N'Eiusmod tempor', N'5', N'EPSILON000000', N'epsilon@correo.com', N'CALLE PRIMAVERA', N'N/A', N'500', 1123, N'COLONIA PRIMAVERA', N'ÁLVARO OBREGÓN', N'CIUDAD DE MÉXICO', N'evidencias/pdfDePrueba.pdf', 121520, 73, N'2024-09-08 13:00:00.0000000', N'2024-09-08 12:00:00.0000000'),
        (N'Incididunt ut labore', 7, N'2020-09-29', N'Incididunt ut', N'Mensual', N'MX22US01A007', N'EMPRESA ZETA S.A. DE C.V.', N'EMPRESA ZETA S.A. DE C.V.', 99.00, 15.84, 83.16, N'2021-11-19', N'Renovación', N'Incididunt ut labore', N'6', N'ZETA0000006Z', N'zeta@correo.com', N'CALLE VERANO', N'N/A', N'600', 1345, N'COLONIA VERANO', N'COYOACÁN', N'CIUDAD DE MÉXICO', N'evidencias/pdfDePrueba.pdf', 121521, 74, N'2024-09-09 14:00:00.0000000', N'2024-09-09 13:00:00.0000000'),
       (N'Excepteur sint occaecat', 8, N'2021-10-10', N'Excepteur sint', N'Anual', N'MX22US01A008', N'EMPRESA THETA S.A. DE C.V.', N'EMPRESA THETA S.A. DE C.V.', 110.00, 17.60, 92.40, N'2022-12-20', N'Renovación', N'Excepteur sint occaecat', N'7', N'THETA0000008T', N'theta@correo.com', N'CALLE INVIERNO', N'N/A', N'800', 5678, N'COLONIA INVIERNO', N'MIGUEL HIDALGO', N'CIUDAD DE MÉXICO', N'evidencias/pdfDePrueba.pdf', 121523, 76, N'2024-09-10 15:00:00.0000000', N'2024-09-10 14:00:00.0000000'),
       (N'Cupidatat non proident', 9, N'2022-11-11', N'Cupidatat non', N'Mensual', N'MX22US01A009', N'EMPRESA IOTA S.A. DE C.V.', N'EMPRESA IOTA S.A. DE C.V.', 121.00, 19.36, 101.64, N'2023-01-21', N'Nuevo', N'Cupidatat non proident', N'8', N'IOTA0000009I', N'iota@correo.com', N'CALLE PRIMAVERA', N'N/A', N'900', 9101, N'COLONIA PRIMAVERA', N'ÁLVARO OBREGÓN', N'CIUDAD DE MÉXICO', N'evidencias/pdfDePrueba.pdf', 121524, 77, N'2024-09-11 16:00:00.0000000', N'2024-09-11 15:00:00.0000000'),
       (N'Sunt in culpa', 10, N'2023-12-12', N'Sunt in', N'Anual', N'MX22US01A010', N'EMPRESA KAPPA S.A. DE C.V.', N'EMPRESA KAPPA S.A. DE C.V.', 132.00, 21.12, 110.88, N'2024-02-22', N'Renovación', N'Sunt in culpa', N'9', N'KAPPA0000010K', N'kappa@correo.com', N'CALLE OTOÑO', N'N/A', N'1000', 1123, N'COLONIA OTOÑO', N'COYOACÁN', N'CIUDAD DE MÉXICO', N'evidencias/pdfDePrueba.pdf', 121525, 78, N'2024-09-12 17:00:00.0000000', N'2024-09-12 16:00:00.0000000'),
       (N'Officia deserunt mollit', 11, N'2024-01-13', N'Officia deserunt', N'Mensual', N'MX22US01A011', N'EMPRESA LAMBDA S.A. DE C.V.', N'EMPRESA LAMBDA S.A. DE C.V.', 143.00, 22.88, 120.12, N'2024-03-23', N'Renovación', N'Officia deserunt mollit', N'10', N'LAMBDA000', N'lambda@correo.com', N'CALLE PRIMAVERA', N'N/A', N'1100', 1345, N'COLONIA PRIMAVERA', N'ÁLVARO OBREGÓN', N'CIUDAD DE MÉXICO', N'evidencias/pdfDePrueba.pdf', 121526, 79, N'2024-09-13 18:00:00.0000000', N'2024-09-13 17:00:00.0000000'),
       (N'Anim id est laborum', 12, N'2024-02-14', N'Anim id', N'Anual', N'MX22US01A0oo', N'EMPRESA MU S.A. DE C.V.', N'EMPRESA MU S.A. DE C.V.', 154.00, 24.64, 129.36, N'2024-04-24', N'Nuevo', N'Anim id est laborum', N'11', N'MU0000012M', N'mu@correo.com', N'CALLE OTOÑO', N'N/A', N'1200', 1567, N'COLONIA OTOÑO', N'COYOACÁN', N'CIUDAD DE MÉXICO', N'evidencias/pdfDePrueba.pdf', 121527, 80, N'2024-09-14 19:00:00.0000000', N'2024-09-14 18:00:00.0000000'),
        (N'Velit esse cillum', 13, N'2024-03-15', N'Velit esse', N'Mensual', N'MX22US01A0uu', N'EMPRESA NU S.A. DE C.V.', N'EMPRESA NU S.A. DE C.V.', 165.00, 26.40, 138.60, N'2024-05-25', N'Nuevo', N'Velit esse cillum', N'12', N'NU0000013N', N'nu@correo.com', N'CALLE PRIMAVERA', N'N/A', N'1300', 1789, N'COLONIA PRIMAVERA', N'ÁLVARO OBREGÓN', N'CIUDAD DE MÉXICO', N'evidencias/pdfDePrueba.pdf', 121528, 81, N'2024-09-15 20:00:00.0000000', N'2024-09-15 19:00:00.0000000'),
        (N'Fugiat nulla pariatur', 14, N'2024-04-16', N'Fugiat nulla', N'Anual', N'MX22US01A0uu', N'EMPRESA XI S.A. DE C.V.', N'EMPRESA XI S.A. DE C.V.', 176.00, 28.16, 147.84, N'2024-06-26', N'Nuevo', N'Fugiat nulla pariatur', N'13', N'XI0000014X', N'xi@correo.com', N'CALLE OTOÑO', N'N/A', N'1400', 2001, N'COLONIA OTOÑO', N'COYOACÁN', N'CIUDAD DE MÉXICO', N'evidencias/pdfDePrueba.pdf', 121523, 82, N'2024-09-16 21:00:00.0000000', N'2024-09-16 20:00:00.0000000'),
        (N'Excepteur sint occaecat', 15, N'2024-05-17', N'Excepteur sint', N'Mensual', N'MX22US01A0yy', N'EMPRESA OMICRON S.A. DE C.V.', N'EMPRESA OMICRON S.A. DE C.V.', 187.00, 29.92, 157.08, N'2024-07-27', N'Nuevo', N'Excepteur sint occaecat', N'14', N'OMICRON000001', N'omicron@correo.com', N'CALLE INVIERNO', N'N/A', N'1500', 2223, N'COLONIA INVIERNO', N'MIGUEL HIDALGO', N'CIUDAD DE MÉXICO', N'evidencias/pdfDePrueba.pdf', 121527, 83, N'2024-09-17 22:00:00.0000000', N'2024-09-17 21:00:00.0000000'),
        (N'Cupidatat non proident', 16, N'2024-06-18', N'Cupidatat non', N'Anual', N'MX22US01A0yy', N'EMPRESA PI S.A. DE C.V.', N'EMPRESA PI S.A. DE C.V.', 198.00, 31.68, 166.32, N'2024-08-28', N'Nuevo', N'Cupidatat non proident', N'15', N'PI0000016P', N'pi@correo.com', N'CALLE PRIMAVERA', N'N/A', N'1600', 2445, N'COLONIA PRIMAVERA', N'ÁLVARO OBREGÓN', N'CIUDAD DE MÉXICO', N'evidencias/pdfDePrueba.pdf', 121528, 84, N'2024-09-18 23:00:00.0000000', N'2024-09-18 22:00:00.0000000'),

       (N'Adipiscing elit', 3, N'2016-05-25', N'Adipiscing elit', N'Mensual', N'MX22US01A003', N'EMPRESA BETA S.A. DE C.V.', N'EMPRESA BETA S.A. DE C.V.', 55.00, 8.80, 46.20, N'1977-07-26', N'Renovación', N'Adipiscing elit', N'2', N'BETA0000002B', N'beta@correo.com', N'CALLE VERANO', N'N/A', N'200', 9101, N'COLONIA VERANO', N'MIGUEL HIDALGO', N'CIUDAD DE MÉXICO', N'Pendiente', 121517, 70, N'2024-09-05 14:10:09.0950000', N'2024-09-03 11:30:36.0130000'),
       (N'Eiusmod tempor', 4, N'2017-06-26', N'Eiusmod tempor', N'Anual', N'MX22US01A004', N'EMPRESA GAMMA S.A. DE C.V.', N'EMPRESA GAMMA S.A. DE C.V.', 66.00, 10.56, 55.44, N'1978-08-27', N'Renovación', N'Eiusmod tempor', N'3', N'GAMMA0000003G', N'gamma@correo.com', N'CALLE OTOÑO', N'N/A', N'300', 1123, N'COLONIA OTOÑO', N'ÁLVARO OBREGÓN', N'CIUDAD DE MÉXICO', N'Pendiente', 121518, 71, N'2024-09-06 15:10:09.0950000', N'2024-09-04 12:30:36.0130000'),
       (N'Incididunt ut labore', 5, N'2018-07-27', N'Incididunt ut', N'Mensual', N'MX22US01A005', N'EMPRESA DELTA S.A. DE C.V.', N'EMPRESA DELTA S.A. DE C.V.', 77.00, 12.32, 64.68, N'1979-09-28', N'Renovación', N'Incididunt ut labore', N'4', N'DELTA0000004D', N'delta@correo.com', N'CALLE INVIERNO', N'N/A', N'400', 1345, N'COLONIA INVIERNO', N'COYOACÁN', N'CIUDAD DE MÉXICO', N'Pendiente', 121519, 72, N'2024-09-07 16:10:09.0950000', N'2024-09-05 13:30:36.0130000'),
       (N'Excepteur sint occaecat', 6, N'2019-08-28', N'Excepteur sint', N'Anual', N'MX22US01A006', N'EMPRESA EPSILON S.A. DE C.V.', N'EMPRESA EPSILON S.A. DE C.V.', 88.00, 14.08, 73.92, N'1980-10-29', N'Renovación', N'Excepteur sint occaecat', N'5', N'EPSILON000000', N'epsilon@correo.com', N'CALLE PRIMAVERA', N'N/A', N'500', 1567, N'COLONIA PRIMAVERA', N'ÁLVARO OBREGÓN', N'CIUDAD DE MÉXICO', N'Pendiente', 121520, 73, N'2024-09-08 17:10:09.0950000', N'2024-09-06 14:30:36.0130000'),
       (N'Cupidatat non proident', 7, N'2020-09-29', N'Cupidatat non', N'Mensual', N'MX22US01A007', N'EMPRESA ZETA S.A. DE C.V.', N'EMPRESA ZETA S.A. DE C.V.', 99.00, 15.84, 83.16, N'1981-11-30', N'Renovación', N'Cupidatat non proident', N'6', N'ZETA0000006Z', N'zeta@correo.com', N'CALLE VERANO', N'N/A', N'600', 1789, N'COLONIA VERANO', N'COYOACÁN', N'CIUDAD DE MÉXICO', N'Pendiente', 121521, 74, N'2024-09-09 18:10:09.0950000', N'2024-09-07 15:30:36.0130000'),
       (N'Laboris nisi ut', 8, N'2021-10-30', N'Laboris nisi', N'Anual', N'MX22US01A008', N'EMPRESA ETA S.A. DE C.V.', N'EMPRESA ETA S.A. DE C.V.', 110.00, 17.60, 92.40, N'1982-12-31', N'Renovación', N'Laboris nisi ut', N'7', N'ETA0000008E', N'eta@correo.com', N'CALLE OTOÑO', N'N/A', N'700', 2001, N'COLONIA OTOÑO', N'ÁLVARO OBREGÓN', N'CIUDAD DE MÉXICO', N'Pendiente', 121522, 75, N'2024-09-10 19:10:09.0950000', N'2024-09-08 16:30:36.0130000'),
       (N'Ut aliquip ex ea', 9, N'2022-11-01', N'Ut aliquip', N'Mensual', N'MX22US01A009', N'EMPRESA THETA S.A. DE C.V.', N'EMPRESA THETA S.A. DE C.V.', 121.00, 19.36, 101.64, N'1983-01-01', N'Renovación', N'Ut aliquip ex ea', N'8', N'THETA0000009T', N'theta@correo.com', N'CALLE PRIMAVERA', N'N/A', N'800', 2223, N'COLONIA PRIMAVERA', N'ÁLVARO OBREGÓN', N'CIUDAD DE MÉXICO', N'Pendiente', 121523, 76, N'2024-09-11 20:10:09.0950000', N'2024-09-09 17:30:36.0130000'),
       (N'Duis aute irure', 10, N'2023-12-02', N'Duis aute', N'Anual', N'MX22US01A010', N'EMPRESA IOTA S.A. DE C.V.', N'EMPRESA IOTA S.A. DE C.V.', 132.00, 21.12, 110.88, N'1984-02-02', N'Renovación', N'Duis aute irure', N'9', N'IOTA0000010I', N'iota@correo.com', N'CALLE INVIERNO', N'N/A', N'900', 2445, N'COLONIA INVIERNO', N'COYOACÁN', N'CIUDAD DE MÉXICO', N'Pendiente', 121524, 77, N'2024-09-12 21:10:09.0950000', N'2024-09-10 18:30:36.0130000'),
       (N'Excepteur sint occaecat', 11, N'2024-01-03', N'Excepteur sint', N'Mensual', N'MX22US01A011', N'EMPRESA KAPPA S.A. DE C.V.', N'EMPRESA KAPPA S.A. DE C.V.', 143.00, 22.88, 120.12, N'1985-03-03', N'Renovación', N'Excepteur sint occaecat', N'10', N'KAPPA0000011K', N'kappa@correo.com', N'CALLE PRIMAVERA', N'N/A', N'1000', 2667, N'COLONIA PRIMAVERA', N'ÁLVARO OBREGÓN', N'CIUDAD DE MÉXICO', N'Pendiente', 121525, 78, N'2024-09-13 22:10:09.0950000', N'2024-09-11 19:30:36.0130000'),
       (N'Officia deserunt mollit', 12, N'2024-02-04', N'Officia deserunt', N'Anual', N'MX22US01A0yy', N'EMPRESA LAMBDA S.A. DE C.V.', N'EMPRESA LAMBDA S.A. DE C.V.', 154.00, 24.64, 129.36, N'1986-04-04', N'Renovación', N'Officia deserunt mollit', N'11', N'LAMBDA0000012', N'lambda@correo.com', N'CALLE OTOÑO', N'N/A', N'1100', 2889, N'COLONIA OTOÑO', N'ÁLVARO OBREGÓN', N'CIUDAD DE MÉXICO', N'Pendiente', 121526, 79, N'2024-09-14 23:10:09.0950000', N'2024-09-12 20:30:36.0130000'),
       (N'Anim id est laborum', 13, N'2024-03-05', N'Anim id', N'Mensual', N'MX22US01A0yy', N'EMPRESA MU S.A. DE C.V.', N'EMPRESA MU S.A. DE C.V.', 165.00, 26.40, 138.60, N'1987-05-05', N'Renovación', N'Anim id est laborum', N'12', N'MU0000013M', N'mu@correo.com', N'CALLE PRIMAVERA', N'N/A', N'1200', 3111, N'COLONIA PRIMAVERA', N'ÁLVARO OBREGÓN', N'CIUDAD DE MÉXICO', N'Pendiente', 121527, 80, N'2024-09-15 00:10:09.0950000', N'2024-09-13 21:30:36.0130000'),
       (N'Velit esse cillum', 14, N'2024-04-06', N'Velit esse', N'Anual', N'MX22US01A011', N'EMPRESA NU S.A. DE C.V.', N'EMPRESA NU S.A. DE C.V.', 176.00, 28.16, 147.84, N'1988-06-06', N'Renovación', N'Velit esse cillum', N'13', N'NU0000014N', N'nu@correo.com', N'CALLE INVIERNO', N'N/A', N'1300', 3333, N'COLONIA INVIERNO', N'COYOACÁN', N'CIUDAD DE MÉXICO', N'Pendiente', 121528, 81, N'2024-09-16 01:10:09.0950000', N'2024-09-14 22:30:36.0130000'),
       (N'Fugiat nulla pariatur', 15, N'2024-05-07', N'Fugiat nulla', N'Mensual', N'MX22US01A0oo', N'EMPRESA XI S.A. DE C.V.', N'EMPRESA XI S.A. DE C.V.', 187.00, 29.92, 157.08, N'1989-07-07', N'Renovación', N'Fugiat nulla pariatur', N'14', N'XI0000015X', N'xi@correo.com', N'CALLE PRIMAVERA', N'N/A', N'1400', 3555, N'COLONIA PRIMAVERA', N'ÁLVARO OBREGÓN', N'CIUDAD DE MÉXICO', N'Pendiente', 121528, 82, N'2024-09-17 02:10:09.0950000', N'2024-09-15 23:30:36.0130000'),
       (N'Excepteur sint occaecat', 16, N'2024-06-08', N'Excepteur sint', N'Anual', N'MX22US01A011', N'EMPRESA OMICRON S.A. DE C.V.', N'EMPRESA OMICRON S.A. DE C.V.', 198.00, 31.68, 166.32, N'1990-08-08', N'Renovación', N'Excepteur sint occaecat', N'15', N'OMICRON000001', N'omicron@correo.com', N'CALLE OTOÑO', N'N/A', N'1500', 3777, N'COLONIA OTOÑO', N'ÁLVARO OBREGÓN', N'CIUDAD DE MÉXICO', N'Pendiente', 121527, 83, N'2024-09-18 03:10:09.0950000', N'2024-09-16 00:30:36.0130000'),
       (N'Cupidatat non proident', 17, N'2024-07-09', N'Cupidatat non', N'Mensual', N'MX22US01A011', N'EMPRESA PI S.A. DE C.V.', N'EMPRESA PI S.A. DE C.V.', 209.00, 33.44, 175.56, N'1991-09-09', N'Renovación', N'Cupidatat non proident', N'16', N'PI0000017P', N'pi@correo.com', N'CALLE PRIMAVERA', N'N/A', N'1600', 3999, N'COLONIA PRIMAVERA', N'ÁLVARO OBREGÓN', N'CIUDAD DE MÉXICO', N'Pendiente', 121515, 84, N'2024-09-19 04:10:09.0950000', N'2024-09-17 01:30:36.0130000'),(N'Excepteur sint occaecat', 15, N'2024-05-17', N'Excepteur sint', N'Mensual', N'MX22US01A0yy',N'EMPRESA OMICRON S.A. DE C.V.', N'EMPRESA OMICRON S.A. DE C.V.', 187.00, 29.92, 157.08, N'2024-07-27',N'Nuevo', N'Excepteur sint occaecat', N'14', N'OMICRON000001', N'omicron@correo.com', N'CALLE INVIERNO', N'N/A', N'1500', 2223, N'COLONIA INVIERNO', N'MIGUEL HIDALGO', N'CIUDAD DE MÉXICO', N'Pendiente',121527, 83, N'2024-09-17 22:00:00.0000000', N'2024-09-17 21:00:00.0000000'),
       (N'Cupidatat non proident', 16, N'2024-06-18', N'Cupidatat non', N'Anual', N'MX22US01A0yy',
        N'EMPRESA PI S.A. DE C.V.', N'EMPRESA PI S.A. DE C.V.', 198.00, 31.68, 166.32, N'2024-08-28', N'Nuevo',
        N'Cupidatat non proident', N'15', N'PI0000016P', N'pi@correo.com', N'CALLE PRIMAVERA', N'N/A', N'1600', 2445,
        N'COLONIA PRIMAVERA', N'ÁLVARO OBREGÓN', N'CIUDAD DE MÉXICO', N'Pendiente', 121528, 84,
        N'2024-09-18 23:00:00.0000000', N'2024-09-18 22:00:00.0000000'),
       (N'Sed ut perspiciatis', 1001, N'2023-02-01', N'Transferencia', N'Anual', N'MX22US01A002',
        N'COMPAÑIA ALFA S.A. DE C.V.', N'COMPAÑIA ALFA S.A. DE C.V.', 150.00, 24.00, 126.00, N'2023-02-02',
        N'Renovación', N'Observación A', N'6', N'ALFA0000001A', N'alfa@correo.com', N'CALLE 1', N'Int 1', N'Ext 1',
        12345, N'Colonia 1', N'Municipio 1', N'CIUDAD DE MÉXICO', N'Pendiente', 121516, 69,
        N'2024-09-05 11:00:00.0000000', N'2024-09-05 10:00:00.0000000'),
       (N'Lorem ipsum dolor', 1002, N'2023-03-01', N'Efectivo', N'Mensual', N'MX22US01A0uu',
        N'COMPAÑIA ALFA S.A. DE C.V.', N'COMPAÑIA ALFA S.A. DE C.V.', 75.00, 12.00, 63.00, N'2023-03-02', N'Nuevo',
        N'Observación B', N'6', N'ALFA0000001A', N'alfa@correo.com', N'CALLE 2', N'Int 2', N'Ext 2', 54321,
        N'Colonia 2', N'Municipio 2', N'CIUDAD DE MÉXICO', N'Pendiente', 121516, 69, N'2024-09-05 12:00:00.0000000',
        N'2024-09-05 11:00:00.0000000'),
       (N'Dolor sit amet', 1003, N'2023-04-01', N'Cheque', N'Anual', N'MX22US01A003', N'COMPAÑIA ALFA S.A. DE C.V.',
        N'COMPAÑIA ALFA S.A. DE C.V.', 125.00, 20.00, 105.00, N'2023-04-02', N'Renovación', N'Observación C', N'6',
        N'ALFA0000001A', N'alfa@correo.com', N'CALLE 3', N'Int 3', N'Ext 3', 67890, N'Colonia 3', N'Municipio 3',
        N'CIUDAD DE MÉXICO', N'Pendiente', 121516, 69, N'2024-09-05 13:00:00.0000000', N'2024-09-05 12:00:00.0000000'),
       (N'Consectetur adipiscing', 1004, N'2023-05-01', N'Tarjeta de Crédito', N'Mensual', N'MX22US01A002',
        N'COMPAÑIA ALFA S.A. DE C.V.', N'COMPAÑIA ALFA S.A. DE C.V.', 200.00, 32.00, 168.00, N'2023-05-02', N'Nuevo',
        N'Observación D', N'6', N'ALFA0000001A', N'alfa@correo.com', N'CALLE 4', N'Int 4', N'Ext 4', 23456,
        N'Colonia 4', N'Municipio 4', N'CIUDAD DE MÉXICO', N'Pendiente', 121516, 69, N'2024-09-05 14:00:00.0000000',
        N'2024-09-05 13:00:00.0000000'),
       (N'Elit sed do eiusmod', 1005, N'2023-06-01', N'Pago en línea', N'Anual', N'MX22US01A005',
        N'COMPAÑIA ALFA S.A. DE C.V.', N'COMPAÑIA ALFA S.A. DE C.V.', 175.00, 28.00, 147.00, N'2023-06-02',
        N'Renovación', N'Observación E', N'6', N'ALFA0000001A', N'alfa@correo.com', N'CALLE 5', N'Int 5', N'Ext 5',
        98765, N'Colonia 5', N'Municipio 5', N'CIUDAD DE MÉXICO', N'Pendiente', 121516, 69,
        N'2024-09-05 15:00:00.0000000', N'2024-09-05 14:00:00.0000000'),
       (N'Tempor incididunt ut', 1006, N'2023-07-01', N'Tarjeta de Débito', N'Mensual', N'MX22US01A006',
        N'COMPAÑIA ALFA S.A. DE C.V.', N'COMPAÑIA ALFA S.A. DE C.V.', 300.00, 48.00, 252.00, N'2023-07-02',
        N'Renovación', N'Observación F', N'6', N'ALFA0000001A', N'alfa@correo.com', N'CALLE 6', N'Int 6', N'Ext 6',
        11223, N'Colonia 6', N'Municipio 6', N'CIUDAD DE MÉXICO', N'Pendiente', 121516, 69,
        N'2024-09-05 16:00:00.0000000', N'2024-09-05 15:00:00.0000000'),
       (N'Labore et dolore magna', 1007, N'2023-08-01', N'Cheque', N'Anual', N'MX22US01A002',
        N'COMPAÑIA ALFA S.A. DE C.V.', N'COMPAÑIA ALFA S.A. DE C.V.', 225.00, 36.00, 189.00, N'2023-08-02',
        N'Renovación', N'Observación G', N'6', N'ALFA0000001A', N'alfa@correo.com', N'CALLE 7', N'Int 7', N'Ext 7',
        44556, N'Colonia 7', N'Municipio 7', N'CIUDAD DE MÉXICO', N'Pendiente', 121516, 69,
        N'2024-09-05 17:00:00.0000000', N'2024-09-05 16:00:00.0000000'),
       (N'Ullamco laboris nisi', 1008, N'2023-09-01', N'Tarjeta de Crédito', N'Mensual', N'MX22US01A006',
        N'COMPAÑIA ALFA S.A. DE C.V.', N'COMPAÑIA ALFA S.A. DE C.V.', 275.00, 44.00, 231.00, N'2023-09-02', N'Nuevo',
        N'Observación H', N'6', N'ALFA0000001A', N'alfa@correo.com', N'CALLE 8', N'Int 8', N'Ext 8', 66778,
        N'Colonia 8', N'Municipio 8', N'CIUDAD DE MÉXICO', N'Pendiente', 121516, 69, N'2024-09-05 18:00:00.0000000',
        N'2024-09-05 17:00:00.0000000');

GO

SET IDENTITY_INSERT facturacion.dbo.cat_regimen_fiscal ON;
GO

SET IDENTITY_INSERT dbo.cat_regimen_fiscal ON;
insert into dbo.cat_regimen_fiscal (id, c_RegimenFiscal, Descripcion)
values  (601, N'601', N'General de Ley Personas Morales'),
        (603, N'603', N'Personas Morales con Fines no Lucrativos'),
        (605, N'605', N'Sueldos y Salarios e Ingresos Asimilados a Salarios'),
        (606, N'606', N'Arrendamiento'),
        (607, N'607', N'Régimen de Enajenación o Adquisición de Bienes'),
        (608, N'608', N'Demás ingresos'),
        (610, N'610', N'Residentes en el Extranjero sin Establecimiento Permanente en México'),
        (611, N'611', N'Ingresos por Dividendos (socios y accionistas)'),
        (612, N'612', N'Personas Físicas con Actividades Empresariales y Profesionales'),
        (614, N'614', N'Ingresos por intereses'),
        (615, N'615', N'Régimen de los ingresos por obtención de premios'),
        (616, N'616', N'Sin obligaciones fiscales'),
        (620, N'620', N'Sociedades Cooperativas de Producción que optan por diferir sus ingresos'),
        (621, N'621', N'Incorporación Fiscal'),
        (622, N'622', N'Actividades Agrícolas, Ganaderas, Silvícolas y Pesqueras'),
        (623, N'623', N'Opcional para Grupos de Sociedades'),
        (624, N'624', N'Coordinados'),
        (625, N'625', N'Régimen de las Actividades Empresariales con ingresos a través de Plataformas Tecnológicas'),
        (626, N'626', N'Régimen Simplificado de Confianza');
SET IDENTITY_INSERT dbo.cat_regimen_fiscal OFF;

SET IDENTITY_INSERT facturacion.dbo.cat_regimen_fiscal OFF;
GO
