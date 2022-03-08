<?php

namespace App\Exports;

use App\Models\Operational\Complaint;

use Illuminate\Contracts\View\View;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class ComplaintExport implements FromView, ShouldAutoSize, WithCustomStartCell, WithEvents
{
    use Exportable;

    protected $complaints;

    /**
     * @return \Illuminate\Support\Collection
     */
    public function __construct($complaint)
    {
        $this->complaints = $complaint;
    }

    public function view(): View
    {
        return view('exports.complaint.index', [
            'complaint' => $this->complaints,
        ]);
    }

    public function startCell(): string
    {
        return 'A3';
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                // styling all sheet ------------------------------------------------------
                $styleDescription = [
                    'font' => [
                        'bold' => true,
                        'size' => 15,
                    ],
                    'alignment' => [
                        'left' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                    ],
                ];


                $styleBorder = [
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                ];

                $styleHeader = [
                    'font' => [
                        'bold' => true,
                    ],
                ];
                // styling all sheet ------------------------------------------------------

                // set description  -------------------------------------------------------
                $event->sheet->getDelegate()->mergeCells('A1:B1');
                $event->sheet->getDelegate()->getStyle('A1:B1')->applyFromArray($styleDescription);
                $event->sheet->getDelegate()->setCellValue('A1', 'Complaint Data');
                // set description  -------------------------------------------------------


                //  calculate cell range -------------------------------------------------
                $cellRange = $this->startCell() . ':' . $event->sheet->getDelegate()->getHighestColumn() . $event->sheet->getDelegate()->getHighestDataRow();
                //  calculate cell range -------------------------------------------------

                //  calculate cell header -------------------------------------------------
                $cellHeader = $this->startCell() . ':' . $event->sheet->getDelegate()->getHighestColumn() . '3';
                //  calculate cell header -------------------------------------------------

                // set defaukt Sheet
                $event->sheet->getDelegate()->getStyle($cellRange)->applyFromArray($styleBorder);
                // set defaukt Sheet

                // set header sheet
                $event->sheet->getDelegate()->getStyle($cellHeader)->applyFromArray($styleHeader);
                // set header sheet
            },
        ];
    }
}
