<?php

namespace App\DataTables;

use Yajra\DataTables\Services\DataTable;

class ClientReservedDataTable extends DataTable
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
        return datatables($query);
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
            ->parameters(['lengthMenu' => [[3, 5, 10, 15, -1], [3, 5, 15, 20, 'All data']]]);
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
                'name' => 'room_id',
                'data' => 'room_id',
                'title' => 'Room_Number',
            ],
            [
                'name' => 'price',
                'data' => 'price',
                'title' => 'Price',
            ],

            [
                'name' => 'num_company',
                'data' => 'num_company',
                'title' => 'Accompany_Number',
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
        return 'ClientReserved_' . date('YmdHis');
    }
}
