 <!doctype html>
        <html lang="en">
        <head>
        <meta charset="UTF-8">
                     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
                                 <meta http-equiv="X-UA-Compatible" content="ie=edge">
                     <title>Pocket Article Create</title>
        </head>
        <body>
        <h2><?= $title ?></h2>
        <h2><?= $code ?></h2>
          <form action="/articles/create?id=12" method="post">
          <input type="text" name="title" placeholder="enter article title ">
          <button type="submit">create</button>
          
</form>
        </body>
 </html>
