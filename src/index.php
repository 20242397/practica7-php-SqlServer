<?php
$host = 'db';
$dbname = 'holamundo';
$user = 'sa';
$password = 'Secret123!';

$connected = false;
$error = '';

try {
    $pdo = new PDO("sqlsrv:Server=$host;Database=$dbname", $user, $password, [
        PDO::ATTR_TIMEOUT => 5,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);
    $connected = true;
} catch (PDOException $e) {
    $error = $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>Hola Mundo - PHP + SQL Server + Docker</title>
  <style>
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body {
      background: #0a0a0f;
      color: #e8e8f0;
      font-family: 'Segoe UI', sans-serif;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      gap: 1.5rem;
    }
    h1 { font-size: 3.5rem; color: #00ff88; letter-spacing: -0.02em; }
    .card {
      border: 1px solid rgba(0,255,136,0.2);
      border-radius: 4px;
      padding: 1.5rem 2.5rem;
      background: rgba(18,18,26,0.8);
      text-align: center;
    }
    .status {
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      font-family: monospace;
      font-size: 0.9rem;
      margin-top: 0.75rem;
    }
    .dot { width: 10px; height: 10px; border-radius: 50%; }
    .ok  { background: #00ff88; box-shadow: 0 0 8px #00ff88; }
    .err { background: #ff3c3c; box-shadow: 0 0 8px #ff3c3c; }
    .error-msg { color: #ff3c3c; font-family: monospace; font-size: 0.75rem; margin-top: 0.5rem; max-width: 400px; }
    .stack { display: flex; gap: 0.75rem; margin-top: 1.5rem; justify-content: center; flex-wrap: wrap; }
    .badge {
      font-family: monospace; font-size: 0.7rem;
      padding: 0.3rem 0.8rem;
      border: 1px solid rgba(0,255,136,0.4);
      color: #00ff88; border-radius: 2px;
    }
  </style>
</head>
<body>
  <h1>¡Hola Mundo!</h1>

  <div class="card">
    <p style="color:#5a5a7a; font-size:0.8rem; font-family:monospace;">Conexión a SQL Server</p>
    <?php if ($connected): ?>
      <div class="status">
        <span class="dot ok"></span>
        Conectado exitosamente a la base de datos
      </div>
    <?php else: ?>
      <div class="status">
        <span class="dot err"></span>
        Error de conexión
      </div>
      <p class="error-msg"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <div class="stack">
      <span class="badge">PHP <?= phpversion() ?></span>
      <span class="badge">SQL Server</span>
      <span class="badge">Docker Compose</span>
    </div>
  </div>

  <p style="font-family:monospace; font-size:0.65rem; color:#5a5a7a;">
    ITLA · Práctica 7 · 2026
  </p>
</body>
</html>
