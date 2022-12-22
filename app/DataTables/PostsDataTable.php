<?php

namespace App\DataTables;

use App\Models\Post;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;

class PostsDataTable extends DataTable {

    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable {
        return (new EloquentDataTable($query))
                        ->addColumn('action', function($row) {
                            return '<a href="' . route('admin.post-edit', $row->id) . '"><i class="fe fe-edit"></i></a>
                                    <a href="' . route('admin.post-delete', $row->id) . '" id="delete"><i class="fe fe-trash-2" style="color:red"></i></a>';
                        })
                        ->addColumn('img', function ($img) {
                            return '<a href="' . $img->youtube_link . ' "><img src="' . $img->img . ' " style="width:120px;"></a>';
                        })->rawColumns(['img', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Post $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Post $model): QueryBuilder {
        return $model->where('type', 'youtube')->orderBy('id', 'asc')->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder {
        return $this->builder()
                        ->setTableId('posts-table')
                        ->columns($this->getColumns())
                        ->minifiedAjax();
//                    ->dom('Bfrtip')
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns(): array {
        return [
            Column::make('title'),
//            Column::make('youtube_link'),
            Column::make('img')->title('Youtube Link'),
            Column::make('action'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string {
        return 'Posts_' . date('YmdHis');
    }

}
