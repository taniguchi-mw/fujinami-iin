<?php
error_reporting(0);
$HTTP_POST_VARS = &$_POST;
//設定ファイル読み込み
include("inc.php");

//POSTデータ読み込み
$empty = $POST = array();
foreach ($HTTP_POST_VARS as $varname => $varvalue) {
$$varname=htmlspecialchars(strip_tags($varvalue));
}

//メールアドレス書式チェック
function valid_mail($mail)
{
if(preg_match('/^(?:[^(\040)<>@,;:".\\\\\[\]\000-\037\x80-\xff]+(?![^(\040)<>@,;:".\\\\\[\]\000-\037\x80-\xff])|"[^\\\\\x80-\xff\n\015"]*(?:\\\\[^\x80-\xff][^\\\\\x80-\xff\n\015"]*)*")(?:\.(?:[^(\040)<>@,;:".\\\\\[\]\000-\037\x80-\xff]+(?![^(\040)<>@,;:".\\\\\[\]\000-\037\x80-\xff])|"[^\\\\\x80-\xff\n\015"]*(?:\\\\[^\x80-\xff][^\\\\\x80-\xff\n\015"]*)*"))*@(?:[^(\040)<>@,;:".\\\\\[\]\000-\037\x80-\xff]+(?![^(\040)<>@,;:".\\\\\[\]\000-\037\x80-\xff])|\[(?:[^\\\\\x80-\xff\n\015\[\]]|\\\\[^\x80-\xff])*\])(?:\.(?:[^(\040)<>@,;:".\\\\\[\]\000-\037\x80-\xff]+(?![^(\040)<>@,;:".\\\\\[\]\000-\037\x80-\xff])|\[(?:[^\\\\\x80-\xff\n\015\[\]]|\\\\[^\x80-\xff])*\]))*$/', $mail)) return 1;
}

//エラーチェック
if($_POST[name]==""){ $er.="■お名前が入力されていません。<br />"; }
if($_POST[kana]==""){ $er.="■フリガナが入力されていません。<br />"; }
if($_POST[mail]==""){ $er.="■メールアドレスが入力されておりません。<br>"; }
if(valid_mail($_POST[mail])){ }else{ $er.="■メールアドレスの書式が正しくありません<br>"; }
if($_POST[ran]==""){ $er.="■お問い合わせ内容が入力されていません。<br />"; }



//送信画面
if($_POST[sousin]!=""){

    //※※※※※※※※※※※※※※※※※※※※※※※※※
    //お客様へメール
    //※※※※※※※※※※※※※※※※※※※※※※※※※

    $sendoto=$mail;

    $subject="【自動返信確認メール】藤浪医院へお問い合わせをありがとうございます。";
    $subject=mb_convert_encoding($subject,"JIS","utf-8");
    $subject=base64_encode($subject);
    $subject="=?iso-2022-jp?B?".$subject."?=";
    
    //* 内容
    $body.="＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝\n";
    $body.=$name."様\n";
    $body.="この度は、藤浪医院へ\n";
    $body.="お問い合わせを頂きまして、誠にありがとうございます。\n";
    $body.="下記の通りお問い合わせを承りましたのでご確認ください。\n";
    $body.="＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝\n\n";
    $body.="お問い合わせ内容\n";
    $body.="**********************************************************************\n";
    $body.="■お名前：\n";
    $body.=$name."\n";
    $body.="■フリガナ：\n";
    $body.=$kana."\n";
    $body.="■電話番号：\n";
    $body.=$tel1."\n";
    $body.="■メールアドレス：\n";
    $body.=$mail."\n";
    $body.="■お問い合わせ内容：\n";
    $body.=$ran."\n\n";
    $body.="＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝\n";
    $body.="藤浪医院\n";
    $body.="電話 082-278-1700 9:00～12:30 15:00～18:00（木・土曜の午後、日祝休み）\n";
    $body.="※受付は診療時間の30分前まで\n";
    $body.="＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝\n";
    $body=mb_convert_encoding($body,"JIS","utf-8");

    /* ヘッダ */
    $headers="From:".$send."\n";
    $headers.="MIME-Version: 1.0\n";
    $headers.="Content-type: text/plain; charset=\"iso-2022-jp\"\n";
    $headers.="Content-Transfer-Encoding: 7bit\n";
    $headers=mb_convert_encoding($headers,"JIS","utf-8");
    
    mail($sendoto,$subject,$body,$headers);
    
    //※※※※※※※※※※※※※※※※※※※※※※※※※
    //担当者へメール
    //※※※※※※※※※※※※※※※※※※※※※※※※※

    $sendoto=$send;
    
    $subject="【お問い合わせ】藤浪医院へお問い合わせがありました。";
    $subject=mb_convert_encoding($subject,"JIS","utf-8");
    $subject=base64_encode($subject);
    $subject="=?iso-2022-jp?B?".$subject."?=";
    
    //* 内容
    $body="藤浪医院へのお問い合わせ内容は以下、\n\n";
    $body.="**********************************************************************\n";
    $body.="■お名前：\n";
    $body.=$name."\n";
    $body.="■フリガナ：\n";
    $body.=$kana."\n";
    $body.="■電話番号：\n";
    $body.=$tel1."\n";
    $body.="■メールアドレス：\n";
    $body.=$mail."\n";
    $body.="■お問い合わせ内容：\n";
    $body.=$ran."\n\n";
    $body.="**********************************************************************\n";

    $body=mb_convert_encoding($body,"JIS","utf-8");

    /* ヘッダ */
    $headers="From: ".$mail."\n";
    $headers.="MIME-Version: 1.0\n";
    $headers.="Content-type: text/plain; charset=\"iso-2022-jp\"\n";
    $headers.="Content-Transfer-Encoding: 7bit\n";
    $headers=mb_convert_encoding($headers,"JIS","utf-8");
    
    mail($sendoto,$subject,$body,$headers);

    header("Location: thankyou.html");
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta http-equiv="content-script-type" content="text/javascript" />
<meta name="robots" content="noindex,nofollow" />
<link href="formcommon.css" rel="stylesheet" type="text/css" />
<title>お問い合わせ | 藤浪医院</title>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-30334537-7', 'fujinami-iin.com');
  ga('send', 'pageview');

</script>
</head>
<body onLoad="javascript:scr();">
<form method="POST" name="fujinami-clinic" action="form.php">
  <input name="scroll" type="hidden">
  <?php
$empty = $POST = array();
foreach ($HTTP_POST_VARS as $varname => $varvalue) {

    if(is_array($varvalue)){
        
        //配列を文字列にして格納
        $varvalue = htmlspecialchars(strip_tags(implode("---", $varvalue)));
        
    }
    
    $$varname=$varvalue;
    
    if($_POST[kakunin]!=""){
    //hidden
    if($varname!="scroll" and $varname!="submit" and $varname!="kakunin_x" and $varname!="sousin_x"){
    echo "<input type=\"hidden\" name=\"".htmlspecialchars($varname)."\" value=\"".htmlspecialchars($varvalue)."\">\n";
    }
    }
}
?>
  <header id="gHeader">
  <div id="logo"><img src="images/logo.png" alt="藤浪医院" /></div>
  <h1>お問い合わせフォーム</h1>
  </header>
  <article id="container">
    <?php
  //入力画面用
  if($_POST[kakunin]=="" or $er!=""){
  ?>
    <h2>2.入力画面</h2>
    <div class="order_txt01">
      <p class="fc-redb">お問い合せ時の諸注意</p>
      <p><span class="fc-redb">※</span>お手数ですが、【必須】の箇所は全てご入力をお願い致します。<br />
        <!--ご入力情報は SSL暗号化通信により保護されます。--></p>
    </div>
    <div class="step"><img src="images/step02.jpg" /></div>
    <?php
  }else{
  //確認画面用
  ?>
    <h2>3.確認画面</h2>
    <div class="order_txt01">
      <p>ご入力頂いた内容に間違いがないかをよくご確認ください。<br />
        間違いがなければ、下の「この内容で確定する」ボタンを押してください。</p>
    </div>
    <div class="step"><img src="images/step03.jpg" /></div>
    <?php
  }

if($_POST[kakunin]!="" and $er!=""){
?>
    <div class="order_txt02">
      <p><?php echo $er; ?></p>
    </div>
    <?php
}

//入力画面用
if($_POST[kakunin]=="" or $er!=""){
?>
    <div class="conbox840">
      <h3>お客様情報</h3>
      <div class="formbox">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tbody>
            <tr>
              <th><span class="fc-redb">【必須】</span>お名前</th>
              <td><input name="name" type="text" class="text" value="<?php echo htmlspecialchars($_POST['name']); ?>" /></td>
            </tr>
            <tr>
              <th><span class="fc-redb">【必須】</span>フリガナ</th>
              <td><input name="kana" type="text" class="text" value="<?php echo htmlspecialchars($_POST['kana']); ?>" /></td>
            </tr>
            <tr>
              <th>電話番号</th>
              <td><input type="text" name="tel1" class="text" value="<?php echo htmlspecialchars($_POST['tel1']); ?>" size="15" maxlength="15" />
                <br>
                ※半角数字</td>
            </tr>
            <tr>
              <th><span class="fc-redb">【必須】</span>メールアドレス</th>
              <td><input name="mail" type="text" id="mail" size="50" value="<?php echo htmlspecialchars($_POST['mail']); ?>" style="ime-mode:disabled;" />
                <br>
                ※半角英数 </td>
            </tr>
            <tr>
              <th><span class="fc-redb">【必須】</span>お問い合わせ内容</th>
              <td><textarea name="ran" id="ran" cols="80" rows="5"><?php echo htmlspecialchars($_POST['ran']); ?></textarea></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="btn_inner">
        <input type="submit" name="kakunin" id="kakunin" value="確認画面へ進む" class="btn_kakunin">
      </div>
    </div>
    <!--conbox-->
    <?php
  //確認画面用
  }else{
  ?>
    <div class="conbox840">
      <h3>お客様情報</h3>
      <div class="formbox">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tbody>
            <tr>
              <th>お名前</th>
              <td><?php echo htmlspecialchars($_POST['name']); ?></td>
            </tr>
            <tr>
              <th>フリガナ</th>
              <td><?php echo htmlspecialchars($_POST['kana']); ?></td>
            </tr>
            <tr>
              <th>電話番号</th>
              <td><?php echo htmlspecialchars($_POST['tel1']); ?></td>
            </tr>
            <tr>
              <th>メールアドレス</th>
              <td><?php echo htmlspecialchars($_POST['mail']); ?></td>
            </tr>
            <tr>
              <th>お問い合わせ内容</th>
              <td><?php echo htmlspecialchars($_POST['ran']); ?></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="btn_inner">
        <input type="submit" name="sousin" id="sousin" value="この内容で送信する" class="btn_sousin">
      </div>
    </div>
    <!--conbox-->
    <?php
  }
  ?>
  </article>
  <aside class="f_bg clear">
    <footer id="gFooter">
      <p id="copy" class="clear"><small>Copyright &copy; Fujinami-Clinic. All rights reserved.</small></p>
    </footer>
  </aside>
</form>
</body>
</html>
