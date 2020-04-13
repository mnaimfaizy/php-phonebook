<?php // TODO: Change this to calender ?>
<div class="menu-list">
    <div class="top-nav2">
        <span class="menu2"><lable> Users </lable></span>
        <div class="circles">
        <div class="table-responsive">
        <table class="table table-hover">
            <tr>
                <th> Username </th>
                <th> E-mail </th>
            </tr>
                <?php $files = glob('users/*.xml');
                    foreach($files as $file) {
                        $xml = new SimpleXMLElement($file, 0, true);
                        echo '
                            <tr>
                                <td>'.basename($file, '.xml').'</td>
                                <td>'.$xml->email.'</td>
                            </tr>';
                    }
                ?>
        </table>
        </div>
        </div>
    </div>
</div>
