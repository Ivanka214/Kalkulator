<!-- 
    Tugas Membuat Kalkulator Sederhana

    Rafly Ivan Khalfani - 2202187
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Kalkulator</title>
</head>
<body>
    <div class="kalkulator">
        <form method="post">
            <input type="text" class="input" id="display" name="expression" readonly>
                <div class="numpad">
                <input class="numpad-btn op" type="button" value="AC" onclick="clearDisplay()">
                <input class="numpad-btn op" type="button" value="⌫" onclick="backspace()">
                <input class="numpad-btn op" type="button" value="%" onclick="appendToDisplay('%')">
                <input class="numpad-btn op" type="button" value="/" onclick="appendToDisplay('/')">
                <br>
                <input class="numpad-btn num" type="button" value="7" onclick="appendToDisplay('1')">
                <input class="numpad-btn num" type="button" value="8" onclick="appendToDisplay('2')">
                <input class="numpad-btn num" type="button" value="9" onclick="appendToDisplay('3')">
                <input class="numpad-btn op" type="button" value="*" onclick="appendToDisplay('*')">
                <br>
                <input class="numpad-btn num" type="button" value="4" onclick="appendToDisplay('4')">
                <input class="numpad-btn num" type="button" value="5" onclick="appendToDisplay('5')">
                <input class="numpad-btn num" type="button" value="6" onclick="appendToDisplay('6')">
                <input class="numpad-btn op" type="button" value="-" onclick="appendToDisplay('-')">
                <br>
                <input class="numpad-btn num" type="button" value="1" onclick="appendToDisplay('7')">
                <input class="numpad-btn num" type="button" value="2" onclick="appendToDisplay('8')">
                <input class="numpad-btn num" type="button" value="3" onclick="appendToDisplay('9')">
                <input class="numpad-btn op" type="button" value="+" onclick="appendToDisplay('+')">
                <br>
                <input class="numpad-btn num" type="button" value="00" onclick="appendToDisplay('00')">
                <input class="numpad-btn num" type="button" value="0" onclick="appendToDisplay('0')">
                <input class="numpad-btn num" type="button" value="." onclick="appendToDisplay('.')">
                <button class="numpad-btn submit" type="submit" name="calculate">=</button>
            </div>
        </form>
    </div>

    <?php
    if(isset($_POST['calculate'])) {
        $expression = $_POST['expression'];

        try {
            // Check for division by zero
            if (strpos($expression, '/0') !== false) {
                throw new Exception('Tidak bisa dibagi dengan 0');
            }
        
            $result = eval("return $expression;");
            echo "<script>document.getElementById('display').value = '$result';</script>";
        } catch (Exception $e) {
            echo "<script>alert('".$e->getMessage()."');</script>";
        }
    }
    ?>

    <script>
        function clearDisplay() {
            document.getElementById("display").value = "";
        }

        function backspace() {
            var display = document.getElementById("display");
            var currentValue = display.value;
            display.value = currentValue.substring(0, currentValue.length - 1);
        }

        function appendToDisplay(value) {
            var display = document.getElementById("display");
            display.value += value;
        }
    </script>

</body>
</html>