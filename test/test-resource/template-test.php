<html>
    <head>
    <style>
        table{width:30%; padding: 3px; border: 1px solid #eee; border-collapse: collapse;}
        th,td{border: 1px solid #ccc;}
    </style>
    </head>
    <body>
        <h1><?php echo $title; ?></h1>
        <div>
            <p><?php echo $content; ?></p>
        </div>
        <div>
            <table>
                <?php foreach ($list as $row=>$row_data){ ?>
                <tr>
                    <td><?php echo $row_data[0]; ?></td>
                    <td><?php echo $row_data[1]; ?></td>
                    <td><?php echo $row_data[2]; ?></td>
                    <td><?php echo $row_data[3]; ?></td>
                    <td><?php echo $row_data[4]; ?></td>
                </tr>
                <?php } ?>
            </table>
        </div>
        <div>
            <ul>
                <?php foreach ($capitals as $nation=>$capital){ ?>
                <li><?php echo $nation; ?>: <?php echo $capital; ?></li>
                <?php } ?>
            </ul>
        </div>
    </body>
</html>