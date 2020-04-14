<?php
if(isset($_POST['export_data'])) {
    $files = glob('numbers/*.xml');
    
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=numbers_'.time().'.csv');
    $output = fopen("php://output", "w");
    fputcsv($output, array('Firstname', 'Lastname', 'Phone 1', 'Phone 2', 'Phone 3', 'Phone 4', 'Address', 'Organization', 'E-mail', 'Date', 'Time'));
    
    foreach($files as $file) {
        $xml = new SimpleXMLElement($file, 0, true);
        $xml = (array)$xml;
        fputcsv($output, $xml);
    }
    fclose($output);
}

?>