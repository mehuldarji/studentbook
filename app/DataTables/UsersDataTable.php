<?php

namespace App\DataTables;

use App\Models\User;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;

class UsersDataTable extends DataTable {

    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable {

        return datatables()
                        ->eloquent($query)
                        ->addColumn('action', function($row) {
                            return '<a href="' . $row->youtube_link . '" ><button type="button" class="rounded-circle btn btn-icon btn-youtube"><i class="fab fa-youtube"></i></button></a>
                        <a href="' . $row->twitter_link . '"><button type="button" class="rounded-circle btn btn-icon btn-twitter"><i class="fab fa-twitter"></i></button></a>
                        <a href="' . $row->facebook_link . '"><button type="button" class="rounded-circle btn btn-icon btn-facebook"><i class="fab fa-facebook"></i></button></a>
                        <a href="' . $row->instagram_link . '"><button type="button" class="rounded-circle btn btn-icon btn-instagram"><i class="fab fa-instagram"></i></button></a>';
                        })
                        ->addColumn('name', function ($img) {
                            return '<img src="../upload/users/' . $img->photo . '" width="40" class="avatar-md brround" >&nbsp &nbsp' . $img->name;
                        })->rawColumns(['name', 'action'])
                        ->editColumn('b_date', function ($row) {
                            return $row->b_date . '-' . $row->b_month . '-' . $row->b_year;
                        });
                        
//             ->editColumn('location', function ($row) {
//                   return $row->phone .'<br>'.$row->location;
//                   })->escapeColumns([]);
                        
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model): QueryBuilder {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder {
        return $this->builder()
                        ->setTableId('users-table')
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
            Column::make('name'),
            Column::make('email'),
            Column::make('b_date')->title('Date Of Birth'),
            Column::make('phone'),
            Column::make('location'),
            Column::make('action')->title('Link'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string {
        return 'Users_' . date('YmdHis');
    }

}
