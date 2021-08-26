<?php

namespace App\DataTables;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class MyEmployeesDataTable extends DataTable
{
    protected $id; 
    protected $route;

    public function __construct($id = null) {
        $this->id = $id;
        if($this->id == null) {
            $this->id = Auth::id();
        }
        $this->route = null;
    }

    public function setRoute($route) {
        $this->route = $route;
    }

    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->editColumn('name', function ($row) {
                return view('my-team.partials.link-to-profile', compact(['row']));
            })
            ->addColumn('action', function ($row) {
                return view('goal.partials.action', compact(["row"])); // $row['id'];
            })->editColumn('active_goals_count', function ($row) {
                $text = $row['active_goals_count'] . " Goals";
                return view('my-team.partials.link-to-profile', compact(['row', 'text']));
            })->addColumn('latestConversation', function ($row) {
                $conversation = $row->latestConversation[0] ?? null;
                return view('my-team.partials.conversation', compact(["row", "conversation"]));
            })->addColumn('upcomingConversation', function ($row) {
                $removeBlankLink = true;
                $conversation = $row->upcomingConversation[0] ?? null;
                return view('my-team.partials.conversation', compact(["row", "conversation", 'removeBlankLink']));
            })
            ->addColumn('shared', function ($row) {
                // $yesOrNo = ($row->id % 2 === 0) ? 'Yes' : 'No';
                return view('my-team.partials.view-btn', compact(["row"])); // $row['id'];
            })
            ->addColumn('excused', function ($row) {
                $yesOrNo = ($row->id % 2 !== 0) ? 'Yes' : 'No';
                return view('my-team.partials.switch', compact(["yesOrNo"])); // $row['id'];
            })
            ->addColumn('direct-reports', function($row) {
                return view('my-team.partials.direct-report-col', compact(["row"]));
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
        $reporting_users = [1,2]; // Supervisor A
        if ($this->id == 1901) { /// Director A
            $reporting_users = [998, 999];
        }
        if ($this->id == 998) { /// Supervisor B
            $reporting_users = [3,4];
        }
        if (in_array($this->id, [1,2,3])) { // Employee
            $reporting_users = ['x']; // No Direct users
        }
        return $model->newQuery()->whereIn('id', $reporting_users)
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
        $route = $this->route;
        if (!$route) {
            $route = route('my-team.my-employee-table');
        }
        return $this->builder()
            ->setTableId('my-employees-table')
            ->columns($this->getColumns())
            ->minifiedAjax($route)
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
                ->title('Last Conversation')
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
                ->addClass('text-center'),
            Column::computed('direct-reports')
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