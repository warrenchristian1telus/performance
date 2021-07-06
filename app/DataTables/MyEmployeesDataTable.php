<?php

namespace App\DataTables;

use App\Models\User;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class MyEmployeesDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function ($row) {
                return view('goal.partials.action', compact(["row"])); // $row['id'];
            })->editColumn('active_goals_count', function ($row) {
                return $row['active_goals_count']. " Goals";
            })->addColumn('latestConversation', function ($row) {
                $conversation = $row->latestConversation[0] ?? null;
                return view('my-team.partials.conversation', compact(["conversation"]));
            })->addColumn('upcomingConversation', function ($row) {
                $conversation = $row->upcomingConversation[0] ?? null;
                return view('my-team.partials.conversation', compact(["conversation"]));
            })
            ->addColumn('shared', function ($row) {
                $yesOrNo = ($row->id % 2 === 0) ? 'Yes' : 'No';
                return view('my-team.partials.switch', compact(["yesOrNo"])); // $row['id'];
            })
            ->addColumn('excused', function ($row) {
                $yesOrNo = ($row->id % 2 !== 0) ? 'Yes' : 'No';
                return view('my-team.partials.switch', compact(["yesOrNo"])); // $row['id'];
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        return $model->newQuery()->whereIn('id', [1,2,3])
            ->withCount('activeGoals')
            ->with('upcomingConversation')
            ->with('latestConversation');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('my-employees-table')
            ->columns($this->getColumns())
            ->minifiedAjax(route('my-team.my-employee'))
            ->dom('Bfrtip')
            ->orderBy(0, 'desc')
            ->searching(true)
            ->ordering(true);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
           
            new Column([
                'title' => 'Employee name',
                'data' => 'name',
                'name' => 'name'
            ]),
            new Column([
                'title' => 'Active Goals',
                'data' => 'active_goals_count',
                'name' => 'active_goals_count',
                'searchable' => false
            ]),
            Column::computed('upcomingConversation')
                ->title('Upcoming Conversation')
                ->exportable(false)
                ->printable(false)
                ->addClass('text-center'),
            Column::computed('latestConversation')
                ->title('Latest Conversation')
                ->exportable(false)
                ->printable(false)
                ->addClass('text-center'),
            Column::computed('shared')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
            Column::computed('excused')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center')
            /* new Column([
                'title' => 'Type',
                'data' => 'goal_type.name',
                'name' => 'goalType.name'
            ]),
            'start_date',
            'target_date', */
        ];
    }
}