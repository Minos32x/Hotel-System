<?php

namespace App\DataTables;

use Yajra\DataTables\Services\DataTable;

class ClientRoomsDataTable extends DataTable
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
            ->addColumn('action', 'client.buttons.client_reserve_action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
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
            ->parameters(['lengthMenu' => [[3, 5, 10, 15, -1], [3, 5, 15, 20, 'All data']] ]);
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
                'data' => 'number',
                'title' => 'Room_Number',
            ],
            [
                'name' => 'price',
                'data' => 'price',
                'title' => 'Price',
            ],

            [
                'name' => 'capacity',
                'data' => 'capacity',
                'title' => 'Room_Capacity',
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
        return 'ClientRooms_' . date('YmdHis');
    }
}
