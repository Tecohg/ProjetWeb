<!DOCTYPE html>
<html>
<head><title>Calculatrice</title></head>
<body>
    <h1>Calculatrice</h1>
    <form action="calc.php" method="POST">
        <label>Nombre 1 : <input type="text" name="nb1"></label><br><br>
        <label>Nombre 2 : <input type="text" name="nb2"></label><br><br>
        <label>Opérateur :
            <select name="operateur">
                <option value="">Choisissez un opérateur</option>
                <option value="+">+</option>
                <option value="-">-</option>
                <option value="*">*</option>
                <option value="/">/</option>
            </select>
        </label><br><br>
        <input type="submit" value="Calculer">
    </form>
</body>
</html>