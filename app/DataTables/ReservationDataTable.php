<?php

namespace App\DataTables;

use App\Reservations;
use Yajra\DataTables\Services\DataTable;

class ReservationDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */

    private $Query;

    public function __construct($Data)
    {
        $this->Query = $Data;

    }

    public function dataTable($query)
    {
        return datatables($query)
            ->addColumn('action', 'Admin.btn.reservation_action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Reservations $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return $this->Query;
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->parameters([
                    'dom' => 'Blfrtip',
                    'lengthMenu' => [[2, 5, 10, 20, -1], [2, 5, 10, 20, 'All data']],
                    'buttons' => [
                        ['extend' => 'print', 'className' => 'btn btn-info', 'text' => '<i class="fa fa-print"></i>'],
                        ['extend' => 'csv', 'className' => 'btn btn-info', 'text' => '<i class="fa fa-file">Export csv</i>'],
                        ['extend' => 'excel', 'className' => 'btn btn-info', 'text' => '<i class="fa fa-file">Export Excel</i>'],
                        ['extend' => 'reload', 'className' => 'btn btn-info', 'text' => '<i class="fa fa-refresh"></i>'],

                    ]
                ]
            );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            [
                'name' => 'id',
                'data' => 'id',
                'title' => 'ID',
            ],
            [
                'name' => 'client_id',
                'data' => 'client_id',
                'title' => 'Client_ID',
            ],
            [
                'name' => 'room_id',
                'data' => 'room_id',
                'title' => 'Room_ID',
            ],
            [
                'name' => 'price',
                'data' => 'price',
                'title' => 'Price',
            ],
            [
                'name' => 'receptionist_id',
                'data' => 'receptionist_id',
                'title' => 'Receptionist_ID',
            ],
            [
                'name' => 'created_at',
                'data' => 'created_at',
                'title' => 'Created_At',
            ],
            [
                'name' => 'updated_at',
                'data' => 'updated_at',
                'title' => 'Updated_At',
            ],
            [
                'name' => 'action',
                'data' => 'action',
                'title' => 'Actions',
                'exportable' => false,
                'printable' => false,
                'orderable' => false,
                'searchable' => false,

            ],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Reservation_' . date('YmdHis');
    }
}
