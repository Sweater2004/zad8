<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="css/style.css" rel="stylesheet">
   <title>задание 8</title>
   <?php
   require_once("yandex-master/vendor/autoload.php");
   require_once("change/redactor.php");
   $redactor = new Redactor($token);
   ?>
</head>

<body>
   <div class="container">
      <form action="change/upload.php" method="post" enctype="multipart/form-data">
         <input class="input-file" type="file" name="file">
         <button type="submit">
            заргузить
         </button>
      </form>
      <h1>Файлы</h1>
      <table class="file">
         <?php
         $file = $redactor->getAll();
         foreach ($file as $item) { ?>
            <tr>
               <td><?= $item['name'] ?></td>
               <td>
                  <form action="change/delete.php" method="post">
                     <button class="btn1" type="submit" name="file_path" value=<?= $item['path'] ?>>
                        удалить
                     </button>
                  </form>
               </td>
               <td>
                  <form action="change/download.php" method="post">
                     <button class="btn2" type="submit" name="file_path" value=<?= $item['path'] ?>>
                        скачать
                     </button>
                  </form>
               </td>
               <td>
                  <button class="btn3" type="submit" name="file_path" value=<?= $item['path'] ?>>
                     <a class="link" href="<? print_r($item['docviewer']) ?>">смотреть</a>
                  </button>
               </td>
            </tr>
         <? } ?>
   </div>
</body>

</html>