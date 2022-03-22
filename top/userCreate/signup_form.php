<?php
    session_start();
    
    require_once '../../classes/UserLogic.php';

    $login_err = isset($_SESSION['login_err']) ? $_SESSION['login_err'] : null;
    unset($_SESSION['login_err']);
    
    //セッションに保存データがあるかを確認
    if (isset($_SESSION['signUp'])) {
        //セッションから情報を取得
        $name = $_SESSION['signUp']['name'];
        $tel = $_SESSION['signUp']['tel'];
        $email = $_SESSION['signUp']['email'];
        $password = $_SESSION['signUp']['password'];
    } else {
        //セッションがなかった場合
        $name = '';
        $tel = '';
        $email = '';
        $password = '';
        $icon = '';
    }
?>

<!--ログインフォーム-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../css/top.css" />
    <title>新規会員登録</title>
</head>

<body class="h-100 bg-secondary p-4 p-md-5">
    <form class="row g-3 bg-white p-2 p-md-5 shadow-sm" enctype="multipart/form-data" action="signup_check.php" method="POST">
    <input type="hidden" name="formcheck" value="checked">
    <h1 class="my-3" style="text-align:center;">アカウント作成</h1>
            <?php if (isset($login_err)) : ?>
                <p><?php echo $login_err; ?></p>
            <?php endif; ?>
        <p class="my-3" style="text-align:center;">当サービスを利用するために、次のフォームに必要事項をご記入ください。</p>
        <!--名前を記入-->
        <div class="row my-4">
            <label for="name" class="form-label font-weight-bold">*Name</label>
            <div class="md-3">
                <input type="text" class="form-control col-6" name="name" value="<?php $name ?>">
            </div>
        </div>

        <!--電話番号を記入-->
        <div class="row my-3">
            <label for="tel" class="form-label font-weight-bold">*Phone</label>
            <p class="small text-muted">（ハイフンなし・半角数字）</p>
            <div class="md-3">
                <input type="tel" oninput="value = value.replace(/[０-９]/g,s => 
                    String.fromCharCode(s.charCodeAt(0) - 65248)).replace(/\D/g,'');" 
                    class="form-control col-6" name="tel" value="<?php $tel ?>">
            </div>
        </div>

        <!--メアドを記入-->
        <div class="row my-3">
            <label for="email" class="form-label font-weight-bold">Email</label>
            <div class="md-3">
                <input type="email" class="form-control col-6" name="email" value="<?php $email ?>">
            </div>
        </div>

        <!--パスワードを記入-->
        <div class="row my-3">
            <label for="password" class="form-label font-weight-bold">*Password</label>
            <p class="small text-muted">（半角英数字・4文字以上20文字以下）</p>
            <div class="md-3">
                <input type="password" class="form-control col-4" id="inputPassword8" name="password" value="<?php $password ?>">
            </div>
        </div>
        
        <!--確認パスワードを記入-->
        <div class="row my-3">
            <label for="password_conf" class="form-label small font-weight-bold">確認：passwordを再入力してください</label>
            <div class="md-4">
                <input type="password" class="form-control col-4" id="inputPassword4" name="password_conf">
            </div>
        </div>


        
        <!--送信ボタン-->
        <div class="col-12 my-4 text-center">
            <p><input type="submit" class="btn btn-primary" value="登録"></p>
            <!--login_form.phpへ-->
            <a href = "../userLogin/login_form.php">ログインはこちら</a>
        </div>

    </form>
</body>
</html>