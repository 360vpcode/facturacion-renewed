DECLARE @searchTerm NVARCHAR(255)
SET @searchTerm = 'XXX'

SELECT
    u.rfc,
    u.name,
    u.apellido_paterno,
    u.apellido_materno,
    u.razon_social,
    u.tipo_sociedad,
    u.email,
    u.tipo_proveedor,
    ch.cliente,
    n.niu
FROM
    [dbo].[usuarios] u
        INNER JOIN
    [dbo].[clientes_hash_crypt] ch ON u.id_cliente = ch.id
        INNER JOIN
    [dbo].[facturacion] f ON u.id = f.id_proveedor
        INNER JOIN
    [dbo].[niu] n ON u.id = n.id_proveedor
WHERE
    u.estatus_registro = 'COMPLETADO'
  AND (
    u.rfc LIKE '%' + @searchTerm + '%' OR
    u.razon_social LIKE '%' + @searchTerm + '%' OR
    u.name LIKE '%' + @searchTerm + '%' OR
    u.apellido_paterno LIKE '%' + @searchTerm + '%' OR
    u.apellido_materno LIKE '%' + @searchTerm + '%'
    )
