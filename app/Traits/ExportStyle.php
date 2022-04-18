<?php

namespace App\Traits;

use Illuminate\Support\Facades\Schema;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

trait ExportStyle
{
    public $rowCount=1;
    public $colCount=1;


    public function styles(Worksheet $sheet)
    {

        return [
            // Style the first row as bold text.
            1    => [
                'font' => [
                    'bold' => true,
                    'color'=>[
                        'argb'=>'FFFFFFFF',
                    ]
                ],
                'borders' => [
                    // 'top' => [
                    //     'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    // ],
                    'allBorders'=>[
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => ['argb' => 'FFFF0000'],
                    ]
                ],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
                    'rotation' => 90,
                    'color' => [
                        'argb' => 'FF3A3A3A',
                    ],
                    // 'startColor' => [
                    //     'argb' => 'FFA0A0A0',
                    // ],
                    // 'endColor' => [
                    //     'argb' => 'FFFFFFFF',
                    // ],
                ],
            ],
            'A2:'.$this->getColLetter().$this->maxRow() =>[

                    'font' => [

                        'color'=>[
                            'argb'=>'FF0000DD',
                        ]
                    ],
                    'borders' => [
                        // 'top' => [
                        //     'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        // ],
                        'allBorders'=>[
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => 'FFFF0000'],
                        ]
                    ],
            ]
        ];
    }
    /**
     * Convert Column index to excel column letter
     * @param int $colIndex
     * @return string $Col_Letter
     */
    function columnLetter($colIndex=4){

        $colIndex = intval($colIndex);
        if ($colIndex <= 0) return '';

        $letter = '';

        while($colIndex != 0){
           $p = ($colIndex - 1) % 26;
           $colIndex = intval(($colIndex - $p) / 26);
           $letter = chr(65 + $p) . $letter;
        }

        return $letter;
    }

    /**
     * get Headers as array list
     * @return array headers
     */
    public function colArrayList():array
    {
        if(method_exists($this,'collection'))
        {
            $colArrList = $this->collection()->first();
            return array_keys($colArrList);
        }

        if(method_exists($this,'query'))
        {
            $colArrList = $this->query()->first();
            return array_keys($colArrList->toArray());
        }


    }

    /**
     * get the last column letter from exported query|collection
     * @return string $letter
     */
    public function getColLetter():string
    {
        // $table=   $this->table ?? $table;
        $this->colCount= $this->columnLetter(count($this->colArrayList()));
        return $this->colCount;
    }

    /**
     * get the last row from exported query|collection
     * @return int $maxRowNum
     */
    public function maxRow():int
    {
        if(method_exists($this,'query'))
        {
            $this->rowCount=$this->query()->count()+1;
        }
        if(method_exists($this,'collection'))
        {
            $this->rowCount=$this->collection()->count()+1;
        }
        return $this->rowCount;
    }
    /**
     * set the heading for exported excel sheet
     * @return int $maxRow
     */
    public function headings(): array
    {
        return $this->colArrayList();
    }
}
