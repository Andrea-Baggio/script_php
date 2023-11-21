<?php
    $file_path = "your_file_path";

    $dom = new DOMDocument();
    $dom->loadHTMLFile($file_path);

    $data = [];

    // Seleziona tutti gli elementi <tr> (righe della tabella)
    $rows = $dom->getElementsByTagName('tr');

    foreach ($rows as $row) {
        $rowData = [];
        
        $name = trim($row->getElementsByTagName('td')->item(0)->nodeValue);
        $surname = trim($row->getElementsByTagName('td')->item(1)->nodeValue);
        $email = trim($row->getElementsByTagName('td')->item(2)->nodeValue);

        $rowData[] = $name;
        $rowData[] = $surname;
        $rowData[] = $email;
        
        $data[] = $rowData;
    }

    $output_csv = 'data_list.csv';

    $csv_file = fopen($output_csv, 'w');

    foreach ($data as $row) {
        fputcsv($csv_file, $row);
    }

    fclose($csv_file);

    echo "Dati estratti e salvati correttamente in $output_csv";
?>