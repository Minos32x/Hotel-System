<?php

namespace App\DataTables;

use App\Employee;
use Yajra\DataTables\Services\DataTable;

class employeeTableDataTable extends DataTable
{
    public $my_query;

    public function __construct($y){
      $this->my_query = $y;
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
            ->addColumn('action', 'Admin.btn.employee_action');
           
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Employee $model
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
            // ->addAction(['width' => '80px'])
                    // ->parameters($this->getBuilderParameters());
            ->parameters([
                'dom' => 'Blfrtip', // to show export button etc
                'lengthMenu' => [[2, 5, 10, 20, -1], [2, 5, 10, 20, 'All data']],
                'buttons' => [
                    ['extend' => 'print', 'className' => 'btn btn-info','text' => '<i class="fa fa-print"></i>'],
                    ['extend' => 'csv', 'className' => 'btn btn-info','text' => '<i class="fa fa-file">Export csv</i>'],
                    ['extend' => 'excel', 'className' => 'btn btn-info','text' => '<i class="fa fa-file">Export Excel</i>'],
                    ['extend' => 'reload', 'className' => 'btn btn-info','text' => '<i class="fa fa-refresh"></i>'],
                    ['text' => '<i class="fa fa-plus"></i> Create manager', 'className'=>'btn btn-warning'
                    ,"action"=> "function(){
                        window.location.href='".\URL::current()."/create ';}"
                    
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
                'name' => 'name',
                'data' => 'name',
                'title' => 'Manager Name',
            ],
            [
                'name' => 'created_at',
                'data' => 'created_at',
                'title' => 'Created_at',
            ],
            [
                'name' => 'updated_at',
                'data' => 'updated_at',
                'title' => 'Updated_at',
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
            // 'id',
            // 'name',
            // 'created_at',
            // 'updated_at'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'employeeTable_' . date('YmdHis');
    }
}