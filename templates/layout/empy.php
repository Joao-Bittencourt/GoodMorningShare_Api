<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
              
    </head>
    <body style="margin: 0px; background: #0e0e0e; height: 100%">

        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>

    </body>
</html>
