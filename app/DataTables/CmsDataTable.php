<?php

namespace App\DataTables;

use App\Models\Cms;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;

class CmsDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
             ->addColumn('action', function($row) {
                            return '<a href="' . route('admin.cms-edit', $row->id) . '"><i class="fe fe-edit"></i></a>
                                    <a href="' . route('admin.cms-delete', $row->id) . '" id="delete"><i class="fe fe-trash-2" style="color:red"></i></a>';
                        })
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Cms $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Cms $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('cms-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax();
                   
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns(): array
    {
        return [
//                Column::make('slug'),
//                Column::make('content'),
                Column::make('page_name'),
                Column::make('action'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Cms_' . date('YmdHis');
    }
}
