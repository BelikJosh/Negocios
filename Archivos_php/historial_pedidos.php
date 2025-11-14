<?php
// historial_pedidos.php

// Conexión a la base de datos
require_once('bd_conection.php');

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Consulta SQL para obtener el historial de pedidos
$sql = "SELECT ID, numero_factura, fecha_factura, hora_factura, productos, total_factura, nombre_cliente, email_cliente, direccion_cliente FROM facturas ORDER BY fecha_factura DESC, hora_factura DESC";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Pedidos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #4a6fa5;
            --secondary-color: #166088;
            --accent-color: #4fc3f7;
            --light-color: #f8f9fa;
            --dark-color: #343a40;
            --success-color: #28a745;
            --danger-color: #dc3545;
            --border-radius: 8px;
            --box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f5f7fa;
            padding: 20px;
        }
        
        .historial-container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            padding: 25px;
            overflow-x: auto;
        }
        
        h1 {

            color: var(--secondary-color);
            text-align: center;
            margin-bottom: 25px;
            font-weight: 600;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 25px;
        }
        
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #e0e0e0;
        }
        
        th {
            background-color: var(--primary-color);
            color: white;
            font-weight: 500;
            position: sticky;
            top: 0;
        }
        
        tr:nth-child(even) {
            background-color: #f8f9fa;
        }
        
        tr:hover {
            background-color: #f1f1f1;
        }
        
        .no-pedidos {
            text-align: center;
            padding: 20px;
            color: var(--danger-color);
            font-size: 18px;
        }
        
        .btn-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        
        .regresar-btn {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: var(--border-radius);
            cursor: pointer;
            font-size: 16px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .regresar-btn:hover {
            background-color: var(--secondary-color);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        
        .badge {
            display: inline-block;
            padding: 3px 8px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }
        
        .badge-success {
            background-color: #d4edda;
            color: #155724;
        }
        
        .productos-cell {
            max-width: 250px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        
        .productos-cell:hover {
            white-space: normal;
            overflow: visible;
            position: relative;
            z-index: 1;
            background: white;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        
        @media (max-width: 768px) {
            table {
                display: block;
                overflow-x: auto;
            }
            
            th, td {
                padding: 8px 10px;
                font-size: 14px;
            }
            
            .historial-container {
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="historial-container">
        <h1><i class="fas fa-history"></i> Historial de Pedidos</h1>
        
        <?php if ($result->num_rows > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Factura</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Productos</th>
                        <th>Total</th>
                        <th>Cliente</th>
                        <th>Email</th>
                        <th>Dirección</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($row["ID"]) ?></td>
                            <td>
                                <span class="badge badge-success">
                                    <?= htmlspecialchars($row["numero_factura"]) ?>
                                </span>
                            </td>
                            <td><?= htmlspecialchars($row["fecha_factura"]) ?></td>
                            <td><?= htmlspecialchars($row["hora_factura"]) ?></td>
                            <td class="productos-cell" title="<?= htmlspecialchars($row["productos"]) ?>">
                                <?= htmlspecialchars($row["productos"]) ?>
                            </td>
                            <td>$<?= number_format($row["total_factura"], 2) ?></td>
                            <td><?= htmlspecialchars($row["nombre_cliente"]) ?></td>
                            <td><?= htmlspecialchars($row["email_cliente"]) ?></td>
                            <td><?= htmlspecialchars($row["direccion_cliente"]) ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="no-pedidos"><i class="fas fa-info-circle"></i> No se encontraron pedidos.</p>
        <?php endif; ?>
        
        <div class="btn-container">
            <button class="regresar-btn" onclick="window.location.href='../Archivos_php/index.php'">
                <i class="fas fa-arrow-left"></i> Regresar
            </button>
        </div>
    </div>
</body>
</html>
<?php
// Cerrar la conexión
$conn->close();
?>