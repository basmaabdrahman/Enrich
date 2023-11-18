<?php

namespace App\DataTables;

use App\Models\Student;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class StudentDataTable extends DataTable
{

    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'student.action')
            ->setRowId('id');
    }


    public function query(Student $model): QueryBuilder
    {
        return $model->newQuery();
    }


    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('student-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }


    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('name'),
            Column::make('email'),
            Column::make('img'),
            Column::make('phone'),
            Column::make('created_at'),
            Column::make('updated_at'),
        ];
    }

    protected function filename(): string
    {
        return 'Student_' . date('YmdHis');
    }
}
