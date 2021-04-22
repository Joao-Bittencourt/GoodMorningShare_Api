<html style="100%">
    <head>
        <meta name="viewport" content="width=device-width, minimun-scale=0.1">          
    </head>
    <body style="margin: 0px; background: #0e0e0e; height: 100%">
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </body>
</html>
