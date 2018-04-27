<?php

namespace App\DataTables;

use App\Room;
use Yajra\DataTables\Services\DataTable;

class roomsDataTable extends DataTable
{
    public $my_query;
    public function __construct($q)
    {
        $this->my_query = $q;

    }

    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */

    public function dataTable($query)
    {
        return datatables($query)
            ->addColumn('action', 'Admin.btn.room_action')
            ->addColumn('price_doolar', 'Admin.btn.dollar_convert');

            
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Room $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return $this->my_query;
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
                'dom' => 'Blfrtip', // to show export button etc
                'lengthMenu' => [[2, 5, 10, 20, -1], [2, 5, 10, 20, 'All data']],
                'buttons' => [
                    ['extend' => 'print', 'className' => 'btn btn-info', 'text' => '<i class="fa fa-print"></i>'],
                    ['extend' => 'csv', 'className' => 'btn btn-info', 'text' => '<i class="fa fa-file">Export csv</i>'],
                    ['extend' => 'excel', 'className' => 'btn btn-info', 'text' => '<i class="fa fa-file">Export Excel</i>'],
                    ['extend' => 'reload', 'className' => 'btn btn-info', 'text' => '<i class="fa fa-refresh"></i>'],
                    [
                        'text' => '<i class="fa fa-plus"></i> Create new room', 'className' => 'btn btn-warning', "action" => "function(){
                                window.location.href='" . \URL::current() . "/create ';}"

                    ],
                ]
            ]);
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
                'name' => 'number',
                'data' => 'number',
                'title' => 'Room number',
            ],
            [
                'name' => 'created_at',
                'data' => 'created_at',
                'title' => 'Created_At',
            ],
            [
                'name' => 'created_by',
                'data' => 'created_by',
                'title' => 'Created_By',
            ],
            [
                'name' => 'capacity',
                'data' => 'capacity',
                'title' => 'Room Capacity',
            ],
            [
                'name' => 'price_doolar',
                'data' => 'price_doolar',
                'title' => 'Price in Dollars',
            ],
            [
                'name' => 'action',
                'data' => 'action',
                'title' => 'Action',
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
        return 'rooms_' . date('YmdHis');
    }
}
