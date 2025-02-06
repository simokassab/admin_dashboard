<?php

namespace App\Livewire;

use App\Models\Project;
use App\Models\ProjectSource;
use App\Models\Tracking;
use Livewire\Component;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;

class DashboardTable extends DataTableComponent
{
    public $count = 0;
    protected $model = ProjectSource::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make('ID', 'id')
                ->sortable()->searchable(),
            Column::make('uuid')
                ->sortable()->searchable(),
            Column::make('Project', 'project.name'),
            Column::make('Source', 'source.name'),
            Column::make('campaign_id')
                ->sortable()->searchable(),
//            LinkColumn::make('Edit')
//                ->title(fn ($row) => 'Edit')
//                ->location(fn ($row) => route('editProject', $row))
//                ->html(),
            LinkColumn::make('Details')
                ->title(fn ($row) => 'Details')
                ->location(fn ($row) => route('projectDetails', $row))
                ->html(),
        ];
    }
}
