<?php

namespace App\Livewire\Projects;

use App\Models\Project;
use App\Models\Tracking;
use Livewire\Component;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\DateColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateRangeFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Carbon\Carbon;

class ProjectDataTable extends DataTableComponent
{
    public $count = 0;
    public $project_id;

    public function mount($project_id){
        $this->project_id = $project_id;
    }

    public function builder(): Builder
    {
        return Tracking::query()->with('integrationLogs')->where('project_source_id', $this->project_id)
            ->orderBy('created_at', 'desc');
    }


    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setSingleSortingDisabled()
            ->setHideReorderColumnUnlessReorderingEnabled()
            ->setFilterLayoutSlideDown()
            ->setRememberColumnSelectionDisabled()
            ->setSecondaryHeaderTrAttributes(function($rows) {
                return ['class' => 'bg-red-100'];
            })
            ->setSecondaryHeaderTdAttributes(function(Column $column, $rows) {
                if ($column->isField('id')) {
                    return ['class' => 'text-red-500'];
                }

                return ['default' => true];
            })
            ->setFooterTrAttributes(function($rows) {
                return ['class' => 'bg-gray-100'];
            })
            ->setFooterTdAttributes(function(Column $column, $rows) {
                if ($column->isField('name')) {
                    return ['class' => 'text-green-500'];
                }

                return ['default' => true];
            })
            ->setUseHeaderAsFooterEnabled()
            ->setHideBulkActionsWhenEmptyEnabled();
    }

    public function columns(): array
    {
        return [
            Column::make('ID', 'id')
                ->sortable()->searchable(),
            Column::make('msisdn')
                ->sortable()->searchable(),
            Column::make('source')
                ->sortable()->searchable(),
            BooleanColumn::make('success'),
            BooleanColumn::make('failure')
                ->yesNo(),
            BooleanColumn::make('first_click'),
            BooleanColumn::make('second_click'),
            // Custom column for created_at with GMT+3 timezone
            DateColumn::make('Created At', 'created_at')
                ->outputFormat('Y-m-d')
                ->sortable(),
            LinkColumn::make('Details')
                ->title(fn ($row) => $row->integrationLogs()->exists() ? 'Logs' : '')
                ->location(fn ($row) => $row->integrationLogs()->exists() ? route('TrackingDetails', $row) : '#')
                ->html(),
        ];
    }

    public function filters(): array
    {
        return [
            SelectFilter::make('Success')
                ->options([
                    '' => 'All',
                    '1' => 'Yes',
                    '0' => 'No',
                ])
                ->filter(function(Builder $builder, string $value) {
                    if ($value === '1') {
                        $builder->where('success', 1);
                    } elseif ($value === '0') {
                        $builder->where('success', 0);
                    }
                }),
            SelectFilter::make('Failure')
                ->options([
                    '' => 'All',
                    '1' => 'Yes',
                    '0' => 'No',
                ])
                ->filter(function(Builder $builder, string $value) {
                    if ($value === '1') {
                        $builder->where('failure', 1);
                    } elseif ($value === '0') {
                        $builder->where('failure', 0);
                    }
                }),
            SelectFilter::make('Second Click')
                ->options([
                    '' => 'All',
                    '1' => 'Yes',
                    '0' => 'No',
                ])
                ->filter(function(Builder $builder, string $value) {
                    if ($value === '1') {
                        $builder->where('second_click', 1);
                    } elseif ($value === '0') {
                        $builder->where('second_click', 0);
                    }
                }),
            SelectFilter::make('Source')
                ->options([
                    '' => 'All',
                    'PIN' => 'PIN',
                    'HE' => 'HE',
                ])
                ->filter(function(Builder $builder, string $value) {
                    if ($value === 'PIN') {
                        $builder->where('source', "PIN");
                    } elseif ($value === 'HE') {
                        $builder->where('source', "HE");
                    }
                }),
            DateRangeFilter::make('Date Range')
                ->config([
                    'allowInput' => false,   // Allow manual input of dates
                    'altFormat' => 'F j, Y', // Date format that will be displayed once selected
                    'ariaDateFormat' => 'F j, Y', // An aria-friendly date format
                    'dateFormat' => 'Y-m-d', // Date format that will be received by the filter
                    'earliestDate' => '2024-11-01', // The earliest acceptable date
                    'placeholder' => 'Enter Date Range', // A placeholder value
                    'locale' => 'en',
                ])
                ->filter(function(Builder $builder, array $value) {
                    if ($value['minDate'] ?? false) {
                        // Convert from GMT+3 to GMT for database query
                        $builder->whereDate('created_at', '>=', $value['minDate']);
                    }

                    if ($value['maxDate'] ?? false) {
                        // Convert from GMT+3 to GMT for database query
                        $builder->whereDate('created_at', '<=', $value['maxDate']);
                    }
                }),

        ];
    }
}
