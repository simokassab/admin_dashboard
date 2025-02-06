<?php

namespace App\Livewire\Tracking;

use App\Models\IntegrationLog;
use App\Models\Tracking;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\DateColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class LogsDataTable extends DataTableComponent
{

    public $count = 0;
    public $tracking_id;

    public function mount($tracking_id)
    {
        $this->tracking_id = $tracking_id;
    }

    public function builder(): Builder
    {
        return IntegrationLog::query()->where('tracking_id', $this->tracking_id)
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
            Column::make('provider')
                ->sortable()->searchable(),
            Column::make('status')
                ->sortable()->searchable(),
            DateColumn::make('Created At', 'created_at')
                ->outputFormat('Y-m-d')
                ->sortable(),
            Column::make('event_type')
                ->sortable()->searchable(),
            Column::make('Payload', 'payload')
                ->format(function($value) {
                    // Convert JSON to string if it's an array
                    if (is_array($value)) {
                        return json_encode($value, JSON_PRETTY_PRINT);
                    }
                    // If it's already a JSON string, try to pretty print it
                    try {
                        $decoded = json_decode($value, true);
                        if (json_last_error() === JSON_ERROR_NONE) {
                            return json_encode($decoded, JSON_PRETTY_PRINT);
                        }
                    } catch (\Exception $e) {}

                    return (string) $value;
                })
                ->html()
                ->sortable()
                ->searchable()

        ];
    }

    public function filters(): array
    {
        return [
            SelectFilter::make('Status')
                ->options([
                    '' => 'All',
                    '1' => 'Yes',
                    '0' => 'No',
                ])
                ->filter(function(Builder $builder, string $value) {
                    if ($value === '1') {
                        $builder->where('status', 'success')->orWhere('status', null);
                    } elseif ($value === '0') {
                        $builder->where('status', 'failed');
                    }
                }),
            SelectFilter::make('Provider')
                ->options([
                    '' => 'All',
                    'anti_fraud' => 'Anti Fraud',
                    'digital_ads' => 'Digital Ads',
                    'smadex' => 'Smadex',
                    'SDP' => 'SDP',
                ])
                ->filter(function(Builder $builder, string $value) {
                    if ($value) {
                        $builder->where('provider', $value);
                    }
                }),
            SelectFilter::make('Event Type')
                ->options([
                    '' => 'All',
                    'request' => 'Request',
                    'response' => 'Response',

                ])
                ->filter(function(Builder $builder, string $value) {
                    if ($value) {
                        $builder->where('event_type', $value);
                    }
                }),

        ];
    }
}
