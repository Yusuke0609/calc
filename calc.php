<?php
$error = '';
$result = 0;

    // 入力値チェック
    // 入力に不備があれば$error変数にエラー内容を代入する
    if (empty($_GET['$num1']) && empty($_GET['$num2'])){
        $error = '数字を入れてください。';
    } elseif (empty($_GET['$num1'])){
        $error = 'input1へ数字を入れてください。';
    } elseif (empty($_GET['$num2'])){
        $error = 'input2へ数字を入れてください。';
    } elseif(preg_match("/[^0-9]/", $_GET['$num1'])) {
        $error = "input1は数値以外が入力されています。";
    } elseif(preg_match("/[^0-9]/", $_GET['$num2'])) {
        $error = "input2は数値以外が入力されています。";
    }

    // エラーがないときに計算する
    if(empty($error)) {
        if ($_GET['operand'] === '+') {
            $result = $_GET['$num1'] + $_GET['$num2'];
        }elseif ($_GET["operand"] === "-") {
            $result = $_GET['$num1'] - $_GET['$num2'];
        }elseif ($_GET["operand"] === "*") {
            $result = $_GET['$num1'] * $_GET['$num2'];
        }elseif ($_GET["operand"] === "/") {
            $result = $_GET['$num1'] / $_GET['$num2'];
        }
    }
?>
<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>calculator</title>
</head>
<body>

<h1>簡易計算機</h1>
    <form action="rv07_calc.php">
        <input placeholder="input1" type="text" name="$num1" value="<?php if(!empty($_GET['$num1'])){echo $_GET['$num1'];}?>">

        <select name="operand">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select>

        <input placeholder="input2" type="text"  name="$num2" value="<?php if(!empty($_GET['$num2'])){echo $_GET['$num2']; } ?>">
        <button type="submit">送信</button>

        <!-- [:]型宣言？ -->
        <?php if(!empty($error)): ?>
            <p><?php echo $error ?></p>
        <?php else: ?>
            <p><?php echo $_GET['$num1'] ?> <?php echo $_GET['operand'] ?> <?php echo $_GET['$num2'] ?> = <?php echo $result; ?></p>
        <?php endif ?>
    </form>
</body>
</html>