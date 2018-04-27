<?php

namespace App\DataTables;

// use App\Floor;
use Yajra\DataTables\Services\DataTable;

class GenericDataTable extends DataTable
{
    public $my_query;
    public $Table_Type;

    public function __construct($q ,$Table_Type)
    {
        $this->Table_Type=$Table_Type;
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
        if($this->Table_Type =="floor")
        {
        return datatables($query)
            ->addColumn('action', 'Admin.btn.floor_action');

        }elseif($this->Table_Type =="room")
        {
            return datatables($query)
            ->addColumn('action', 'Admin.btn.room_action')
            ->addColumn('price_doolar', 'Admin.btn.dollar_convert');

        }   
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Floor $model
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
                                'text' => '<i class="fa fa-plus"></i> Create new One', 'className' => 'btn btn-warning', "action" => "function(){
                                        window.location.href='" . \URL::current() . "/create ';}"
        
                            ],
                        ]
                    ]);    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        if ($this->Table_Type =='floor')
        {
        return [
            [
                'name' => 'id',
                'data' => 'id',
                'title' => 'ID'
            ],
            [
                'name' => 'floor_num',
                'data' => 'floor_num',
                'title' => 'Floor Number'
            ],
            [
                'name' => 'no_of_room',
                'data' => 'no_of_room',
                'title' => 'Number Of Rooms'
            ],
            [
                'name' => 'created_by',
                'data' => 'created_by',
                'title' => 'Created_By'
            ],
            [
                'name' => 'created_at',
                'data' => 'created_at',
                'title' => 'Created_At'
            ],
            [
                'name' => 'action',
                'data' => 'action',
                'title' => 'Actions'
            ],
         
        ];
    }elseif($this->Table_Type=='room')
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
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'floors_' . date('YmdHis');
    }
}
