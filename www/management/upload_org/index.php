<?php
$dirname = '../doc/document/';
$filename = 'org_' . date("Ymd") . '.pdf';
$msg = "";
try {
  if (isset($_FILES['file']['error']) && is_int($_FILES['file']['error'])) {
    switch ($_FILES['file']['error']) {
    case UPLOAD_ERR_OK:
      $fileinfo = finfo_open(FILEINFO_MIME_TYPE);
      if (finfo_file($fileinfo, $_FILES['file']['tmp_name']) !== 'application/pdf') {
        throw new RuntimeException('ファイル形式が不正です。');
      }
      break;
    case UPLOAD_ERR_NO_FILE:
      throw new RuntimeException('ファイルが選択されていません。');
    case UPLOAD_ERR_INI_SIZE:
    case UPLOAD_ERR_FORM_SIZE:
      throw new RuntimeException('ファイルサイズが大きすぎます。');
    default:
      throw new RuntimeException('未定義のエラーが発生しました。');
    }
    if (!move_uploaded_file($_FILES['file']['tmp_name'], $dirname . $filename)) {
      throw new RuntimeException('アップロードに失敗しました。');
    } else {
      $msg = "<p>アップロードが完了しました。</p>" . "\n";
      $file = "../org_data.php";
      $str = "<?php\n\t\$date = '" . date("Y/m/d") . "';\n\t\$filename = '" . $filename . "';\n?>\n";
      file_put_contents($file, $str);
    }
  }
} catch (RuntimeException $e) {
  $msg = "<p>" . $e->getMessage() . "</p>". "\n";
}
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>アップロード</title>
  </head>
  <body>
    <form method="post" enctype="multipart/form-data">
      <p><input type="file" name="file" accept="application/pdf"></p>
      <p><input type="submit" value="アップロード"></p>
    </form>
<?=$msg; ?>
  </body>
</html>
