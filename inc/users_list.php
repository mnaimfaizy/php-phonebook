<div class="menu-list">
    <div class="top-nav2">
        <h3 class="h3"> Users Registered </h3>
        <hr class="bg-orange" />
        <div class="table-responsive">
        
        <table id="users_table" class="table table-hover">
            <thead>
                <tr>
                    <th> Username </th>
                    <th> E-mail </th>
                    <th> Action </th>
                </tr>
            </thead>
            <tbody>
                <?php $files = glob('users/*.xml');
                    foreach($files as $file) {
                        $xml = new SimpleXMLElement($file, 0, true);
                        echo '
                            <tr>
                                <td>'.basename($file, '.xml').'</td>
                                <td>'.$xml->email.'</td>
                                <td><button class="btn btn-danger btn-sm delete_user" id="'.basename($file).'">X</button></td>
                            </tr>';
                    }
                ?>
            </tbody>
        </table>
        </div>
    </div>
</div>
