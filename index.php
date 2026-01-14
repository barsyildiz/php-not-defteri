<?php
require_once "functions.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['not'])) {
  notEkle($_POST['not']);
  header("Location: index.php");
  exit;
}

$notlar = notlariGetir();
?>

<!DOCTYPE html>
<html lang="tr">

<head>
  <meta charset="UTF-8">
  <title>Not Defteri</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <div class="container">

    <div class="not-yaz">
      <h2>Defterim</h2>
      <form method="POST">
        <textarea name="not" required maxlength="600"></textarea>
        <button type="submit">Kaydet</button>
      </form>
    </div>

    <div class="notlar">
      <h3>Notlarım</h3>

      <?php foreach ($notlar as $index => $satir): ?>
        <div class="not"
          onclick="notSil(<?= $index ?>)">
          <?= htmlspecialchars($satir) ?>
        </div>
      <?php endforeach; ?>

    </div>
    <script>
      function notSil(index) {
        if (confirm("Bu notu silmek istediğinize emin misiniz?")) {
          fetch('sil.php', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'index=' + index
          }).then(() => {
            location.reload();
          });
        }
      }
    </script>


  </div>

</body>

</html>