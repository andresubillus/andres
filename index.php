<body>
    <h2>Calculadora Básica en PHP</h2>
    <form method="post" action="">
        <label for="numero1">Número 1:</label>
        <input type="number" name="numero1" id="numero1" required>
        <br><br>
        <label for="numero2">Número 2:</label>
        <input type="number" name="numero2" id="numero2" required>
        <br><br>
        <label for="operacion">Operación:</label>
        <select name="operacion" id="operacion">
            <option value="suma">Suma</option>
            <option value="resta">Resta</option>
            <option value="multiplicacion">Multiplicación</option>
            <option value="division">División</option>
        </select>
        <br><br>
        <button type="submit" name="calcular">Calcular</button>
    </form>
    <br>
    
<?php
if (isset($_POST['calcular'])) {
    $numero1 = $_POST['numero1'];
    $numero2 = $_POST['numero2'];
    $operacion = $_POST['operacion'];
    $resultado = null;
    $error = "";

    // Validar la entrada y realizar la operación
    if (is_numeric($numero1) && is_numeric($numero2)) {
        switch ($operacion) {
            case "suma":
                $resultado = $numero1 + $numero2;
                break;
            case "resta":
                $resultado = $numero1 - $numero2;
                break;
            case "multiplicacion":
                $resultado = $numero1 * $numero2;
                break;
            case "division":
                if ($numero2 != 0) {
                    $resultado = $numero1 / $numero2;
                } else {
                    $error = "Error: No se puede dividir por cero.";
                }
                break;
            default:
                $error = "Operación no válida.";
        }
    } else {
        $error = "Por favor, ingresa números válidos.";
    }

    if ($error != "") {
        echo "<p style='color:red;'>$error</p>";
    } else {
        echo "<h3>Resultado: $resultado</h3>";
    }
}
?>
