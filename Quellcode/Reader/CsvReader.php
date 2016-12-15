<?php

namespace EtosErpConnector\Etos\Reader;

class CsvReader implements ReaderInterface
{
    public function readFromFile($file)
    {
        if (!file_exists($file)) {
            return [];
        }

        $csvArray = [];

        $file = fopen($file, 'rb');
        $columnNames = [];

        foreach (fgetcsv($file) as $columnName) {
            $columnNames[] = utf8_encode($columnName);
        }

        while (($line = fgetcsv($file)) !== false) {
            if (count($line) > 1) {
                $row = array_combine($columnNames, $line);

                foreach ($row as &$column) {
                    if ($column === '') {
                        $column = false;
                    } else {
                        $column = utf8_encode($column);
                    }
                }
                unset($column);
                $csvArray[] = $row;
            }
        }

        fclose($file);


        return $csvArray;
    }
}
